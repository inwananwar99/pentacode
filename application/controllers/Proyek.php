<?php

class Proyek extends CI_Controller{
    public function index(){
        $data = [
            'judul' => 'Data Proyek',
            'title' => 'proyek',
            'proyek' => $this->ModelProyek->getData(),
            'konten' => 'manajer/proyek'
        ];
        return $this->load->view('template',$data);
    }

    public function addProyek(){
        $data = [
            'nama' => $this->input->post('nama'), 
            'lama' => $this->input->post('lama'), 
            'jml' => $this->input->post('jml'), 
        ];
        $this->ModelProyek->add($data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Proyek!</div>');
        return redirect('Proyek');
    }

    public function updateProyek($id){
        $data = [
            'nama' => $this->input->post('nama'), 
            'lama' => $this->input->post('lama'), 
            'jml' => $this->input->post('jml'), 
        ];
        $this->ModelProyek->update($id,$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Proyek!</div>');
        return redirect('Proyek');
    }

    public function deleteProyek($id){
        $this->ModelProyek->delete($id);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus Data Proyek!</div>');
        return redirect('Proyek');
    }
}

?>