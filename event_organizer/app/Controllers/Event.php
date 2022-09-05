<?php

namespace App\Controllers;

use App\Models\M_Kategori;

class Event extends BaseController
{
    public function __construct()
    {
        $this->M_Kategori = new M_Kategori();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle'     => 'Event',
           'session'    => $session->get("username"),
           'session'    => $session->get("id_user"),
           'kategori'   => $this->M_Kategori->getAll(),
           'isi'        => 'v_event'
       ];
       echo view('Layout/v_wrapper', $data);
    }
}
