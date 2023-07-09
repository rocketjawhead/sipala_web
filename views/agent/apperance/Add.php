<link href="<?php echo base_url()?>assets_v2/select2/select2.min.css" rel="stylesheet"/>
<!-- ✅ load jQuery ✅ -->
<script src="<?php echo base_url()?>assets_v2/select2/jquery-3.6.0.min.js"></script>
<!-- ✅ load JS for Select2 ✅ -->
<script src="<?php echo base_url()?>assets_v2/select2/select2.min.js" defer></script>
<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data</h5>

              <!-- General Form Elements -->
                
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="email" type="text" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kata Sandi</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="password" id="password" type="password" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tipe Akun</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control type_account basic-single" style="width: 100%;" id="type_account" required>
                            <option value="">--- Silahkan Pilih ---</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Pengguna</option>
                        </select>
                    </div>
                </div>

                <div class="form_user" id="form_user" style="display: none;">
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">NIP</label>
                        <div class="col-md-12 col-sm-12">
                            <input class="form-control" name="nip" id="nip" type="text" />
                        </div>
                    </div>
                    
                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap</label>
                        <div class="col-md-12 col-sm-12">
                            <input class="form-control" name="fullname" id="fullname" type="text" />
                        </div>
                    </div>

                    <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Pangkat (Gol/Ruang) </label>
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="level" required>
                                <option value="">--- Silahkan Pilih ---</option>
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
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="unit" required>
                                <option value="">--- Silahkan Pilih ---</option>
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
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="position" required>
                                <option value="">--- Silahkan Pilih ---</option>
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
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="id_lead">
                                <option value="">--- Silahkan Pilih ---</option>
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
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="id_head">
                                <option value="">--- Silahkan Pilih ---</option>
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
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="task_work">
                                <option value="">--- Silahkan Pilih ---</option>
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
                        <div class="col-md-12 col-sm-12">
                            <select class="form-control basic-single" style="width: 100%;" id="opd">
                                <option value="">--- Silahkan Pilih ---</option>
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

        var nip = $('#nip').val();
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var type_account = $('#type_account').val();
        var golongan = $('#level').val();
        var unit = $('#unit').val();
        var position = $('#position').val();
        var id_lead = $('#id_lead').val();
        var id_head = $('#id_head').val();
        var task_work = $('#task_work').val();
        var opd = $('#opd').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/user/insert",
            method : "POST",
            data : {
                nip : nip,
                fullname : fullname,
                email : email,
                password : password,
                type_account : type_account,
                golongan : golongan,
                unit : unit,
                position : position,
                id_lead : id_lead,
                id_head : id_head,
                task_work : task_work,
                opd : opd
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
<script type="text/javascript" src="<?php echo base_url()?>assets_v2/ajax/libs/jquery/1.8.3/jquery-1.8.3.js">  </script>
<script type="text/javascript">
$(function(){
    $('#type_account').change(function(){
       var opt = $(this).val();
        if(opt == '3'){
            // alert('asd');
            $('#form_user').show();
        }else{
            // alert('qwe');
            $('#form_user').hide();
        }
    });
});
</script>
<script type="text/javascript">
  $(document).ready(function () {
      $('.basic-single').select2();
      // alert('asds');
    });
</script>