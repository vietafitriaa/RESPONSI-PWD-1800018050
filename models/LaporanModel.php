<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class LaporanModel extends CI_Model {
    public function view_all(){
    return $this->db->get('tamu2')->result(); // Tampilkan semua data transaksi
  }

    public function view_by_date($tgl_awal, $tgl_akhir){
        $tgl_awal = $this->db->escape($tgl_awal);
        $tgl_akhir = $this->db->escape($tgl_akhir);

        $this->db->where('DATE(waktu) BETWEEN '.$tgl_awal.' AND '.$tgl_akhir); // Tambahkan where tanggal nya

    return $this->db->get('tamu2')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
  }
  public function hapusDataMahasiswa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tamu2');
    }
}