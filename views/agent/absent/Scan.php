<main id="main" class="main">

    <div class="pagetitle">
      <h1>Scan QR</h1>
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
                <main>
                  <div id="reader"></div>
                  <!-- <div id="result"></div> -->
                </main>
              </div>
            </div>
            <!-- End Recent Sales -->



          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        
      </div>
    </section>

  </main>
  <script src="<?php echo base_url()?>assets_v2/scanqr/html5-qrcode.min.js"></script>
  <script type="text/javascript">
    const scanner = new Html5QrcodeScanner('reader', {
      // Scanner will be initialized in DOM inside element with id of 'reader'
      qrbox: {
        width: 250,
        height: 250,
      },  // Sets dimensions of scanning box (set relative to reader element width)
      fps: 20, // Frames per second to attempt a scan
      cameraId: "environment" 
    });


    scanner.render(success, error);
    // Starts scanner

    function success(result) {

      
      var url = '<?php echo base_url();?>agent/User/find_user/'+result;
      window.location.href = url;   
      // document.getElementById('result').innerHTML = `
      //   <h2>Success!</h2>
      //   <p><a href="${result}">${result}</a></p>
      //   `;
      
      // Prints result as a link inside result element

      scanner.clear();
      // Clears scanning instance

      document.getElementById('reader').remove();
      // Removes reader element from DOM since no longer needed

    }

    function error(err) {
      // console.error(err);
      // Prints any errors to the console
    }
  </script>