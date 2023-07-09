<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Perbarui Data</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">NIP</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="nip" id="nip" type="text" value="<?php echo $nip;?>" />
                    </div>
                </div>
                
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="fullname" id="fullname" type="text" value="<?php echo $fullname;?>" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                    <div class="col-md-6 col-sm-6">
                        <input class="form-control" name="email" id="email" type="text" value="<?php echo $email;?>" />
                    </div>
                </div>


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tipe Akun</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="type_account" required>
                            <option value="<?php echo $id_type_account;?>">Data Terpilih : <?php echo $type_account;?></option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">User</option>
                        </select>
                    </div>
                </div>


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Pangkat (Gol/Ruang) </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="level" required>
                            <option value="<?php echo $id_level;?>">Data Terpilih : <?php echo $level;?></option>
                            <?php
                              $json = json_encode($list_golongan); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Unit Kerja </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="unit" required>
                            <option value="<?php echo $id_unit;?>">Data Terpilih : <?php echo $unit;?></option>
                            <?php
                              $json = json_encode($list_unit); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jabatan </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="position" required>
                            <option value="<?php echo $id_position;?>">Data Terpilih : <?php echo $position;?></option>
                            <?php
                              $json = json_encode($list_bagian); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Atasan Langsung </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="id_lead">
                            <option value="<?php echo $id_lead;?>">Data Terpilih : <?php echo $direct_lead;?></option>
                            <?php
                              $json = json_encode($list_user); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->fullname;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Atasan Dari Atasan </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="id_head">
                            <option value="<?php echo $id_head;?>">Data Terpilih : <?php echo $direct_head;?></option>
                            <?php
                              $json = json_encode($list_user); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->fullname;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tugas Pokok </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="task_work">
                            <option value="<?php echo $id_task_work;?>">Data Terpilih : <?php echo $task_work;?></option>
                            <?php
                              $json = json_encode($list_taskwork); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">OPD / Kantor </label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="opd">
                            <option value="<?php echo $id_opd;?>">Data Terpilih : <?php echo $opd;?></option>
                            <?php
                              $json = json_encode($list_opd); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Status</label>
                    <div class="col-md-6 col-sm-6">
                        <select class="form-control" id="status">
                          <option value="<?php echo $status;?>">Data Terpilih : <?php if($status == '1'){ echo 'Aktif';}else{echo 'Tidak Aktif';}?></option>
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <hr/>
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-10">
                    <a onClick="exec_form();" class="btn btn-outline-primary" >Simpan Data</a>
                  </div>
                </div>

              <!-- End General Form Elements -->

            </div>
          </div>
            <!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        
      </div>
    </section>

  </main>
  <script type="text/javascript">
    function exec_form(){

        var id = '<?php echo $id;?>';
        var nip = $('#nip').val();
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var type_account = $('#type_account').val();
        var golongan = $('#level').val();
        var unit = $('#unit').val();
        var position = $('#position').val();
        var id_lead = $('#id_lead').val();
        var id_head = $('#id_head').val();
        var task_work = $('#task_work').val();
        var opd = $('#opd').val();
        var status = $('#status').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/user/update",
            method : "POST",
            data : {
                id : id,
                nip : nip,
                fullname : fullname,
                email : email,
                type_account : type_account,
                golongan : golongan,
                unit : unit,
                position : position,
                id_lead : id_lead,
                id_head : id_head,
                task_work : task_work,
                opd : opd,
                status : status
            },
            async : false,
            dataType : 'json',
            success: function(data){
              var url = '<?php echo base_url();?>agent/user/';
              window.location = url;
            }
          });

    }
</script>