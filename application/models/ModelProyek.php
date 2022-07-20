<?php
class ModelProyek extends CI_Model{
    public function getData($table){
        return $this->db->get($table)->result_array();
    }

    public function add($table,$data){
        return $this->db->insert($table,$data);
    }

    public function update($table,$id,$data){
        $this->db->where($id);
        return $this->db->update($table,$data);
    }

    public function delete($table,$id){
        $this->db->where($id);
        return $this->db->delete($table);
    }
    public function getJoin(){
        return $this->db->query("SELECT *FROM proyek JOIN pegawai ON proyek.id_pegawai = pegawai.id_pegawai")->result_array();
    }
    public function join($id){
        return $this->db->query("SELECT *FROM riwayat_pekerjaan JOIN users ON riwayat_pekerjaan.id_user = users.id WHERE riwayat_pekerjaan.id_user = $id")->result_array();
    }
}
?>
