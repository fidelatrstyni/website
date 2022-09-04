<html>
    <head>
        <title>
            SmarTrain
        </title> 
    </head>
    <body bgcolor="azure">
<?php
    include "koneksi.php";

    $name  = $_REQUEST['nama'];
    $user  = $_REQUEST['user'];
    $password  = $_REQUEST['password'];

    $cek_username = mysqli_num_rows(mysqli_query ($connect, "SELECT username FROM user WHERE username = '$user'"));
            // Kalau username sudah ada yang pakai
            
            if ($cek_username > 0){
                
                echo '<script language="javascript">alert("Username sudah ada yang pakai. Ulangi lagi"); window.history.back(); </script>';
            }
            else{ 
                $mysqli  = "INSERT INTO user (id, name, username, password) VALUES (null, '$name', '$user', '$password')";
                $result  = mysqli_query($connect, $mysqli);
                
                if ($result) {
                    echo '<script type="text/javascript">
                    alert("Registrasi Berhasil ! "); window.location.href = "indexLogout.html" </script>';

                    /*echo '<script language="javascript">swal({
                        title: "Registrasi Berhasil",
                        text: "User akan didaftarkan",
                        type: "success"
                    }, function(){
                            window.location.href = "index.html";
                    });</script>';*/
                } else {
                    echo '<script language="javascript">alert("Registrasi gagal"); window.history.back(); </script>';
                }
            }

    mysqli_close($connect);
?>
    </body>
</html>


