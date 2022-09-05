<?php

namespace App\Controllers;

use App\Models\M_Alternatif;
use App\Models\M_Electre;

class Lokasi extends BaseController
{

    protected $session;

    public function __construct()
    {
        $this->M_Alternatif = new M_Alternatif();
        $this->M_Electre = new M_Electre();
        $this->session = \Config\Services::session();

        helper('number');
        helper('form');
    }

    public function index()
    {
        $session = session();

        $n = 0;
        $kriteria = $this->M_Electre->tbl_kriteria();
        $tempat = $this->M_Electre->tbl_tempat();

        foreach ($tempat as $key => $tmp) {
            foreach ($kriteria as $key => $ktr) {
                $dataCel[$n] = $this->M_Electre->tbl_alternatif($tmp['id_tempat'], $ktr['id_kriteria']);
                $parentArray1 = array_values($dataCel);
                $n++;
            }
        }
        foreach ($parentArray1 as $childArray) {
            foreach ($childArray as $value) {
                $singleArray1[] = $value;
            }
        }
        foreach ($singleArray1 as $key => $value) {
            $stringArrayKriteria[] = $value['skor'];
        }

        foreach ($tempat as $key => $value) {
            $stringArrayTempat[] = $value['nama'];
        }

        $jumlahAlternatif = count($stringArrayTempat);

        $session->set('n', $stringArrayTempat);

        $baris = strval($jumlahAlternatif);

        $kolom = count($kriteria);

        $b = 1;
        $k = 1;
        for ($i = 0; $i <= count($kriteria) - 1;) {
            $nama = $b . $k;
            $w[$nama] = $kriteria[$i]['bobot'];
            $i++;
            $k++;
        }


        $cel = $stringArrayKriteria;

        $normal = $cel;
        $options = strval(1);


        $chunk = array_chunk($cel, 5);

        $newArr = [];
        $n = 1;
        foreach ($chunk as $key => $v) {
            $x = $key + 1;
            foreach ($v as $i => $vv) {
                $c = $i + 1;
                $newArr["$n$c"] = $vv;

                $x = 1;
            }
            $n++;
        }
        $cel = $newArr;
        $normal = $cel;


        $baris = $baris;
        $kolom = $kolom;
        $w     = $w;
        $cel       = $cel;
        $normal    = $normal;
        $options   = $options;
        $session   = $session;

        $hasil = 0;
        $jumCon = 0;
        $jumDis = [];
        $totCon = 0;
        $totDes = 0;
        $rata2 = 0;
        $ranking = [];

        for ($i = 1; $i <= $baris + 1; $i++) :
            for ($k = 0; $k <= 5; $k++) :
                if ($i == $baris + 1 && $k == 0) :
                elseif ($k == 0) :
                    $session->get('n')[$i - 1];
                elseif ($i == $baris + 1) :
                    $w["1$k"];
                else :
                    $cel["$i$k"];
                endif;
            endfor;
        endfor;

        // NORMALISASI

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                for ($x = 1; $x <= $baris; $x++) {
                    $hasil = $hasil + pow($normal["$x$k"], 2);
                }
                $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                $hasil = 0;
                number_format($normalisasi["$i$k"], 2);
            endfor;
        endfor;

        // PEMBOBOTAN
        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                number_format($bobot["$i$k"], 2);
            endfor;
        endfor;


        // Himp. Con dan Dis
        // Concordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                        $jumCon = $jumCon + $w["1$cek"];
                    }
                }
                $concordance["$i$k"] = $jumCon;
                $jumCon = 0;

                if ($k == $i) :

                else :
                    number_format($concordance["$i$k"], 2);
                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                        $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    } else {
                        $jumDis["$i$cek"] = 0;
                    }
                    //Pembagi Discordance
                    $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                }
                $atasDes = max($jumDis);
                $bawahDes = max($totDis);
                $jumDis = [];
                $totDis = [];

                if ($bawahDes != 0) {
                    $descordance["$i$k"] = $atasDes / $bawahDes;
                } else {
                    $descordance["$i$k"] = 0;
                }

                if ($k == $i) :

                else :

                    number_format($descordance["$i$k"], 2);

                endif;
            endfor;
        endfor;

        // NILAI DOMINAN Concordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totCon = $totCon + $concordance["$i$k"];
                }
            }
        }

        $c = $totCon / ($baris * ($baris - 1));

        // echo "Nilai Threshold (C) = " . number_format($c,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($concordance["$i$cek"] >= $c) {
                        $f["$i$cek"] = 1;
                    } else {
                        $f["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $f["$i$k"];
                    $corco[$i][$k] = $f["$i$k"];

                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totDes = $totDes + $descordance["$i$k"];
                }
            }
        }

        $d = $totDes / ($baris * ($baris - 1));

        // echo "Nilai Threshold (D) = " . number_format($d,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($descordance["$i$cek"] >= $d) {
                        $g["$i$cek"] = 1;
                    } else {
                        $g["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $g["$i$k"];
                    $disco[$i][$k] = $g["$i$k"];

                endif;
            endfor;
        endfor;

        // Aggregate Dominance Matrix

        // Threshold

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];

                if ($i == $k) :

                else :
                    $e["$i$k"];
                endif;
            endfor;
        endfor;

        // Tanpa Threshold

        $baris;

        // Rata2

        $arrRank = [];
        for ($i = 1; $i <= $baris; $i++) :
            $counter = 0;
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];
                if ($i == $k) :

                else :
                    $resCol = $corco[$i][$k] * $disco[$i][$k];

                    if ($resCol == 1) {
                        $counter++;
                    }

                endif;
            endfor;

            $counter;

            $arrRank[] = [
                'row' => $i,
                'freq' => $counter
            ];
        endfor;


        // for($i=1;$i<=$baris;$i++): 
        //     for($k=1;$k<=$baris+1;$k++): 
        // 		if($k <= $baris)
        // 			$e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
        //                 if($i == $k): 

        //                 elseif($k == $baris+1):

        //                     for($r=1;$r<=$baris;$r++): 
        //                         $rata2 = $rata2 + $e1["$i$r"];
        //                     endfor; 
        //                         $rata[$i-1] = $rata2/$baris;
        //                         $rata2 = 0;

        //                         number_format($rata[$i-1],2);

        //                          else: 
        //                          number_format($e1["$i$k"],2);
        //                          endif; 
        //     endfor; 
        // endfor;

        // INI UNTUK RANKING

        usort($arrRank, function ($a, $b) {
            return $a['freq'] < $b['freq'];
        });
        foreach (range(1, count($arrRank)) as $key => $value) :
            $value;
            $sessionVals[] = $session->get('n')[$arrRank[$key]['row'] - 1];
            $arrRank[$key]['freq'];

        endforeach;

        $hasilRekom = array() ;
        $rekom = array_slice($sessionVals, 0, 3);
        foreach($rekom as $key => $value){
            $hasilRekom[] = $this->M_Alternatif->cariNama($value);
        }

        $hasilArray = array();
        for($i=0; $i < count($hasilRekom);){
            $hasilArray[$i] = $hasilRekom[$i][0];
            $i++;
        }
        
        // echo '<pre>';
        // var_dump($hasilArray[0]);
        // die;
        $id_kategori = $this->request->getPost('id_kategori');
        $id_paket = $this->request->getPost('id_paket');
        $kapasitas = $this->request->getPost('kapasitas');

        $data = [
            'tittle'     => 'Langkah Awal Pemesanan',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            'id_kategori' => $id_kategori,
            'id_paket' => $id_paket,
            'alternatif' => $this->M_Alternatif->getAll(),
            'alternatif2' => $hasilArray,
            'session'      => $session->set('tema2', ''),
            'isi'        => 'Proses/v_prosesAwal',
            'lokasi'     => ''
        ];
        echo view('Layout/v_wrapper', $data);
    }

    public function cariLokasi()
    {
        $lokasi = $this->request->getPost('lokasi');
        $tempat = $this->M_Alternatif->cariLokasiAll($lokasi);

        $session = session();

        $n = 0;
        $kriteria = $this->M_Electre->tbl_kriteria();
        
        foreach ($tempat as $key => $tmp) {
            foreach ($kriteria as $key => $ktr) {
                $dataCel[$n] = $this->M_Electre->tbl_alternatif($tmp['id_tempat'], $ktr['id_kriteria']);
                $parentArray1 = array_values($dataCel);
                $n++;
            }
        }
        // echo '<pre>';
        // var_dump($parentArray1);
        // die;
        foreach ($parentArray1 as $childArray) {
            foreach ($childArray as $value) {
                $singleArray1[] = $value;
            }
        }
        foreach ($singleArray1 as $key => $value) {
            $stringArrayKriteria[] = $value['skor'];
        }

        foreach ($tempat as $key => $value) {
            $stringArrayTempat[] = $value['nama'];
        }

        $jumlahAlternatif = count($stringArrayTempat);

        $session->set('n', $stringArrayTempat);

        $baris = strval($jumlahAlternatif);

        $kolom = count($kriteria);

        $b = 1;
        $k = 1;
        for ($i = 0; $i <= count($kriteria) - 1;) {
            $nama = $b . $k;
            $w[$nama] = $kriteria[$i]['bobot'];
            $i++;
            $k++;
        }


        $cel = $stringArrayKriteria;

        $normal = $cel;
        $options = strval(1);


        $chunk = array_chunk($cel, 5);

        $newArr = [];
        $n = 1;
        foreach ($chunk as $key => $v) {
            $x = $key + 1;
            foreach ($v as $i => $vv) {
                $c = $i + 1;
                $newArr["$n$c"] = $vv;

                $x = 1;
            }
            $n++;
        }
        $cel = $newArr;
        $normal = $cel;


        $baris = $baris;
        $kolom = $kolom;
        $w     = $w;
        $cel       = $cel;
        $normal    = $normal;
        $options   = $options;
        $session   = $session;

        $hasil = 0;
        $jumCon = 0;
        $jumDis = [];
        $totCon = 0;
        $totDes = 0;
        $rata2 = 0;
        $ranking = [];

        for ($i = 1; $i <= $baris + 1; $i++) :
            for ($k = 0; $k <= 5; $k++) :
                if ($i == $baris + 1 && $k == 0) :
                elseif ($k == 0) :
                    $session->get('n')[$i - 1];
                elseif ($i == $baris + 1) :
                    $w["1$k"];
                else :
                    $cel["$i$k"];
                endif;
            endfor;
        endfor;

        // NORMALISASI

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                for ($x = 1; $x <= $baris; $x++) {
                    $hasil = $hasil + pow($normal["$x$k"], 2);
                }
                $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                $hasil = 0;
                number_format($normalisasi["$i$k"], 2);
            endfor;
        endfor;

        // PEMBOBOTAN
        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                number_format($bobot["$i$k"], 2);
            endfor;
        endfor;


        // Himp. Con dan Dis
        // Concordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                        $jumCon = $jumCon + $w["1$cek"];
                    }
                }
                $concordance["$i$k"] = $jumCon;
                $jumCon = 0;

                if ($k == $i) :

                else :
                    number_format($concordance["$i$k"], 2);
                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                        $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    } else {
                        $jumDis["$i$cek"] = 0;
                    }
                    //Pembagi Discordance
                    $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                }
                $atasDes = max($jumDis);
                $bawahDes = max($totDis);
                $jumDis = [];
                $totDis = [];

                if ($bawahDes != 0) {
                    $descordance["$i$k"] = $atasDes / $bawahDes;
                } else {
                    $descordance["$i$k"] = 0;
                }

                if ($k == $i) :

                else :

                    number_format($descordance["$i$k"], 2);

                endif;
            endfor;
        endfor;

        // NILAI DOMINAN Concordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totCon = $totCon + $concordance["$i$k"];
                }
            }
        }

        $c = $totCon / ($baris * ($baris - 1));

        // echo "Nilai Threshold (C) = " . number_format($c,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($concordance["$i$cek"] >= $c) {
                        $f["$i$cek"] = 1;
                    } else {
                        $f["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $f["$i$k"];
                    $corco[$i][$k] = $f["$i$k"];

                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totDes = $totDes + $descordance["$i$k"];
                }
            }
        }

        $d = $totDes / ($baris * ($baris - 1));

        // echo "Nilai Threshold (D) = " . number_format($d,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($descordance["$i$cek"] >= $d) {
                        $g["$i$cek"] = 1;
                    } else {
                        $g["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $g["$i$k"];
                    $disco[$i][$k] = $g["$i$k"];

                endif;
            endfor;
        endfor;

        // Aggregate Dominance Matrix

        // Threshold

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];

                if ($i == $k) :

                else :
                    $e["$i$k"];
                endif;
            endfor;
        endfor;

        // Tanpa Threshold

        $baris;

        // Rata2

        $arrRank = [];
        for ($i = 1; $i <= $baris; $i++) :
            $counter = 0;
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];
                if ($i == $k) :

                else :
                    $resCol = $corco[$i][$k] * $disco[$i][$k];

                    if ($resCol == 1) {
                        $counter++;
                    }

                endif;
            endfor;

            $counter;

            $arrRank[] = [
                'row' => $i,
                'freq' => $counter
            ];
        endfor;


        // for($i=1;$i<=$baris;$i++): 
        //     for($k=1;$k<=$baris+1;$k++): 
        // 		if($k <= $baris)
        // 			$e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
        //                 if($i == $k): 

        //                 elseif($k == $baris+1):

        //                     for($r=1;$r<=$baris;$r++): 
        //                         $rata2 = $rata2 + $e1["$i$r"];
        //                     endfor; 
        //                         $rata[$i-1] = $rata2/$baris;
        //                         $rata2 = 0;

        //                         number_format($rata[$i-1],2);

        //                          else: 
        //                          number_format($e1["$i$k"],2);
        //                          endif; 
        //     endfor; 
        // endfor;

        // INI UNTUK RANKING

        usort($arrRank, function ($a, $b) {
            return $a['freq'] < $b['freq'];
        });
        foreach (range(1, count($arrRank)) as $key => $value) :
            $value;
            $sessionVals[] = $session->get('n')[$arrRank[$key]['row'] - 1];
            $arrRank[$key]['freq'];

        endforeach;

        $hasilRekom = array() ;
        $rekom = array_slice($sessionVals, 0, 3);
        foreach($rekom as $key => $value){
            $hasilRekom[] = $this->M_Alternatif->cariNama($value);
        }

        $hasilArray = array();
        for($i=0; $i < count($hasilRekom);){
            $hasilArray[$i] = $hasilRekom[$i][0];
            $i++;
        }
        
        // echo '<pre>';
        // var_dump($hasilArray[0]);
        // die;
        $id_kategori = $this->request->getPost('id_kategori');
        $id_paket = $this->request->getPost('id_paket');
        $kapasitas = $this->request->getPost('kapasitas');

        $data = [
            'tittle'     => 'Langkah Awal Pemesanan',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            'id_kategori' => $id_kategori,
            'id_paket' => $id_paket,
            'alternatif' => $this->M_Alternatif->getAll(),
            'alternatif2' => $hasilArray,
            'session'      => $session->set('tema2', ''),
            'isi'        => 'Proses/v_prosesAwal',
            'lokasi'     => $this->request->getPost('lokasi')
        ];
        echo view('Layout/v_wrapper', $data);
    }

    public function pilihTempat()
    {
        $session = session();

        // $hasil = $this->M_Alternatif->getAll();
        // $n = 0;

        // foreach ($hasil as $value){
        //     $baris[$n] = $value['alternatif'];
        //     $cel[$n] = array($value['fasilitas'],$value['harga'],$value['tahun'],$value['jarak'],$value['keamanan']);
        //     $parentArray = array_values($cel);
        //     $n++;
        // }

        // $session->set('n', $baris);
        // $jumlahAlternatif = count($baris);
        // $singleArray = []; 

        // foreach ($parentArray as $childArray) 
        // { 
        //     foreach ($childArray as $value) 
        //     { 
        //         $singleArray[] = $value; 
        //     } 
        // }

        // $baris = strval($jumlahAlternatif);
        // $kolom = 5;
        // // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
        // $w = [
        //     11 => 1,
        //     12 => 2,
        //     13 => 3,
        //     14 => 4,
        //     15 => 5,
        // ];

        $n = 0;
        $kriteria = $this->M_Electre->tbl_kriteria();
        $tempat = $this->M_Electre->tbl_tempat();

        foreach ($tempat as $key => $tmp) {
            foreach ($kriteria as $key => $ktr) {
                $dataCel[$n] = $this->M_Electre->tbl_alternatif($tmp['id_tempat'], $ktr['id_kriteria']);
                $parentArray1 = array_values($dataCel);
                $n++;
            }
        }
        foreach ($parentArray1 as $childArray) {
            foreach ($childArray as $value) {
                $singleArray1[] = $value;
            }
        }
        foreach ($singleArray1 as $key => $value) {
            $stringArrayKriteria[] = $value['skor'];
        }

        foreach ($tempat as $key => $value) {
            $stringArrayTempat[] = $value['nama'];
        }

        $jumlahAlternatif = count($stringArrayTempat);



        $session->set('n', $stringArrayTempat);

        $baris = strval($jumlahAlternatif);



        $kolom = count($kriteria);

        $b = 1;
        $k = 1;
        for ($i = 0; $i <= count($kriteria) - 1;) {
            $nama = $b . $k;
            $w[$nama] = $kriteria[$i]['bobot'];
            $i++;
            $k++;
        }


        $cel = $stringArrayKriteria;

        $normal = $cel;
        $options = strval(1);


        $chunk = array_chunk($cel, 5);

        $newArr = [];
        $n = 1;
        foreach ($chunk as $key => $v) {
            $x = $key + 1;
            foreach ($v as $i => $vv) {
                $c = $i + 1;
                $newArr["$n$c"] = $vv;

                $x = 1;
            }
            $n++;
        }
        $cel = $newArr;
        $normal = $cel;


        $baris = $baris;
        $kolom = $kolom;
        $w     = $w;
        $cel       = $cel;
        $normal    = $normal;
        $options   = $options;
        $session   = $session;

        $hasil = 0;
        $jumCon = 0;
        $jumDis = [];
        $totCon = 0;
        $totDes = 0;
        $rata2 = 0;
        $ranking = [];

        for ($i = 1; $i <= $baris + 1; $i++) :
            for ($k = 0; $k <= 5; $k++) :
                if ($i == $baris + 1 && $k == 0) :
                elseif ($k == 0) :
                    $session->get('n')[$i - 1];
                elseif ($i == $baris + 1) :
                    $w["1$k"];
                else :
                    $cel["$i$k"];
                endif;
            endfor;
        endfor;

        // NORMALISASI

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                for ($x = 1; $x <= $baris; $x++) {
                    $hasil = $hasil + pow($normal["$x$k"], 2);
                }
                $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                $hasil = 0;
                number_format($normalisasi["$i$k"], 2);
            endfor;
        endfor;

        // PEMBOBOTAN
        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                number_format($bobot["$i$k"], 2);
            endfor;
        endfor;


        // Himp. Con dan Dis
        // Concordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                        $jumCon = $jumCon + $w["1$cek"];
                    }
                }
                $concordance["$i$k"] = $jumCon;
                $jumCon = 0;

                if ($k == $i) :

                else :
                    number_format($concordance["$i$k"], 2);
                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                        $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    } else {
                        $jumDis["$i$cek"] = 0;
                    }
                    //Pembagi Discordance
                    $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                }
                $atasDes = max($jumDis);
                $bawahDes = max($totDis);
                $jumDis = [];
                $totDis = [];

                if ($bawahDes != 0) {
                    $descordance["$i$k"] = $atasDes / $bawahDes;
                } else {
                    $descordance["$i$k"] = 0;
                }

                if ($k == $i) :

                else :

                    number_format($descordance["$i$k"], 2);

                endif;
            endfor;
        endfor;

        // NILAI DOMINAN Concordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totCon = $totCon + $concordance["$i$k"];
                }
            }
        }

        $c = $totCon / ($baris * ($baris - 1));

        // echo "Nilai Threshold (C) = " . number_format($c,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($concordance["$i$cek"] >= $c) {
                        $f["$i$cek"] = 1;
                    } else {
                        $f["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $f["$i$k"];
                    $corco[$i][$k] = $f["$i$k"];

                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totDes = $totDes + $descordance["$i$k"];
                }
            }
        }

        $d = $totDes / ($baris * ($baris - 1));

        // echo "Nilai Threshold (D) = " . number_format($d,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($descordance["$i$cek"] >= $d) {
                        $g["$i$cek"] = 1;
                    } else {
                        $g["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $g["$i$k"];
                    $disco[$i][$k] = $g["$i$k"];

                endif;
            endfor;
        endfor;

        // Aggregate Dominance Matrix

        // Threshold

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];

                if ($i == $k) :

                else :
                    $e["$i$k"];
                endif;
            endfor;
        endfor;

        // Tanpa Threshold

        $baris;

        // Rata2

        $arrRank = [];
        for ($i = 1; $i <= $baris; $i++) :
            $counter = 0;
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];
                if ($i == $k) :

                else :
                    $resCol = $corco[$i][$k] * $disco[$i][$k];

                    if ($resCol == 1) {
                        $counter++;
                    }

                endif;
            endfor;

            $counter;

            $arrRank[] = [
                'row' => $i,
                'freq' => $counter
            ];
        endfor;


        // for($i=1;$i<=$baris;$i++): 
        //     for($k=1;$k<=$baris+1;$k++): 
        // 		if($k <= $baris)
        // 			$e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
        //                 if($i == $k): 

        //                 elseif($k == $baris+1):

        //                     for($r=1;$r<=$baris;$r++): 
        //                         $rata2 = $rata2 + $e1["$i$r"];
        //                     endfor; 
        //                         $rata[$i-1] = $rata2/$baris;
        //                         $rata2 = 0;

        //                         number_format($rata[$i-1],2);

        //                          else: 
        //                          number_format($e1["$i$k"],2);
        //                          endif; 
        //     endfor; 
        // endfor;

        // INI UNTUK RANKING

        usort($arrRank, function ($a, $b) {
            return $a['freq'] < $b['freq'];
        });
        foreach (range(1, count($arrRank)) as $key => $value) :
            $value;
            $sessionVals[] = $session->get('n')[$arrRank[$key]['row'] - 1];
            $arrRank[$key]['freq'];

        endforeach;

        // $ranking = $rata;
        //     if($options == 1): 
        //         rsort($ranking);
        //     else: 
        //         sort($ranking);
        //     endif;

        // $sessionVals = [];

        // for($i=0;$i<$baris;$i++): 
        // $i+1;
        //     for($k=0;$k<$baris;$k++): 
        // 		// echo '<pre>';
        // 		// var_dump("rank", $ranking[$k]);
        // 		// var_dump("rata", $rata[$i]);
        // 		if($rata[$i] == $ranking[$k]){
        // 		    $sessionVals[] = $session->get('n')[$k];
        // 			echo $session->get('n')[$k];
        // 		} 
        //     endfor;  

        //     number_format($ranking[$i]/array_sum($ranking),2);  
        // endfor;

        $rekom = array_slice($sessionVals, 0, 1);
        // echo '<pre>';
        // var_dump($rekom);
        // die;
        $_SESSION['id_kategori'] = null;
        $data = [
            'tittle'     => 'Langkah Awal Pemesanan',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            'alternatif' => $this->M_Alternatif->getAll(),
            'alternatif2' => $this->M_Alternatif->cariNama($rekom[0]),
            'session'      => $session->set('tema2', ''),
            'isi'        => 'proses/v_prosesAwal',
            'lokasi'     => ''
        ];
        echo view('layout/v_wrapper', $data);
    }

    public function cariTema($id)
    {
        $session = session();

        $hasil = $this->M_Alternatif->cariTema($id);
        $n = 0;

        foreach ($hasil as $value) {
            $baris[$n] = $value['alternatif'];
            $cel[$n] = array($value['fasilitas'], $value['harga'], $value['tahun'], $value['jarak'], $value['keamanan']);
            $parentArray = array_values($cel);
            $n++;
        }

        $session->set('n', $baris);
        $jumlahAlternatif = count($baris);
        $singleArray = [];

        foreach ($parentArray as $childArray) {
            foreach ($childArray as $value) {
                $singleArray[] = $value;
            }
        }

        $baris = strval($jumlahAlternatif);
        $kolom = 5;
        // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
        $w = [
            11 => 1,
            12 => 2,
            13 => 3,
            14 => 4,
            15 => 5,
        ];

        $cel = $singleArray;
        $normal = $cel;
        $options = strval(1);

        /*var_dump($baris);
        echo '<pre>';
        var_dump($w);
        */
        // echo '<pre>';
        $chunk = array_chunk($cel, 5);
        $newArr = [];
        $n = 1;
        foreach ($chunk as $key => $v) {
            $x = $key + 1;
            foreach ($v as $i => $vv) {
                $c = $i + 1;
                $newArr["$n$c"] = $vv;
                // var_dump("");
                $x = 1;
            }
            $n++;
        }

        $cel = $newArr;
        $normal = $cel;


        // echo '<br>';
        // var_dump($normal);         
        // echo '<br>';        
        // var_dump($cel);
        // die;  

        $baris = $baris;
        $kolom = $kolom;
        $w     = $w;
        $cel       = $cel;
        $normal    = $normal;
        $options   = $options;
        $session   = $session;

        $hasil = 0;
        $jumCon = 0;
        $jumDis = [];
        $totCon = 0;
        $totDes = 0;
        $rata2 = 0;
        $ranking = [];

        for ($i = 1; $i <= $baris + 1; $i++) :
            for ($k = 0; $k <= 5; $k++) :
                if ($i == $baris + 1 && $k == 0) :
                elseif ($k == 0) :
                    $session->get('n')[$i - 1];
                elseif ($i == $baris + 1) :
                    $w["1$k"];
                else :
                    $cel["$i$k"];
                endif;
            endfor;
        endfor;

        // NORMALISASI

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                for ($x = 1; $x <= $baris; $x++) {
                    $hasil = $hasil + pow($normal["$x$k"], 2);
                }
                $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                $hasil = 0;
                number_format($normalisasi["$i$k"], 2);
            endfor;
        endfor;

        // PEMBOBOTAN
        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $kolom; $k++) :
                $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                number_format($bobot["$i$k"], 2);
            endfor;
        endfor;


        // Himp. Con dan Dis
        // Concordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                        $jumCon = $jumCon + $w["1$cek"];
                    }
                }
                $concordance["$i$k"] = $jumCon;
                $jumCon = 0;

                if ($k == $i) :

                else :
                    number_format($concordance["$i$k"], 2);
                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $kolom; $cek++) {
                    if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                        $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    } else {
                        $jumDis["$i$cek"] = 0;
                    }
                    //Pembagi Discordance
                    $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                }
                $atasDes = max($jumDis);
                $bawahDes = max($totDis);
                $jumDis = [];
                $totDis = [];

                if ($bawahDes != 0) {
                    $descordance["$i$k"] = $atasDes / $bawahDes;
                } else {
                    $descordance["$i$k"] = 0;
                }

                if ($k == $i) :

                else :

                    number_format($descordance["$i$k"], 2);

                endif;
            endfor;
        endfor;

        // NILAI DOMINAN Concordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totCon = $totCon + $concordance["$i$k"];
                }
            }
        }

        $c = $totCon / ($baris * ($baris - 1));

        // echo "Nilai Threshold (C) = " . number_format($c,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($concordance["$i$cek"] >= $c) {
                        $f["$i$cek"] = 1;
                    } else {
                        $f["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $f["$i$k"];

                endif;
            endfor;
        endfor;

        // Discordance

        for ($i = 1; $i <= $baris; $i++) {
            for ($k = 1; $k <= $baris; $k++) {
                if ($i != $k) {
                    $totDes = $totDes + $descordance["$i$k"];
                }
            }
        }

        $d = $totDes / ($baris * ($baris - 1));

        // echo "Nilai Threshold (D) = " . number_format($d,2);

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                for ($cek = 1; $cek <= $baris; $cek++) {
                    if ($descordance["$i$cek"] >= $d) {
                        $g["$i$cek"] = 1;
                    } else {
                        $g["$i$cek"] = 0;
                    }
                }

                if ($k == $i) :

                else :

                    $g["$i$k"];

                endif;
            endfor;
        endfor;

        // Aggregate Dominance Matrix

        // Threshold

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris; $k++) :
                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];

                if ($i == $k) :

                else :
                    $e["$i$k"];
                endif;
            endfor;
        endfor;

        // Tanpa Threshold

        $baris;

        // Rata2

        for ($i = 1; $i <= $baris; $i++) :
            for ($k = 1; $k <= $baris + 1; $k++) :
                if ($k <= $baris)
                    $e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
                if ($i == $k) :

                elseif ($k == $baris + 1) :

                    for ($r = 1; $r <= $baris; $r++) :
                        $rata2 = $rata2 + $e1["$i$r"];
                    endfor;
                    $rata[$i - 1] = $rata2 / $baris;
                    $rata2 = 0;

                    number_format($rata[$i - 1], 2);

                else :
                    number_format($e1["$i$k"], 2);
                endif;
            endfor;
        endfor;

        // INI UNTUK RANKING

        $ranking = $rata;
        if ($options == 1) :
            rsort($ranking);
        else :
            sort($ranking);
        endif;

        $sessionVals = [];

        for ($i = 0; $i < $baris; $i++) :
            $i + 1;
            for ($k = 0; $k < $baris; $k++) :
                // echo '<pre>';
                // var_dump("rank", $ranking[$k]);
                // var_dump("rata", $rata[$i]);
                if ($rata[$i] == $ranking[$k]) {
                    $sessionVals[] = $session->get('n')[$k];
                    echo $session->get('n')[$k];
                }
            endfor;

            number_format($ranking[$i] / array_sum($ranking), 2);
        endfor;

        $rekom = array_slice($sessionVals, 0, 1);

        $newdata = [
            'tema2'  => $id
        ];


        $data = [
            'tittle'     => 'Langkah Awal Pemesanan',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            'alternatif' => $this->M_Alternatif->findData($id),
            'alternatif2' => $this->M_Alternatif->cariNama($rekom[0]),
            'isi'        => 'Proses/v_prosesAwal',
            'lokasi'     => ''
        ];
        $this->session->set($newdata);
        echo view('Layout/v_wrapper', $data);
    }

    public function lokasi()
    {
        $session = session();

        $lokasi = $this->request->getPost('lokasi');
        // $tema  = $this->request->getPost('tema2');

        if (isset($lokasi) != '') {

            $hasil = $this->M_Alternatif->cariLokasiAll($lokasi);
            $n = 0;

            foreach ($hasil as $value) {
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'], $value['harga'], $value['tahun'], $value['jarak'], $value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }

            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = [];

            foreach ($parentArray as $childArray) {
                foreach ($childArray as $value) {
                    $singleArray[] = $value;
                }
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];

            $cel = $singleArray;
            $normal = $cel;
            $options = strval(1);

            /*var_dump($baris);
        echo '<pre>';
        var_dump($w);
        */
            // echo '<pre>';
            $chunk = array_chunk($cel, 5);
            $newArr = [];
            $n = 1;
            foreach ($chunk as $key => $v) {
                $x = $key + 1;
                foreach ($v as $i => $vv) {
                    $c = $i + 1;
                    $newArr["$n$c"] = $vv;
                    // var_dump("");
                    $x = 1;
                }
                $n++;
            }

            $cel = $newArr;
            $normal = $cel;


            // echo '<br>';
            // var_dump($normal);         
            // echo '<br>';        
            // var_dump($cel);
            // die;  

            $baris = $baris;
            $kolom = $kolom;
            $w     = $w;
            $cel       = $cel;
            $normal    = $normal;
            $options   = $options;
            $session   = $session;

            $hasil = 0;
            $jumCon = 0;
            $jumDis = [];
            $totCon = 0;
            $totDes = 0;
            $rata2 = 0;
            $ranking = [];

            for ($i = 1; $i <= $baris + 1; $i++) :
                for ($k = 0; $k <= 5; $k++) :
                    if ($i == $baris + 1 && $k == 0) :
                    elseif ($k == 0) :
                        $session->get('n')[$i - 1];
                    elseif ($i == $baris + 1) :
                        $w["1$k"];
                    else :
                        $cel["$i$k"];
                    endif;
                endfor;
            endfor;

            // NORMALISASI

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $kolom; $k++) :
                    for ($x = 1; $x <= $baris; $x++) {
                        $hasil = $hasil + pow($normal["$x$k"], 2);
                    }
                    $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                    $hasil = 0;
                    number_format($normalisasi["$i$k"], 2);
                endfor;
            endfor;

            // PEMBOBOTAN
            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $kolom; $k++) :
                    $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                    number_format($bobot["$i$k"], 2);
                endfor;
            endfor;


            // Himp. Con dan Dis
            // Concordance

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $kolom; $cek++) {
                        if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                            $jumCon = $jumCon + $w["1$cek"];
                        }
                    }
                    $concordance["$i$k"] = $jumCon;
                    $jumCon = 0;

                    if ($k == $i) :

                    else :
                        number_format($concordance["$i$k"], 2);
                    endif;
                endfor;
            endfor;

            // Discordance

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $kolom; $cek++) {
                        if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                            $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                        } else {
                            $jumDis["$i$cek"] = 0;
                        }
                        //Pembagi Discordance
                        $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    }
                    $atasDes = max($jumDis);
                    $bawahDes = max($totDis);
                    $jumDis = [];
                    $totDis = [];

                    if ($bawahDes != 0) {
                        $descordance["$i$k"] = $atasDes / $bawahDes;
                    } else {
                        $descordance["$i$k"] = 0;
                    }

                    if ($k == $i) :

                    else :

                        number_format($descordance["$i$k"], 2);

                    endif;
                endfor;
            endfor;

            // NILAI DOMINAN Concordance

            for ($i = 1; $i <= $baris; $i++) {
                for ($k = 1; $k <= $baris; $k++) {
                    if ($i != $k) {
                        $totCon = $totCon + $concordance["$i$k"];
                    }
                }
            }

            $c = $totCon / ($baris * ($baris - 1));

            // echo "Nilai Threshold (C) = " . number_format($c,2);

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $baris; $cek++) {
                        if ($concordance["$i$cek"] >= $c) {
                            $f["$i$cek"] = 1;
                        } else {
                            $f["$i$cek"] = 0;
                        }
                    }

                    if ($k == $i) :

                    else :

                        $f["$i$k"];

                    endif;
                endfor;
            endfor;

            // Discordance

            for ($i = 1; $i <= $baris; $i++) {
                for ($k = 1; $k <= $baris; $k++) {
                    if ($i != $k) {
                        $totDes = $totDes + $descordance["$i$k"];
                    }
                }
            }

            $d = $totDes / ($baris * ($baris - 1));

            // echo "Nilai Threshold (D) = " . number_format($d,2);

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $baris; $cek++) {
                        if ($descordance["$i$cek"] >= $d) {
                            $g["$i$cek"] = 1;
                        } else {
                            $g["$i$cek"] = 0;
                        }
                    }

                    if ($k == $i) :

                    else :

                        $g["$i$k"];

                    endif;
                endfor;
            endfor;

            // Aggregate Dominance Matrix

            // Threshold

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    $e["$i$k"] = $f["$i$k"] * $g["$k$i"];

                    if ($i == $k) :

                    else :
                        $e["$i$k"];
                    endif;
                endfor;
            endfor;

            // Tanpa Threshold

            $baris;

            // Rata2

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris + 1; $k++) :
                    if ($k <= $baris)
                        $e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
                    if ($i == $k) :

                    elseif ($k == $baris + 1) :

                        for ($r = 1; $r <= $baris; $r++) :
                            $rata2 = $rata2 + $e1["$i$r"];
                        endfor;
                        $rata[$i - 1] = $rata2 / $baris;
                        $rata2 = 0;

                        number_format($rata[$i - 1], 2);

                    else :
                        number_format($e1["$i$k"], 2);
                    endif;
                endfor;
            endfor;

            // INI UNTUK RANKING

            $ranking = $rata;
            if ($options == 1) :
                rsort($ranking);
            else :
                sort($ranking);
            endif;

            $sessionVals = [];

            for ($i = 0; $i < $baris; $i++) :
                $i + 1;
                for ($k = 0; $k < $baris; $k++) :
                    // echo '<pre>';
                    // var_dump("rank", $ranking[$k]);
                    // var_dump("rata", $rata[$i]);
                    if ($rata[$i] == $ranking[$k]) {
                        $sessionVals[] = $session->get('n')[$k];
                        echo $session->get('n')[$k];
                    }
                endfor;

                number_format($ranking[$i] / array_sum($ranking), 2);
            endfor;

            $rekom = array_slice($sessionVals, 0, 1);


            $data = [
                'tittle'     => 'Langkah Awal Pemesanan',
                'session'    => $session->get("username"),
                'session'    => $session->get("id_user"),
                'alternatif' => $this->M_Alternatif->cariLokasiAll($lokasi),
                'alternatif2' => $this->M_Alternatif->cariNama($rekom[0]),
                'isi'        => 'Proses/v_prosesAwal',
                'lokasi'     => $lokasi
            ];

            echo view('Layout/v_wrapper', $data);
        } else if (isset($lokasi) != '' && isset($tema) != '') {


            $hasil = $this->M_Alternatif->cariLokasi($lokasi, $tema);
            $n = 0;

            foreach ($hasil as $value) {
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'], $value['harga'], $value['tahun'], $value['jarak'], $value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }

            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = [];

            foreach ($parentArray as $childArray) {
                foreach ($childArray as $value) {
                    $singleArray[] = $value;
                }
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];

            $cel = $singleArray;
            $normal = $cel;
            $options = strval(1);

            /*var_dump($baris);
            echo '<pre>';
            var_dump($w);
            */
            // echo '<pre>';
            $chunk = array_chunk($cel, 5);
            $newArr = [];
            $n = 1;
            foreach ($chunk as $key => $v) {
                $x = $key + 1;
                foreach ($v as $i => $vv) {
                    $c = $i + 1;
                    $newArr["$n$c"] = $vv;
                    // var_dump("");
                    $x = 1;
                }
                $n++;
            }

            $cel = $newArr;
            $normal = $cel;


            // echo '<br>';
            // var_dump($normal);         
            // echo '<br>';        
            // var_dump($cel);
            // die;  

            $baris = $baris;
            $kolom = $kolom;
            $w     = $w;
            $cel       = $cel;
            $normal    = $normal;
            $options   = $options;
            $session   = $session;

            $hasil = 0;
            $jumCon = 0;
            $jumDis = [];
            $totCon = 0;
            $totDes = 0;
            $rata2 = 0;
            $ranking = [];

            for ($i = 1; $i <= $baris + 1; $i++) :
                for ($k = 0; $k <= 5; $k++) :
                    if ($i == $baris + 1 && $k == 0) :
                    elseif ($k == 0) :
                        $session->get('n')[$i - 1];
                    elseif ($i == $baris + 1) :
                        $w["1$k"];
                    else :
                        $cel["$i$k"];
                    endif;
                endfor;
            endfor;

            // NORMALISASI

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $kolom; $k++) :
                    for ($x = 1; $x <= $baris; $x++) {
                        $hasil = $hasil + pow($normal["$x$k"], 2);
                    }
                    $normalisasi["$i$k"] = $normal["$i$k"] / sqrt($hasil);
                    $hasil = 0;
                    number_format($normalisasi["$i$k"], 2);
                endfor;
            endfor;

            // PEMBOBOTAN
            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $kolom; $k++) :
                    $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                    number_format($bobot["$i$k"], 2);
                endfor;
            endfor;


            // Himp. Con dan Dis
            // Concordance

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $kolom; $cek++) {
                        if ($bobot["$i$cek"] >= $bobot["$k$cek"]) {
                            $jumCon = $jumCon + $w["1$cek"];
                        }
                    }
                    $concordance["$i$k"] = $jumCon;
                    $jumCon = 0;

                    if ($k == $i) :

                    else :
                        number_format($concordance["$i$k"], 2);
                    endif;
                endfor;
            endfor;

            // Discordance

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $kolom; $cek++) {
                        if ($bobot["$i$cek"] < $bobot["$k$cek"]) {
                            $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                        } else {
                            $jumDis["$i$cek"] = 0;
                        }
                        //Pembagi Discordance
                        $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                    }
                    $atasDes = max($jumDis);
                    $bawahDes = max($totDis);
                    $jumDis = [];
                    $totDis = [];

                    if ($bawahDes != 0) {
                        $descordance["$i$k"] = $atasDes / $bawahDes;
                    } else {
                        $descordance["$i$k"] = 0;
                    }

                    if ($k == $i) :

                    else :

                        number_format($descordance["$i$k"], 2);

                    endif;
                endfor;
            endfor;

            // NILAI DOMINAN Concordance

            for ($i = 1; $i <= $baris; $i++) {
                for ($k = 1; $k <= $baris; $k++) {
                    if ($i != $k) {
                        $totCon = $totCon + $concordance["$i$k"];
                    }
                }
            }

            $c = $totCon / ($baris * ($baris - 1));

            // echo "Nilai Threshold (C) = " . number_format($c,2);

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $baris; $cek++) {
                        if ($concordance["$i$cek"] >= $c) {
                            $f["$i$cek"] = 1;
                        } else {
                            $f["$i$cek"] = 0;
                        }
                    }

                    if ($k == $i) :

                    else :

                        $f["$i$k"];

                    endif;
                endfor;
            endfor;

            // Discordance

            for ($i = 1; $i <= $baris; $i++) {
                for ($k = 1; $k <= $baris; $k++) {
                    if ($i != $k) {
                        $totDes = $totDes + $descordance["$i$k"];
                    }
                }
            }

            $d = $totDes / ($baris * ($baris - 1));

            // echo "Nilai Threshold (D) = " . number_format($d,2);

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    for ($cek = 1; $cek <= $baris; $cek++) {
                        if ($descordance["$i$cek"] >= $d) {
                            $g["$i$cek"] = 1;
                        } else {
                            $g["$i$cek"] = 0;
                        }
                    }

                    if ($k == $i) :

                    else :

                        $g["$i$k"];

                    endif;
                endfor;
            endfor;

            // Aggregate Dominance Matrix

            // Threshold

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris; $k++) :
                    $e["$i$k"] = $f["$i$k"] * $g["$k$i"];

                    if ($i == $k) :

                    else :
                        $e["$i$k"];
                    endif;
                endfor;
            endfor;

            // Tanpa Threshold

            $baris;

            // Rata2

            for ($i = 1; $i <= $baris; $i++) :
                for ($k = 1; $k <= $baris + 1; $k++) :
                    if ($k <= $baris)
                        $e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
                    if ($i == $k) :

                    elseif ($k == $baris + 1) :

                        for ($r = 1; $r <= $baris; $r++) :
                            $rata2 = $rata2 + $e1["$i$r"];
                        endfor;
                        $rata[$i - 1] = $rata2 / $baris;
                        $rata2 = 0;

                        number_format($rata[$i - 1], 2);

                    else :
                        number_format($e1["$i$k"], 2);
                    endif;
                endfor;
            endfor;

            // INI UNTUK RANKING

            $ranking = $rata;
            if ($options == 1) :
                rsort($ranking);
            else :
                sort($ranking);
            endif;

            $sessionVals = [];

            for ($i = 0; $i < $baris; $i++) :
                $i + 1;
                for ($k = 0; $k < $baris; $k++) :
                    // echo '<pre>';
                    // var_dump("rank", $ranking[$k]);
                    // var_dump("rata", $rata[$i]);
                    if ($rata[$i] == $ranking[$k]) {
                        $sessionVals[] = $session->get('n')[$k];
                        echo $session->get('n')[$k];
                    }
                endfor;

                number_format($ranking[$i] / array_sum($ranking), 2);
            endfor;

            $rekom = array_slice($sessionVals, 0, 1);


            $data = [
                'tittle'     => 'Langkah Awal Pemesanan',
                'session'    => $session->get("username"),
                'session'    => $session->get("id_user"),
                'alternatif' => $this->M_Alternatif->cariLokasi($lokasi, $tema),
                'alternatif2' => $this->M_Alternatif->cariNama($rekom[0]),
                'isi'        => 'Proses/v_prosesAwal',
                'lokasi'     => $lokasi
            ];

            echo view('Layout/v_wrapper', $data);
        } else {
            return redirect()->to('ProsesAwal');
        }
    }

    public function cariRekomendasi()
    {
        $lokasi = '';
        $jarak = '';
        $session = session();
        $data = [
            'tittle'     => 'Langkah Awal Pemesanan',
            'session'    => $session->get("username"),
            'session'    => $session->get("id_user"),
            'alternatif'   => $this->M_Alternatif->findData($lokasi),
            'isi'        => 'Proses/v_prosesAwal'
        ];
        echo view('Layout/v_wrapper', $data);
    }

    public function cari()
    {
        $session = session();

        $lokasi = $this->request->getPost('lokasi');
        $jarak = $this->request->getPost('jarak');
        $tema  = $this->request->getPost('tema2');

        //$getCari = $this->request->getPost('kota');

        if (isset($lokasi) != '' && isset($jarak) == '' && isset($tema) != '') {
            $session = session();
            $hasil = $this->M_Alternatif->cariLokasi($lokasi, $tema);
            $n = 0;

            foreach ($hasil as $value) {
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'], $value['harga'], $value['tahun'], $value['jarak'], $value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }
            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = [];
            foreach ($parentArray as $childArray) {
                foreach ($childArray as $value) {
                    $singleArray[] = $value;
                }
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];
            $cel = $singleArray;
            $normal = $cel;
            $options = strval(1);

            /*var_dump($baris);
            echo '<pre>';
            var_dump($w);
            */
            // echo '<pre>';
            $chunk = array_chunk($cel, 5);
            $newArr = [];
            $n = 1;
            foreach ($chunk as $key => $v) {
                $x = $key + 1;
                foreach ($v as $i => $vv) {
                    $c = $i + 1;
                    $newArr["$n$c"] = $vv;
                    // var_dump("");
                    $x = 1;
                }
                $n++;
            }
            $cel = $newArr;
            $normal = $cel;

            // echo '<br>';
            // var_dump($normal);
            // echo '<br>';
            // var_dump($cel);
            // die;
            $data = [
                'baris'     => $baris,
                'kolom'     => $kolom,
                'w'         => $w,
                'cel'       => $cel,
                'normal'    => $normal,
                'options'   => $options,
                'session'   => $session
            ];
            view('hitung', $data);
            //echo view('hitung', $data);
        } else if (isset($lokasi) == '' && isset($jarak) != '' && isset($tema) != '') {
            $session = session();
            $hasil = $this->M_Alternatif->cariJarak($jarak, $tema);
            $n = 0;

            foreach ($hasil as $value) {
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'], $value['harga'], $value['tahun'], $value['jarak'], $value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }
            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = [];
            foreach ($parentArray as $childArray) {
                foreach ($childArray as $value) {
                    $singleArray[] = $value;
                }
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];
            $cel = $singleArray;
            $normal = $cel;
            $options = strval(1);

            /*var_dump($baris);
            echo '<pre>';
            var_dump($w);
            */
            // echo '<pre>';
            $chunk = array_chunk($cel, 5);
            $newArr = [];
            $n = 1;
            foreach ($chunk as $key => $v) {
                $x = $key + 1;
                foreach ($v as $i => $vv) {
                    $c = $i + 1;
                    $newArr["$n$c"] = $vv;
                    // var_dump("");
                    $x = 1;
                }
                $n++;
            }
            $cel = $newArr;
            $normal = $cel;

            // echo '<br>';
            // var_dump($normal);
            // echo '<br>';
            // var_dump($cel);
            // die;
            $data = [
                'baris'     => $baris,
                'kolom'     => $kolom,
                'w'         => $w,
                'cel'       => $cel,
                'normal'    => $normal,
                'options'   => $options,
                'session'   => $session
            ];
            echo view('hitung', $data);
        } else if (isset($lokasi) != '' && isset($jarak) != '' && isset($tema) != '') {
            $session = session();
            $hasil = $this->M_Alternatif->cariAll($lokasi, $jarak, $tema);
            $n = 0;

            foreach ($hasil as $value) {
                $baris[$n] = $value['alternatif'];
                $cel[$n] = array($value['fasilitas'], $value['harga'], $value['tahun'], $value['jarak'], $value['keamanan']);
                $parentArray = array_values($cel);
                $n++;
            }
            $session->set('n', $baris);
            $jumlahAlternatif = count($baris);
            $singleArray = [];
            foreach ($parentArray as $childArray) {
                foreach ($childArray as $value) {
                    $singleArray[] = $value;
                }
            }

            $baris = strval($jumlahAlternatif);
            $kolom = 5;
            // $w = array(strval(1),strval(2),strval(3),strval(4),strval(5));
            $w = [
                11 => 1,
                12 => 2,
                13 => 3,
                14 => 4,
                15 => 5,
            ];
            $cel = $singleArray;
            $normal = $cel;
            $options = strval(1);

            /*var_dump($baris);
            echo '<pre>';
            var_dump($w);
            */
            // echo '<pre>';
            $chunk = array_chunk($cel, 5);
            $newArr = [];
            $n = 1;
            foreach ($chunk as $key => $v) {
                $x = $key + 1;
                foreach ($v as $i => $vv) {
                    $c = $i + 1;
                    $newArr["$n$c"] = $vv;
                    // var_dump("");
                    $x = 1;
                }
                $n++;
            }
            $cel = $newArr;
            $normal = $cel;

            // echo '<br>';
            // var_dump($normal);
            // echo '<br>';
            // var_dump($cel);
            // die;
            $data = [
                'baris'     => $baris,
                'kolom'     => $kolom,
                'w'         => $w,
                'cel'       => $cel,
                'normal'    => $normal,
                'options'   => $options,
                'session'   => $session
            ];
            echo view('hitung', $data);
        } else {
            $data = [
                'hasil' => $this->M_Alternatif->electre()
            ];
            echo view('Home', $data);
        }
    }
}