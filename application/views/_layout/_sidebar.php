<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url(); ?>assets/img/<?php echo $userdata->foto; ?>" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $userdata->nama; ?></p>
        <!-- Status -->
        <a href="<?php echo base_url(); ?>assets/#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">LIST MENU</li>
      <!-- Optionally, you can add icons to the links -->

      <li <?php if ($page == 'home') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Home'); ?>">
          <i class="fa fa-dashboard"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li <?php if ($page == 'sandi') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Sandi'); ?>">
          <i class="fa fa-lock"></i>
          <span>Dokumentasi Password</span>
        </a>
      </li>

<li <?php if ($page == 'katalog') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Katalog'); ?>">
          <i class="fa fa-database"></i>
          <span>Katalog Data</span>
        </a>
      </li>
      <li <?php if ($page == 'skema') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Skema'); ?>">
          <i class="fa fa-cog"></i>
          <span>Ref Tabel</span>
        </a>
      </li>
      <li <?php if ($page == 'unit') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Unit'); ?>">
          <i class="fa fa-cog"></i>
          <span>Ref Unit</span>
        </a>
      </li>
      <li <?php if ($page == 'queri') {echo 'class="active"';} ?>>
        <a href="<?php echo base_url('Queri'); ?>">
          <i class="fa fa-list"></i>
          <span>Dokumentasi Query</span>
        </a>
      </li>
      
      
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>