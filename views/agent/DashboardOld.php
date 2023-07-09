<main id="main" class="main">

    <div class="pagetitle">
      <h1>Beranda</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Total Pegawai</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_user; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Total Hadir <span>| Hari ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-check"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_absent; ?></h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="card-body">
                  <h5 class="card-title">Total Izin/Sakit <span>| Hari ini</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-person-dash"></i>
                    </div>
                    <div class="ps-3">
                      <h6><?php echo $total_leave; ?></h6>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->

            <!-- Reports -->
            <div class="col-12">
              <div class="card">

                <div class="card-body">
                  <h5 class="card-title">Total Kehadiran <span>/Bulan <?php echo $data_absent_bulan10 ;?></span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Hadir',
                          data: [<?php echo $data_absent_bulan1 ;?>, <?php echo $data_absent_bulan2 ;?>, <?php echo $data_absent_bulan3 ;?>, <?php echo $data_absent_bulan4 ;?>, <?php echo $data_absent_bulan5 ;?>, <?php echo $data_absent_bulan6 ;?>, <?php echo $data_absent_bulan7 ;?>, <?php echo $data_absent_bulan8 ;?>, <?php echo $data_absent_bulan9 ;?>, <?php echo $data_absent_bulan10 ;?>, <?php echo $data_absent_bulan11 ;?>, <?php echo $data_absent_bulan12 ;?>],
                        }, {
                          name: 'Izin/Dinas/Cuti',
                          data: [<?php echo $data_sick_bulan1 ;?>, <?php echo $data_sick_bulan2 ;?>, <?php echo $data_sick_bulan3 ;?>, <?php echo $data_sick_bulan4 ;?>, <?php echo $data_sick_bulan5 ;?>, <?php echo $data_sick_bulan6 ;?>, <?php echo $data_sick_bulan7 ;?>, <?php echo $data_sick_bulan8 ;?>, <?php echo $data_sick_bulan9 ;?>, <?php echo $data_sick_bulan10 ;?>, <?php echo $data_sick_bulan11 ;?>, <?php echo $data_sick_bulan12 ;?>]
                        }, {
                          name: 'Sakit',
                          data: [<?php echo $data_leave_bulan1 ;?>, <?php echo $data_leave_bulan2 ;?>, <?php echo $data_leave_bulan3 ;?>, <?php echo $data_leave_bulan4 ;?>, <?php echo $data_leave_bulan5 ;?>, <?php echo $data_leave_bulan6 ;?>, <?php echo $data_leave_bulan7 ;?>, <?php echo $data_leave_bulan8 ;?>, <?php echo $data_leave_bulan9 ;?>, <?php echo $data_leave_bulan10 ;?>, <?php echo $data_leave_bulan11 ;?>, <?php echo $data_leave_bulan12 ;?>]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: false
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#2eca6a', '#4154f1', '#ff771d'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'month',
                          categories: ["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Aug","Sep","Oct","Nov","Dec"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            <!-- Top Selling -->
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
            <!-- End Top Selling -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Aktifitas Terbaru <span>| Hari Ini</span></h5>

                  <table class="table table-borderless datatable">
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
            <!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- Recent Activity -->
          <div class="card">


            <?php if($this->session->userdata('session_typeaccount') == '1' || $this->session->userdata('session_typeaccount') == '2'){?>

              <div class="card-body pb-0">
                  <h5 class="card-title">Aktifitas Login <span>| Hari Ini</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <!-- <th scope="col">Nama</th> -->
                        <!-- <th scope="col">Login Date</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_lastlogin); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <th scope="row"><a href="#">#<?php echo $no;?></a></th>
                        <td><?php echo $row->email;?> <br/> <?php echo $row->last_login;?></td>
                        <!-- <td><?php echo $row->fullname;?></td> -->
                        <!-- <td><?php echo $row->last_login;?></td> -->
                      </tr>
                      <?php  $no++;}?>
                    </tbody>
                  </table>

                </div>

            <?php }else{?>
              <div class="card-body">
                <h5 class="card-title">Aktifitas <span>| Hari Ini</span></h5>
                <center>
                  <?php if($this->session->userdata('session_imageprofil') == null){?>
                    <img src="<?php echo base_url()?>assets_v2/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                  <?php } else{?>
                    <img style="height: 100px; width: 100px;" src="<?php echo $this->session->userdata('session_imageprofil');?>" alt="Profile" class="rounded-circle">
                  <?php } ?>
                </center>
                <br><hr/>
                <?php if($status_act == 0){?>
                <div class="form-group">
                  <select class="form-control type_act" id="type_act">
                    <option value="">Pilh Aktifitas</option>
                    <option value="1">Hadir</option>
                    <option value="2">Izin/Sakit</option>
                    <option value="3">Cuti</option>
                    <option value="4">Dinas</option>
                  </select>
                </div>
                <br>


                <div class="form-group leave" id="leave" style="display: none; margin-top: 10px; margin-bottom: 10px;">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label>Dari</label>
                      <input type="date" class="start_leave form-control" id="start_leave">
                    </div>
                    <div class="col-md-6 form-group">
                      <label>Ke</label>
                      <input type="date" class="end_leave form-control" id="end_leave">
                    </div>
                  </div>

                  <div class="form-group" style="margin-top: 10px; margin-bottom: 10px;">
                    <label>Keterangan</label>
                    <input type="text" class="form-control desc_leave" id="desc_leave">
                  </div>


                </div>

                

                <div class="form-group">
                  <center>
                  <a onClick="exec_form();" class="btn btn-outline-primary" >Simpan Data</a>
                  </center>
                </div>
                <?php }else{?>
                  <?php if($status_act == 1 || $status_act == 5){?>
                  <div class="row">
                    <p>Status : <b><?php echo $status_desc; ?></b></p>
                    <div class="col-md-6">
                      <p>Jam Hadir</p>
                      <p><?php echo $login_date; ?></p>
                    </div>
                    <div class="col-md-6">
                      <p>Jam Pulang</p>
                      <?php if($logout_date == null){?>
                      <a onClick="exec_gohome();" class="btn btn-outline-primary btn-sm" >Pulang</a>
                      <?php }else{?>
                      <p><?php echo $logout_date; ?></p>
                    <?php }?>
                    </div>
                  </div>
                  <?php }else{?>
                    <p>Status : <b><?php echo $status_desc; ?></b></p>
                  <?php }?>
                <?php }?>
              </div>
            <?php }?>


          </div>
          <!-- End Recent Activity -->

          <!-- Budget Report -->
          <!-- <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Top Pegawai <span>| Bulan Ini</span></h5>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Score</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>11231231242141254</td>
                    <td>Indra</td>
                    <td>90</td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>11231231242141254</td>
                    <td>Rama</td>
                    <td>80</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div> -->
          <!-- End Budget Report -->

        </div><!-- End Right side columns -->

      </div>
    </section>

  </main>
