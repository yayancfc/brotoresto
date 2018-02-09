<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('pelangganmodel');
        $this->load->helper('url_helper');

        $this->load->library('cart');

        //$this->session->set_userdata('id','');
	}

	public function index()
	{
		$user = array(
				'isLogin' => $this->session->userdata('isLogin'),
				'jabatan' => $this->session->userdata('jabatan'),
				'username' => $this->session->userdata('username')
		);

		if ($user['isLogin']==true && $user['jabatan']=='pelanggan') {
			
			$data['header'] = 'index';
			$this->load->view('pelanggan/header', $data);
			$this->load->view('pelanggan/index');
			$this->load->view('pelanggan/footer');
		}else{
			redirect(base_url());
		}
	}

	public function makanan()
	{	

		$data['header'] = 'makanan';
		$data['makanan'] = $this->pelangganmodel->getMakanan();
		$this->load->view('pelanggan/header', $data);
		$this->load->view('pelanggan/makanan', $data);
		$this->load->view('pelanggan/footer');
	}	

	public function minuman()
	{

		$data['header'] = 'minuman';
		$data['minuman'] = $this->pelangganmodel->getMinuman();
		$this->load->view('pelanggan/header', $data);
		$this->load->view('pelanggan/minuman',$data);
		$this->load->view('pelanggan/footer');
	}

	public function pesanan()
	{

		$data['header'] = 'pesanan';
		$data['order'] = $this->cart->contents();
		$this->load->view('pelanggan/header', $data);
		$this->load->view('pelanggan/pesanan',$data);
		$this->load->view('pelanggan/footer');

	}

	public function nota()
	{	
		$id = '';
		if($this->session->userdata('id')) {
			$id = $this->session->userdata['id'];
			$data['nota'] = $this->pelangganmodel->getNota($id);

			$data['header'] = 'nota';		
			$data['kuisioner'] = $this->pelangganmodel->getKuisioner();
			$this->load->view('pelanggan/header', $data);
			$this->load->view('pelanggan/nota', $data);
			$this->load->view('pelanggan/footer');
		}else{
			
			$data['header'] = 'nota';		
			$this->load->view('pelanggan/header', $data);
			$this->load->view('pelanggan/notakosong');
			$this->load->view('pelanggan/footer');
		}


	
	}


	public function orderMenu(){
		
		$data = array(
			'id'    => $this->input->post('id'),
			'name'  => $this->input->post('nama'),
			'price'   => $this->input->post('harga'),
			'image' => $this->input->post('gambar'),
			'qty' => $this->input->post('qty')
				
		);
		
		$this->cart->insert($data);
	}


	public function hapusOrder($id)
	{
		$data = array(
			'rowid' => $id,
			'qty' => 0
		);

		$this->cart->update($data);
		redirect(site_url('Pelanggan/pesanan'));
	}

	function getJumlahBarang(){
		$count = 0;
		foreach ($this->cart->contents() as $item) {
			$count++;
		}

		echo json_encode($count);
	}

	public function updateQty(){
		$id = $this->input->post('id');
		$nilai = $this->input->post('nilai');
		
		$data = array(
			'rowid' => $id,
			'qty' => $nilai
		);

		$this->cart->update($data);
		
	}

	public function getIdPegawai()
	{
		$id = $this->pelangganmodel->getId();

		return $id;
	}


	public function confirmOrder()
	{
		$idPegawai = $this->getIdPegawai();

		$cart = $this->cart->contents();
		$idBahan = $this->pelangganmodel->getIdBahan();

		$jumlah = array();
		
		$bahan = false;
		foreach ($cart as $value) {
			$cek = $this->pelangganmodel->cekBahan($value['id']);
			

			foreach ($cek as $item) {
				$bahan = false;			
				$stok = $this->pelangganmodel->cekStok($item->id_bhn);	
				$item->qty = $value['qty'];
				$jml = $item->jumlah;		
				$jumlah[] = $item;

				$ttl = $item->qty * $jml;

				foreach ($stok as $val) {
					$jml_bahan = $val->stok;
					if ($ttl<=$jml_bahan) {
						$bahan = true;
						break;
					}
				}

			}


			
		}

		if ($bahan==true) {
			$insert = array(
					'total_harga' => $this->cart->total(),
					'tgl_pemesanan' => date("Y-m-d"),
					'no_meja' => $this->session->userdata['no_meja'],
					'id_pegawai' => $idPegawai
				);


			$cekId = $this->session->userdata('id');
			if ($cekId!==NULL) {
				$insert['id_pesanan'] = $cekId;


				$this->pelangganmodel->update_pesanan($insert);


					$this->db->select('id_menu');
					$this->db->from('detail_pesanan');
					$this->db->join('pesanan', 'pesanan.id_pesanan=detail_pesanan.id_pesanan');
					$this->db->where('pesanan.id_pesanan', $cekId);
					$query = $this->db->get();
					$r = $query->result_array();	

					$cart = $this->cart->contents();

					foreach ($cart as $item) {

						$sama = false;

						$detail = array(
							'id_pesanan' => $cekId,
							'id_menu' => $item['id'],
							'jml_pesanan' => $item['qty'],
							'harga' => $item['price'],
							'total' => $item['subtotal']
						);
						
						for ($i=0; $i < count($r); $i++) { 
							if ($item['id']==$r[$i]['id_menu']) {
								
								$this->pelangganmodel->update_detail_pesanan($detail);
								$sama = true;
								break;
							}
						
						}

						if ($sama == false) {
							$this->pelangganmodel->insert_detail_pesanan($detail);	
						}

						
						
					}

					foreach ($jumlah as $value) {
						$total = $value->jumlah * $value->qty;
						$this->pelangganmodel->kurangiStok($value->id_bhn,$total);
					}



					$this->cart->destroy();
					$this->session->set_userdata('success_kirim','Pesanan telah terkirim');						
					
			}else{


				$this->pelangganmodel->insert_pesanan($insert);
				$id_pesanan = $this->db->insert_id();

				foreach ($this->cart->contents() as $item) {
					$detail = array(
						'id_pesanan' => $id_pesanan,
						'id_menu' => $item['id'],
						'jml_pesanan' => $item['qty'],
						'harga' => $item['price'],
						'total' => $item['subtotal'],
					);

					$this->pelangganmodel->insert_detail_pesanan($detail);
				}

				foreach ($jumlah as $value) {
						$total = $value->jumlah * $value->qty;
						$this->pelangganmodel->kurangiStok($value->id_bhn,$total);
					}

				$this->cart->destroy();
				
				$id = $this->cekIdPesanan();

				$this->session->set_userdata('id',$id);
				$this->session->set_userdata('success_kirim','Pesanan telah terkirim');
				


			}
			return $this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($bahan));
		}else{
			

			return $this->output
		        ->set_content_type('application/json')
		        ->set_output(json_encode($bahan));
			
		}		

	}

	public function cekIdPesanan(){
		$this->db->select_max('id_pesanan');
		$this->db->from('pesanan');
		$query = $this->db->get();
		$r = $query->result();	
		return $r[0]->id_pesanan;		
	}

	public function cekIdMenu()
	{
		$this->db->select('id_menu');
		$this->db->from('detail_pesanan');
		$this->db->where_in('id_menu', $detail['id_menu']);
		$this->db->join('pesanan', 'pesanan.id_pesanan=detail_pesanan.id_pesanan');
		$query = $this->db->get();
		$r = $query->result();	
		
		//print_r($r);
	}

	public function rating()
	{

		$kode = $this->input->post('kode_kuisioner');			
		$a = $this->input->post('rating');
		
		$id_pesanan = $this->session->userdata('id');;
		$i= $this->input->post('i');
		$j= $this->input->post('j');		
		
		$this->pelangganmodel->simpanRating($a, $kode, $id_pesanan);
		
		if ($i==$j) {
			$this->session->unset_userdata('id');
		}
	}

}
