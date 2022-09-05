<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_pms');
		$this->load->model('M_kapal');
		$this->load->model('M_admin');
		$this->load->model('M_pengadaan');
	}


	public function index() {

		$data['jml_pegawai'] 	= $this->M_pegawai->total_rows();
		$data['jml_posisi'] 	= $this->M_posisi->total_rows();
		$data['jml_pengadaan'] 		= $this->M_pengadaan->total_rows();
		$data['jml_pms']	= $this->M_pms->total_rows();
		$data['userdata'] 		= $this->userdata;

		// if($data['userdata']->username !== 'admin') {
		// 	echo 'Anda tidak berhak mengakses halaman ini';
		// 	// return;
		// }

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');

		$posisi 				= $this->M_pengadaan->select_all_pengadaan();
		$index = 0;
		foreach ($posisi as $value) {
		    $color = '#' .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)] .$rand[rand(0,15)];

			$pengadaan_by_item = $this->M_pengadaan->select_by_posisi($value->kode_item);

			$data_posisi[$index]['value'] = $pengadaan_by_item->jml;
			$data_posisi[$index]['color'] = $color;
			$data_posisi[$index]['highlight'] = $color;
			$data_posisi[$index]['label'] = $value->aktor;

			$index++;
		}

		$kapal 				= $this->M_kapal->select_all();
		$index = 0;
		foreach ($kapal as $value) {
		    $color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

			$kapal_by_nama = $this->M_kapal->select_by_nama($value->nama);

			$data_kota[$index]['value'] = $kapal_by_nama->jml;
			$data_kota[$index]['color'] = $color;
			$data_kota[$index]['highlight'] = $color;
			$data_kota[$index]['label'] = $value->nama;

			$index++;
		}

		$data['data_posisi'] = json_encode($data_posisi);
		$data['data_kota'] = json_encode($data_kota);

		$data['page'] 			= "home";
		$data['judul'] 			= "Beranda";
		$data['deskripsi'] 		= "Manage Data";
		$this->template->views('home', $data);
	}

	public function list_user() {
		$data['userdata'] 		= $this->userdata;
		$data['page'] 			= "listuser";
		$data['judul'] 			= "Data User";
		$data['deskripsi'] 		= "Manage Data User";
		$data['listuser'] = $this->M_admin->selectAll();
		$this->template->views('listuser', $data);
	}

	public function detailuser() {
		$data['userdata'] 		= $this->userdata;
		$iduser = $this->input->get('id');
		$data['page'] 			= "detail_data_user";
		$data['judul'] 			= "Detail Data User";
		$data['deskripsi'] 		= "Manage Detail Data User";
		$data['detailData'] = $this->M_admin->select2($iduser);
		$this->template->views('listuser_detail', $data);
	}
}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
