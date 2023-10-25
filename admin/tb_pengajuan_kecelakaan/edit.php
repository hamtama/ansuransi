<?php
require_once '../../login/connection.php';
if ($_POST['rowid']) {
    $id = $_POST['rowid'];
    $sql = "SELECT (ROW_NUMBER() OVER (Order by id_peng_kecelakaan)) as nomor, id_peng_kecelakaan, no_pengajuan, nama_pengaju,
    DATE_FORMAT(tgl_kejadian, '%d-%m-%Y;%H:%i') as tanggal, tmp_kejadian, ajukan_santunan, kasus_kecelakaan FROM tb_pengajuan_kecelakaan a 
    left join tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan 
    left join tb_santunan c ON a.ajukan_santunan = c.id_santunan
    left join tb_kasus_kecelakaan d ON a.jenis_kecelakaan = d.id_kasus_kecelakaan WHERE id_peng_kecelakaan ='$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
        $data_datetime = explode(";",$baris['tanggal']);
        $data_santunan = explode(",",$baris['ajukan_santunan']);
        $j_santunan = count($data_santunan);
        $tgl_kejadian = $data_datetime[0];
        $waktu_kejadian = $data_datetime[1];
        
        // print_r($tgl_kejadian) ;
?>
<form action="aksiedit.php" method="post" role="form">
    <div class="form-group field item row">
        <input type="hidden" name="id" value="<?=$id?>">
        <label for="no_reg" class="col-form-label col-md-3 col-sm-3 label-align col-form-label">No.
            Registrasi <span class="required">*</span></label>
        <div class="col-sm-12 col-md-7">
            <input class="form-control" autocomplete="off" value="<?= $baris['no_pengajuan']; ?>" name="no_reg"
                type="text" readonly>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-sm-12 col-md-3 col-form-label label-align">Tanggal
            Kejadian <span class="required">*</span></label>
        <div class="col-sm-12 col-md-7 input-group date" id='myDatepicker2'>
            <input type="hidden" id='myDatepicker3' value="">
            <input class="form-control" autocomplete="off" id="show" value="" placeholder="Tanggal Kejadian" type="text"
                required>
            <span class="input-group-addon">
                <span class="fa fa-calendar"></span>
            </span>
        </div>
        <input type="hidden" name="tanggalkejadian" id="myDatepicker" value="">
        <input type="hidden" id="lihat" value="<?=$tgl_kejadian?>">
    </div>
    <div class="form-group field item row">
        <label class="col-sm-12 col-md-3 col-form-label label-align">Waktu
            Kejadian <span class="required">*</span></label>
        <div class="col-sm-12 col-md-7 ">

            <input class="form-control " name="waktukejadian" value="<?=$waktu_kejadian?>" autocomplete="off" id="waktu"
                placeholder="Select Time" type="time" required>
        </div>
    </div>
    <div class="form-group field item row">
        <label class="col-sm-12 col-md-3 col-form-label label-align">Tempat Kejadian
            <span class="required">*</span></label>
        <div class="col-sm-12 col-md-7">
            <input class="form-control" name="tkp" id="tkp" value="<?=$baris['tmp_kejadian']?>" autocomplete="off"
                placeholder="Alamat, Kelurahan, Kecamata, Kabupaten, Provinsi" type="text" required>
        </div>
    </div>
    <div class="form-group field item row " data-checkbox-group data-v-required data-v-min-select="1">
        <label class="col-sm-12 col-md-3 col-form-label label-align"> Mengajukan
            Santunan
            Sebagai <span class="required">*</span> <br>
            <font style="font-size: x-small; padding-right: 10px;">Dapat Lebih Dari Satu
            </font>
        </label>
        <div id="jsantunan" class="col-sm-12 col-md-7">
            <?php
            // echo "Data kecelakaan ".$data_santunan[$i];
            $query = mysqli_query($mysqli, "SELECT * from tb_santunan group by jenis_santunan");
            while ($row = mysqli_fetch_array($query)) {
                $id_s = $row['id_santunan'];
                $santunan = $row['jenis_santunan'];
                echo
                '<div class="custom-control custom-checkbox dsantunan" >
                <input type="checkbox" '.(in_array($santunan, $data_santunan)  ?  'Checked="Checked"' :  '').' id="santunan' . $id_s . '" value="' . $santunan . '" name="santunan[]" class="custom-control-input isantunan">
                <label class="custom-control-label" for="santunan' . $id_s . '">' . $santunan . '</label></div>';
            }
            ?>
        </div>
    </div>
    <div class="form-group row" data-checkbox-group data-v-required>
        <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Kecelakaan
            <span class="required">*</span></label>
        <div class="col-sm-12 col-md-7">
            <?php
                $query = mysqli_query($mysqli, "SELECT * from tb_kasus_kecelakaan");
                while ($row = mysqli_fetch_array($query)) {
                    $id_k = $row['id_kasus_kecelakaan'];
                    $kecelakaan = $row['kasus_kecelakaan'];
                    echo
                    '<div class="custom-control custom-radio jkecel">
                        <input type="radio" id="Radiokecel' . $id_k . '" '.(($kecelakaan === $baris['kasus_kecelakaan']) ?  'Checked="Checked"' :  '').' value="' . $id_k . '" name="jkecel" class="custom-control-input" required>
                        <label class="custom-control-label" for="Radiokecel' . $id_k . '">' . $kecelakaan . '</label>
                    </div>';
                }
                ?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-7 offset-md-3">
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