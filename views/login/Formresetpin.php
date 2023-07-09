<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login JAJANPULSA.ID</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
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


                        <div id="view_forgetpassword">
                            <h1 class="auth-title">Lupa PIN</h1>
                            
                            <div class="form-group position-relative has-icon-left mb-4">
                                <label>Masukkan Email Anda</label>
                                <input type="text" class="form-control form-control-xl" placeholder="Email" id="forget_email">
                                <div class="form-control-icon">
                                    <i class="bi bi-mailbox"></i>
                                </div>
                            </div>
                            
                            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" onClick="exec_forgetpin()">Submit</button>
                            <div class="text-center mt-5 text-lg fs-4">
                            <p class="text-gray-600">Ingat PIN ? 
                                <a href="<?php echo base_url('agent/Dashboard')?>"class="font-bold">Kembali</a></p>
                            </div>
                        </div>


                    
                </div>
            </div>
            
        </div>

    </div>
    <!-- Vertically Centered modal Modal -->
    <div class="modal fade" id="modal_login" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div class="modal-content" style="height: 50%;">
                <div style="margin-top: 22%;margin-bottom: 22%;">
                  <center>
                  <img src="<?php echo base_url()?>assets/back/assets/vendors/svg-loaders/circles.svg" class="me-4" style="width: 3rem"
                                        alt="audio">
                                        <br/>
                    <h2>Loading ...</h2>
                  </center>
                </div>
                
              </div>
        </div>
    </div>
    <!-- end modal -->
</body>
<script src="<?php echo base_url()?>assets/back/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="<?php echo base_url()?>assets/back/assets/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url()?>assets/back/assets/js/main.js"></script>

<script src="<?php echo base_url()?>assets/back/otp/jquery.min.js"></script>

<script type="text/javascript">
    
    function exec_forgetpin(){
        var forget_email = $('#forget_email').val();
        $('#modal_login').modal('show');
        $.ajax({
              url : "<?php echo base_url();?>Login/forget_pin",
              method : "POST",
              data : {
                email: forget_email
              },
              async : false,
              dataType : 'json',
              success: function(data){
                console.log(data);
                // $('#modal_login').modal('hide');
                if (data.responsecode == '00') {
                    alert('Berhasil, Periksa Email Anda');
                    // location.reload();
                    var url = "<?php echo base_url('Login');?>"
                    window.location.href = url;
                }else{
                    alert('Gagal, Silahkan mencoba kembali');
                    location.reload();
                }
              }
        });
    }
</script>
</html>