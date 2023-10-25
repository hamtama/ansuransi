<?php
require '../../login/connection.php';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : 'DEFAULT';
$kategori = isset($_POST['kategori']) ? $_POST['kategori'] : '';
$kasus = isset($_POST['kasus']) ? $_POST['kasus'] : '';
$sql_query = '';
$result = '';
if ($mode === "create" && $kategori !== '') {
    $sql_query = "INSERT INTO tb_kasus_kecelakaan VALUES ('DEFAULT', $kategori, '$kasus')";
} else if ($mode === "update") {
    $sql_query = "UPDATE tb_kasus_kecelakaan SET id_kategori=$kategori, kasus_kecelakaan='$kasus' WHERE id_kasus_kecelakaan=$id";
} else if ($mode === "delete") {
    $sql_query = "DELETE FROM tb_kasus_kecelakaan WHERE id_kasus_kecelakaan='$id'";
} else {
}

$result = ($sql_query !== '') ? mysqli_query($mysqli, $sql_query) or die(mysqli_errno($mysqli)) : "Mode tidak ditemukan!";

header('Content-Type: application/json');
echo json_encode($result);
