<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Captcha extends CI_Controller {
   public function __construct()  {
        parent:: __construct();
    $this->load->helper("url");
    $this->load->helper('form');
    $this->load->helper('captcha');
    $this->load->library('form_validation');
    }
  public function index() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();
 //validating form fields
    $this->form_validation->set_rules('username', 'Email Address', 'required');
    $this->form_validation->set_rules('user_password', 'Password', 'required');
    $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
    $userCaptcha = $this->input->post('userCaptcha');
  
  if ($this->form_validation->run() == false){
      // numeric random number for captcha
      $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
      // setting up captcha config
      $vals = array(
             'word' => $random_number,
             'img_path' => './captcha_images/',
             'img_url' => base_url().'captcha_images/',
             'img_width' => 140,
             'img_height' => 32,
             'expiration' => 7200
            );
      $data['captcha'] = create_captcha($vals);
      $this->session->set_userdata('captchaWord',$data['captcha']['word']);
      $this->load->view('captcha', $data);
    }else {
      // do your stuff here.
      redirect('user/index');
    }
 }
   
  public function check_captcha($str){
    $word = $this->session->userdata('captchaWord');
    if(strcmp(strtoupper($str),strtoupper($word)) == 0){
      return true;
    }
    else{
      $this->form_validation->set_message('check_captcha', 'Please enter correct words!');
      return false;
    }
 }
 private function _login(){
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    //jika usernya ada
    if ($user) {
        //jika usernya aktif
        if($user['is_active'] == 1){
            //cek password
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($user);
                redirect('user/index');
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
            redirect('auth');
            }

        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This Email has not been activated!</div>');
            redirect('auth');
        }
    }else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
    }
}



public function registration()
{
    if ($this->session->userdata('email')){
        redirect('user');
    }
    $this->form_validation->set_rules('name', 'Name', 'required|trim');        
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
        'is_unique' => 'This Email has already register!']);
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
        'matches' => 'password dont match!',
        'min_length' => 'password too short!']); 
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]'); 


    if($this->form_validation->run() == FALSE) {
    $data['judul'] = 'Registration';
    $this->load->view('template/header', $data);
    $this->load->view('auth/registration');
    $this->load->view('template/footer');
    } else{
        $email = $this->input->post('email', true);
        $data = [
            'name' => htmlspecialchars($this->input->post('name')),
            'email' => htmlspecialchars($email),
            'image' => 'vie.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2,
            'is_active' => 0,
            'date_created' => time()
        ];

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];

        $this->db->insert('user', $data);
        $this->db->insert('user_token', $user_token);

        $this->_sendEmail($token, 'verify');


        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('auth');
    }
}
private function _sendEmail($token, $type){
    $config = [
        'protocol' =>'smtp',
        'smtp_host' => 'ssl://smtp.gmail.com',
        'smtp_user' => 'vietafitria00@gmail.com',
        'smtp_pass' => '08977022489',
        'smtp_port' => 465,
        'mailtype'  => 'html',
        'charset'	=> 'utf-8',
        'newline'   => "\r\n"
    ];

    $this->load->library('email', $config);

    $this->email->initialize($config);

    $this->email->from('vietafitria00@gmail.com', 'Vieta Fitria');
    $this->email->to($this->input->post('email'));

    if($type == 'verify'){
    $this->email->subject('Account Verification');
    $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
    }

    if($this->email->send()){
        return true;
    }else {
        echo $this->email->print_debugger();
        die;
    }
}

public function verify(){
    $email = $this->input->get('email');
    $token = $this->input->get('token');

    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if($user){
        $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

        if($user_token){
            if(time() - $user_token['date_created'] < (60 * 60 * 24)){
                $this->db->set('is_active', 1);
                $this->db->where('email', $email);
                $this->db->update('user');

                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">'. $email .' has been activated! Please login.</div>');
                redirect('auth');
            }else{

                $this->db->delete('user', ['email' => $email]);
                $this->db->delete('user_token', ['email' => $email]);

                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                redirect('auth');
            }
        }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
        }
    } else{
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong email.</div>');
        redirect('auth');
    }
}

public function logout(){
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('role_id');

    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logges out</div>');
            redirect('home');
}
public function forgotpass(){

    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    if ($this->form_validation->run() == false) {
    $data['judul'] = 'Forgot Password';
    $this->load->view('template/header', $data);
    $this->load->view('auth/forgot');
    $this->load->view('template/footer');
    }else{
        $email = $this->input->post('emsil');
        $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

        if($user){
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'forgot');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Email is not registered or activated</div>');
            redirect('auth/forgotpass');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Please Check your email to reset your password!</div>');
            redirect('auth/forgotpass');
        }
    }

}
public function index2() {
    //validating form fields
       $this->form_validation->set_rules('username', 'Email Address', 'required');
       $this->form_validation->set_rules('user_password', 'Password', 'required');
       $this->form_validation->set_rules('userCaptcha', 'Captcha', 'required|callback_check_captcha');
       $userCaptcha = $this->input->post('userCaptcha');
     
     if ($this->form_validation->run() == false){
         // numeric random number for captcha
         $random_number = substr(number_format(time() * rand(),0,'',''),0,6);
         // setting up captcha config
         $vals = array(
                'word' => $random_number,
                'img_path' => './captcha_images/',
                'img_url' => base_url().'captcha_images/',
                'img_width' => 140,
                'img_height' => 32,
                'expiration' => 7200
               );
         $data['captcha'] = create_captcha($vals);
         $this->session->set_userdata('captchaWord',$data['captcha']['word']);
         $this->load->view('captcha', $data);
       }else {
         // do your stuff here.
         echo 'I m here clered all validations';
       }
    }
} 