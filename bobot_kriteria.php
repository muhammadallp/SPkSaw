<!DOCTYPE html>
<html lang="en">
    <?php
require "layout/head.php";
require "include/conn.php";
?>

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
                    <h3>Bobot Kriteria</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-12">
                            <div class="card">

                                <div class="card-header">
                                    <h4 class="card-title">TBobot Kriteria</h4>
                                </div>
                                <div class="card-content">
                                    <!-- <div class="card-body">
                                        <p class="card-text">
                                            Data-data mengenai kandidat yang akan dievaluasi di representasikan dalam
                                            tabel berikut:
                                        </p>
                                    </div> -->
                                    <button type="button" class="btn btn-outline-success btn-sm m-2" data-bs-toggle="modal"
                                        data-bs-target="#inlineForm">
                                        Tambah Bobot Kriteria
                                    </button>
                                    <hr>
                                    <div class="table-responsive">
                                        <table class="table table-striped mb-0">
                                            <caption>
                                                Tabel Alternatif A<sub>i</sub>
                                            </caption>
                                            <tr>
                                                <th>No</th>
                                                <th>Kriteria</th>
                                                <th>Bobot</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
$sql = 'SELECT * FROM saw_nilai_kriterias INNER JOIN saw_criterias ON saw_nilai_kriterias.id_criteria=saw_criterias.id_criteria';
$result = $db->query($sql);
$i = 0;
while ($row = $result->fetch_object()) {
    echo "<tr>
        <td class='right'>" . (++$i) . "</td>
        <td class='center'>{$row->criteria}</td>
        <td class='center'>{$row->nilai}</td>
        <td class='center'>{$row->keterangan}</td>
        <td>
        <button type='button' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#edit$row->id_nilaikriteria'>Edit</button>
        <a class='btn btn-danger' href='hapus-bobot-kriteria.php?id={$row->id_nilaikriteria}'>Hapus</a>
        </td>
      </tr>\n";
}
$result->free();
?>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php require "layout/footer.php";?>
            </div>
        </div>
        <div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Bobot Kriteria</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="bobot-simpan.php" method="POST">
                        <div class="modal-body">
                            <label>Kriteria: </label>
                            <!-- <div class="form-group">
                                <input type="text" name="name" placeholder="Nama Kandidat..." class="form-control"
                                    required>
                            </div> -->
                            <select class="form-select" name="id_criteria" aria-label="Default select example">
                            <option selected>Open this select menu</option>

                            <?php
                            $sql = 'SELECT * FROM saw_criterias ';
                            $result = $db->query($sql);
                            $i = 0;
                            while ($row = $result->fetch_object()) {
                                echo "<tr>
                                <option value='{$row->id_criteria}'>{$row->criteria}</option>
                                </tr>\n";
                            }
                            $result->free();
                            ?>
                            </select>
                        
                            <label>Bobot: </label>
                            <div class="form-group">
                                <input type="text" name="bobot" placeholder="Nama Kandidat..." class="form-control"
                                    required>
                            </div>
    
                            <label>Keterangan: </label>
                            <div class="form-group">
                                <input type="text" name="keterangan" placeholder="Nama Kandidat..." class="form-control"
                                    required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" name="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php
                        
        $i = 0;
        $sql = 'SELECT * FROM saw_nilai_kriterias INNER JOIN saw_criterias ON saw_nilai_kriterias.id_criteria=saw_criterias.id_criteria';
        $result = $db->query($sql);
        while ($row = $result->fetch_object()) { ?>
        <div class="modal fade text-left" id="edit<?= $row->id_nilaikriteria; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Edit Data Bobot Kriteria</h4>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="edit-bobot-kriteria.php" method="POST">
                        <div class="modal-body">
                            <label>Kriteria: </label>
                            <!-- <div class="form-group">
                                <input type="text" name="name" placeholder="Nama Kandidat..." class="form-control"
                                    required>
                            </div> -->
                            <select class="form-select" name="id_criteria" aria-label="Default select example">
                            <option  name="id_criteria" value ="<?= $row->id_criteria; ?>" selected><?= $row->criteria; ?></option>
                            <?php
                            $sql1 = 'SELECT * FROM saw_criterias ';
                            $result1 = $db->query($sql1);
                            $i = 0;
                            while ($row1 = $result1->fetch_object()) {
                                echo "<tr>
                                <option value='{$row1->id_criteria}'>{$row1->criteria}</option>
                                </tr>\n";
                                }
                                $result1->free();
                                ?>
                            </select>
                            <input type="hidden" name="id_nilaikriteria" value ="<?= $row->id_nilaikriteria; ?>">
                        
                            <label>Bobot: </label>
                            <div class="form-group">
                                <input type="text" name="bobot" class="form-control" value ="<?= $row->nilai; ?>"required>
                            </div>
    
                            <label>Keterangan: </label>
                            <div class="form-group">
                                <input type="text" name="keterangan" class="form-control" value ="<?= $row->keterangan; ?>"required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" name="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <?php }
        $result->free();
        ?>
        
        <?php require "layout/js.php";?>
    </body>

</html>