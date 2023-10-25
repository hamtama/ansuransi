<?php
require_once('../../login/connection.php');
$id = $_POST['id_u'];
$id_p = $_POST['id_p'];
$tg = 1;
// AMBIL DATA DARI DATA INPUT USER
$query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE Field LIKE '%file%' AND Field <> 'id_upload_file'");
while ($fc = mysqli_fetch_assoc($query_field)) {
    $fetchCol[$tg] = $_POST[$fc['Field']];
    if (!empty($fetchCol[$tg])) {
        $fetchCol[$tg] = $_POST[$fc['Field']];
    } else {
        $fetchCol[$tg] = 0;
    }
    $tg++;
}
// PENGECEKAN UNTUK FILE DOKUMEN TAMBAHAN YANG KOSONG ATAU TIDAK
$th = 1;
$query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE Field LIKE '%file_dokumen%' AND Field <> 'id_upload_file'");
while ($fc = mysqli_fetch_assoc($query_field)) {
    $dok_plus[$th] = $_POST[$fc['Field']];
    // $dok_plus[2] = "3";
    $th++;
}
// PENGKONDISIAN JIKA NILAI PADA FILE DOKUMEN TAMBAHAN KOSONG ATAU TIDAK
$dok_plus = array_sum($dok_plus);

if ($dok_plus != 0) {
    $data_post[13] = 2;
} else {
    $data_post[13] = "";
}



// MENGGABUNGKAN NILAI INPUT DAN FILE DOKUMEN TAMBAHAN
$ti = 1;
$query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE FIELD LIKE '%file%' AND Field <> 'id_upload_file' AND Field NOT LIKE '%file_dokumen%'");
while ($fc = mysqli_fetch_assoc($query_field)) {
    $data_post[$ti] = $_POST[$fc['Field']];
    $ti++;
}
// $data_post[13] = $dok_tambahan;
if ($data_post[13] == "") {
    $query_bobot = "WHERE jenis_bobot <> 'File Dokumen Tambahan'";
} else {
    $query_bobot = "";
}
// echo "Data postingan";
// print_r($data_post);


// echo $n_bobot;

$tj = 1;
$query_field = mysqli_query($mysqli, "SELECT * FROM tb_bobot_kriteria $query_bobot");
// echo "SELECT * FROM tb_bobot_kriteria $query_bobot";
while ($fc = mysqli_fetch_assoc($query_field)) {
    $hitung[$tj] = pow($data_post[$tj], $fc['normalisasi']);
    $tj++;
}
$total  = array_product($hitung);

$max = sizeof($data_post);
// echo "Data Max : " . $max;
$n_bobot = "";
for ($i = 1; $i <= $max; $i++) {
    if ($data_post[$i] != '') {
        $n_bobot .= "'" . $data_post[$i] . "'";

        if ($i != $max) {
            $n_bobot .= ", ";
        }
    } else {
        $n_bobot .= "'0'";
    }
}

// echo $n_bobot;
// echo "INSERT INTO tb_pembobotan VALUES (NULL, '$id_p', $n_bobot,'$total', '')";
$sql_insert = mysqli_query($mysqli, "INSERT INTO tb_pembobotan VALUES (NULL, '$id_p', $n_bobot,'$total', '');");
if ($sql_insert) {
    echo "input berhasil";
?>
    <script language="javascript">
        alert('Input Data Berhasil');
        document.location = 'data.php';
    </script>
<?php
} else {
    echo "Input Silahkan Ulangi !";
}

// print_r($data_post);
// print_r($hitung);
// print_r($total);
// echo "HASIL AKHIR " . $total;
// $max = $query_field->num_rows;
// for ($i=1 ;$i<=$max; $i++){
//     $check = mysqli_query($mysqli, "SELECT $fetchCol[$i] FROM tb_upload_file WHERE id_upload_file ='$id'");
//         while ($row = mysqli_fetch_array($check)){
//         if(!empty($row[0])){
//             echo $r_ket = $_POST[$fetchCol[$i]];
//         }
//     }
// }


?>