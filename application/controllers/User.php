<?php
class User extends CI_Controller{
    public function index(){
            $data = [
            'user' => $this->ModelUser->getJoin('users','level','id_level','id_level'),
            'level' => $this->ModelUser->getData('level'),
            'pegawai' => $this->ModelUser->getData('pegawai'),
            'konten' => 'pegawai/index',
            'title' => 'user',
            'judul' => 'Data User'
        ];
        // var_dump($data['user']);die;
        $this->load->view('template',$data);
    }

    public function addUser(){
        $config['upload_path']          = './assets/img/pegawai';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Silahkan upload foto Anda terlebih dahulu!</div>');
            return redirect('User');
        }else{
            $data = [
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status_aktif' => 1,
                'tanggal_buat' => date('Y-m-d'),
                'password' => $this->input->post('password'),
                'id_level' => $this->input->post('id_level'),
                'foto' => $this->upload->data('file_name')
            ];
        }
        $this->ModelUser->add('users',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
        return redirect('User');
    }

    public function updateUser($id){
        $config['upload_path']          = './assets/img/pegawai';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
            $data = [
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status_aktif' => 1,
                'id_level' => $this->input->post('id_level')
            ];
        }else{
            $data = [
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status_aktif' => 1,
                'password' => $this->input->post('password'),
                'foto' => $this->upload->data('file_name')
            ];
        }
        $this->ModelUser->update(['id'=> $id],'users',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data User!</div>');
        return redirect('User');
    }

    public function deleteUser($id){
        $this->ModelUser->delete(['id' => $id],'users');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus Data User!</div>');
        return redirect('User');
    }

