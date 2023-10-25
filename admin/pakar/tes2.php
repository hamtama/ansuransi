<?php
require '../../login/connection.php';

$wil = array(
    2 => array(5, 'Kota/Kabupaten', 'kab'),
    5 => array(8, 'Kecamatan', 'kec'),
    8 => array(13, 'Kelurahan', 'kel')
);

$id = isset($_POST['id']) ? $_POST['id'] : '';
$n = isset($_POST['id']) ? strlen($id) : 0;
$req_data = isset($_POST['req']) ? $_POST['req'] : 'none';
$o = $wil[$n][0];
$query = ($req_data === 'provinsi_kb') ? mysqli_query($mysqli, "SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama") : mysqli_query($mysqli, "SELECT * FROM wilayah_2020 WHERE LEFT(kode,$n)='$id' AND CHAR_LENGTH(kode)=$o ORDER BY nama");

$res = '';
if (empty($id)) {
    $res .= '<select class="form-control ck" id="prov_kb" name="provinsi_kb" required disabled>';
    $res .= '<option value="" selected>-- Pilih Provinsi --</option>';
    while ($hs = mysqli_fetch_assoc($query)) {
        $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
    }
    $res .= '</select>';
} else {
    if ($req_data === 'kota-kab_kb') {
        $res .= '<select class="form-control ck" id="kab_kb" name="kabupaten_kb" required>';
        $res .= '<option value="" selected>-- Pilih Kota/Kabupaten --</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    } else if ($req_data === 'kecamatan_kb') {
        $res .= '<select class="form-control ck" id="kec_kb" name="kecamatan_kb" required >';
        $res .= '<option value="" selected>-- Pilih Kecamatan --</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    } else {
        $res .= '<select class="form-control ck" id="kel_kb" name="kelurahan_kb" required>';
        $res .= '<option value="" selected>-- Pilih Kelurahan --</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    }
}

echo json_encode($res);