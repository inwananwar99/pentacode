<?php

class Proyek extends CI_Controller{
    public function index(){
        $data = [
            'judul' => 'Data Proyek',
            'title' => 'proyek',
            'proyek' => $this->ModelProyek->getData('proyek'),
            'pegawai' => $this->ModelProyek->getData('pegawai'),
            'join' => $this->ModelProyek->getJoin(),
            'konten' => 'manajer/proyek'
        ];
        return $this->load->view('template',$data);
    }

    public function addProyek(){
        $data = [
            'nama_proyek' => $this->input->post('nama'), 
            'id_pegawai' => $this->input->post('id_pegawai'), 
            'ket_proyek' => $this->input->post('ket_proyek'), 
            'status_pegawai' => $this->input->post('status_pegawai'), 
            'tgl_awal_proyek' => $this->input->post('tgl_awal_proyek'), 
            'tgl_akhir_proyek' => $this->input->post('tgl_akhir_proyek'), 
            'status_proyek' => $this->input->post('status_proyek') 
        ];
        $this->ModelProyek->add('proyek',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Proyek!</div>');
        return redirect('Proyek');
    }

    public function updateProyek($id){
        $data = [
            'nama_proyek' => $this->input->post('nama'), 
            'id_pegawai' => $this->input->post('id_pegawai'), 
            'ket_proyek' => $this->input->post('ket_proyek'), 
            'status_pegawai' => $this->input->post('status_pegawai'), 
            'tgl_awal_proyek' => $this->input->post('tgl_awal_proyek'), 
            'tgl_akhir_proyek' => $this->input->post('tgl_akhir_proyek'), 
            'status_proyek' => $this->input->post('status_proyek') 
        ];
        $this->ModelProyek->update('proyek',['id_proyek'=>$id],$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Proyek!</div>');
        return redirect('Proyek');
    }

    public function deleteProyek($id){
        $this->ModelProyek->delete('proyek',['id_proyek'=>$id]);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus Data Proyek!</div>');
        return redirect('Proyek');
    }
}

?>