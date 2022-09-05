<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_monitoring extends CI_Model {

	public function select_all_monitoring() {
		$sql = "SELECT * FROM monitoring_kapal";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function kapal() {
		$sql = "SELECT * FROM kapal";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert_monitoring($data) {
		
		$id = "";
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO monitoring_kapal (id_monitoring, code_kapal, waktu, rpm, flowmeter, temperatur, pressurre) 
				VALUES ('{$id}', '{$data['code_kapal']}', '{$date}', '{$data['rpm']}', 
				'{$data['flowmeter']}', '{$data['temperatur']}', '{$data['pressurre']}' )";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$data=[
            "code_kapal"=> $this->input->post('code_kapal',true),
            "waktu"=> $this->input->post('waktu',true),
            "rpm"=> $this->input->post('rpm',true),
            "flowmeter"=> $this->input->post('flowmeter',true),
			"temperatur"=> $this->input->post('temperatur',true),
			"pressurre"=> $this->input->post('pressurre',true),
        ];
        $this->db->where('id_monitoring',$this->input->post('id_monitoring'));
        $this->db->update('monitoring_kapal',$data);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM monitoring_kapal WHERE id_monitoring ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	function insert($data){

		$this->db->insert('pengadaan',$data);
		return true;
	}


	public function select_all() {
		$sql = " SELECT * FROM pengadaan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_idPms() {
		$sql = "SELECT id_pms FROM pms";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM monitoring_kapal WHERE id_monitoring = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pengadaan";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_pms() {
		$sql = "SELECT id_pms FROM pms";

		$data = $this->db->query($sql);

		return $data->result();
	}

	// public function select_by_kota($id) {
	// 	$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";
	//
	// 	$data = $this->db->query($sql);
	//
	// 	return $data->row();
	// }



	public function insert_batch($data) {
		$this->db->insert_batch('pengadaan', $data);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama_produk', $nama);
		$data = $this->db->get('pengadaan');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pengadaan.php */
/* Location: ./application/models/M_pengadaan.php */
