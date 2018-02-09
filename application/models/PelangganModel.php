<?php 
	class PelangganModel extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		
		function getMakanan()
		{
			$this->db->where('jenis_menu', 'makanan');
			$this->db->order_by("id_menu", "desc");
			$query = $this->db->get('menu'); 
			return $query->result();
		}

		function getMinuman()
		{
			$this->db->where('jenis_menu', 'minuman');
			$this->db->order_by("id_menu", "desc");
			$query = $this->db->get('menu'); 
			return $query->result();
		}

		public function insert_pesanan($data)
		{

				$this->db->insert('pesanan', $data);
		}

		public function update_pesanan($data)
		{
			// $this->db->set('stok', 'stok-'.$data['jumlah'], false);
			$this->db->set('total_harga', 'total_harga+'.$data['total_harga'],false);
			$this->db->where('id_pesanan', $data['id_pesanan']);
			$this->db->update('pesanan');
		}

		public function insert_detail_pesanan($data)
		{
			$this->db->insert('detail_pesanan', $data);
		}

		public function update_detail_pesanan($data)
		{
			$this->db->set('jml_pesanan', 'jml_pesanan+'.$data['jml_pesanan'],false);
			$this->db->set('total', 'total+'.$data['total'],false);
			$this->db->where('id_menu', $data['id_menu']);
			$this->db->update('detail_pesanan');
		}


		public function getNota($id)
		{
			 $this->db->select('`pesanan`.`id_pesanan`,`pesanan`.`no_meja`, `pesanan`.`status`, menu.`gambar`, menu.`nama_menu`, menu.`harga_menu`, `detail_pesanan`.`jml_pesanan`, `detail_pesanan`.`total`, pesanan.total_harga');
			 $this->db->from('pesanan');
			 $this->db->join('detail_pesanan', 'detail_pesanan.id_pesanan=pesanan.id_pesanan');
			 $this->db->join('menu', 'menu.id_menu=detail_pesanan.id_menu');
			 $this->db->where('pesanan.id_pesanan', $id);

			$query = $this->db->get();
			return $query->result();
				
		}


		public function getIdBahan()
		{
			$this->db->select('id_bhn');
			$query = $this->db->get('bahan_baku');
			return $query->result();
		}

		public function cekBahan($id_menu)
		{

				$this->db->select('detail_menu.id_bhn, detail_menu.id_menu, detail_menu.jumlah');
				$this->db->from('detail_menu');
				$this->db->where('detail_menu.id_menu',$id_menu);
				
				$query = $this->db->get();
				return $query->result();
				

		}

		public function cekStok($id_bhn)
		{
			$this->db->select('stok');
			$this->db->from('bahan_baku');
			$this->db->where('id_bhn',$id_bhn);
			$query = $this->db->get();
			return $query->result();
		}

		public function kurangiStok($id_bahan, $total)
		{
			$this->db->set('stok', 'stok - '. $total, FALSE);
			$this->db->where('id_bhn', $id_bahan);
			$this->db->update('bahan_baku');
		}

		public function cekMakananAda($id_menu)
		{
			
			$this->db->where('id_menu', $id_menu);
			$query = $this->db->get('menu');

			return $query->result();
		}

		public function getKuisioner()
		{
			$query = $this->db->get('kuisioner');
			return $query->result();
		}

		public function simpanRating($a, $kode, $id)
		{
			$this->db->insert('hasil_kuisioner', array('id_pesanan' => $id, 'kode_kuisioner' => $kode, 'hasil'=>$a));
		}


		public function getId()
		{
			$this->db->select('id_pegawai');
			$this->db->where('jabatan','pelayan');
			$query = $this->db->get('pegawai');
			return $query->result()[0]->id_pegawai;
		}
	}
	
?>