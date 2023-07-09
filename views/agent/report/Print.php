<!DOCTYPE html>
<html>
<head>
</head>
<body>


<!-- <h2>The window.print() Method</h2> -->

<!-- <p>Click the button to print the current page.</p> -->

<button onclick="window.print()">Print this page</button>

<center>
<table style="width:80%;border: 1px solid black;
  	  border-collapse: collapse;">
  <tr>
    <td>
    <p  style="text-align: center;font-weight: bold;font-size: 20px;">REKAPITULASI BULANAN CAPAIAN PRESTASI KERJA PEGAWAI</p>
    <p  style="text-align: center;font-size: 20px;">Berdasarkan Laporan Kerja Harian Individu</p>
	</td>
  </tr>
</table>
<table style="width:80%;">
  <tr>
    <td style="width:10%;">
    	<p>NAMA</p>
    	<p>NIP</p>
    	<p>PANGKAT</p>
	</td>
	<td style="width:50%;">
    	<p>: <?php echo $fullname;?></p>
    	<p>: <?php echo $nip;?></p>
    	<p>: <?php echo $golongan;?></p>
	</td>
  </tr>
</table>
<table style="width:80%;">
  <tr>
    <td style="width:50%;">
    	<!-- <p>NAMA</p>
    	<p>NIP</p>
    	<p>PANGKAT</p> -->
	</td>
	<td style="width:25%;">
    	<p>Bulan</p>
    	<p>Jumlah Hari Kerja</p>
    	<p>Atur Jam Kerja</p>
	</td>
	<td style="width:25%;">
    	<p><?php echo date_format (new DateTime($start_date), 'Y-M');?></p>
    	<p><?php echo $total_day;?> Hari</p>
    	<p id="sum_total"></p>
	</td>
  </tr>
</table>
<table style="width:80%;width:80%;border: 1px solid black;
  	  border-collapse: collapse;">
  <tr style="border: 1px solid black;
  	  border-collapse: collapse;">
    <th style="border: 1px solid black;
  	  border-collapse: collapse;">NO</th>
    <th style="border: 1px solid black;
  	  border-collapse: collapse;">HARI/TANGGAL/BULAN/TAHUN</th> 
    <th style="border: 1px solid black;
  	  border-collapse: collapse;">JAM</th>
    <th style="border: 1px solid black;
  	  border-collapse: collapse;">MENIT</th>
    <th style="border: 1px solid black;
  	  border-collapse: collapse;">KETERANGAN HADIR</th>
  </tr>
  <?php
  $no=1;
  $json = json_encode($list_summary); 
  $json_decoded = json_decode($json); 
  foreach($json_decoded as $row){ ?>
  <tr style="text-align: center; border: 1px solid black;
  	  border-collapse: collapse;">
    <td style="border: 1px solid black;
  	  border-collapse: collapse;"><?php echo $no;?></td>
    <td style="border: 1px solid black;
  	  border-collapse: collapse;"><?php echo $row->activity_date;?></td>
    <td class="total_hour" style="border: 1px solid black;
  	  border-collapse: collapse;"><?php echo $row->total_hour;?></td>
    <td class="total_minute" style="border: 1px solid black;
  	  border-collapse: collapse;"><?php echo $row->total_minute;?></td>
    <td style="border: 1px solid black;
  	  border-collapse: collapse;"><?php echo $row->today_act_desc;?></td>
  </tr>
  <?php  $no++;}?>
</table>
</center>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
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
	$('#sum_total').text(sum_hour+' Jam '+sum_minute+' Menit');
});
</script>
</html>
