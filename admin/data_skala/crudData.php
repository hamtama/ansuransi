<?php
require '../../login/connection.php';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : 'DEFAULT';
$skala = isset($_POST['skala']) ? $_POST['skala'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$sql_query = '';
$result = '';
if ($mode === "create") {
    $sql_query = "INSERT INTO tb_skala VALUES ('DEFAULT', '$skala','$status')";
} else if ($mode === "update") {
    $sql_query = "UPDATE tb_skala SET skala='$skala', status='$status' WHERE id_skala=$id";
} else if ($mode === "delete") {
    $sql_query = "DELETE FROM tb_skala WHERE id_skala='$id'";
} else {
}

$result = ($sql_query !== '') ? mysqli_query($mysqli, $sql_query) or die(mysqli_errno($mysqli)) : "Mode tidak ditemukan!";

header('Content-Type: application/json');
echo json_encode($result);
