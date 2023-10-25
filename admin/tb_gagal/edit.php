<?php 
require_once '../../login/connection.php';
if ($_POST['rowid']) {
	$id = $_POST['rowid'];
	$sql = "SELECT * FROM tb_gagal WHERE id_gagal ='$id'";
	$result = $mysqli->query($sql);
	foreach ($result as $baris) {
	?>
<form action="aksiedit.php" method="post" role="form">
    <div class="form-group field item row">
        <input type="hidden" name="id" value="<?php echo $baris['id_gagal'] ?>">
        <label for="data_gagal" class="col-form-label col-md-3 col-sm-3 label-align">Nama Gagal<span
                class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="data_gagal" value="<?php echo $baris['data_gagal'] ?>" required="required"
                class="form-control has-feedback-left">
            <span class="fa fa-cubes form-control-feedback left"> </span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='reset' class="btn btn-danger">Reset</button>
            <button type='submit' class="btn btn-primary">Edit Data</button>
        </div>
    </div>
    </div>
</form>
<?php
	}
}
?>