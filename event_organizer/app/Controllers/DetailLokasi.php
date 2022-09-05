<?php

namespace App\Controllers;

use App\Models\M_Alternatif;
use App\Models\M_Paket;
use App\Models\M_User;
use App\Models\M_Wilayah;

class DetailLokasi extends BaseController
{
    public function __construct()
    {
        $this->M_Alternatif = new M_Alternatif();
        $this->M_User = new M_User();
        $this->M_Paket = new M_Paket();
        $this->M_Wilayah = new M_Wilayah();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle'     => 'Langkah Awal Pemesanan',
           'session'    => $session->get("username"),
           'session'    => $session->get("id_user"),
           'kategori'   => $this->M_Alternatif->getAll(),
           'isi'        => 'Proses/v_prosesKedua'
       ];
       echo view('LayoutProses/v_wrapper', $data);
    }

    public function detailEvent(){
        
        // $splide = array("template/dist/img/slider/slide-1.jpg","template/dist/img/slider/slide-2.jpg",
        // "template/dist/img/slider/slide-3.jpg","template/dist/img/slider/slide-4.jpg",
        // "template/dist/img/slider/slide-5.jpg","template/dist/img/slider/slide-6.jpg");

        $session = session();
        $id_kategori = $this->request->getPost('id_kategori');
        $id_paket = $this->request->getPost('id_paket');
        $id_tempat = $this->request->getPost('id_tempat');

        // print_r($_POST);
        // die;

        $users = $this->M_User->findUser($session->get("id_user"));

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

        $alamat = $alamatAsli .', '. $cariKota[0]['name'] .', '. $cariKecamatan[0]['name'] .', '. $cariProvinsi[0]['name'];
        
        $data = [
            'tittle'     => 'Detail',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            // 'splide'     => $splide,
            'users'       => $users,
            'alamat'       => $alamat,
            'id_kategori'   => $id_kategori,
            'paket'      => $this->M_Paket->findDataPaket($id_paket),
            'dataEvent'     => $this->M_Alternatif->cariId($id_tempat),
            'isi'        => 'Proses/v_prosesKedua'
        ];

        echo view('LayoutProses/v_wrapper', $data);
    }
}
