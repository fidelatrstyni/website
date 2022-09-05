<?php

namespace App\Controllers;

class Contact extends BaseController
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
           'tittle' => 'Contact',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'isi' => 'v_contact'
       ];
       echo view('Layout/v_wrapper', $data);
    }
}
