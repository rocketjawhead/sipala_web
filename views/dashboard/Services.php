
<style>

/* Style the tab */
.tab {
  /*float: left;*/
  /*border: 1px solid #ccc;*/
  background-color: #fff;
  /*width: 30%;*/
  /*height: 300px;*/
  /*padding : 10px;*/
  border-radius: 10px;
  border-color: #fff;
  
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  /*padding: 22px 16px;*/
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
  border-radius: 10px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ECECEC;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #FF6363;
  color: #fff;
}

/* Style the tab content */
.tabcontent {
  float: left;
  /*padding: 0px 12px;*/
  width: 100%;
  /*height: 300px;*/
  border-color: #fff;
}
</style>
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
  <main id="main">


    <section id="services" class="services section-bg">
      <div class="container">

        <div class="" style="text-align:center;margin-bottom: 50px;" data-aos="fade-up">
          <h2 style="font-weight :bold;">Layanan</h2>
          <p>Keuntungan Bertransaksi Online di Beli Pulsa dan Kuota Murah - Agen Pulsa dan Kuota Termurah</p>
          <hr/>
        </div>

        <div class="row">

          <div class="col-md-3">
            <div class="tab">
              <button class="tablinks" onclick="tab_services(event, 'pulsa')" id="defaultOpen">
                  <i class="bx bx-receipt"></i>
                Pulsa</button>
              <button class="tablinks" onclick="alert_register();">
                  <i class="bx bx-receipt"></i> 
                Paket Data</button>
                <button class="tablinks" onclick="alert_register();">
                  <i class="bx bx-receipt"></i> 
                Kebutuhan Rumah</button>
                <button class="tablinks" onclick="alert_register();">
                  <i class="bx bx-receipt"></i> 
                Uang Elektronik</button>
                <button class="tablinks" onclick="alert_register();">
                  <i class="bx bx-receipt"></i> 
                Voucher Game</button>
            </div>
          </div>

          <div class="col-sm-9">
            <div id="pulsa" class="tabcontent">
              <h3>Paket Pulsa</h3>
              <input type="text" class="myInput form-control" id="input_pulsa" onkeyup="search_pulsa()" placeholder="Cari Provider" title="Type in a name">
              <table id="myTable">
                <tr class="header">
                  <th style="background-color: #FF6363;color: #fff; width: 20%;">Kode</th>
                  <th style="background-color: #FF6363;color: #fff; width: 20%;">Provider</th>
                  <th style="background-color: #FF6363;color: #fff; width: 20%;">Produk</th>
                  <th style="background-color: #FF6363;color: #fff; width: 20%;">Nominal</th>
                  <th style="background-color: #FF6363;color: #fff; width: 20%;">Harga</th>
                </tr>
              </table>
              <table id="result_pulsa" class="result_pulsa">
              </table>
            </div>

            <div id="Paris" class="tabcontent">
              <h3>Paris</h3>
              <p>Paris is the capital of France.</p> 
            </div>

            <div id="Tokyo" class="tabcontent">
              <h3>Tokyo</h3>
              <p>Tokyo is the capital of Japan.</p>
            </div>
          </div>
          

          

        </div>

      </div>
    </section>


  </main><!-- End #main -->
  <script>
function tab_services(evt, type_trx) {
  // alert(type_trx);
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(type_trx).style.display = "block";
  evt.currentTarget.className += " active";


  //hit api
  $.ajax({
      url : "<?php echo base_url();?>dashboard/pricelist/",
      method : "POST",
      data : {
        type_inq : type_trx
      },
      async : false,
          dataType : 'json',
      success: function(data){
        console.log(data);
        //set flagging

        let result = data.Data.data;
        
        var html = '';
        var i;
        var content = "<tr>"
        for(i=0; i<result.length; i++){

            if (result[i].pulsa_details == '-') {
              var pulsa_details = 'Pulsa';
            }else{
              var pulsa_details = result[i].pulsa_details;
            }
            var data_result = result[i];
            const list = document.getElementById("list_pulsa");
            // if(result[i].status == 'active'){
              // console.log(result[i].status);
              content  += '<tr><td style="width: 20%;text-align:left;">'+result[i].pulsa_code+'</td><td style="width: 20%;text-align:left;">'+result[i].pulsa_op+'</td><td style="width: 20%;text-align:left;">'+pulsa_details+'</td><td style="width: 20%;text-align:left;">'+result[i].pulsa_nominal+'</td><td style="width: 20%;text-align:left;">Rp '+result[i].pulsa_price.toLocaleString()+'</td></tr>';
            // }
            
        }
        content += "</tr>"
        $('#result_pulsa').append(content);
      }
    });

  //
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script>
function search_pulsa() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("input_pulsa");
  filter = input.value.toUpperCase();
  table = document.getElementById("result_pulsa");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

  <script>
  function alert_register() {
    alert("Mohon maaf, Layanan ini hanya untuk mitra, Ayo daftarkan diri anda menjadi mitra");
    var url = '<?php echo base_url('login')?>';
    window.location = url;
  }
  </script>