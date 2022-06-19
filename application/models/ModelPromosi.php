<?php
class ModelPromosi extends CI_Model{
    public function getData($table){
        return $this->db->get($table)->result_array();
    }

    public function add($table,$data){
        return $this->db->insert($table, $data);
    }

    public function update($id,$table,$data){
        $this->db->where($id);
        return $this->db->update($table,$data);
    }

    public function delete($id,$table){
        $this->db->where($id);
        return $this->db->delete($table);
    }

    public function getJoin($table1,$table2){
        $this->db->select('*');
        $this->db->from($table1);
        $this->db->join($table2, $table1.'.id_level = '.$table2.'.id_level');
        return $this->db->get()->result_array();
    }

    public function getJoinn(){
        $this->db->select('*');
        $this->db->from('pegawai');
        $this->db->join('jabatan', 'pegawai.id_jabatan = jabatan.id_jabatan');
        return $this->db->get()->result_array();
    }
}
?>