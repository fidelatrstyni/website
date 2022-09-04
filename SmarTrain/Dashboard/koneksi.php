<?php
	$namaHost = "localhost";
	$username = "root";
	$password = "";
	$dbase = "kereta_api";

	$connect = mysqli_connect($namaHost, $username, $password, $dbase) or die ("Koneksi Gagal !");

	/*if($connect){
		echo "Koneksi dengan MySQL Berhasil";
	}
	else{
		echo "Koneksi dengan MySQL Gagal" . mysqli_connect_error();
	}*/
?>