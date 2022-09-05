<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventory extends CI_Model {
    
	public function select_all_inventory() {
		/*$sql = "SELECT * FROM inventory";

		$data = $this->db->query($sql);

		return $data->result();*/
        $this->db->select("*");
		$this->db->from("inventory");
		$data = $this->db->get();
		return $data->result();
	}

	public function select_all() {
		$sql = " SELECT inventory.id AS id, inventory.nama AS inventory, inventory.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM inventory, kota, kelamin, posisi WHERE inventory.id_kelamin = kelamin.id AND inventory.id_posisi = posisi.id AND inventory.id_kota = kota.id";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function select_by_id($id) {
		$sql = "SELECT inventory.id AS id_inventory, inventory.nama AS nama_inventory, inventory.id_kota, inventory.id_kelamin, inventory.id_posisi, inventory.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM inventory, kota, kelamin, posisi WHERE inventory.id_kota = kota.id AND inventory.id_kelamin = kelamin.id AND inventory.id_posisi = posisi.id AND inventory.id = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM inventory WHERE nama_barang = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_kota($id) {
		$sql = "SELECT COUNT(*) AS jml FROM inventory WHERE kode_kapal = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		$sql = "UPDATE inventory SET nama='" .$data['nama'] ."', telp='" .$data['telp'] ."', id_kota=" .$data['kota'] .", id_kelamin=" .$data['jk'] .", id_posisi=" .$data['posisi'] ." WHERE id='" .$data['id'] ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM inventory WHERE id='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert($data) {
		$id = md5(DATE('ymdhms').rand());
		$sql = "INSERT INTO inventory VALUES('{$id}','" .$data['kode_kapal'] ."','" .$data['nama_barang'] ."'," .$data['jenis_barang'] ."," .$data['stok_barang'] ."," .$data['status_barang'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_batch($data) {
		$this->db->insert_batch('inventory', $data);
		
		return $this->db->affected_rows();
	}

	public function check_nama($nama) {
		$this->db->where('nama', $nama);
		$data = $this->db->get('inventory');

		return $data->num_rows();
	}

	public function total_rows() {
		$data = $this->db->get('inventory');

		return $data->num_rows();
	}
}

/* End of file M_inventory.php */
/* Location: ./application/models/M_inventory.php */