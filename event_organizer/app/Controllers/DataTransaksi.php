<?php

namespace App\Controllers;

use App\Models\M_Keranjang;
use App\Models\M_Transaksi;
use App\Models\M_Makanan;
use App\Models\M_User;

class DataTransaksi extends BaseController
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

       $data = [
           'tittle' => 'Proses',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'transaksi',
           'userProfil' => $this->M_User->findUser($session->get("id_user")),
           'proses' => $this->M_Transaksi->findTransaksiProses(),
           'isi' => 'ViewDashboard/v_transaksi'
       ];
       echo view('Dashboard/v_wrapper', $data);
    
    }

    public function selesai()
    {
    $session = session();

       $data = [
           'tittle' => 'Selesai',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'transaksi',
           'userProfil' => $this->M_User->findUser($session->get("id_user")),
           'proses' => $this->M_Transaksi->findTransaksiSelesai(),
           'isi' => 'ViewDashboard/v_transaksi'
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function dibatalkan()
    {
    $session = session();

       $data = [
           'tittle' => 'Dibatalkan',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'transaksi',
           'userProfil' => $this->M_User->findUser($session->get("id_user")),
           'proses' => $this->M_Transaksi->findTransaksiBatal(),
           'isi' => 'ViewDashboard/v_transaksi'
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function edit($id)
    {

        $session = session();
        $model = new M_Transaksi();
        
        $hasilCek = $model->cari($id);
        $data = [
            'tittle'            => 'Edit Transaksi',
            'currentAdminMenu' => 'transaksi',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'hasil'             => $hasilCek,
            'isi'               => 'ViewDashboard/v_formTransaksi',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function update()
    {
        $model = new M_Transaksi();
        $id = $this->request->getPost('id');
        $data = array(
            'verifikasi'   => $this->request->getPost('verifikasi'),
            'status'    => $this->request->getPost('status'),
        );

        $success = $model->updateTransaksi($data, $id);

        if ($success) {
            $notif = [
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataTransaksi');
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Data Gagal Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataTransaksi');
        }
    }

    public function hapus($id)
    {
        $model = new M_Transaksi();
        //$id = $this->request->getPost('id');
        $model->hapus($id);
        return redirect()->to('DataTransaksi');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }

}
