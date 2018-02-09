<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pantry extends CI_Controller {

	public function __construct(){
		parent::__construct();
        $this->load->model('pantrymodel');
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
		if ($user['isLogin']==true && $user['jabatan']=='pantry') {

			$data['bahan'] = $this->pantrymodel->getBahanBaku();

			$data['header'] = 'index';
			$this->load->view('pantry/header', $data);
			$this->load->view('pantry/index', $data);
			$this->load->view('pantry/footer');

		}else{
			redirect(base_url());
		}

		

	}

	public function makanan()
	{
		$data['header'] = 'makanan';
		$data['makanan'] = $this->pantrymodel->getMakanan();
		$this->load->view('pantry/header', $data);
		$this->load->view('pantry/makanan', $data);
		$this->load->view('pantry/footer');
	}

	public function minuman()
	{
		$data['header'] = 'minuman';
		$data['minuman'] = $this->pantrymodel->getMinuman();
		$this->load->view('pantry/header', $data);
		$this->load->view('pantry/minuman');
		$this->load->view('pantry/footer');
	}

	public function detailmakanan()
	{
		$data['header'] = 'makanan';

		$id_menu = $this->input->get('id_menu');
		$data['detail'] = $this->pantrymodel->getdetailMenu($id_menu);
		$data['bahan'] = $this->pantrymodel->getBahanBaku();

		$data['detailbahan'] = $this->pantrymodel->getdetailBahan($id_menu);
		$this->load->view('pantry/header', $data);
		$this->load->view('pantry/detailmakanan', $data);
		$this->load->view('pantry/footer');

	}

	public function detailminuman()
	{
		$data['header'] = 'minuman';
		$id_menu = $this->input->get('id_menu');
		$data['detail'] = $this->pantrymodel->getdetailMenu($id_menu);
				$data['bahan'] = $this->pantrymodel->getBahanBaku();
		$data['detailbahan'] = $this->pantrymodel->getdetailBahan($id_menu);
		$this->load->view('pantry/header',$data);
		$this->load->view('pantry/detailminuman');
		$this->load->view('pantry/footer');
	}

	public function ubahBahan()
	{
		$data = array(
			'id_bhn' => $this->input->post('id_bhn'),
			'nama_bahan' => $this->input->post('nama_bahan'),
			'stok' => $this->input->post('stok'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'tgl_exp' => $this->input->post('tgl_exp'),
			'satuan' => $this->input->post('satuan')			
		);

		$id = $this->input->post('id_awal');
		$this->pantrymodel->ubahBahan($id, $data);
	}

	public function hapusBahan()
	{
		$id = $this->input->post('id_bhn');

		$this->pantrymodel->hapusBahan($id);
	}

	public function tambahBahan()
	{
		$id_pegawai = $this->session->userdata('id_pegawai');

		$data = array(
			'id_bhn' => $this->input->post('id_bhn'),
			'nama_bahan' => $this->input->post('nama_bahan'),
			'stok' => $this->input->post('stok'),
			'tgl_masuk' => $this->input->post('tgl_masuk'),
			'tgl_exp' => $this->input->post('tgl_exp'),
			'satuan' => $this->input->post('satuan')		,
			'id_pegawai' => $id_pegawai	
		);

		$this->pantrymodel->tambahBahan($data);
	}

	public function hapusMenu()
	{
		$id = $this->input->post('id_menu');

		$this->pantrymodel->hapusMenu($id);
	}

	public function simpanBahanMenu()
	{
		$data = array(
			'id_bhn' => $this->input->post('id_bhn'),
			'id_menu' => $this->input->post('id_menu'),
			'jumlah' => $this->input->post('jumlah')		
		);
			$this->pantrymodel->tambahdetailMakanan($data);
	}

	public function ubahBahanMenu()
	{
		$data = array(
			'id_bhn' => $this->input->post('id_bhn'),
			'id_menu' => $this->input->post('id_menu'),
			'jumlah' => $this->input->post('jumlah')		
		);

		 $id = $this->input->post('id_awal');
		 $this->pantrymodel->ubahdetailMakanan($id,$data);



	}

	public function hapusBahanMenu()
	{

		 $id = $this->input->post('id_bhn');
		$this->pantrymodel->hapusdetailMakanan($id);

	}

	public function tambahmakanan()
	{
			$id_pegawai = $this->session->userdata('id_pegawai');

			$nama = "file_".time();
			$config['upload_path'] = './assets/image/pelanggan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '20000';
			$config['max_width'] = '20000';
			$config['max_height'] = '20000';
			$config['file_name'] = $nama;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
					$data = array(
						'id_menu' => $this->input->post('idTambah'),
						'nama_menu' => $this->input->post('namaTambah'),
						'jenis_menu' => $this->input->post('jenisTambah'),
						'kategori_menu' => $this->input->post('kategoriTambah'),
						'harga_menu' => $this->input->post('hargaUbah'),
						'gambar' => $this->upload->data()['file_name'],
						'id_pegawai' => $id_pegawai
					);

					$cek = $this->pantrymodel->insert_makanan($data);
					if($cek)
					{
						$this->session->set_userdata("message","Berhasil insert");
						redirect(site_url('Pantry/makanan'));
					}else{
						$this->session->set_userdata("message","Gagal insert");
						redirect(site_url('Pantry/makanan'));
					}
			}else{
				 $this->session->set_userdata("message","Gagal upload image");
				 redirect(site_url('Pantry/makanan'));
			}

	}

	public function updatemakanan()
	{
		$data = array(
			'nama_menu' => $this->input->post('namaUbah'),
			'jenis_menu' => $this->input->post('jenisUbah'),
			'kategori_menu' => $this->input->post('kategoriUbah'),
			'harga_menu' => $this->input->post('hargaUbah')
		);

		if ($_FILES['ubahGambar']['name'] != "") {

			if (file_exists(base_url()."assets/image/pelanggan/".$this->input->post('nama_file'))) {
				unlink(base_url()."assets/image/pelanggan/".$this->input->post('nama_file'));
			}

			$nama = "file_".time();
			$config['upload_path'] = './assets/image/pelanggan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '20000';
			$config['max_width'] = '20000';
			$config['max_height'] = '20000';
			$config['file_name'] = $nama;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('ubahGambar')) {
				$data['gambar'] = $this->upload->data()['file_name'];
			}else{
				$this->session->set_userdata("message","Gagal upload image");
				redirect(site_url('Pantry/makanan'));
			}
		}

		$cek = $this->pantrymodel->update_makanan($data, $this->input->post('idUbah'));

		if($cek)
		{
			$this->session->set_userdata("message","Berhasil update");
			redirect(site_url('Pantry/makanan'));
		}else{
			$this->session->set_userdata("message","Gagal update");
			redirect(site_url('Pantry/makanan'));
		}

	}

	public function tambahminuman()
	{
			$id_pegawai = $this->session->userdata('id_pegawai');

			$nama = "file_".time();
			$config['upload_path'] = './assets/image/pelanggan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '20000';
			$config['max_width'] = '20000';
			$config['max_height'] = '20000';
			$config['file_name'] = $nama;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
					$data = array(
						'id_menu' => $this->input->post('idTambah'),
						'nama_menu' => $this->input->post('namaTambah'),
						'jenis_menu' => $this->input->post('jenisTambah'),
						'kategori_menu' => $this->input->post('kategoriTambah'),
						'harga_menu' => $this->input->post('hargaUbah'),
						'gambar' => $this->upload->data()['file_name'],
						'id_pegawai' => $id_pegawai

					);

					$cek = $this->pantrymodel->insert_makanan($data);
					if($cek)
					{
						$this->session->set_userdata("message","Berhasil insert");
						redirect(site_url('Pantry/minuman'));
					}else{
						$this->session->set_userdata("message","Gagal insert");
						redirect(site_url('Pantry/minuman'));
					}
			}else{
				 $this->session->set_userdata("message","Gagal upload image");
				 redirect(site_url('Pantry/minuman'));
			}

	}

	public function updateminuman()
	{
		$data = array(
			'nama_menu' => $this->input->post('namaUbah'),
			'jenis_menu' => $this->input->post('jenisUbah'),
			'kategori_menu' => $this->input->post('kategoriUbah'),
			'harga_menu' => $this->input->post('hargaUbah')
		);

		if ($_FILES['ubahGambar']['name'] != "") {

			if (file_exists(base_url()."assets/image/pelanggan/".$this->input->post('nama_file'))) {
				unlink(base_url()."assets/image/pelanggan/".$this->input->post('nama_file'));
			}

			$nama = "file_".time();
			$config['upload_path'] = './assets/image/pelanggan/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '20000';
			$config['max_width'] = '20000';
			$config['max_height'] = '20000';
			$config['file_name'] = $nama;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('ubahGambar')) {
				$data['gambar'] = $this->upload->data()['file_name'];
			}else{
				$this->session->set_userdata("message","Gagal upload image");
				redirect(site_url('Pantry/makanan'));
			}
		}

		$cek = $this->pantrymodel->update_makanan($data, $this->input->post('idUbah'));

		if($cek)
		{
			$this->session->set_userdata("message","Berhasil update");
			redirect(site_url('Pantry/minuman'));
		}else{
			$this->session->set_userdata("message","Gagal update");
			redirect(site_url('Pantry/minuman'));
		}

	}

}
