<aside class="main-sidebar" style="background-color: #F8F9FA; color: #000000">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" >

    <!-- Sidebar user panel (optional) -->
    <!--div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info"-->
        <hr style="width:100px; height:10px" />
        <!--p><?php echo $userdata->nama; ?></p-->
        <!-- Status -->
        <!--a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div-->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">

      <!--li class="header">LIST MENU <?php echo $userdata->username; ?></li-->
      <!-- Optionally, you can add icons to the links -->

      <?php if($userdata->username == 'admin') { ?>
      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <li <?php if ($page == 'pegawai') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pegawai'); ?>">
          <i class="fa fa-user"></i>
          <span>Crew</span>
        </a>
      </li>

      <li <?php if ($page == 'absen') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Absen'); ?>">
          <i class="fa fa-briefcase"></i>
          <span>Attendance</span>
        </a>
      </li>

      <li <?php if ($page == 'listuser') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home/list_user'); ?>">
          <i class="fa fa-user"></i>
          <span>Administrasi</span>
        </a>
      </li>

      <!--li class="header">LIST MENU USER</li-->
      <!-- <hr /> -->
    <?php } ?>

    <?php if($userdata->username == 'pengadaan' || $userdata->username == 'admin' || $userdata->username == 'admin2') { ?>
      <li <?php if ($page == 'pengadaan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pengadaan'); ?>">
          <i class="fa fa-th"></i>
          <span>Pengadaan</span>
        </a>
      </li>
    <?php } ?>
    <?php if($userdata->username == 'inventory' || $userdata->username == 'admin' || $userdata->username == 'admin2') { ?>
      <li <?php if ($page == 'inventory') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Inventory'); ?>">
          <i class="fa fa-th"></i>
          <span>Inventory</span>
        </a>
      </li>
    <?php } ?>
    <?php if($userdata->username == 'pelayaran' || $userdata->username == 'admin' || $userdata->username == 'admin2') { ?>
      <li <?php if ($page == 'pelayaran') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pelayaran'); ?>">
          <i class="fa fa-th"></i>
          <span>Pelayaran</span>
        </a>
      </li>
    <?php } ?>
    <?php if($userdata->username == 'admin' || $userdata->username == 'pms' || $userdata == 'admin2') { ?>
      <li <?php if ($page == 'PMS') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('pms'); ?>">
          <i class="fa fa-th"></i>
          <span>PMS</span>
        </a>
      </li>
    <?php } ?>
      <li <?php if ($page == 'logout') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Auth/logout'); ?>">
          <i class="fa fa-th"></i>
          <span>Logout</span>
        </a>
      </li>



    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
