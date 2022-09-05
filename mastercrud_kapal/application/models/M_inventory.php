<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventory extends CI_Model {
    
	public function select_all_inventory() {
        $this->db->select("*");
		$this->db->from("inventory");
		$data = $this->db->get();
		return $data->result();
	}

	public function update($data) {
		$data=[
            "kode_kapal"=> $this->input->post('kode_kapal',true),
            "nama_barang"=> $this->input->post('nama_barang',true),
            "jenis_barang"=> $this->input->post('jenis_barang',true),
            "stok_barang"=> $this->input->post('stok_barang',true),
			"status_barang"=> $this->input->post('status_barang',true),
        ];
        $this->db->where('id_inventory',$this->input->post('id_inventory'));
        $this->db->update('inventory',$data);


		return $this->db->affected_rows();
	}


	public function delete($id) {
		$sql = "DELETE FROM inventory WHERE id_inventory ='" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function insert_inventory($data) {
		$id = "";
		$sql = "INSERT INTO inventory (id_inventory, kode_kapal, nama_barang, jenis_barang, stok_barang, status_barang) 
				VALUES ('{$id}', '{$data['kode_kapal']}', '{$data['nama_barang']}', '{$data['jenis_barang']}', '{$data['stok_barang']}', '{$data['status_barang']}' )";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_by_id($id) {
		$sql = "SELECT * FROM inventory WHERE id_inventory = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_kapal() {
		$sql = "SELECT id_kapal FROM kapal";

		$data = $this->db->query($sql);

		return $data->result();
	}
	
	
	public function select_all() {
		$sql = " SELECT inventory.id AS id, inventory.nama AS inventory, inventory.telp AS telp, kota.nama AS kota, kelamin.nama AS kelamin, posisi.nama AS posisi FROM inventory, kota, kelamin, posisi WHERE inventory.id_kelamin = kelamin.id AND inventory.id_posisi = posisi.id AND inventory.id_kota = kota.id";

		$data = $this->db->query($sql);

		return $data->result();
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


	public function insert2($data) {
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