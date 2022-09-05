<?php

namespace App\Controllers;

use App\Models\M_Electre;
use App\Models\M_Makanan;
use App\Models\M_User;

class ElectreCari extends BaseController
{
    public function __construct()
    {
        $this->M_Electre = new M_Electre();
        $this->M_User = new M_User();
        $this->session = \Config\Services::session();
        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();

        $lokasi = $this->request->getPost('lokasi');
        $kapasitas  = $this->request->getPost('kapasitas');

        $hasil = [] ;

        if(empty($lokasi) && !empty($kapasitas)){
            if($kapasitas == 'Lebih Dari 1500'){
                $cariKapasitas = $this->M_Electre->cariKapasitas();
                foreach($cariKapasitas as $key => $value){
                    if($value['kapasitas'] > 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($kapasitas == 'Kurang dari 1500'){
                $cariKapasitas = $this->M_Electre->cariKapasitas();
                foreach($cariKapasitas as $key => $value){
                    if($value['kapasitas'] < 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }else{
                $cariKapasitas = $this->M_Electre->cariKapasitas();
                foreach($cariKapasitas as $key => $value){
                    if($value['kapasitas'] < 500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }

        }elseif(!empty($lokasi) && empty($kapasitas)){
            if($lokasi == 'Malang'){
                $hasil = $this->M_Electre->cariLokasi('Malang');
            }elseif($lokasi == 'Sidoarjo'){
                $hasil = $this->M_Electre->cariLokasi('Sidoarjo');
            }else{
                $hasil = $this->M_Electre->cariLokasi('Surabaya');
            }
        }elseif(!empty($lokasi) && !empty($kapasitas)){
            if($lokasi == 'Malang' && $kapasitas == 'Lebih Dari 1500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Malang');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] > 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($lokasi == 'Malang' && $kapasitas == 'Kurang dari 1500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Malang');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] < 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($lokasi == 'Malang' && $kapasitas == 'Kurang dari 500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Malang');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] < 500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }

            }elseif($lokasi == 'Sidoarjo' && $kapasitas == 'Lebih Dari 1500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Sidoarjo');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] > 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($lokasi == 'Sidoarjo' && $kapasitas == 'Kurang dari 1500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Sidoarjo');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] < 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($lokasi == 'Sidoarjo' && $kapasitas == 'Kurang dari 500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Sidorajo');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] < 500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            
            }elseif($lokasi == 'Surabaya' && $kapasitas == 'Lebih Dari 1500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Surabaya');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] > 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($lokasi == 'Surabaya' && $kapasitas == 'Kurang dari 1500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Surabaya');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] < 1500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }elseif($lokasi == 'Surabaya' && $kapasitas == 'Kurang dari 500'){
                $cariKapasitasLokasi = $this->M_Electre->cariLokasi('Surabaya');
                foreach($cariKapasitasLokasi as $key => $value){
                    if($value['kapasitas'] < 500){
                        $hasil [] = [
                            'id_tempat' => $value['id_tempat'],
                            'nama'      => $value['nama']
                        ];
                    }else{

                    }
                }
            }else{
                $hasil = $this->M_Electre->tbl_tempat();
            }
            
        }else{
            $hasil = $this->M_Electre->tbl_tempat();
        }

        $n = 0;
        $kriteria = $this->M_Electre->tbl_kriteria();
        $tempat = $hasil;

       
        
        foreach ($tempat as $key => $tmp){
            foreach($kriteria as $key => $ktr){
                $dataCel[$n] = $this->M_Electre->tbl_alternatif($tmp['id_tempat'],$ktr['id_kriteria']);
                $parentArray1 = array_values($dataCel);
                $n++;
            }
        }
        foreach ($parentArray1 as $childArray) 
            { 
                foreach ($childArray as $value) 
                { 
                $singleArray1[] = $value; 
                } 
            }
        foreach ($singleArray1 as $key => $value){
                $stringArrayKriteria[] = $value['skor'];
            }

        //      var_dump($tempat);
        // die;

        foreach ($tempat as $key => $value){
                $stringArrayTempat[] = $value['nama'];
            }

            $jumlahAlternatif = count($stringArrayTempat);
        
        // $j = 0;
        // for ($i=0; $i < count($singleArray1);){
        //     if ($i <= count($kriteria)){
        //         $celData2[$j] = $singleArray1[$j];
        //         $j++;
        //         $i++;
        //     }
        //     $i = 0;
        // }
            // echo '<pre>';
            // var_dump($stringArrayTempat);
            

           

            
            // $session->set('n', $baris);
            $session->set('n', $stringArrayTempat);
            // $jumlahAlternatif = count($baris);
           


            $baris = strval($jumlahAlternatif);

            // echo'pisah';
            // echo '<pre>';
            // var_dump($baris);
            // die;

            $kolom = count($kriteria);
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $b=1;
            $k=1;
            for($i=0; $i <= count($kriteria)-1;){
                $nama = $b.$k;
                $w[$nama] = $kriteria[$i]['bobot'];
                $i++;
                $k++;
            }
            // $w = [
            //     11 => 4,
            //     12 => 5,
            //     13 => 4,
            //     14 => 3,
            //     15 => 3,
            // ];
          
            $cel = $stringArrayKriteria;
            // $cel = $singleArray;
            $normal = $cel;
            $options = strval(1);
            
            /*var_dump($baris);
            echo '<pre>';
            var_dump($w);
            */
            // echo '<pre>';
            $chunk = array_chunk($cel, 5);
            
            $newArr = [];
            $n = 1;
            foreach ($chunk as $key => $v) {
                $x = $key + 1;
                foreach ($v as $i => $vv) {
                    $c = $i+1;
                    $newArr["$n$c"] = $vv;
                    // var_dump("");
                    $x = 1;
                }
                $n++;
            }
            $cel = $newArr;
            $normal = $cel;
            // echo '<pre>';
            // var_dump($cel);
            // die;

       $data = [
            'tittle'            => 'Electre',
            'currentAdminMenu'  => 'electre',
            'kapasitas'              => '',
            'lokasi'            => '',
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electreForm',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'baris'             => $baris,
            'kolom'             => $kolom,
            'w'                 => $w,
            'cel'               => $cel,
            'kriteria'          => $kriteria,
            'normal'            => $normal,
            'options'           => $options,
            'session'           => $session
       ];
       echo view('Dashboard/v_wrapper', $data);

            
    }
        

}