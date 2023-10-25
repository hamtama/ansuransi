<?php
require '../../login/connection.php';

$tb_name = "tb_kasus_kecelakaan";
$sql_data = array();
$search = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
$limit = isset($_POST['length']) ? $_POST['length'] : 10;
$start = isset($_POST['start']) ? $_POST['start'] : 0;

$order_index = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 0;
$order_field = isset($_POST['columns'][$order_index]['data']) ? $_POST['columns'][$order_index]['data'] : "nomor";
$order_ascdesc = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : "asc";

$query_count = "SELECT * FROM $tb_name";
$query_data = ($search !== '') ? "SELECT (ROW_NUMBER() OVER (Order by id_kasus_kecelakaan)) as nomor, a.*, b.kategori FROM $tb_name a JOIN tb_kategori b ON a.id_kategori=b.id_kategori WHERE a.kasus_kecelakaan LIKE '%$search%' OR b.kategori LIKE '%$search%' ORDER BY $order_field $order_ascdesc LIMIT $start, $limit" : "SELECT (ROW_NUMBER() OVER (Order by id_kasus_kecelakaan)) as nomor, a.*, b.kategori FROM $tb_name a JOIN tb_kategori b ON a.id_kategori=b.id_kategori ORDER BY $order_field $order_ascdesc LIMIT $start, $limit";
$query_filter = ($search !== '') ? "SELECT COUNT(*) FROM $tb_name WHERE kasus_kecelakaan LIKE '%$search%'" : "SELECT COUNT(*) FROM $tb_name";

$sql_total = mysqli_num_rows(mysqli_query($mysqli, $query_count));
$q1 = mysqli_query($mysqli, $query_data);
$sql_filter = mysqli_num_rows(mysqli_query($mysqli, $query_filter));

while ($data = mysqli_fetch_assoc($q1)) {
    array_push($sql_data, $data);
}
$callback = array(
    'draw' => $_POST['draw'],
    'recordsTotal' => $sql_total,
    'recordsFiltered' => $sql_filter,
    'data' => $sql_data
);

header('Content-Type: application/json');
echo json_encode($callback);
