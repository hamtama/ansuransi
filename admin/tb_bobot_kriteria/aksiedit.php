<?php  
require_once ('../../login/connection.php');
$id = $_POST['id'];
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
		$sql = $mysqli->query("UPDATE tb_bobot_kriteria SET id_skala ='$bobot', jenis_bobot = '$jenis_bobot', kriteria = '$kriteria' WHERE id_bobot_kriteria = '$id'");
		if ($sql) {
			?>
<script language="javascript">
alert('Edit Data Berhasil');
document.location = 'data.php';
</script>
<?php
		} else {
			echo "Edit Silahkan Ulangi !";
		}
	}
}
?>