<html>
	<head>
			<link rel="stylesheet" type="text/css" href="login_soal3.css">	
		<style>
			.error {
				color : #FF0000;
			}
			h2 {
				text-align: center;
			}
			.content {
				text-align: right; 
			}
			hr {
				color: grey;
				border-width: 5px;
			}
		</style>
	</head>
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
		else if ($error=="email_kosong"){
			$pesan = "Email harus diisi";
		}
		else if($error=="email_invalid"){
			$pesan = "Email diisi huruf dan spasi";
		}
		else if ($error=="password_kosong"){
			$pesan="password harus diisi";
		}
		
		if(isset($_GET['email']) AND isset($_GET['password'])){
			$email=$_GET['email'];
			$password=$_GET['password'];
		}
		else{
			$email="";
			$password="";
		}
		?>
		
		<h2><font color="white"> ALREADY REGISTERED? LOGIN HERE </h2>
		<hr>
		
		<center>
		<table>
			<tr>
				<td bgcolor="white" colspan="2"><span class="error"><?php echo $pesan;?></span></td>
				<td></td>
			</tr>
			<form method="get" action="Login_ActionSoal3.php">
			<tr>
				<td bgcolor="grey"><font color="white"> E-mail: </td></font>
				<td><input type="email" name="email" value="<?php echo $email;?>" required>
			</tr>
			<tr>
				<td bgcolor="grey"><font color="white"> Password: </td></font>
				<td><input type="password" name="password" value="" required>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">
					<input type="checkbox" name="save"><font color="white" required> Save My Email and Password 
				</td>
			</tr>
			<tr>
				<td></td>
				<td colspan="2">
					<input type="submit" name="Continue" value="Continue" >
					<input type="reset" name="reset" value="reset">
				</td>
			</tr>
			</form>
		</table>
		</center>
	</body>
</html>
