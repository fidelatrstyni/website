<?php
	if(isset($_GET['nama']) AND isset($_GET['email']) AND isset($_GET['password'])AND isset($_GET['password2'])AND isset($_GET['alteremail'])AND isset($_GET['address'])AND isset($_GET['countr'])AND isset($_GET['citycode'])AND isset($_GET['phone'])AND isset($_GET['mphone'])AND isset($_GET['country'])AND isset($_GET['accept'])){
			$nama=$_GET['nama'];
			$email=$_GET['email'];
			$alteremail=$_GET['alteremail'];
			$password=$_GET['password'];
			$password2=$_GET['password2'];
			$address=$_GET['address'];
			$countr=$_GET['countr'];
			$citycode=$_GET['citycode'];
			$phone=$_GET['phone'];
			$mphone=$_GET['mphone'];
			$country=$_GET['country'];
			$accept=$_GET['accept'];
			$isi_form="&nama=$nama&email=$email&alteremail=$alteremail&address=$address&password=$password&countr=$countr&citycode=$citycode&phone=$phone&mphone=$mphone&country=$country&accept=$accept";
		}
		else{
			header("Location: Form_Soal3.php?error=variabel_belum_diset".$isi_form);
		}
		
		if(empty($nama)){
			header("Location: Form_Soal3.php?error=nama_kosong".$isi_form);
		}
		else if(empty($email)){
			header("Location: Form_Soal3.php?error=email_kosong".$isi_form);
		}
		else if(empty($alteremail)){
			header("Location: Form_Soal3.php?error=alteremail_kosong".$isi_form);
		}
		else if(empty($password)){
			header("Location: Form_Soal3.php?error=password_kosong".$isi_form);
		}
		else if(empty($password2)){
			header("Location: Form_Soal3.php?error=password2_kosong".$isi_form);
		}
		else if($password != $password2){
			header("Location: Form_Soal3.php?error=password_tidak_sama".$isi_form);
		}
		else if(empty($address)){
			header("Location: Form_Soal3.php?error=address_kosong".$isi_form);
		}
		else if(empty($countr)){
			header("Location: Form_Soal3.php?error=countr_kosong".$isi_form);
		}
		else if(empty($citycode)){
			header("Location: Form_Soal3.php?error=citycode_kosong".$isi_form);
		}
		else if(empty($phone)){
			header("Location: Form_Soal3.php?error=phone_kosong".$isi_form);
		}
		else if(empty($mphone)){
			header("Location: Form_Soal3.php?error=mphone_kosong".$isi_form);
		}
		else if(empty($country)){
			header("Location: Form_Soal3.php?error=country_kosong".$isi_form);
		}
		else if(empty($accept)){
			header("Location: Form_Soal3.php?error=ceklist_accept".$isi_form);
		}
		else{
			require ("Proses_Soal3.php");
		}
		
?>