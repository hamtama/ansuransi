<?php
require_once('../../login/connection.php');

//FORMULIR 1
$no_reg    = $_POST["no_reg"];
$datereg   = $_POST["date_reg"];
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

//FORMULIR 2
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

// FORMULIR 3

$check = $_POST['check'];
if ($check == "aktif") {
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
}


$cek = mysqli_num_rows($mysqli->query("SELECT no_pengajuan FROM tb_pengajuan WHERE no_pengajuan ='$no_reg'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($cek > 1) {
?>
        <script language="javascript">
            alert('No Registrasi Sudah Ada !! Silahkan Ganti No Registrasi');
            document.location = 'pengajuan.php';
        </script>
        <?php
    } else {
        //SQL FORMULIR 1
        $sql = $mysqli->query("INSERT INTO tb_pengajuan SET 
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
                                      no_telp_pengaju         = '$notel'");

        $id_reg = $mysqli->insert_id;
        //SQL FORMULIR 2
        $sql2 = $mysqli->query("INSERT INTO tb_pengajuan_kecelakaan SET 
                                      id_pengajuan        = '$id_reg',
                                      tgl_kejadian        = '$tgl_kejadian',
                                      tmp_kejadian        = '$tkp',
                                      ajukan_santunan     = '$santunan',
                                      jenis_kecelakaan    = '$jkecel'");
        $check = $_POST['check'];
        if ($check == "aktif") {
            //SQL FORMULIR 3           
            $sql3 = $mysqli->query("INSERT INTO tb_pengajuan_korban SET 
                                      id_pengajuan            = '$id_reg',
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
                                      no_telp_pengaju_kb            = '$notel_kb'");
            $sql3 = TRUE;
        } else {
            $sql3 = FALSE;
        }
        if (($sql) && ($sql2) || ($sql3)) {
        ?>
            <script language="javascript">
                alert("Data Registrasi Berhasil Ditambahkan");
                document.location = 'upload.php?id'.$id_reg;
            </script>
<?php
        } else {
            echo "Silahkan Input Data Lagi", mysqli_error($mysqli);
        }
    }
}
