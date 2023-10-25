<?php
require_once('../../login/connection.php');
$pekerjaan = $_POST['pekerjaan'];
$cek = mysqli_num_rows($mysqli->query("SELECT pekerjaan FROM tb_kategori WHERE pekerjaan ='$pekerjaan'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Kategori Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php

	} else {
		$sql = $mysqli->query("INSERT INTO tb_pekerjaan SET pekerjaan ='$pekerjaan'");
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