<?php 
	@session_start();

	/*var_dump($baris);
	echo '<pre>';
	var_dump($w);
	echo '<pre>';
	var_dump($cel);
	echo '<pre>';
	var_dump($normal);
	echo '<pre>';
	var_dump($options);
	die;*/

	$hasil = 0;
	$jumCon = 0;
	$jumDis = [];
	$totCon = 0;
	$totDes = 0;
	$rata2 = 0;
	$ranking = [];	

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $tittle?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('Electre/kriteria') ?>">Electre</a></li>
                        <li class="breadcrumb-item active">Kriteria</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- card header -->
                    <div class="card text-center">
                        <div class="card-header">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre/kriteria') ?>">Kriteria</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre/alternatif') ?>">Alternatif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre/matriks') ?>">Nilai Matriks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?= base_url('Electre') ?>">Hasil Electre</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="<?= base_url('Electre/form') ?>">Hasil Electre Form</a>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card" style="text-align: center;">
                                    <div class="card-body">
                                        <h5 class="card-title">Form Electre</h5>

                                        <p class="card-text">
                                        <form action="<?= base_url('ElectreCari')?>" method="post">
                                            <label for="kapasitas">Pilih Kapasitas</label>
                                            <select name="kapasitas" class="browser-default custom-select">
                                                <option value="" <?= ($kapasitas == '' ? 'selected' : '')?>>Semua</option>
                                                <option value="Lebih Dari 1500" <?= ($kapasitas == 'Lebih Dari 1500' ? 'selected' : '')?>>
                                                    Lebih Dari 1500</option>
                                                <option value="Kurang dari 1500" <?= ($kapasitas == 'Kurang dari 1500' ? 'selected' : '')?>>Kurang dari 1500
                                                </option>
                                                <option value="Kurang Dari 500" <?= ($kapasitas == 'Kurang Dari 500' ? 'selected' : '')?>>
                                                    Kurang Dari 500</option>
                                            </select>

                                            <label for="kapasitas">Pilih Lokasi</label>
                                            <select name="lokasi" class="browser-default custom-select">
                                                <option value="" <?= ($lokasi == '' ? 'selected' : '')?>>Semua</option>
                                                <option value="Malang" <?= ($lokasi == 'Malang' ? 'selected' : '')?>>
                                                    Malang</option>
                                                <option value="Sidoarjo"
                                                    <?= ($lokasi == 'Sidoarjo' ? 'selected' : '')?>>Sidoarjo
                                                </option>
                                                <option value="Surabaya"
                                                    <?= ($lokasi == 'Surabaya' ? 'selected' : '')?>>Surabaya
                                                </option>
                                                <option value="Batu" <?= ($lokasi == 'Batu' ? 'selected' : '')?>>Batu
                                                </option>
                                            </select>
                                            </p>

                                            <input type="submit" value="Cari">

                                            <input type="reset" value="Reset">

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="card" style="text-align: center;">
                                    <div class="card-body">
                                        <h5 class="card-title">Hasil Electre</h5>

                                        <p class="card-text">

                                        <section class="main-content">
                                            <div class="container">
                                                <button class="btn btn-dark btn-block" type="button"
                                                    data-toggle="collapse" data-target="#collapseExample"
                                                    aria-expanded="false" aria-controls="collapseExample">
                                                    Step by Step
                                                </button>
                                                <br>

                                                <div class="collapse" id="collapseExample">
                                                    <div class="card card-body">
                                                        <label for="hitung">Hitung</label>
                                                        <table class="table" border=1>
                                                            <tr>
                                                                <td></td>
                                                                <?php foreach($kriteria as $key => $ktr){?>
                                                                <td><?= $ktr['nama_kriteria']?></td>
                                                                <?php }?>
                                                            </tr>
                                                            <?php
                                                            // echo '<pre>';
                                                            // var_dump($normal);
                                                            // die;
                                                            ?>
                                                            <?php for($i=1;$i<=$baris+1;$i++): ?>
                                                            <tr>
                                                                <?php for($k=0;$k<=5;$k++): ?>
                                                                <?php if($i==$baris+1 && $k==0): ?>
                                                                <td>
                                                                    BOBOT
                                                                </td>
                                                                <?php elseif($k==0): ?>
                                                                <td>
                                                                    <?= $session->get('n')[$i-1]; ?>
                                                                </td>
                                                                <?php elseif($i==$baris+1): ?>
                                                                <td>
                                                                    <!-- menampilkan bobot -->
                                                                    <?=  $w["1$k"] ?>
                                                                </td>
                                                                <?php else: ?>
                                                                <td>
                                                                    <!-- nilai matriks -->
                                                                    <?= $cel["$i$k"] ?>
                                                    </div>
                                                    </td>
                                                    <?php endif; ?>
                                                    <?php endfor; ?>
                                                    </tr>
                                                    <?php endfor; ?>
                                                    </table>

                                                    <h2 class="text-center">NORMALISASI</h2>
                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$kolom;$k++): ?>
                                                            <?php
                                                            // pow = quadrat
                                                                for($x=1;$x<=$baris;$x++){
                                                                    $hasil = $hasil + pow($normal["$x$k"],2);
                                                                }	
                                                            // sqrt = akar
                                                                $normalisasi["$i$k"] = $normal["$i$k"]/sqrt($hasil);
                                                                $hasil = 0;
                                                            ?>
                                                            <td>
                                                                <?= number_format($normalisasi["$i$k"],2) ?>
                                                            </td>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h2 class="text-center">PEMBOBOTAN</h2>
                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$kolom;$k++): ?>
                                                            <?php 
                                                                $bobot["$i$k"] = $normalisasi["$i$k"] * $w["1$k"];
                                                            ?>
                                                            <td>
                                                                <?= number_format($bobot["$i$k"],2) ?>
                                                            </td>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h2 class="text-center">Himp. Con dan Dis</h2>
                                                    <h3>Concordance</h3>
                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$baris;$k++): ?>
                                                            <?php 
                                                                for($cek=1;$cek<=$kolom;$cek++){
                                                                    if($bobot["$i$cek"] >= $bobot["$k$cek"]){
                                                                        $jumCon = $jumCon + $w["1$cek"];
                                                                    }											
                                                                }
                                                                $concordance["$i$k"] = $jumCon;
                                                                $jumCon = 0;
                                                            ?>
                                                            <?php if($k==$i):?>
                                                            <td>

                                                            </td>
                                                            <?php else: ?>
                                                            <td>
                                                                <?= number_format($concordance["$i$k"],2) ?>
                                                            </td>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h3>Discordance</h3>
                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$baris;$k++): ?>
                                                            <?php 
                                                                for($cek=1;$cek<=$kolom;$cek++){
                                                                    if($bobot["$i$cek"] < $bobot["$k$cek"]){
                                                                        $jumDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                                                                    }									
                                                                    else{
                                                                        $jumDis["$i$cek"] = 0;
                                                                    }	
                                                                    //Pembagi Discordance
                                                                    $totDis["$i$cek"] = abs($bobot["$i$cek"] - $bobot["$k$cek"]);
                                                                }
                                                                    $atasDes = max($jumDis);
                                                                    $bawahDes = max($totDis);
                                                                    $jumDis = [];
                                                                    $totDis = [];
                                                                    
                                                                    if($bawahDes != 0){
                                                                        $descordance["$i$k"] = $atasDes/$bawahDes;
                                                                    }
                                                                    else{
                                                                        $descordance["$i$k"] = 0;
                                                                    }								
                                                            ?>
                                                            <?php if($k==$i):?>
                                                            <td>
                                                            </td>
                                                            <?php else: ?>
                                                            <td>
                                                                <?= number_format($descordance["$i$k"],2) ?>
                                                            </td>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h2 class="text-center">NILAI DOMINAN</h2>
                                                    <h3>Concordance</h3>
                                                    <?php  			
                                                        for($i=1;$i<=$baris;$i++){
                                                            for($k=1;$k<=$baris;$k++){
                                                                if($i != $k){
                                                                    $totCon = $totCon + $concordance["$i$k"];						
                                                                }
                                                            }							
                                                        }			

                                                        // echo 'iki' ; var_dump($totCon);
                                                        $c = $totCon/($baris*($baris-1));
                                                        // echo 'oo' ; var_dump($c);

                                                        echo "Nilai Threshold (C) = " . number_format($c,2);
                                                    ?>

                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$baris;$k++): ?>
                                                            <?php 
                                                                for($cek=1;$cek<=$baris;$cek++){
                                                                    if($concordance["$i$cek"] >= $c){
                                                                        $f["$i$cek"] = 1;
                                                                    }			
                                                                    else{
                                                                        $f["$i$cek"] = 0;
                                                                    }								
                                                                }							
                                                            ?>
                                                            <?php if($k==$i):?>
                                                            <td>
                                                                <?php 
                                                                // $corco[] = 10
                                                                // echo $k;
                                                                ?>
                                                            </td>
                                                            <?php else: ?>
                                                            <td>
                                                                <?= $f["$i$k"]; ?>
                                                                <?php $corco[$i][$k] = $f["$i$k"] ?>
                                                            </td>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h3>Discordance</h3>
                                                    <?php  			
                                                        for($i=1;$i<=$baris;$i++){
                                                            for($k=1;$k<=$baris;$k++){
                                                                if($i != $k){
                                                                    
                                                                    echo number_format($descordance["$i$k"],2);
                                                                    // $totDes = $totDes + $descordance["$i$k"];
                                                                    $totDes = $totDes + number_format($descordance["$i$k"],2);						
                                                                }
                                                            }							
                                                        }			
                                            
                                                        $d = $totDes/($baris*($baris-1));
                                            
                                                        echo "Nilai Threshold (D) = " . number_format($d,2);
                                                    ?>

                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$baris;$k++): ?>
                                                            <?php
                                                                for($cek=1;$cek<=$baris;$cek++){
                                                                    if($descordance["$i$cek"] >= $d){
                                                                        $g["$i$cek"] = 1;
                                                                    }			
                                                                    else{
                                                                        $g["$i$cek"] = 0;
                                                                    }								
                                                                }							
                                                            ?>
                                                            <?php if($k==$i):?>
                                                            <td>
                                                                <?php
                                                                //  echo $k;
                                                                // $disco[] = 10 
                                                                ?>
                                                            </td>
                                                            <?php else: ?>
                                                            <td>
                                                                <?= $g["$i$k"]; ?>
                                                                <?php $disco[$i][$k] = $g["$i$k"] ?>
                                                            </td>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h2 class="text-center">Aggregate Dominance Matrix</h2>
                                                    <h3>Threshold</h3>
                                                    <table class="table table-bordered" border=1>
                                                        <?php for($i=1;$i<=$baris;$i++): ?>
                                                        <tr>
                                                            <?php for($k=1;$k<=$baris;$k++): ?>
                                                            <?php
                                                                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];
                                                            ?>
                                                            <?php if($i == $k): ?>
                                                            <td></td>
                                                            <?php else: ?>
                                                            <td><?= $e["$i$k"]; ?></td>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <h3>Tanpa Threshold</h3>
                                                    <table class="table table-bordered" border=1>
                                                        <tr>
                                                            <td colspan="<?= $baris; ?>"></td>
                                                            <td>Hasil</td>
                                                        </tr>
                                                        <?php 
                                                            $arrRank = [];
                                                            for($i=1;$i<=$baris;$i++): 
                                                        ?>
                                                        <tr>
                                                            <!-- <td>Nama</td> -->
                                                            <?php 
                                                                $counter = 0;
                                                                for($k=1;$k<=$baris;$k++): 
                                                            ?>
                                                            <?php
                                                                $e["$i$k"] = $f["$i$k"] * $g["$k$i"];
                                                            ?>
                                                            <?php if($i == $k): ?>
                                                            <td></td>
                                                            <?php else: ?>
                                                            <td><?= $resCol = $corco[$i][$k] * $disco[$i][$k]; ?></td>
                                                            <?php 
                                                                if ($resCol == 1) {
                                                                    $counter++;
                                                                }
                                                            ?>
                                                            <?php endif; ?>
                                                            <?php endfor; ?>
                                                            <td><?= $counter; ?></td>
                                                            <?php
                                                                $arrRank[] = [
                                                                    'row' => $i,
                                                                    'freq' => $counter
                                                                ];
                                                            ?>
                                                        </tr>
                                                        <?php endfor; ?>
                                                    </table>

                                                    <br>
                                                    <h3>Ranking</h3>
                                                    <table class="table table-bordered" border=1
                                                        style="margin-top:40px;">
                                                        <tr>
                                                            <th>Ranking</th>
                                                            <th>Nama</th>
                                                            <th>Nilai</th>
                                                        </tr>
                                                        <?php
                                                        // unsort = mengurutkan array multidimensi
                                                            usort($arrRank, function($a, $b) {
                                                                return $a['freq'] < $b['freq'];
                                                            });
                                                            // range = artinya array 1- sejumlah n
                                                            // n = jumlah array rank ($arrRank)
                                                            // echo '<pre>';
                                                            foreach (range(1, count($arrRank)) as $key => $value):
                                                        ?>
                                                        <tr>
                                                            <td><?= $value; ?></td>
                                                            <td><?= $session->get('n')[$arrRank[$key]['row']-1] ?></td>
                                                            <td><?= $arrRank[$key]['freq'] ?></td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    </table>
                                                </div>
                                            </div>
                                            </table>
                                            <!--a href="hapus.php" class="btn btn-dark btn-block btn-lg active" role="button"
                aria-pressed="true">ULANGI</a-->
                                    </div>
                                </div>
                                </section>


                                </p>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>

                </div>
                <!-- /.col-md-6 -->

                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

</div>

</div>