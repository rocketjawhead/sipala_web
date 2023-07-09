<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login JAJANPULSA.ID</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/pages/auth.css">

    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/logo_icon.png" type="image/x-icon">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo"> -->
                        <center>
                        <a href="#"><img style="height: 30%;width: 30%;" src="<?php echo base_url()?>assets/img/jajanpulsa_logo.png" alt="Logo"></a>
                        </center>
                        <hr/>
                    <!-- </div> -->
                        <!-- <h1 class="auth-title">Log in.</h1> -->
                    <!-- <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p> -->

                        <div id="view_login">
                        <h1 class="auth-title">Mengatur Kata Sandi Baru.</h1>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Kata Sandi Baru" id="reg_password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Kata Sandi Baru (Konfirmasi)" id="reg_password_conf">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" onClick="exec_reset()">Submit</button>
                        </div>
                    
                    
                </div>
            </div>
            
        </div>

    </div>
</body>
<script src="<?php echo base_url()?>assets/back/otp/jquery.min.js"></script>

<script type="text/javascript">
    function exec_reset(){
        var reg_password = $('#reg_password').val();
        var reg_password_conf = $('#reg_password_conf').val();
        var url = $(location).attr('href');
        var segments = url.split( '/' );
        // var id = segments[6];
        var id = <?php echo $this->uri->segment(3);?>;
        if (reg_password == reg_password_conf) {
           $.ajax({
              url : "<?php echo base_url();?>Auth/exec_reset_password",
              method : "POST",
              data : {
                id : id,
                password: reg_password,
                password_conf: reg_password_conf
              },
              async : false,
              dataType : 'json',
              success: function(data){
                if (data.responsecode == '00') {
                    alert(data.message);
                    var url = "<?php echo base_url('Login');?>"
                    window.location.href = url;   
                }else{
                    alert(data.message);
                }
                
              }
            }); 
        }else{
            alert('Kata sandi tidak sama dengan kata sandi konfirmasi');
        }
        
    }
</script>
</html>