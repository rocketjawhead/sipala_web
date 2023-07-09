<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PIN - JAJANPULSA</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/pages/auth.css">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-12">
                <div id="auth-left">
                    <!-- <div class="auth-logo">
                        <a href="#"><img src="<?php echo base_url()?>assets/back/assets/images/logo/logo.png" alt="Logo"></a>
                    </div> -->
                    <center>
                    <a href="<?php echo base_url('dashboard')?>"><img style="height: 30%;width: 30%;" src="<?php echo base_url()?>assets/img/jajanpulsa_logo.png" alt="Logo"></a>
                    </center>
                    <hr/>

                    <div id="app">
                        <div class="container height-100 d-flex justify-content-center align-items-center">
                            <div class="position-relative">
                                <div class="card p-2 text-center">
                                    <h6>PIN<br></h6>
                                    <div><span> Masukkan PIN anda</span></div>
                                    <div id="pin" class="inputs d-flex flex-row justify-content-center mt-2 digit-group"> 

                                        <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="text" id="digit-1" name="digit-1" data-next="digit-2" />
                                        <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="text" id="digit-2" name="digit-2" data-next="digit-3" data-previous="digit-1" />
                                        <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="text" id="digit-3" name="digit-3" data-next="digit-4" data-previous="digit-2" />
                                        <input style="display:inline-block;padding:15px 10px;line-height:140%; border: 2px solid;" class="text-center form-control rounded" type="text" id="digit-4" name="digit-4" data-next="digit-5" data-previous="digit-3" />
                                    </div>
                                    <!-- <div class="mt-4"> <button class="btn btn-danger px-4 validate">Validate</button> </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Lupa PIN ? 
                            <a href="<?php echo base_url('Login/reset_pin')?>"class="font-bold">Reset PIN</a></p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
</body>
<script src="<?php echo base_url()?>assets/back/otp/jquery.min.js"></script>
<!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script> -->
<!-- <script  src="./script.js"></script> -->
<script type="text/javascript">
    $('.digit-group').find('input').each(function() {
        $(this).attr('maxlength', 1);
        $(this).on('keyup', function(e) {
            var parent = $($(this).parent());
            
            if(e.keyCode === 8 || e.keyCode === 37) {
                var prev = parent.find('input#' + $(this).data('previous'));
                
                if(prev.length) {
                    $(prev).select();
                }
            } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                var next = parent.find('input#' + $(this).data('next'));
                
                if(next.length) {
                    $(next).select();
                } else {
                    if(parent.data('autosubmit')) {
                        parent.submit();
                    }
                }
            }
        });
    });
</script>


<script type="text/javascript">
    $('#pin').keyup(function(){
        // var email = $('#email').val();
        var pin = $('#pin').val();
        // console.log()
        var input1 = $('#digit-1').val();
        var input2 = $('#digit-2').val();
        var input3 = $('#digit-3').val();
        var input4 = $('#digit-4').val();
        var pin = input1+input2+input3+input4;
        console.log(pin)
        if (pin.length == 4) {
            // alert('asd');
            $.ajax({
                  url : "<?php echo base_url();?>agent/pin/exec_pin",
                  method : "POST",
                  data : {
                    pin: pin
                  },
                  async : false,
                  dataType : 'json',
                  success: function(data){
                    // console.log(data);
                    if (data.responsecode == '00') {
                        var url = "<?php echo base_url('agent/Dashboard/');?>"
                        window.location.href = url;
                    }else{
                        alert("Please Check Your PIN input");
                    }
                    
                  }
            });
        }
    });
</script>