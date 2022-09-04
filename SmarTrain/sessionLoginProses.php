<html>
    <head>
        <title>
            SmarTrain
        </title> 
    </head>
    <body bgcolor="azure">
<?php
	include "koneksi.php";

	$username = $_POST['username'];
	$password = $_POST['password'];

	$sql = "SELECT * FROM user Where username='$username' and password ='$password'";
	$result = mysqli_query($connect, $sql);
	$cek = mysqli_num_rows($result);

	if($cek > 0){

		session_start();
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';

		if($_SESSION['username'] == 'admin'){
			echo '<script type="text/javascript">
			alert("Anda Berhasil Login, silakan menuju Dashboard "); window.location.href = "Dashboard/index.html" </script>';
			
			/*echo 'Anda Berhasil Login, silakan menuju
			<a href ="Dashboard/index.html">Dashboard</a>';*/
		}else{
			echo '<script type="text/javascript">
			alert("Anda Berhasil Login"); window.location.href = "indexLogout.html" </script>';

			/*echo 'Anda Berhasil Login, silakan menuju
			<a href ="Dashboard/index.html">Dashboard</a>';*/
		}

		/*session_start();
		$_SESSION['username'] = $username;
		$_SESSION['status'] = 'login';

		echo 'Anda Berhasil Login, silakan menuju
		<a href ="Dashboard/index.html">Dashboard</a>';*/
	}
	else{

		echo '<script language="javascript">alert("Gagal login, silakan login lagi"); window.history.back(); </script>';
		
		/*echo 'Gagal login, silakan login lagi
		<a href ="index.html">Halaman Login</a>';*/
		
		echo mysqli_error($connect);
	}
?>
    </body>
</html>