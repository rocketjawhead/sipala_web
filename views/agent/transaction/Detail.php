<div id="main">
<header class="mb-3">
<a href="#" class="burger-btn d-block d-xl-none">
    <i class="bi bi-justify fs-3"></i>
</a>
</header>

<div class="page-heading">

<h3>Total Saldo : Rp <?php echo number_format($balance)?></h3>
<h4>#<?php echo $trx_id;?></h4>
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
                            <label>Tanggal Transaksi</label>
                            <p style="font-size: 14px;"><?php echo $trx_date;?></p>
                        </div>
                        
                        <div class="form-group">
                            <label>Nomor Tujuan</label>
                            <p style="font-size: 14px;"><?php echo $trx_number;?></p>
                        </div>

                        <div class="form-group">
                            <label>Detail Transaksi</label>
                            <p style="font-size: 14px;"><?php echo str_replace('-', 'Pulsa', $trx_details);?></p>
                        </div>

                        

                        <div class="form-group">
                            <label>Jenis Pembayaran</label>
                            <p style="font-size: 14px;">Saldo</p>
                        </div>

                        <!-- <div class="form-group">
                            <label>Status Pembayaran</label>
                            <p style="font-size: 14px;"><?php echo $status_payment;?></p>
                        </div> -->

                        <div class="form-group">
                            <label>Status Transaksi</label>
                            <p style="font-size: 14px;"><?php echo $status_name;?></p>
                        </div>

                        <div class="form-group">
                            <label>Total</label>
                            <p style="font-size: 14px;"><?php echo 'Rp '.$trx_price;?></p>
                        </div>

                        <div class="form-group">
                            <label>Kode Unik</label>
                            <p style="font-size: 14px;"><?php echo $trx_fee;?></p>
                        </div>


                        <?php if($status_payment == 'unpaid'){?>
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="number" id="sell_price" class="form-control" style="width: 30%;" placeholder="0">
                        </div>

                        <div class="form-group">
                            <label>Keuntungan</label>
                            <input type="number" id="profit" class="form-control" style="width: 30%;" placeholder="0" readonly>
                            <p id=""></p>
                        </div>
                        <?php }else{?>
                        <div class="form-group">
                            <label>Keuntungan</label>
                            <p style="font-size: 14px;"><?php echo 'Rp '.$profit_nominal;?></p>
                        </div>
                        <?php }?>


                        <div class="form-group">
                            <label>Total Pembayaran</label>
                            <h3 style="font-weight: bold;"><?php echo 'Rp '.$trx_total;?></h3>
                        </div>

                        <div id="form_upload">
                        <div class="form-group">
                            <?php if($status_payment == 'unpaid'){?>
                                <a onClick="exec_paid();" class="btn btn-outline-primary">Bayar</a>
                            <?php }?>
                            <?php if($status_payment == 'paid' && $status_transaction == '2'){?>
                                <a href="#" class="btn btn-outline-success">Print</a>
                            <?php }?>
                            <?php if($status_payment == 'paid' && $status_transaction == '1' && $is_check_status <= '2'){?>
                                <a onClick="exec_check_status();" class="btn btn-outline-success">Check Status</a>
                            <?php }?>                            
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

<!-- http://localhost/codeigniter_web/agent/transaction/detail/5133095555 -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script type="text/javascript">
function exec_paid(){
  var id = '<?php echo $trx_id;?>';
  var sell_price = $('#profit').val();

    $.ajax({
        url : "<?php echo base_url();?>agent/transaction/checkout_paid",
        method : "POST",
        data : {
          trx_id: id,
          profit : sell_price
        },
        async : false,
        dataType : 'json',
        success: function(data){
          // var status = data.status;
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
</script>
<script type="text/javascript">
function exec_check_status(){
  var trx_type = '<?php echo $trx_type;?>';
  var trx_id = '<?php echo $trx_id;?>';
  var trx_number = '<?php echo $trx_number;?>';
  var trx_code = '<?php echo $trx_code;?>';
  var trx_date = '<?php echo $payment_date;?>';
  var sell_price = $('#profit').val();

    $.ajax({
        url : "<?php echo base_url();?>agent/transaction/check_status",
        method : "POST",
        data : {
          commands: trx_type,
          ref_id : trx_id,
          hp : trx_number,
          pulsa_code : trx_code,
          trx_date : trx_date
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
</script>
<script type="text/javascript">
    $('#sell_price').keyup(function(){
        var numb_sell = $(this).val();
        var trx_total = '<?php echo $trx_total_numb;?>';
        var numb_buy = trx_total;
        // var res = ;

        $('#profit').val(numb_sell - numb_buy);
        // console.log(numb_sell);
    });
</script>