<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Recent Sales -->
            <div class="card">
            <div class="card-body">
              <h5 class="card-title">Perbarui Data</h5>

              <!-- General Form Elements -->
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Unit</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="title" type="text" value="<?php echo $title;?>" />
                    </div>
                </div>
                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Judul Unit</label>
                    <div class="col-md-12 col-sm-12">
                        <select class="form-control" id="status">
                          <option value="<?php echo $status;?>">Data Terpilih : <?php if($status == '1'){ echo 'Aktif';}else{echo 'Tidak Aktif';}?></option>
                          <option value="1">Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        </select>
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

        var id = '<?php echo $id;?>';
        var title = $('#title').val();
        var status = $('#status').val();

        $.ajax({
            url : "<?php echo base_url();?>agent/Unit/update",
            method : "POST",
            data : {
                id : id,
                title : title,
                status : status
            },
            async : false,
            dataType : 'json',
            success: function(data){
              var url = '<?php echo base_url();?>agent/Unit/';
              window.location = url;
            }
          });

    }
</script>