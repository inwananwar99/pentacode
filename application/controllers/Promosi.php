<?php
class Promosi extends CI_Controller{
    public function pengajuan(){
        if($this->session->userdata('role')=='HRD'){
            $data = [
                'promosi' => $this->ModelPromosi->join3('promosi'),
                'konten' => 'hrd/promosi',
                'title' => 'promosi',
                'judul' => 'Daftar Promosi Jabatan'
            ];
        }else{
            $data = [
                'promosi' => $this->ModelPromosi->join3('promosi'),
                'user' => $this->ModelPromosi->getData('users'),
                'konten' => 'manajer/promosi',
                'title' => 'promosi',
                'judul' => 'Data Promosi Jabatan'
            ];
        }
        return $this->load->view('template',$data);
    }

    public function addPengajuan(){
        $config['upload_path']          = './assets/upload/manajer';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('portofolio')){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal tambah pengajuan!</div>');
            return redirect('Promosi/pengajuan');
        }else{
                $data = [
                    'id_manajer' => $this->input->post('id_manajer'),
                    'id_user' => $this->input->post('id_pegawai'),
                    'jabatan' => $this->input->post('jabatan_pegawai'),
                    'tgl_bergabung' => $this->input->post('tgl'),
                    'jabatan_baru' => $this->input->post('jabatan_baru'),
                    'portofolio' => $this->upload->data('file_name')
                ];
                $this->ModelPromosi->add('promosi',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil tambah pengajuan!</div>');
                return redirect('Promosi/pengajuan');
        }
    }

    public function updatePengajuan($id){
        $config['upload_path']          = './assets/upload/manajer';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 5000;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('portofolio')){
                $data = [
                    'id_manajer' => $this->input->post('id_manajer'),
                    'id_user' => $this->input->post('id_pegawai'),
                    'jabatan' => $this->input->post('jabatan_pegawai'),
                    'tgl_bergabung' => $this->input->post('tgl'),
                    'jabatan_baru' => $this->input->post('jabatan_baru'),
                ];                    
                $this->ModelPromosi->update(['id_promosi' => $id],'promosi',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah promosi!</div>');
                return redirect('Promosi/pengajuan');
        }else{
            $data = [
                'id_manajer' => $this->input->post('id_manajer'),
                'id_user' => $this->input->post('id_pegawai'),
                'jabatan' => $this->input->post('jabatan_pegawai'),
                'tgl_bergabung' => $this->input->post('tgl'),
                'jabatan_baru' => $this->input->post('jabatan_baru'),
                'portofolio' => $this->upload->data('file_name')
            ];
            $this->ModelPromosi->update(['id_promosi' => $id],'promosi',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah promosi!</div>');
            return redirect('Promosi/pengajuan');
        }
    }

    public function deletePengajuan($id){
        $this->ModelPromosi->delete(['id_promosi' => $id],'promosi');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil hapus promosi!</div>');
        return redirect('Promosi/pengajuan');
    }

    public function saw(){
        error_reporting(0);
        //pembobotan
        $promosi = $this->db->get('promosi')->result_array();
        $alt = $this->db->get('saw_alternatif')->num_rows();
        foreach($promosi as $p){
            $pendidikan = $this->db->get_where('pendidikan',['user_id' => $p['id_user']])->result_array();
            if($pendidikan[0]['jenjang'] == "Magister"){
                $pend = 3;
            }elseif($pendidikan[0]['jenjang'] == "Sarjana"){
                $pend = 2;
            }elseif($pendidikan[0]['jenjang'] == "Doktoral"){
                $pend = 1;
            }elseif($pendidikan[0]['jenjang'] == "SMA"){
                $pend = 4;
            }

            $kemampuan = $this->db->get_where('prestasi',['user_id' => $p['id_user']])->num_rows();
            if($kemampuan <= 5){
                $kem = 1;
            }elseif($kemampuan <= 10){
                $kem = 2;
            }elseif($kemampuan <= 15){
                $kem = 3;
            }elseif($kemampuan > 16){
                $kem = 4;
            }
            //prestasi
            $prestasi = $this->db->get_where('sertifikat',['user_id' => $p['id_user']])->num_rows();
            if($prestasi == NULL){
                $prest = 1;
            }elseif($prestasi <= 2){
                $prest = 2;
            }elseif($prestasi <= 4){
                $prest = 3;
            }elseif($prestasi > 5){
                $prest = 4;
            }
            //level
            $level = $this->db->get_where('users',['id' => $p['id_user']])->result_array();
            if($level[0]['id_level'] == 1){
                $lvl = 1;
            }elseif($level[0]['id_level'] == 2){
                $lvl = 2;
            }elseif($level[0]['id_level'] == 3){
                $lvl = 3;
            }elseif($level[0]['id_level'] == 4){
                $lvl = 4;
            }
            //pengalaman
            $pengalaman = $this->db->get_where('riwayat_pekerjaan',['id_user' => $p['id_user']])->num_rows();
            if($pengalaman == NULL){
                $peng = 1;
            }elseif($level <= 2){
                $peng = 2;
            }elseif($level <= 4){
                $peng = 3;
            }elseif($level > 5){
                $peng = 4;
            }
            //proyek
            $proyek1 = $this->db->get_where('proyek',['id_user1' => $p['id_user']])->num_rows();
            $proyek2 = $this->db->get_where('proyek',['id_user2' => $p['id_user']])->num_rows();
            $proyek3 = $this->db->get_where('proyek',['id_user3' => $p['id_user']])->num_rows();
            if($proyek1 || $proyek2 || $proyek3 <= 3){
                $proy = 1;
            }elseif($proyek1 || $proyek2 || $proyek3 <= 2){
                $proy = 2;
            }elseif($proyek1 || $proyek2 || $proyek3 <= 4){
                $proy = 3;
            }elseif($proyek1 || $proyek2 || $proyek3 > 5){
                $proy = 4;
            }

            $data = [
                'id_user' => $p['id_user'],
                'pendidikan' => $pend,
                'kemampuan' => $kem,
                'level' => $lvl,
                'prestasi' => $prest,
                'pengalaman_kerja' => $peng,
                'proyek' => $proy
            ];
            if($alt > 0){
                $this->db->where('id_user', $p['id_user']);
                $this->db->update('saw_alternatif',$data);
            }else{
                $this->db->insert('saw_alternatif',$data);
            }
        }
        $this->ModelPromosi->bobot();
        $this->ModelPromosi->final_result();
        redirect('Promosi/rank');
    }

    public function rank(){
        $data = [
            'rank' => $this->ModelPromosi->rank(),
            'konten' => 'hrd/rank',
            'title' => 'rank',
            'judul' => 'Data Rank Promosi Jabatan'
        ];
    return $this->load->view('template',$data);
    }
}

?>