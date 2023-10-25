<?php
require '../../login/connection.php';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : 'DEFAULT';
$pekerjaan = isset($_POST['pekerjaan']) ? $_POST['pekerjaan'] : '';
$sql_query = '';
$result = '';
if ($mode === "create") {
    $sql_query = "INSERT INTO tb_pekerjaan VALUES ('DEFAULT', '$pekerjaan')";
} else if ($mode === "update") {
    $sql_query = "UPDATE tb_pekerjaan SET pekerjaan='$pekerjaan' WHERE id_pekerjaan=$id";
} else if ($mode === "delete") {
    $sql_query = "DELETE FROM tb_pekerjaan WHERE id_pekerjaan='$id'";
} else {
}

$result = ($sql_query !== '') ? mysqli_query($mysqli, $sql_query) or die(mysqli_errno($mysqli)) : "Mode tidak ditemukan!";

header('Content-Type: application/json');
echo json_encode($result);
