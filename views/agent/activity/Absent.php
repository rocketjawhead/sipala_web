<main id="main" class="main">

    <div class="pagetitle">
      <h1>Kehadiran</h1>
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
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <h5 class="card-title">Tambah Data <a href="<?php echo base_url('agent/Activity/addmanual');?>" class="btn btn-outline-primary">+</a></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Jam</th>
                        <th scope="col">Menit</th>
                        <th scope="col">Kegiatan</th>
                        <!-- <th scope="col">Tempat</th> -->
                        <!-- <th scope="col">Penyelenggara</th> -->
                        <!-- <th scope="col">Keterangan</th> -->
                        <!-- <th scope="col">#</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_activity); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><?php echo $row->act_date;?></td>
                        <td><?php echo $row->start_time.' - '.$row->end_time;?></td>
                        <td><?php echo $row->diff_hour;?></td>
                        <td><?php echo $row->diff_minute;?></td>
                        <td><?php echo $row->act_detail;?></td>
                        <!-- <td><?php echo $row->place;?></td> -->
                        <!-- <td><?php echo $row->organizer;?></td> -->
                        <!-- <td><?php echo $row->task;?></td> -->
                        <!-- <td>
                          <a href="<?php echo base_url('agent/Activity/detail/');?><?php echo $row->id;?>" class="btn btn-outline-primary">Detail</a>
                        </td> -->
                        
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
        
      </div>
    </section>

  </main>