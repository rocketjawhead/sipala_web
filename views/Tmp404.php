<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/app.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/back/assets/css/pages/error.css">
</head>

<body>
    <div id="error">


        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <img class="img-error" src="<?php echo base_url()?>assets/back/assets/images/samples/error-404.png" alt="Not Found">
                <div class="text-center">
                    <h1 class="error-title">NOT FOUND</h1>
                    <p class='fs-5 text-gray-600'>Mohon dapat mengulang lagi proses, karna URL link kadaluarsa</p>
                    <a href="<?php echo base_url('Login')?>" class="btn btn-lg btn-outline-primary mt-3">Beranda</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>