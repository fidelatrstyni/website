<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PMS extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		// $this->load->model('M_pegawai');
		// $this->load->model('M_posisi');
		// $this->load->model('M_kota');
		$this->load->model('M_pms');
	}

	public function index() {
		$data['userdata'] = $this->userdata;
		$data['dataPms'] = $this->M_pms->select_all();
		$data['dataKapal'] = $this->M_pms->select_kapal();

		$data['page'] = "PMS";
		$data['judul'] = "Data PMS";
		$data['deskripsi'] = "Manage Data PMS";

		$data['modal_tambah_pms'] = show_my_modal('modals/modal_tambah_pms', 'tambah-pms', $data);

		$this->template->views('pms/home', $data);
	}

	public function tampil() {
		$data['dataPms'] = $this->M_pms->select_all();
		$this->load->view('pms/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('kode_kapal', 'Kode Kapal', 'trim|required');
		$this->form_validation->set_rules('pemeliharaan', 'Pemeliharaan', 'trim|required');

		$data = $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pms->insert_pms($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pms Berhasil ditambahkan', '20px');
				//refresh();
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data pms Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$id = ($_POST['id']);
		$data['dataCek'] = $id;
		$data['dataPms'] = $this->M_pms->select_by_id($id);
		$data['dataKapal'] = $this->M_pms->select_kapal();

		echo show_my_modal('modals/modal_update_pms', 'update-pms', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');
		$this->form_validation->set_rules('debit', 'Debit', 'trim|required');
		$this->form_validation->set_rules('kode_kapal', 'kode_kapal', 'trim|required');
		$this->form_validation->set_rules('saldo', 'Saldo', 'trim|required');

		$data = $this->input->post();

		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_pms->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pms Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data pms Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_pms->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data pms Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data pms Gagal dihapus', '20px');
		}
	}

	public function export() {
				$spreadsheet = new Spreadsheet(); // instantiate Spreadsheet
        $sheet = $spreadsheet->getActiveSheet();

				$sheet->SetCellValue('A1', "ID");
				$sheet->SetCellValue('B1', "Date");
				$sheet->SetCellValue('C1', "Keterangan");
				$sheet->SetCellValue('D1', "Debit");
				$sheet->SetCellValue('E1', "kode_kapal");
				$sheet->SetCellValue('F1', "Saldo");

				$data = $this->M_pms->select_all();
				$rowCount = 2;
				foreach($data as $value){
				    $sheet->SetCellValue('A'.$rowCount, $value->id);
				    $sheet->SetCellValue('B'.$rowCount, $value->date_insert);
				    $sheet->SetCellValue('C'.$rowCount, $value->keterangan);
				    $sheet->SetCellValue('D'.$rowCount, $value->debit);
				    $sheet->SetCellValue('E'.$rowCount, $value->kode_kapal);
				    $sheet->SetCellValue('F'.$rowCount, $value->saldo);
				    $rowCount++;
				}

        $writer = new Xlsx($spreadsheet); // instantiate Xlsx
        $filename = 'list-of-pms'; // set filename for excel file to be exported
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
	// 					$id = md5(DATE('ymdhms').rand());
	// 					$check = $this->M_pms->check_nama($value['B']);
	//
	// 					if ($check != 1) {
	// 						$resultData[$index]['id'] = $id;
	// 						$resultData[$index]['date_insert'] = ucwords($value['B']);
	// 						$resultData[$index]['keterangan'] = $value['C'];
	// 						$resultData[$index]['debit'] = $value['D'];
	// 						$resultData[$index]['kode_kapal'] = $value['E'];
	// 						$resultData[$index]['saldo'] = $value['F'];
	// 						// $resultData[$index]['status'] = $value['G'];
	// 					}
	// 				}
	// 				$index++;
	// 			}
	//
	// 			unlink('./assets/excel/' .$data['file_name']);
	//
	// 			if (count($resultData) != 0) {
	// 				$result = $this->M_pegawai->insert_batch($resultData);
	// 				if ($result > 0) {
	// 					$this->session->set_flashdata('msg', show_succ_msg('Data Pegawai Berhasil diimport ke database'));
	// 					redirect('Pegawai');
	// 				}
	// 			} else {
	// 				$this->session->set_flashdata('msg', show_msg('Data Pegawai Gagal diimport ke database (Data Sudah terupdate)', 'warning', 'fa-warning'));
	// 				redirect('Pegawai');
	// 			}
	//
	// 		}
	// 	}
	// }
}

/* End of file Pegawai.php */
/* Location: ./application/controllers/Pegawai.php */
