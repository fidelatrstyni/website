<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SmartTrain | Database Customer</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminl.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>



            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown">
                    </a>

                    <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        ADMIN
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="sessionLogout.php" class="dropdown-item dropdown-footer">Logout</a>
                    </div>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="logo.png" width="225px" height="28px">
            </a>


            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i><img src="dashboard.png" height="25px" width="25px"></img></i>
                            <p>
                                Dashboard
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="index.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview ">
                        <a href="#" class="nav-link ">
                            <i><img src="train.png" height="25px" width="25px"></img></i>
                            <p>
                                Train
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="keretaData.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Database Train</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="keretaEdit.html" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Database Train</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i><img src="tiket.png" height="25px" width="25px"></img></i>
                            <p>
                                Ticket
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="tiketData.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Database Ticket</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="tiketEdit.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Database Ticket</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link active">
                            <i><img src="customer.png" height="25px" width="25px"></img></i>
                            <p>
                                Customer
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="customerData.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Database Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="customerEdit.html" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Database Customer</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i><img src="user.png" height="25px" width="25px"></img></i>
                            <p>
                                User
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="userData.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Database User</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="userEdit.html" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Database User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i><img src="kasir.png" height="25px" width="25px"></img></i>
                            <p>
                                Kasir
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="kasirData.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Database Kasir</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Database Customer</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->


        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

<?php

include "koneksi.php";

$search = "SELECT * FROM pembeli";

$query = mysqli_query($connect, $search);

if (!$query) {
    die ('SQL Error: ' . mysqli_error($connect));
}

echo '<table border="1" align="center" cellpadding="10px">
<thead>
    <tr align="center">
        <th>ID</th>
        <th>ID PEMBELI</th>
        <th>NAMA</th>
        <th>KTP</th>
        <th>NO TELEPHONE</th>
        <th>JENIS KELAMIN</th>
        <th>TANGGAL</th>
        <th>KELAS</th>
        <th>ASAL</th>
        <th>TUJUAN</th>
        <th>ACTION</th>

    </tr>
</thead>
<tbody>';

while ($row = mysqli_fetch_array($query))
{
echo '<tr>
    <td align = "center">'.$row['id'].'</td>
    <td align = "center">'.$row['id_pembeli'].'</td>
    <td align = "center">'.$row['nama'].'</td>
    <td align = "center">'.$row['ktp'].'</td>
    <td align = "center">'.$row['no_tlp'].'</td>
    <td align = "center">'.$row['jkelamin'].'</td>
    <td align = "center">'.$row['tgl'].'</td>
    <td align = "center">'.$row['kelas'].'</td>
    <td align = "center">'.$row['asal'].'</td>
    <td align = "center">'.$row['tujuan'].'</td>
    <td align = "center"><a href="customerEdit.html"> Edit </a></td>
    </<tr>';
}
echo '
</tbody>
</table>';

// Apakah kita perlu menjalankan fungsi mysqli_free_result() ini? baca bagian VII
mysqli_free_result($query);

// Apakah kita perlu menjalankan fungsi mysqli_close() ini? baca bagian VII
mysqli_close($connect);
?>

            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->


    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; SmartTrain</strong>
        All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>