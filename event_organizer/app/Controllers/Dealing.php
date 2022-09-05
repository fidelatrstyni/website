<?php

namespace App\Controllers;

use App\Models\M_User;

class Dealing extends BaseController
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
           'tittle' => 'Konfirmasi Booking',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'user' => $users,
           'isi' => 'proses/v_dealing'
       ];
       echo view('layout/v_wrapper', $data);
    }
}
