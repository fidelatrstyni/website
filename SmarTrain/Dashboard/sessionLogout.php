<html>
    <head>
        <title>
            SmarTrain
        </title> 
    </head>
    <body bgcolor="azure">
<?php
	session_start();
	session_destroy();

	echo '<script type="text/javascript"> alert("Anda berhasil logout ! "); window.location.href = "../index.html" </script>';
?>
    </body>
</html>