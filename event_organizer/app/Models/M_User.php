<?php namespace App\Models;
 
use CodeIgniter\Model;
 
class M_User extends Model{

    protected $table = ('tbl_users');

    protected $allowedFields = ['nama','username','password','email','roles','status','tlp','alamat','img_profil'];

    public function getAll(){
        return $this->findAll();
    }

    public function dataCustomer(){
        return $this->db->table('tbl_users')
        ->select('*')
        ->where('roles', 3)
        ->get()->getResultArray();
    }

    public function dataPegawai(){
        return $this->db->table('tbl_users')
        ->select('*')
        ->where('roles', 2)
        ->orWhere('roles', 1)
        ->get()->getResultArray();
    }

    public function findData($id){
        return $this->db->table('tbl_users')
        ->select('*')
        ->where('id_kategori', $id)
        ->get()->getRow();
    }

    public function findUser($id){
        $sql = "SELECT * FROM tbl_users WHERE id_user = {$id}";

		$data = $this->db->query($sql);

		return $data->getResultArray();
    }

    public function updateUser($data, $id)
    {
        $query = $this->db->table('tbl_users')->update($data, array('id_user' => $id));
        return $query;
    }

    public function hapus($id)
    {
        $query = $this->db->table('tbl_users')->delete(array('id_user' => $id));
        return $query;
    }
}
