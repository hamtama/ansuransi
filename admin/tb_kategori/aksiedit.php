<?php
require_once('../../login/connection.php');
$kategori = $_POST['kategori'];
$id = $_POST['id'];
$cek = mysqli_num_rows($mysqli->query("SELECT kategori FROM tb_kategori WHERE kategori ='$kategori'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if ($cek > 1) {
?>
<script language="javascript">
alert('Kategori Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} else {
		$sql = $mysqli->query("UPDATE tb_kategori SET kategori ='$kategori' WHERE id_kategori ='$id'");
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