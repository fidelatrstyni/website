<?php
		if(isset($_GET['email']) AND isset($_GET['password'])){
			$email=$_GET['email'];
			$password=$_GET['password'];
			$isi_form="&email=$email&password=$password";
		}
		else{
			header("Location: Login_Soal3.php?error=variabel_belum_diset".$isi_form);
		}
		
		if(empty($email)){
			header("Location: Login_Soal3.php?error=email_kosong".$isi_form);
		}
		else if(empty($email)){
			header("Location: Login_Soal3.php?error=nama_invalid".$isi_form);
		}
		else if(empty($password)){
			header("Location: Login_Soal3.php?error=password_kosong".$isi_form);
		}
		else{
			require ("Form_Soal3.php");
		}
?>