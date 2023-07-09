<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Absent Scan</h5>

              <!-- General Form Elements -->
                        
                
                <div class="field item form-group">
                  <label>NIP</label>
                  <input type="text" class="form-control" value="<?php echo $nip; ?>" readonly>
                </div>
                <br/>
                <div class="field item form-group">
                  <label>Nama</label>
                  <input type="text" class="form-control" value="<?php echo $fullname; ?>" readonly>
                </div>
                <br/>
                <div class="field item form-group">
                    <label>Aktifitas</label>
                  <select class="form-control type_act" id="type_act">
                    <option value="">Pilh Aktifitas</option>
                    <option value="1">Hadir</option>
                    <option value="5">Pulang</option>
                  </select>
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

        
        var userid = '<?php echo $unique_id;?>';
        var base64_img = null;
        var type_act = $('#type_act').val();
        var start_leave = null;
        var end_leave = null;
        var desc_leave = null;
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Activity/doactivityscan",
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