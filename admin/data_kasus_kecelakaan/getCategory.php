<?php
require '../../login/connection.php';

$resultHtml = isset($_POST['selected']) ? '<select class="custom-select col-12 is-valid" id="kategori" name="kategori" required>' : '<select class="custom-select col-12" id="kategori" name="kategori" required>';
$selected = isset($_POST['selected']) ? $_POST['selected'] : '-- Pilih Kategori Kecelakaan --';
$id_cat = isset($_POST['id']) ? $_POST['id'] : '';
$query = isset($_POST['data']) ? "SELECT * FROM tb_kategori WHERE 1 ORDER BY id_kategori ASC" : "SELECT * FROM tb_kategori WHERE id_kategori <> $id_cat ORDER BY id_kategori ASC";
$sql_kategori = mysqli_query($mysqli, $query) or die(mysqli_error($mysqli));

$resultHtml .= '<option value="' . $id_cat . '" selected>' . $selected . '</option>';
while ($as = mysqli_fetch_assoc($sql_kategori)) {
    $resultHtml .= '<option value="' . $as['id_kategori'] . '">' . $as['kategori'] . '</option>';
}

$resultHtml .= '</select>';

echo json_encode($resultHtml);
