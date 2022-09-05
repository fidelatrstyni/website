<?php

namespace App\Controllers;

use App\Models\M_Keranjang;
use App\Models\M_Lokasi;
use App\Models\M_Makanan;
use App\Models\M_User;

class DataLokasi extends BaseController
{
    public function __construct()
    {
        $this->data['currentAdminMenu'] = 'dashboard';
        $this->M_Lokasi = new M_Lokasi();
        $this->M_User = new M_User();
        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();
        $data = [
            'tittle' => 'Data Lokasi',
            'currentAdminMenu' => 'dataLokasi',
            'session' => $session->get("username"),
            'session' => $session->get("id_user"),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'lokasi' => $this->M_Lokasi->getAll(),
            'isi' => 'ViewDashboard/v_dataLokasi'
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function formTambah()
    {

        $session = session();

        $data = [
            'tittle' => 'Data Lokasi',
            'currentAdminMenu' => 'dataLokasi',
            'status'            => 'tambah',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formDataLokasi',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function save()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $randomName = $gambar->getRandomName();

            $gambar->move(ROOTPATH . 'public/upload/imgLokasi/', $randomName);

            $model = new M_Lokasi();
            $data = array(
                'nama'    => $this->request->getPost('nama'),
                'kota'    => $this->request->getPost('kota'),
                'harga'    => $this->request->getPost('harga'),
                'gambar'    => $randomName,
                'map'    => $this->request->getPost('map'),
                'kapasitas'    => $this->request->getPost('kapasitas'),
                'jaringan'    => $this->request->getPost('jaringan'),
            );

            $success = $model->simpan($data);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataLokasi');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataLokasi');
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataLokasi');
        }
    }

    public function edit($id)
    {

        $session = session();
        $model = new M_Lokasi();
        
        $hasilCek = $model->findId($id);
        $data = [
            'tittle' => 'Edit Lokasi',
            'currentAdminMenu' => 'dataLokasi',
            'status'            =>  '',
            'tempat'          => $hasilCek,
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formDataLokasi',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function updateGambarLokasi()
    {
        $model = new M_Lokasi();
        $id = $this->request->getPost('id_tempat');
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $randomName = $gambar->getRandomName();

            $gambar->move(ROOTPATH . 'public/upload/imgLokasi/', $randomName);

            $model = new M_Lokasi();
            $data = array(
                'gambar'    => $randomName,
            );

            $success = $model->updateLokasi($data, $id);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataLokasi');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataLokasi');
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataLokasi');
        }
    }

    public function hapus($id)
    {
        $model = new M_Lokasi();
        //$id = $this->request->getPost('id');
        $model->hapus($id);
        return redirect()->to('DataLokasi');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }

    public function updateLokasi()
    {
        $model = new M_Lokasi();
        $id = $this->request->getPost('id_tempat');
        $data = array(
            'nama'    => $this->request->getPost('nama'),
            'kota'    => $this->request->getPost('kota'),
            'harga'   => $this->request->getPost('harga'),
            'map'    => $this->request->getPost('map'),
            'kapasitas'    => $this->request->getPost('kapasitas'),
            'jaringan'    => $this->request->getPost('jaringan'),
        );

        $success = $model->updateLokasi($data, $id);

        if ($success) {
            $notif = [
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataLokasi');
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Data Gagal Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataLokasi');
        }
    }
}
