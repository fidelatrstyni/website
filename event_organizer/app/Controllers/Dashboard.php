<?php

namespace App\Controllers;

use App\Models\M_Kategori;
use App\Models\M_Keranjang;
use App\Models\M_Makanan;
use App\Models\M_User;
use App\Models\M_Transaksi;
use App\Models\M_Lokasi;
use App\Models\M_Paket;

class Dashboard extends BaseController
{
    public function __construct()
    {
        $this->M_User = new M_User();
        $this->M_Lokasi = new M_Lokasi();
        $this->M_Transaksi = new M_Transaksi();
        $this->M_Kategori = new M_Kategori();
        $this->M_Paket = new M_Paket();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle' => 'Dashboard',
           'currentAdminMenu' => 'dashboard',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'jmlUser' => $this->M_User->getAll(),
           'jmlLokasi' => $this->M_Lokasi->getAll(),
           'jmlKategori' => $this->M_Kategori->getAll(),
           'jmlPaket' => $this->M_Paket->getAll(),
           'trsProses' => $this->M_Transaksi->findTransaksiProses(),
           'trsSelesai' => $this->M_Transaksi->findTransaksiSelesai(),
           'userProfil' => $this->M_User->findUser($session->get("id_user")),
           'isi' => 'ViewDashboard/v_dashboard'
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

}