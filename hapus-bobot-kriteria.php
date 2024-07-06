<?php
require "include/conn.php";
$id = $_GET['id'];
mysqli_query($db, "delete from saw_nilaikriteria where id_nilaikriteria='$id'");
header("location:./bobot_kriteria.php");