    public function pegawai(){
        $data = [
        'pegawai' => $this->ModelUser->getJoinn('pegawai'),
        'jabatan' => $this->ModelUser->getData('jabatan'),
        'konten' => 'pegawai/pegawai',
        'title' => 'pegawai',
        'judul' => 'Data Pegawai'
    ];
    $this->load->view('template',$data);
}

public function addPegawai(){
    $data = [
        'nama_pegawai' => $this->input->post('nama'),
        'tmp_lahir' => $this->input->post('tempat'),
        'tgl_lahir' => $this->input->post('tanggal'),
        'jenis_kelamin' => $this->input->post('jk'),
        'alamat' => $this->input->post('alamat'),
        'no_tlp' => $this->input->post('no_telp'),
        'email' => $this->input->post('email'),
        'id_jabatan' => $this->input->post('id_jabatan'),
    ];
    if(!$data){
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Mohon lengkapi terlebih dahulu!</div>');
        return redirect('User/pegawai');
    }else{
            $this->ModelUser->add('pegawai',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
            return redirect('User/pegawai');
    }
}

public function updatePegawai($id){
    $data = [
        'nama_pegawai' => $this->input->post('nama'),
        'tmp_lahir' => $this->input->post('tempat'),
        'tgl_lahir' => $this->input->post('tanggal'),
        'jenis_kelamin' => $this->input->post('jk'),
        'alamat' => $this->input->post('alamat'),
        'no_tlp' => $this->input->post('no_telp'),
        'email' => $this->input->post('email'),
        'id_jabatan' => $this->input->post('id_jabatan'),
    ];
        $this->ModelUser->update(['id_pegawai'=> $id],'pegawai',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Pegawai!</div>');
        return redirect('User/pegawai');
}

public function deletePegawai($id){
    $this->ModelUser->delete(['id_pegawai' => $id],'pegawai');
    $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus Data Pegawai!</div>');
    return redirect('User/pegawai');
}

    public function level(){
        $data = [
            'level' => $this->ModelUser->getData('level'),
            'konten' => 'pegawai/level',
            'title' => 'level',
            'judul' => 'Data Level Pegawai'
        ];
        $this->load->view('template',$data);
    }
    public function addLevel(){
        $data = [
            'level' => $this->input->post('level')
        ];
        $this->ModelUser->add('level',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Level!</div>');
        return redirect('User/level');
    }
    public function updateLevel($id){
        $data = [
            'level' => $this->input->post('level'),
        ];
        $this->ModelUser->update(['id_level',$id],'level',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Level!</div>');
        return redirect('User/level');
    }
    public function deleteLevel($id){
        $this->ModelUser->delete(['id_level' => $id],'level');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Level!</div>');
        return redirect('User/level');
    }

    public function jabatan(){
        $data = [
            'jabatan' => $this->ModelUser->getJoin('jabatan','level'),
            'level' => $this->ModelUser->getData('level'),
            'konten' => 'admin/jabatan',
            'title' => 'jabatan',
            'judul' => 'Data Jabatan Pegawai'
        ];
        $this->load->view('template',$data);
    }

    public function addJabatan(){
        $data = [
            'nama_jabatan' => $this->input->post('jabatan'),
            'jobdesc' => $this->input->post('desc'),
            'id_level' => $this->input->post('id_level')
        ];
        $this->ModelUser->add('jabatan',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Jabatan!</div>');
        return redirect('User/jabatan');
    }

    public function updateJabatan($id){
        $data = [
            'nama_jabatan' => $this->input->post('jabatan'),
            'jobdesc' => $this->input->post('jobdesc'),
            'id_level' => $this->input->post('id_level')
        ];
        $this->ModelUser->update(['id_jabatan' => $id],'jabatan',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Jabatan!</div>');
        return redirect('User/jabatan');
    }

    public function deleteJabatan($id){
        $this->ModelUser->delete(['id_jabatan' => $id],'jabatan');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Jabatan!</div>');
        return redirect('User/jabatan');
    }

    public function data_profil(){
        $data = [
            'konten' => 'pegawai/profil',
            'title' => 'profil',
            'judul' => 'Data Profil Pegawai'
        ];
        $this->load->view('template',$data);
    }
    public function data_divisi(){
        $data = [
            'konten' => 'pegawai/divisi',
            'title' => 'divisi',
            'judul' => 'Data Divisi Pegawai',
            'divisi' => $this->ModelUser->getData('divisi')
        ];
        $this->load->view('template',$data);
    }

    public function addDivisi(){
        $data = [
            'nama_divisi' => $this->input->post('nama')
        ];
        $this->ModelUser->add('divisi',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Divisi!</div>');
        return redirect('User/data_divisi');
    }

    public function updateDivisi($id){
        $data = [
            'nama_divisi' => $this->input->post('nama')
        ];
        $this->ModelUser->update(['id_divisi' => $id],'divisi',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Divisi!</div>');
        return redirect('User/data_divisi');
    }

    public function deleteDivisi($id){
        $this->ModelUser->delete(['id_divisi' => $id],'divisi');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Divisi!</div>');
        return redirect('User/data_divisi');
    }

    public function data_jabatan(){
        $data = [
            'konten' => 'pegawai/jabatan',
            'title' => 'divisi',
            'judul' => 'Data Jabatan Pegawai',
            'jabatan' => $this->ModelUser->getJoin('jabatan','level')
        ];
        $this->load->view('template',$data);
    }

    public function pendidikan(){
        if($this->session->userdata('role') == 'Pegawai'){
            $user_id = $this->session->userdata('id');
            $data = [
                'konten' => 'pegawai/pendidikan',
                'title' => 'pendidikan',
                'judul' => 'Data Pendidikan Pegawai',
                'pendidikan' => $this->ModelPromosi->join('pendidikan',['user_id'=>$user_id])
            ];
        }else{
            $data = [
                'konten' => 'pegawai/pendidikan',
                'title' => 'pendidikan',
                'judul' => 'Data Pendidikan Pegawai',
                'pendidikan' => $this->ModelPromosi->join2('pendidikan')
            ];
        }
        $this->load->view('template',$data);
    }

    public function addPendidikan(){
        $config['upload_path']          = './assets/img/pegawai/pendidikan';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('lampiran')){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Gagal tambah pendidikan!</div>');
            return redirect('User/pendidikan');
        }else{
            $data = [
                'user_id' => $this->session->userdata('id'),
                'jenjang' => $this->input->post('jenjang'),
                'gelar' => $this->input->post('gelar'),
                'bidang_studi' => $this->input->post('bidang_studi'),
                'perguruan_tinggi' => $this->input->post('pt'),
                'thn_lulus' => $this->input->post('tahun'),
                'lampiran' => $this->upload->data('file_name'),
                'status' => 'Diajukan'
            ];
            $this->ModelUser->add('pendidikan',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan Data Pendidikan!</div>');
            return redirect('User/pendidikan');
        }
    }

    public function updatePendidikan($id){
        $config['upload_path']          = './assets/img/pegawai/pendidikan';
        $config['allowed_types']        = 'gif|jpg|png|pdf';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('lampiran')){
            $data = [
                'user_id' => $this->session->userdata('id'),
                'jenjang' => $this->input->post('jenjang'),
                'gelar' => $this->input->post('gelar'),
                'bidang_studi' => $this->input->post('bidang_studi'),
                'perguruan_tinggi' => $this->input->post('pt'),
                'thn_lulus' => $this->input->post('tahun'),
                'status' => $this->input->post('status')
            ];
            $this->ModelUser->update(['id_pendidikan' => $id],'pendidikan',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Pendidikan!</div>');
            return redirect('User/pendidikan');
        }else{
            $data = [
                'user_id' => $this->session->userdata('id'),
                'jenjang' => $this->input->post('jenjang'),
                'gelar' => $this->input->post('gelar'),
                'bidang_studi' => $this->input->post('bidang_studi'),
                'perguruan_tinggi' => $this->input->post('pt'),
                'thn_lulus' => $this->input->post('tahun'),
                'lampiran' => $this->upload->data('file_name'),
                'status' => $this->input->post('status')
            ];
            $this->ModelUser->update(['id_pendidikan' => $id],'pendidikan',$data);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Pendidikan!</div>');
            return redirect('User/pendidikan');
        }
    }

    public function deletePendidikan($id){
        $this->ModelUser->delete(['id_pendidikan' => $id],'pendidikan');
        $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Berhasil menghapus Data Pendidikan!</div>');
        return redirect('User/pendidikan');
    }

    public function admin(){
        $data = [
            'admin' => $this->ModelUser->getJoinAdmin(),
            'level' => $this->ModelUser->getByLevel(),
            'pegawai' => $this->ModelUser->getData('pegawai'),
            'divisi' => $this->ModelUser->getData('divisi'),
            'konten' => 'admin/index',
            'title' => 'admin',
            'judul' => 'Data Admin'
        ];
        $this->load->view('template',$data);
    }

    public function addAdmin(){
        $config['upload_path']          = './assets/img/admin';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload('foto')){
            $this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Silahkan upload foto Anda terlebih dahulu!</div>');
            return redirect('User/admin');
        }else{
            $data = [
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status_aktif' => 1,
                'tanggal_buat' => date('Y-m-d'),
                'password' => $this->input->post('password'),
                'id_level' => $this->input->post('id_level'),
                'id_divisi' => $this->input->post('id_divisi'),
                'foto' => $this->upload->data('file_name')
            ];
        }
        $this->ModelUser->add('users',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menambahkan data!</div>');
        return redirect('User/admin');
    }

    public function updateAdmin($id){
            $data = [
                'name' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status_aktif' => 1,
                'id_level' => $this->input->post('id_level'),
                'id_divisi' => $this->input->post('id_divisi'),
            ];
        $this->ModelUser->update(['id'=> $id],'users',$data);
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil mengubah Data Admin!</div>');
        return redirect('User/admin');
    }

    public function deleteAdmin($id){
        $this->ModelUser->delete(['id' => $id],'users');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil menghapus Data Admin!</div>');
        return redirect('User/admin');
    }

    public function validasiBerkas($qualify,$id){
        if($qualify == 'pendidikan'){
            $data = $this->input->post('status');
            $this->db->where(['id_pendidikan'=>$id]);
            $this->ModelUser->validasiBerkas($qualify,['status'=>$data]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil validasi!</div>');
            return redirect('User/pendidikan');
        }else if($qualify == 'sertifikat'){
            $data = $this->input->post('status');
            $this->db->where(['id_sert'=>$id]);
            $this->ModelUser->validasiBerkas($qualify,['status'=>$data]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil validasi!</div>');
            return redirect('Sertifikat');
        }else if($qualify == 'prestasi'){
            $data = $this->input->post('status');
            $this->db->where(['id_prestasi'=>$id]);
            $this->ModelUser->validasiBerkas($qualify,['status'=>$data]);
            $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil validasi!</div>');
            return redirect('Prestasi');
        }
    }
}
?>