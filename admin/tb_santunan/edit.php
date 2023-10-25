<?php
require_once '../../login/connection.php';
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = mysqli_query($mysqli, "SELECT * FROM tb_santunan where id_santunan ='$id'");
    foreach ($sql as $row1) {
        $jenis_santunan = $row1['jenis_santunan'];
?>
<div class="col-md-12 d-flex justify-content-center mb-3">
    <div class="radio icheck-greensea mr-3">
        <input type="radio" id="customRadio1" name="kategori">
        <label for="customRadio1">Darat/Laut</label>
    </div>
    <div class="radio icheck-greensea mr-3">
        <input type="radio" id="customRadio2" name="kategori">
        <label for="customRadio2">Udara</label>
    </div>
</div>
<?php
$sql2 = mysqli_query($mysqli, "SELECT * FROM tb_santunan where jenis_santunan = '$jenis_santunan'");
foreach ($sql2 as $baris) {
    $id2 = $baris['id_santunan'];
    $kategori = str_replace('/', '', $baris['kategori']);
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
<div class="<?= $kategori; ?>">

    <form action="aksiedit.php" method="post" role="form">
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jenis Santunan<span
                    class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input type="hidden" name="id" value="<?= $id2; ?>">
                <input class="form-control has-feedback-left" type="text" required name="jenis_santunan<?= $id2; ?>"
                    placeholder="Jenis Santunan" value="<?= $baris['jenis_santunan']; ?>">
                <span class=" fa fa-bar-chart form-control-feedback left"> </span>
            </div>
        </div>

        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <div class="radio icheck-greensea">
                    <input type="radio" id="<?=$kategori;?>1" <?= $d; ?> name="kategori<?= $id2; ?>" value="Udara"
                        required>
                    <label for="<?=$kategori;?>1">Udara</label>
                </div>
                <div class="radio icheck-greensea">
                    <input type="radio" id="<?=$kategori;?>2" <?= $c; ?> name="kategori<?= $id2; ?>" value="Darat/Laut"
                        required>
                    <label for="<?=$kategori;?>2">Darat/Laut</label>
                </div>
            </div>
        </div>
        <div class="form-group field item row">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
            <div class="col-md-6 col-sm-6">
                <input class="form-control has-feedback-left" type="text" name="currency-field<?= $id2; ?>"
                    id="currency-field" value="<?= $baris['santunan']; ?>" data-type="currency"
                    placeholder="Rp1.000.000,00" required>
                <!-- <input class="form-control" name="currency-field" placeholder="Rp. 1.000.000" pattern="^\Rp. \d{1,3}(,\d{3})*(\.\d+)?$" type="currency" required> -->
                <span class="fa fa-bar-chart form-control-feedback left"> </span>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <button type='reset' class="btn btn-danger">Reset</button>
                <button type='submit' class="btn btn-primary">Edit Data</button>
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