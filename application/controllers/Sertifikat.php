<?php
    class Sertifikat extends CI_Controller{
        public function index(){
            if($this->session->userdata('role') == 'Pegawai'){
            $user_id = $this->session->userdata('id');
            $data = [
                'sertifikat' => $this->ModelPromosi->join('sertifikat',['user_id'=>$user_id]),
                'konten' => 'pegawai/sertifikat',
                'title' => 'sertifikat',
                'judul' => 'Data Sertifikat'
            ];
            }else{
                $data = [
                    'konten' => 'pegawai/sertifikat',
                    'title' => 'sertifikat',
                    'judul' => 'Data Sertifikat',
                    'sertifikat' => $this->ModelPromosi->join2('sertifikat')
                ];
            }
            $id = $this->session->userdata('id');
            //bobot kriteria
            $sertifikat = $this->db->get_where('sertifikat',['user_id' => $id]);
            $sert = [
                'id_user' => $id,
                'prestasi' => $sertifikat->num_rows()
            ];
            $this->ModelPenugasan->bobot($id,$sert);
            //klasifikasi nilai bobot
            $bobot = $this->db->get_where('bobot',['id_user'=> $id])->result_array();
            $this->ModelPenugasan->classify('prestasi',$bobot,$id);
            //gap
            $this->ModelPenugasan->gap($id);
            
            //pembobotan nilai
            $gap = $this->db->get_where('gap',['id_user'=> $id])->row_array();
            $d =[
                'prestasi' => $gap['prestasi']
            ];
            $this->ModelPenugasan->pembobotan('prestasi',$d,$id);
            $this->load->view('template',$data);
        }
        
        public function addSertifikat(){
            $config['upload_path']          = './assets/img/pegawai/sertifikat';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('lampiran')){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal tambah sertifikat!</div>');
                return redirect('Sertifikat');
            }else{
                if(!$this->input->post('jenis','bidang_studi','tahun')){
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal tambah sertifikat! Mohon isi detail sertifikat</div>');
                    return redirect('Sertifikat');
                }else{
                    $data = [
                        'user_id' => $this->session->userdata('id'),
                        'jenis_sert' => $this->input->post('jenis'),
                        'bidang_studi' => $this->input->post('bidang_studi'),
                        'thn_sert' => $this->input->post('tahun'),
                        'lampiran' => $this->upload->data('file_name'),
                        'status' => 'Diajukan'
                    ];
                    $this->ModelPromosi->add('sertifikat',$data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil tambah sertifikat!</div>');
                    return redirect('Sertifikat');
                }
            }
        }

        public function updateSertifikat($id){
            $config['upload_path']          = './assets/img/pegawai/sertifikat';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('lampiran')){
                    $data = [
                        'user_id' => $this->session->userdata('id'),
                        'jenis_sert' => $this->input->post('jenis'),
                        'bidang_studi' => $this->input->post('bidang_studi'),
                        'thn_sert' => $this->input->post('tahun')
                    ];                    
                    $this->ModelPromosi->update(['id_sert' => $id],'sertifikat',$data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah sertifikat!</div>');
                    return redirect('Sertifikat');
            }else{
                $data = [
                    'user_id' => $this->session->userdata('id'),
                    'jenis_sert' => $this->input->post('jenis'),
                    'bidang_studi' => $this->input->post('bidang_studi'),
                    'thn_sert' => $this->input->post('tahun'),
                    'lampiran' => $this->upload->data('file_name')
                ];
                $this->ModelPromosi->update(['id_sert' => $id],'sertifikat',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah sertifikat!</div>');
                return redirect('Sertifikat');
            }
        }

        public function deleteSertifikat($id){
            $this->ModelPromosi->delete(['id_sert' => $id],'sertifikat');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil hapus sertifikat!</div>');
            return redirect('Sertifikat');
        }

    }

?>