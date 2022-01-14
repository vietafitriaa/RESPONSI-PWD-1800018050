<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class laporan extends CI_Controller {

  public function __construct(){
    parent::__construct();

    $this->load->model('LaporanModel');
  }

    public function index(){
        $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $tamu2 = $this->LaporanModel->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel
            $url_cetak = 'laporan/cetak';
            $label = 'Semua Data Buku Tamu';
        }else{ // Jika terisi
            $tamu2 = $this->LaporanModel->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $url_cetak = 'laporan/cetak?tgl_awal='.$tgl_awal.'&tgl_akhir='.$tgl_akhir;
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $data['tamu2'] = $tamu2;
        $data['url_cetak'] = base_url('index.php/'.$url_cetak);
        $data['label'] = $label;
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Laporan';
        $this->load->view('template/header2', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/topbar', $data);
        $this->load->view('list', $data);
        $this->load->view('template/footer', $data);
    }

  public function cetak(){
    $tgl_awal = $this->input->get('tgl_awal'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)
        $tgl_akhir = $this->input->get('tgl_akhir'); // Ambil data tgl_awal sesuai input (kalau tidak ada set kosong)

        if(empty($tgl_awal) or empty($tgl_akhir)){ // Cek jika tgl_awal atau tgl_akhir kosong, maka :
            $tamu2 = $this->LaporanModel->view_all();  // Panggil fungsi view_all yang ada di TransaksiModel
            $label = 'Semua Data Buku Tamu';
        }else{ // Jika terisi
            $tamu2 = $this->LaporanModel->view_by_date($tgl_awal, $tgl_akhir);  // Panggil fungsi view_by_date yang ada di TransaksiModel
            $tgl_awal = date('d-m-Y', strtotime($tgl_awal)); // Ubah format tanggal jadi dd-mm-yyyy
            $tgl_akhir = date('d-m-Y', strtotime($tgl_akhir)); // Ubah format tanggal jadi dd-mm-yyyy
            $label = 'Periode Tanggal '.$tgl_awal.' s/d '.$tgl_akhir;
        }

        $data['label'] = $label;
        $data['tamu2'] = $tamu2;

    ob_start();
    $this->load->view('print', $data);
    $html = ob_get_contents();
        ob_end_clean();

    require './aset3/assets/libraries/html2pdf/autoload.php'; // Load plugin html2pdfnya

    $pdf = new Spipu\Html2Pdf\Html2Pdf('P','A4','en');  // Settingan PDFnya
    $pdf->WriteHTML($html);
    $pdf->Output('Data Buku Tamu.pdf', 'D');
  }
    public function hapus($id){
       $this->db->delete('tamu2', array('id' => $id)); 
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('laporan/index');
    }
}