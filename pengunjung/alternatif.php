<?php 
require "../include/conn.php";

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Home Comforts</title>
    <link rel="stylesheet" href="../assets/css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Orbitron:regular,500,600,700,800,900" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link rel="shortcut icon" href="../assets/images/OIP.jpg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../assets/css/app.css">
</head>
  <body>
    <section>
      <header>
        <h2>Alternatif Comforts</h2>
        <nav>
          <a href="../home.php">Home</a>
          <a href="alternatif.php">Alternatif</a>
          <a href="kriteria.php">kriteria</a>
          <a href="hasil.php">Hasil</a>
          <a href="../login.php">Login</a>
        </nav>
      </header>
      <table class="table" border="1">
      <caption>
        Tabel Alternatif A<sub>i</sub>
     </caption>
  <thead>
    <tr>
      <th >Nomor</th>
      <th>Alternatif</th>
      <!-- <th >Last</th> -->
      <!-- <th >Handle</th> -->
    </tr>
  </thead>
  <tbody>
  <?php
$sql = 'SELECT id_alternative,name FROM saw_alternatives';
$result = $db->query($sql);
$i = 0;
while ($row = $result->fetch_object()) {
    echo "<tr>
        <td class='right'>" . (++$i) . "</td>
        <td class='center'>{$row->name}</td>

      </tr>\n";
}
$result->free();
?>
    <!-- <tr>
      <th >1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th >2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr> -->

  </tbody>
</table>





      <footer>
        <div class="links">
        <a href="#">Facebook</a>
        <a href="#">Email</a>
        <a href="#">Instagram</a>
        </div>
        <span>Copyright 2022</span>
      </footer>
    </section>
  </body>

  <script src="../assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendors/apexcharts/apexcharts.js"></script>
<script src="../assets/js/pages/dashboard.js"></script>

<script src="../assets/js/main.js"></script>
</html>
