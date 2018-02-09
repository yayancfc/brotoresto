<?php 

	/**
	* 
	*/
	class PantryModel extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function getBahanBaku()
		{
			$query = $this->db->get('bahan_baku');
			return $query->result();
		}

		public function ubahBahan($id,$data)
		{
			$this->db->where('id_bhn', $id);
			$this->db->update('bahan_baku', $data);
		}

		public function hapusBahan($id)
		{
			$this->db->where('id_bhn', $id);
			$this->db->delete('bahan_baku');
		}

		public function tambahBahan($data)
		{
			$this->db->insert('bahan_baku',$data);
		}

		public function getMakanan()
		{
			$this->db->where('jenis_menu','makanan');
			$query = $this->db->get('menu');

			return $query->result();
		}

		public function getMinuman()
		{
			$this->db->where('jenis_menu','minuman');
			$query = $this->db->get('menu');

			return $query->result();
		}


		public function getDetailMenu($id_menu)
		{
			$this->db->where('id_menu', $id_menu);
			$query = $this->db->get('menu');
			return $query->result();
		}

		public function hapusMenu($id)
		{
			$this->db->where('id_menu', $id);
			$this->db->delete('menu');
		}

		public function cekBahan($data)
		{
			$this->db->select('stok');
			$this->db->where('id_bhn', $data['id_bhn']);
			$query = $this->db->get('bahan_baku');

			$jumlah =  $query->result();

			$tambah = true;

			foreach ($jumlah as $value) {
				$stok = $value->stok;
				if ( $stok < $data['jumlah']) {
					$tambah = false;
				}
			}

			return $tambah;
		}

		public function tambahDetailMakanan($data)
		{
			$this->db->where('id_bhn', $data['id_bhn']);
			$this->db->where('id_menu', $data['id_menu']);
			$query = $this->db->get('detail_menu');

			if ($query->num_rows()>0) {
				$this->db->set('jumlah', 'jumlah+'.$data['jumlah'], false);
				$this->db->where('id_bhn', $data['id_bhn']);
				$this->db->where('id_menu', $data['id_menu']);
				$this->db->update('detail_menu');
			}else{
			 	$this->db->insert('detail_menu', $data);
			}
		}

		public function ubahDetailMakanan($id,$data)
		{
			$this->db->where('id_bhn', $data['id_bhn']);
			$this->db->where('id_menu', $data['id_menu']);
			$query = $this->db->get('detail_menu');

			if ($query->num_rows()>0) {
				
				if ($id==$data['id_bhn']) {
					$this->db->where('id_bhn', $id);
					$this->db->update('detail_menu', $data);	
				}else{
					$this->db->set('jumlah', 'jumlah+'.$data['jumlah'], false);
					$this->db->where('id_bhn', $data['id_bhn']);
					$this->db->where('id_menu', $data['id_menu']);
					$this->db->update('detail_menu');


					$this->db->where('id_bhn', $id);
					$this->db->delete('detail_menu');
				}
			}
		}

		public function getDetailBahan($data)
		{
			$this->db->select('bahan_baku.`id_bhn`, bahan_baku.`nama_bahan`, bahan_baku.`satuan`, detail_menu.`jumlah`, detail_menu.id_menu');
			$this->db->from('bahan_baku');
			$this->db->join('detail_menu','detail_menu.id_bhn=bahan_baku.id_bhn');
			$this->db->where('detail_menu.id_menu', $data);
			$query = $this->db->get();
			return $query->result();
		}

		public function hapusdetailMakanan($id)
		{
			$this->db->where('id_bhn', $id);
			$this->db->delete('detail_menu');
		}


		public function insert_makanan($data)
		{
			if($this->db->insert('menu', $data)){
				return true;
			}else{
				return false;
			}
		}

		public function update_makanan($data, $id)
		{
			$this->db->where('id_menu',$id);
			if($this->db->update('menu', $data)){
				return true;
			}

			return false;
		}

	}
 ?>