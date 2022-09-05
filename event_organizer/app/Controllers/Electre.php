<?php

namespace App\Controllers;

use App\Models\M_Alternatif;
use App\Models\M_Electre;
use App\Models\M_Makanan;
use App\Models\M_User;

class Electre extends BaseController
{
    public function __construct()
    {
        $this->M_Alternatif = new M_Alternatif();
        $this->M_Electre = new M_Electre();
        $this->M_User = new M_User();
        $this->session = \Config\Services::session();
        helper('number');
        helper('form');
    }

    public function index()
    {
    
        $session = session();
        
        $n = 0;
        $kriteria = $this->M_Electre->tbl_kriteria();
        $tempat = $this->M_Electre->tbl_tempatLimit5();
        
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
                    // echo '<pre>';
                    // var_dump($newArr);
                    $x = 1;
                }
                $n++;
            }
            // die;
            $cel = $newArr;
            $normal = $cel;
            // echo '<pre>';
            // var_dump($cel);
            // die;

       $data = [
            'tittle'            => 'Electre',
            'currentAdminMenu'  => 'electre',
            'tema'              => '',
            'lokasi'            => '',
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electre',
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

    public function form()
    {
    
        $session = session();
        
        $n = 0;
        $kriteria = $this->M_Electre->tbl_kriteria();
        $tempat = $this->M_Electre->tbl_tempat();
        
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

    public function kriteria(){

        $session = session();
        $kriteria = $this->M_Electre->tbl_kriteria();
        $data = [
            'tittle'            => 'Kriteria',
            'currentAdminMenu'  => 'electre',
            'tema'              => '',
            'lokasi'            => '',
            'kriteria'          => $kriteria,
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electreKriteria',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function formTambahKriteria(){

        $session = session();
        
        $data = [
            'tittle'            => 'Tambah Kriteria',
            'currentAdminMenu'  => 'electre',
            'status'            =>  'tambah',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formKriteria',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function saveKriteria()
    {
        $model = new M_Electre();
        $nama = $this->request->getPost('nama_kriteria');
        $hasilCek = $model->cekNamaKriteria($nama);
        if(isset($hasilCek[0]['nama_kriteria']) == $nama){
            $notif = [
                'status' => 'error',
                'message' => 'Data Sudah Ada!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Electre/kriteria');
        }else{
            $data = array(
                'nama_kriteria'        => $this->request->getPost('nama_kriteria'),
                'bobot'        => $this->request->getPost('bobot'),
            );
            $success = $model->saveKriteria($data);
            if($success){
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Electre/kriteria');
            }else{
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Electre/kriteria');
            }
        }
        
    }

    public function formEditKriteria($id){

        $session = session();
        $model = new M_Electre();
        $hasilCek = $model->cekIdKriteria($id);
        $data = [
            'tittle'            => 'Tambah Kriteria',
            'currentAdminMenu'  => 'electre',
            'status'            =>  '',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'kriteria'          => $hasilCek,
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formKriteria',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function updateKriteria()
    {
        $model = new M_Electre();
        $id = $this->request->getPost('id_kriteria');
        $data = array(
            'nama_kriteria' => $this->request->getPost('kriteria'),
            'bobot'         => $this->request->getPost('bobot'),
        );

        $success = $model->updateKriteria($data, $id);
        
            if($success){
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Electre/kriteria');
            }else{
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Electre/kriteria');
            }
    }

    public function deleteKriteria($id)
    {
        $model = new M_Electre();
        //$id = $this->request->getPost('id');
        $model->deleteKriteria($id);
        return redirect()->to('Electre/kriteria');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }

    public function alternatif(){

        $session = session();
        $alternatif = $this->M_Electre->tbl_alternatif2();
        $data = [
            'tittle'            => 'Kriteria',
            'currentAdminMenu'  => 'electre',
            'tema'              => '',
            'lokasi'            => '',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'alternatif'        => $alternatif,
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electreAlternatif',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function matriks(){

        $session = session();
        $alternatif = $this->M_Electre->tbl_alternatif3();
        $data = [
            'tittle'            => 'Kriteria',
            'currentAdminMenu'  => 'electre',
            'tema'              => '',
            'lokasi'            => '',
            'alternatif'        => $alternatif,
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_electreMatriks',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function formTambahMatriks(){

        $session = session();
        
        $data = [
            'tittle'            => 'Tambah Matriks',
            'currentAdminMenu'  => 'electre',
            'status'            =>  'tambah',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'tempat'            => $this->M_Electre->tbl_tempat(),
            'kriteria'          => $this->M_Electre->tbl_kriteria(),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formMatriks',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }


    public function saveMatriks()
    {
        $model = new M_Electre();

       $namaKriteria = $this->M_Electre->tbl_kriteria();
       $alternatif = $this->request->getPost('tempat');
       $kriteria = $this->request->getPost('kriteria');

       for($i = 0; $i <= (count($kriteria))-1; $i++){
           foreach($namaKriteria as $key => $value){
               $hasil[$i] =  $kriteria[$i];
           }
           // echo $kriteria[$i];
       }

       foreach($namaKriteria as $key => $value){
           $krt[] = $value['id_kriteria'];
       }

       for($i = 0; $i <= (count($kriteria))-1; $i++){
           foreach($namaKriteria as $key => $value){
               $data[$i] = array(
                   'id_tempat'      => $alternatif,
                   'id_kriteria'    => $krt[$i],
                   'skor'           => $hasil[$i],
               );
               
           }
           
       }

       for($i = 0; $i <= (count($data))-1;){
           $success = $model->saveMatriks($data[$i]);
           $i++;
       }

       if($success){
           $notif = [
               'status' => 'success',
               'message' => 'Data Berhasil Ditambah!'
           ];
           session()->setFlashdata('notif', $notif);
           return redirect()->to('Electre/matriks');
       }else{
           $notif = [
               'status' => 'error',
               'message' => 'Data Gagal Ditambah!'
           ];
           session()->setFlashdata('notif', $notif);
           return redirect()->to('Electre/matriks');
       }
       
       // echo '<pre>';
       // var_dump($data);
       // die;
        
    }

    public function formEditMatriks($id){

        $session = session();
        $model = new M_Electre();
        $hasilCek = $model->cekIdKriteria($id);
        $data = [
            'tittle'            => 'Tambah Kriteria',
            'currentAdminMenu'  => 'electre',
            'status'            =>  '',
            'tempat'            => $this->M_Electre->tbl_tempat(),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'alternatif'       => $this->M_Electre->findMatriks($id),
            'kriteria'          => $this->M_Electre->tbl_kriteria(),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formMatriks',
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function updateMatriks()
    {
        $model = new M_Electre();
        // print_r($_POST);
        // die;
        $id = $this->request->getPost('id_alternatif');
        $data = array(
            'id_tempat'     => $this->request->getPost('id_tempat'),
            'id_kriteria'   => $this->request->getPost('id_kriteria'),
            'skor'          => $this->request->getPost('skor'),

        );

        $success = $model->updateMatriks($data, $id);
        
            if($success){
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Electre/matriks');
            }else{
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Electre/matriks');
            }
    }

    public function deleteMatriks($id)
    {
        $model = new M_Electre();
        //$id = $this->request->getPost('id');
        $model->deleteMatriks($id);
        return redirect()->to('Electre/matriks');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }
}