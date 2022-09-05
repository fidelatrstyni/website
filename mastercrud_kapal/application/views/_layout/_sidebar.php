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

      <!--li class="header">LIST MENU <?php echo $userdata->status; ?></li-->
      <!-- Optionally, you can add icons to the links -->

    
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
      <!--?php if($userdata->status == 'superadmin' || $userdata->status == 'direktur') { ?-->
      <li <?php if ($page == 'listuser') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home/list_user'); ?>">
          <i class="fa fa-user"></i>
          <span>Administrasi</span>
        </a>
      </li>
      <!--?php } ?-->
      <!--li class="header">LIST MENU USER</li-->
      <!-- <hr /> -->
    <!--?php if($userdata->status == 'superadmin' || $userdata->status == 'direktur') { ?-->
      <li <?php if ($page == 'kapal') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Kapal'); ?>">
          <i class="fa fa-ship"></i>
          <span>Kapal</span>
        </a>
      </li>
    <!--?php } ?-->
  
      <li <?php if ($page == 'pengadaan') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pengadaan'); ?>">
          <i class="fa fa-cubes"></i>
          <span>Pengadaan</span>
        </a>
      </li>
   
    
      <li <?php if ($page == 'inventory') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Inventory'); ?>">
          <i class="fa fa-cubes"></i>
          <span>Inventory</span>
        </a>
      </li>

   
      <li <?php if ($page == 'pelayaran') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Pelayaran'); ?>">
          <i class="fa fa-ship"></i>
          <span>Pelayaran</span>
        </a>
      </li>
 
    
      <li <?php if ($page == 'PMS') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('pms'); ?>">
          <i class="fa fa-recycle"></i>
          <span>PMS</span>
        </a>
      </li>
   
      <li <?php if ($page == 'monitoring') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('monitoring'); ?>">
          <i class="fa fa-tachometer"></i>
          <span>Monitoring</span>
        </a>
      </li>



    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
