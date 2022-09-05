 <!-- Main content -->
 <?php 
if(empty($alamat) && $status == true){
    echo "<script>
    alert('Lengkapi Alamat Anda Terlebih Dahulu !');
    window.location.href='Address';
    </script>";
} 
?>
 <div class="content">
     <div class="container">
         <h3 class="title">its time to <a style="color:yellow">celebrate!</a> <br>the best <a
                 style="color:#3867d6">Event Organizers </a> </h3>
         <div class="row" style="margin-bottom:10px">
             <div class="col-lg">
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
         </div>


         <!-- Service -->
         <div class="row">
             <div class="col-lg-6">
                 <section class="service" id="service" style="margin-bottom:50px">
                     <h1 class="heading"> Our <span> Services</span> </h1>
                     <div class="box-container">
                         <div class="box">
                             <i class="fas fa-map-marker-alt"></i>
                             <h3>Venue selection</h3>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
                         </div>

                         <div class="box">
                             <i class="fas fa-envelope"></i>
                             <h3>Invitation card</h3>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
                         </div>

                         <div class="box">
                             <i class="fas fa-music"></i>
                             <h3>Entertainment</h3>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
                         </div>

                         <div class="box">
                             <i class="fas fa-utensils"></i>
                             <h3>Food and Drinks</h3>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
                         </div>

                         <div class="box">
                             <i class="fas fa-photo-video"></i>
                             <h3>Photos and Videos</h3>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
                         </div>

                         <div class="box">
                             <i class="fas fa-birthday-cake"></i>
                             <h3>Custom Food</h3>
                             <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Porro, suscipit.</p>
                         </div>

                     </div>

                 </section>
                 <!-- /.col-md-6 -->
             </div>
             <!-- Gallery -->
             <div class="row">
                 <div class="col-lg-6">
                     <section class="gallery" id="gallery" style="margin-bottom:50px">

                         <h1 class="heading">Our <span>Gallery</span></h1>

                         <div class="box-container">

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/event-3.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/event-1.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/event-4.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/seminar.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/workshop.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/wedding.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/mice.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/event-4.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>

                             <div class="box shadow">
                                 <img src="<?= base_url('img/kategori/event-1.jpg')?>" alt="">
                                 <h3 class="title">photos and events</h3>

                             </div>


                         </div>

                     </section>
                     <!-- price section starts  -->
                     <div class="row">
                         <div class="col-lg-6">
                             <section class="price" id="price" style="margin-bottom:50px">

                                 <h1 class="heading-op"> our <span>price</span> </h1>

                                 <div class="box-container">

                                     <div class="box shadow">
                                         <h3 class="titles">For Birthdays</h3>
                                         <h3 class="amount">IDR 5.000.000</h3>
                                         <ul>
                                             <li><i class="fas fa-check"></i>full services</li>
                                             <li> <i class="fas fa-check"></i> decorations </li>
                                             <li> <i class="fas fa-check"></i> music and photos </li>
                                             <li> <i class="fas fa-check"></i> food and drinks </li>
                                             <li> <i class="fas fa-check"></i> invitation card </li>
                                         </ul>
                                         <h6 href="#" class="btn-op shadow">Details</h6>
                                     </div>

                                     <div class="box shadow">
                                         <h3 class="titles">For Weddings</h3>
                                         <h3 class="amount">IDR 8.000.000</h3>
                                         <ul>
                                             <li><i class="fas fa-check"></i>full services</li>
                                             <li> <i class="fas fa-check"></i> decorations </li>
                                             <li> <i class="fas fa-check"></i> music and photos </li>
                                             <li> <i class="fas fa-check"></i> food and drinks </li>
                                             <li> <i class="fas fa-check"></i> invitation card </li>
                                         </ul>
                                         <h6 href="#" class="btn-op shadow">Details</h6>
                                     </div>

                                     <div class="box shadow">
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
                                     </div>

                                     <div class="box shadow">
                                         <h3 class="titles">For Others</h3>
                                         <h3 class="amount">IDR 13.000.000</h3>
                                         <ul>
                                             <li><i class="fas fa-check"></i>full services</li>
                                             <li> <i class="fas fa-check"></i> decorations </li>
                                             <li> <i class="fas fa-check"></i> music and photos </li>
                                             <li> <i class="fas fa-check"></i> food and drinks </li>
                                             <li> <i class="fas fa-check"></i> invitation card </li>
                                         </ul>
                                         <h6 href="#" class="btn-op shadow">Details</h6>
                                     </div>

                                 </div>
                             </section>
                         </div>
                     </div>

                     <!-- price section ends -->
                 </div>
             </div>
             <!-- /.row -->
         </div><!-- /.container-fluid -->
     </div>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark">
     <!-- Control sidebar content goes here -->
 </aside>
 <!-- /.control-sidebar -->