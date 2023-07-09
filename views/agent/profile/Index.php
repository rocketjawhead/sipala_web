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
              <h5 class="card-title">Ubah Profile</h5>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Lengkap</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="fullname" id="fullname" type="text" value="<?php echo $fullname;?>" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Email</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="email" type="text" value="<?php echo $email;?>" />
                    </div>
                </div>


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Jabatan</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="position" type="text" value="<?php echo $position;?>" />
                    </div>
                    <!-- <div class="col-md-12 col-sm-12">
                        <select class="form-control" id="id_jabatan">
                            <option value="<?php echo $id_position;?>">Data Terpilih : <?php echo $position;?></option>
                            <?php
                              $json = json_encode($list_jabatan); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div> -->
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Unit Kerja 1</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="unit" type="text" value="<?php echo $unit;?>" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Unit Kerja 2</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="unit_2" type="text" value="<?php echo $unit_2;?>" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Atasan Langsung</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control basic-single" style="width: 100%;" id="id_lead">
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
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Atasan Dari Atasan</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control basic-single" style="width: 100%;" id="id_head">
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

                <!-- <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tugas Pokok</label>
                    <div class="col-md-12 col-sm-12">
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
                </div> -->


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">OPD</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control basic-single" id="opd">
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

        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var position = $('#position').val();
        var unit = $('#unit').val();
        var unit_2 = $('#unit_2').val();
        var id_lead = $('#id_lead').val();
        var id_head = $('#id_head').val();
        var task_work = $('#task_work').val();
        var opd = $('#opd').val();
        // alert(opd);
        $.ajax({
            url : "<?php echo base_url();?>agent/Profile/update",
            method : "POST",
            data : {
                fullname : fullname,
                email : email,
                position : position,
                unit : unit,
                unit_2 : unit_2,
                id_lead : id_lead,
                id_head : id_head,
                task_work : task_work,
                opd : opd
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
        function readURLimage1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#image1')
                    .attr('src', e.target.result)
                    .width(500)
                    .height(500);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
    <script type="text/javascript">
        function getBaseUrl1 ()  {
            var file = document.querySelector('input[type=file]')['files'][0];
            var reader = new FileReader();
            var baseString;
            reader.onloadend = function () {

                baseString = reader.result;
                conv_basestring = baseString.replace("data:image/jpeg;base64,", "") ;
                document.getElementById("base64_img").value = conv_basestring;

                // alert(baseString); 

            };
            reader.readAsDataURL(file);
        }
    </script>
    <script type="text/javascript">
        function img1(input){
            getBaseUrl1();
            readURLimage1(input);
        }
    </script>

    <script type="text/javascript">
  $(document).ready(function () {
      $('.basic-single').select2();
      // alert('asds');
    });
</script>