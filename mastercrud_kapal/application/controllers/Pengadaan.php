<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Pengadaan extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_pegawai');
		$this->load->model('M_posisi');
		$this->load->model('M_kota');
		$this->load->model('M_pengadaan');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPengadaan'] = $this->M_pengadaan->join3table();
		// $data['dataPosisi'] = $this->M_posisi->select_all();
		// $data['dataKota'] = $this->M_kota->select_all();

		$data['page'] = "pengadaan";
		$data['judul'] = "Data Produk";
		$data['deskripsi'] = "Manage Data Produk";
		$data['dataPms'] = $this->M_pengadaan->select_idPms();

		$data['modal_tambah_pengadaan'] = show_my_modal('modals/modal_tambah_pengadaan', 'tambah-pengadaan', $data);

		$this->template->views('pengadaan/home', $data);
	}

	public function tampil() {
		$data['dataPengadaan'] = $this->M_pengadaan->select_all();
		$this->load->view('pengadaan/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'trim|required');
		//$this->form_validation->set_rules('permintaan_item', 'permintaan Item', 'trim|required');
		//$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stock', 'trim|required');
		//$this->form_validation->set_rules('gudang', 'Gudang', 'trim|required');
		//$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pengadaan->insert_pengadaan($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pengadaan Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data pengadaan Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function tambah() {
		//$this->form_validation->set_rules('kode_item', 'Kode Item', 'trim|required');
		$this->form_validation->set_rules('permintaan_item', 'permintaan Item', 'trim|required');
		$this->form_validation->set_rules('brand', 'Brand', 'trim|required');
		//$this->form_validation->set_rules('stock', 'Stock', 'trim|required');
		//$this->form_validation->set_rules('gudang', 'Gudang', 'trim|required');
		//$this->form_validation->set_rules('supplier', 'Supplier', 'trim|required');

		if (isset($_POST['submit'])){
			$data = array('kode_item'=>$_POST['kode_item'],
						  'permintaan_item'=>$_POST['permintaan_item'],
						  'brand'=>$_POST['brand'],
						  'stock'=>$_POST['stock'],
						  'gudang'=>$_POST['gudang'],
						  'supplier'=>$_POST['supplier']);

			 if ($this->form_validation->run() == TRUE) {
				$result = $this->M_pengadaan->insert($data);
	
				if ($result == true) {
					$out['status'] = '';
					$out['msg'] = show_succ_msg('Data pengadaan Berhasil ditambahkan', '20px');
				} else {
					$out['status'] = '';
					$out['msg'] = show_err_msg('Data pengadaan Gagal ditambahkan', '20px');
				}
			} else {
				$out['status'] = 'form';
				$out['msg'] = show_err_msg(validation_errors());
			}
	
			echo json_encode($out);
		}
		
	}

	public function update() {
		$id = trim($_POST['id']);

		
		$data['dataPengadaan'] = $this->M_pengadaan->select_by_id($id);
		$data['userdata'] = $this->userdata;
		$data['dataPms'] = $this->M_pengadaan->select_pms();

		echo show_my_modal('modals/modal_update_pengadaan', 'update-pengadaan', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('id_pengadaan', 'Id Pengadaan', 'trim|required');
		$this->form_validation->set_rules('kode_item', 'Kode Item', 'trim|required');
		$this->form_validation->set_rules('stock', 'Stok', 'trim|required');


		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pengadaan->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pengadaan Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pengadaan Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pengadaan->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data pengadaan Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data pengadaan Gagal dihapus', '20px');
		}
	}

	public function export() {
		error_reporting(E_ALL);
		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->SetCellValue('A1', "ID");
		$sheet->SetCellValue('B1', "Date");
		$sheet->SetCellValue('C1', "Nama Produk");
		$sheet->SetCellValue('D1', "Deskripsi Produk");
		$sheet->SetCellValue('E1', "Stok");
		// $sheet->SetCellValue('F1', "Saldo");

		$data = $this->M_pengadaan->select_all();
		$rowCount = 2;
		foreach($data as $value){
				$sheet->SetCellValue('A'.$rowCount, $value->id);
				$sheet->SetCellValue('B'.$rowCount, $value->date_insert);
				$sheet->SetCellValue('C'.$rowCount, $value->nama_produk);
				$sheet->SetCellValue('D'.$rowCount, $value->deskripsi_produk);
				$sheet->SetCellValue('E'.$rowCount, $value->stok);
				// $sheet->SetCellValue('F'.$rowCount, $value->saldo);
				$rowCount++;
		}

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'list-of-pengadaan'; // set filename for excel file to be exported
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');	// download file

	}


}

/* End of file pengadaan.php */
/* Location: ./application/controllers/pengadaan.php */
