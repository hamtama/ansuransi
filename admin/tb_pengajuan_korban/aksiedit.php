<?php
require_once('../../login/connection.php');

// FORMULIR 3
$id = $_POST['id'];
$check = $_POST['check'];
$nama_kb       = $_POST["nama_kb"];
$tmp_lhr_kb    = $_POST["tempat_lahir_kb"];
$tgl_lhr_kb    = $_POST["tanggal_lahir_kb"];
$umur_kb       = $_POST["umur_kb"];
$nik_kb        = $_POST["nik_kb"];
$prov_kb       = $_POST["provinsi_kb"];
$kab_kb        = $_POST["kabupaten_kb"];
$kec_kb        = $_POST["kecamatan_kb"];
$kel_kb        = $_POST["kelurahan_kb"];
$alamat_kb     = $_POST["alamat_kb"];
$jk_kb         = $_POST["jk_kb"];
echo $notel_kb      = $_POST["notel_kb"];
$pekerjaan_kb = $_POST["pekerjaan_kb"];
if ($pekerjaan_kb == 'lainnya_kb') {
    $pekerjaan_lain_kb = $_POST["kerja_lain_kb"];
} else {
    $pekerjaan_lain_kb = "";
}



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
            //SQL FORMULIR 3           
            $sql3 = $mysqli->query("UPDATE tb_pengajuan_korban SET 
                                      
                                      nama_pengaju_kb         = '$nama_kb',
                                      tempat_lhr_pengaju_kb   = '$tmp_lhr_kb',
                                      tgl_lahir_kb            = '$tgl_lhr_kb',
                                      ktp_pengaju_kb          = '$nik_kb',
                                      id_prov_pengaju_kb      = '$prov_kb',
                                      id_kab_pengaju_kb       = '$kab_kb',
                                      id_kec_pengaju_kb       = '$kec_kb',
                                      id_kel_pengaju_kb       = '$kel_kb',
                                      alamat_pengaju_kb       = '$alamat_kb',
                                      umur_pengaju_kb         = '$umur_kb',
                                      jk_pengaju_kb           = '$jk_kb',
                                      pekerjaan_pengaju_kb    = '$pekerjaan_kb',
                                      pekerjaan_pengaju_lain_kb  = '$pekerjaan_lain_kb',
                                      no_telp_pengaju_kb            = '$notel_kb' WHERE id_pengajuan_kb ='$id'");
                                      
            
        if ($sql3) {
        ?>
<script language="javascript">
alert("Data Pengajuan Korban Berhasil Diubah");
document.location = 'data.php';
</script>
<?php
        } else {
            echo "Silahkan Input Data Lagi", mysqli_error($mysqli);
        }
    }
}