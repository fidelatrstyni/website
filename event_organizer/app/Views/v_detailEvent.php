 <!-- Main content -->
 <div class="content">
     <div class="container">

         <div class="row" style="margin-bottom:10px;margin-top:55px">
             <div class="col-lg">
                 <!-- Slider -->

                 <!-- <div class="splide">
                     <div class="splide__track">
                         <ul class="splide__list">
                             <?//php foreach ($splide as $key => $splid) {?>
                             <li class="splide__slide">
                                 <img src="<//?= base_url($splid)?>" />
                             </li>
                             <//?php } ?>
                         </ul>
                     </div>
                 </div> -->
             </div>
             <div class="row">
                 <div class="col-lg-12">
                     <div class="line" style="margin-top: 50px;">
                         <div class="content-detail box-content">
                             <h1><?= $dataEvent->nama_kategori?> </h1>
                             <p><?= $dataEvent->deskripsi?></p>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="line1" style="margin-top: 50px;">
                     <div class="row">
                         <div class="col-lg-6">
                             <div class="content-detail box-content">
                                 <h1><?= $dataEvent->nama_kategori?> </h1>
                                 <p><?= $dataEvent->deskripsi?></p>
                                 <!-- <a href="<?= base_url('Lokasi')?>" class="btn-detail shadow" style="display: inline-block;">BOOKING EVENT</a> -->
                                 <!-- <//?php if(!empty(isset($_SESSION['id_user']))){ ?>   
                                 <button class="btn-detail shadow" onclick="location.href='<?= base_url('Lokasi/pilihTempat/' . ($_SESSION['id_kategori']) )?>'">Booking Event</button>
                                <//?php }else{ ?>
                                    <button class="btn-detail shadow" onclick="location.href='<?= base_url('Login')?>'">Booking Event</button>
                                    <//?php } ?> -->
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="content-detail box-content">
                                 <img class="img-set" src="<?= base_url('upload/imgKategori/'.$dataEvent->gambar)?>" />
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-lg-12">
                 <section class="detail" id="detail" style="margin-bottom:50px">
                     <div class="content-detail box-content">
                         <h1>Detail Paket</h1>
                         <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam labore fugiat ut esse
                             perferendis </p>
                     </div>
                     <form action="<?= base_url('Lokasi')?>" method="post">
                         <div class="box-container">
                             <?php foreach($paket as $key => $value){?>
                             <input type="hidden" name="id_kategori" value="<?= $id_kategori?>">
                             <input type="hidden" name="id_paket" value="<?= $value['id_paket']?>">
                             <input type="hidden" name="kapasitas" value="<?= $value['kapasitas']?>">
                             <div class="box shadow">
                                 <h3 class="titles"><?= $value['nama_paket']?></h3>
                                 <!-- <h3 class="amount">IDR <?= $value['harga_paket']?></h3> -->
                                 <ul>
                                     <li>
                                         <h3>IDR <?= $value['harga_paket']?></h3>
                                     </li>
                                     <?php if($value['katering'] == 'Aktif'){?>
                                     <li><i class="fas fa-check"></i>Food and Drinks</li>
                                     <?php }else {?>
                                     <li><i class="fas fa-times"></i><s>Food and Drinks</s></li>
                                     <?php }?>
                                     <?php if($value['invitation'] == 'Aktif'){?>
                                     <li> <i class="fas fa-check"></i>Invitation Cart</li>
                                     <?php }else {?>
                                     <li><i class="fas fa-times"></i><s>Invitation Cart</s></li>
                                     <?php }?>
                                     <?php if($value['foto'] == 'Aktif'){?>
                                     <li> <i class="fas fa-check"></i>Music and Photos </li>
                                     <?php }else {?>
                                     <li><i class="fas fa-times"></i><s>Music and Photos</s></li>
                                     <?php }?>
                                     <li> <i class="fas fa-check"></i>Kapasitas <?= $value['kapasitas']?> </li>
                                 </ul>
                                 <?php if(!empty(isset($_SESSION['id_user']))){ ?>
                                 <button type="submit" class="btn-op shadow" style="border: none;">Pilih</button>
                                 <?php }else{ ?>
                                 <a href="<?= base_url('Login')?>" class="btn-op shadow" style="border: none;" >Pilih</a>
                                 <?php } ?>
                                 <!-- <button type="submit" class="btn-op shadow" style="border: none;">Pilih</button> -->
                                 <!-- <h6 href="#" class="btn-op shadow">Pilih</h6> -->
                             </div>
                             <?php } ?>


                             <!-- <div class="box shadow">
                             <h3 class="titles">For Concerts</h3>
                             <h3 class="amount">IDR 15.000.000</h3>
                             <ul>
                                 <li><i class="fas fa-check"></i>full services</li>
                                 <li> <i class="fas fa-check"></i> decorations </li>
                                 <li> <i class="fas fa-check"></i> music and photos </li>
                                 <li> <i class="fas fa-check"></i> food and drinks </li>
                                 <li> <i class="fas fa-check"></i> invitation card </li>
                             </ul>
                             <h6 href="#" class="btn-op shadow">Details</h6>
                         </div> -->
                         </div>
                     </form>
                 </section>
             </div>
         </div>
     </div>
     <!-- /.container-fluid -->
     <!-- /.content-wrapper -->
     <!-- Control Sidebar -->