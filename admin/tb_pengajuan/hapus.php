<?php  
include '../../login/connection.php';
if (isset($_GET['delete_id'])) {
	$sql = $mysqli->query("DELETE FROM tb_pengajuan WHERE id_pengajuan = ".$_GET['delete_id']);
	$sql2 = $mysqli->query("DELETE FROM tb_pengajuan_kecelakaan WHERE id_pengajuan = ".$_GET['delete_id']);
	$sql3 = $mysqli->query("DELETE FROM tb_pengajuan_korban WHERE id_pengajuan = ".$_GET['delete_id']);

	if ($sql && $sql2 && $sql3){
		echo "<script>alert('Data Berhasil Dihapus'); location.href='data.php';</script>";
	} else {
		echo "<script>alert ('Gagal Hapus Data, Coba Lagi !!!');</script>". $mysqli->error;
	}
}
?>