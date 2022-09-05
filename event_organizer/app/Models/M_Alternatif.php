<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Alternatif extends Model{

    protected $table = ('tbl_tempat');
    // protected $allowedFields = ['Gambar','tbl_tempat','kota'];


    public function getAll(){
        return $this->findAll();
    }

    public function tbl_alternatif($id, $kriteria){
        return $this->db->table('tbl_alternatif')
        ->select('skor')
        ->where('id_tempat', $id)
        ->where('id_kriteria', $kriteria)
        ->get()->getResultArray();
    }

    public function cariId($id){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->where('id_tempat', $id)
        ->get()->getResultArray();
    }

    public function findData($id){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->where('tema', $id)
        ->get()->getResultArray();
    }

    public function cariTema($tema)
    {
        $sql = "SELECT * FROM tbl_tempat WHERE tema = '{$tema}'";

		$data = $this->db->query($sql);

		return $data->getResultArray();

    }

    public function cariLokasiAll($lokasi)
    {
        $sql = "SELECT * FROM tbl_tempat WHERE kota = '{$lokasi}'";

		$data = $this->db->query($sql);

		return $data->getResultArray();

    }

    public function cariLokasi($lokasi, $tema)
    {
        $sql = "SELECT * FROM tbl_tempat WHERE kota = '{$lokasi}' AND tema = '{$tema}'";

		$data = $this->db->query($sql);

		return $data->getResultArray();

    }

    public function cariNama($nama)
    {
        $sql = "SELECT * FROM tbl_tempat WHERE nama = '{$nama}'";

		$data = $this->db->query($sql);

		return $data->getResultArray();

    }

    // public function cariLokasi($lokasi, $tema)
    // {
    //     $sql = "SELECT * FROM tbl_tempat WHERE kota = '{$lokasi}' AND tema = '{$tema}'";

	// 	$data = $this->db->query($sql);

	// 	return $data->getResultArray();

    // }

    // public function cariJarak($jarak, $tema)
    // {
    //     $sql = "SELECT * FROM tbl_tempat WHERE jarak = '{$jarak}' AND tema = '{$tema}'";

	// 	$data = $this->db->query($sql);

	// 	return $data->getResultArray();

    // }

    // public function cariAll($lokasi,$jarak,$tema)
    // {
    //     $sql = "SELECT * FROM tbl_tempat WHERE kota = '{$lokasi}' AND jarak = '{$jarak}' AND tema = '{$tema}'";

	// 	$data = $this->db->query($sql);

	// 	return $data->getResultArray();

    // }


}
