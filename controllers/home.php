<?php
class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mtamu');
        $this->load->library('form_validation');
    }
   
    public function index()
    {
        $data['judul'] = 'Dinas Komunikasi Informatika dan Statistika';
        $this->load->view('header3', $data);
        $this->load->view('footer3');
    }
    public function daftar()
    { 
        $this->load->model('mtamu');
        $data['judul'] = 'Daftar Tamu';
        $data['tamu'] = $this->mtamu->getAlltamu();
        $this->load->view('header3', $data);
        $this->load->view('daftar', $data);
        $this->load->view('footer3');

    }
    public function data()
    { 
        $this->load->model('mtamu');
        $data['judul'] = 'Daftar Tamu';
        $data['tamu'] = $this->mtamu->getAlltamu();
        $this->load->view('data_xml', $data);

    }
       public function hapus($id){
       $this->db->delete('tamu2', array('id' => $id)); 
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('home/daftar3');
    }
    
    public function tambah(){

        $data['judul'] = 'Dinas Komunikasi Informatika dan Statistika';
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required|numeric');
        if($this->form_validation->run() == FALSE){
            $this->load->view('header3', $data); 
           $this->load->view('footer3');
        }else{
            $this->mtamu->tambahDataBukutamu();;
            $this->session->set_flashdata('flash', 'Ditambahkan');
            redirect('home/daftar3');
        }

    }
    public function ubah($id){

        $data['judul'] = 'Edit data';
        $data['tamu2'] = $this->mtamu->getBukutamuById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        if($this->form_validation->run() == FALSE){
            $this->load->view('edit', $data);
            $this->load->view('footer3');
        }else{
            $this->mtamu->ubahDataBukutamu();;
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('home/daftar3');
        }

    }
    public function daftar2()
    { 
        $data['judul'] = 'Daftar Tamu';
        $this->load->model('mtamu');
        $data['tamu2'] = $this->db->get_where('tamu2', ["date_format(waktu, '%d-%m-%Y')" => date('d-m-Y')])->row_array();
        $data['tamu2'] = $this->mtamu->getAlltamu();
 $this->load->view('header3', $data);
        $this->load->view('daftar', $data);
        $this->load->view('footer3');

    }
        public function daftar3()
    { 
        $data['judul'] = 'Daftar Tamu';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tamu2'] = $this->mtamu->getAlltamu();
        $this->load->view('daftar', $data);
        $this->load->view('footer3');

    }
}
