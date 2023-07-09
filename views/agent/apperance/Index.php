<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengaturan Tampilan</h1>
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


                <div class="card-body" style="margin-top: 10px;">
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tinggi</th>
                        <th scope="col">Lebar</th>
                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_data); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><img src="<?php echo $row->imageurl;?>" style="height: 20%;width: 20%;border-radius: 10px;"></td>
                        <td><?php echo $row->type_code;?></td>
                        <td><?php echo $row->type_name;?></td>
                        <td><?php echo $row->height;?></td>
                        <td><?php echo $row->width;?></td>
                        <td>
                          <a href="<?php echo base_url('agent/Apperance/detail/');?><?php echo $row->type_code;?>">Detail</a>
                        <td>
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