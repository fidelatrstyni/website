<?php

namespace App\Controllers;

use App\Models\M_User;

class Login extends BaseController
{
    public function __construct()
    {
        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();
        $data = [
            'tittle' => 'Login | Khalila Enterprise',
            'session' => $session->get("username"),
            'session' => $session->get("id_user"),
            'isi' => 'Auth/v_login'
        ];
        echo view('Auth/v_wrapperauth', $data);
    }

    public function auth()
    {
        $session = session();
        $model = new M_User();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            if ($data['status'] == 'aktif') {
                $pass = $data['password'];
                $verify_pass = password_verify($password, $pass);
                if ($verify_pass) {
                    $ses_data = [
                        'id_user'       => $data['id_user'],
                        'username'      => $data['username'],
                        'namaUsers'     => $data['nama'],
                        'email'         => $data['email'],
                        'roles'          => $data['roles'],
                        'alamat'          => $data['alamat'],
                        'logged_in'     => TRUE
                    ];
                    if ($data['roles'] == 1) {
                        $session->set($ses_data);
                        return redirect()->to('Dashboard');
                    } else if ($data['roles'] == 2) {
                        $session->set($ses_data);
                        return redirect()->to('Dashboard');
                    } else {
                        $session->set($ses_data);
                        return redirect()->to('Home');
                    }
                } else {
                    session()->setFlashdata('error', 'Password Salah !');
                    return redirect()->to('Login');
                }
            } else {
                session()->setFlashdata('error', 'Cek Email Untuk Verifikasi Akun !');
                return redirect()->to('Login');
            }
        } else {
            session()->setFlashdata('error', 'Email Belum Terdaftar !');
            return redirect()->to('Login');
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Home');
    }
}
