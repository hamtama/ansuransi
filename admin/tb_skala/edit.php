<?php
require_once '../../login/connection.php';
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM tb_skala WHERE id_skala ='$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
?>
<form action="aksiedit.php" method="post" role="form">
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Nilai<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="hidden" name="id" value="<?php echo $baris['id_skala'] ?>">
            <input type="text" name="nilai" value="<?php echo $baris['skala'] ?>" required="required"
                class="form-control has-feedback-left">
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Status<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" name="status" value="<?php echo $baris['status'] ?>" required="required"
                class="form-control has-feedback-left">
            <span class="fa fa-pencil-square-o form-control-feedback left"> </span>
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