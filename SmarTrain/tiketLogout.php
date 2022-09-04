<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>SEPURTRAIN</title>
  <link rel="stylesheet" type="text/css" href="assets/css/tiket.css">
  <link rel="stylesheet" href="assets/bootstrap-4.3.1-dist/css/bootstrap.css">
  <script type="text/javascript" src="assets/js/jquery-3.4.1.js"></script>
  <script type="text/javascript" src="assets/bootstrap-4.3.1-dist/js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="assets/css/box-search.css">
  <link rel="stylesheet" type="text/css" href="assets/css/box-seacrh-dua.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css" -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="styletabelTiket.css">
  <style>
    .Benefit {
      display: flex;
      justify-content: space-around;
    }

    .Benefit>a {
      display: block;
      position: relative;
      padding: 4px 12px;
      line-height: 24px;
      color: #434343 !important;
      font-weight: 500 !important;
      text-decoration: none !important;
    }

    .Benefit>a>img {
      vertical-align: middle;
      margin-right: 4px;
    }

    .Benefit>a>svg {
      position: absolute;
      top: 40%;
      right: -12px;
    }

    .row.content {
      height: auto
    }

    .content {
      height: 100%;
      float: left;
      margin-left: 100px;
      width: 80%;

    }

    .modal-header,
    h4,
    .close {
      background-color: #5cb85c;
      color: white !important;
      text-align: center;
      font-size: 30px;
    }

    .modal-footer {
      background-color: #f9f9f9;
      font-size: 20px;
    }
  </style>
</head>

<body style="background-color: azure">
  <div class="container-css">
  <div class="header" style="background-image: linear-gradient(#013440, #025059)">
      <ul class="pull-left">
        <li class="logo" class="li-left" style="margin-bottom: 5px;"><a href="index.html" class="class-a"><img
              alt="smarttrain" title="smarttrain" src="assets/img/logo.png"></a></li>
      </ul>
      <ul class="pull-left">
        <!--li class="logo" class="li-left" style="margin-bottom: 5px;"><a href="index.html" class="class-a"><img alt="smarttrain" title="smarttrain" src="assets/img/logo.png"></a></li-->
      </ul>
      <ul class="pull-right-css menu">
        <li style="margin-top: 10px;"><a href="indexLogout.html" class="class-a">HOME</a></li>
        <li style="margin-top: 10px;"><a href="tiketLogout.html" class="class-a">TICKET</a></li>
        <li style="margin-top: 10px;"><a href="servicesLogout.html" class="class-a">SERVICES</a></li>
        <li style="margin-top: 10px;"><a href="aboutusLogout.html" class="class-a">ABOUT US</a></li>
        <div class="li-right">
          <li id="myBtn" style="margin-bottom: 40px;"><a href="prosesLogout.php" class="class-a">LOGOUT</a></li>
        </div>
      </ul>
    </div>
  </div>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <h4 style="text-align: center"><span class="glyphicon glyphicon-lock">Login</h4></span>
          <button type="button" class="close" data-dismiss="modal">&times;</button>

        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form action="sessionLoginProses.php" method="POST" role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
              <input type="text" class="form-control" id="usrname" name="username" placeholder="Enter email" required>
            </div>
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
              <input type="password" class="form-control" id="psw" name="password" placeholder="Enter password"
                required>
            </div>
            <div class="checkbox">
              <label><input type="checkbox" value="" checked>
                <font style="size: 10px">Remember me
              </label>
            </div>
            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span>
              Login</button>
          </form>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
            <span class="glyphicon glyphicon-remove"></span> Cancel
          </button>
          <h6><a href="#">Not a member?Sign Up</a></h6>
          <h6><a href="#">Forgot Password?</a></h6>
        </div>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br><br>
  <div class="container-css">
    <!--div class="header"-->
    <img alt="TIKET KERETA-APIKU" title="Payment" src="assets/img/slider25.jpg" class="responsive"
      style="margin-left:0px; width: 300%; height: 500px" />
    <!--/div-->
  </div>
  <br><br><br><br>



<?php

include "koneksi.php";

$kereta = $_REQUEST['kereta'];
$kelas = $_REQUEST['kelas'];
$tgl = $_REQUEST['tgl'];
$asal = $_REQUEST['asal'];
$tujuan = $_REQUEST['tujuan'];

$search = "SELECT * FROM kereta WHERE nama_ka = '$kereta' AND kelas = '$kelas' AND tgl = '$tgl' AND asal = '$asal' AND ke = '$tujuan'";
$query = mysqli_query($connect, $search);
$cek = mysqli_num_rows($query);



