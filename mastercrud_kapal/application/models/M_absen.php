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
		$this->db->from('crew');
		$this->db->join('absen','absen.id_crew = crew.id_crew');      
		$query = $this->db->get();
		return $query->result();
	}

	public function insert_absen($data) {
		$id = "";
		$date = date("Y-m-d H:i:s");
		$sql = "INSERT INTO absen (id_absen, id_crew, tanggal, absensi ) 
				VALUES ('{$id}', '{$data['id_crew']}', '{$date}', '{$data['absensi']}' )";
		//$sql = "INSERT INTO crew VALUES('{$id}','" .$data['kode_kapal'] ."','" .$data['nama'] ."'," .$data['absensi'] ."," .$data['departemen'] ."," .$data['email'] .",1)";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}
	
	public function select_by_id($id) {
		$sql = "SELECT * FROM absen WHERE id_absen = {$id}";

		$data = $this->db->query($sql);

		return $data->row();
	}

	public function update($data) {
		
		$data=[
            "absensi"=> $this->input->post('absensi',true),
			"id_crew"=> $this->input->post('id_crew',true),
			"tanggal"=> $this->input->post('tanggal',true),

        ];
        $this->db->where('id_absen',$this->input->post('id_absen'));
        $this->db->update('absen',$data);

		return $this->db->affected_rows();
	}

	public function delete($id) {
		$sql = "DELETE FROM absen WHERE id_absen = '" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}


	//--------------------------
	
	
	public function insert_batch($data) {
		$this->db->insert_batch('posisi', $data);
		
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