<?php
require_once('../../login/connection.php');
$nilai = $_POST['nilai'];
$status = $_POST['status'];
$cek = mysqli_num_rows($mysqli->query("SELECT skala FROM tb_skala WHERE skala ='$nilai'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT status FROM tb_skala WHERE status = '$status'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Nama Jenis Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} elseif ($cek2 > 1) {
	?>
<script language="javascript">
alert('Status Telah Ada, Silahkan Ganti');
document.location = 'data.php';
</script>
<?php

	} else {
		$sql = $mysqli->query("INSERT INTO tb_skala SET skala ='$nilai', status = '$status'");
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