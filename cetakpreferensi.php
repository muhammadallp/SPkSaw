<?php 
require "include/conn.php";
require "W.php";
require "R.php";
$tgl = date('d M Y');

?>
<?php
error_reporting(false);
 session_start();
?>
<body onLoad="javascript:print()"> 
<style type="text/css">
<!--
.style3 {font-size: 12px}
-->
.style5 {font-size: 24px}
</style>

<div class="panel-heading">
                            <table width="100%">
							<tr>
								<td>
									<img src="assets/images/logo.png" alt="" width='100px'>

								</td>
								<td>
									<div align="center">
								
							<b>KOPI ALKO KAYU ARO<br>JL Batang Singir. No 2, RT 02, Batang Singir. KAyu Aro, Kerinci. Jambi</b>
							</div>
								
							 </td>
							</tr>
							</table>
							<div align="center">
											
								<br><hr>Laporan Hasil Pemilihan Kopi Terbaik<br><?php echo " $tgl";?>
</div>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">

  <tr>
    <th>No</th>
    <th>Alternatif</th>
    <th>Hasil</th>
  </tr>
  <?php

$P = array();
$m = count($W);
$no = 0;
foreach ($R as $i => $r) {
    for ($j = 0; $j < $m; $j++) {
        $P[$i] = (isset($P[$i]) ? $P[$i] : 0) + $r[$j] * $W[$j];
    }
    echo "<tr class='center'>
            <td>" . (++$no) . "</td>
            <td>A{$i}</td>
            <td>{$P[$i]}</td>
          </tr>";
}
?>
</table>
<br>


<table width="100%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF" >
<tr>
	<td width="63%" bgcolor="#FFFFFF">
		<p align="center"></p><br/>
	</td>
 	<td width="37%" bgcolor="#FFFFFF">
		 
 		<div align="center">Kopi Alko Kayu Aro <?php $tgl = date('d M Y');
		echo " $tgl";?><br/>
		CEO Kopi Alko kayu Aro
		<br/><br/>
		<br/><br/>
		<br/><br/>

        (.......................)
		</div>
	</td>
</tr>
</table> 
