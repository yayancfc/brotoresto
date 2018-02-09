<?php 

	/**
	* 
	*/
	class CSModel extends CI_Model
	{
		
		function __construct()
		{
			$this->load->database();
		}

		public function getPertanyan()
		{
			$query = $this->db->get('kuisioner');
			return $query->result();
		}

		public function ubahPertanyaan($data)
		{
			$this->db->set('pertanyaan', $data['pertanyaan']);
			$this->db->where('kode_kuisioner', $data['kode_pertanyaan']);
			$this->db->update('kuisioner');
		}

		public function hapusPertanyaan($data)
		{
			$this->db->where('kode_kuisioner', $data['kode_pertanyaan']);
			$this->db->delete('kuisioner');
		}

		public function tambahPertanyaan($data)
		{
			
			$this->db->insert('kuisioner', $data);

		}


		public function getHasilKuisioner()
		{
			$this->db->select('`kuisioner`.`pertanyaan`, id_pesanan, hasil');
			$this->db->from('kuisioner');
			$this->db->join('hasil_kuisioner','kuisioner.kode_kuisioner=hasil_kuisioner.kode_kuisioner');

			$query = $this->db->get();
			

			return $query->result();
		}

		public function inserthasil($id)
		{
			$this->db->insert('hasil_kuisioner', array('kode_kuisioner' => $id));
		}

	}
 ?>