<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}

	public function dashboard(){
		$data = [
			'title' => 'dashboard',
			'judul' => 'Dashboard',
			'konten' => 'dashboard'
		];
		return $this->load->view('template',$data);
	}
	public function do_login(){
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$data = $this->db->get_where('users',['email'=> $email])->row_array();
		if($data){
			if($data['id_level'] == 1){
				if($data['password'] == $password){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat Datang Manajer!</div>');
					$d = ['name' => $data['name'],'role' => 'Manajer'];
					$this->session->set_userdata($d);
					return redirect('Welcome/dashboard');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah! Mohon isikan dengan benar!</div>');
					return redirect('Welcome');
				}
			}else if($data['id_level'] == 2){
				if($data['password'] == $password){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat Datang HRD!</div>');
					$d = ['name' => $data['name'],'role' => 'HRD'];
					$this->session->set_userdata($d);
					return redirect('Welcome/dashboard');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah! Mohon isikan dengan benar!</div>');
					return redirect('Welcome');
				}
			}else if($data['id_level'] == 3){
				if($data['password'] == $password){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat Datang Pegawai!</div>');
					$d = ['name' => $data['name'],'role' => 'Admin'];
					$this->session->set_userdata($d);
					return redirect('Welcome/dashboard');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah! Mohon isikan dengan benar!</div>');
					return redirect('Welcome');
				}
			}else if($data['id_level'] == 4){
				if($data['password'] == $password){
					$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Selamat Datang Pegawai!</div>');
					$d = ['name' => $data['name'],'role' => 'Pegawai'];
					$this->session->set_userdata($d);
					return redirect('Welcome/dashboard');
				}else{
					$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah! Mohon isikan dengan benar!</div>');
					return redirect('Welcome');
				}
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">User tidak terdaftar!</div>');
			return redirect('Welcome');
		}
	}

	public function logout(){
		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil logout!
	  </div>');
		return redirect('Welcome');
	}
}
