<div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <h3>Uang Elektronik</h3>
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
                                <h4>Masukkan Data Uang Elektronik</h4>
                            </div>
                            <hr/>
                            <div class="form-group">

                            <label>Pilih Ewallet</label>
                            <select class="form-control" id="choose_ewallet" onchange="choose_ewallet(this)">
                              <option value="">--- Silahkan Pilih ---</option>
                              <option value="DANA">DANA</option>
                              <option value="OVO">OVO</option>
                              <option value="GO PAY">GOPAY</option>
                              <option value="LINKAJA">LINKAJA</option>
                            </select>
                            <br/>
                            <label>Nomor Handphone</label>
                            <img id="logo_provider" src="<?php echo base_url()?>assets/logo_provider/signal.png" alt="" style="width:4%;height:4%;">
                            <br/><br/>
                            <input type="number" id="pulsa" maxlength="15" class="form-control" name="phonenumber" placeholder="85712345678">
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
  function choose_ewallet(select) {
      var get_value = select.options[select.selectedIndex].text;

      if (get_value == 'DANA') {
        $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/dana.png");
      }else if(get_value == 'OVO'){
        $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/ovo.png");
      }else if(get_value == 'GOPAY'){
        $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/gopay.png");
      }else if(get_value == 'LINKAJA'){
        $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/link_aja.png");
      }else{
        $("#logo_provider").attr("src","<?php echo base_url()?>assets/logo_provider/signal.png");
      }
  }
</script>
<script type="text/javascript">
      $('#pulsa').keyup(function(){
      var numb_prefix = $(this).val();
      
      var get_prefix = numb_prefix.substring(0, 4);
      var total_length = get_prefix.length;

      var type_inq = 'E-Money';
      //choose prefix code
      //
      // else{}
      var result_pulsa = $('#result_pulsa').text();
      var get_value_wallet = $('#choose_ewallet').val();
      console.log('wallet '+get_value_wallet);

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
        //convert data
        if (get_value_wallet == 'DANA') {
          var res_value_wallet = 'DANA';
        }else if(get_value_wallet == 'OVO'){
          var res_value_wallet = 'OVO';
        }else if(get_value_wallet == 'GO PAY'){
          var res_value_wallet = 'GO PAY';
        }else if(get_value_wallet == 'LINKAJA'){
          var res_value_wallet = 'LinkAja';
        }else{
          var res_value_wallet = '';
        }

        $('.denom_pulsa').show();
        $.ajax({
          url : "<?php echo base_url();?>agent/transaction/inquiry/",
          method : "POST",
          data : {
            provider : get_value_wallet,
            prefix_code : numb_prefix,
            type_inq : type_inq
          },
          async : false,
              dataType : 'json',
          success: function(data){

            //set flagging
            $('#result_pulsa').text('1');
            //end set flagging
            // console.log(data);
            let result = data.Data.data;
            var html = '';
            var i;
            for(i=0; i<result.length; i++){

                if (result[i].pulsa_code == '-') {
                  var pulsa_code = result[i].pulsa_code;
                }else{
                  var pulsa_code = result[i].pulsa_code;
                }
                var data_result = result[i];
                const list = document.getElementById("list_pulsa");
                if(result[i].status == 'active'){

                  
                  // GoPay E-Money
                  // OVO
                  // LinkAja
                  if (res_value_wallet == result[i].pulsa_op) {
                    list.innerHTML += '<li id="option1" onclick="goDoSomething(this);" class="list-group-item country" data-pulsa-op="'+result[i].pulsa_op+'" data-pulsa-code="'+result[i].pulsa_code+'"  data-pulsa-detail="'+pulsa_code+'" data-pulsa-price="'+result[i].pulsa_price.toLocaleString()+'" data-pulsa-nominal="'+result[i].pulsa_nominal+'" style="margin-bottom:10px;border-radius:10px;"><div class="row"><div class="col-md-10"><p><b>['+result[i].pulsa_op+'] '+pulsa_code+'</b></p>'+result[i].pulsa_nominal.toLocaleString()+'</div><div class="col-md-2"><p><b>Harga</b></p>Rp '+result[i].pulsa_price.toLocaleString()+'</div></div></li>';
                  }
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
        $('#choose_ewallet').val('');
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
            type_inq : 'E-Money'
          },
          async : false,
          dataType : 'json',
          success: function(data){
            console.log(JSON.stringify(data));
            var trx_id = data.Data.trx_id;
            var url = '<?php echo base_url();?>agent/transaction/detail/'+trx_id;
            // console.log(trx_id);
            window.location = url;
          }
        });
      }
      }

      

      
    }
  </script> 