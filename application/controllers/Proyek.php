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
            // var_dump($data['factor']);die;
        return $this->load->view('template',$data);
    }

    public function addProyek(){
        $data = [
            'nama_proyek' => $this->input->post('nama'),  
            'ket_proyek' => $this->input->post('ket_proyek'),  
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
            'ket_proyek' => $this->input->post('ket_proyek'), 
            'tgl_awal_proyek' => $this->input->post('tgl_awal_proyek'), 
            'tgl_akhir_proyek' => $this->input->post('tgl_akhir_proyek'), 
            'status_proyek' => $this->input->post('status_proyek') 
        ];
        $this->ModelProyek->update('proyek',['id_proyek'=>$id],$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Proyek!</div>');
        return redirect('Proyek');
    }

    public function deleteProyek($id){
        $this->ModelProyek->delete('proyek',['id_proyek'=>$id]);
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Proyek!</div>');
        return redirect('Proyek');
    }

    public function rekomendasi($id){
        $data = [
            'id_user1'=> $this->input->post('id_user1'),
            'id_user2'=> $this->input->post('id_user2'),
            'id_user3'=> $this->input->post('id_user3')
        ];
        $this->session->set_userdata($data);
        $this->ModelPenugasan->recommend($id,$data);
        $this->ModelPenugasan->updateUserProject($id,$this->input->post('id_user1'),$this->input->post('id_user2'),$this->input->post('id_user3'));
        return redirect('Proyek');
    }

    public function detailProyek($u1,$u2,$u3){
        $data = $this->ModelProyek->getDetailProyek($u1,$u2,$u3);
        echo json_encode($data);
    }

    public function data_proyek()
	{

    $data = [
        'judul' => 'Data Proyek',
        'title' => 'proyek',
        'data_proyek' => $this->ModelProyek->getJoin('proyek'),

        'konten' => 'manajer/data_proyek',

    ];
    // var_dump($data['factor']);die;
    return $this->load->view('template',$data);
	}


  public function do_edit_pegawai($id_proyek)
	{
		$id_user1 = $_POST['id_user1'];
    $id_user2 = $_POST['id_user2'];
    $id_user3 = $_POST['id_user3'];

		$data = array('id_user1' => $id_user1,'id_user2' => $id_user2,'id_user3' => $id_user3);
		$where = array('id_proyek' => $id_proyek);

		$res = $this->ModelProyek->UpdateData('proyek', $data, $where);
		if ($res >= 1) {
			$this->session->set_flashdata('pesan', 'Validasi Pengajuan Judul' . $nama . 'Berhasil');
			redirect('Proyek/data_proyek');
		} else {
			echo "<h3>Delete Data Pengajuan Judul Gagal</h3>";
		}
    }

}

?>