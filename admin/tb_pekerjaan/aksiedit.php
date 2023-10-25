<?php
require_once('../../login/connection.php');
$pekerjaan = $_POST['pekerjaan'];
$id = $_POST['id'];
$cek = mysqli_num_rows($mysqli->query("SELECT pekerjaan FROM tb_pekerjaan WHERE pekerjaan ='$pekerjaan'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Kategori Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_pekerjaan SET pekerjaan ='$pekerjaan' WHERE id_pekerjaan ='$id'");
		if ($sql) {
		?>
<script language="javascript">
alert('Edit Data Berhasil');
document.location = 'data.php';
</script>
<?php
		} else {
			echo "Input Silahkan Ulangi !";
		}
	}
}
?>