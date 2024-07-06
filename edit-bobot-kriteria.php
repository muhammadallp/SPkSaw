<?php
require "include/conn.php";
$id=$_POST['id_nilaikriteria'];
$id_criteria = $_POST['id_criteria'];
$bobot = $_POST['bobot'];
$keterangan = $_POST['keterangan'];
$sql = "UPDATE saw_nilai_kriterias SET id_criteria='$id_criteria',nilai='$bobot',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
$result = $db->query($sql);
header("location:./bobot_kriteria.php");