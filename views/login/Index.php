<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SIPALA | Login</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets_v2/assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>assets_v2/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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

<body style="background-color: #F4F0EF;">

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row">

            <!-- start kiri -->
            <div class="col-lg-8">

              <div class="card mb-12">
                <div class="card-body">
                    <div class="row" style="margin-top: 50px;">
                        

                            <!-- Revenue Card -->
                            <div class="col-xxl-6 col-md-6">
                              <div class="card info-card revenue-card">
                                <div class="card-body">
                                  <h5 class="card-title">Total Hadir <span>| Hari ini</span></h5>

                                  <div class="d-flex align-items-center">
                                    <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bi bi-person-check"></i>
                                    </div> -->
                                    <div class="ps-3">
                                      <h6><?php echo $total_absent; ?></h6>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div><!-- End Revenue Card -->

                            <!-- Customers Card -->
                            <div class="col-xxl-6 col-xl-6">

                              <div class="card info-card customers-card">

                                <div class="card-body">
                                  <h5 class="card-title">Total Izin/Sakit <span>| Hari ini</span></h5>

                                  <div class="d-flex align-items-center">
                                    <!-- <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                      <i class="bi bi-person-dash"></i>
                                    </div> -->
                                    <div class="ps-3">
                                      <h6><?php echo $total_leave; ?></h6>

                                    </div>
                                  </div>

                                </div>
                              </div>

                            </div>
                    </div>
                    <!-- start -->
                    <div class="col-12">
                      <div class="card top-selling overflow-auto">

                        <div class="card-body pb-0">
                          <h5 class="card-title">Top Kehadiran <span>| Hari Ini</span></h5>

                          <table class="table table-borderless">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIP</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Score</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no=1;
                              $json = json_encode($list_top); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ ?>
                              <tr>
                                <th scope="row"><a href="#">#<?php echo $no;?></a></th>
                                <td><?php echo $row->nip;?></td>
                                <td><?php echo $row->fullname;?></td>
                                <td><?php echo $row->qty;?></td>
                              </tr>
                              <?php  $no++;}?>
                            </tbody>
                          </table>

                        </div>

                      </div>
                    </div>
                    <div class="col-12">
                      <div class="card recent-sales overflow-auto">


                        <div class="card-body">
                          <h5 class="card-title">Aktifitas Terbaru <span>| Hari Ini</span></h5>

                          <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal/Waktu</th>
                                <th scope="col">Nip</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kegiatan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $no=1;
                              $json = json_encode($list_history); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ ?>
                              <tr>
                                <th scope="row"><a href="#">#<?php echo $no;?></a></th>
                                <td><?php echo $row->act_date;?> <?php echo $row->start_time;?></td>
                                <td><?php echo $row->nip;?></td>
                                <td><?php echo $row->fullname;?></td>
                                <td><?php echo $row->status_desc;?></td>
                              </tr>
                              <?php  $no++;}?>
                            </tbody>
                          </table>

                        </div>

                      </div>
                    </div>
                </div>
              </div>

            </div>
            <!-- end kiri -->

            <!-- start kanan -->
            <div class="col-lg-4">

              <div class="card mb-12">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <center>
                        <img style="height: 30%;width: 30%;" src="<?php echo base_url()?>assets_v2/assets/img/logo_fakfak.png" alt="">
                    </center>
                    <h5 class="card-title text-center pb-0 fs-4">Selamat Datang</h5>
                    <p class="text-center small">Masuk dengan akun Anda untuk mengakses aplikasi Sistem Penilaian Kinerja dan Disiplin ASN<br>(SIPALA) versi web</p>
                  </div>
                    <div class="col-12">
                      <label for="yourUsername" class="form-label">NIP</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" class="form-control" id="username" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Kata Sandi</label>
                      <input type="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <br/>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" onClick="exec_login()">Masuk</button>
                    </div>

                </div>
              </div>

            </div>
            <!-- end kanan -->

          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/chart.js/chart.min.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/echarts/echarts.min.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/quill/quill.min.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url()?>assets_v2/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url()?>assets_v2/assets/js/main.js"></script>
  <script src="<?php echo base_url()?>assets_v2/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
    function exec_login(){
        // $('#modal_login').modal('show');
        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
          url : "<?php echo base_url();?>Login/exec_login",
          method : "POST",
          data : {
            username: username,
            password: password
          },
          async : false,
          dataType : 'json',
          success: function(data){
            $('#modal_login').modal('hide');
            if (data.responsecode == '00') {
                var url = "<?php echo base_url('agent/Dashboard/');?>"
                window.location.href = url;
            }else{
                alert(data.message);
                location.reload();

            }
          }
        });

    }

</script>

</body>

</html>