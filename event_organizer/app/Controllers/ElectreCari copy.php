<?php

namespace App\Controllers;

use App\Models\M_Alternatif;
use App\Models\M_Makanan;

class ElectreCari extends BaseController
{
    public function __construct()
    {
        $this->M_Alternatif = new M_Alternatif();
        $this->session = \Config\Services::session();
        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();

        $lokasi = $this->request->getPost('lokasi');
        $kapasitas  = $this->request->getPost('kapasitas');

        if(empty($lokasi) && !empty($kapasitas)){
            if($kapasitas == 'Lebih Dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitas('>','1500');
            }elseif($kapasitas == 'Kurang dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitas('<', '1500');
            }else{
                $hasil = $this->M_Alternatif->cariKapasitas('>', '500');
            }
        }elseif(!empty($lokasi) && empty($kapasitas)){
            if($lokasi == 'Malang'){
                $hasil = $this->M_Alternatif->cariLokasi('Malang');
            }elseif($lokasi == 'Sidoarjo'){
                $hasil = $this->M_Alternatif->cariLokasi('Sidoarjo');
            }else{
                $hasil = $this->M_Alternatif->cariLokasi('Surabaya');
            }
        }elseif(!empty($lokasi) && !empty($kapasitas)){
            if($lokasi == 'Malang' && $kapasitas == 'Lebih Dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Malang','>','1500');
            }elseif($lokasi == 'Malang' && $kapasitas == 'Kurang dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Malang','<','1500');
            }elseif($lokasi == 'Malang' && $kapasitas == 'Kurang dari 500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Malang','>','500');

            }elseif($lokasi == 'Sidoarjo' && $kapasitas == 'Lebih Dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Sidoarjo','>','1500');
            }elseif($lokasi == 'Sidoarjo' && $kapasitas == 'Kurang dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Sidoarjo','<','1500');
            }elseif($lokasi == 'Sidoarjo' && $kapasitas == 'Kurang dari 500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Sidoarjo','>','500');
            
            }elseif($lokasi == 'Surabaya' && $kapasitas == 'Lebih Dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Surabaya','>','1500');
            }elseif($lokasi == 'Surabaya' && $kapasitas == 'Kurang dari 1500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Surabaya','<','1500');
            }elseif($lokasi == 'Surabaya' && $kapasitas == 'Kurang dari 500'){
                $hasil = $this->M_Alternatif->cariKapasitasLokasi('Surabaya','>','500');
            }else{
                $hasil = $this->M_Alternatif->semuaData();
            }
            
        }else{
            $hasil = $this->M_Alternatif->semuaData();
        }

        

        // echo $lokasi ;echo '>'; echo $kapasitas ;echo '>' ;
        // die;

        if($lokasi != '' && $kapasitas != ''){
            $hasil = $this->M_Alternatif->cariLokasi($lokasi, $kapasitas);
            $n = 0;
            
            foreach ($hasil as $value){
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'],$value['harga'],$value['tahun'],$value['jarak'],$value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }
            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = []; 
            foreach ($parentArray as $childArray) 
            { 
                foreach ($childArray as $value) 
                { 
                $singleArray[] = $value; 
                } 
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];
            $cel = $singleArray;
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

       $data = [
            'tittle'            => 'Electre',
            'currentAdminMenu'  => 'electre',
            'kapasitas'              => $kapasitas,
            'lokasi'            => $lokasi,
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electre',
            'baris'             => $baris,
            'kolom'             => $kolom,
            'w'                 => $w,
            'cel'               => $cel,
            'normal'            => $normal,
            'options'           => $options,
            'session'           => $session
       ];
       echo view('Dashboard/v_wrapper', $data);
            
        }else if($lokasi != '' && $kapasitas == ''){
            $hasil = $this->M_Alternatif->cariLokasiAll($lokasi);
            $n = 0;
            
            foreach ($hasil as $value){
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'],$value['harga'],$value['tahun'],$value['jarak'],$value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }
            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = []; 
            foreach ($parentArray as $childArray) 
            { 
                foreach ($childArray as $value) 
                { 
                $singleArray[] = $value; 
                } 
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];
            $cel = $singleArray;
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

       $data = [
            'tittle'            => 'Electre',
            'currentAdminMenu'  => 'electre',
            'kapasitas'         => $kapasitas,
            'lokasi'            => $lokasi,
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electre',
            'baris'             => $baris,
            'kolom'             => $kolom,
            'w'                 => $w,
            'cel'               => $cel,
            'normal'            => $normal,
            'options'           => $options,
            'session'           => $session
       ];
       echo view('Dashboard/v_wrapper', $data);
            
        }else if($lokasi == '' && $kapasitas != ''){
            $hasil = $this->M_Alternatif->cariTema($kapasitas);
            $n = 0;
            
            foreach ($hasil as $value){
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'],$value['harga'],$value['tahun'],$value['jarak'],$value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }
            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = []; 
            foreach ($parentArray as $childArray) 
            { 
                foreach ($childArray as $value) 
                { 
                $singleArray[] = $value; 
                } 
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];
            $cel = $singleArray;
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

       $data = [
            'tittle'            => 'Electre',
            'currentAdminMenu'  => 'electre',
            'kapasitas'              => $kapasitas,
            'lokasi'            => $lokasi,
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electre',
            'baris'             => $baris,
            'kolom'             => $kolom,
            'w'                 => $w,
            'cel'               => $cel,
            'normal'            => $normal,
            'options'           => $options,
            'session'           => $session
       ];
       echo view('Dashboard/v_wrapper', $data);
        }else {
            // return redirect()->back();
            return redirect()->to('Electre');
        }
    }
        

}