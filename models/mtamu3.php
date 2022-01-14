<?php 
class mtamu3 extends CI_model {
    public function getAlltamu()
    {
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
    public function getBukutamuById($id){
        return $this->db->get_where('tamu2', ['id' => $id])->row_array();
    }
    function edit_data($where,$table){      
    return $this->db->get_where($table,$where);
    }
        function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }
}
 ?>