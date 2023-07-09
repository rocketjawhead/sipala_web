<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>JAJANPULSA.ID</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/gohub/assets/img/icon/logo_only.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url()?>assets/gohub/assets/img/icon/logo_only.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/gohub/assets/img/icon/logo_only.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url()?>assets/gohub/assets/img/favicons/logo_only.ico">
    <link href="<?php echo base_url()?>assets/gohub/assets/img/icon/logo_only.png" rel="icon">
    <link href="<?php echo base_url()?>assets/gohub/assets/img/icon/logo_only.png" rel="apple-touch-icon">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Bhaijaan+2:wght@400;500;600;700&amp;family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,300&amp;display=swap" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/gohub/assets/css/theme.min.css" rel="stylesheet" />
    <link href="<?php echo base_url()?>assets/gohub/assets/css/user.min.css" rel="stylesheet" />
  </head>

  <body>
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="light">
        <div class="container"><a class="navbar-brand" href="<?php echo base_url('dashboard')?>"><img src="<?php echo base_url()?>assets/gohub/assets/img/icons/Logo.png" height="35" alt="logo" /></a><button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse border-top border-lg-0 mt-4 mt-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto pt-2 pt-lg-0 font-base align-items-center">
              <!-- <li class="nav-item"><a class="nav-link px-3" href="#product">Keuntungan</a></li> -->
              <!-- <li class="nav-item"><a class="nav-link px-3" href="#customers">Produk</a></li> -->
              <!-- <li class="nav-item"><a class="nav-link px-3" href="#pricing">Agen Cuan</a></li> -->
              <li class="nav-item <?php if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == ''){echo 'active';}else{ echo '';}?>"><a class="nav-link px-3" href="<?php echo base_url('dashboard')?>">Beranda</a></li>
              <!-- <li class="nav-item <?php if($this->uri->segment(2) == 'ketentuan'){echo 'active';}else{ echo '';}?>"><a class="nav-link px-3" href="<?php echo base_url('dashboard/services')?>">Layanan</a></li> -->
              <li class="nav-item <?php if($this->uri->segment(2) == 'ketentuan'){echo 'active';}else{ echo '';}?>"><a class="nav-link px-3" href="<?php echo base_url('dashboard/checkbill')?>">Cek Pembelian</a></li>
              <li class="nav-item <?php if($this->uri->segment(2) == 'ketentuan'){echo 'active';}else{ echo '';}?>"><a class="nav-link px-3" href="<?php echo base_url('dashboard/ketentuan')?>">Ketentuan</a></li>
              <!-- <li class="nav-item"><a class="nav-link pl-3 me-3" href="#docs">Docs </a></li> -->
            </ul><a href="<?php echo base_url('login')?>" class="btn btn-primary">Login/Daftar</a>
          </div>
        </div>
      </nav>