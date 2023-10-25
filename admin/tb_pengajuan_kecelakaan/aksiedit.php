<?php
require_once('../../login/connection.php');

//FORMULIR 2
$id = $_POST['id'];
$tgl_kejadian   = $_POST["tanggalkejadian"];
$w_kejadian     = $_POST["waktukejadian"];
$tgl_kejadian   = $tgl_kejadian . "T" . $w_kejadian;
$tkp            = $_POST["tkp"];
$v_santunan     = $_POST["santunan"];
$santunan       = count($v_santunan);
if ($santunan == 1) {
    $santunan = implode(",", $v_santunan);
} else {
    $santunan = implode(",", $v_santunan);
}
$santunan;
$jkecel = $_POST["jkecel"];




$cek = mysqli_num_rows($mysqli->query("SELECT no_pengajuan FROM tb_pengajuan WHERE no_pengajuan ='$no_reg'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($cek > 1) {
?>
<script language="javascript">
alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
document.location = 'data.php';
</script>
<?php
     } else {
        
        //SQL FORMULIR 2
        $sql2 = $mysqli->query("UPDATE tb_pengajuan_kecelakaan SET 
                                      tgl_kejadian        = '$tgl_kejadian',
                                      tmp_kejadian        = '$tkp',
                                      ajukan_santunan     = '$santunan',
                                      jenis_kecelakaan    = '$jkecel' WHERE id_peng_kecelakaan = '$id'");
        
        
        if ($sql2) {
        ?>
<script language="javascript">
alert("Data Kasus Kecelakaan Berhasil Diubah");
document.location = 'data.php';
</script>
<?php
        } else {
            echo "Silahkan Input Data Lagi", mysqli_error($mysqli);
        }
    }
}