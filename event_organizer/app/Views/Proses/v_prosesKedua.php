 <!-- Main content -->
 <div class="content">
     <div class="container">

         <div class="row" style="margin-bottom:10px;margin-top:55px">
             <div class="col-lg">
                 <!-- Slider -->

                
             </div>
             <div class="row">
                 <div class="col-lg-12">
                     <div class="line" style="margin-top: 50px;">
                         <div class="content-detail box-content">
                             <h1><?= $dataEvent[0]['nama']?> </h1>
                             
                             <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam labore fugiat ut esse
                                 perferendis perspiciatis provident dolores fuga in facilis culpa possimus, quia
                                 praesentium itaque, sapiente quasi harum rem asperiores.
                                 Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat vero expedita incidunt
                                 provident quibusdam aut odit, numquam nesciunt similique nisi.</p>

                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="line1" style="margin-top: 50px;">
                     <div class="row">
                         <h1 style="color: white; text-align:center">Location <?= $dataEvent[0]['nama']?></h1>
                         <div class="col-lg-6">
                             <div class="content-detail box-content">
                                 <img class="img-set" src="<?= base_url('upload/imgLokasi/'.$dataEvent[0]['gambar'])?>" />
                             </div>
                         </div>

                         <div class="col-lg-6">
                             <div class="content-detail box-content">
                                 <!-- <h1>Location <?= $dataEvent[0]['nama']?></h1> -->
                                 <div>
                                     <iframe src="<?= $dataEvent[0]['map'] ?>" width="500" height="350"
                                         style="border:0;" allowfullscreen="" loading="lazy"
                                         referrerpolicy="no-referrer-when-downgrade">
                                     </iframe>
                                 </div>
                                 <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam labore fugiat ut esse
                                     perferendis perspiciatis provident dolores fuga in facilis culpa possimus, quia
                                     praesentium itaque, sapiente quasi harum rem asperiores.
                                     Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugiat vero expedita
                                     incidunt provident quibusdam aut odit, numquam nesciunt similique nisi.</p>
                                 <h6 href="#" class="btn-detail shadow">Choose This</h6> -->
                             </div>
                         </div>

                     </div>
                 </div>
             </div>

             <div class="row">
                 <div class="line1" style="margin-top: 50px;">
                     <h2 align="center" style="color:white">Choose Booking Date For Your Event
                         
                     </h2>
                     <div class="row">
                         <div class="col-lg-7" style="margin-bottom: 50px;">
                             <section class="" style="margin-top: 50px;">


                                 <br />
                                 <div class="container">
                                     <div id="calendar" style="background-color: white;"></div>
                                 </div>

                             </section>
                         </div>
                         <div class="col-lg-5">
                             <div class="card" style="margin-top: 70px;">
                                 <div class="card-body" style="height: auto; background-color:#212428; ">
                                     <h1 class="card-det">How To Choose Booking Date </h1>
                                     <p class="det-text">With supporting text below as a natural lead-in to additional
                                         content.
                                         With supporting text below as a natural lead-in to additional content.
                                         With supporting text below as a natural lead-in to additional content.</p>

                                 </div>

                             </div>
                             <!-- <button class="btn-pesan shadow" onclick="location.href='<?= base_url('Dealing')?>'">Booking Now!</button> -->
                         </div>
                     </div>

                 </div>
             </div>
         </div>

     </div>
 </div>
 <!-- /.container-fluid -->
 <!-- /.content-wrapper -->
 <!-- Control Sidebar -->