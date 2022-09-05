<?php

namespace App\Controllers;

use App\Models\M_Alamat;
use App\Models\M_Keranjang;
use App\Models\M_Makanan;

class DashboardCustomer extends BaseController
{
    public function __construct()
    {
        //$this->M_Makanan = new M_Makanan();
        //$this->M_Keranjang = new M_Keranjang();
        //$this->M_Alamat = new M_Alamat();
        //$this->data['currentAdminMenu'] = 'dashboard';
        helper('number');
        helper('form');
    }

    public function index()
    {
    $session = session();
       $data = [
           'tittle' => 'Dashboard',
           'currentAdminMenu' => 'dashboard',
           'namaUsers' => 'hahok',
        //    'session' => $session->get("id_user"),
           //'keranjang' => $this->M_Keranjang->getKeranjang($session->get("id_user")),
           //'alamat' => $this->M_Alamat->getAll($session->get("id_user")),
           'isi' => 'ViewDashboardCustomer/v_dashboard'
       ];
       echo view('DashboardCustomer/v_wrapper', $data);
    }

    // public function form($status)
    // {

    // $session = session();

    // if(isset($status) == 'tambahAlamat'){

    //     $data = [
    //         'tittle' => 'Dashboard',
    //         'tittleForm' => 'Form Alamat',
    //         'currentAdminMenu' => 'dashboard',
    //         'namaUsers' => $session->get("namaUsers"),
    //         'session' => $session->get("id_user"),
    //         'keranjang' => $this->M_Keranjang->getKeranjang($session->get("id_user")),
    //         'alamat' => $this->M_Alamat->getAll($session->get("id_user")),
    //         'isi' => 'ViewDashboardCustomer/v_form'
    //     ];
    //     echo view('dashboardCustomer/v_wrapper', $data);
    // }
    
    // }

    // public function saveAlamat($status)
    // {
    //     $session = session();
    //     $model = new M_Alamat();
    //     // $cariStatus = $model->findStatusOn($session->get("id_user"));
    //     // echo '<prev>';
    //     // var_dump($cariStatus[0]['id_data']);
    //     // die;
    //     $alamatUtama = $this->request->getPost('status');

    //     if (isset($status) == 'saveAlamat' && $alamatUtama = null){
            
    //         $data = array(
    //             'id_user'           => $session->get("id_user"),
    //             'nama_penerima'     => $this->request->getPost('nama_penerima'),
    //             'alamat'            => $this->request->getPost('alamat'),
    //             'kota'              => $this->request->getPost('kota'),
    //             'kode_pos'          => $this->request->getPost('kodePos'),
    //             'no_tlp'            => $this->request->getPost('tlp'),
    //             'status'            => 'tidak aktif',
    //         );
    //         $success = $model->saveAlamat($data);
    //         if($success){
    //             $notif = [
    //                 'status' => 'success',
    //                 'message' => 'Alamat Berhasil Ditambah!'
    //             ];
    //             session()->setFlashdata('notif', $notif);
    //             return redirect()->to('DashboardCustomer');
    //         }else{
    //             $notif = [
    //                 'status' => 'error',
    //                 'message' => 'Alamat Gagal Ditambah!'
    //             ];
    //             session()->setFlashdata('notif', $notif);
    //             return redirect()->to('DashboardCustomer');
    //         }
    //     }else {
    //         $cariStatus = $model->findStatusOn($session->get("id_user"));
    //         if (isset($cariStatus[0]['status']) == 'aktif'){
    //             $data = array(
    //                 'id_user'           => $cariStatus[0]['id_user'],
    //                 'nama_penerima'     => $cariStatus[0]['nama_penerima'],
    //                 'alamat'            => $cariStatus[0]['alamat'],
    //                 'kota'              => $cariStatus[0]['kota'],
    //                 'kode_pos'          => $cariStatus[0]['kode_pos'],
    //                 'no_tlp'            => $cariStatus[0]['no_tlp'],
    //                 'status'            => 'tidak aktif',
    //             );

    //             $success = $model->updateAlamat($data, $cariStatus[0]['id_data']);
                
    //             if($success){
    //                 $data = array(
    //                     'id_user'           => $session->get("id_user"),
    //                     'nama_penerima'     => $this->request->getPost('nama_penerima'),
    //                     'alamat'            => $this->request->getPost('alamat'),
    //                     'kota'              => $this->request->getPost('kota'),
    //                     'kode_pos'          => $this->request->getPost('kodePos'),
    //                     'no_tlp'            => $this->request->getPost('tlp'),
    //                     'status'            => 'aktif',
    //                 );
    //                 $success2 = $model->saveAlamat($data);
    //                 if($success2){
    //                     $notif = [
    //                         'status' => 'success',
    //                         'message' => 'Alamat Berhasil Ditambah!'
    //                     ];
    //                     session()->setFlashdata('notif', $notif);
    //                     return redirect()->to('DashboardCustomer');
    //                 }else{
    //                     $notif = [
    //                         'status' => 'error',
    //                         'message' => 'Alamat Gagal Ditambah!'
    //                     ];
    //                     session()->setFlashdata('notif', $notif);
    //                     return redirect()->to('DashboardCustomer');
    //                 }
    //             }
    //         }
    //     }
    // }

    // public function delete($id = null, $status = null)
    // {
    //     $model = new M_Alamat();
    //     // var_dump($id);
    //     // var_dump($status);
    //     // die;
    //     //$id = $this->request->getPost('id');
    //     if(!empty($id) && $status == 'hapusAlamat'){
    //         $model->deleteAlamat($id);
    //         return redirect()->to('DashboardCustomer');
    //     }
    
    // }

}