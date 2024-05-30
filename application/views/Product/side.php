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
      <?php if ($title == "Dashboard") : ?>
        <li class="active"><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php else : ?>
        <li><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <?php endif ?>

      <?php if ( $data->id_role == 1 || $data->id_role == 2 || $data->id_role == 4) : ?>
            <?php if ($title == "Income Product (Raw Material") : ?>
              <li class="active"><a href="<?php echo base_url("Qc")?>"><i class="fa fa-exchange"></i> <span>Incoming Raw Material</span></a></li>
            <?php else : ?>
              <li><a href="<?php echo base_url("IncomingRawMaterial")?>"><i class="fa fa-exchange"></i> <span>Incoming Raw Material</span></a></li>
            <?php endif ?>
          <?php endif ?>
        
        <?php if ( $data->id_role == 1 || $data->id_role == 2 || $data->id_role == 4) : ?>
            <?php if ($title == "QC") : ?>
              <li class="active"><a href="<?php echo base_url("Qc")?>"><i class="fa fa-exchange"></i> <span>Loading Product</span></a></li>
            <?php else : ?>
              <li><a href="<?php echo base_url("Qc")?>"><i class="fa fa-exchange"></i> <span>Loading Product</span></a></li>
            <?php endif ?>
          <?php endif ?>

        <?php if ($data->id_role == 1 || $data->id_role == 2) : ?>
  <?php if ($title == "Product" || $title == "Category" || $title == "Technology") : ?>
    <li class="treeview active">
  <?php else : ?>
    <li class="treeview">
  <?php endif; ?>
    <a href="#">
      <i class="fa fa-briefcase"></i> <span>Product Master</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="treeview">
        <a href="#">
          <i class="fa fa-check-circle"></i> <span>Raw Material</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo ($title == "Raw Material") ? 'class="active"' : ''; ?>>
              <a href="<?php echo base_url('Product/RawMaterial')?>"><i class="fa fa-cubes"></i>Raw Material</a></li>
          <li <?php echo ($title == "Category") ? 'class="active"' : ''; ?>>
              <a href="<?php echo base_url('Product/RawMaterialCategory')?>"><i class="fa fa-tags"></i>Category</a></li>
          <li <?php echo ($title == "Country") ? 'class="active"' : ''; ?>>
              <a href="<?php echo base_url('Product/RawMaterialCountries')?>"><i class="fa fa-globe"></i>Country</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-check-circle"></i> <span>Finish Good</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li <?php echo ($title == "Product") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('Product')?>"><i class="fa fa-cube"></i>Product</a></li>
          <li <?php echo ($title == "Category") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('Product/Category')?>"><i class="fa fa-home"></i>Category</a></li>
          <li <?php echo ($title == "Technology") ? 'class="active"' : ''; ?>><a href="<?php echo base_url('Product/Technology')?>"><i class="fa fa-cogs"></i>Technology</a></li>
        </ul>
      </li>
    </ul>
  </li>
<?php endif; ?>
        <?php if ( $data->id_role == 1 || $data->id_role == 2) : ?>
<<<<<<< HEAD
          <?php if ($title == "User" || $title == "Role") : ?>
            <li class="treeview active">
          <?php else : ?>
            <li class="treeview">
          <?php endif ?>
            <a href="#">
              <i class="fa fa-users"></i> <span>User Management</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if ($title == "User") : ?>
                <li class="active"><a href="<?php echo base_url('User')?>"><i class="fa fa-user"></i>User</a></li>
              <?php else : ?>
                <li><a href="<?php echo base_url('User')?>"><i class="fa fa-user"></i>User</a></li>
              <?php endif ?>
              <?php if ($title == "Role") : ?>
                <li class="active"><a href="<?php echo base_url('User/Role')?>"><i class="fa fa-unlock-alt"></i>Role</a></li>
              <?php else : ?>
                <li><a href="<?php echo base_url('User/Role')?>"><i class="fa fa-unlock-alt"></i>Role</a></li>
              <?php endif ?>
            </ul>
          </li>
=======
          <li><a href="<?php echo base_url("Home")?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
          <li><a href="<?php echo base_url("Qc")?>"><i class="fa fa-exchange"></i> <span>Checking Result</span></a></li>
          <li class="treeview active">
          <a href="#">
            <i class="fa fa-briefcase"></i> <span>Product Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url('Product')?>"><i class="fa fa-cube"></i>Product</a></li>
            <li><a href="<?php echo base_url('Product/Category')?>"><i class="fa fa-home"></i>Category</a></li>
            <li><a href="<?php echo base_url('Product/Technology')?>"><i class="fa fa-home"></i>Technology</a></li>
          </ul>
        </li>
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
        <li class=""><a href="<?php echo base_url("Announcement")?>"><i class="fa fa-history"></i> <span>Customer List</span></a></li>
        <li><a href="<?php echo base_url("Login/logout")?>"onclick="return confirm('are you going to logout?');"><i class="fa fa-user-times"></i> <span>Sign Out</span></a></li>
>>>>>>> 15a46b3a2441c8baaa673ec75162b5a3a5c546f5
        <?php endif ?>
        <?php if ( $data->id_role == 1 || $data->id_role == 2 || $data->id_role == 3) : ?>
            <?php if ($title == "Forecast" || $title == "Customer") : ?>
              <li class="treeview active">
            <?php else : ?>
              <li class="treeview">
            <?php endif ?>
          
            <a href="#">
              <i class="fa fa-users"></i> <span>Forecast</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <?php if ($title == "Forecast") : ?>
                <li class ="active"><a href="<?php echo base_url('Forecast')?>"><i class="fa fa-unlock-alt"></i>Forecast</a></li>
              <?php else : ?>
                <li><a href="<?php echo base_url('Forecast')?>"><i class="fa fa-unlock-alt"></i>Forecast</a></li>
              <?php endif ?>
              <?php if ($title == "Customer") : ?>
                <li class ="active"><a href="<?php echo base_url('Forecast/Customer')?>"><i class="fa fa-user"></i>Customer</a></li>
              <?php else : ?>
                <li><a href="<?php echo base_url('Forecast/Customer')?>"><i class="fa fa-user"></i>Customer</a></li>
              <?php endif ?>
              
            </ul>
          </li>
        <?php endif ?>
        <?php if ($title == "Logs") : ?>
          <li class ="active"><a href="<?php echo base_url("Logs")?>"><i class="fa fa-history"></i> <span>Logs</span></a></li>
        <?php else : ?>
          <li><a href="<?php echo base_url("Logs")?>"><i class="fa fa-history"></i> <span>Logs</span></a></li>
        <?php endif ?>
        <li><a href="<?php echo base_url("Login/logout")?>"onclick="return confirm('are you going to logout?');"><i class="fa fa-user-times"></i> <span>Sign Out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  <?php } ?>
    <!-- Content Header (Page header) -->