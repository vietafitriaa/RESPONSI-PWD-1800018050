<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __contruct()
	{
		parent::__contruct();
		$this->load->model('mtamu2');
		$this->load->library('form_validation');
	}
	public function index(){
		$data['judul'] = 'Profil';
		$data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('template/header2', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/index', $data);
		$this->load->view('template/footer');
	}
	public function daftar()
	{ 
		$data['judul'] = 'Daftar Tamu';
        $this->load->model('mtamu2');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['tamu2'] = $this->mtamu2->getAlltamu();
        if ($this->input->post('keyword')) {
        	# code...
        	$data['tamu2'] = $this->mtamu2->cariData();
        }
		$this->load->view('template/header2', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/daftar', $data);
		$this->load->view('template/footer', $data);

    }
        public function hapus($id){
       $this->db->delete('tamu2', array('id' => $id)); 
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('user/daftar');
    }
    public function ubah($id){
        $data['judul'] = 'Form Edit';
         $this->load->model('mtamu2');
        $where = array('id' => $id);
        $data['tamu2'] = $this->mtamu2->edit($where, 'tamu2')->result();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/header2',$data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/ubah', $data);
		$this->load->view('template/footer',$data);
    }
    public function ubah2(){

        $data['judul'] = 'Form Edit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('mtamu2');
        	$id = $this->input->post('id');
        	$nama= $this->input->post('nama');
            $instansi = $this->input->post('instansi');
            $keperluan = $this->input->post('keperluan');
            $email = $this->input->post('email');
            $nohp = $this->input->post('nohp');

        $data = array(
        	'nama' => $nama,
        	'instansi' => $instansi,
        	'keperluan' => $keperluan,
        	'email' => $email,
        	'nohp' => $nohp,
        );
        $where = array(
        	'id' => $id
        );

        $this->mtamu2->update($where, $data, 'tamu2');
        redirect('User/daftar');
    }
	public function ubah3($id = null){

        $data['judul'] = 'Form Edit';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('mtamu2');
		$data['tamu2'] = $this->mtamu2->getBukutamuById($id);
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('instansi', 'Instansi', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required');
        $this->form_validation->set_rules('nohp', 'No HP', 'required');
        if($this->form_validation->run() == FALSE){
        $this->load->view('template/header2', $data);
		$this->load->view('template/sidebar', $data);
		$this->load->view('template/topbar', $data);
		$this->load->view('user/ubah', $data);
		$this->load->view('template/footer', $data);
        }else{
            $this->mtamu2->ubahDataBukutamu();
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user/daftar');
        }

    }
}