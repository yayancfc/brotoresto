<?php 
	/**
	* 
	*/
	class KasirModel extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}


		public function getPesanan()
		{
			$query = $this->db->get_where('pesanan',array('status' => 0));
			return $query->result();
		}

		public function getDetailPesanan($dataId)
		{

			$this->db->select("pesanan.`id_pesanan`,pesanan.tgl_pemesanan,pesanan.`total_harga`, menu.`gambar`, menu.`nama_menu`, menu.`harga_menu`, `detail_pesanan`.`jml_pesanan`, detail_pesanan.`total`");
			$this->db->from('pesanan');
			$this->db->join('detail_pesanan', 'pesanan.id_pesanan=detail_pesanan.id_pesanan');
			$this->db->join('menu', 'detail_pesanan.id_menu=menu.id_menu');
			$this->db->where('pesanan.id_pesanan', $dataId['id_pesanan']);
			$query = $this->db->get();
			return $query->result();
		}

		public function getLaporan()
		{
			$query = $this->db->get('pesanan');
			return $query->result();
		}
	}
 ?>