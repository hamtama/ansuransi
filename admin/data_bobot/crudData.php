<?php
require '../../login/connection.php';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : 'DEFAULT';
$bobot = isset($_POST['bobot']) ? $_POST['bobot'] : '';
$status = isset($_POST['status_bobot']) ? $_POST['status_bobot'] : '';
$sql_query = '';
$result = '';
if ($mode === "create") {
    $sql_query = "INSERT INTO tb_bobot VALUES ('DEFAULT', '$skala','$status')";
} else if ($mode === "update") {
    $sql_query = "UPDATE tb_bobot SET skala='$bobot', status='$status' WHERE id_bobot=$id";
} else if ($mode === "delete") {
    $sql_query = "DELETE FROM tb_bobot WHERE id_bobot='$id'";
} else {
}

$result = ($sql_query !== '') ? mysqli_query($mysqli, $sql_query) or die(mysqli_errno($mysqli)) : "Mode tidak ditemukan!";

header('Content-Type: application/json');
echo json_encode($result);