<script type="text/javascript">
    function exec_form(){

        var type_act = $('#type_act').val();
        var start_leave = $('#start_leave').val();
        var end_leave = $('#end_leave').val();
        var desc_leave = $('#desc_leave').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Activity/doactivity",
            method : "POST",
            data : {
                type_act : type_act,
                start_leave : start_leave,
                end_leave : end_leave,
                desc_leave : desc_leave
            },
            async : false,
            dataType : 'json',
            success: function(data){
              // console.log(JSON.stringify(data));
              var url = '<?php echo base_url();?>agent/Dashboard/';
              window.location = url;
            }
          });

    }
</script>
<script type="text/javascript">
    function exec_gohome(){

        var type_act = 5;
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Activity/doactivity",
            method : "POST",
            data : {
                type_act : type_act
            },
            async : false,
            dataType : 'json',
            success: function(data){
              var url = '<?php echo base_url();?>agent/Dashboard/';
              window.location = url;
            }
          });

    }
</script>
<script src="<?php echo base_url()?>assets_v2/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  
        // It will print the selected value
        function displayNum() {
            var value_select = $("select#type_act").val();

            if (value_select == 3 || value_select == 4) {
              $("#leave").show();
            }else{
              $("#leave").hide();
            }
        }
  
        // When the selected value will change,
        // the above function is called
        $("select#type_act").change(displayNum);
    </script>