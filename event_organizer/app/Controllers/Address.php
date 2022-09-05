<?php

namespace App\Controllers;

use App\Models\M_User;
use App\Models\M_Wilayah;

class Address extends BaseController
{
    public function __construct()
    {
        $this->M_User = new M_User();
        $this->M_Wilayah = new M_Wilayah();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
    $users = $this->M_User->findUser($session->get("id_user"));
    
    if(!empty($users[0]['alamat'])){
         $pecah = explode("=", $users[0]['alamat']);
        $alamat = [];
            for ( $i = 0; $i < count( $pecah ); $i++ ) {
                // echo $pecah[$i] . "<br />";
                $alamat[$i] = $pecah[$i];
            }
        $alamatAsli = $alamat[0];
        $provinsi = $alamat[1];
        $cariProvinsi = $this->M_Wilayah->provinsifind($provinsi);
        $kota = $alamat[2];
        $cariKota = $this->M_Wilayah->kotafind($kota);
        $kecamatan = $alamat[3];
        $cariKecamatan = $this->M_Wilayah->kecamatanfind($kecamatan);
        $kelurahan = $alamat[4];
        $cariKelurahan = $this->M_Wilayah->kelurahanfind($kelurahan);

         $data = [
           'tittle' => 'My Profil',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'address',
           'users' => $users,
           'alamat' => $alamatAsli,
           'cariProvinsi' => $cariProvinsi,
           'cariKota'   => $cariKota,
           'cariKecamatan' => $cariKecamatan,
           'cariKelurahan' => $cariKelurahan,
           'provinsi'   => $this->M_Wilayah->provinsi(),
           'isi' => 'Profil/v_address'
       ];
       echo view('Profil/v_wrapper', $data);

    }else {
         $data = [
           'tittle' => 'My Profil',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'address',
           'users' => $users,
           'alamat' => '',
           'provinsi'   => $this->M_Wilayah->provinsi(),
           'isi' => 'Profil/v_address'
       ];
       echo view('Profil/v_wrapper', $data);
    }

    // var_dump($users[0]['alamat']);
    // die;
    // $pecah = explode("=", $users[0]['alamat']);
    // $alamat = [];
    //     for ( $i = 0; $i < count( $pecah ); $i++ ) {
    //         // echo $pecah[$i] . "<br />";
    //         $alamat[$i] = $pecah[$i];
    //     }
    // $alamatAsli = $alamat[0];
    // $provinsi = $alamat[1];
    // $cariProvinsi = $this->M_Wilayah->provinsifind($provinsi);
    // $kota = $alamat[2];
    // $cariKota = $this->M_Wilayah->kotafind($kota);
    // $kecamatan = $alamat[3];
    // $cariKecamatan = $this->M_Wilayah->kecamatanfind($kecamatan);
    // $kelurahan = $alamat[4];
    // $cariKelurahan = $this->M_Wilayah->kelurahanfind($kelurahan);

    // $alamat = $alamatAsli .', '. $cariKota[0]['name'] .', '. $cariKecamatan[0]['name'] .', '. $cariProvinsi[0]['name'];

    }

    public function update() {
        $session = session();
        
        $model = new M_User();

        $alamat = $this->request->getPost('alamat') . '=' . $this->request->getPost('provinsi') . '=' . 
            $this->request->getPost('kota') . '=' . $this->request->getPost('kecamatan') . '=' . 
            $this->request->getPost('kelurahan') ;

        $data = [
            'alamat'     => $alamat,
        ];

        $model->updateUser($data, $session->get("id_user"));
        $notif = [
            'status' => 'success',
            'message' => 'Data Berhasil Diubah !'
        ];
        $ses_data = [
            'alamat'          => $alamat,
        ];
        $session->set($ses_data);
        session()->setFlashdata('notif', $notif);
        return redirect()->back();

    }
}
