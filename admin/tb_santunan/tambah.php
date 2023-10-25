<?php
require_once('../../login/connection.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
?>

<form role="form" method="post" action="aksitambah.php">
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control has-feedback-left" id="jenis_santunan" type="text" name="jenis_santunan"
                placeholder="Jenis Santunan" required>
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio1" name="kategori" value="Udara" class="custom-control-input"
                    required>
                <label class="custom-control-label" for="customRadio1">Udara</label>
            </div>
            <div class="custom-control custom-radio">
                <input type="radio" id="customRadio2" name="kategori" value="Darat/Laut" class="custom-control-input"
                    required>
                <label class="custom-control-label" for="customRadio2">Darat/Laut</label>
            </div>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input class="form-control has-feedback-left" type="text" name="currency-field" id="currency-field" value=""
                data-type="currency" placeholder="Rp1.000.000,00" required>
            <!-- <input class="form-control" name="currency-field" placeholder="Rp. 1.000.000" pattern="^\Rp. \d{1,3}(,\d{3})*(\.\d+)?$" type="currency" required> -->
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>


    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='reset' class="btn btn-danger">Reset</button>
            <button type='submit' class="btn btn-success">Simpan</button>
        </div>
    </div>

</form>
<?php
}require_once('currency.php');
?>