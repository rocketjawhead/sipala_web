<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data (Manual)</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Hadir</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="act_date" type="date" value="<?php echo date('Y-m-d');?>" />
                    </div>
                </div>


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Aktifitas</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control" class="type_act" id="type_act">
                          <option value="">Pilh Aktifitas</option>
                          <option value="1">Hadir</option>
                          <option value="2">Izin/Sakit</option>
                          <option value="3">Cuti</option>
                          <option value="4">Dinas</option>
                          <!-- <option value="5">Pulang</option> -->
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Pengguna</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control userid" id="userid">
                            <option value="">--- Silahkan Pilih ---</option>
                            <?php
                              $json = json_encode($list_user); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->unique_id;?>"><?php echo '['.$row->nip.'] '.$row->fullname;?></option>
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

        // var payment_method = $('#payment_method').val();
        // var amount_denom = $('#amount_denom').val();
        var check_fav = document.getElementById('suggest_activity').checked;
        var act_date = $('#act_date').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();

        if (check_fav == true) {
           var act_detail = $('#act_favorite').val(); 
        }else{
            var act_detail = $('#act_manual').val();
        }
        
        


        var place = $('#place').val();
        var pj = $('#pj').val();
        var remark = $('#remark').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Activity/insert",
            method : "POST",
            data : {
                act_date : act_date,
                start_time : start_time,
                end_time : end_time,
                act_detail : act_detail,
                place : place,
                pj : pj

            },
            async : false,
            dataType : 'json',
            success: function(data){

                if (data.responsecode == '00') {
                    var url = '<?php echo base_url();?>agent/Activity/';
                    window.location = url;
                }else{
                    alert(data.message);
                }

              
            }
          });

    }
</script>

</script>