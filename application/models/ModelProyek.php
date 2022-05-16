<?php
class ModelProyek extends CI_Model{
    public function getData(){
        return $this->db->get('proyek')->result_array();
    }

    public function add($data){
        return $this->db->insert('proyek',$data);
    }

    public function update($id,$data){
        $this->db->where('id',$id);
        return $this->db->update('proyek',$data);
    }

    public function delete($id){
        $this->db->where('id',$id);
        return $this->db->delete('proyek');
    }
}
?>
