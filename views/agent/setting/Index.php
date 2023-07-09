<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Hay, <?php echo strtoupper($username);?></h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            
                        <div class="deposit">
                            <div class="">
                                <h4>Profil</h4>
                            </div>
                            <hr/>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="<?php echo $email;?>" readonly>
                            </div>

                            <div class="form-group">
                                <label>Kode Referral</label>
                                <input type="text" class="form-control" value="<?php echo $referral;?>" readonly>
                            </div>


                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" id="fullname" value="<?php echo $username;?>">
                            </div>

                            

                            <div class="form-group">
                                <a onClick="update_profile();" class="btn btn-outline-primary">Update Data</a>
                                <!-- <a onClick="reset_deposit();" class="btn btn-outline-danger">Reset</a> -->
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            
                        <div class="deposit">
                            <div class="">
                                <h4>Password</h4>
                            </div>
                            <hr/>

                            <div class="form-group">
                                <label>Password Sebelumnya</label>
                                <input type="password" class="form-control" id="password_old">
                            </div>

                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="password" class="form-control" id="password_new">
                            </div>


                            <div class="form-group">
                                <label>Password Baru Konfirmasi</label>
                                <input type="password" class="form-control" id="password_new_conf">
                            </div>

                            

                            <div class="form-group">
                                <a onClick="update_password();" class="btn btn-outline-primary">Update Password</a>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                            
                        <div class="deposit">
                            <div class="">
                                <h4>PIN</h4>
                            </div>
                            <hr/>

                            <div class="form-group">
                                <label>PIN Sebelumnya</label>
                                <input type="password" class="form-control" id="pin_old" style="width: 8%;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>

                            <div class="form-group">
                                <label>PIN Baru</label>
                                <input type="password" class="form-control" id="pin_new" style="width: 8%;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>


                            <div class="form-group">
                                <label>PIN Baru Konfirmasi</label>
                                <input type="password" class="form-control" id="pin_new_conf" style="width: 8%;" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                            </div>

                            

                            <div class="form-group">
                                <a onClick="update_pin();" class="btn btn-outline-primary">Update PIN</a>
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            

        </div>
        
    </section>
</div>

<!-- <footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>2021 &copy; Mazer</p>
        </div>
        <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                    href="http://ahmadsaugi.com">A. Saugi</a></p>
        </div>
    </div>
</footer> -->
</div>
<script type="text/javascript">

    function update_profile(){

        var fullname = $('#fullname').val();
        $.ajax({
            url : "<?php echo base_url();?>agent/Setting/update_profile",
            method : "POST",
            data : {
              fullname: fullname,
            },
            async : false,
            dataType : 'json',
            success: function(data){
                var status = data.status;
                console.log(JSON.stringify(data));
                if (status == 'Success') {
                  alert(data.message);
                  location.reload();
                }else{
                  alert(data.message);
                  location.reload();
                }
            }
          });

    }

    function update_password(){

        var password_old = $('#password_old').val();
        var password_new = $('#password_new').val();
        var password_new_conf = $('#password_new_conf').val();
        

        if (pin_new == pin_new_conf) {
            $.ajax({
                url : "<?php echo base_url();?>agent/Setting/update_password",
                method : "POST",
                data : {
                  password_old: password_old,
                  password_new : password_new,
                  password_new_conf : password_new_conf,
                },
                async : false,
                dataType : 'json',
                success: function(data){
                    var status = data.status;
                    console.log(JSON.stringify(data));
                    if (status == 'Success') {
                      alert(data.message);
                      location.reload();
                    }else{
                      alert(data.message);
                      location.reload();
                    }
                }
              });
        }else{
            alert('Password Baru tidak sama dengan Password Baru Konfirmasi');
            location.reload();
        }

    }


    function update_pin(){

        var pin_old = $('#pin_old').val();
        var pin_new = $('#pin_new').val();
        var pin_new_conf = $('#pin_new_conf').val();

        var length_pin = pin_new.length;

        if (length_pin == 4) {
            if (pin_new == pin_new_conf) {
                $.ajax({
                    url : "<?php echo base_url();?>agent/Setting/update_pin",
                    method : "POST",
                    data : {
                      pin_old: pin_old,
                      pin_new : pin_new,
                      pin_new_conf : pin_new_conf,
                    },
                    async : false,
                    dataType : 'json',
                    success: function(data){
                        var status = data.status;
                        console.log(JSON.stringify(data));
                        if (status == 'Success') {
                          alert(data.message);
                          location.reload();
                        }else{
                          alert(data.message);
                          location.reload();
                        }
                    }
                  });
            }else{
                alert('PIN Baru tidak sama dengan PIN Baru Konfirmasi');
                location.reload();
            }
        }else{
            alert('PIN lebih dari 4 angka');
                location.reload();
        }

        
        
        

    }
</script>
    