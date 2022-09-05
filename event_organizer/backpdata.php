<?php 
                                        // var_dump($disco);
                                        ?>
                                        <?php 
                                        $perkalian = $corco[0] * $disco[0];
                                        $jumlCor = count($corco);
                                        $perkalian = array();
                                        for ($i=0; $i < $jumlCor; $i++)
                                        {
                                            // for ($j=0; $j < $jumDis; $j++){
                                                $perkalian[$i] = $corco[$i] * $disco[$i];
                                                
                                            // }
                                            
                                            
                                        }
                                        // echo '<pre>';
                                        // for($i=0; $i < count($corco)):
                                        //     for($j=0; $j < count($disco)):
                                        //         $perkalian[] = $corco[$i] * $disco[$j];     
                                        //         $i++;
                                        //         $j++;
                                        //         endfor;
                                        //     endfor;
                                        // ;
                                        
                                        var_dump(sizeof($perkalian));
                                        ?>
batass
                                        <table class="table table-bordered" border=1>
                                        <?php for($i=0; $i <= 24; $i++): ?>
                                            <?php if($i % 5 == 0):?>
                                                <tr>
                                                </tr>
                                            <?php else: ?>
                                                <?php if($perkalian[$i] == 100): ?>
                                                    <td>kosong</td>
                                                <?php else: ?>
                                                    <td><?= $perkalian[$i]; ?></td>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            
                                            <?php endfor; ?>
                                        </table>	


                                        <input type="number" class="form-control"
                                                value="<?= $alternatif[0]['skor']?>" name="skor"
                                                placeholder="<?= $value['nama_kriteria']?>"
                                                <?= ($alternatif[0]['id_kriteria'] == $value['id_kriteria'] ? '' : 'hidden' )?>>


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