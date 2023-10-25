<?php  
require_once ('../../login/connection.php');
if (isset($_POST['id'])) {
	$id = $_POST['id'];
?>

<form enctype='multipart/form-data' role="form" method="post" action="aksitambah.php">
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nama File<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="nama_file" required="required" class="form-control has-feedback-left">
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Upload File<span class="required">*</span></label>
        <div class="custom-file col-md-6 col-sm-6 ml-2">
            <input id="file" type="file" name="file" class="custom-file-input " required>
            <label id="l_file" class="custom-file-label">Choose file</label>
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