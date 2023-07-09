<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.imageprofil {
			  position: absolute;
			  top: 80%;
			  left: 26%;
			  transform: translate(-50%, -50%);
			  font-size: 30px;
			  font-style: bold;
		}
		.fullname {
			  position: absolute;
			  top: 31%;
			  left: 15.5%;
			  transform: translate(-50%, -50%);
			  font-size: 15px;
			  font-style: bold;
			  width: 30%;
			  text-align: center;
			  /*background-color: #666;*/
		}
		.nip {
			  position: absolute;
			  top: 34%;
			  left: 15.5%;
			  transform: translate(-50%, -50%);
			  font-size: 15px;
			  font-style: bold;
			  width: 30%;
			  text-align: center;
			  /*background-color: #666;*/
		}
		.unit {
			  position: absolute;
			  top: 38%;
			  left: 15.5%;
			  transform: translate(-50%, -50%);
			  font-size: 15px;
			  font-style: bold;
			  /*height: 30%;*/
			  width: 30%;
			  text-align: center;
			  /*background-color: #666;*/
		}
		.qr {
			  position: absolute;
			  top: 57%;
			  left: 6.5%;
			  transform: translate(-50%, -50%);
			  /*font-size: 10px;*/
			  text-align: center;
			  font-style: bold;
			  height: 11%;
			  width: 7%;
		}
	</style>
</head>
<body>
	<img 
	class="imageprofil"
	src="<?php echo strtoupper($imageprofil);?>"/>
	<div class="fullname"><?php echo strtoupper($fullname);?></div>
	<div class="nip"><?php echo strtoupper($nip);?></div>
	<div class="unit"><?php echo strtoupper($unit);?></div>
	<img 
	class="qr"
	src="<?php echo strtoupper($qr_url);?>"/>
	<img 
	style="height: 30%;width: 30%;"
	src="<?php echo base_url()?>name_tag/name_tag_1.jpg"/>


</body>
</html>