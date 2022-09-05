<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="#" class="brand-link">
        <img src="<?= base_url('Slider/logopng.png')?>" alt="TigraSrikandi Cake" 
        class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">TigraSrikandi Cake</span>
    </a>

    <div class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $namaUsers?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('dashboardCustomer') ?>"
                        class="nav-link <?= ($currentAdminMenu == 'dashboard' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                <li>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Akun') ?>"
                        class="nav-link <?= ($currentAdminMenu == 'akun' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-portrait"></i>
                        <p>
                            Pengaturan Akun
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('transaksi') ?>"
                        class="nav-link <?= ($currentAdminMenu == 'transaksi' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-hockey-puck"></i>
                        <p>
                            Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('DashboardAlamat') ?>"
                        class="nav-link <?= ($currentAdminMenu == 'alamat' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-hockey-puck"></i>
                        <p>
                            Alamat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= ($currentAdminMenu == 'proses' ? 'active' : '')?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Proses
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

</aside>