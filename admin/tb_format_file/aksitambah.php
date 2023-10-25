<?php
require '../../login/connection.php';
$file = $_POST['nama_file'];
$nama_file = strtolower($_POST['nama_file']);
$nama_file = str_replace(" ", "_",$nama_file);

$cek = mysqli_num_rows($mysqli->query("SELECT `nama_file` FROM tb_format_file WHERE nama_file ='$file'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT `file` FROM tb_format_file WHERE file = '$nama_file'"));

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if($cek >= 1 ){
	?>
<script language="javascript">
alert('Nama File Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php  
	} elseif ($cek2 >= 1 ){
    ?>
<script language="javascript">
alert('File Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
    } else {

$sql_query = "INSERT INTO tb_format_file SET nama_file = '$file', ";
$lokasi = "file";


$file = ($_FILES['file']['tmp_name'] != "") ? $nama_file.'.' . array_pop(explode(".", $_FILES["file"]["name"])) : "";
$temp_polisi = $_FILES["file"]["tmp_name"];
$pathFile = $lokasi . "/" . $file;
($_FILES['file']['tmp_name'] != "") ? move_uploaded_file($_FILES['file']['tmp_name'], $pathFile) : "";
$sql_query .= "file = '$file'";

// echo $sql_query;

$sql = $mysqli->query($sql_query);
if($sql){
// echo "input berhasil";
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