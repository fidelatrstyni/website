<?php

namespace App\Controllers;

use App\Models\M_Kategori;
use App\Models\M_Keranjang;
use App\Models\M_Makanan;
use App\Models\M_User;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->M_Kategori = new M_Kategori();
        $this->M_User = new M_User();
        $this->data['currentAdminMenu'] = 'dashboard';
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle'             => 'Kategori',
           'currentAdminMenu'   => 'kategori',
           'session'            => $session->get("username"),
           'session'            => $session->get("id_user"),
           'userProfil' => $this->M_User->findUser($session->get("id_user")),
           'kategori'           => $this->M_Kategori->getAll(),
           'isi'                => 'ViewDashboard/v_kategori'
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

    public function formTambah(){

        $session = session();
        
        $data = [
            'tittle'            => 'Tambah Data Kategori',
            'currentAdminMenu'  => 'kategori',
            'status'            => 'tambah',
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formDataKategori',
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

            $gambar->move(ROOTPATH . 'public/upload/imgKategori/', $randomName);

            $model = new M_Kategori();
            $data = array(
                'nama_kategori'    => $this->request->getPost('nama_kategori'),
                'deskripsi'    => $this->request->getPost('deskripsi'),
                'gambar'    => $randomName,
            );

            $success = $model->simpan($data);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Kategori');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Kategori');
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Kategori');
        }
    }

    public function hapus($id)
    {
        $model = new M_Kategori();
        //$id = $this->request->getPost('id');
        $model->hapus($id);
        return redirect()->to('Kategori');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }

    public function edit($id)
    {

        $session = session();
        $model = new M_Kategori();
        
        $hasilCek = $model->findId($id);
        $data = [
            'tittle' => 'Edit Kategori',
            'currentAdminMenu' => 'kategori',
            'status'            =>  '',
            'kategori'          => $hasilCek,
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formDataKategori',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function updateGambarKategori()
    {
        $model = new M_Kategori();
        $id = $this->request->getPost('id_kategori');
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $randomName = $gambar->getRandomName();

            $gambar->move(ROOTPATH . 'public/upload/imgKategori/', $randomName);

            $model = new M_Kategori();
            $data = array(
                'gambar'    => $randomName,
            );

            $success = $model->updateKategori($data, $id);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Kategori');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Kategori');
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Kategori');
        }
    }

    public function updateKategori()
    {
        $model = new M_Kategori();
        $id = $this->request->getPost('id_kategori');
        $data = array(
            'nama_kategori'   => $this->request->getPost('nama_kategori'),
            'deskripsi'    => $this->request->getPost('deskripsi'),
        );

        $success = $model->updateKategori($data, $id);

        if ($success) {
            $notif = [
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Kategori');
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Data Gagal Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Kategori');
        }
    }

}