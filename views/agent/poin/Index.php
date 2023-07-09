<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Total Poin : <?php echo number_format($poin);?></h3>
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
                                <h4>Tukar</h4>
                            </div>
                            <hr/>
                            <div class="form-group">
                                <label>Masukkan Jumlah Poin</label>
                                <input type="number" class="form-control" value="<?php echo $poin;?>" >
                            </div>
                            <div class="form-group">
                                <label>Pilih Penukaran Poin</label>
                                <select class="form-control" id="amount_denom">
                                    <option value="">--- Silahkan Pilih ---</option>
                                    <!-- <?php
                                    $json = json_encode($list_denom); 
                                    $json_decoded = json_decode($json); 
                                    foreach($json_decoded as $row){ ?>
                                    <option value="<?php echo $row->id;?>"><?php echo 'Rp '.number_format($row->amount);?></option>
                                    <?php }?> -->
                                </select>
                            </div>

                            
                            <div class="form-group">
                                <a onClick="exec_transaction();" class="btn btn-outline-primary">Tukar Poin</a>
                                <!-- <a onClick="reset_deposit();" class="btn btn-outline-danger">Reset</a> -->
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

            


            <div class="page-heading email-application">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Riwayat Tukar Poin</h3>
                    </div>
                </div>
            </div>
            <section class="section content-area-wrapper">
                <div class="content-right">
                    <div class="content-overlay"></div>
                    <div class="content-wrapper">
                        <div class="content-header row">
                        </div>
                        <div class="content-body">
                            <!-- email app overlay -->
                            <div class="table-responsive">
                                <table class="table table-lg">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jumlah Poin</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <!-- <tbody>
                                        <?php
                                        $json = json_encode($list_history_deposit); 
                                        $json_decoded = json_decode($json); 
                                        foreach($json_decoded as $row){ ?>
                                        <tr>
                                            <td class="text-bold-500">#<?php echo $row->trx_id;?></td>
                                            <td class="text-bold-500"><?php echo 'Rp '.($row->trx_total);?></td>
                                            <td class="text-bold-500"><?php echo $row->payment_method;?></td>
                                            <td class="text-bold-500"><?php echo $row->status_payment;?></td>
                                            <td class="text-bold-500">
                                                <a href="<?php echo base_url('agent/deposit/detail/');?><?php echo $row->trx_id;?>" class="btn btn-outline-primary">Detail</a>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody> -->
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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
    function exec_transaction(){

        alert('Mohon maaf fitur ini sedang dalam pengerjaan');
        location.reload();
        // var payment_method = $('#payment_method').val();
        // var amount_denom = $('#amount_denom').val();
        
        // $.ajax({
        //     url : "<?php echo base_url();?>agent/Deposit/checkout_request",
        //     method : "POST",
        //     data : {
        //       payment_method: payment_method,
        //       amount_denom : amount_denom,
        //       type_inq : 'deposit',
        //     },
        //     async : false,
        //     dataType : 'json',
        //     success: function(data){
        //       // console.log(JSON.stringify(data));
        //       var trx_id = data.Data.trx_id;
        //       var url = '<?php echo base_url();?>agent/Deposit/detail/'+trx_id;
        //       console.log(trx_id);
        //       window.location = url;
        //     }
        //   });

    }
</script>
    