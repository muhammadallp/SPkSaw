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
											
								<br><hr>Laporan Pemilihan Kopi Terbaik<br><?php echo " $tgl";?>
</div>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">
<!-- <table class="table table-striped mb-0"> -->
    <!-- <caption align="left"> -->
       <b> Matrik Keputusan(X)</b>
    <!-- </caption> -->
    <tr>
        <th rowspan='2'>Alternatif</th>
        <th colspan='6'>Kriteria</th>
    </tr>
    <tr>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th colspan="2">C5</th>
    </tr>
    <?php
$sql = "SELECT
          a.id_alternative,
          b.name,
          SUM(IF(a.id_criteria=1,a.value,0)) AS C1,
          SUM(IF(a.id_criteria=2,a.value,0)) AS C2,
          SUM(IF(a.id_criteria=3,a.value,0)) AS C3,
          SUM(IF(a.id_criteria=4,a.value,0)) AS C4,
          SUM(IF(a.id_criteria=5,a.value,0)) AS C5
        FROM
          saw_evaluations a
          JOIN saw_alternatives b USING(id_alternative)
        GROUP BY a.id_alternative
        ORDER BY a.id_alternative";
$result = $db->query($sql);
$X = array(1 => array(), 2 => array(), 3 => array(), 4 => array(), 5 => array());
while ($row = $result->fetch_object()) {
    array_push($X[1], round($row->C1, 2));
    array_push($X[2], round($row->C2, 2));
    array_push($X[3], round($row->C3, 2));
    array_push($X[4], round($row->C4, 2));
    array_push($X[5], round($row->C5, 2));
    echo "<tr class='center'>
            <th>A<sub>{$row->id_alternative}</sub> {$row->name}</th>
            <td>" . round($row->C1, 2) . "</td>
            <td>" . round($row->C2, 2) . "</td>
            <td>" . round($row->C3, 2) . "</td>
            <td>" . round($row->C4, 2) . "</td>
            <td>" . round($row->C5, 2) . "</td>

          </tr>\n";
}
$result->free();

?>
</table>
<br>
<table id='theList' border=1 width='100%' class='table table-bordered table-striped' cellspacing="0">

<!-- <table class="table table-striped mb-0"> -->
    <!-- <caption> -->
        <b> Matrik Ternormalisasi (R)</b>
    <!-- </caption> -->
    <tr>
        <th rowspan='2'>Alternatif</th>
        <th colspan='5'>Kriteria</th>
    </tr>
    <tr>
        <th>C1</th>
        <th>C2</th>
        <th>C3</th>
        <th>C4</th>
        <th>C5</th>
    </tr>
    <?php
$sql = "SELECT
          a.id_alternative,
          SUM(
            IF(
              a.id_criteria=1,
              IF(
                b.attribute='benefit',
                a.value/" . max($X[1]) . ",
                " . min($X[1]) . "/a.value)
              ,0)
              ) AS C1,
          SUM(
            IF(
              a.id_criteria=2,
              IF(
                b.attribute='benefit',
                a.value/" . max($X[2]) . ",
                " . min($X[2]) . "/a.value)
               ,0)
             ) AS C2,
          SUM(
            IF(
              a.id_criteria=3,
              IF(
                b.attribute='benefit',
                a.value/" . max($X[3]) . ",
                " . min($X[3]) . "/a.value)
               ,0)
             ) AS C3,
          SUM(
            IF(
              a.id_criteria=4,
              IF(
                b.attribute='benefit',
                a.value/" . max($X[4]) . ",
                " . min($X[4]) . "/a.value)
               ,0)
             ) AS C4,
          SUM(
            IF(
              a.id_criteria=5,
              IF(
                b.attribute='benefit',
                a.value/" . max($X[5]) . ",
                " . min($X[5]) . "/a.value)
               ,0)
             ) AS C5
        FROM
          saw_evaluations a
          JOIN saw_criterias b USING(id_criteria)
        GROUP BY a.id_alternative
        ORDER BY a.id_alternative
       ";
$result = $db->query($sql);
$R = array();
while ($row = $result->fetch_object()) {
    $R[$row->id_alternative] = array($row->C1, $row->C2, $row->C3, $row->C4, $row->C5);
    echo "<tr class='center'>
            <th>A{$row->id_alternative}</th>
            <td>" . round($row->C1, 2) . "</td>
            <td>" . round($row->C2, 2) . "</td>
            <td>" . round($row->C3, 2) . "</td>
            <td>" . round($row->C4, 2) . "</td>
            <td>" . round($row->C5, 2) . "</td>
          </tr>\n";
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
