<?php

namespace App\Controllers;
use App\Models\EventModel;

class Fullcalendar extends BaseController
{
    public function __construct()
  {
    $this->EventModel = new EventModel();
  }

  function index()
  {
    return view('fullcalendar');
  }

  function load()
  {
    $event_data = $this->EventModel->fetch_all_event();

    foreach($event_data as $key => $value) 
    {
    $data[] = array(
      'id' => $value['id'],
      'title' => $value['title'],
      'start' => $value['start_event'],
      'end' => $value['end_event'],
      'id_user' => $value['id_user']
    );
    }
    echo json_encode($data);
  }

  function insert()
  {
    //check apakah ada jam yg sama atau tidak
    // $hariAwal = $this->request->getPost('hariAwal');
    // $hariAkhir = $this->request->getPost('hariAkhir');
    
    // $cekHari = $this->EventModel->cekHari($hariAwal, $hariAkhir);
    
    //   if (empty($cekHari)) {
    //     echo json_encode(["message" => "Hari Sudah Ada Yang Booking !", "status"=> false]);
    //     die;
    //   }else {
    //     $data = array(
    //       'title'  => $this->request->getPost('title'),
    //       'id_user'  => $this->request->getPost('id_user'),
    //       'id_alternatif'  => $this->request->getPost('id_alternatif'),
    //       'start_event'=> $this->request->getPost('start'),
    //       'end_event' => $this->request->getPost('end')
    //     );
    //       $this->EventModel->insert_event($data);
    //   }
    // print_r($_FILES);
    
    // print_r($_POST);
    // die;
    $session = session();
    $cariTransaksi = $this->EventModel->cekHari($this->request->getPost('start'),$this->request->getPost('end'));
    
    $cariDataUserTrnsaksi =  $this->EventModel->cekDataUser($session->get("id_user"));
    
    // $gambar     = $_FILES['file']['name'];
    
    $input = $this->validate([
      'file' => [
          'uploaded[file]',
          'mime_in[file,image/jpg,image/jpeg,image/gif,image/png]',
          'max_size[file,1024]',
      ]
    ]);

    if($input){
      // echo 'berhasil';
      // die;
      if(empty($cariTransaksi)){

          if(empty($cariDataUserTrnsaksi)){
              $gambar = $this->request->getFile('file');

              if($gambar->isValid() && ! $gambar->hasMoved()){
                
                $randomName = $gambar->getRandomName();
                
                $gambar->move(ROOTPATH.'public/upload/pembayaran/',$randomName);
                
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $code = substr(str_shuffle($permitted_chars), 0, 10);
                
                if($this->request->getPost('title'))
                {
                    $data = array(
                      'id_user'  => $session->get("id_user"),
                      'id_tempat'  => $this->request->getPost('id_tempat'),
                      'id_kategori'  => $this->request->getPost('id_kategori'),
                      'id_paket'  => $this->request->getPost('id_paket'),
                      'title'  => $this->request->getPost('title'),
                      'start_event'=> $this->request->getPost('start'),
                      'end_event' => $this->request->getPost('end'),
                      'img_pembayaran' => $randomName,
                      'verifikasi' => 'diajukan',
                      'status' => 'proses',
                      'pembayaran' => $this->request->getPost('pembayaran'),
                      'uang_muka' => $this->request->getPost('uang_muka'),
                      'lunas' => $this->request->getPost('lunas'),
                      'kode_transaksi' => 'KE' . $code,
                );
                    $this->EventModel->insert_event($data);
                }

                echo json_encode(["message" => "Berhasil booking !", "status"=> true]);
              }else{
                echo json_encode(["message" => "Gambar Gagal Diupload !", "status"=> false]);
                die;
              }
          }else{
            echo json_encode(["message" => "Selesaikan Pesanan Terlebih Dahulu !", "status"=> false]);
            die;
          }
      }else {
        echo json_encode(["message" => "Hari Sudah Ada Yang Booking !", "status"=> false]);
        die;
      }
    }else {
     
      echo json_encode(["message" => "Gambar Tidak Valid !", "status"=> false]);
        die;
    }

  }

  function update()
  {
    if($this->request->getPost('id'))
    {
      $date = new \DateTime($this->request->getPost('start'));
      $now = new \DateTime();

      if($date < $now) {
          return false;
      }
      
    $data = array(
      'title'   => $this->request->getPost('title'),
      'start_event' => $this->request->getPost('start'),
      'end_event'  => $this->request->getPost('end')
    );

    $this->EventModel->update_event($data, $this->request->getPost('id'));
    }
  }

  function delete()
  {
    if($this->request->getPost('id'))
    {
    $this->EventModel->delete_event($this->request->getPost('id'));
    }
  }

}