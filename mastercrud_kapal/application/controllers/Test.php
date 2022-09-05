<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Test extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		//$this->load->model('M_test');
		$this->load->model('M_pengadaan');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['page'] = "pengadaan";
		$data['judul'] = "Data Produk";
		$data['deskripsi'] = "Manage Data Produk";
		$data['dataPms'] = $this->M_pengadaan->select_idPms();

		$this->template->views('test', $data);
	}


}

/* End of file pengadaan.php */
/* Location: ./application/controllers/pengadaan.php */
