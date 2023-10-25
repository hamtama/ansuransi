<?php  
require_once ('../../login/connection.php');
$jenis_bobot = $_POST['jenis_bobot'];
$kriteria = $_POST['kriteria'];
$bobot = $_POST['bobot'];
$cek = mysqli_num_rows($mysqli->query("SELECT jenis_bobot FROM tb_bobot_kriteria WHERE jenis_bobot ='$jenis_bobot'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT jenis_bobot, kriteria FROM tb_bobot_kriteria WHERE jenis_bobot = '$kriteria' AND kriteria = '$kriteria'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if($cek > 1 ){
	?>
<script language="javascript">
alert('Nama Jenis Bobot Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php  
	} elseif ($cek2 > 1){
		?>
<script language="javascript">
alert('Kategori Tersebut Telah Ada, Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
	} else{
		$sql = $mysqli->query("INSERT INTO tb_bobot_kriteria SET id_skala ='$bobot', jenis_bobot = '$jenis_bobot', kriteria = '$kriteria'");
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