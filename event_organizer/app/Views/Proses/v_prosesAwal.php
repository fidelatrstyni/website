 <!-- Main content -->
 <div class="content">
     <div class="container">
         <!-- <h3 class="title"> <a style="color:yellow"> The Best </a> Recommendation For You</h3> -->
         <div class="row" style="margin-bottom:10px;margin-top:100px">
             <div class="col-lg-3">
                 <section class="sidebar shadow">
                     <div class="headingbk">
                         <h2>Choose</h2>
                     </div>

                     <form action="<?= base_url('Lokasi/cariLokasi') ?>" method="post">

                         <input type="hidden" name="tema2" value="<?= $_SESSION['tema2'] ?>" />

                         <div class="collapsible">
                             <h4 class="ttl-sidebar">Lokasi</h4>
                             <div class="control-group">
                                 <label class="control control--checkbox">Malang
                                     <input type="checkbox" name="lokasi" value="Malang"
                                         <?= ($lokasi == 'Malang' ? 'checked' : '') ?> />
                                     <div class="control__indicator"></div>
                                 </label>
                                 <label class="control control--checkbox">Sidoarjo
                                     <input type="checkbox" name="lokasi" value="Sidoarjo"
                                         <?= ($lokasi == 'Sidoarjo' ? 'checked' : '') ?> />
                                     <div class="control__indicator"></div>
                                 </label>
                                 <label class="control control--checkbox">Surabaya
                                     <input type="checkbox" name="lokasi" value="Surabaya"
                                         <?= ($lokasi == 'Surabaya' ? 'checked' : '') ?> />
                                     <div class="control__indicator"></div>
                                 </label>
                             </div>
                             <!-- <h4 class="ttl-sidebar">Jarak dari Pusat Kota</h4>
                             <div class="control-group">
                                 <label class="control control--checkbox"> 3km-5km
                                     <input type="checkbox" name="jarak" value="4" />
                                     <div class="control__indicator"></div>
                                 </label>
                                 <label class="control control--checkbox">5km-10km
                                     <input type="checkbox" name="jarak" value="3" />
                                     <div class="control__indicator"></div>
                                 </label>
                                 <label class="control control--checkbox"> Lebih dari 10km
                                     <input type="checkbox" name="jarak" value="2" />
                                     <div class="control__indicator"></div>
                                 </label>
                             </div> -->
                             <div>
                                 <input type="submit" name="submit" value="Submit" />
                             </div>
                         </div>
                     </form>
                 </section>
             </div>
             <div class="col-lg-6">
                 <!-- <section class="result shadow">
                     <div class="category-tab ">
                         <div class="tab-navigator">
                             <button class="btn-tab">
                                 <div class="txt-tab"><a href="<?= base_url('Lokasi') ?>" style="color: white;">Semua
                                     </a></div>
                             </button>
                             <button class="btn-tab">
                                 <div class="txt-tab-2">
                                     <a href="<?= base_url('Lokasi/cariTema/Gedung') ?>"
                                         style="color: white;">Gedung</a>
                                 </div>
                             </button>
                             <button class="btn-tab">
                                 <div class="txt-tab-2">
                                     <a href="<?= base_url('Lokasi/cariTema/Taman') ?>" style="color: white;">Taman
                                     </a>
                                 </div>
                             </button>
                             <button class="btn-tab">
                                 <div class="txt-tab-2"><a href="<?= base_url('Lokasi/cariTema/Pantai') ?>"
                                         style="color: white;">Pantai</a>
                                 </div>
                             </button>
                             <button class="btn-tab">
                                 <div class="txt-tab-2">
                                     <a href="<?= base_url('Lokasi/cariTema/Hutan') ?>" style="color: white;">Hutan
                                     </a>
                                 </div>
                             </button>
                             </li>
                             </ul>
                         </div>
                     </div>
                 </section> -->

                 <?php if ($alternatif2 != '') { ?>
                 <h2 style="color:white;"> Recommendation For You</h2>

                 <div class="row">
                     <div class="col-lg-6">
                         <section class="rekom" id="rekom" style="margin-bottom:50px">

                             <div class="box-container">

                                 <?php 
                                    //  var_dump($alternatif2[0]);
                                    //  die;
                                     foreach ($alternatif2 as $key => $alter2) { ?>
                                 <form action="<?= base_url('DetailLokasi/detailEvent') ?>" method="post">
                                     <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
                                     <input type="hidden" name="id_paket" value="<?= $id_paket ?>">
                                     <input type="hidden" name="id_tempat" value="<?= $alter2['id_tempat'] ?>">
                                     <div class="box shadow">
                                         <a
                                             href="<?= base_url('DetailLokasi/detailEvent/' . $alter2['id_tempat'] . '/' . $_SESSION['id_kategori']) ?>">
                                             <img style="height: 300px; width: 500px;"
                                                 src=" <?= (empty($alter2['gambar']) ? base_url('uploads/profil/placeholderprofil.png') : base_url('upload/imgLokasi/' . $alter2['gambar'])) ?>">
                                         </a>
                                         <h3 class="title"><?= $alter2['nama'] ?></h3>


                                         <div class="icons">
                                             <div class="location-rating-wrapper">
                                                 <span class="loc-city">
                                                     <h6 style="color:white"><?= $alter2['kota'] ?></h6>
                                                 </span>
                                             </div>

                                             <div class="price-info">
                                                 <span class="price-amount">Rp.
                                                     <?= format_number($alter2['harga']) ?></span>
                                             </div>

                                             <div>
                                                 <button type="submit" class="btn-primary" style="border: none;">Pilih
                                                     Lokasi</button>
                                             </div>

                                         </div>
                                     </div>
                                 </form>
                                 <?php } ?>

                             </div>

                         </section>
                     </div>

                 </div>

                 <?php } ?>
                 <h2 style="color:white;"> Others Location</h2>
                 <div class="row">
                     <div class="col-lg-6">
                         <section class="rekom" id="rekom" style="margin-bottom:50px">

                             <div class="box-container">

                                 <?php foreach ($alternatif as $key => $alter) { ?>
                                 <form action="<?= base_url('DetailLokasi/detailEvent') ?>" method="post">
                                     <input type="hidden" name="id_kategori" value="<?= $id_kategori ?>">
                                     <input type="hidden" name="id_paket" value="<?= $id_paket ?>">
                                     <input type="hidden" name="id_tempat" value="<?= $alter['id_tempat'] ?>">
                                     <div class="box shadow">
                                         <a href="<?= base_url('DetailLokasi/detailEvent/' . $alter['id_tempat']) ?>">
                                             <img style="height: 300px; width: 500px;"
                                                 src=" <?= (empty($alter['gambar']) ? base_url('uploads/profil/placeholderprofil.png') : base_url('upload/imgLokasi/' . $alter['gambar'])) ?>">
                                         </a>
                                         <h3 class="title"><?= $alter['nama'] ?></h3>

                                         <div class="icons">
                                             <!-- <h2 style="color:white"><?= $alter['kota'] ?></h2> -->
                                             <div class="location-rating-wrapper">
                                                 <span class="loc-city">
                                                     <h6 style="color:white"><?= $alter['kota'] ?></h6>
                                                 </span>
                                             </div>

                                             <div class="price-info">
                                                 <span class="price-amount">Rp.
                                                     <?= format_number($alter['harga'])?></span>
                                             </div>

                                             <div>
                                                 <button type="submit" class="btn-primary" style="border: none;">Pilih
                                                     Lokasi</button>
                                             </div>


                                         </div>
                                     </div>
                                 </form>
                                 <?php } ?>

                             </div>


                         </section>
                     </div>

                 </div>

                 <!--div class="row">
                     <div class="col-lg-6">
                         <div class="grid-container ">
                             <div class="grid ">
                                 <div class="grid-row">
                                     <div class="product-card  shadow">
                                         <a href="/to-do/marvel-studios-a-universe-of-heroes-exhibition-indonesia">
                                             <div class="image-ratio image-ratio--product-card">
                                                 <img alt="MARVEL STUDIOS : A UNIVERSE OF HEROES EXHIBITION INDONESIA"
                                                     src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit621414gsm/events/2022/04/29/c04b3be4-3829-41bc-8888-a1767e118247-1651202778938-3f9209ad205c4114ed33478accf91926.jpeg">
                                             </div>
                                             <div class="body">
                                                 <h2 class="product-name">MARVEL STUDIOS : A UNIVERSE OF
                                                     HEROES
                                                     EXHIBITION INDONESIA</h2>
                                                 <div class="location-rating-wrapper">
                                                     <span class="loc-product">Jakarta Selatan</span>
                                                 </div>
                                                 <div class="loc-date">
                                                     <div class="availability-container">
                                                         <span class="availability-date">21 Mei 22 - 03
                                                             Sep
                                                             22</span>
                                                     </div>
                                                 </div>
                                                 <div class="footer">
                                                     <div class="price-info">
                                                         <span class="amount">IDR 101.100</span>
                                                     </div>
                                                     <span class="date">
                                                         <span class="ticket-available-now">Tiket
                                                             tersedia
                                                             sekarang</span>
                                                     </span>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                     <div class="product-card shadow">
                                         <a href="/to-do/marvel-studios-a-universe-of-heroes-exhibition-indonesia">
                                             <div class="image-ratio image-ratio--product-card">
                                                 <img alt="MARVEL STUDIOS : A UNIVERSE OF HEROES EXHIBITION INDONESIA"
                                                     src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit621414gsm/events/2022/04/29/c04b3be4-3829-41bc-8888-a1767e118247-1651202778938-3f9209ad205c4114ed33478accf91926.jpeg">
                                             </div>
                                             <div class="body">
                                                 <h2 class="product-name">MARVEL STUDIOS : A UNIVERSE OF
                                                     HEROES
                                                     EXHIBITION INDONESIA</h2>
                                                 <div class="location-rating-wrapper">
                                                     <span class="loc-product">Jakarta Selatan</span>
                                                 </div>
                                                 <div class="loc-date">
                                                     <div class="availability-container">
                                                         <span class="availability-date">21 Mei 22 - 03
                                                             Sep
                                                             22</span>
                                                     </div>
                                                 </div>
                                                 <div class="footer">
                                                     <div class="price-info">
                                                         <span class="amount">IDR 101.100</span>
                                                     </div>
                                                     <span class="date">
                                                         <span class="ticket-available-now">Tiket
                                                             tersedia
                                                             sekarang</span>
                                                     </span>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                     <div class="product-card  shadow">
                                         <a href="/to-do/marvel-studios-a-universe-of-heroes-exhibition-indonesia">
                                             <div class="image-ratio image-ratio--product-card">
                                                 <img alt="MARVEL STUDIOS : A UNIVERSE OF HEROES EXHIBITION INDONESIA"
                                                     src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit621414gsm/events/2022/04/29/c04b3be4-3829-41bc-8888-a1767e118247-1651202778938-3f9209ad205c4114ed33478accf91926.jpeg">
                                             </div>
                                             <div class="body">
                                                 <h2 class="product-name">MARVEL STUDIOS : A UNIVERSE OF
                                                     HEROES
                                                     EXHIBITION INDONESIA</h2>
                                                 <div class="location-rating-wrapper">
                                                     <span class="loc-product">Jakarta Selatan</span>
                                                 </div>
                                                 <div class="loc-date">
                                                     <div class="availability-container">
                                                         <span class="availability-date">21 Mei 22 - 03
                                                             Sep
                                                             22</span>
                                                     </div>
                                                 </div>
                                                 <div class="footer">
                                                     <div class="price-info">
                                                         <span class="amount">IDR 101.100</span>
                                                     </div>
                                                     <span class="date">
                                                         <span class="ticket-available-now">Tiket
                                                             tersedia
                                                             sekarang</span>
                                                     </span>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>

                                 </div>
                                 <div class="grid-row">
                                     <div class="product-card  shadow">
                                         <a href="/to-do/marvel-studios-a-universe-of-heroes-exhibition-indonesia">
                                             <div class="image-ratio image-ratio--product-card">
                                                 <img alt="MARVEL STUDIOS : A UNIVERSE OF HEROES EXHIBITION INDONESIA"
                                                     src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit621414gsm/events/2022/04/29/c04b3be4-3829-41bc-8888-a1767e118247-1651202778938-3f9209ad205c4114ed33478accf91926.jpeg">
                                             </div>
                                             <div class="body">
                                                 <h2 class="product-name">MARVEL STUDIOS : A UNIVERSE OF
                                                     HEROES
                                                     EXHIBITION INDONESIA</h2>
                                                 <div class="location-rating-wrapper">
                                                     <span class="loc-product">Jakarta Selatan</span>
                                                 </div>
                                                 <div class="loc-date">
                                                     <div class="availability-container">
                                                         <span class="availability-date">21 Mei 22 - 03
                                                             Sep
                                                             22</span>
                                                     </div>
                                                 </div>
                                                 <div class="footer">
                                                     <div class="price-info">
                                                         <span class="amount">IDR 101.100</span>
                                                     </div>
                                                     <span class="date">
                                                         <span class="ticket-available-now">Tiket
                                                             tersedia
                                                             sekarang</span>
                                                     </span>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                     <div class="product-card  shadow">
                                         <a href="/to-do/marvel-studios-a-universe-of-heroes-exhibition-indonesia">
                                             <div class="image-ratio image-ratio--product-card">
                                                 <img alt="MARVEL STUDIOS : A UNIVERSE OF HEROES EXHIBITION INDONESIA"
                                                     src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit621414gsm/events/2022/04/29/c04b3be4-3829-41bc-8888-a1767e118247-1651202778938-3f9209ad205c4114ed33478accf91926.jpeg">
                                             </div>
                                             <div class="body">
                                                 <h2 class="product-name">MARVEL STUDIOS : A UNIVERSE OF
                                                     HEROES
                                                     EXHIBITION INDONESIA</h2>
                                                 <div class="location-rating-wrapper">
                                                     <span class="loc-product">Jakarta Selatan</span>
                                                 </div>
                                                 <div class="loc-date">
                                                     <div class="availability-container">
                                                         <span class="availability-date">21 Mei 22 - 03
                                                             Sep
                                                             22</span>
                                                     </div>
                                                 </div>
                                                 <div class="footer">
                                                     <div class="price-info">
                                                         <span class="amount">IDR 101.100</span>
                                                     </div>
                                                     <span class="date">
                                                         <span class="ticket-available-now">Tiket
                                                             tersedia
                                                             sekarang</span>
                                                     </span>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>
                                     <div class="product-card  shadow">
                                         <a href="/to-do/marvel-studios-a-universe-of-heroes-exhibition-indonesia">
                                             <div class="image-ratio image-ratio--product-card">
                                                 <img alt="MARVEL STUDIOS : A UNIVERSE OF HEROES EXHIBITION INDONESIA"
                                                     src="https://s-light.tiket.photos/t/01E25EBZS3W0FY9GTG6C42E1SE/rsfit621414gsm/events/2022/04/29/c04b3be4-3829-41bc-8888-a1767e118247-1651202778938-3f9209ad205c4114ed33478accf91926.jpeg">
                                             </div>
                                             <div class="body">
                                                 <h2 class="product-name">MARVEL STUDIOS : A UNIVERSE OF
                                                     HEROES
                                                     EXHIBITION INDONESIA</h2>
                                                 <div class="location-rating-wrapper">
                                                     <span class="loc-product">Jakarta Selatan</span>
                                                 </div>
                                                 <div class="loc-date">
                                                     <div class="availability-container">
                                                         <span class="availability-date">21 Mei 22 - 03
                                                             Sep
                                                             22</span>
                                                     </div>
                                                 </div>
                                                 <div class="footer">
                                                     <div class="price-info">
                                                         <span class="amount">IDR 101.100</span>
                                                     </div>
                                                     <span class="date">
                                                         <span class="ticket-available-now">Tiket
                                                             tersedia
                                                             sekarang</span>
                                                     </span>
                                                 </div>
                                             </div>
                                         </a>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </div>

                     <div class="row">
                         <div class="col-lg-6">

                             <div class="row">
                                 <div class="col-lg-6">

                                 </div>
                             </div>

                         </div>
                     </div>

                 </div-->
             </div>
         </div>

         <div class="row">
             <div class="col-lg-6">

             </div>

             <div class="row">
                 <div class="col-lg-6">

                     <div class="row">
                         <div class="col-lg-6">

                         </div>
                     </div>

                 </div>
             </div>

         </div>
     </div>

 </div>