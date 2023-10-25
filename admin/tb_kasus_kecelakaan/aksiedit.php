<?php
require_once('../../login/connection.php');
$kategori = $_POST['kategori'];
$kasus = $_POST['kasus_kecelakaan'];
$id = $_POST['id'];
$cek = mysqli_num_rows($mysqli->query("SELECT kasus_kecelakaan FROM tb_kasus_kecelakaan WHERE kasus_kecelakaan ='$kasus'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT kasus_kecelakaan, id_kategori FROM tb_kasus_kecelakaan WHERE kasus_kecelakaan ='$kasus' AND id_kategori = '$kategori'"));
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Kasus Kecelakaan Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} elseif ($cek2 > 1) {
	?>
<script language="javascript">
alert('Status Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_kasus_kecelakaan SET id_kategori ='$kategori', kasus_kecelakaan ='$kasus' WHERE id_kasus_kecelakaan	 ='$id'");
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