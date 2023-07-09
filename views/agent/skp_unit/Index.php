<main id="main" class="main">

    <div class="pagetitle">
      <h1>Skp Unit</h1>
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
                  <h5 class="card-title">Tambah Data <a href="<?php echo base_url('agent/Skpunit/add');?>" class="btn btn-outline-primary">+</a></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_skpunit); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><a href="<?php echo base_url('agent/Skpunit/detail/');?><?php echo $row->id;?>"><?php echo $row->title;?></a></td>
                        <td>
                          <?php if($row->status == '1'){ ?>
                            <span class="badge bg-success">Aktif</span>
                          <?php }else{?>
                            <span class="badge bg-warning">Tidak Aktif</span>
                          <?Php }?>
                        </td>
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