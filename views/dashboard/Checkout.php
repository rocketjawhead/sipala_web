  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="services">
      <div class="row" id="page_checkout" style="margin-top: 50px;">
            <div class="icon-box-filter">
              <div id="Pulsa" class="">


                <div class="form-group">
                  <h2 id="trx_id">Transaksi</h2>
                  <p id="detail_checkout"></p>
                  <table style="width:100%">
                  <tr>
                    <td><b>Nomor Transaksi</b></td>
                    <td><b>Item</b></td>
                    <td><b>Deskripsi</b></td>
                    <td><b>Harga</b></td>
                    <td><b>Pembayaran</b></td>
                    <td><b>Status</b></td>
                  </tr>
                  <tr>
                    <td id="trx_number">14</td>
                    <td id="provider">16</td>
                    <td id="details">14</td>
                    <td id="price">10</td>
                    <td id="method_payment">Rp 10</td>
                    <td id="status">status</td>
                  </tr>
                </table>

                <hr/>
                <div class="row">
                  <div class="col-md-6">
                    <p>
                    <b>#Info Pembayaran</b><br>
                    BCA : 1660068241
                    </p>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                      <div class="col-md-6">
                        <p><b>Harga</b></p>
                        <p><b>Kode Unik</b></p>
                        <h1><b>Total</b></h1>
                      </div>
                      <div class="col-md-6">
                        <p id="price_checkout">1000</p>
                        <p id="fee">10000</p>
                        <h1 id="total">10000</h1>
                      </div>
                    </div>

                    <hr/>

                    <div id="view_upload" style="display: none;">
                    <form action="<?php echo base_url('Dashboard/upload_receipt/');?><?php echo $this->uri->segment(3);?>/payment" method="POST" enctype="multipart/form-data" data-parsley-validate class="form-horizontal form-label-left">
                      <div class="form-group">
                        <center>
                        <img id="dataimage" style="height: 10%;width: 100%;" src="<?php echo base_url()?>assets/img/bgimage.jpg"/>
                        </center>
                        <input type="file" class="form-control" onchange="btnImage(this);" required>
                        <input type="hidden" id="base64_data" readonly>
                      </div>
                      <a class="btn btn-primary btn-block" onClick="exec_upload();"><i class="bx bx-image"></i>  Upload Bukti</a>
                      <center><a onClick="cancel_upload();">Batal</a></center>

                    </form>
                    </div>
                    
                    <div id="view_checkout">
                      <a  class="btn btn-info btn-block" id="btn_upload" onClick="show_upload();"><i class="bx bx-receipt"></i>  Upload Bukti Pembayaran</a>
                      <a  class="btn btn-light btn-block" onClick="print();"><i class="bx bx-printer"></i>  Print</a>
                    </div>


                  </div>
                </div>
              </div>

            </div>
        </div>
    </div>
      <!-- end tabbar -->
    </div>

  </section><!-- End Hero -->
  <script type="text/javascript">
    $( document ).ready(function() {
      var url = $(location).attr('href');
      var segments = url.split( '/' );
      // var id = '<?php echo $this->uri->segment(3);?>';
      var id = segments[5];
      // console.log(id);
        $.ajax({
          url : "<?php echo base_url();?>Dashboard/checkout_detail",
          method : "POST",
          data : {
            trx_id: id
          },
          async : false,
          dataType : 'json',
          success: function(data){
            console.log(data.Data);
            $('#trx_id').text('Transaksi #'+data.Data.trx_id);
            $('#provider').text(data.Data.trx_op);
            $('#details').text(data.Data.trx_details);
            $('#price').text('Rp '+data.Data.trx_price.toLocaleString());
            $('#price_checkout').text('Rp '+data.Data.trx_price.toLocaleString());
            $('#fee').text('Rp '+data.Data.trx_fee.toLocaleString());
            $('#total').text('Rp '+data.Data.trx_total.toLocaleString());
            $('#trx_number').text(data.Data.trx_number);
            $('#method_payment').text(data.Data.payment_method); 
            // $('#status_name').text(data.Data.status_name); 


            var status_transaction = data.Data.status_transaction;
            var status = data.Data.status_payment;
            if (status == 'paid') {
              var status_name = data.Data.status_name;

              if (status_transaction > 0 ) {
                $('#status').text(status_name);  
              }else{
                $('#status').text('PAID - ON PROCESS');
              }

              
              $('#btn_upload').hide();
              // $('#detail_checkout').hide();
              $('#view_checkout').hide();
              $('#detail_checkout').text('Pembayaran berhasil, Terima Kasih');
              
            }else{
              console.log('upload_receipt '+data.Data.upload_receipt);
              var upload_receipt = data.Data.upload_receipt;
              if (upload_receipt == 0) {
                $('#status').text('Unpaid (Lakukan Pembayaran)');
                $('#detail_checkout').text('Silahkan melakukan pembayaran sesuai data dibawah ini');
              }else{
                $('#view_checkout').hide();
                $('#status').text('Pending (sedang diproses)');
                $('#detail_checkout').text('Pembayaran sedang diproses, mohon menunggu');
              }
              
              $('#btn_upload').show();
              $('#detail_checkout').show();
              
            }

          }
        });
    });
  </script>

  <script type="text/javascript">
    function show_upload(){
      $('#view_upload').show();
      $('#view_checkout').hide();
    }

    function cancel_upload(){
      $('#view_upload').hide();
      $('#view_checkout').show();
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
      var url = $(location).attr('href');
      var segments = url.split( '/' );
      var id = segments[5];
      // <?php echo $this->uri->segment(3);?>

      var base64image = $('#base64_data').val();

      $.ajax({
        url : "<?php echo base_url();?>Dashboard/upload_receipt",
        method : "POST",
        data : {
          trx_id: id,
          type_upload : 'payment',
          base64image : base64image
        },
        async : false,
        dataType : 'json',
        success: function(data){
          console.log(data.status);

          var status = data.status;

          if (status == 'Failed') {
            alert('Anda sudah meng-upload sebelumnya, mohon menunggu');
          }else{
            alert('Berhasil upload bukti pembayaran, mohon menunggu');
          }

          location.reload();
          }
        });
    }
  </script>
  <script type="text/javascript">
    function print() {
        var frame = document.getElementById('page_checkout');
        frame.contentWindow.focus();
        frame.contentWindow.print();
    }
  </script>


    
    