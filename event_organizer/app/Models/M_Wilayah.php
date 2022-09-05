<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Wilayah extends Model
{

    public function provinsi(){
        $sql = "SELECT * FROM provinces ORDER BY name ASC";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

    public function provinsifind($id){
        $sql = "SELECT * FROM provinces WHERE id = '$id'";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

    public function kotafind($id){
        $sql = "SELECT * FROM regencies WHERE id = '$id'";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

    public function kecamatanfind($id){
        $sql = "SELECT * FROM districts WHERE id = '$id'";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

    public function kelurahanfind($id){
        $sql = "SELECT * FROM villages WHERE id = '$id'";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

    public function kota($id_provinces){
        $sql = "SELECT  * FROM regencies WHERE province_id ='$id_provinces' ORDER BY name ASC";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }
    
    public function kecamatan($id_regencies){
        $sql = "SELECT  * FROM districts WHERE regency_id ='$id_regencies' ORDER BY name ASC";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

    public function kelurahan($id_district){
        $sql = "SELECT  * FROM villages WHERE district_id ='$id_district' ORDER BY name ASC";

		$data = $this->db->query($sql);

		return $data->getResultArray(); 
    }

}