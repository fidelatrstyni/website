<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelayaran extends CI_Model {
    
	public function select_all_pelayaran() {
		/*$sql = "SELECT * FROM pelayaran";

		$data = $this->db->query($sql);

		return $data->result();*/
        $this->db->select("*");
		$this->db->from("pelayaran");
		$data = $this->db->get();
		return $data->result();
	}

	public function select_all_kapal() {
        $this->db->select("*");
		$this->db->from("kapal");
		$data = $this->db->get();
		return $data->result();
	}

	public function insert_pelayaran($data) {
		
		$id = "";
		$sql = "INSERT INTO pelayaran (id_pelayaran, kode_kapal, tujuan, asal, aktivitas) 
				VALUES ('{$id}', '{$data['kode_kapal']}', '{$data['tujuan']}', '{$data['asal']}', '{$data['aktivitas']}' )";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pelayaran WHERE id_pelayaran ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM pelayaran WHERE id_pelayaran = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$data=[
            "kode_kapal"=> $this->input->post('kode_kapal',true),
            "tujuan"=> $this->input->post('tujuan',true),
            "asal"=> $this->input->post('asal',true),
            "aktivitas"=> $this->input->post('aktivitas',true),
        ];
        $this->db->where('id_pelayaran',$this->input->post('id_pelayaran'));
        $this->db->update('pelayaran',$data);

		return $this->db->affected_rows();
	}

	//-----------------

	public function select_all() {
		$sql = " SELECT pelayaran.id AS id, pelayaran.nama AS pelayaran, pelayaran.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pelayaran, kota, kelamin, posisi WHERE pelayaran.id_kelamin = kelamin.id AND pelayaran.id_posisi = posisi.id AND pelayaran.id_kota = kota.id";

		$data = $this->db->query($sql);

		return $data->result();
	}


	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pelayaran WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pelayaran WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO pelayaran VALUES('{$id}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pelayaran', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pelayaran');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('pelayaran');

		return $data->num_rows();
	}
}

/* End of file M_pelayaran.php */
/* Location: ./application/models/M_pelayaran.php */