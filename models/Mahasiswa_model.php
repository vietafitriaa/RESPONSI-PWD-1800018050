<?php 

class Mahasiswa_model extends CI_model {
    public function getAllMahasiswa()
{
    return $query = $this->db->get('mahasiswa')->result_array();
}
public function tamabahDataMahasiswa(){
    $data = [
        "nama" => $this->input->post('nama', true),
        "nim" => $this->input->post('nim', true),
        "email" => $this->input->post('email', true),
        "jurusan" => $this->input->post('jurusan', true),
    ];
    $this->db->insert('mahasiswa', $data);
}
}