<?php
require_once('../../login/connection.php');
if ($_POST['delete_id']) {
    $id = $_POST['delete_id'];
    $sql = mysqli_query($mysqli, "SELECT * FROM tb_santunan where jenis_santunan = '$id' limit 1");
    foreach ($sql as $row1) {
        $jenis_santunan = $row1['jenis_santunan'];
        $kategori = $row['kategori'];
        $sql1 = mysqli_query($mysqli, "SELECT * FROM tb_santunan where kategori='Darat/Laut' AND jenis_santunan = '$jenis_santunan'");
        while ($row2 = mysqli_fetch_array($sql1)) {
            $kategori2 = $row2['kategori'];
        }
        $sql2 = mysqli_query($mysqli, "SELECT * FROM tb_santunan where kategori='Udara' AND jenis_santunan = '$jenis_santunan'");
        while ($row3 = mysqli_fetch_array($sql2)) {
            $kategori3 = $row3['kategori'];
        }
        if ($kategori2 == "") {
            $a = "d-none";
        } elseif ($kategori3 == "") {
            $b = "d-none";
        }


?>
        <div class="col-sm-12 row d-flex justify-content-center">
            <form class="row" action="delete.php" method="post">
                <div class="col-md-12 row">
                    <div class="custom-control custom-radio mb-5 <?= $a; ?>">
                        <input type="hidden" name="jenis_santunan" value="<?= $jenis_santunan; ?>">
                        <input type="radio" id="customRadio1" name="kategori" value="Darat/Laut" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadio1">Darat/Laut</label>
                    </div>
                    <div class="custom-control custom-radio mb-5 <?= $b; ?>">
                        <input type="radio" id="customRadio2" name="kategori" value="Udara" class="custom-control-input" required>
                        <label class="custom-control-label" for="customRadio2">Udara</label>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <div class="col-md-12 offset-md-3">
                        <button align="center" type="submit" class="btn btn-danger"><i class="dw dw-trash"> Hapus</i></button>
                    </div>
                </div>
            </form>
        </div>
    <?php
    }
    ?>

<?php
}
?>