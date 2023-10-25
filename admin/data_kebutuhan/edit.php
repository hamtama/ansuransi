<?php
require_once('../../login/connection.php');
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = mysqli_query($mysqli, "SELECT * FROM tb_santunan where id_santunan = '$id'");
    foreach ($sql as $row1) {
        $jenis_santunan = $row1['jenis_santunan'];
?>
        <div class="col-sm-12 row d-flex justify-content-center">
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="customRadio1" name="kategori" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio1">Darat/Laut</label>
            </div>
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="customRadio2" name="kategori" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio2">Udara</label>
            </div>
        </div>
        <?php
        $sql2 = mysqli_query($mysqli, "SELECT * FROM tb_santunan where jenis_santunan = '$jenis_santunan'");
        foreach ($sql2 as $baris) {
            $id2 = $baris['id_santunan'];
            $kategori = str_replace('/', '', $baris['kategori']);
        ?>
            <div class="<?= $kategori; ?>">

                <form class="needs-validation" method="POST" action="aksiedit.php">
                    <div class="form-group">
                        <label>Jenis Santunan</label>
                        <input type="hidden" name="id" value="<?= $id2; ?>">
                        <input class="form-control" type="text" name="jenis_santunan<?= $id2; ?>" value="<?= $baris['jenis_santunan']; ?>" placeholder="Jenis Santunan" required>
                    </div>
                    <?php
                    if ($kategori == "DaratLaut") {
                        $c = "checked";
                    } else {
                        $c = "";
                    }
                    if ($kategori == "Udara") {
                        $d = "checked";
                    } else {
                        $d = "";
                    }
                    ?>
                    <div class="col-md-6 col-sm-12">
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="kategori1" <?= $d; ?> name="kategori<?= $id2; ?>" value="Udara" class="custom-control-input" required>
                            <label class="custom-control-label" for="kategori1">Udara</label>
                        </div>
                        <div class="custom-control custom-radio mb-5">
                            <input type="radio" id="kategori2" <?= $c; ?> name="kategori<?= $id2; ?>" value="Darat/Laut" class="custom-control-input" required>
                            <label class="custom-control-label" for="kategori2">Darat/Laut</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Santunan</label>
                        <input class="form-control" type="text" name="currency-field<?= $id2; ?>" id="currency-field" value="<?= $baris['santunan']; ?>" data-type="currency" placeholder="Rp1.000.000,00">

                        <!-- <input class="form-control" name="currency-field" placeholder="Rp. 1.000.000" pattern="^\Rp. \d{1,3}(,\d{3})*(\.\d+)?$" type="currency" required> -->
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 offset-md-3">
                            <button align="center" type="submit" class="btn btn-success"><i class="fa fa-send"> Simpan</i></button>
                            <button type="reset" class="btn btn-danger"><i class="fa fa-history"> Reset</i></button>
                        </div>
                    </div>

                </form>
            </div>
<?php
        }
    }
}
require_once('currency.php');

?>
<script type="text/javascript">
    $(document).ready(function() {
        $(".Udara").hide();
        document.getElementById("customRadio1").checked = true;
        $('#customRadio2').click(function() {
            $(".Udara").show('slow');
            $(".DaratLaut").hide();
            document.getElementById("customRadio1").checked = false;
            document.getElementById("customRadio2").checked = true;
        });

        $('#customRadio1').click(function() {
            $(".DaratLaut").show('slow');
            $(".Udara").hide();
            document.getElementById("customRadio1").checked = true;
        });
    });
</script>