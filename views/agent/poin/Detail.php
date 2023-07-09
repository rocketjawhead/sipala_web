<div id="main">
<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
</a>
</header>

<div class="page-heading">
<h3>#<?php echo $trx_id;?></h3>
</div>
<div class="page-content">
<section class="row">
    <div class="col-12 col-lg-12">
        

        <div class="row">
            <div class="col-12">
                <div class="card">
                    
                    <div class="card-body">
                    <div class="checkout_deposit">
                        <div class="">
                            <h4>Detail Transaksi</h4>
                            <p>Nomor Transaksi : #<?php echo $trx_id;?></p>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <label>Jumlah Deposit</label>
                            <p style="font-size: 14px;"><?php echo 'Rp '.$trx_price;?></p>
                        </div>

                        <div class="form-group">
                            <label>Jenis Pembayaran</label>
                            <p style="font-size: 14px;"><?php echo $payment_method;?></p>
                        </div>

                        <div class="form-group">
                            <label>Status Pembayaran</label>
                            <p style="font-size: 14px;"><?php echo $status_payment;?></p>
                        </div>

                        <div class="form-group">
                            <label>Status Transaksi</label>
                            <p style="font-size: 14px;"><?php 
                            if($upload_receipt == '0'){
                                echo "Silahkan Upload Bukti";
                            }else{
                                if ($status_transaction == '1') {
                                  echo "Transaksi Berhasil";
                                }else{
                                  echo "Transaksi sedang diproses";
                                }
                                
                            }
                            ?></p>
                        </div>

                        <div class="form-group">
                            <label>Total Pembayaran</label>
                            <h3 style="font-weight: bold;"><?php echo 'Rp '.$trx_total;?></h3>
                        </div>

                        <?php
                        if($upload_receipt == 0){
                        ?>
                        <div id="form_upload_payment" style="display: none;">
                            <div class="form-group">
                                <img id="dataimage" style="height: 30%;width: 30%;" src="<?php echo base_url()?>assets/img/bgimage.jpg"/>
                                <br/>
                                <input type="file" style="width: 30%;" class="form-control" onchange="btnImage(this);" required>
                                <input type="hidden" id="base64_data" readonly>
                            </div>

                            <div class="form-group">
                                <a onClick="exec_upload();" class="btn btn-outline-primary">Upload</a>
                                <a onClick="cancel_upload();" class="btn btn-outline-danger">Batal</a>
                            </div>
                        </div>
                        <?php }?>

                        <div id="form_upload">
                        <div class="form-group">
                            <?php
                            if($upload_receipt == 0){
                            ?>
                            <a onClick="show_form_upload_payment();" class="btn btn-outline-primary">Upload Bukti Pembayaran</a>
                            <?php }?>
                            <a href="#" class="btn btn-outline-success">Print</a>
                        </div>
                        </div>



                    </div>

                </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">


function show_form_upload_payment(){
    $('#form_upload_payment').show();
    $('#form_upload').hide();
}
</script>
<script type="text/javascript">
function cancel_upload(){
    $('#form_upload_payment').hide();
    $('#form_upload').show();
}
</script>
<script type="text/javascript">
  function btnImage(input){
      $("#myModalone").modal('toggle');
      document.getElementById("base64_data").value = '';
      getBaseUrl();
      readDataImage(input);
      $('#myModalone').modal('hide');
      // readURLimage1(input);
  }
</script>
<script type="text/javascript">
  function readDataImage(input) {
  
  if (input.files && input.files[0]) {
      // $("#myModalone").modal('toggle');
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#dataimage')
              .attr('src', e.target.result)
              .width(500)
              .height(350);
      };
          reader.readAsDataURL(input.files[0]);
      }
  }
</script>
<script type="text/javascript">
  function getBaseUrl ()  {

        var file = document.querySelector('input[type=file]')['files'][0];
        var reader = new FileReader();
        var baseString;
        reader.onloadend = function () {
            baseString = reader.result;
            conv_basestring = baseString.replace("data:image/jpeg;base64,", "") ;
            document.getElementById("base64_data").value = conv_basestring;
        };
        reader.readAsDataURL(file);
    }
</script>
<script type="text/javascript">
function exec_upload(){
  var id = '<?php echo $trx_id;?>';
  // console.log(id);
  var base64image = $('#base64_data').val();
  // console.log(base64image);
  if (base64image.length > 0) {
        $.ajax({
            url : "<?php echo base_url();?>agent/dashboard/upload_receipt",
            method : "POST",
            data : {
              trx_id: id,
              type_upload : 'deposit',
              base64image : base64image
            },
            async : false,
            dataType : 'json',
            success: function(data){
              var status = data.status;

              if (status == 'Success') {
                alert(data.message);
                location.reload();
              }else{
                alert('Silahkan mencoba kembali');
                location.reload();
              }
            }
          });
    }else{
        alert('Mohon periksa kembali gambar bukti Pembayaran');
    }
  
}
</script>

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
</footer>
</div> -->
    