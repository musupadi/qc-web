<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
      <?php
                foreach ($user as $data){

                ?>
        <div class="pull-left image">
          <img src="<?php echo base_url();?>img/profile/<?php echo $data->photo ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo  $data->name?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- Super Admin & Admin -->
        <li class="active"><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <?php if ( $data->id_role == 1 || $data->id_role == 2 || $data->id_role == 4) : ?>
          <li><a href="<?php echo base_url("Qc")?>"><i class="fa fa-exchange"></i> <span>Checking Result</span></a></li>
        <?php endif ?>
        <?php if ( $data->id_role == 1 || $data->id_role == 2) : ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-briefcase"></i> <span>Product Master</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('Product')?>"><i class="fa fa-cube"></i>Product</a></li>
              <li><a href="<?php echo base_url('Product/Category')?>"><i class="fa fa-home"></i>Category</a></li>
              <li><a href="<?php echo base_url('Product/Technology')?>"><i class="fa fa-home"></i>Technology</a></li>
            </ul>
          </li>
        <?php endif ?>
        <?php if ( $data->id_role == 1 || $data->id_role == 2) : ?>
            <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>User Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('User/Role')?>"><i class="fa fa-unlock-alt"></i>Role</a></li>
              <li><a href="<?php echo base_url('User')?>"><i class="fa fa-user"></i>User</a></li>
            </ul>
          </li>
        <?php endif ?>
        <?php if ( $data->id_role == 1 || $data->id_role == 2 || $data->id_role == 3) : ?>
            <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Forecast</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('Forecast')?>"><i class="fa fa-unlock-alt"></i>Forecast</a></li>
              <li><a href="<?php echo base_url('Forecast/Customer')?>"><i class="fa fa-user"></i>Customer</a></li>
            </ul>
          </li>
        <?php endif ?>
        
        <li><a href="<?php echo base_url("Logs")?>"><i class="fa fa-history"></i> <span>Logs</span></a></li>
        <li><a href="<?php echo base_url("Login/logout")?>"onclick="return confirm('are you going to logout?');"><i class="fa fa-user-times"></i> <span>Sign Out</span></a></li>
   
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php } ?>
    <!-- Content Header (Page header) -->