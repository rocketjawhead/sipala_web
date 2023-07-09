<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Total Saldo : Rp <?php echo number_format($balance)?></h3>
</div>
<div class="page-heading">
    <h4>Prepaid / Prabayar</h4>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            
            <div class="row">

                <div class="col-2" id="pulsa_prepaid">
                    <div class="card">
                        <div class="card-body">
                        <div class="deposit">
                            <div class="">
                                <center>
                                <img src="<?php echo base_url()?>assets/img/provider/paketdata.png" alt="" style="width:50%;height:50%;">
                                <p style="font-weight: bold;">Pulsa</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-2" id="paket_data">
                    <div class="card">
                        <div class="card-body">
                        <div class="deposit">
                            <div class="">
                                <center>
                                <img src="<?php echo base_url()?>assets/img/provider/paketdata.png" alt="" style="width:50%;height:50%;">
                                <p style="font-weight: bold;">Paket Data</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-2" id="token_listrik">
                    <div class="card">
                        <div class="card-body">
                        <div class="deposit">
                            <div class="">
                                <center>
                                <img src="<?php echo base_url()?>assets/img/provider/listrik.png" alt="" style="width:50%;height:50%;">
                                <p style="font-weight: bold;">Token Listrk</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col-2" id="emoney">
                    <div class="card">
                        <div class="card-body">
                        <div class="deposit">
                            <div class="">
                                <center>
                                <img src="<?php echo base_url()?>assets/img/provider/ovo.png" alt="" style="width:50%;height:50%;">
                                <p style="font-weight: bold;">E-Money</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- <div class="col-2" id="game">
                    <div class="card">
                        <div class="card-body">
                        <div class="deposit">
                            <div class="">
                                <center>
                                <img src="<?php echo base_url()?>assets/img/provider/game.png" alt="" style="width:50%;height:50%;">
                                <p style="font-weight: bold;">Games</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    </div>
                </div> -->





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
$(document).ready(function() {
    $('#pulsa_prepaid').click(function(e) {  
      var url = '<?php echo base_url();?>agent/transaction/pulsa_prepaid/';
      window.location = url;
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#paket_data').click(function(e) {  
      var url = '<?php echo base_url();?>agent/transaction/paket_data/';
      window.location = url;
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#token_listrik').click(function(e) {  
      var url = '<?php echo base_url();?>agent/transaction/token_listrik/';
      window.location = url;
    });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#emoney').click(function(e) {  
      var url = '<?php echo base_url();?>agent/transaction/emoney/';
      window.location = url;
    });
});
</script>
    