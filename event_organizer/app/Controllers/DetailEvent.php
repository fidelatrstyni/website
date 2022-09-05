<?php

namespace App\Controllers;

use App\Models\M_Kategori;
use App\Models\M_Paket;

class DetailEvent extends BaseController
{
    public function __construct()
    {
        $this->M_Kategori = new M_Kategori();
        $this->M_Paket = new M_Paket();
        $this->session = \Config\Services::session();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle'     => 'Detail',
           'session'    => $session->get("username"),
           'session'    => $session->get("id_user"),
           //'kategori'   => $this->M_Kategori->getAll(),
           'isi'        => 'v_detailEvent'
       ];
       echo view('Layout/v_wrapper', $data);
    }

    public function detailEvent($id){
        $session = session();

        $splide = array("template/dist/img/slider/slide-1.jpg","template/dist/img/slider/slide-2.jpg",
        "template/dist/img/slider/slide-3.jpg","template/dist/img/slider/slide-4.jpg",
        "template/dist/img/slider/slide-5.jpg","template/dist/img/slider/slide-6.jpg");

        // $_SESSION['id_kategori'] = $id;
        
        $data = [
            'tittle'     => 'Detail',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            'splide'     => $splide,
            'id_kategori' => $id,
            'paket'      => $this->M_Paket->findAllPaket($id),
            'dataEvent'  => $this->M_Kategori->findData($id),
            'isi'        => 'v_detailEvent'
        ];
        $this->session->set('id_kategori', $id);
        echo view('Layout/v_wrapper', $data);
    }
}
