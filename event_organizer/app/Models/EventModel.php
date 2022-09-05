<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class EventModel extends Model{

	protected $table = ('tbl_transaksi');

	function fetch_all_event(){
		$sql = "SELECT * FROM tbl_transaksi ORDER BY id";
		$data = $this->db->query($sql);
		return $data->getResultArray();
	}
	  
	function insert_event($data)
	{
		$query = $this->db->table('tbl_transaksi')->insert($data);
		return $query;
	}
	
	function update_event($data, $id)
	{
		$query = $this->db->table('tbl_transaksi')->update($data, array('id' => $id));
		return $query;
	}
	
	function delete_event($id)
	{
		$query = $this->db->table('tbl_transaksi')->delete(array('id' => $id));
		return $query;
	}

	function cekHari($awal, $akhir)
	{
		return $this->db->table('tbl_transaksi')
        //  ->where('start_event', $awal)
        //  ->where('end_event', $akhir)
		 ->where('date(start_event) >= ', date('Y-m-d', strtotime($awal)))
		 ->where('date(end_event) <= ', date('Y-m-d', strtotime($akhir)))
         ->get()
		 ->getResultArray(); 
	}

	function cekDataUser($id_user)
	{
		return $this->db->table('tbl_transaksi')
         ->where('id_user', $id_user)
		 ->where('status', 'Proses')
         ->get()->getResultArray(); 
	}
}
