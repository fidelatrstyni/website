<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_Lokasi extends Model{

    protected $table = ('tbl_tempat');

    public function getAll(){
        return $this->findAll();
    }

    public function findData($id){
        return $this->db->table('kategori')
        ->select('*')
        ->where('id_kategori', $id)
        ->get()->getRow();
    }

    public function namaTempat($nama){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->where('nama', $nama)
        ->get()->getRow();
    }

    public function simpan($data){
        $query = $this->db->table('tbl_tempat')->insert($data);
        return $query;
    }

    public function findId($id){
        return $this->db->table('tbl_tempat')
        ->select('*')
        ->where('id_tempat', $id)
        ->get()->getResultArray();
    }
    
    public function hapus($id)
    {
        $query = $this->db->table('tbl_tempat')->delete(array('id_tempat' => $id));
        return $query;
    }

    public function updateLokasi($data, $id)
    {
        $query = $this->db->table('tbl_tempat')->update($data, array('id_tempat' => $id));
        return $query;
    }
}
