<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="<?= base_url() ?>/img/logo.png">
  <title><?= $title; ?> - Forecast Accuracy </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- jQuery 3 -->
  <script src="<?php echo base_url();?>asset/AdminLTE-2.4.18/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/dist/css/skins/_all-skins.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="<?= base_url(); ?>asset/AdminLTE-2.4.18/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css">


  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  
  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
      background: transparent !important;
    }

    .note-editor .dropdown-toggle::after {
      all: unset;
    }

    .note-editor .note-dropdown-menu,
    .note-editor .note-modal-footer {
      box-sizing: content-box;
    }

    /* Card Announcement */
    .card-container {
      border: 2px solid rgba(0,0,0,0.2);
      border-radius: 20px;
      overflow: hidden;
    }

    /* Upload File */
    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 6px 12px;
      cursor: pointer;
      background-color: #f9f9f9;
      color: #333;
      border-radius: 4px;
      font-family: Arial, sans-serif;
    }

    .custom-file-upload:hover {
      background-color: #e9e9e9;
    }

    /* Hide the actual file input */
    input[type="file"] {
      display: none;
    }

    /* Announcement Style */
    .container-announcement {}

    .container-announcement .header {
      text-align: center;
    }

    .container-announcement .header hr {
      width: 12%;
    }

    .container-announcement main {
      display: flex;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .container-announcement main .card {
      width: 20%;
      text-align: center;
      margin: 10px 15px;
    }

    .container-announcement main .card h3 {
      background-color: #D73841;
      margin: 0;
      padding: 15px 0;
      color: white;
      border-radius: 10px 10px 0 0;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2), -2px -2px 4px rgba(255, 255, 255, 0.2);
    }

    .container-announcement main .card .content-card {
      border: 1px solid rgba(0,0,0,0.3);
      border-radius: 0 0 10px 10px;
      box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2), -2px -2px 4px rgba(255, 255, 255, 0.2);
      padding: 0px 15px;
      height: 200px;
    }

    .container-announcement main .card .content-card h4 {
      margin: 20px 0;
    }

    .container-announcement main .card .content-card a {
      margin-bottom: 25px;
    }
  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="<?= base_url("Home") ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Q</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Quality</b> Control</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <?php foreach ($user as $data) { ?>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?= base_url(); ?>img/profile/<?= $data->photo ?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?= $data->name ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url(); ?>img/profile/<?= $data->photo ?>" class="img-circle" alt="User Image">
                  <p>
                    <?= $data->name ?>
                    <small><?= $data->email ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <!-- <div class="pull-left">
                    <a href="<?= base_url('Home/MyProfileAdminWarehouse') ?>" class="btn btn-default btn-flat">My Profile</a>
                  </div> -->
                  <div class="pull-right">
                    <a href="<?= base_url("Login/logout") ?>" class="btn btn-default btn-flat" onclick="return confirm('Are you going to logout?');">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          <?php } ?>
        </ul>
      </div>
    </nav>
  </header>