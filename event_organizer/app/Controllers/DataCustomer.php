<?php

namespace App\Controllers;

use App\Models\M_Keranjang;
use App\Models\M_Makanan;
use App\Models\M_User;

class DataCustomer extends BaseController
{
    public function __construct()
    {
        $this->data['currentAdminMenu'] = 'dashboard';
        $this->M_User = new M_User();
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle' => 'Data Customer',
           'currentAdminMenu' => 'dataCustomer',
           'session' => $session->get("username"),
           'session' => $session->get("id_user"),
           'customer' => $this->M_User->getAll(),
           'isi' => 'ViewDashboard/v_dataCustomer'
       ];
       echo view('Dashboard/v_wrapper', $data);
    }

}