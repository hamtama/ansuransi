<?php
require_once '../../login/connection.php';
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT * FROM tb_kasus_kecelakaan a INNER JOIN tb_kategori b ON b.id_kategori = a.id_kategori WHERE id_kasus_kecelakaan ='$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
        $id_kategori = $baris['id_kategori'];
?>
<form action="aksiedit.php" method="post" role="form">
    <div class="form-group field item row">
        <label class="col-form-label col-md-3 col-sm-3 label-align">Kategori<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="hidden" name="id" value="<?php echo $baris['id_kasus_kecelakaan'] ?>">
            <select name="kategori" id="kategori" class="form-control has-feedback-left">
                <option required value="<?=$baris['id_kategori']?>"><?=$baris['kategori']?></option>
                <?php
                    $sql2 = mysqli_query($mysqli, "SELECT * FROM tb_kategori WHERE id_kategori <> '$id_kategori'");
                    while($row = mysqli_fetch_array($sql2)){
                        echo '<option value="'.$id_kategori.'">'.$row['kategori'].'</option>';
                    }
                ?>
            </select>
            <span class="fa fa-bar-chart form-control-feedback left"> </span>
        </div>
    </div>
    <div class="form-group field item row">
        <label for="nama_gejala" class="col-form-label col-md-3 col-sm-3 label-align">Kasus Kecelaakaan <span
                class="required">*</span></label>
        <div class="col-md-6 col-sm-6">
            <input type="text" class="form-control has-feedback-left" name="kasus_kecelakaan"
                value="<?=$baris['kasus_kecelakaan']?>" required>
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