<?php

namespace App\Controllers;

use App\Models\M_Wilayah;

class DataWilayah extends BaseController
{
    public function __construct()
    {
        $this->M_Wilayah = new M_Wilayah();
        helper('number');
        helper('form');
    }

    public function wilayah()
    {
        switch ($_GET['jenis']) {
            //ambil data kota / kabupaten
            case 'kota':
            $id_provinces = $_POST['id_provinces'];
            if($id_provinces == ''){
                 exit;
            }else{
                 $getcity = $this->M_Wilayah->kota($id_provinces);
                 foreach($getcity as $key => $kota){
                    echo '<option value="'.$kota['id'].'">'.$kota['name'].'</option>';
                 }
                 //   while($data = mysqli_fetch_array($getcity)){
               //        echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
               //   }
                 exit;    
            }
            break;
    
            //ambil data kecamatan
            case 'kecamatan':
            $id_regencies = $_POST['id_regencies'];
            if($id_regencies == ''){
                 exit;
            }else{
                 $getcity = $this->M_Wilayah->kecamatan($id_regencies);
                 foreach($getcity as $key => $kecamatan){
                    echo '<option value="'.$kecamatan['id'].'">'.$kecamatan['name'].'</option>';
                 }
                 //   while($data = mysqli_fetch_array($getcity)){
               //        echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
               //   }
                 exit;    
            }
            break;
            
    
            //ambil data kelurahan
            case 'kelurahan':
            $id_district = $_POST['id_district'];
            if($id_district == ''){
                 exit;
            }else{
                 $getcity = $this->M_Wilayah->kelurahan($id_district);
                 foreach($getcity as $key => $kelurahan){
                    echo '<option value="'.$kelurahan['id'].'">'.$kelurahan['name'].'</option>';
                 }
                 //   while($data = mysqli_fetch_array($getcity)){
               //        echo '<option value="'.$data['id'].'">'.$data['name'].'</option>';
               //   }
                 exit;    
            }
            break;
            
        }
    
    }

}