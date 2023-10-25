<?php
require '../../login/connection.php';

$mode = isset($_POST['mode']) ? $_POST['mode'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : 'DEFAULT';
$data_gagal = isset($_POST['ket_gagal']) ? $_POST['ket_gagal'] : '';
$sql_query = '';
$result = '';
if ($mode === "create") {
    $sql_query = "INSERT INTO tb_gagal VALUES ('DEFAULT', '$data_gagal')";
} else if ($mode === "update") {
    $sql_query = "UPDATE tb_gagal SET data_gagal='$data_gagal' WHERE id_gagal=$id";
} else if ($mode === "delete") {
    $sql_query = "DELETE FROM tb_gagal WHERE id_gagal='$id'";
} else {
}

$result = ($sql_query !== '') ? mysqli_query($mysqli, $sql_query) or die(mysqli_errno($mysqli)) : "Mode tidak ditemukan!";

header('Content-Type: application/json');
echo json_encode($result);
