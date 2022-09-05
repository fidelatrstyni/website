<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengadaan extends CI_Model {

	public function select_all_pengadaan() {
		$sql = "SELECT * FROM pengadaan";

		$data = $this->db->query($sql);

		return $data->result();
	}

	public function join3table() {
		$this->db->select('*');
		$this->db->from('pengadaan');
		$this->db->join('pms','pengadaan.kode_item = pms.id_pms','LEFT');      
		$this->db->join('kapal','pms.kode_kapal = kapal.id_kapal','LEFT');
		$query = $this->db->get();

		return $query->result();
	}

	public function insert_pengadaan($data) {
		$date = date("Y-m-d H:i:s");
		$id = "";
		$sql = "INSERT INTO pengadaan (id_pengadaan, kode_item, permintaan_item, brand, stock, gudang, supplier, tanggal, aktor) 
				VALUES ('{$id}', '{$data['kode_item']}', '{$data['permintaan_item']}', '{$data['brand']}', 
				'{$data['stock']}', '{$data['gudang']}', '{$data['supplier']}', '{$date}', '{$data['aktor']}' )";
		
		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function update($data) {
		$data=[
            "kode_item"=> $this->input->post('kode_item',true),
            "permintaan_item"=> $this->input->post('permintaan_item',true),
            "brand"=> $this->input->post('brand',true),
            "stock"=> $this->input->post('stock',true),
			"gudang"=> $this->input->post('gudang',true),
			"supplier"=> $this->input->post('supplier',true),
        ];
        $this->db->where('id_pengadaan',$this->input->post('id_pengadaan'));
        $this->db->update('pengadaan',$data);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM pengadaan WHERE id_pengadaan ='" .$id ."'";

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
		$sql = "SELECT * FROM pengadaan WHERE id_pengadaan = '{$id}'";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function select_by_posisi($id) {
		$sql = "SELECT COUNT(*) AS jml FROM pms";

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
		$data = $this->db->get('pengadaan');

		return $data->num_rows();
	}
}

/* End of file M_pengadaan.php */
/* Location: ./application/models/M_pengadaan.php */
