<?php
class ModelPromosi extends CI_Model{
    public function getData($table){
        return $this->db->get($table)->result_array();
    }

    public function jabatanBaru($tingkat){
        return $this->db->query("SELECT * FROM jabatan WHERE tingkat = $tingkat+1")->result_array();
    }

    public function joinJabatan(){
        return $this->db->query("SELECT *FROM users JOIN jabatan ON users.id_jabatan = jabatan.id_jabatan")->result_array();
    }

    public function getHighJabatan($level){
        return $this->db->get_where('jabatan',['tingkat'=> $level])->row_array();
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

    public function join($table,$id){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('users', $table.'.user_id = users.id');
        $this->db->where($id);
        return $this->db->get()->result_array();
    }
    
    public function getJabatan(){
        return $this->db->query("SELECT *FROM promosi as p JOIN users as u ON p.id_user = u.id GROUP BY jabatan_baru")->result_array();
    }

    public function getPegawaiByPromosi(){
        return $this->db->query("SELECT *FROM promosi as p JOIN users as u ON p.id_user = u.id")->result_array();
    }

    public function getDetailPromosi($jabatan){
        return $this->db->query("SELECT *FROM promosi as p JOIN users as u ON p.id_user = u.id WHERE p.jabatan_baru LIKE '%$jabatan%'")->result_array();
    }

    public function join3($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('users', $table.'.id_user = users.id');
        return $this->db->get()->result_array();
    }
    public function join2($table){
        $this->db->select('*');
        $this->db->from($table);
        $this->db->join('users', $table.'.user_id = users.id');
        return $this->db->get()->result_array();
    }

    public function bobot($id){
        $alternatif = $this->db->get_where('saw_alternatif',['id_user'=> $id])->result_array();
        // var_dump($alternatif);die;
        $norm = $this->db->get_where('normalisasi',['id_user'=> $id])->num_rows();
        $min = $this->db->query("SELECT MIN(saw_alternatif.pendidikan) AS pend,MIN(saw_alternatif.level) AS lvl FROM saw_alternatif")->result_array();
        $max = $this->db->query("SELECT MAX(saw_alternatif.proyek) AS proy,MAX(saw_alternatif.pengalaman_kerja) AS kerja,MAX(saw_alternatif.prestasi) AS prest,MAX(saw_alternatif.kemampuan) AS kemampuan FROM saw_alternatif")->result_array();
        foreach($alternatif as $alt){
        //cost
            $pend = $alt['pendidikan']/$min[0]['pend'];
            $level = $alt['level']/$min[0]['lvl'];
        //benefit
            $proy = $alt['proyek']/$max[0]['proy'];
            $pengalaman = $alt['pengalaman_kerja']/$max[0]['kerja'];
            $kemampuan = $alt['kemampuan']/$max[0]['kemampuan'];
            $prestasi = $alt['prestasi']/$max[0]['prest'];
            $data = [
                'id_user' => $alt['id_user'],
                'pendidikan' => $pend,
                'kemampuan' => $kemampuan,
                'level' => $level,
                'prestasi' => $prestasi,
                'pengalaman_kerja' => $pengalaman,
                'proyek' => $proy
            ];
            if($norm > 0){
                $this->db->where('id_user', $alt['id_user']);
                $this->db->update('normalisasi',$data);
            }else{
                $this->db->insert('normalisasi',$data);
            }
        }
    }

    public function final_result($id){
        $normalisasi = $this->db->get_where('normalisasi',['id_user'=>$id])->result_array();
        $bobot = $this->db->get_where('saw_nilai_bobot',['id_user'=>$id])->num_rows();
        foreach($normalisasi as $norm){
            $data =[
                'id_user' => $norm['id_user'],
                'nilai' => ($norm['pendidikan']*15)+($norm['kemampuan']*25)+($norm['pengalaman_kerja']*15)+($norm['proyek']*25)+($norm['prestasi']*10)+($norm['level']*10)
            ];
            if($bobot > 0){
                $this->db->where('id_user', $norm['id_user']);
                $this->db->update('saw_nilai_bobot',$data);
            }else{
                $this->db->insert('saw_nilai_bobot',$data);
            }
        }      
    }

    public function rank($jabatan){
        $promosi = $this->db->get('promosi')->result_array();
        $saw_nilai_bobot = $this->db->get('saw_nilai_bobot')->result_array();
        foreach($promosi as $p){
            foreach($saw_nilai_bobot as $s){
                if($p['id_user'] == $s['id_user']){
                    $data = [
                        'id_promosi' => $p['id_promosi']
                    ];
                    $this->db->where('id_user', $s['id_user']);
                    $this->db->update('saw_nilai_bobot',$data);
                }
            }
        }
        return $this->db->query("SELECT *FROM promosi as p JOIN users as u ON p.id_user = u.id JOIN saw_nilai_bobot as snb ON p.id_promosi = snb.id_promosi WHERE p.jabatan_baru LIKE '%$jabatan%' ORDER BY snb.nilai DESC")->result_array();
    }

    public function highPromotionById($jabatan){
        return $this->db->query("SELECT p.id_promosi FROM promosi as p JOIN users as u ON p.id_user = u.id JOIN saw_nilai_bobot as snb ON p.id_promosi = snb.id_promosi WHERE p.jabatan_baru LIKE '%$jabatan%' ORDER BY snb.nilai DESC LIMIT 1")->result_array();
    }

    public function updatePromotionStatus($id){
        $this->db->where('id_promosi', $id);
        return $this->db->update('promosi',['status'=>TRUE]);
    }

    public function updateNewJabatan($id_user,$id_jabatan){
        $this->db->where('id', $id_user);
        return $this->db->update('users',['id_jabatan'=>$id_jabatan]);
    }
}
?>