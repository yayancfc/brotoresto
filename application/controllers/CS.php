<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CS extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('csmodel');
        $this->load->helper('url_helper');

	}

	public function index()
	{
		$user = array(
				'isLogin' => $this->session->userdata('isLogin'),
				'jabatan' => $this->session->userdata('jabatan'),
				'username' => $this->session->userdata('username'),
				'id_pegawai' => $this->session->userdata('id_pegawai')
		);
		if ($user['isLogin']==true && $user['jabatan']=='cs') {

			$data['pertanyaan'] = $this->csmodel->getPertanyan();
			$data['header'] = 'kuisioner';

			$this->load->view('cs/header', $data);
			$this->load->view('cs/index', $data);
			$this->load->view('cs/footer');
		}else{
			redirect(base_url());
		}
	}

		public function hasil_kuisioner()
	{

	 	$data['hasil'] = $this->csmodel->getHasilKuisioner();
		$data['header'] = 'hasil_kuisioner';
		$this->load->view('cs/header', $data);
		$this->load->view('cs/hasil_kuisioner', $data);
		$this->load->view('cs/footer');


	}

	

	public function ubahPertanyaan()
	{
		$data = array(
			'kode_pertanyaan' => $this->input->post('kode_pertanyaan'),
			'pertanyaan' => $this->input->post('pertanyaan')
		);

		$this->csmodel->ubahPertanyaan($data);
	}

	public function hapusPertanyaan()
	{
		$data = array(
			'kode_pertanyaan' => $this->input->post('kode_pertanyaan')
		);

		$this->csmodel->hapusPertanyaan($data);
	}

	public function tambahPertanyaan()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');

		$data = array(
			'pertanyaan' => $this->input->post('pertanyaan'),
			'id_pegawai' => $id_pegawai
		);

		$this->csmodel->tambahPertanyaan($data);
	}
}
