<?php
class ModelPenugasan extends CI_Model{
    public function bobot($id,$data){
        $bobot = $this->db->get('bobot');
		if($bobot->num_rows() == 0){
			$this->db->insert('bobot',$data);
		}else if($bobot->num_rows() >= 1){
            $validate = $this->db->get_where('bobot',['id_user'=> $id])->row_array();
            if($validate){
                $this->db->where('id_user', $id);
                $this->db->update('bobot',$data);
            }else{
                $this->db->insert('bobot',$data);
            }
        }
    }

    public function classify($class,$data){
        foreach($data as $d){
           if($class){
               if($d['pengalaman'] == 0){
                   echo 'dapet 1 poin';
               }else{
                   echo 'dapet 2 poin';
               }
           } 
        }
    }

    public function gap($id){
        $gap_data = $this->db->get('gap');
        $bobot = $this->db->get('bobot')->result_array();
        if($gap_data->num_rows() == 0){
            foreach($bobot as $b){
                $gap = [
                    'id_bobot' => $b['id_bobot'],
                    'id_user' => $b['id_user'],
                    'kemampuan' => $b['kemampuan'] - 4,
                    'pengalaman' => $b['pengalaman'] - 3,
                    'prestasi' => $b['prestasi'] - 1
                ];
                $this->db->insert('gap',$gap);
            }
		}else if($gap_data->num_rows() >= 1){
            $validate = $this->db->get_where('gap',['id_user'=> $id])->row_array();
            if($validate){
                foreach($bobot as $b){
                    $gap = [
                        'kemampuan' => $b['kemampuan'] - 4,
                        'pengalaman' => $b['pengalaman'] - 3,
                        'prestasi' => $b['prestasi'] - 1
                    ];
                    $this->db->where('id_user', $id);
                    $this->db->update('gap',$gap);
                }
            }else{
                foreach($bobot as $b){
                    $gap = [
                        'id_bobot' => $b['id_bobot'],
                        'id_user' => $b['id_user'],
                        'kemampuan' => $b['kemampuan'] - 4,
                        'pengalaman' => $b['pengalaman'] - 3,
                        'prestasi' => $b['prestasi'] - 1
                    ];
                    $this->db->insert('gap',$gap);
                }
            }
        }
    }

    public function pembobotan($qualify,$data,$id){
        $d = (int)$data;
        $selisih = $this->db->get('pembobotan')->result_array();
            foreach($selisih as $s1){
                    if($d == $s1['selisih']){
                        $nilai = [
                            'id_user' => $id,
                            $qualify => $s1['bobot_nilai']
                        ];
                    }
            }
        $validate = $this->db->get_where('nilai_bobot',['id_user'=> $id])->row_array();
        if($validate){
            $this->db->where('id_user', $id);
            $this->db->update('nilai_bobot',$nilai);
        }else{
            $this->db->insert('nilai_bobot',$nilai);
        }
    }
}

?>