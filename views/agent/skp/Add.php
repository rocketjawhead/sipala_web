<main id="main" class="main">


    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        
          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Tambah Data</h5>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Tahun SKP</label>
                    <div class="col-md-12 col-sm-12">
                        
                        <select class="form-control" id="year_now">
                          <option value="">--- Tahun ---</option>
                          <?php
                          $year_now = date('Y');
                          for ($i=2010; $i <= $year_now; $i++) {?> 
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                          <?php }?>
                        </select>
                    </div>
                </div>


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

                <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Rencana Kinerja</label>
                      <div class="col-md-12 col-sm-12">
                          <select name="id_skp_planning" class="form-control" id="id_skp_planning" required>
                          </select>
                      </div>
                </div>

                <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Aspek</label>
                      <div class="col-md-12 col-sm-12">
                          <select class="form-control act_favorite basic-single" id="id_skp_category">
                              <option value="">--- Silahkan Pilih ---</option>
                              <?php
                                $json = json_encode($list_skpcategory); 
                                $json_decoded = json_decode($json); 
                                foreach($json_decoded as $row){ 
                              ?>
                              <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                              <?php  }?>
                          </select>
                      </div>
                </div>

                <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Indikator</label>
                      <div class="col-md-12 col-sm-12">
                          <select class="form-control act_favorite basic-single" id="id_skp_indikator">
                              <option value="">--- Silahkan Pilih ---</option>
                              <?php
                                $json = json_encode($list_skpindikator); 
                                $json_decoded = json_decode($json); 
                                foreach($json_decoded as $row){ 
                              ?>
                              <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                              <?php  }?>
                          </select>
                      </div>
                </div>


                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Minimal Target</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="min_target" type="text" />
                    </div>
                </div>

                <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Maximal Target</label>
                    <div class="col-md-12 col-sm-12">
                        <input class="form-control" name="email" id="max_target" type="text" />
                    </div>
                </div>

                <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Satuan</label>
                      <div class="col-md-12 col-sm-12">
                          <select class="form-control act_favorite basic-single" id="id_skp_satuan">
                              <option value="">--- Silahkan Pilih ---</option>
                              <?php
                                $json = json_encode($list_skpsatuan); 
                                $json_decoded = json_decode($json); 
                                foreach($json_decoded as $row){ 
                              ?>
                              <option value="<?php echo $row->id;?>"><?php echo $row->title;?></option>
                              <?php  }?>
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
          </div>

          <div class="row">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">List SKP <?php echo $this->uri->segment(4);?></h5>

                <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Rencana Kinerja</th>
                        <th scope="col">Aspek</th>
                        <th scope="col">Indikator</th>
                        <th scope="col">Min Target</th>
                        <th scope="col">Max Target</th>
                        <th scope="col">Satuan</th>
                        <!-- <th scope="col">Status</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $no=1;
                      $json = json_encode($list_skp); 
                      $json_decoded = json_decode($json); 
                      foreach($json_decoded as $row){ ?>
                      <tr>
                        <td style="text-align: center; width: 10px;"><?php echo $no;?></td>
                        <td><?php echo $row->year_now;?></td>
                        <td><?php echo $row->skp_unit;?></td>
                        <td><?php echo $row->skp_planning;?></td>
                        <td><?php echo $row->skp_category;?></td>
                        <td><?php echo $row->skp_indikator;?></td>
                        <td><?php echo $row->min_target;?></td>
                        <td><?php echo $row->max_target;?></td>
                        <td><?php echo $row->skp_satuan;?></td>
                      </tr>
                      <?php  $no++;}?>
                    </tbody>
                  </table>
                <!-- End General Form Elements -->

              </div>
            </div>
          </div>
        <!-- End Left side columns -->

        <!-- Right side columns -->
        
      </div>
    </section>

  </main>
  <script src="<?php echo base_url()?>assets_v2/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script type="text/javascript">
    function exec_form(){

        var year_now = $('#year_now').val();
        var id_skp_unit = $('#id_skp_unit').val();
        var txt_skp_unit = $('#id_skp_unit option:selected').text();

        var id_skp_planning = $('#id_skp_planning').val();
        var txt_skp_planning = $('#id_skp_planning option:selected').text();

        var id_skp_category = $('#id_skp_category').val();
        var txt_skp_category = $('#id_skp_category option:selected').text();

        var id_skp_indikator = $('#id_skp_indikator').val();
        var txt_skp_indikator = $('#id_skp_indikator option:selected').text();

        var id_skp_satuan = $('#id_skp_satuan').val();
        var txt_skp_satuan = $('#id_skp_satuan option:selected').text();

        var min_target  = $('#min_target').val();
        var max_target  = $('#max_target').val();

        
        // alert(max_target);
        $.ajax({
            url : "<?php echo base_url();?>agent/Skp/insert",
            method : "POST",
            data : {
                year_now: year_now, 
                id_skp_unit: id_skp_unit,
                txt_skp_unit: txt_skp_unit,
                id_skp_planning: id_skp_planning,
                txt_skp_planning: txt_skp_planning, 
                id_skp_category: id_skp_category,
                txt_skp_category: txt_skp_category,
                id_skp_indikator: id_skp_indikator,
                txt_skp_indikator: txt_skp_indikator,
                id_skp_satuan: id_skp_satuan,
                txt_skp_satuan: txt_skp_satuan,
                min_target: min_target,
                max_target: max_target
            },
            async : false,
            dataType : 'json',
            success: function(data){
              var url = '<?php echo base_url();?>agent/Skp/Add/'+year_now;
              window.location = url;
            }
          });

    }
</script>
<script>
$(document).ready(function(){
    $("#id_skp_unit").change(function (){
      // alert($(this));
        var url = "<?php echo site_url('agent/Skp/add_ajax_skpplanning');?>/"+$(this).val();
        $('#id_skp_planning').load(url);
        return false;
    })
});
</script>