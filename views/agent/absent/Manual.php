<main id="main" class="main">

    <div class="pagetitle">
      <h1>Absent Manual</h1>
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
                  <h5 class="card-title">Tambah Data <a href="<?php echo base_url('agent/Absent/addmanual');?>" class="btn btn-outline-primary">+</a></h5>
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
        
      </div>
    </section>

  </main>