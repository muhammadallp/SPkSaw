<?php
require "include/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
    <?php require "layout/head.php";?>

    <body>
        <div id="app">
            <?php require "layout/sidebar.php";?>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-heading">
                    <h3>Penilaian</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data  Penilaian</h4>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                <form action="matrik-simpan.php" method="POST">
                        <div class="modal-body">
                            <label>Name: </label>
                            <div class="form-group">
                            <select class="form-control form-select" name="id_alternative" required>
                            <?php
                        $sql = 'SELECT id_alternative,name FROM saw_alternatives';
                        $result = $db->query($sql);
                        $i = 0;
                        while ($row = $result->fetch_object()) {
                            echo '<option value="' . $row->id_alternative . ' ">' . $row->name . '</option>';
                        }
                        $result->free();
                        ?>
                                          </select>
                            </div>
                        </div>

                    <?php
                            $query="SELECT * FROM saw_criterias";
                            $execute=$db->query($query);
                            if ($execute->num_rows > 0){
                                while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                                    echo "<div class=\"modal-body\">";
                                    echo "<label for=\"nilai\">$data[criteria]</label>";
                                    
                                    echo "<input type='hidden' value=$data[id_criteria] name='kriteria[]'>";
                                    echo "<div class=\"form-group\">";
                                    echo "<select class=\"form-control form-select\" required name=\"nilai[]\" id=\"nilai\">";
                                    echo "<option disabled selected>-- Pilih $data[criteria] --</option>";
                                    $query2="SELECT * FROM saw_nilai_kriterias WHERE id_criteria='$data[id_criteria]'";
                                    $execute2=$db->query($query2);
                                        if ($execute2->num_rows > 0){
                                            while ($data2=$execute2->fetch_array(MYSQLI_ASSOC)){
                                                echo "<option  value=\"$data2[nilai]\" required>$data2[keterangan]</option>";
                                            }
                                        }else{
                                            echo "<option disabled value=\"\">Belum ada Nilai Kriteria</option>";
                                        };
                                    echo "</select>";
                                    echo "</div></div>";
                                }
                            }
                            ?>
                                    
                                    <div class="form-group">
                                        <input name ="simpan" type="submit" class="btn btn-info btn-sm">
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </section>
                </div>
                <?php require "layout/footer.php";?>
            </div>
        </div>
        <?php require "layout/js.php";?>
    </body>

</html>