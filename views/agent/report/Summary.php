<link href="<?php echo base_url()?>assets_v2/select2/select2.min.css" rel="stylesheet"/>
<!-- ✅ load jQuery ✅ -->
<script src="<?php echo base_url()?>assets_v2/select2/jquery-3.6.0.min.js"></script>
<!-- ✅ load JS for Select2 ✅ -->
<script src="<?php echo base_url()?>assets_v2/select2/select2.min.js" defer></script>
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Laporan Rekap</h1>
      <!-- <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav> -->
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">


                <div class="card-body">
                  <!-- <h5 class="card-title">Tambah Data <a href="<?php echo base_url('agent/Activity/add');?>" class="btn btn-outline-primary">+</a></h5> -->
                  <div class="row" style="margin-top: 10px;margin-bottom: 20px;">
                    <h4>Filter : </h4>
                    
                    <?php if($id_position != '2'){?>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Staff</label>
                        <select class="form-control userid basic-single" style="width: 100%;" id="userid">
                            <option value="">--- Silahkan Pilih ---</option>
                            <?php
                              $json = json_encode($list_staff); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->unique_id;?>"><?php echo '['.$row->nip.'] '.$row->fullname;?></option>
                            <?php  }?>
                        </select>
                      </div>
                    </div>
                  <?php }else{ ?>

                  <input type="hidden" class="userid" id="userid" value="<?php echo $session_userid;?>">
                  <?php }?>


                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Dari</label>
                        <input type="date" id="start_date" class="form-control start_date">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">
                        <label>Ke</label>
                        <input type="date" id="end_date" class="form-control end_date">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group" style="margin-top: 20px;">
                        <a onClick="exec_filter();" class="btn btn-outline-primary btn-block" >Cari</a>
                        <a onClick="exec_print();" style="display: none;" class="btn btn-outline-success btn-block btn_print" id="btn_print" >Print</a>
                      </div>
                    </div>
                  </div>
                  <table class="table" id="table">
                    <thead>
                      <tr>
                        <!-- <th scope="col">No</th> -->
                        <th scope="col">HARI/TANGGAL/BULAN/TAHUN</th>
                        <th scope="col">JAM</th>
                        <th scope="col">MENIT</th>
                        <th scope="col">KETERANGAN HADIR</th>
                      </tr>
                    </thead>
                    <tbody id="tbdata">
                    </tbody>
                    <tbody>
                      <tr>
                        <th colspan="1" style="text-align:right">Total:</th>
                        <th colspan="1" style="text-align:center"><span id="sum_hour"></span></th>
                        <th colspan="2" style="text-align:center"><span id="sum_minute"></span></th>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div>
            <!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        
      </div>
    </section>

  </main>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<!--   <script type="text/javascript">
$(document).ready(function(){
  var sum_hour = 0;
  var sum_minute = 0;
  $(".total_hour").each(function(){
    sum_hour += parseFloat($(this).text());
  });
  $(".total_minute").each(function(){
    sum_minute += parseFloat($(this).text());
  });
  $('#sum_hour').text(sum_hour+' Jam');
  $('#sum_minute').text(sum_minute+' Menit');
});
</script> -->
<!-- <script type="text/javascript">
  $( document ).ready(function() {
    $("#btn_print").hide();
});
</script> -->
<script type="text/javascript">
    function exec_filter(){


          var userid = $('#userid').val();
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          
          $("#tbdata").html("");
          // alert(start_date,end_date);

          $.ajax({
              url : "<?php echo base_url();?>agent/Report/filter_summary",
              method : "POST",
              data : {
                  userid : userid,
                  start_date : start_date,
                  end_date : end_date   
              },
              async : false,
              dataType : 'json',
              success: function(data){
                console.log(JSON.stringify(data.Data));
                var response = data.Data;
                // drawTable(data.Data);
                $("#btn_print").show();

                //start
                $.each(response, (index, row) => {
                  const rowContent 
                  = `<tr>
                       <td>${row.activity_date}</td>
                       <td class="total_hour">${row.total_hour}</td>
                       <td class="total_minute">${row.total_minute}</td>
                       <td>${row.today_act_desc}</td>
                     </tr>`;
                  $('#tbdata').append(rowContent);
                });
                //end

              }
            });
          var sum_hour = 0;
          var sum_minute = 0;
          $(".total_hour").each(function(){
            sum_hour += parseFloat($(this).text());
          });
          $(".total_minute").each(function(){
            sum_minute += parseFloat($(this).text());
          });
          $('#sum_hour').text(sum_hour+' Jam');
          $('#sum_minute').text(sum_minute+' Menit');

    }

    function exec_print(){


          var userid = $('#userid').val();
          var start_date = $('#start_date').val();
          var end_date = $('#end_date').val();
          // alert(userid);
          var url = '<?php echo base_url();?>agent/Report/print/'+userid+'/'+start_date+'/'+end_date;
          // alert(url);
          window.location = url;

    }


</script>
<script type="text/javascript">
  $(document).ready(function () {
      $('.basic-single').select2();
      // alert('asds');
    });
</script>