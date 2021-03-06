<?php

class Proyek extends CI_Controller{
    public function riwayat(){
        $id = $this->session->userdata('id');
        $data = [
            'judul' => 'Data Proyek',
            'title' => 'proyek',
            'join' => $this->ModelProyek->join($id),
            'konten' => 'pegawai/pekerjaan'
        ];
        //bobot kriteria
        $pekerjaan = $this->db->get_where('riwayat_pekerjaan',['id_user' => $id]);
        $kerja = [
            'id_user' => $id,
            'pengalaman' => $pekerjaan->num_rows()
        ];
        $this->ModelPenugasan->bobot($id,$kerja);
        //klasifikasi nilai bobot
        $bobot = $this->db->get_where('bobot',['id_user'=> $id])->result_array();
        $this->ModelPenugasan->classify('pengalaman',$bobot,$id);

        //gap
        $this->ModelPenugasan->gap($id);

        //pembobotan
		$gap = $this->db->get_where('gap',['id_user'=> $id])->row_array();
		$d =[
			'pengalaman' => $gap['pengalaman']
		];
		$this->ModelPenugasan->pembobotan('pengalaman',$d,$id);

        //core & secondary factor
		$this->ModelPenugasan->cf_sf($id);
        return $this->load->view('template',$data);
    }

    public function index(){
            $data = [
                'judul' => 'Data Proyek',
                'title' => 'proyek',
                'proyek' => $this->ModelProyek->getJoin('proyek'),
                'pegawai' => $this->ModelProyek->getData('pegawai'),
                'konten' => 'manajer/proyek',
                'factor' => $this->ModelPenugasan->final_result(),
            ];
        return $this->load->view('template',$data);
    }

    public function addProyek(){
        $data = [
            'nama_proyek' => $this->input->post('nama'),  
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

    public function rekomendasi($id){
        $data = [
            'id_user1'=> $this->input->post('id_user1'),
            'id_user2'=> $this->input->post('id_user2'),
            'id_user3'=> 14
        ];
        $this->session->set_userdata($data);
        $this->ModelPenugasan->recommend($id,$data);
        return redirect('Proyek');
    }
}

?>