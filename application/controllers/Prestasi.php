<?php
    class Prestasi extends CI_Controller{
        public function index(){
            $data = [
                'prestasi' => $this->ModelPromosi->getData('prestasi'),
                'konten' => 'pegawai/prestasi',
                'title' => 'prestasi',
                'judul' => 'Data Kompetensi'
            ];
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
                        'nama_prestasi' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'tahun' => $this->input->post('tahun'),
                        'lampiran' => $this->upload->data('file_name')
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
                        'nama_prestasi' => $this->input->post('nama'),
                        'bidang' => $this->input->post('bidang'),
                        'tahun' => $this->input->post('tahun')
                    ];                    
                    $this->ModelPromosi->update(['id_prestasi' => $id],'prestasi',$data);
                    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil ubah sertifikat!</div>');
                    return redirect('Prestasi');
            }else{
                $data = [
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