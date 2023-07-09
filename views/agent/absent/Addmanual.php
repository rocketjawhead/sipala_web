<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Absent Manual</h5>

              <!-- General Form Elements -->
                        
                
                <div class="field item form-group">
                  <label>Pilih User</label>
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
                <br/>
                <div class="field item form-group">
                    <label>Aktifitas</label>
                  <select class="form-control type_act" id="type_act">
                    <option value="">Pilh Aktifitas</option>
                    <option value="1">Hadir</option>
                    <option value="2">Sakit</option>
                    <option value="3">Cuti</option>
                    <option value="4">Dinas</option>
                    <option value="5">Pulang</option>
                  </select>
                </div>



                <div class="form_user" id="form_user" style="display: none;">
                    <div class="field item form-group">
                        <div class="col-md-12 col-sm-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Dari</label>
                                    <input type="date" class="start_leave form-control" id="start_leave">
                                </div>
                                <div class="col-sm-6">
                                    <label>Ke</label>
                                    <input type="date" class="end_leave form-control" id="end_leave">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="field item form-group" style="margin-top: 10px; margin-bottom: 10px;">
                    <label>Keterangan</label>
                    <input type="text" class="form-control desc_leave" id="desc_leave">
                  </div>

                  <div class="field item form-group" style="margin-top: 10px; margin-bottom: 10px;">
                    <label>Upload File</label>
                    <br/>
                    <img id="image1" style="height: 20%;width: 10%;"/>
                    <input type="file" name="imageurl" class="form-control" onchange="img1(this)"> 
                    <input type="hidden" id="base64_img" name="base64_img">
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

        
        var userid = $('#userid').val();
        var base64_img = $('#base64_img').val();
        var type_act = $('#type_act').val();
        var start_leave = $('#start_leave').val();
        var end_leave = $('#end_leave').val();
        var desc_leave = $('#desc_leave').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Activity/doactivitymanual",
            method : "POST",
            data : {
                userid : userid,
                base64_img : base64_img,
                type_act : type_act,
                start_leave : start_leave,
                end_leave : end_leave,
                desc_leave : desc_leave
            },
            async : false,
            dataType : 'json',
            success: function(data){
              console.log(JSON.stringify(data));
              var url = '<?php echo base_url();?>agent/Absent/manual';
              window.location = url;
            }
          });

    }
</script>
<script type="text/javascript">
function validate() {

    // var check_fav = document.getElementById('suggest_activity').checked;
    // alert(check_fav);
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
    <script type="text/javascript" src="<?php echo base_url()?>assets_v2/ajax/libs/jquery/1.8.3/jquery-1.8.3.js">  </script>
<script type="text/javascript">
$(function(){
    $('#type_act').change(function(){
       var opt = $(this).val();
        if(opt == '1' || opt == '5'){
            // alert('asd');
            $('#form_user').hide();
        }else{
            // alert('qwe');
            $('#form_user').show();
        }
    });
});
</script>