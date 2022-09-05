<?php

namespace App\Controllers;

class About extends BaseController
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
           'tittle' => 'About Us',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'isi' => 'v_about'
       ];
       echo view('Layout/v_wrapper', $data);
    }
}
