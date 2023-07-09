  <!-- ======= Hero Section ======= -->

  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="services">
      <div class="row" id="page_checkout" style="margin-top: 50px;">
            <!-- <div class="icon-box-filter"> -->

              <div class="col-sm-4">
                <div id="Pulsa">
                  <div class="form-group">
                    <h2>Cek Pembayaran</h2>
                  </div>
                  <hr/>
                  <div class="form-group">
                    <label><b>Nomor Tujuan</b></label>
                    <input type="number" id="txt_trx_number" class="form-control">
                  </div>

                  <div class="form-group">
                    <label><b>Jenis Transaksi</b></label>
                    <select class="form-control" id="txt_trx_type">
                      <option value="">--- Jenis Transaksi ---</option>
                      <option value="pulsa">Pulsa</option>
                      <option value="data">Paket Data</option>
                      <option value="listrik">listrik</option>
                      <option value="game">game</option>
                      <option value="air">air</option>
                      <option value="bpjs">bpjs</option>
                      <option value="emoney">emoney</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <label><b>Tanggal Transaksi</b></label>
                    <input type="date" class="form-control" id="txt_trx_date">
                  </div>


                  <div class="form-group">
                    <a id="btn_inquiry" onClick="exec_inquiry();" class="btn btn-info btn-sm">Cek Pembayaran</a>
                    <a href="<?php echo base_url('Dashboard/checkbill/')?>" class="btn btn-danger btn-sm">Reset</a>
                  </div>

                </div>
              </div>
              <div class="col-sm-8">
                <div id="List">
                  <div class="form-group">
                    <h2 id="trx_id">Daftar Transaksi </h2>
                    <hr/>
                  </div>
                  
                  <table style="width:100%" id="tab">
                    <tr>
                        <td><b>Nomor Tujuan</b></td>
                        <td><b>Transaksi</b></td>
                        <td><b>Tanggal</b></td>
                        <td><b>Status</b></td>
                        <td><b>Detail</b></td>
                      </tr>
                    <tr id="list_bill">
                      <!-- foreach list -->
                    </tr>
                  </table>
                </div>
              </div>





              
              
            <!-- </div> -->
      </div>
      <!-- end tabbar -->
    </div>

  </section>

  <script type="text/javascript">
    function exec_inquiry(){

      var txt_trx_number = $('#txt_trx_number').val();
      var txt_trx_date = $('#txt_trx_date').val();
      var txt_trx_type = $('#txt_trx_type').val();

      $.ajax({
          url : "<?php echo base_url();?>Dashboard/check_bill_inquiry",
          method : "POST",
          data : {
            trx_number: txt_trx_number,
            trx_type: txt_trx_type,
            trx_date: txt_trx_date
          },
          async : false,
          dataType : 'json',
          success: function(data){
            console.log(data);
            let result = data.Data;

            var result_length = result.length;

            var html = '';
            var i;
            if (result_length > 0) {
              for(i=0; i<result.length; i++){

                var data_result = result[i];

                console.log('data result -'+JSON.stringify(data_result));
                
                var trx_id = result[i].trx_id;
                var status_transaction = result[i].status_transaction;
                if (status_transaction == 0) {
                  var status = 'proses (pending)';
                }else{
                  var status = 'sukses';
                }

                var trx_number = result[i].trx_number;
                var trx_type = result[i].trx_type;
                var trx_date = result[i].trx_date;
                var status_payment = result[i].status_payment;
                var _concate_status = status_payment+'-'+status;
                // const list = document.getElementById("list_bill");
                // list.innerHTML += '<td>'+result[i].trx_number+'</td><td>'+result[i].trx_type+'</td><td>'+result[i].trx_date+'</td><td>'+_concate_status+'</td><td><a href=""><p>Cek Detail</p></a></td>';

                $('#tab').append($('<tr>')
                  .append($('<td>').append(trx_number))
                  .append($('<td>').append(trx_type))
                  .append($('<td>').append(trx_date))
                  .append($('<td>').append(_concate_status))
                  .append($('<td>').append('<a href="<?php echo base_url('Dashboard/checkout/')?>'+trx_id+'" class="btn btn-info btn-sm">Lihat</a>'))
                )
            }
            }else{
              alert('Data tidak ditemukan');
            }
            

          }
      });
    }
  </script>


    
    