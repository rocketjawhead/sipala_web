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


              <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">SKP Unit</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control act_favorite basic-single" id="id_skp_unit">
                            <option value="">--- Silahkan Pilih ---</option>
                            <?php
                              $json = json_encode($list_skpunit); 
                              $json_decoded = json_decode($json); 
                              foreach($json_decoded as $row){ 
                            ?>
                            <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                            <?php  }?>
                        </select>
                    </div>
              </div>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Judul SKP Rencana Kinerja</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="title" type="text" />
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

        var title_jabatan = $('#title').val();
        var id_skp_unit = $('#id_skp_unit').val();

        
        
        $.ajax({
            url : "<?php echo base_url();?>agent/Skpplanning/insert",
            method : "POST",
            data : {
                title : title_jabatan,
                id_skp_unit : id_skp_unit
            },
            async : false,
            dataType : 'json',
            success: function(data){
              var url = '<?php echo base_url();?>agent/Skpplanning/';
              window.location = url;
            }
          });

    }
</script>