<?php
require_once '../../login/connection.php';
if ($_POST['id'] && $_POST['kolom']) {
    $id = $_POST['id'];
    $kolom = $_POST['kolom'];
    
    $sql = "SELECT $kolom, id_upload_file FROM tb_upload_file WHERE id_upload_file ='$id'";
    $v_kolom = str_replace("_"," ",$kolom);
    $v_kolom = ucwords($v_kolom);
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
?>
<form enctype='multipart/form-data' class="needs-validation" action="aksiedit.php" method="post" role="form" novalidate>
    <input type="hidden" name="id" value="<?=$baris['id_upload_file'] ?>">
    <input type="hidden" name="file" value="<?=$baris[$kolom] ?>">
    <input type="hidden" name="kolom" value="<?=$kolom?>">
    <div class="form-group row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Edit <?=$v_kolom?><span
                class="required">*</span></label>
        <div class="custom-file col-md-6 col-sm-6">
            <input id="<?=$kolom?>" name="<?=$kolom?>" type="file" required class="custom-file-input">
            <label id="l_<?=$kolom?>" class="custom-file-label">Choose file</label>
            <!-- <span class="fa fa-bar-chart form-control-feedback left"> </span> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-6 offset-md-3">
            <button type='reset' class="btn btn-danger">Reset</button>
            <button type='submit' id="submit" name="submit" value="Submit" class="btn btn-primary">Edit Data</button>
        </div>
    </div>
</form>
<?php
    }
}
?>