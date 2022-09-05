<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_absen extends CI_Model {
	public function select_all() {
		$data = $this->db->get('absen');

		return $data->result();
	}

	public function select_crew() {
		$data = $this->db->get('crew');

		return $data->result();
	}

	public function join2table() {
		$this->db->select('*');
		$this->db->from('absen');
		$this->db->join('crew','crew.id_crew = absen.id_crew');      
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_absen($data) {
		$id = "";
		$sql = "INSERT INTO absen (id_absen, id_crew, tanggal, absensi ) 
				VALUES ('{$id}', '{$data['id_crew']}', '{$data['tanggal']}', '{$data['absensi']}' )";
		//$sql = "INSERT INTO crew VALUES('{$id}','" .$data['kode_kapal'] ."','" .$data['nama'] ."'," .$data['absensi'] ."," .$data['departemen'] ."," .$data['email'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function select_by_pegawai($id) {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id AND pegawai.id_posisi={$id}";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('posisi', $data);
		
		return $this->db->affected_rows();
	}

	public function update($data) {
		$sql = "UPDATE posisi SET nama='" .$data['posisi'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM posisi WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('posisi');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('posisi');

		return $data->num_rows();
	}
}

/* End of file M_posisi.php */
/* Location: ./application/models/M_posisi.php */