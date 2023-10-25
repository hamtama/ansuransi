<?php
require '../../login/connection.php';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : 'DEFAULT';
$kat_kasus = isset($_POST['kat_kasus']) ? $_POST['kat_kasus'] : '';
$sql_query = '';
$result = '';
if ($mode === "create") {
    $sql_query = "INSERT INTO tb_kategori VALUES ('DEFAULT', '$kat_kasus')";
} else if ($mode === "update") {
    $sql_query = "UPDATE tb_kategori SET kategori='$kat_kasus' WHERE id_kategori=$id";
} else if ($mode === "delete") {
    $sql_query = "DELETE FROM tb_kategori WHERE id_kategori='$id'";
} else {
}

$result = ($sql_query !== '') ? mysqli_query($mysqli, $sql_query) or die(mysqli_errno($mysqli)) : "Mode tidak ditemukan!";

header('Content-Type: application/json');
echo json_encode($result);
