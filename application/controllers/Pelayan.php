<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelayan extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('pelayanmodel');
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
		if ($user['isLogin']==true && $user['jabatan']=='pelayan') {

			$data['header'] = 'index';
			$data['meja'] = $this->pelayanmodel->getMeja();
			$this->load->view('pelayan/header', $data);
			$this->load->view('pelayan/index', $data);
			$this->load->view('pelayan/footer');

		}else{
			redirect(base_url());
		}

	}

	public function pesanan()
	{	


		$data['header'] = 'pesanan';
		$data['pesanan'] = $this->pelayanmodel->getPesanan();
		$this->load->view('pelayan/header', $data);
		$this->load->view('pelayan/pesanan', $data);
		$this->load->view('pelayan/footer');
	}

	public function detailpesanan()
	{
		$dataId = array(
			'id_pesanan' => $this->input->get('id')
		);

		$data['detail'] = $this->pelayanmodel->getDetailPesanan($dataId);


		$data['header'] = 'pesanan';
		$this->load->view('pelayan/header', $data);
		$this->load->view('pelayan/detailpesanan', $data);
		$this->load->view('pelayan/footer');
		
		
	}

	public function cekMeja()
	{

		$data = array(
			'status' => $this->input->post('status'),
			'no_meja' => $this->input->post('no_meja')
		);
		 
		$status = $this->pelayanmodel->cekMeja($data);
		// print_r($data);

		
	}

	public function cekPesanan()
	{
		$data = array(
			'id_pesanan' => $this->input->post('id_pesanan'),
			'id_menu' => $this->input->post('id_menu'),
			'status' => $this->input->post('status')
		);

		$this->kokimodel->changeStatus($data);

		return $this->cekStatusPesanan($data);

	}


	public function cekStatusPesanan($data)
	{
		$tes = $this->pelayanmodel->getStatus($data);

		return $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($tes));
	}

	public function selesaiPesanan()
	{
		$data = array(
			'id_pesanan' => $this->input->get('id_pesanan'),
			'status' => $this->input->get('status')
		);

		$this->pelayanmodel->selesaiMenu($data);

		redirect(base_url('Pelayan/pesanan'));

	}

}
