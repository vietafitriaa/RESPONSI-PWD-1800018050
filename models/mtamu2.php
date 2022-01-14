<?php 
class mtamu2 extends CI_model {
    public function getAlltamu()
    {
        return $this->db->get('tamu2')->result_array();
        // return $this->db->get($this->_table)->result();
    }
    public function cariData(){
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('instansi', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('keperluan', $keyword);
        $this->db->or_like('nohp', $keyword);
        return $this->db->get('tamu2')->result_array();
    }
    public function ubahDataBukutamu()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "instansi" => $this->input->post('instansi', true),
            "keperluan" => $this->input->post('keperluan', true),
            "email" => $this->input->post('email', true),
            "nohp" => $this->input->post('nohp', true ),
            "waktu" => $this->input->post('waktu'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('tamu2', $data);
    }
    // public function getBukutamuById($id){
        // return $this->db->get_where($this->_table, ["tamu2" => $id])->row();
    // }
    public function getBukutamuById($id){
        return $this->db->get_where('tamu2', ['id' => $id])->row_array();
    }
    public function edit($where, $table){
        return $this->db->get_where($table, $where);
    }
    public function update($where, $data, $table){
        $this->db->where($where);
        $this->db->update($table, $data);
    }
}
 ?>