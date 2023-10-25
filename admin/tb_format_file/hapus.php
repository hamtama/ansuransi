<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $sql_delete = mysqli_query($mysqli, "SELECT * from tb_format_file WHERE id_format_file = '$id'") or die(mysqli_error($query));
        while ($row = mysqli_fetch_array($sql_delete)){
            $file = $row['file'];
        }
        unlink('file/'.$file);
	$sql = $mysqli->query("DELETE FROM tb_format_file WHERE id_format_file = '$id'");
    
	if ($sql){
		echo "<script>alert('Data Berhasil Dihapus'); location.href='data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>