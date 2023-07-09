<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ganti Foto (300 x 420)</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <!-- <label class="col-form-label col-md-3 col-sm-3  label-align">Ganti Foto</label> -->
                    <div class="col-md-12 col-sm-12">
                        <center><img id="image1" style="height: 20%;width: 20%;" src="<?php echo base_url()?>assets/img/profil.png"/></center>
                        <input type="file" name="imageurl" class="form-control" onchange="img1(this)"> 
                        <input type="hidden" id="base64_img" name="base64_img">
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

        var base64_img = $('#base64_img').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Profile/updatepicture",
            method : "POST",
            data : {
                base64_img : base64_img
            },
            async : false,
            dataType : 'json',
            success: function(data){
                // console.log(JSON.stringify(data));
              var url = '<?php echo base_url();?>agent/Dashboard';
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