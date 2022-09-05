 <!-- Main content -->
 <div class="content">
     <div class="container">
         <h3 class="title">Make Your Party <a style="color:yellow">Memorable </a> <br> With <a
                 style="color:#3867d6">Khalila Enterprise </a> </h3>
         <div class="row" style="margin-bottom:10px">
             <div class="col-lg">
                 <!-- Slider -->

                    <div class="splide">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-1.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/wedding.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-3.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-4.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-3.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/mice.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/seminar.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/workshop.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/wedding.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-1.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-4.jpg')?>" />
                                </li>
                                <li class="splide__slide">
                                    <img src="<?= base_url('img/kategori/event-3.jpg')?>" />
                                </li>
                            </ul>
                        </div>
                    </div>
             </div>

             <!-- Gallery -->
             <div class="row">
                 <div class="col-lg-6">
                     <section class="gallery" id="gallery" style="margin-bottom:50px;margin-top:100px">

                         <h1 class="heading">Choose What <span> Celebration</span> You Want</h1>

                         <div class="box-container">

                             <?php foreach ($kategori as $key => $value) {?>
                                    <div class="box shadow">
                                          <img src="<?= base_url('upload/imgKategori/'.$value['gambar'])?>" alt="">
                                          <h3 class="title"><?= $value['nama_kategori']?></h3>
                                          <div class="icons">
                                                <h3 style="color:white"> <a href="DetailEvent/detailEvent/<?= $value['id_kategori'] ?>">Choose This</a> </h3>
                                          </div>
                                    </div>
                             <?php } ?>

                             <!--div class="box shadow">
                                 <img src="template/dist/img/slider/g-1.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-2.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-3.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-4.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-5.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-6.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-7.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-8.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div>

                             <div class="box shadow">
                                 <img src="template/dist/img/slider/g-9.jpg" alt="">
                                 <h3 class="title">photos and events</h3>
                                 <div class="icons">
                                     <h3 style="color:white"> <a href="">Details</a> </h3>
                                 </div>
                             </div!-->

                         </div>

                     </section>
                 </div>

             </div>
             <!-- /.row -->
         </div>
         <!-- /.container-fluid -->
     </div>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->
 <!-- Control Sidebar -->