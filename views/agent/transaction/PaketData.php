<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Paket Data</h3>
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
                                <h4>Pulsa</h4>
                            </div>
                            <hr/>
                            <div class="form-group">

                            <label>Nomor Handphone</label>
                            <img id="logo_provider" src="<?php echo base_url()?>assets/logo_provider/signal.png" alt="" style="width:4%;height:4%;">
                            <br/><br/>
                            <input type="number" id="pulsa" maxlength="15" class="form-control" name="phonenumber" placeholder="Nomor Telephone Anda">
                            </div>
                            <p id="result_pulsa" style="display: none;">result pulsa</p>
                            <div class="form-group denom_choose_pulsa" id="denom_choose_pulsa" style="display: none;">
                              <label>Terpilih Denom <a href="#" onClick="reset_pulsa();">Reset / hapus</a></label>
                              <input type="hidden" id="pulsa_code" readonly>
                              <ul class="list-group list_item_choose" id="list_item_choose" >
                                <li class="list-group-item" style="margin-bottom:10px;border-radius:10px;">
                                  <div class="row">
                                    <div class="col-md-10">
                                      <p id="pulsa_op"><b>[telkomsel] pulsa</b></p><p style="display: none;" id="pulsa_nominal"></p>
                                      <p id="pulsa_details">pulsa 10rb</p>
                                    </div>
                                    <div class="col-md-2"><p><b>Harga</b></p>
                                    <p id="pulsa_price"></p>
                                    </div>
                                  </div>
                                </li>
                              </ul>
                            </div>

                            <!-- inquiry pulsa -->
                            <div class="form-group denom_pulsa" id="denom_pulsa" style="display: none;width: 100%;height: 500px;overflow: scroll;">
                              <label>Pilih Denom</label>
                              <div id="header">
                                <ul class="list-group" id="list_pulsa">
                                </ul>
                              </div>
                            </div>


                            <!-- detail pembelian -->
                            <div class="form-group" id="checkout_pulsa" style="display: none;">
                              <!-- <div class="col-md-12"> -->
                                <a  class="btn btn-outline-primary btn-block" onClick="submit_pulsa();"><i class="bx bx-chart"></i>  Order Sekarang</a>
                              <!-- </div> -->
                            </div>

                            <div class="form-group">
                                <!-- <a onClick="exec_deposit();" class="btn btn-outline-primary">Checkout</a> -->
                                <!-- <a onClick="reset_deposit();" class="btn btn-outline-danger">Reset</a> -->
                            </div>
                        </div>

                    </div>
                    </div>
                </div>
            </div>

        </div>
        
    </section>
</div>

