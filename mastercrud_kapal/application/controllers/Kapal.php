<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kapal extends AUTH_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_kapal');
	}

	public function index() {
		$data['userdata'] 	= $this->userdata;
		$data['dataKapal'] = $this->M_kapal->select_all();
		//$data['kodeKapal'] = $this->M_kapal->generateKode();
		$data['kodeKapal'] = $this->M_kapal->cekKodeKapal();


		$data['page'] 		= "kapal";
		$data['judul'] 		= "Data Kapal";
		$data['deskripsi'] 	= "Manage Data Kapal";

		$data['modal_tambah_kapal'] = show_my_modal('modals/modal_tambah_kapal', 'tambah-kapal', $data);

		$this->template->views('kapal/home', $data);
	}

	public function tampil() {
		$data['dataKapal'] = $this->M_kapal->select_all();
		$this->load->view('kapal/list_data', $data);
	}

	public function prosesTambah() {
		$this->form_validation->set_rules('id_kapal', 'Id Kapal', 'trim|required');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kapal->insert_kapal($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kapal Berhasil ditambahkan', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_err_msg('Data kapal Gagal ditambahkan', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function update() {
		$data['userdata'] 	= $this->userdata;

		$num 				= trim($_POST['id']);
		$id					= (string)$num;
		$check = trim($_POST['id']);
		$data['dataKapal'] = $this->M_kapal->select_by_id($id);

		echo show_my_modal('modals/modal_update_kapal', 'update-kapal', $data);
	}

	public function prosesUpdate() {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'trim|required');
		$this->form_validation->set_rules('status', 'status', 'trim|required');

		$data 	= $this->input->post();
		if ($this->form_validation->run() == TRUE) {
			$result = $this->M_kapal->update($data);

			if ($result > 0) {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kapal Berhasil diupdate', '20px');
			} else {
				$out['status'] = '';
				$out['msg'] = show_succ_msg('Data kapal Gagal diupdate', '20px');
			}
		} else {
			$out['status'] = 'form';
			$out['msg'] = show_err_msg(validation_errors());
		}

		echo json_encode($out);
	}

	public function delete() {
		$id = $_POST['id'];
		$result = $this->M_kapal->delete($id);

		if ($result > 0) {
			echo show_succ_msg('Data kapal Berhasil dihapus', '20px');
		} else {
			echo show_err_msg('Data kapal Gagal dihapus', '20px');
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
