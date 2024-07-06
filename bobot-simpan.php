<?php
require "include/conn.php";
$id_criteria = $_POST['id_criteria'];
$bobot = $_POST['bobot'];
$keterangan = $_POST['keterangan'];
// $x = $db->query($sql);
// var_dump($x);
$sql = "INSERT INTO saw_nilai_kriterias (id_criteria,nilai,keterangan) VALUES ('$id_criteria','$bobot','$keterangan')";

if ($db->query($sql) === true) {
    header("location:./bobot_kriteria.php");
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

