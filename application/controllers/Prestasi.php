<?php
    class Prestasi extends CI_Controller{
        public function index(){
            if($this->session->userdata('role') == 'Pegawai'){
            $user_id = $this->session->userdata('id');
            $data = [
                'prestasi' => $this->ModelPromosi->join('prestasi',['user_id'=>$user_id]),
                'konten' => 'pegawai/prestasi',
                'title' => 'prestasi',
                'judul' => 'Data Kompetensi'
            ];
            }else{
                $data = [
                    'konten' => 'pegawai/prestasi',
                    'title' => 'prestasi',
                    'judul' => 'Data Kompetensi',
                    'prestasi' => $this->ModelPromosi->join2('prestasi')
                ];
            }
            $id = $this->session->userdata('id');
            //bobot kriteria
            $prestasi = $this->db->get_where('prestasi',['user_id' => $id]);
            $prest = [
                'id_user' => $id,
                'kemampuan' => $prestasi->num_rows()
            ];
            $this->ModelPenugasan->bobot($id,$prest);
            
            //klasifikasi nilai bobot
            $bobot = $this->db->get_where('bobot',['id_user'=> $id])->result_array();
            $this->ModelPenugasan->classify('kemampuan',$bobot,$id);
            
            //gap
            $this->ModelPenugasan->gap($id);

            //pembobotan nilai
            $gap = $this->db->get_where('gap',['id_user'=> $id])->row_array();
            $d =[
                'kemampuan' => $gap['kemampuan']
            ];
            $this->ModelPenugasan->pembobotan('kemampuan',$d,$id);

            $this->load->view('template',$data);
        }
        
        public function addPrestasi(){
            $config['upload_path']          = './assets/img/pegawai/prestasi';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('lampiran')){
                $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal tambah prestasi!</div>');
                return redirect('Prestasi');
            }else{
                if(!$this->input->post('nama','bidang','tahun')){
                    $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal tambah prestasi! Mohon isi detail sertifikat</div>');
                    return redirect('Prestasi');
                }else{
                    $data = [
                        'user_id' => $this->session->userdata('id'),
                        'nama_prestasi' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'tahun' => $this->input->post('tahun'),
                        'lampiran' => $this->upload->data('file_name'),
                        'status' => 'Diajukan'
                    ];
                    $this->ModelPromosi->add('prestasi',$data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil tambah prestasi!</div>');
                    return redirect('Prestasi');
                }
            }
        }

        public function updatePrestasi($id){
            $config['upload_path']          = './assets/img/pegawai/prestasi';
            $config['allowed_types']        = 'gif|jpg|png|pdf';
            $config['max_size']             = 5000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('lampiran')){
                    $data = [
                        'user_id' => $this->session->userdata('id'),
                        'nama_prestasi' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'tahun' => $this->input->post('tahun')
                    ];                    
                    $this->ModelPromosi->update(['id_prestasi' => $id],'prestasi',$data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah sertifikat!</div>');
                    return redirect('Prestasi');
            }else{
                $data = [
                    'user_id' => $this->session->userdata('id'),
                    'nama_prestasi' => $this->input->post('nama'),
                    'bidang' => $this->input->post('bidang'),
                    'tahun' => $this->input->post('tahun'),
                    'lampiran' => $this->upload->data('file_name')
                ];
                $this->ModelPromosi->update(['id_prestasi' => $id],'prestasi',$data);
                $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah prestasi!</div>');
                return redirect('Prestasi');
            }
        }

        public function deletePrestasi($id){
            $this->ModelPromosi->delete(['id_prestasi' => $id],'prestasi');
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil hapus prestasi!</div>');
            return redirect('Prestasi');
        }

    }

?>