</div>
<script type="text/javascript">
      $('#pulsa').keyup(function(){
      var numb_prefix = $(this).val();
      
      var get_prefix = numb_prefix.substring(0, 4);
      var total_length = get_prefix.length;

      var type_inq = 'data';
      //choose prefix code
      if (get_prefix == '0852' ||
          get_prefix == '0853' ||
          get_prefix == '0811' ||
          get_prefix == '0812' ||
          get_prefix == '0813' ||
          get_prefix == '0821' ||
          get_prefix == '0822' ||
          get_prefix == '0851' ||
          get_prefix == '0823') {

          var provider = 'telkomsel';
          $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/telkomsel.png");

        }else if(get_prefix == '0855' ||
          get_prefix == '0856' ||
          get_prefix == '0857' ||
          get_prefix == '0858' ||
          get_prefix == '0814' ||
          get_prefix == '0815' ||
          get_prefix == '0816'){
          
          var provider = 'indosat';
          $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/indosat.png");

        }else if(get_prefix == '0817' ||
          get_prefix == '0818' ||
          get_prefix == '0819' ||
          get_prefix == '0859' ||
          get_prefix == '0877' ||
          get_prefix == '0878'){
          
          var provider = 'xl';
          $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/xl.png");

        }else if(get_prefix == '0859' ||
          get_prefix == '0896' ||
          get_prefix == '0897' ||
          get_prefix == '0898' ||
          get_prefix == '0899'){

          var provider = 'three';
          $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/three.png");

        }else if(get_prefix == '0813' ||
          get_prefix == '0832' ||
          get_prefix == '0833' ||
          get_prefix == '0838'){

          var provider = 'axis';
          $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/axis.png");

        }else if(get_prefix == '0881' ||
          get_prefix == '0882' ||
          get_prefix == '0883' ||
          get_prefix == '0884' ||
          get_prefix == '0885' ||
          get_prefix == '0886' ||
          get_prefix == '0887' ||
          get_prefix == '0888' ||
          get_prefix == '0889'){
          
          var provider = 'smart';
          $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/smart.png");

        }
      //
      // else{}
      var result_pulsa = $('#result_pulsa').text();


      if (numb_prefix.length < 4) {
        $('#result_pulsa').text('0');
        $('#denom_pulsa').hide();
        $('#denom_choose_pulsa').hide();
        $('#pulsa_op').text('');
        $('#pulsa_details').text('');
        $('#pulsa_price').text('');
        $('#pulsa_code').text('');
        $('#checkout_pulsa').hide();
      }

      if (numb_prefix.length > 15) {
        alert('Nomor Handphone yang dimasukkan melebihi 15 karakter');
        $('#result_pulsa').text('0');
        $('#denom_pulsa').hide();
        $('#denom_choose_pulsa').hide();
        $('#pulsa_op').text('');
        $('#pulsa_details').text('');
        $('#pulsa_price').text('');
        $('#pulsa_code').text('');
        $('#checkout_pulsa').hide();
        $('#pulsa').val('');

      }

      if (total_length == 4 & result_pulsa == 0) {

        $('.denom_pulsa').show();
        $.ajax({
          url : "<?php echo base_url();?>agent/transaction/inquiry/",
          method : "POST",
          data : {
            provider : provider,
            prefix_code : numb_prefix,
            type_inq : type_inq
          },
          async : false,
              dataType : 'json',
          success: function(data){

            //set flagging
            $('#result_pulsa').text('1');
            //end set flagging

            let result = data.Data.data;
            var html = '';
            var i;
            for(i=0; i<result.length; i++){

                if (result[i].pulsa_details == '-') {
                  var pulsa_details = 'Pulsa';
                }else{
                  var pulsa_details = result[i].pulsa_details;
                }
                var data_result = result[i];
                const list = document.getElementById("list_pulsa");
                if(result[i].status == 'active'){
                list.innerHTML += '<li id="option1" onclick="goDoSomething(this);" class="list-group-item country" data-pulsa-op="'+result[i].pulsa_op+'" data-pulsa-code="'+result[i].pulsa_code+'"  data-pulsa-detail="'+pulsa_details+'" data-pulsa-price="'+result[i].pulsa_price.toLocaleString()+'" data-pulsa-nominal="'+result[i].pulsa_nominal+'" style="margin-bottom:10px;border-radius:10px;"><div class="row"><div class="col-md-10"><p><b>['+result[i].pulsa_op+'] '+pulsa_details+'</b></p>'+result[i].pulsa_nominal.toLocaleString()+'</div><div class="col-md-2"><p><b>Harga</b></p>Rp '+result[i].pulsa_price.toLocaleString()+'</div></div></li>';
              }
            }
          }
        });
      }else if(total_length < 4){
        $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/signal.png");
        $('.denom_pulsa').hide();
        // $('#pulsa').val('');
      }
        
      });
  </script>
<script type="text/javascript">
    function goDoSomething(identifier){     
          $('#denom_choose_pulsa').show();
          $('#denom_pulsa').hide();
          $('#pulsa_op').text($(identifier).data('pulsa-op'));
          $('#pulsa_nominal').text($(identifier).data('pulsa-nominal'));
          $('#pulsa_details').text($(identifier).data('pulsa-detail'));
          $('#pulsa_price').text('Rp '+$(identifier).data('pulsa-price')); 
          $('#pulsa_code').val($(identifier).data('pulsa-code')); 
          $('#checkout_pulsa').show();
      }
  </script>
  <script type="text/javascript">
    function reset_pulsa(){
        $('#pulsa').val('');
        $('#denom_pulsa').hide();
        $('#denom_choose_pulsa').hide();
        $('#pulsa_op').text('');
        $('#pulsa_details').text('');
        $('#pulsa_price').text('');
        $('#pulsa_code').text('');
        $('#checkout_pulsa').hide();
    }
  </script>
  <script type="text/javascript">
    function submit_pulsa(type){

      var pulsa_code = $('#pulsa_code').val();
      var pulsa_number = $('#pulsa').val();
      //
      var pulsa_op = $('#pulsa_op').text();
      var pulsa_details = $('#pulsa_details').text();
      var pulsa_price = $('#pulsa_price').text();
      //

      console.log('pulsa_code '+pulsa_code);
      console.log('pulsa_number '+pulsa_number);

      if (pulsa_number.length <= 10) {
        alert('Nomor kurang dari 11 digit');
      }else{
        if (pulsa_code == '' || pulsa_code == null || pulsa_number == '' || pulsa_number == null) {
        alert('Please check your phonenumber & choose right denom !');
      }else{
        $.ajax({
          url : "<?php echo base_url();?>agent/transaction/checkout_req",
          method : "POST",
          data : {
            trx_code: pulsa_code,
            provider : pulsa_op,
            trx_number : pulsa_number,
            type_inq : 'data'
          },
          async : false,
          dataType : 'json',
          success: function(data){
            console.log(JSON.stringify(data));
            var trx_id = data.Data.trx_id;
            var url = '<?php echo base_url();?>agent/transaction/detail/'+trx_id;
            console.log(trx_id);
            window.location = url;
          }
        });
      }
      }

      

      
    }
  </script> 