<?php 

/**
* 
*/
class KokiModel extends CI_Model
{
	
	function __construct()
	{
			$this->load->database();
	}


	public function getPesanan()
	{
		$this->db->join('menu','menu.id_menu = detail_pesanan.id_menu');
		$this->db->where('status',0);
		$this->db->order_by('id_pesanan',"ASC");
		$query = $this->db->get('detail_pesanan');
		return $query->result();
	}


	public function changeStatus($data)
	{
		$this->db->set('status', $data['status']);
		$this->db->where('id_pesanan', $data['id_pesanan']);
		$this->db->where('id_menu', $data['id_menu']);
		$this->db->update('detail_pesanan');
			
	}
}

 ?>