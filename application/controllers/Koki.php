<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Koki extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('kokimodel');
        $this->load->helper('url_helper');

	}

	public function index()
	{

		$user = array(
				'isLogin' => $this->session->userdata('isLogin'),
				'jabatan' => $this->session->userdata('jabatan'),
				'username' => $this->session->userdata('username')
		);
		if ($user['isLogin']==true && $user['jabatan']=='koki') {

			$data['pesanan'] = $this->kokimodel->getPesanan();
			$this->load->view('koki/index', $data);
			// echo "<pre>";
			// print_r($data);
			// echo "</pre>";
		}else{
			redirect(base_url());
		}

	}


}
