<?php

namespace App\Controllers;

use App\Models\M_Transaksi;
use App\Models\M_User;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->M_Transaksi = new M_Transaksi();
        $this->M_User = new M_User();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
    $model = new M_Transaksi();
    $hasilCek = $model->findTransaksiSelesai();
       $data = [
           'tittle' => 'Laporan',
           'currentAdminMenu' => 'laporan',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'userProfil' => $this->M_User->findUser($session->get("id_user")),
           'laporan' => $hasilCek,
           'isi' => 'ViewDashboard/v_dataLaporan'
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function cari()
     {
     $dari = $this->request->getPost('dari');
     $sampai = $this->request->getPost('sampai');

         $session = session();
         $data = [
             'tittle' => 'Laporan',
             'currentAdminMenu' => 'laporan',
             'session' => $session->get("username"),
             'session' => $session->get("id_user"),
             'userProfil' => $this->M_User->findUser($session->get("id_user")),
             'laporan' => $this->M_Transaksi->cariTransaksi($dari, $sampai),
             'isi' => 'ViewDashboard/v_dataLaporan'
         ];
         echo view('Dashboard/v_wrapper', $data);
      }

}