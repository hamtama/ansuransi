<?php
require_once('../../login/connection.php');
if (isset($_POST['id'])) {
    $id = $_POST['id'];
?>

<form role="form" method="post" action="aksitambah.php">
    <div class="form-group field item row">
        <label for="Kasus Kecelakaan" class="col-form-label col-md-3 col-sm-3 label-align">Jenis Kriteria <span
                class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control has-feedback-left" id="jenis_bobot" name="jenis_bobot" required>
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kriteria<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select name="kriteria" class="form-control has-feedback-left">
                <option value="">-- Kriteria --</option>
                <option value="Biaya">Biaya</option>
                <option value="Keuntungan">Keuntungan</option>
            </select>
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Bobot<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <select name="bobot" class="form-control has-feedback-left">
                <option value="">-- Pilih Bobot --</option>
                <?php
                $sql = mysqli_query($mysqli, "SELECT * FROM tb_skala order by id_skala ASC");
                while($row = mysqli_fetch_array($sql)){
                    echo '<option value="'.$row[0].'">'.$row[2].'</option>';
                }
                ?>
            </select>
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
}
?>