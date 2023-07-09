<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Kata Sandi</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kata Sandi (saat ini)</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="password_old" type="password" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kata Sandi Baru</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="password_new" type="password" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kata Sandi Baru (Konfirmasi)</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="password_new_conf" type="password" />
                    </div>
                </div>

                
            
                <hr/>
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-10">
                    <a onClick="exec_form();" class="btn btn-outline-primary" >Update Data</a>
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

        
        var csrf_name = '<?php echo $csrf_name;?>';
        var csrf_token = '<?php echo $csrf_token;?>';
        
        var password_new = $('#password_new').val();
        var password_old = $('#password_old').val();
        var password_new_conf = $('#password_new_conf').val();


        var len_password_new = password_new.length;

        if (password_new == password_new_conf) {

            $.ajax({
                url : "<?php echo base_url();?>agent/Profile/updatepassword",
                method : "POST",
                data : {
                    password_new : password_new,
                    password_old : password_old,
                    password_new_conf : password_new_conf,
                    [csrf_name] : csrf_token
                },
                async : false,
                dataType : 'json',
                success: function(data){
                    alert(data.message);
                    var url = '<?php echo base_url();?>agent/Dashboard';
                    window.location = url;
                }
              });
        }else{
            alert('Different Password, Please check your new password and confirmation password');
            location.reload();
        }

        

    }
</script>
