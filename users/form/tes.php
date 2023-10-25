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
$query = ($req_data === 'provinsi') ? mysqli_query($mysqli, "SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama") : mysqli_query($mysqli, "SELECT * FROM wilayah_2020 WHERE LEFT(kode,$n)='$id' AND CHAR_LENGTH(kode)=$o ORDER BY nama");

$res = '';
if (empty($id)) {
    $res .= '<select class="form-control" id="prov" name="provinsi" required>';
    $res .= '<option value="" selected>-- Pilih Provinsi --</option>';
    while ($hs = mysqli_fetch_assoc($query)) {
        $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
    }
    $res .= '</select>';
} else {
    if ($req_data === 'kota-kab') {
        $res .= '<select class="form-control" id="kab" name="kabupaten" required>';
        $res .= '<option value="" selected>-- Pilih Kota/Kabupaten --</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    } else if ($req_data === 'kecamatan') {
        $res .= '<select class="form-control" id="kec" name="kecamatan" required>';
        $res .= '<option value="" selected>-- Pilih Kecamatan --</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    } else {
        $res .= '<select class="form-control" id="kel" name="kelurahan" required>';
        $res .= '<option value="" selected>-- Pilih Kelurahan --</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    }
}

echo json_encode($res);
