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
<a hidden>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Hitung</title>
    </head>

    <body>
        <section class="main-content">
            <div class="container">
                <button class="btn btn-dark btn-block" type="button" data-toggle="collapse"
                    data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Step by Step
                </button>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <table class="table" border=1>
                            <tr>
                                <td></td>
                                <td>Fasilitas</td>
                                <td>Harga</td>
                                <td>Tahun</td>
                                <td>Jarak</td>
                                <td>Keamanan</td>
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
                                    <?= $w["1$k"] ?>
                                </td>
                                <?php else: ?>
                                <td>
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
								for($x=1;$x<=$baris;$x++){
									$hasil = $hasil + pow($normal["$x$k"],2);
								}	

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

			$c = $totCon/($baris*($baris-1));

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

                            </td>
                            <?php else: ?>
                            <td>
                                <?= $f["$i$k"]; ?>
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
						$totDes = $totDes + $descordance["$i$k"];						
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

                            </td>
                            <?php else: ?>
                            <td>
                                <?= $g["$i$k"]; ?>
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
                            <td>Rata2</td>
                        </tr>
                        <?php for($i=1;$i<=$baris;$i++): ?>
                        <tr>
                            <?php for($k=1;$k<=$baris+1;$k++): ?>
                            <?php 
							if($k <= $baris)
								$e1["$i$k"] = $concordance["$i$k"] * $descordance["$k$i"];
						?>
                            <?php if($i == $k): ?>
                            <td></td>
                            <?php elseif($k == $baris+1): ?>
                            <?php for($r=1;$r<=$baris;$r++): ?>
                            <?php $rata2 = $rata2 + $e1["$i$r"] ?>
                            <?php endfor; ?>
                            <?php $rata[$i-1] = $rata2/$baris ?>
                            <?php $rata2 = 0 ?>
                            <td>
                                <?= number_format($rata[$i-1],2) ?>
                            </td>
                            <?php else: ?>
                            <td><?= number_format($e1["$i$k"],2) ?></td>
                            <?php endif; ?>
                            <?php endfor; ?>
                        </tr>
                        <?php endfor; ?>
                    </table>
                </div>
            </div>
            <!-- INI UNTUK RANKING -->
            <?php $ranking = $rata ?>
            <?php if($options == 1): ?>
            <?php rsort($ranking) ?>
            <?php else: ?>
            <?php sort($ranking) ?>
            <?php endif ?>
            <table class="table table-bordered" border=1>
                <tr>
                    <th>RANKING</th>
                    <th>NAMA</th>
                    <th>NILAI</th>
                </tr>
                <?php 
				$sessionVals = [];
				for($i=0;$i<$baris;$i++): 
			?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td>
                        <?php for($k=0;$k<$baris;$k++): ?>
                        <?php 
								// echo '<pre>';
								// var_dump("rank", $ranking[$k]);
								// var_dump("rata", $rata[$i]);
								if($rata[$i] == $ranking[$k]){
								$sessionVals[] = $session->get('n')[$k];
								echo $session->get('n')[$k];
							} ?>
                        <?php endfor; ?>
                    </td>
                    <td><?= number_format($ranking[$i]/array_sum($ranking),2) ?></td>
                </tr>
                <?php 
				endfor; 
				set_session('result_ranking', $sessionVals);
			?>
            </table>
            <!--a href="hapus.php" class="btn btn-dark btn-block btn-lg active" role="button"
                aria-pressed="true">ULANGI</a-->
            </div>
            </div>
        </section>
    </body>

    </html>
</a>
<?php
//echo '<pre>';
//echo var_dump($session->get('result_ranking'));
//die;
redirectTo();
die;
?>