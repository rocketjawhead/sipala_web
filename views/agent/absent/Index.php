<main id="main" class="main">

    <div class="pagetitle">
      <h1>Absent Sakit / Cuti / Dinas</h1>
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
              <div class="card">
            <div class="card-body">
              <h5 class="card-title">List Data <a href="<?php echo base_url('agent/Absent/add');?>" class="btn btn-outline-primary">+</a></h5>
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered" id="borderedTab" role="tablist">
                


                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-home" type="button" role="tab" aria-controls="home" aria-selected="true">Cuti Saya</button>
                </li>

                <?php if($id_position != '2'){?>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Permintaan</button>
                </li>
                <?php } ?>



              </ul>
              <div class="tab-content pt-2" id="borderedTabContent">
                <div class="tab-pane fade show active" id="bordered-home" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-borderless datatable" style="margin-top: 10px;">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Permintaan</th>
                        <th scope="col">Tanggal Cuti</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_absent); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><?php echo $row->request_date;?></td>
                        <td><?php echo $row->start_leave.' - '.$row->end_leave;?></td>
                        <td>
                          <?php if($row->status_active == '1'){ ?>
                            <span class="badge bg-success">Setuju</span>
                          <?php }else{?>
                            <span class="badge bg-warning">Proses</span>
                          <?Php }?>
                        </td>
                        
                      </tr>
                      <?php  $no++;}?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="bordered-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <table class="table table-borderless datatable" style="margin-top: 10px;">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal Permintaan</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Cuti</th>
                        <th scope="col">Status</th>
                        <th scope="col">Surat</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_absent_staff); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><?php echo $row->request_date;?></td>
                        <td><?php echo $row->nip;?></td>
                        <td><?php echo $row->fullname;?></td>
                        <td><?php echo $row->start_leave.' s/d '.$row->end_leave;?></td>
                        <td>
                          <?php if($row->status_active == '1'){ ?>
                            <span class="badge bg-success">Setuju</span>
                          <?php }else{?>
                            <a href="<?php echo base_url('agent/Absent/approve/');?><?php echo $row->unique_numb;?>" onClick="return confirmExec();"><span class="badge bg-warning">Proses</span></a>
                          <?Php }?>
                        </td>
                        <td><a href="<?php echo $row->imageurl;?>" target="blank">Lihat Surat</a> </td>
                        
                      </tr>
                      <?php  $no++;}?>
                    </tbody>
                  </table>
                </div>
              </div><!-- End Bordered Tabs -->

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
  <script language="javascript">
    function confirmExec() {
        if (confirm("Apakah anda yakin ingin menyetujui proses ini ?")) {
            alert("Data Berhasil");
            return true;
        } else {
            alert("Data Gagal");
            return false;
        }
    }
  </script>