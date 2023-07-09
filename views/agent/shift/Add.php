<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Tambah Data</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Shift</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="title_shift" type="text" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Mulai Shift</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="start_shift" type="time" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Akhir Shift</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" id="end_shift" type="time" />
                    </div>
                </div>
                <hr/>
                <div class="row mb-3">
                  <!-- <label class="col-sm-2 col-form-label">Submit Button</label> -->
                  <div class="col-sm-10">
                    <a onClick="exec_form();" class="btn btn-outline-primary" >Simpan Data</a>
                  </div>
                </div>

              <!-- End General Form Elements -->

            </div>
          </div>
            <!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        
      </div>
    </section>

  </main>
  <script type="text/javascript">
    function exec_form(){

        // var payment_method = $('#payment_method').val();
        // var amount_denom = $('#amount_denom').val();

        var title_shift = $('#title_shift').val();
        var start_shift = $('#start_shift').val();
        var end_shift = $('#end_shift').val();
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Shift/insert",
            method : "POST",
            data : {
                title_shift : title_shift,
                start_shift : start_shift,
                end_shift : end_shift
            },
            async : false,
            dataType : 'json',
            success: function(data){
              // console.log(JSON.stringify(data));
              var url = '<?php echo base_url();?>agent/Shift/';
              window.location = url;
            }
          });

    }
</script>