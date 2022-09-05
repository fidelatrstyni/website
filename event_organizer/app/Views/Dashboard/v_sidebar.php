<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#333;position:fixed">
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
                <img src="<?= (empty($userProfil[0]['img_profil']) ? base_url('upload/img_profil/pngegg.png') : base_url('upload/img_profil/' . $userProfil[0]['img_profil']))?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a class="d-block" style="color: white;"><?= $userProfil[0]['username']?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <div class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link <?= ($currentAdminMenu == 'dashboard' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                <li>

                </li>
                <li class="nav-item">
                    <a href="<?= base_url('DataUsers') ?>" class="nav-link <?= ($currentAdminMenu == 'dataUsers' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>
                            Data Users
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<//?= base_url('DataCustomer') ?>" class="nav-link <?= ($currentAdminMenu == 'dataCustomer' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>
                            Data Customer
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="<?= base_url('DataLokasi') ?>" class="nav-link <?= ($currentAdminMenu == 'dataLokasi' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-hockey-puck"></i>
                        <p>
                            Data Lokasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Kategori') ?>" class="nav-link <?= ($currentAdminMenu == 'kategori' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-hockey-puck"></i>
                        <p>
                            Data Kategori
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Paket') ?>" class="nav-link <?= ($currentAdminMenu == 'paket' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-hockey-puck"></i>
                        <p>
                            Data Paket
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('DataTransaksi') ?>" class="nav-link <?= ($currentAdminMenu == 'transaksi' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Data Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Laporan') ?>" class="nav-link <?= ($currentAdminMenu == 'laporan' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Laporan Penjualan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Electre/kriteria') ?>" class="nav-link <?= ($currentAdminMenu == 'electre' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Electre
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-calculator"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>