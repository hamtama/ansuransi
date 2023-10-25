<?php
require_once('../../login/connection.php');

//FORMULIR 1
$id    = $_POST["id"];
$no_reg    = $_POST["no_reg"];
// $datereg   = $_POST["date_reg"];
$nama      = $_POST["nama"];
$tmp_lhr   = $_POST["tempat_lahir"];
$tgl_lhr   = $_POST["tanggal_lahir"];
$umur      = $_POST["umur"];
$nik       = $_POST["nik"];
$prov      = $_POST["provinsi"];
$kab       = $_POST["kabupaten"];
$kec       = $_POST["kecamatan"];
$kel       = $_POST["kelurahan"];
$alamat    = $_POST["alamat"];
$jk        = $_POST["jk"];
$notel     = $_POST["notel"];
$pekerjaan = $_POST["pekerjaan"];

if ($pekerjaan == "lainnya") {
    $pekerjaan_lain = $_POST["kerja_lain"];
} else {
    $pekerjaan_lain = "";
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
        //SQL FORMULIR 1
        $sql = $mysqli->query("UPDATE tb_pengajuan SET 
                                      tgl_reg             = '$datereg',
                                      no_pengajuan        = '$no_reg',
                                      nama_pengaju        = '$nama',
                                      tempat_lhr_pengaju  = '$tmp_lhr',
                                      tgl_lahir           = '$tgl_lhr',
                                      ktp_pengaju         = '$nik',
                                      id_prov_pengaju     = '$prov',
                                      id_kab_pengaju      = '$kab',
                                      id_kec_pengaju      = '$kec',
                                      id_kel_pengaju      = '$kel',
                                      alamat_pengaju      = '$alamat',
                                      umur_pengaju        = '$umur',
                                      jk_pengaju          = '$jk',
                                      pekerjaan_pengaju   = '$pekerjaan',
                                      pekerjaan_lain_pengaju  = '$pekerjaan_lain',
                                      no_telp_pengaju         = '$notel' WHERE id_pengajuan = '$id'");
        if ($sql) {
        ?>
<script language="javascript">
alert("Data Pengajuan Berhasil Diubah");
document.location = 'data.php';
</script>
<?php
        } else {
            echo "Silahkan Input Data Lagi", mysqli_error($mysqli);
        }
    }
}