<?php

namespace App\Controllers;

class Gallery extends BaseController
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
           'tittle' => 'Event',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'isi' => 'v_gallery'
       ];
       echo view('Layout/v_wrapper', $data);
    }
}
