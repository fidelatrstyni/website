<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kapal extends CI_Model {
	public function select_all() {
		$data = $this->db->get('kapal');

		return $data->result();
	}

	public function generateKode() {
		$this->db->select('RIGHT(id_kapal,4) as id_kapal', false);
        $this->db->order_by("id_kapal", "DESC");
        $this->db->limit(1);
        $query = $this->db->get('kapal');

        // SQL QUERY
        // SELECT RIGHT(id_kapal, 4) AS id_kapal FROM tb_siswa
        // ORDER BY id_kapal
        // LIMIT 1

        // CEK JIKA DATA ADA
        if($query->num_rows() <> 0)
        {
			foreach($query->result() as $k){
                $tmp = ((int)$k->id_kapal)+1;
                $kodeKapal = sprintf("%04s", $tmp);
            }
            //$data       = $query->row(); // ambil satu baris data
			//$no = 1;
            //$kodeKapal  = intval($data->id_kapal) + 1; // tambah 1
			
        }else{
            $kodeKapal  = 1; // isi dengan 1
        }

        $lastKode = str_pad($kodeKapal, 3, "0", STR_PAD_LEFT);
        //$tahun    = date("Y");
        $Kode      = "KPL";

        $newKode  = $Kode.$lastKode;

        return $newKode;
	}

	public function insert_kapal($data) {

		$sql = "INSERT INTO kapal (id_kapal, nama, jenis, status) 
				VALUES ('{$data['id_kapal']}', '{$data['nama']}', '{$data['jenis']}', '{$data['status']}' )";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function cekKodeKapal()
    {
        $ci = get_instance();
		$query = "SELECT MAX(id_kapal) as maxKode FROM kapal";
		$data = $ci->db->query($query)->row_array(); 
		
		$kode = $data['maxKode']; 
		$noUrut = (int) substr($kode, 4, 5);
		$noUrut++;
		$char = "KPL";
		$kodeBaru = $char.sprintf("%05s",$noUrut);
		return $kodeBaru;
    }

	public function delete($id) {
		$sql = "DELETE FROM kapal WHERE id_kapal = '" .$id ."'";

		$this->db->query($sql);

		return $this->db->affected_rows();
	}

	public function select_by_id($id) {
		$this->db->select('id_kapal, nama , jenis, status');
		$this->db->where('id_kapal', $id);
		$q = $this->db->get('kapal');
		//$data = $q->result_array();
		
		//$sql = "SELECT * FROM kapal WHERE id_kapal = {$id}";
		//$data = $this->db->query($sql);
		//return $data->result();
		return $q->result_array();
	}

	public function select_by_nama($id) {
		$sql = "SELECT COUNT(*) AS jml FROM kapal";

		$data = $this->db->query($sql);

		return $data->row();
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
	
	public function update($data) {
		
		$data=[
            "nama"=> $this->input->post('nama',true),
			"jenis"=> $this->input->post('jenis',true),
			"status"=> $this->input->post('status',true),

        ];
        $this->db->where('id_kapal',$this->input->post('id_kapal'));
        $this->db->update('kapal',$data);

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