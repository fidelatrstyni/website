<?php

use App\Models\M_Alternatif;

function set_session($name, $v) {
  $session = session();
  $session->set($name, $v);
}

function redirectTo() {
  //return redirect(base_url('ProsesAwal'),'refresh');
  //return $this->redirect(site_url('ProsesAwal'));
  //return redirect()->to('v_home');
  $M_Alternatif = new M_Alternatif();
  
  $session = session();
  $hasil = $session->get('result_ranking');
  $rekom = array_slice($hasil, 0, 1);
  $cariNama = $M_Alternatif->cariNama($rekom[0]);
  $tema = $cariNama[0]['tema'];
  //var_dump($tema);
  //die;
       $data = [
           'tittle'       => 'Langkah Awal Pemesanan',
           'alternatif2'  => $M_Alternatif->cariNama($rekom[0]),
           'alternatif'   => $M_Alternatif->findData($tema),
           'tema2'        => '',
           'isi'          => 'proses/v_prosesAwal'
       ];
       echo view('layout/v_wrapper', $data);
}

?>