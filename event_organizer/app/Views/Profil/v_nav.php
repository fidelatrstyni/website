<!-- Navbar -->
<nav class="main-header navbar navbar-expand" style="background-color:#333;border-color:#333"> 
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <!-- <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li> -->
        <li class="nav-item d-none d-sm-inline-block">
            <a href="<?php echo base_url('../../index3.html') ?>" class="navbar-brand">
                <img src="<?php echo base_url('template/dist/img/AdminLTELogo.png') ?>" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8; width:40px; height:40px; ">
                <span class="brand-text font-weight-light" style="color:white;">Khalila Enterprise</span>
            </a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li> -->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
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
</nav>
<!-- /.navbar -->