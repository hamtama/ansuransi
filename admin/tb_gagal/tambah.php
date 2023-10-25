<?php  
require_once ('../../login/connection.php');
if (isset($_POST['id'])) {
	$id = $_POST['id'];
?>

<form role="form" method="post" action="aksitambah.php">
    <div class="form-group field item row">
        <label for="nama_gagal" class="col-form-label col-md-3 col-sm-3 label-align">Nama Gagal<span
                class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="data_gagal" required="required" class="form-control has-feedback-left">
            <span class="fa fa-cogs form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='reset' class="btn btn-danger">Reset</button>
            <button type='submit' class="btn btn-primary">Simpan</button>
        </div>
    </div>
</form>

<?php  
}
?>