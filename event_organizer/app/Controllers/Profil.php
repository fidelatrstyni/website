<?php

namespace App\Controllers;

use App\Models\M_User;

class Profil extends BaseController
{
    public function __construct()
    {
        $this->M_User = new M_User();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
    $users = $this->M_User->findUser($session->get("id_user"));
       $data = [
           'tittle' => 'My Profil',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'currentAdminMenu' => 'profil',
           'users' => $users,
           'isi' => 'Profil/v_profil'
       ];
       echo view('Profil/v_wrapper', $data);
    }

    public function updateFotoProfil() {
        $session = session();
        $gambar     = $this->request->getFile('profil');
        $randomName = $gambar->getRandomName();

        if($gambar != ''){

            if($gambar->isValid() && ! $gambar->hasMoved()){
            
                $gambar->move(ROOTPATH.'public/upload/img_profil/',$randomName);
                    
                $model = new M_User();
                    
                $data = [
                        'img_profil' => $randomName,
                ];
                
                $model->updateUser($data, $session->get("id_user"));
                $notif = [
                    'status' => 'success',
                    'message' => 'Foto Profil Berhasil Di Uploud!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->back();

                }else{
                        $notif = [
                            'status' => 'error',
                            'message' => 'Foto Profil Gagal Di Upload!'
                        ];
                        session()->setFlashdata('notif', $notif);
                        return redirect()->back();
                }
        }else {
            // echo 'gagal';
            // die;
            $notif = [
                'status' => 'error',
                'message' => 'Anda belum mengupload profil !'
            ];
            session()->setFlashdata('notif', $notif);
            return redirect()->back();
        }
    }

    public function update() {
        $session = session();
        
        $model = new M_User();

        $data = [
            'nama'     => $this->request->getVar('nama'),
            // 'username'    => $this->request->getVar('username'),
            'email'    => $this->request->getVar('email'),
            'tlp'    => $this->request->getVar('tlp'),
        ];

        $model->updateUser($data, $session->get("id_user"));
        $notif = [
            'status' => 'success',
            'message' => 'Data Berhasil Diubah !'
        ];
        session()->setFlashdata('notif', $notif);
        return redirect()->back();

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
                return redirect()->to('Profil');
            } else {
                $notif = [
                    'status' => 'error',
                    'message' => 'Password Gagal Diubah!'
                ];
                session()->setFlashdata('notif', $notif);
                return redirect()->to('Profil');
            }
        } else {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
    }
}
