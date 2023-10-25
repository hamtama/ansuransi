<?php
require_once('../../login/connection.php');
$kategori = $_POST['kategori'];
$kasus = $_POST['kasus_kecelakaan'];
$cek = mysqli_num_rows($mysqli->query("SELECT kasus_kecelakaan FROM tb_kasus_kecelakaan  WHERE kasus_kecelakaan ='$kasus_kecelakaan'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Nama Kasus Kecelakaan Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php

	} else {
		$sql = $mysqli->query("INSERT INTO tb_kasus_kecelakaan SET id_kategori ='$kategori', kasus_kecelakaan ='$kasus'");
		if ($sql) {
		?>
<script language="javascript">
alert('Input Data Berhasil');
document.location = 'data.php';
</script>
<?php
		} else {
			echo "Input Silahkan Ulangi !";
		}
	}
}
?>