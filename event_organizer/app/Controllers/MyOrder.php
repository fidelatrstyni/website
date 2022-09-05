<?php

namespace App\Controllers;

use App\Models\M_Transaksi;
use App\Models\M_User;
use App\Models\M_Wilayah;
use App\Models\EventModel;

class MyOrder extends BaseController
{
    public function __construct()
    {
        $this->M_User = new M_User();
        $this->M_Wilayah = new M_Wilayah();
        $this->M_Transaksi = new M_Transaksi();
        $this->EventModel = new EventModel();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
    $users = $this->M_User->findUser($session->get("id_user"));

       $data = [
           'tittle' => 'Proses',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'order',
           'users' => $users,
           'proses' => $this->M_Transaksi->findTransaksi($session->get("id_user"), 'Proses'),
           'isi' => 'Profil/v_order'
       ];
       echo view('Profil/v_wrapper', $data);
    }

    public function selesai()
    {
    $session = session();
    $users = $this->M_User->findUser($session->get("id_user"));

       $data = [
           'tittle' => 'Selesai',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'order',
           'users' => $users,
           'proses' => $this->M_Transaksi->findTransaksi($session->get("id_user"), 'Selesai'),
           'isi' => 'Profil/v_order'
       ];
       echo view('Profil/v_wrapper', $data);
    }

    public function dibatalkan()
    {
    $session = session();
    $users = $this->M_User->findUser($session->get("id_user"));

       $data = [
           'tittle' => 'Dibatalkan',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'order',
           'users' => $users,
           'proses' => $this->M_Transaksi->findTransaksi($session->get("id_user"), 'Dibatalkan'),
           'isi' => 'Profil/v_order'
       ];
       echo view('Profil/v_wrapper', $data);
    }

    public function batalkan() {
        $session = session();

        $id = $this->request->getPost('id');
        
        $model = new M_Transaksi();

        $data = [
            'status'     => 'Dibatalkan',
        ];

        $model->updateTransaksi($data, $id);
        $notif = [
            'status' => 'success',
            'message' => 'Transaksi Dibatalkan!'
        ];
        session()->setFlashdata('notif', $notif);
        return redirect()->to('/MyOrder/dibatalkan');

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
        session()->setFlashdata('notif', $notif);
        return redirect()->back();

    }

    public function pelunasan()
    {
        
        $id = $this->request->getPost('id');
        $gambar = $this->request->getFile('img_pelunasan');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $randomName = $gambar->getRandomName();

            $gambar->move(ROOTPATH.'public/upload/pembayaran/',$randomName);

            $data = array(
                'pembayaran'        => 'lunas',
                'img_pelunasan'     => $randomName,
            );

            $success = $this->EventModel->update_event($data, $id);;
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Berhasil Mengupload Gambar!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->back();
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Mengupload Gambar!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->back();
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->back();
        }
    }

    public function pengembalian()
    {
        
        $id = $this->request->getPost('id');
        $gambar = $this->request->getFile('img_pengembalian');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $randomName = $gambar->getRandomName();

            $gambar->move(ROOTPATH.'public/upload/pembayaran/',$randomName);

            $data = array(
                'img_pengembalian'     => $randomName,
            );

            $success = $this->EventModel->update_event($data, $id);;
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Berhasil Mengupload Gambar!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->back();
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Mengupload Gambar!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->back();
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->back();
        }
    }
}
