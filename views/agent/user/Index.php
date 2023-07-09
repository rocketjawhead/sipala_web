<main id="main" class="main">

    <div class="pagetitle">
      <h1>Pengguna</h1>
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
                  <h5 class="card-title">Tambah Data <a href="<?php echo base_url('agent/user/add');?>" class="btn btn-outline-primary">+</a></h5>
                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">NIP</th>
                        <th scope="col">Email</th>
                        <th scope="col">Nama Lengkap</th>
                        <th scope="col">Tipe</th>
                        <th scope="col">Golongan</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Posisi</th>
                        <th scope="col">Atasan</th>
                        <th scope="col">Atasan Langsung</th>
                        <th scope="col">Tugas</th>
                        <th scope="col">QR</th>
                        <th scope="col">Admin Scan</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_user); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><a href="<?php echo base_url('agent/user/detail/');?><?php echo $row->id;?>"><?php echo $row->nip;?></a></td>
                        <td><?php echo $row->email;?></td>
                        <td><?php echo $row->fullname;?></td>
                        <td><?php echo $row->type_account;?></td>
                        <td><?php echo $row->level;?></td>
                        <td><?php echo $row->unit;?></td>
                        <td><?php echo $row->position;?></td>
                        <td><?php echo $row->direct_lead;?></td>
                        <td><?php echo $row->direct_head;?></td>
                        <td><?php echo $row->task_work;?></td>
                        <td>
                          <i class="bi bi-arrow-down-circle-fill"></i><a href="<?php echo base_url('agent/User/download/');?><?php echo $row->nip;?>"> Download</a>
                        </td>
                        <td>
                          <?php if ($row->is_admin == 0) {?>
                            <i class="bi bi-person-check"></i><a href="<?php echo base_url('agent/User/changeadmin/1/');?><?php echo $row->unique_id;?>"> Staff</a>
                          <?php } else { ?>
                            <i class="bi bi-person-check"></i><a href="<?php echo base_url('agent/User/changeadmin/0/');?><?php echo $row->unique_id;?>"> Admin</a>
                          <?php }?>

                          
                        </td>
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