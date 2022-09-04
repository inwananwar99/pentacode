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

    public function classify($class,$data,$id){
        foreach($data as $d){
           if($class == 'pengalaman'){
               if($d['pengalaman'] == 0){
                   $n =[
                    'id_bobot'=> $d['id_bobot'],
                    'id_user' => $d['id_user'],
                    'pengalaman' => 1
                ];
               }else if($d['pengalaman'] <= 2){
                   $n =[
                    'id_bobot'=> $d['id_bobot'],
                    'id_user' => $d['id_user'],
                    'pengalaman' => 2
                ];
               }else if($d['pengalaman'] <= 4){
                   $n =[
                    'id_bobot'=> $d['id_bobot'],
                    'id_user' => $d['id_user'],
                    'pengalaman' => 3
                ];
               }else{
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'pengalaman' => 4
                    ];
               }
           }else if($class == 'prestasi'){
                if($d['prestasi'] == 0){
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'prestasi' => 1
                    ];
                }else if($d['prestasi'] <= 2){
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'prestasi' => 2
                    ];
                }else if($d['prestasi'] <= 4){
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'prestasi' => 3
                    ];
                }else{
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'prestasi' => 4
                    ];
                }
           }elseif($class == 'kemampuan'){
                if($d['kemampuan'] <= 5){
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'kemampuan' => 1
                    ];
                }else if($d['kemampuan'] <= 10){
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'kemampuan' => 2
                    ];
                }else if($d['kemampuan'] <= 15){
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'kemampuan' => 3
                    ];
                }else{
                    $n =[
                        'id_bobot'=> $d['id_bobot'],
                        'id_user' => $d['id_user'],
                        'kemampuan' => 4
                    ];
                }
           }
        }
        if($data){
            $this->db->where('id_user', $id);
            $this->db->update('bobot',$n);
        }else{
            $this->db->insert('bobot',$n);
        }
    }

    public function gap($id){
        $gap_data = $this->db->get('gap');
        $bobot = $this->db->get_where('bobot',['id_user'=> $id])->result_array();
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
        $d = (int)$data[$qualify];
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

    public function cf_sf($id){
        $factor = $this->db->get('cf_sf')->result_array();
        $n_bobot = $this->db->get_where('nilai_bobot',['id_user'=>$id])->result_array();
        foreach ($n_bobot as $b) {
            $cf = $b['kemampuan']+$b['prestasi']/2;
            $sf = $b['pengalaman']/1;
            $nilai = [
                'id_user' => $id,
                'cf'=>$cf,
                'sf'=>$sf,
                'final_result' => (0.6*$cf)+(0.4*$sf)
            ];
        }
        $validate = $this->db->get_where('cf_sf',['id_user'=> $id])->row_array();
        if($validate){
            $this->db->where('id_user', $id);
            $this->db->update('cf_sf',$nilai);
        }else{
                $this->db->insert('cf_sf',$nilai);
        }
    }

    public function final_result(){
        return $this->db->query("SELECT * FROM cf_sf JOIN users ON cf_sf.id_user = users.id WHERE users.id_proyek2 IS NULL ORDER BY cf_sf.final_result DESC")->result_array();
    }

    public function recommend($id,$data){
        $user = $this->db->get('users')->result_array();
        foreach($user as $u):
            $this->db->where('id_proyek', $id);
            $this->db->update('proyek',$data);
        endforeach;
    }

    public function updateUserProject($id_proyek,$id1,$id2,$id3){
        $user = $this->db->get('users')->result_array();
        foreach($user as $u):
           if($u['id_proyek1'] !== NULL){
                //ketika id_proyek1 NULL, maka update kolom id_proyek1
                    $this->db->query("UPDATE users SET users.id_proyek2 = $id_proyek WHERE users.id IN ($id1,$id2,$id3) AND users.id_proyek1 IS NOT NULL");
            }else{
                $data = $id_proyek;
                $this->db->query("UPDATE users SET users.id_proyek1 = $data WHERE users.id IN ($id1,$id2,$id3) AND users.id_proyek2 IS NULL");
            }
        endforeach;
    }
}

?>