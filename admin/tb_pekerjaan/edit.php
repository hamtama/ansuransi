<?php
require_once '../../login/connection.php';
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM tb_pekerjaan WHERE id_pekerjaan ='$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
?>
<form action="aksiedit.php" method="post" role="form">
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Pekerjaan<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="hidden" name="id" value="<?php echo $baris['id_pekerjaan'] ?>">
            <input type="text" name="pekerjaan" value="<?php echo $baris['pekerjaan'] ?>" required="required"
                class="form-control has-feedback-left">
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
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