<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Paket extends Model{

    protected $table = ('tbl_paket');

    public function getAll(){
        return $this->findAll();
    }

    public function allData()
    {
        return $this->db
            ->table('tbl_paket')
            ->join('tbl_kategori as a', 'a.id_kategori = tbl_paket.id_kategori', 'left')
            ->select('*')
            ->orderBy('tbl_paket.nama_paket', 'ASC' )
            ->get()->getResultArray();
    }

    public function findPaket($id){
        return $this->db->table('tbl_paket')
        ->select('*')
        ->where('id_paket', $id)
        ->get()->getResultArray();
    }

    public function findAllPaket($id){
        return $this->db->table('tbl_paket')
        ->select('*')
        ->where('id_kategori', $id)
        ->get()->getResultArray();
    }

    public function findDataPaket($id){
        return $this->db->table('tbl_paket')
        ->select('*')
        ->where('id_paket', $id)
        ->get()->getResultArray();
    }

    public function simpan($data){
        $query = $this->db->table('tbl_paket')->insert($data);
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->db->table('tbl_paket')->delete(array('id_paket' => $id));
        return $query;
    }

    public function updatePaket($data, $id)
    {
        $query = $this->db->table('tbl_paket')->update($data, array('id_paket' => $id));
        return $query;
    }
}
