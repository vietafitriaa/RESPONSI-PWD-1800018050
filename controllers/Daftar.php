<?php
class Home extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('mtamu');
        $this->load->library('form_validation');
    }
    public function hapus($nama){
        $this->mtamu->hapusDataMahasiswa($nama);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('home/daftar');
    }
}
