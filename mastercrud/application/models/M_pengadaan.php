<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengadaan extends CI_Model {
	public function select_all_pengadaan() {
		$sql = "SELECT * FROM pengadaan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function insert($data) {
		
		$id = "";
		$sql = "INSERT INTO pengadaan (id_pengadaan, kode_item, permintaan_item, brand, stock, gudang, supplier) 
				VALUES ('{$id}', '{$data['kode_item']}', '{$data['permintaan_item']}', '{$data['brand']}', '{$data['stock']}', '{$data['gudang']}, '{$data['supplier']}')";
		//$sql = "INSERT INTO crew VALUES('{$id}','" .$data['kode_kapal'] ."','" .$data['nama'] ."'," .$data['jabatan'] ."," .$data['departemen'] ."," .$data['email'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
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
		$sql = "SELECT * FROM pengadaan WHERE id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pengadaan";

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

	public function update($data) {
		$sql = "UPDATE pengadaan SET nama_produk='" .$data['nama_produk'] ."', deskripsi_produk='" .$data['deskripsi_produk'] ."', stok='" .$data['stok'] ."', date_update='" .$data['date_update'] ."' WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pengadaan WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

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
