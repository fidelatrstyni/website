<?php

namespace App\Controllers;

use App\Models\M_Keranjang;
use App\Models\M_Makanan;
use App\Models\M_Paket;
use App\Models\M_User;
use App\Models\M_Wilayah;

class DataUsers extends BaseController
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
        $data = [
            'tittle' => 'Data Pegawai',
            'currentAdminMenu' => 'dataUsers',
            'session' => $session->get("username"),
            'session' => $session->get("id_user"),
            'pegawai' => $this->M_User->getAll(),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'isi' => 'ViewDashboard/v_dataUsers'
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function formTambah()
    {
        $session = session();

        $data = [
            'tittle'            => 'Tambah Data Pegawai',
            'currentAdminMenu'  => 'dataUsers',
            'status'            => 'tambah',
            'session'           => $session->get("username"),
            'session'           => $session->get("id_user"),
            'namaUsers'         => $session->get("namaUsers"),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'provinsi'          => $this->M_Wilayah->provinsi(),
            'users' => null,
            'isi'               => 'ViewDashboard/v_formDataUsers',
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function save()
    {
        // echo '<pre>';
        // print_r($_POST);
        // die;

        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email|is_unique[tbl_users.email]',
            'password'      => 'required|min_length[5]|max_length[200]'
        ];

        if ($this->validate($rules)) {
            $alamat = $this->request->getPost('alamat') . '=' . $this->request->getPost('provinsi') . '=' .
                $this->request->getPost('kota') . '=' . $this->request->getPost('kecamatan') . '=' .
                $this->request->getPost('kelurahan');

            $model = new M_User();
            $data = array(
                'nama'    => $this->request->getPost('nama'),
                'username'    => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'tlp'    => $this->request->getPost('tlp'),
                'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'status'    => $this->request->getPost('status'),
                'alamat'    => $alamat,
                'roles'    => $this->request->getPost('roles'),
            );

            //$x = $this->input->post('status');
            //  var_dump($data);
            //  die;
            $success = $model->save($data);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataUsers');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Ditambah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataUsers');
            }
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }

    public function formEdit($id = null)
    {
        $session = session();

        $users = $this->M_User->findUser($id);
        $pecah = explode("=", $users[0]['alamat']);
        $alamat = [];
        for ($i = 0; $i < count($pecah); $i++) {
            // echo $pecah[$i] . "<br />";
            $alamat[$i] = $pecah[$i];
        }

        $alamatAsli = $alamat[0];
        $provinsi = $alamat[1];
        $kota = $alamat[2];
        $kecamatan = $alamat[3];
        $kelurahan = $alamat[4];


        // var_dump($alamat);
        // die;
        $data = [
            'tittle' => 'Edit Data Customer',
            'currentAdminMenu' => 'customer',
            'namaUsers' => $session->get("namaUsers"),
            'status' => '',
            'session' => $session->get("id_user"),
            'provinsi' => $this->M_Wilayah->provinsi(),
            'userProfil' => $this->M_User->findUser($session->get("id_user")),
            'provinsi1' => $this->M_Wilayah->provinsifind($provinsi),
            // 'alamat' => $this->M_Alamat->getAll($session->get("id_user")),
            'alamat1' => $alamatAsli,
            'kota' => $kota,
            'users' => $users,
            'isi' => 'ViewDashboard/v_formDataUsers'
        ];
        echo view('Dashboard/v_wrapper', $data);
    }

    public function hapus($id)
    {
        $model = new M_User();
        //$id = $this->request->getPost('id');
        $model->hapus($id);
        return redirect()->to('DataUsers');
        /*$success = $model->deleteProduct($id);
        if($success){
            session()->setFlashdata('message', 'Dihapus!');
            return redirect()->to('Customer');
        }*/
    }

    public function updateFotoProfil()
    {
        $model = new M_User();
        $id = $this->request->getPost('id_user');
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $randomName = $gambar->getRandomName();

            $gambar->move(ROOTPATH . 'public/upload/img_profil/', $randomName);

            $model = new M_User();
            $data = array(
                'img_profil'    => $randomName,
            );

            $success = $model->updateUser($data, $id);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Data Berhasil Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataUsers');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Data Gagal Diupdate!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataUsers');
            }
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Gambar Tidak Valid!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataUsers');
        }
    }

    public function update()
    {
        $model = new M_User();
        $id = $this->request->getPost('id_user');

        $alamat = $this->request->getPost('alamat') . '=' . $this->request->getPost('provinsi') . '=' .
            $this->request->getPost('kota') . '=' . $this->request->getPost('kecamatan') . '=' .
            $this->request->getPost('kelurahan');

        $model = new M_User();
        $data = array(
            'nama'    => $this->request->getPost('nama'),
            'username'    => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'tlp'    => $this->request->getPost('tlp'),
            'status'    => $this->request->getPost('status'),
            'alamat'    => $alamat,
            'roles'    =>  $this->request->getPost('roles'),
        );

        $success = $model->updateUser($data, $id);

        if ($success) {
            $notif = [
                'status' => 'success',
                'message' => 'Data Berhasil Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataUsers');
        } else {
            $notif = [
                'status' => 'error',
                'message' => 'Data Gagal Diupdate!'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->to('DataUsers');
        }
    }

    public function updatePassword()
    {
        $model = new M_User();
        $id = $this->request->getPost('id_user');
        $rules = [
            'password'      => 'required|min_length[5]|max_length[200]'
        ];

        if ($this->validate($rules)) {

            $model = new M_User();
            $data = array(
                'password'    => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            );

            //$x = $this->input->post('status');
            //  var_dump($data);
            //  die;
            $success = $model->updateUser($data, $id);
            if ($success) {
                $notif = [
                    'status' => 'success',
                    'message' => 'Password Berhasil Diubah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataUsers');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Password Gagal Diubah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('DataUsers');
            }
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
