<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIPALA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets_v2/assets/img/logo_fakfak.png" rel="icon">
  <link href="<?php echo base_url()?>assets_v2/assets/img/logo_fakfak.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets_v2/assets/vendor/simple-datatables/style.css" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="<?php echo base_url()?>assets_v2/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.4.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="<?php echo base_url()?>assets_v2/assets/img/logo_fakfak.png" alt="">
        <span class="d-none d-lg-block">SIPALA</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        
        

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">

            <?php if($this->session->userdata('session_imageprofil') == null){?>
              <img src="<?php echo base_url()?>assets_v2/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <?php } else{?>
              <img src="<?php echo $this->session->userdata('session_imageprofil');?>" alt="Profile" class="rounded-circle">
            <?php } ?>

            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $this->session->userdata('session_fullname');?></span>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $this->session->userdata('session_fullname');?></h6>
              <!-- <span>Web Designer</span> -->
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>agent/Profile/changepicture">
                <i class="bi bi-card-image"></i>
                <span>Ganti Foto </span>
              </a>
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>agent/Profile/index">
                <i class="bi bi-person"></i>
                <span>Akun Profil</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>agent/Profile/nametag" target="_blank">
                <i class="bi bi-emoji-smile"></i>
                <span>Tag Nama</span>
              </a>
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>agent/Profile/download" target="_blank">
                <i class="bi bi-upc-scan"></i>
                <span>QR</span>
              </a>
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>agent/Profile/changepassword">
                <i class="bi bi-lock"></i>
                <span>Ganti Kata Sandi</span>
              </a>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>agent/Profile/secure">
                <i class="bi bi-gear"></i>
                <span>Ganti Password</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <!-- <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li> -->
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url();?>Login/exec_logout" onClick="return signOut();">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>
    <!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="<?php echo base_url();?>agent/Dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#skp-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Skp</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="skp-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url();?>agent/Skp">
              <i class="bi bi-card-checklist"></i>
              <span>SKP</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url();?>agent/Skpunit">
              <i class="bi bi-circle"></i><span>SKP Unit</span>
            </a>
          </li>

          <li>
            <a href="<?php echo base_url();?>agent/Skpplanning">
              <i class="bi bi-circle"></i><span>SKP Rencana Kinerja</span>
            </a>
          </li>
          
        </ul>
      </li>
      

      <?php if($this->session->userdata('session_typeaccount') == '3'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Activity">
          <i class="bi bi-check2-circle"></i>
          <span>Aktifitas</span>
        </a>
      </li>
      <?php }?>

      <?php if($this->session->userdata('session_typeaccount') == '2'){?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Absent/scanqr">
          <i class="bi bi-check2-circle"></i>
          <span>Absen Scan</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Absent/manual">
          <i class="bi bi-check2-circle"></i>
          <span>Absen Manual</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Report/activityedit">
          <i class="bi bi-check2-circle"></i>
          <span>Activity Manual</span>
        </a>
      </li>
      <?php }?>

      <?php if($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/User">
          <i class="bi bi-people"></i>
          <span>Pengguna</span>
        </a>
      </li>

      <?php if($this->session->userdata('session_typeaccount') == '3'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Activity/absent">
          <i class="bi bi-person-check"></i>
          <span>Kehadiran</span>
        </a>
      </li>
      <?php }?>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Activity/uploadabsent">
          <i class="bi bi-person-check"></i>
          <span>Upload Kehadiran</span>
        </a>
      </li>

      <?php }?>


      <?php if($this->session->userdata('session_typeaccount') == '3'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Absent">
          <i class="bi bi-person-check"></i>
          <span>Absent</span>
        </a>
      </li>
      <?php }?>

      <?php if($this->session->userdata('session_typeaccount') == '3'){?>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Favorite</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
          <a href="<?php echo base_url();?>agent/Task">
            <i class="bi bi-card-checklist"></i>
            <span>Tugas</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url();?>agent/Place">
            <i class="bi bi-card-checklist"></i>
            <span>Tempat</span>
          </a>
        </li>

        <li>
          <a href="<?php echo base_url();?>agent/Organizer">
            <i class="bi bi-card-checklist"></i>
            <span>Penyelenggara</span>
          </a>
        </li>
          
        </ul>
      </li>


        
      <?php }?>

      <?php if($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-grid-3x3-gap-fill"></i><span>Master</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          <li>
            <a href="<?php echo base_url();?>agent/Shift">
              <i class="bi bi-circle"></i><span>Shift</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Jabatan">
              <i class="bi bi-circle"></i><span>Jabatan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Bagian">
              <i class="bi bi-circle"></i><span>Bagian</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Unit">
              <i class="bi bi-circle"></i><span>Unit</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Opd">
              <i class="bi bi-circle"></i><span>Opd</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Golongan">
              <i class="bi bi-circle"></i><span>Golongan</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Gelar">
              <i class="bi bi-circle"></i><span>Gelar</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Place">
              <i class="bi bi-circle"></i><span>Tempat</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Task">
              <i class="bi bi-circle"></i><span>Tugas</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Taskwork">
              <i class="bi bi-circle"></i><span>Tugas Utama</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Organizer">
              <i class="bi bi-circle"></i><span>Penyelenggara</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Holiday">
              <i class="bi bi-circle"></i><span>Hari Libur</span>
            </a>
          </li>

          
        </ul>
      </li>
      <?php }?>
      <!-- End Components Nav -->
      <?php if($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '3'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#report-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Laporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="report-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="<?php echo base_url();?>agent/Report/task">
              <i class="bi bi-circle"></i><span>Aktifitas</span>
            </a>
          </li>
          <li>
            <a href="<?php echo base_url();?>agent/Report/stafftask">
              <i class="bi bi-circle"></i><span>Aktifitas Staff</span>
            </a>
          </li>
          <!-- <li>
            <a href="<?php echo base_url();?>agent/Report/absent">
              <i class="bi bi-circle"></i><span>Kehadiran</span>
            </a>
          </li> -->
          <li>
            <a href="<?php echo base_url();?>agent/Report/summary">
              <i class="bi bi-circle"></i><span>Rekap Aktifitas</span>
            </a>
          </li>
          
        </ul>
      </li>
      <?php }?>

      <?php if($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2'){?>
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Setting/reset" onClick="return reset();">
          <i class="bi bi-person-check"></i>
          <span>Reset</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Apperance">
          <i class="bi bi-person-check"></i>
          <span>Tampilan</span>
        </a>
      </li>
      <?php }?>

      <!-- <?php if($this->session->userdata('session_typeaccount') == '2'){?> -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="<?php echo base_url();?>agent/Skp">
          <i class="bi bi-check2-circle"></i>
          <span>SKP</span>
        </a>
      </li>
      <!-- <?php }?> -->
      <!-- End Forms Nav -->

      <!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->