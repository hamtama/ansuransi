<?php
require '../../login/connection.php';

$wil = array(
    2 => array(5, 'Kota/Kabupaten', 'kab'),
    5 => array(8, 'Kecamatan', 'kec'),
    8 => array(13, 'Kelurahan', 'kel')
);

$n_prov     = isset($_POST['n_prov']) ? $_POST['n_prov'] : '';
$prov       = isset($_POST['prov']) ? $_POST['prov'] : '';
$kab        = isset($_POST['kab']) ? $_POST['kab'] : '';
$n_kab      = isset($_POST['n_kab']) ? $_POST['n_kab'] : '';
$kec        = isset($_POST['kec']) ? $_POST['kec'] : '';
$n_kec      = isset($_POST['n_kec']) ? $_POST['n_kec'] : '';
$kel        = isset($_POST['kel']) ? $_POST['kel'] : '';
$n_kel      = isset($_POST['n_kel']) ? $_POST['n_kel'] : '';

$id = isset($_POST['id']) ? $_POST['id'] : '';
$n = isset($_POST['id']) ? strlen($id) : 0;
$req_data = isset($_POST['req']) ? $_POST['req'] : 'none';
$o = $wil[$n][0];
$query = ($req_data === 'provinsi_kb') ? mysqli_query($mysqli, "SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 AND kode <> '$prov' ORDER BY nama") : mysqli_query($mysqli, "SELECT * FROM wilayah_2020 WHERE LEFT(kode,$n)='$id' AND CHAR_LENGTH(kode)=$o AND kode <> '$kab' AND kode <> '$kec' AND kode <> '$kel' AND kode <> '$kel' ORDER BY nama");

$res = '';
if (empty($id)) {
    $res .= '<select class="form-control ck" id="prov_kb" name="provinsi_kb" required >';
    $res .= '<option value="'.$prov.'" selected>'.$n_prov.'</option>';
    while ($hs = mysqli_fetch_assoc($query)) {
        $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
    }
    $res .= '</select>';
} else {
    if ($req_data === 'kota-kab_kb') {
        $res .= '<select class="form-control ck" id="kab_kb" name="kabupaten_kb" required>';
        $res .= '<option value="'.$kab.'" selected>'.$n_kab.'</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    } else if ($req_data === 'kecamatan_kb') {
        $res .= '<select class="form-control ck" id="kec_kb" name="kecamatan_kb" required >';
        $res .= '<option value="'.$kec.'" selected>'.$n_kec.'</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    } else {
        $res .= '<select class="form-control ck" id="kel_kb" name="kelurahan_kb" required>';
        $res .= '<option value="'.$kel.'"  selected>'.$n_kel.'</option>';
        while ($hs = mysqli_fetch_assoc($query)) {
            $res .= '<option value="' . $hs['kode'] . '">' . $hs['nama'] . '</option>';
        }
        $res .= '</select>';
    }
}

echo json_encode($res);