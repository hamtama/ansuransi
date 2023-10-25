<?php  
require_once ('../../login/connection.php');
$data_gagal = $_POST['data_gagal'];
$cek = mysqli_num_rows($mysqli->query("SELECT data_gagal FROM tb_gagal WHERE data_gagal ='$data_gagal'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if($cek >= 1 ){
	?>
<script language="javascript">
alert('Nama Gagal Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php  
	} else{
		$sql = $mysqli->query("INSERT INTO tb_gagal SET data_gagal ='$data_gagal'");
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