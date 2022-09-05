<?php

namespace App\Controllers;

use App\Models\M_Kategori;
use App\Models\M_Paket;
use App\Models\M_User;

class Paket extends BaseController
{
    public function __construct()
    {
        $this->M_Paket = new M_Paket();
        $this->M_Kategori = new M_Kategori();
        $this->M_User = new M_User();
        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();
        $data = [
            'tittle'             => 'Paket',
            'currentAdminMenu'   => 'paket',
            'session'            => $session->get("username"),
            'session'            => $session->get("id_user"),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'paket'              => $this->M_Paket->allData(),
            'isi'                => 'ViewDashboard/v_paket'
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function formTambah()
    {

        $session = session();

        $data = [
            'tittle'            => 'Tambah Data Paket',
            'currentAdminMenu'  => 'paket',
            'status'            => 'tambah',
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'kategori'           => $this->M_Kategori->getAll(),
            'isi'               => 'ViewDashboard/v_formDataPaket',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function save()
    {

        $model = new M_Paket();
        $data = array(
            'id_paket'    => $this->request->getPost('id_paket'),
            'nama_paket'    => $this->request->getPost('nama_paket'),
            'harga_paket'    => $this->request->getPost('harga_paket'),
            'id_kategori'    => $this->request->getPost('id_kategori'),
            'kapasitas'    => $this->request->getPost('kapasitas'),
            'invitation'    => $this->request->getPost('invitation'),
            'foto'    => $this->request->getPost('foto'),
        );

        $success = $model->simpan($data);
        if ($success) {
            $notif = [
                'status' => 'success',
                'message' => 'Data Berhasil Ditambah!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Paket');
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Data Gagal Ditambah!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Paket');
        }
    }

    public function hapus($id)
    {
        $model = new M_Paket();
        //$id = $this->request->getPost('id');
        $model->hapus($id);
        return redirect()->to('Paket');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }

    public function edit($id)
    {

        $session = session();
        $model = new M_Paket();

        $hasilCek = $model->findPaket($id);
        $data = [
            'tittle' => 'Edit Paket',
            'currentAdminMenu' => 'paket',
            'status'            =>  '',
            'paket'          => $hasilCek,
            'kategori'           => $this->M_Kategori->getAll(),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'isi'               => 'ViewDashboard/v_formDataPaket',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function updatePaket()
    {
        $model = new M_Paket();
        $id = $this->request->getPost('id_paket');
        $data = array(
            'id_paket'   => $this->request->getPost('id_paket'),
            'nama_paket'    => $this->request->getPost('nama_paket'),
            'harga_paket'    => $this->request->getPost('harga_paket'),
            'kapasitas'    => $this->request->getPost('kapasitas'),
            'kapasitas'    => $this->request->getPost('kapasitas'),
            'invitation'    => $this->request->getPost('invitation'),
            'foto'    => $this->request->getPost('foto'),
        );

        $success = $model->updatePaket($data, $id);

        if ($success) {
            $notif = [
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Paket');
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Data Gagal Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('Paket');
        }
    }
}
