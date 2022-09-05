<!-- Navbar -->
<div class="header shadow">
    <a href="<?php echo base_url('../../index3.html') ?>" class="navbar-brand">
        <img src="<?php echo base_url('template/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8; width:60px; height:60px; margin-left:70px">
        <span class="brand-text font-weight-light" style="color:white; margin-left:20px">Khalila Enterprise</span>
    </a>
        <nav class="navbar navbar-expand-lg" style="font-size:15px; margin-right:20px">
          <div class="container">

            <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

              <div class="collapse navbar-collapse order-3" id="navbarSupportedContent">
                <!-- Left navbar links -->
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>/Home" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>/Event" class="nav-link">Event</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>/Gallery" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>/About" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>/Contact" class="nav-link">Contact</a>
                    </li>
                    <?php if(isset($_SESSION['roles']) == null) {?>
                    <li class="nav-item">
                        <a href="<?php echo base_url();?>/Login" class="nav-link">Login</a>
                    </li>
                    <?php }else {?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Profil
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" style="background-color: #333;">
                            <a class="dropdown-item" href="<?php echo base_url();?>/Profil" style="margin-left: 0;">Profil</a>
                            <a class="dropdown-item" href="<?php echo base_url();?>/MyOrder" style="margin-left: 0;">My Order</a>
                            <a class="dropdown-item"
                                href="<?php echo base_url();?>/Login/logout" style="margin-left: 0;">Logout</a>
                        </div>
                    </li>
                    <?php }?>
                </ul>
              </div>
          </div>
        </nav>
    <!-- /.navbar -->
</div>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!--h1 class="m-0"> Top Navigation <small>Example 3.0</small></h1-->
                </div><!-- /.col -->
                <!--div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Layout</a></li>
                <li class="breadcrumb-item active">Top Navigation</li>
              </ol>
            </div-->
                <!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->