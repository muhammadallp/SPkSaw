<?php 
require "include/conn.php";
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
											
								<br><hr>Laporan Alternatif<br><?php echo " $tgl";?>
</div>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
				<tr><th >No.</th>
				<th>Nama Alternatif</th>
				<!-- <th>Nama Siswa</th>
				<th>Jurusan</th> -->

</tr>
<?php
$query="SELECT * FROM saw_alternatives";
$execute=$db->query($query);
if ($execute->num_rows > 0){
    $no=1;
    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
?>
<tr>
	<td class='td' align='center'><span class="style3"><?php echo $no; ?></span></td>

					<td ><?php echo $data['name']; ?></td>
			
</tr>
<?php
$no++;
}
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
