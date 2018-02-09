<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}


	public function index()
	{
		$data = array(
				'isLogin' => $this->session->userdata('isLogin'),
				'jabatan' => $this->session->userdata('jabatan'),
				'username' => $this->session->userdata('username'),
			);
		if ($data['isLogin']==true) {		
			redirect(base_url($data['jabatan']));

		}else{
			$this->load->view('login');			
		}
	}

	public function proses()
	{

			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$jabatan = $this->input->post('jabatan');
			$data = array(
				'username' => $username,
				'password' => $password
			);

			if ($jabatan=='pelanggan') {
				$res = $this->db->get_where('meja',$data);

				if ($res->num_rows()>0) {
					$this->session->set_userdata(
						array(
							'isLogin' => true,
							'jabatan' => $jabatan,
							'username' => $username,
							'no_meja' => $res->row()->no_meja
						)
					);
					redirect(base_url('pelanggan'));
				}else if($username=='' && $password==''){
					$this->session->set_flashdata('result_login', 'Username dan Password Harus Diisi.');
					redirect(base_url());
				}else if($username==''){
					$this->session->set_flashdata('result_login', 'Username Harus Diisi.');
					redirect(base_url());

				}else if($password==''){
					$this->session->set_flashdata('result_login', 'Password Harus Diisi.');
					redirect(base_url());
				}
				else{
					$this->session->set_flashdata('result_login', 'Username atau Password Salah.');
					redirect(base_url());
				}
			}
			else{
				$res = $this->db->get_where('pegawai',$data);

				if ($res->num_rows()>0) {
					$this->session->set_userdata(
						array(
							'isLogin' => true,
							'jabatan' => $jabatan,
							'username' => $username,
							'id_pegawai' => $res->row()->id_pegawai
						)
					);
					redirect(base_url($jabatan));
				}else if($username=='' && $password==''){
					$this->session->set_flashdata('result_login', 'Username dan Password Harus Diisi.');
					redirect(base_url());
				}else if($username==''){
					$this->session->set_flashdata('result_login', 'Username Harus Diisi.');
					redirect(base_url());

				}else if($password==''){
					$this->session->set_flashdata('result_login', 'Password Harus Diisi.');
					redirect(base_url());
				}
				else{
					$this->session->set_flashdata('result_login', 'Username atau Password Salah.');
					redirect(base_url());
				}
			}

	}

	public function destroy(){
		$this->session->unset_userdata(
						array(
							'isLogin' => '',
							'jabatan' => '',
							'username' => '',
							'no_meja' => ''
						)
					);
			session_destroy();
			redirect(base_url());
		}
}
