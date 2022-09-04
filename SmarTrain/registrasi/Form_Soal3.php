<!--?php
	if(isset($_GET['email']) AND isset($_GET['password'])){
			$email=$_GET['email'];
			$password=$_GET['password'];
			$isi_form="&email=$email&password=$password";
		}
		else{
			header("Location: Login_Soal3.php?error=variabel_belum_diset");
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
			echo "E-mail : $email <br> Password : $password";
		}
?-->

<html>
	<head>
	<title>Register</title>
	</head>
	<link rel="stylesheet" type="text/css" href="soal3css.css">
	<body>
	<?php
		if(isset($_GET['error'])){
			$error = $_GET['error'];
		}
		else{
			$error = "";
		}
		
		$pesan = "";
		if ($error=="variabel_belum_diset"){
			$pesan = "Anda harus mengakses halaman ini dari form_3.php";
		}
		else if($error=="nama_kosong"){
			$pesan = "Nama harus diisi";
		}
		else if ($error=="email_kosong"){
			$pesan = "Email harus diisi";
		}
		else if ($error=="password_kosong"){
			$pesan="password harus diisi";
		}
		else if ($error=="password2_kosong"){
			$pesan="password harus diisi";
		}
		else if ($error=="password_tidak_sama"){
			$pesan="password tidak sama";
		}
		else if($error=="alteremail_kosong"){
			$pesan = "Alternatif Email harus diisi";
		}
		else if($error=="address_kosong"){
			$pesan = "address harus diisi";
		}
		else if($error=="countr_kosong"){
			$pesan = "countr harus diisi";
		}
		else if($error=="citycode_kosong"){
			$pesan = "citycode harus diisi";
		}
		else if($error=="phone_kosong"){
			$pesan = "phone harus diisi";
		}
		else if($error=="mphone_kosong"){
			$pesan = "mphone harus diisi";
		}
		else if($error=="country_kosong"){
			$pesan = "country harus diisi";
		}
		else if($error=="ceklist_accept"){
			$pesan = "Please click accept";
		}
		
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
		}
		else{
			$nama="";
			$email="";
			$alteremail="";
			$password="";
			$password2="";
			$address="";
			$countr="";
			$citycode="";
			$phone="";
			$mphone="";
			$country="";
			$accept="";
		}
	?>
	<center>
<div class="kotak-form">
		<table border="0" cellpadding="0">
		<span class="error"><?php echo $pesan;?></span>
			<form method="get" action="Form_ActionSoal3.php">
			<tr>
				<td><font color="white"> Your Nama </td>
				<td><input type="text" name="nama" value="" required></td>
			</tr>
			<tr>
				<td><font color="white"> E-mail ID </td>
				<td><input type="email" name="email" value="" required></td>
			</tr>
			<tr>
				<td><font color="white"> Alternate E-mail ID </td>
				<td><input type="email" name="alteremail" value="" required></td>
			</tr>
			<tr>
				<td></td>
				<td><font color="white">Country Code ----------------- City Code ----------------</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="text" pattern="\d\d\d\d" name="countr" value="" required>
					<input type="text" pattern="\d\d\d\d" name="citycode" value="" required>
				</td>
			</tr>
			<tr>
				<td><font color="white"> Your Phone </td>
				<td><input type="text" pattern="\+\d\d\d\d-\d\d\d\d-\d\d\d\d" placeholder="+6200-0000-0000" name="phone" value="" required>
			</tr>
			<tr>
				<td><font color="white"> Mobile Phone </td>
				<td><input type="text" pattern="\+\d\d\d\d-\d\d\d\d-\d\d\d\d" placeholder="+6200-0000-0000" name="mphone" value="" required>
			</tr>
			<tr>
				<td><font color="white"> Your Portal Addrest </td>
				<td><textarea name="address" rows="5" cols="40" required></textarea></td>
			</tr>
			<tr>
				<td><font color="white"> Country</td>
				<td>
					<select name="country">
					<option value="">--- Select One ---</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Amerika">Amerika</option>
					<option value="Singapura">Singapura</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><font color="white"> Password</td>
				<td><input type="password" name="password" value="" required>
			</tr>
			<tr>
				<td><font color="white"> Re- Enter Password </td>
				<td><input type="password" name="password2" value="" required>
			</tr>
			<tr>
				<td></td>
				<td><input type="checkbox" name="accept" value="accept" required /><font color="white">I accept the Terms of Use
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" name="continue" value="Continue">
				<input type="reset" name="reset" value="Reset"></td>
			</tr>
			</form>
		</table>
		</center>
</div>
	</body>
</html>
