<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {
	public function select_all_pegawai() {
		$sql = "SELECT * FROM crew";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function cekEmail($email) {
		$this->db->select('email');
		$this->db->from('crew');
		$this->db->where('email', $email);
		$query = $this->db->get();
		//$q = $this->db->get('crew');
		
		return $query->num_rows();
	}

	public function insert_crew($data) {
		$id = "";
		$sql = "INSERT INTO crew (id_crew, kode_kapal, nama, jabatan, departemen, email) 
				VALUES ('{$id}', '{$data['kode_kapal']}', '{$data['nama']}', '{$data['jabatan']}', '{$data['departemen']}', '{$data['email']}')";
		//$sql = "INSERT INTO crew VALUES('{$id}','" .$data['kode_kapal'] ."','" .$data['nama'] ."'," .$data['jabatan'] ."," .$data['departemen'] ."," .$data['email'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_kapal() {
		$sql = "SELECT id_kapal FROM kapal";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM crew WHERE id_crew = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		//$sql = "UPDATE crew SET nama='" .$data['nama'] ."', email='" .$data['email'] ."', jabatan=" .$data['jabatan'] .", departemen=" .$data['departemen'] .", kode_kapal=" .$data['kode_kapal'] ." WHERE id='" .$data['id_crew'] ."'";
		$data=[
            "nama"=> $this->input->post('nama',true),
            "jabatan"=> $this->input->post('jabatan',true),
            "email"=> $this->input->post('email',true),
            "departemen"=> $this->input->post('departemen',true),
			"kode_kapal"=> $this->input->post('kode_kapal',true),
        ];
        $this->db->where('id_crew',$this->input->post('id_crew'));
        $this->db->update('crew',$data);

		/*$sql = "UPDATE crew 
				SET nama = '$data['nama']',
				email = $data['email'],
				jabatan = $data['jabatan'], 
				departemen = $data['departemen'],
				kode_kapal = $data['kode_kapal']
				WHERE id_crew = $data['id_crew'] ";
*/
		//$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function total_rows() {
		$data = $this->db->get('crew');

		return $data->num_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM crew WHERE id_crew='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}




	public function select_all() {
		$sql = " SELECT pegawai.id AS id, pegawai.nama AS pegawai, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id_kota = kota.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id2($id) {
		$sql = "SELECT pegawai.id AS id_pegawai, pegawai.nama AS nama_pegawai, pegawai.id_kota, pegawai.id_kelamin, pegawai.id_posisi, pegawai.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM pegawai, kota, kelamin, posisi WHERE pegawai.id_kota = kota.id AND pegawai.id_kelamin = kelamin.id AND pegawai.id_posisi = posisi.id AND pegawai.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_posisi = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pegawai WHERE id_kota = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update2($data) {
		$sql = "UPDATE crew SET nama='" .$data['nama'] ."', telp='" .$data['telp'] ."', id_kota=" .$data['kota'] .", id_kelamin=" .$data['jk'] .", id_posisi=" .$data['posisi'] ." WHERE id='" .$data['id_crew'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete2($id) {
		$sql = "DELETE FROM pegawai WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO pegawai VALUES('{$id}','" .$data['nama'] ."','" .$data['telp'] ."'," .$data['kota'] ."," .$data['jk'] ."," .$data['posisi'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('pegawai', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}

	public function total_rows2() {
		$data = $this->db->get('pegawai');

		return $data->num_rows();
	}
}

/* End of file M_pegawai.php */
/* Location: ./application/models/M_pegawai.php */