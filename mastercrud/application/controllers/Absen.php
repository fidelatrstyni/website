<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Absen extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_absen');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataAbsen'] = $this->M_absen->select_crew();

		$data['page'] 		= "absen";
		$data['judul'] 		= "Data Absen";
		$data['deskripsi'] 	= "Manage Data Absen";

		$data['modal_tambah_absen'] = show_my_modal('modals/modal_tambah_absen', 'tambah-absen', $data);

		$this->template->views('absen/home', $data);
	}

	public function tampil() {
		//$data['dataAbsen'] = $this->M_absen->select_all();
		$data['dataAbsen'] = $this->M_absen->join2table();
		$this->load->view('absen/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('id_crew', 'Nama', 'trim|required');
		$this->form_validation->set_rules('absensi', 'Absensi', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_absen->insert_absen($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data absen Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data absen Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['dataabsen'] = $this->M_absen->select_by_id($id);

		echo show_my_modal('modals/modal_update_absen', 'update-absen', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('absen', 'absen', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_absen->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data absen Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data absen Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_absen->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data absen Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data absen Gagal dihapus', '20px');
		}
	}

	public function detail() {
		$data['userdata'] 	= $this->userdata;

		$id 				= trim($_POST['id']);
		$data['absen'] = $this->M_absen->select_by_id($id);
		$data['dataabsen'] = $this->M_absen->select_by_pegawai($id);

		echo show_my_modal('modals/modal_detail_absen', 'detail-absen', $data, 'lg');
	}

	public function export() {
		error_reporting(E_ALL);


		$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->SetCellValue('A1', "ID");
		$sheet->SetCellValue('B1', "Nama absen");

		$data = $this->M_absen->select_all();
		$rowCount = 2;
		foreach($data as $value){
				$sheet->SetCellValue('A'.$rowCount, $value->id);
				$sheet->SetCellValue('B'.$rowCount, $value->nama);
				$rowCount++;
		}

		$writer = new Xlsx($spreadsheet); // instantiate Xlsx
		$filename = 'list-of-absen'; // set filename for excel file to be exported
		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		$writer->save('php://output');	// download file

	}

	// public function import() {
	// 	$this->form_validation->set_rules('excel', 'File', 'trim|required');
	//
	// 	if ($_FILES['excel']['name'] == '') {
	// 		$this->session->set_flashdata('msg', 'File harus diisi');
	// 	} else {
	// 		$config['upload_path'] = './assets/excel/';
	// 		$config['allowed_types'] = 'xls|xlsx';
	//
	// 		$this->load->library('upload', $config);
	//
	// 		if ( ! $this->upload->do_upload('excel')){
	// 			$error = array('error' => $this->upload->display_errors());
	// 		}
	// 		else{
	// 			$data = $this->upload->data();
	//
	// 			error_reporting(E_ALL);
	// 			date_default_timezone_set('Asia/Jakarta');
	//
	// 			include './assets/phpexcel/Classes/PHPExcel/IOFactory.php';
	//
	// 			$inputFileName = './assets/excel/' .$data['file_name'];
	// 			$objPHPExcel = PHPExcel_IOFactory::load($inputFileName);
	// 			$sheetData = $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	//
	// 			$index = 0;
	// 			foreach ($sheetData as $key => $value) {
	// 				if ($key != 1) {
	// 					$check = $this->M_absen->check_nama($value['B']);
	//
	// 					if ($check != 1) {
	// 						$resultData[$index]['nama'] = ucwords($value['B']);
	// 					}
	// 				}
	// 				$index++;
	// 			}
	//
	// 			unlink('./assets/excel/' .$data['file_name']);
	//
	// 			if (count($resultData) != 0) {
	// 				$result = $this->M_kota->insert_batch($resultData);
	// 				if ($result > 0) {
	// 					$this->session->set_flashdata('msg', show_succ_msg('Data absen Berhasil diimport ke database'));
	// 					redirect('absen');
	// 				}
	// 			} else {
	// 				$this->session->set_flashdata('msg', show_msg('Data absen Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
	// 				redirect('absen');
	// 			}
	//
	// 		}
	// 	}
	// }
}

/* End of file absen.php */
/* Location: ./application/controllers/absen.php */
