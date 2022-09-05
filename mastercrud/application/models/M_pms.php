<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pms extends CI_Model {

	public function select_all() {
		$sql = " SELECT * FROM pms";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert_pms($data) {
		//$id = SUBSTRING(MD5(RAND() FROM 1 FOR 8));
		$id = md5(DATE('ym').rand());
		$sql = "INSERT INTO pms (id_pms, kode_kapal, pemeliharaan) 
				VALUES ('{$id}', '{$data['kode_kapal']}', '{$data['pemeliharaan']}' )";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_kapal() {
		$sql = "SELECT id_kapal FROM kapal";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pms WHERE id = {$id}";

		$data = $this->db->query($sql);

		if($data !== false){
    		$result = $data->row();
		}else{
   			 return false;
		}

		//return $data->row();
	}

	public function update($data) {
		//$sql = "UPDATE pms SET nama='" .$data['nama'] ."', email='" .$data['email'] ."', jabatan=" .$data['jabatan'] .", departemen=" .$data['departemen'] .", kode_kapal=" .$data['kode_kapal'] ." WHERE id='" .$data['id_pms'] ."'";
		$data=[
            "nama"=> $this->input->post('nama',true),
            "jabatan"=> $this->input->post('jabatan',true),
            "email"=> $this->input->post('email',true),
            "departemen"=> $this->input->post('departemen',true),
			"kode_kapal"=> $this->input->post('kode_kapal',true),
        ];
        $this->db->where('id_pms',$this->input->post('id_pms'));
        $this->db->update('pms',$data);

		/*$sql = "UPDATE pms 
				SET nama = '$data['nama']',
				email = $data['email'],
				jabatan = $data['jabatan'], 
				departemen = $data['departemen'],
				kode_kapal = $data['kode_kapal']
				WHERE id_pms = $data['id_pms'] ";
*/
		//$this->db->query($sql);

		return $this->db->affected_rows();
	}



	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pms";

		$data = $this->db->query($sql);

		return $data->row();
	}

	// public function select_by_kota($id) {
	// 	$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";
	//
	// 	$data = $this->db->query($sql);
	//
	// 	return $data->row();
	// }


	public function delete($id) {
		$sql = "DELETE FROM pms WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert2($data) {
		// $id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO pms (`id`, `date_insert`, `date_update`, `keterangan`, `debit`, `kredit`, `saldo`) VALUES( NULL , '" .$data['date_insert'] ."', '" . $data['date_update'] . "','" .$data['keterangan'] ."','" .$data['kredit'] ."','" .$data['debit'] ."','" .$data['saldo'] ."')";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pms');

		return $data->num_rows();
	}
}

/* End of file M_pms.php */
/* Location: ./application/models/M_pms.php */
