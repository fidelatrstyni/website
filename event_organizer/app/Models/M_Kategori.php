<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Kategori extends Model{

    protected $table = ('tbl_kategori');

    protected $allowedFields = ['id_alternatif'];

    public function getAll(){
        return $this->findAll();
    }

    public function findData($id){
        return $this->db->table('tbl_kategori')
        ->select('*')
        ->where('id_kategori', $id)
        ->get()->getRow();
    }

    public function findId($id){
        return $this->db->table('tbl_kategori')
        ->select('*')
        ->where('id_kategori', $id)
        ->get()->getResultArray();
    }

    public function simpan($data){
        $query = $this->db->table('tbl_kategori')->insert($data);
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->db->table('tbl_kategori')->delete(array('id_kategori' => $id));
        return $query;
    }

    public function updateKategori($data, $id)
    {
        $query = $this->db->table('tbl_kategori')->update($data, array('id_kategori' => $id));
        return $query;
    }
}
