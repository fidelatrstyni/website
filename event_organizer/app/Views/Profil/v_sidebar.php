<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#333">
    <!-- Brand Logo -->
    <!-- <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a> -->
    <a class="brand-link" data-widget="pushmenu" role="button" style="background-color:#333;">
        <!-- <i class="fas fa-bars"></i> -->
        <!-- <img src="template/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8"> -->
        <span class="brand-text font-weight-light" style="color: white;background-color:#333;">Khalila Enterprise</span>
    </a>
    

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" style="color: white;">My Profil</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Profil') ?>" class="nav-link <?= ($currentAdminMenu == 'profil' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                <li>

                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Address') ?>" class="nav-link <?= ($currentAdminMenu == 'address' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>
                            Address
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('MyOrder') ?>" class="nav-link <?= ($currentAdminMenu == 'order' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-hockey-puck"></i>
                        <p>
                            My Order
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="#" class="nav-link <?= ($currentAdminMenu == 'transaksi' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= ($currentAdminMenu == 'laporan' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laporan Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Topsis') ?>" class="nav-link <?= ($currentAdminMenu == 'topsis' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Topsis
                        </p>
                    </a>
                </li> -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>