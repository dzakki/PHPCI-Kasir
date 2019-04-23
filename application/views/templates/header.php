<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Coffe Break</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?= base_url('assets/')?>img/favicon.png?3">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow"><a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead"><i class="fas fa-align-left"></i></a><a href="index.html" class="navbar-brand font-weight-bold text-uppercase text-base">Coffe Break</a>
        <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
          <li class="nav-item dropdown ml-auto"><a id="userInfo" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="<?= base_url('assets/')?>img/avatar-6.jpg" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
            <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?= $_SESSION['username'] ?></strong><small><?= $status ?></small></a>
              <div class="dropdown-divider"></div><a href="<?=base_url('dashboard/setting')?>" class="dropdown-item">Settings</a>
              <div class="dropdown-divider"></div><a href="<?= base_url('auth/logout')?>" class="dropdown-item">Logout</a>
            </div>
          </li>
        </ul>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">
      <div id="sidebar" class="sidebar py-3">
        <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
        <ul class="sidebar-menu list-unstyled">
          <?php
            if ($role == "2" || $role == "3" || $role == "4" || $role == "5") {?>
              <li class="sidebar-list-item"><a href="<?= base_url('dashboard')?>" class="sidebar-link text-muted "><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
          <?php    
            }
            if ($role == "4"  || $role == "5") {?>
              <li class="sidebar-list-item"><a href="<?= base_url('dashboard/data')?>" class="sidebar-link text-muted"><i class="o-table-content-1 mr-3 text-gray"></i><span>Data</span></a></li>
          <?php      
            }
            if ($role == "1" || $role == "3"  || $role == "5") {?>
              <li class="sidebar-list-item"><a href="<?= base_url('dashboard/store')?>" class="sidebar-link text-muted"> <img src="<?= base_url('assets/')?>img/store-icon.png" class='mr-3 store-icon' height='25px'> <span>Store</span></a></li>
          <?php      
            }
            if ($role == "1" || $role == "2" ||  $role == "3" ||  $role == "4"  ||  $role == "5") {?>
              <li class="sidebar-list-item"><a href="<?= base_url('dashboard/report')?>" class="sidebar-link text-muted"><i class="o-paperwork-1 mr-3 text-gray"></i><span>Report</span></a></li>
          <?php      
            }  
          ?>
          </li>
        </ul>
      </div>
      <div class="page-holder w-100 d-flex flex-wrap">
        <div class="container-fluid px-xl-5">