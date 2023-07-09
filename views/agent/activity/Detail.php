<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Update Data</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tanggal Aktifitas</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="act_date" type="date" value="<?php echo $act_date;?>" />
                    </div>
                </div>

                <div class="field item form-group">
                    <br/>
                    <div class="col-md-12 col-sm-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Jam</label>
                                <input class="form-control" name="email" id="start_time" type="time" value="<?php echo $start_time;?>"/>
                            </div>
                            <div class="col-sm-6">
                                <label>Ke</label>
                                <input class="form-control" name="email" id="end_time" type="time" value="<?php echo $end_time;?>" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kegiatan ( <input type="checkbox" name="suggest_activity" id="suggest_activity" onclick="check_activity()"> favorit </span>)</label>
                    <div class="col-md-12 col-sm-12">
                        <!-- manual input -->
                        <input class="form-control act_manual" name="email" id="act_manual" type="text" value="<?php echo $act_detail;?>" />
                        <!-- get from favorite -->
                        <select class="form-control act_favorite" id="act_favorite" style="display: none;">
                            <option value="">--- Silahkan Pilih ---</option>
                            <?php
                              $json = json_encode($list_task); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->title;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>



                    </div>
                </div>


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tempat ( <input type="checkbox" name="suggest_place" id="suggest_place" onclick="check_place()"> favorit </span>)</label>
                    <div class="col-md-12 col-sm-12">
                        <!-- manual input -->
                        <input class="form-control place_manual" name="email" id="place_manual" type="text" value="<?php echo $place;?>" />
                        <!-- get from favorite -->
                        <select class="form-control place_favorite" id="place_favorite" style="display: none;">
                            <option value="">--- Silahkan Pilih ---</option>
                            <?php
                              $json = json_encode($list_place); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->title;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Penyelenggara ( <input type="checkbox" name="suggest_organizer" id="suggest_organizer" onclick="check_organizer()"> favorit </span>)</label>
                    <div class="col-md-12 col-sm-12">
                        <!-- manual input -->
                        <input class="form-control organizer_manual" name="email" id="organizer_manual" type="text" value="<?php echo $organizer;?>" />
                        <!-- get from favorite -->
                        <select class="form-control organizer_favorite" id="organizer_favorite" style="display: none;">
                            <option value="">--- Silahkan Pilih ---</option>
                            <?php
                              $json = json_encode($list_organizer); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->title;?>"><?php echo $row->title;?></option>
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

        var id = '<?php echo $id;?>';
        var check_fav = document.getElementById('suggest_activity').checked;
        var check_place = document.getElementById('suggest_place').checked;
        var check_organizer = document.getElementById('suggest_organizer').checked;
        var act_date = $('#act_date').val();
        var start_time = $('#start_time').val();
        var end_time = $('#end_time').val();
        var act_hour = $('#act_hour').val();
        var act_minute = $('#act_minute').val();
        // var act_detail = $('#act_detail').val();

        if (check_fav == true) {
           var act_detail = $('#act_favorite').val(); 
        }else{
            var act_detail = $('#act_manual').val();
        }

        if (check_place == true) {
           var place_detail = $('#place_favorite').val(); 
        }else{
            var place_detail = $('#place_manual').val();
        }

        if (check_organizer == true) {
           var organizer_detail = $('#organizer_favorite').val(); 
        }else{
            var organizer_detail = $('#organizer_manual').val();
        }

        // var place = $('#place').val();
        // var pj = $('#pj').val();
        // var remark = $('#remark').val();

        $.ajax({
            url : "<?php echo base_url();?>agent/Activity/update",
            method : "POST",
            data : {
                id : id,
                act_date : act_date,
                start_time : start_time,
                end_time : end_time,
                act_hour : act_hour,
                act_minute : act_minute,
                act_detail : act_detail,
                place : place_detail,
                pj : organizer_detail
            },
            async : false,
            dataType : 'json',
            success: function(data){
                if (data.responsecode == '00') {
                    alert('Berhasil Update Data');
                    var session_type = '<?php echo $session_type; ?>';
                    if (session_type == 1 || session_type == 2) {
                        var url = '<?php echo base_url();?>agent/Report/activityedit/';    
                    }else{
                        var url = '<?php echo base_url();?>agent/activity/';
                    }
                    window.location = url;
                }else{
                    alert(data.message);
                }
            }
          });

    }
</script>
<script type="text/javascript">
function check_activity() {
    if (document.getElementById('suggest_activity').checked) {
        alert("Mengambil data favorit");
        $("#act_favorite").show();
        $("#act_manual").hide();
    } else {
        alert("Mengisi manual");
        $("#act_favorite").hide();
        $("#act_manual").show();
    }
}
</script>

<script type="text/javascript">
function check_place() {
    if (document.getElementById('suggest_place').checked) {
        alert("Mengambil data favorit");
        $("#place_favorite").show();
        $("#place_manual").hide();
    } else {
        alert("Mengisi manual");
        $("#place_favorite").hide();
        $("#place_manual").show();
    }
}
</script>

<script type="text/javascript">
function check_organizer() {
    if (document.getElementById('suggest_organizer').checked) {
        alert("Mengambil data favorit");
        $("#organizer_favorite").show();
        $("#organizer_manual").hide();
    } else {
        alert("Mengisi manual");
        $("#organizer_favorite").hide();
        $("#organizer_manual").show();
    }
}
</script>