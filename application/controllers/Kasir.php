<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {


	public function __construct(){
		parent::__construct();
        $this->load->model('kasirmodel');
        $this->load->helper('url_helper');

	}
	
	public function index()
	{

		$user = array(
				'isLogin' => $this->session->userdata('isLogin'),
				'jabatan' => $this->session->userdata('jabatan'),
				'username' => $this->session->userdata('username')
		);
		if ($user['isLogin']==true && $user['jabatan']=='kasir') {

			$data['header'] = 'index';
			$data['pesanan'] = $this->kasirmodel->getPesanan();
			$this->load->view('kasir/header', $data);
			$this->load->view('kasir/index', $data);
			$this->load->view('kasir/footer');

		}else{
			redirect(base_url());
		}	
	}

	public function detail_pesanan()
	{
		
		$dataId = array(
			'id_pesanan' => $this->input->get('id')
		);

		$data['detail'] = $this->kasirmodel->getDetailPesanan($dataId);

		$data['header'] = 'index';
		$this->load->view('kasir/header', $data);
		$this->load->view('kasir/detail_pesanan', $data);
		$this->load->view('kasir/footer');


	}


	public function cetak()
	{
		$dataId = array(
			'id_pesanan' => $this->input->get('id')
		);

		 $data['detail'] = $this->kasirmodel->getDetailPesanan($dataId);

		 $this->load->view('kasir/cetak', $data);

		
	}

	public function laporan()
	{
		$data['header'] = 'laporan';

		$data['laporan'] = $this->kasirmodel->getLaporan();

		$this->load->view('kasir/header', $data);
		$this->load->view('kasir/laporan', $data);
		$this->load->view('kasir/footer');
	}

}
