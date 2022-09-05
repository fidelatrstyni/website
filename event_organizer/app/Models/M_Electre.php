<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Electre extends Model{

    public function tbl_alternatif($id, $kriteria){
        return $this->db->table('tbl_alternatif')
        ->select('skor')
        ->where('id_tempat', $id)
        ->where('id_kriteria', $kriteria)
        ->get()->getResultArray();
    }

    public function tbl_kriteria(){
        return $this->db->table('tbl_kriteria')
        ->select('*')
        ->get()->getResultArray();
    }

    public function tbl_tempat(){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->get()->getResultArray();
    }

    public function tbl_tempatLimit5(){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->limit(5)
        ->get()->getResultArray();
    }


    public function cekNamaKriteria($nama){
        return $this->db->table('tbl_kriteria')
         ->select('*')
         ->where('nama_kriteria', $nama)
         ->get()->getResultArray(); 
    }

    public function cekIdKriteria($id){
        return $this->db->table('tbl_kriteria')
         ->select('*')
         ->where('id_kriteria', $id)
         ->get()->getResultArray(); 
    }

    public function saveKriteria($data){
        $query = $this->db->table('tbl_kriteria')->insert($data);
        return $query;
    }

    public function updateKriteria($data, $id)
    {
        $query = $this->db->table('tbl_kriteria')->update($data, array('id_kriteria' => $id));
        return $query;
    }

    public function deleteKriteria($id)
    {
        $query = $this->db->table('tbl_kriteria')->delete(array('id_kriteria' => $id));
        return $query;
    }

    public function tbl_alternatif2(){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->get()->getResultArray();
    }

    public function tbl_alternatif3(){
        $query =  $this->db->table('tbl_alternatif as al')
        ->join('tbl_tempat as tp', 'al.id_tempat = tp.id_tempat')
        ->join('tbl_kriteria as kr', 'al.id_kriteria = kr.id_kriteria')
        ->get()->getResultArray();
       return $query;
    }

    public function findMatriks($id){
        return $this->db->table('tbl_alternatif')
         ->select('*')
         ->where('id_alternatif', $id)
         ->get()->getResultArray(); 
    }

    public function updateMatriks($data, $id)
    {
        $query = $this->db->table('tbl_alternatif')->update($data, array('id_alternatif' => $id));
        return $query;
    }

    public function saveMatriks($data){
        $query = $this->db->table('tbl_alternatif')->insert($data);
        return $query;
    }

    public function deleteMatriks($id)
    {
        $query = $this->db->table('tbl_alternatif')->delete(array('id_alternatif' => $id));
        return $query;
    }

    public function cariKapasitas()
    {
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->get()->getResultArray();
    }

    public function cariLokasi($lokasi)
    {
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->where('kota', $lokasi)
        ->get()->getResultArray();
    }
}
