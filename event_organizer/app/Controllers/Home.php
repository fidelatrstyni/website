<?php

namespace App\Controllers;

use App\Models\M_User;

class Home extends BaseController
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

        if ($session->get("logged_in") == false) {
            $data = [
                'tittle' => 'Home',
                'session' => $session->get("username"),
                'session' => $session->get("id_user"),
                'status' => false,
                'alamat' => '',
                'isi' => 'v_home'
            ];
            echo view('Layout/v_wrapper', $data);
        } else {
            $data = [
                'tittle' => 'Home',
                'session' => $session->get("username"),
                'session' => $session->get("id_user"),
                'status' => true,
                'alamat' => $session->get("alamat"),
                'isi' => 'v_home'
            ];
            echo view('Layout/v_wrapper', $data);
        }
    }
}
