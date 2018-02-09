<?php 

	/**
	* 
	*/
	class PelayanModel extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function getMeja()
		{
			$query = $this->db->get('meja');
			return $query->result();
		}

		public function getPesanan()
		{
			$query = $this->db->get_where('pesanan',array('status' => 0));
			return $query->result();
		}

		public function getDetailPesanan($dataId)
		{

			$this->db->select("pesanan.`id_pesanan`, pesanan.total_harga,pesanan.`no_meja`, menu.`id_menu`,menu.`gambar`, menu.`nama_menu`, `detail_pesanan`.`jml_pesanan`,detail_pesanan.`status`");
			$this->db->from('pesanan');
			$this->db->join('detail_pesanan', 'pesanan.id_pesanan=detail_pesanan.id_pesanan');
			$this->db->join('menu', 'detail_pesanan.id_menu=menu.id_menu');

			// $this->db->select(' menu.`gambar`, nama_menu, `menu`.`harga_menu`, `detail_pesanan`.`jml_pesanan`, `detail_pesanan`.`total` ');
			// $this->db->from('menu');
			// $this->db->join('detail_pesanan','menu.id_menu = detail_pesanan.id_menu');
			$this->db->where('pesanan.id_pesanan', $dataId['id_pesanan']);
			$query = $this->db->get();
			return $query->result();
		}

		public function cekMeja($data)
		{
			$this->db->set('status', $data['status']);
			$this->db->where('no_meja', $data['no_meja']);
			$this->db->update('meja');

			$this->db->select('status');
			$this->db->where('no_meja', $data['no_meja']);
			$query = $this->db->get('meja');

			return $query->result();
		}

		public function selesaiMenu($data)
		{
			$this->db->set('status',2);
			$this->db->where('id_pesanan', $data['id_pesanan']);
			$this->db->update('pesanan');

		}


		public function getStatus($data)
		{
			$this->db->select('status');
			$this->db->where('id_pesanan', $data['id_pesanan']);
			
			$query = $this->db->get('detail_pesanan');
			$a =  $query->result();

			$coba = true;
			foreach ($a as $value) {
				if ($value->status==0) {
					$coba = false;
					break;
				}
			}

			return $coba;
		}


	}

 ?>