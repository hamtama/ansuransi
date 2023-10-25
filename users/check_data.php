<?php
require_once('../login/connection.php');

$noreg = $_POST['noreg'];
$flag = false;

$check_q1 = "SELECT * FROM tb_pengajuan WHERE no_pengajuan = '" . $noreg . "'";
$check_r1 = mysqli_query($mysqli, $check_q1);
while ($row = mysqli_fetch_array($check_r1)) {
    $id = $row['id_pengajuan'];
}

$check_q2 = "SELECT * FROM tb_upload_file WHERE id_pengajuan = '" . $id . "'";
$check_r2 = mysqli_query($mysqli, $check_q2);
if ($check_r2) {
    // Check if any rows are returned
    if (mysqli_num_rows($check_r2) < 1) {
        $message = "Berkas Pengajuan Belum Dilengkapi, Silahkan Untuk Melengkapi Data Berkas Agar Pengajuan Dapat Kami Proses";

        $flag = true; // Set flag menjadi true
    }
}

if (!$flag) { // Hanya jika flag tidak true
    $check_q3 = "SELECT * FROM tb_pembobotan WHERE id_pengajuan = '" . $id . "'";
    $check_r3 = mysqli_query($mysqli, $check_q3);
    if ($check_r3) {
        // Check if any rows are returned
        if (mysqli_num_rows($check_r3) > 0) {
            $message = "Pengajuan Anda Telah Berhasil Diajukan, Silahkan Untuk Mengunjungi Kantor Jasa Raharja Terdekat.";
        } else {
            $message = "Pengajuan Sedang Dalam Proses Pengajuan Silahkan Update Secara Berkala";
        }
    }
}

$data = array(
    'id' => $id,
    'message' => $message
);


echo json_encode($data);
