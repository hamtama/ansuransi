<?php
require '../../login/connection.php';

$tb_name = "tb_kategori";
$sql_data = array();
$search = isset($_POST['search']['value']) ? $_POST['search']['value'] : '';
$limit = isset($_POST['length']) ? $_POST['length'] : 10;
$start = isset($_POST['start']) ? $_POST['start'] : 0;

$order_index = isset($_POST['order'][0]['column']) ? $_POST['order'][0]['column'] : 0;
$order_field = isset($_POST['columns'][$order_index]['data']) ? $_POST['columns'][$order_index]['data'] : "nomor";
$order_ascdesc = isset($_POST['order'][0]['dir']) ? $_POST['order'][0]['dir'] : "asc";

$query_count = "SELECT * FROM $tb_name";
$query_data = ($search !== '') ? "SELECT (ROW_NUMBER() OVER (Order by id_kategori)) as nomor, `*` FROM $tb_name  WHERE kategori LIKE '%$search%' ORDER BY $order_field $order_ascdesc LIMIT $start, $limit" : "SELECT (ROW_NUMBER() OVER (Order by id_kategori)) as nomor, `*` FROM $tb_name  ORDER BY $order_field $order_ascdesc LIMIT $start, $limit";
$query_filter = ($search !== '') ? "SELECT COUNT(*) FROM $tb_name WHERE kategori LIKE '%$search%'" : "SELECT COUNT(*) FROM $tb_name";

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
print_r($callback);
header('Content-Type: application/json');
echo json_encode($callback);
