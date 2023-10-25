<?php
require_once('../../login/connection.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
?>
    <form class="needs-validation" method="POST" action="aksitambah.php">
        <div class="form-group">
            <label>Jenis Santunan</label>
            <input class="form-control" type="text" name="jenis_santunan" placeholder="Jenis Santunan" required>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="customRadio1" name="kategori" value="Udara" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio1">Udara</label>
            </div>
            <div class="custom-control custom-radio mb-5">
                <input type="radio" id="customRadio2" name="kategori" value="Darat/Laut" class="custom-control-input" required>
                <label class="custom-control-label" for="customRadio2">Darat/Laut</label>
            </div>
        </div>
        <div class="form-group">
            <label>Santunan</label>
            <input class="form-control" type="text" name="currency-field" id="currency-field" value="" data-type="currency" placeholder="Rp1.000.000,00">

            <!-- <input class="form-control" name="currency-field" placeholder="Rp. 1.000.000" pattern="^\Rp. \d{1,3}(,\d{3})*(\.\d+)?$" type="currency" required> -->
        </div>
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <button align="center" type="submit" class="btn btn-success"><i class="fa fa-send"> Simpan</i></button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-history"> Reset</i></button>
            </div>
        </div>

    </form>
<?php
}
require_once('currency.php');
?>