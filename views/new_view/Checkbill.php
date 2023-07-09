<style>
        .myInput {
          background-image: url('<?php echo base_url()?>assets/img/searchicon.png');
          background-position: 10px 10px;
          background-repeat: no-repeat;
          width: 100%;
          font-size: 16px;
          padding: 12px 20px 12px 40px;
          border: 1px solid #ddd;
          margin-bottom: 12px;
        }
        
        #myTable {
          /*border-collapse: collapse;*/
          width: 100%;
          border: 1px solid #ddd;
          /*font-size: 18px;*/
        }
        
        #myTable th, #myTable td {
          text-align: left;
          padding: 12px;
        }
        
        #myTable tr {
          border-bottom: 1px solid #ddd;
        }
        
        #myTable tr.header, #myTable tr:hover {
          background-color: #f1f1f1;
        }
        
        #result_pulsa {
          /*border-collapse: collapse;*/
          width: 100%;
          border: 1px solid #ddd;
          /*font-size: 18px;*/
        }
        
        #result_pulsa th, #result_pulsa td {
          text-align: left;
          padding: 12px;
        }
        
        #result_pulsa tr {
          border-bottom: 1px solid #ddd;
        }
        
        #result_pulsa tr.header, #result_pulsa tr:hover {
          background-color: #f1f1f1;
        }
    </style>
<section id="pricing">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-12 text-center align-item-center text-md-start">
              <!-- <h4 class="fw-normal fs-3" data-zanim-xs='{"delay":0.3}' data-zanim-trigger="scroll">Cek Pembayaran</h4> -->
              <!-- <p class="fs-0 pe-xl-8" data-zanim-xs='{"delay":0.5}' data-zanim-trigger="scroll">Keuntungan Jual Pulsa Online dan Cara Memulainya</p> -->
              <div class="row align-items-center mt-7">
                <!-- start here -->
                <div class="row" id="page_checkout" style="margin-top: 50px;">
                  <!-- <div class="icon-box-filter"> -->

                    <div class="col-sm-4">
                      <div id="Pulsa">
                        <div class="form-group">
                          <h4 class="fw-normal fs-3" data-zanim-xs='{"delay":0.3}' data-zanim-trigger="scroll">Cek Pembayaran</h4>
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

                        <hr/>
                        <div class="form-group">
                          <a id="btn_inquiry" onClick="exec_inquiry();" class="btn btn-info btn-sm">Cek Pembayaran</a>
                          <a href="<?php echo base_url('Dashboard/checkbill/')?>" class="btn btn-danger btn-sm">Reset</a>
                        </div>

                      </div>
                    </div>
                    <div class="col-sm-8">
                      <div id="List">
                        <div class="form-group">
                          <h4 class="fw-normal fs-3" data-zanim-xs='{"delay":0.3}' data-zanim-trigger="scroll">Daftar Transaksi</h4>
                          <hr/>
                        </div>
                        
                        <table style="width:100%" id="tab">
                          <tr>
                              <td><b>Nomor Tujuan</b></td>
                              <td><b>Transaksi</b></td>
                              <td><b>Tanggal</b></td>
                              <td><b>Status</b></td>
                              <!-- <td><b>Detail</b></td> -->
                            </tr>
                          <tr id="list_bill">
                            <!-- foreach list -->
                          </tr>
                        </table>
                      </div>
                    </div>





                    
                    
                  <!-- </div> -->
            </div>
              </div>
              <!-- <div class="d-flex justify-content-space-between align-item-center my-3 mt-2">
                <div>
                  <h4 class="fw-normal fs-1">Drive</h4>
                  <p class="my-1 fs-0 pe-xl-8">Drive when you want. Find ooprtunities around you.</p>
                </div>
                
                <div>
                  <h4 class="fw-normal fs-1">Ride</h4>
                  <p class="my-1 fs-0 pe-xl-8">Tap your phone. Get where you're headed</p>
                </div>
              </div> -->
              <!-- <button class="btn btn-sm btn-primary my-4 me-1" href="#!" role="button">Daftar</button><a class="btn btn-sm my-2 btn-default" href="#" role="button">Questions? Talk to our team<i class="fas fa-arrow-right ms-2"></i></a> -->
            </div>
            <!-- <div class="col-md-6 mb-4"><img class="w-100" src="assets/img/illustration/4.png" alt="..." /></div> -->
          </div>
        </div><!-- end of .container-->
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
                  // .append($('<td>').append('<a href="<?php echo base_url('Dashboard/checkout/')?>'+trx_id+'" class="btn btn-info btn-sm">Lihat</a>'))
                )
            }
            }else{
              alert('Data tidak ditemukan');
            }
            

          }
      });
    }
  </script>