if($cek > 0){
//echo 'Tiket Kosong ! <br> <a href="tiket.html"> Silakan Pilih Tiket Ulang</a>';


$_SESSION['tgl'] = $query;

      if($_SESSION['tgl'] = $tgl ){

            echo '<center><table class="table-tiket">
            <tr>
                <th>KERETA</th>
                <th>KELAS</th>
                <th>TANGGAL</th>
                <th>BERANGKAT</th>
                <th>TIBA</th>
                <th>ASAL</th>
                <th>TUJUAN</th>
                <th>HARGA</th>
                <th>ACTION</th>
            </tr>';
        
            while ($row = mysqli_fetch_array($query))
            {
            echo '<tr>
                <td align = "center">'.$row['nama_ka'].'</td>
                <td align = "center">'.$row['kelas'].'</td>
                <td align = "center">'.$row['tgl'].'</td>
                <td align = "center">'.$row['jam_berangkat'].'</td>
                <td align = "center">'.$row['jam_tiba'].'</td>
                <td align = "center">'.$row['asal'].'</td>
                <td align = "center">'.$row['ke'].'</td>
                <td align = "center">'.$row['harga'].'</td>
                <td align = "center"><a href="pemesanantiket.html"><button class="button-flat-outline">Pilih Tiket</a></button></td>
                </<tr></center></table>';
            }

      }else{
        echo '<br>Tiket Kosong ! <br> <a href="tiket.html"> Silakan Pilih Tiket Ulang</a>';
      }
}else { 
  echo mysqli_error($connect);
}

mysqli_close($connect);

?>



        <br><br>
        <div class="Benefit">
          <a href="">
            <img src="assets/img/1564480508487-bbd669f965c09225e0ddcacd8b11b543.svg" alt="PayLater"> PayLater
            <svg stroke-width="3" viewBox="0 0 16 16" stroke="#B4B4B4" height="8" width="8" class="_3eyFJ" fill="none"
              stroke-linecap="round">
              <g transform="translate(4.033325, 0.166667)">
                <path d="M7.33333333,7.33333333 L0.488888889,0.488888889"></path>
                <path d="M7.33333333,7.33333333 L0.488888889,14.1777778"></path>
              </g>
            </svg>
          </a>
          <a href="">
            <img src="assets/img/1564480510475-335b504ea896fe1b89fd25603c2b4ed6.svg" alt="Saldo UANGKU"> Saldo UANGKU
            <svg stroke-width="3" viewBox="0 0 16 16" stroke="#B4B4B4" height="8" width="8" class="_3eyFJ" fill="none"
              stroke-linecap="round">
              <g transform="translate(4.033325, 0.166667)">
                <path d="M7.33333333,7.33333333 L0.488888889,0.488888889"></path>
                <path d="M7.33333333,7.33333333 L0.488888889,14.1777778"></path>
              </g>
            </svg>
          </a>
          <a href="">
            <img src="assets/img/1564480512589-b9b8131954e914dcef4e5ab32a850bcd.svg" alt="Debit Instan"> Debit Instan
            <svg stroke-width="3" viewBox="0 0 16 16" stroke="#B4B4B4" height="8" width="8" class="_3eyFJ" fill="none"
              stroke-linecap="round">
              <g transform="translate(4.033325, 0.166667)">
                <path d="M7.33333333,7.33333333 L0.488888889,0.488888889"></path>
                <path d="M7.33333333,7.33333333 L0.488888889,14.1777778"></path>
              </g>
            </svg>
          </a>
          <a href="">
            <img src="assets/img/1564480514735-d2d767898bac6392ae13e2a07ac3760d.svg" alt="Kartu Saya"> Kartu Saya
            <svg stroke-width="3" viewBox="0 0 16 16" stroke="#B4B4B4" height="8" width="8" class="_3eyFJ" fill="none"
              stroke-linecap="round">
              <g transform="translate(4.033325, 0.166667)">
                <path d="M7.33333333,7.33333333 L0.488888889,0.488888889"></path>
                <path d="M7.33333333,7.33333333 L0.488888889,14.1777778"></path>
              </g>
            </svg>
          </a>
        </div>
      </div>
    </div>
  </div>

  <div class="clear"></div>
  <div class="footer">
    <div class="row">
      <div class="col-md-4">
        <h2 style="margin-right: 0px; color:deepskyblue">Hubungi Kami:</h2>
        <p style="text-align: justify; margin-left: 120px; color:white">08113-222989 (Hunting)</p>
        <p style="text-align: justify; margin-left: 120px; color:white">support@smarttrain.com</p>
      </div>
      <div class="col-md-4">
        <h2 style="margin-right: 0px; color:#FF7F50">Partner Pembayaran :</h2>
        <img alt="TIKET KERETA-APIKU" title="Payment" src="assets/img/partner-pembayaran.png" class="responsive"
          style="margin-left: 50px; width: 500px; height: 200px">
      </div>
      <div class="col-md-4">
        <h2 style="margin-right: 0px; color:#FF7F50;">Lokasi Kami: </h2>
        <p style="text-align: justify; margin-left: 120px; color:white">PT. SMART TRAIN KENCANA<br>
          Jl. Delta Raya Utara Kav. 49-51 Deltasari Baru, Waru Sidoarjo, Jawa Timur</p>
      </div>
      <div class="row">
        <div class="col-md-12">
          <br><br>
          <p style="margin-left: 450px; font-size: 20px;color:white;">&copy;Copyright SMART TRAIN 2019 Allright
            Reserved.</p>
        </div>
      </div>
    </div>
  </div>
  </div>

  <script>
    $(document).ready(function () {
      $("#myBtn").click(function () {
        $("#myModal").modal();
      });
    });
  </script>
</body>

</html>