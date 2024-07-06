<?php
require "include/conn.php";

if(isset($_POST["simpan"])){
if(empty($_POST['nilai'])){

    echo "<script>alert('Data Tidak Boleh Kosong!')</script>";
    echo "<META HTTP-EQUIV='Refresh' content='1; URL=add-matrik.php'>";

    }else {
    


    $id_alternative = $_POST['id_alternative'];
    $id_criteria = $_POST['kriteria'];
    $value = $_POST['nilai'];
    
    // $makanan = $_POST['makanan'];
    $jumlah_dipilih = count($value);
    $jumlah = count($id_criteria);
     
    for($x=0;$x<$jumlah_dipilih;$x++){
        for($x=0;$x<$jumlah;$x++){
        // mysql_query("INSERT INTO makanan values('','$makanan[$x]')");
        $sql = "INSERT INTO saw_evaluations values ('','$id_alternative','$id_criteria[$x]','$value[$x]')";
        $result = $db->query($sql);

    }

    }
       if ($result === true) {
        header("location:./matrik.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
    }
    
    
 

}

