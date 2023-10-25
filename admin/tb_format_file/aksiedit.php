<?php
require '../../login/connection.php';
$id = $_POST['id'];
$file = $_POST['nama_file'];
$nama_file = strtolower($_POST['nama_file']);
$nama_file = str_replace(" ", "_",$nama_file);

$file_upload = $_FILES['file']['name']; 

if(!empty($file_upload)){

$cek = mysqli_num_rows($mysqli->query("SELECT `nama_file` FROM tb_format_file WHERE nama_file ='$file'"));
$cek2 = mysqli_num_rows($mysqli->query("SELECT `file` FROM tb_format_file WHERE file = '$nama_file'"));
$sql_rename = mysqli_query($mysqli, "SELECT `file` FROM tb_format_file WHERE id_format_file='$id'") or die (mysql_error($mysqli));
    while ($row = mysqli_fetch_array($sql_rename)){
        $file_rename = $row[0];
        
    }
    unlink('file/'.$file_rename);
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	if($cek > 1 ){
	?>
<script language="javascript">
alert('Nama File Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php  
	} elseif ($cek2 > 1 ){
    ?>
<script language="javascript">
alert('File Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
    } else {

$sql_query = "UPDATE tb_format_file SET nama_file = '$file', ";
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
alert('Update Data Berhasil');
document.location = 'data.php';
</script>
<?php
        } else {
            echo "Update Silahkan Ulangi !";
        } 
    }
}


} else {
    $cek = mysqli_num_rows($mysqli->query("SELECT `nama_file` FROM tb_format_file WHERE nama_file ='$file'"));
    $sql_rename = mysqli_query($mysqli, "SELECT `file` FROM tb_format_file WHERE id_format_file='$id'") or die (mysql_error($mysqli));
    while ($row = mysqli_fetch_array($sql_rename)){
        $file_rename = $row[0];
        
    }
    $dir = 'file/';
    $tmp = explode(".", $file_rename);
    $ekstensi = end($tmp);
    $rename = $nama_file.".".$ekstensi;
    $oldfile = $file_rename;
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if($cek > 1 ){
        ?>
<script language="javascript">
alert('Nama File Sudah Ada. Silahkan Ganti');
// document.location = 'data.php';
</script>
<?php  
        } elseif(file_exists($rename)){ 
        ?>
<script language="javascript">
alert('File Sudah Ada. Silahkan Ganti');
// document.location = 'data.php';
</script>
<?php       

        } else {
   
           
                
        rename($dir . $oldfile, $dir . $rename);
                        
                    
    $sql_query = "UPDATE tb_format_file SET nama_file = '$file', file = '$rename' WHERE id_format_file = '$id'";
    //
    
    $sql = $mysqli->query($sql_query);
    if($sql){
    // echo "input berhasil";
    ?>
<!-- <script language="javascript">
alert('Update Data Berhasil');
document.location = 'data.php';
</script> -->
<?php
            } else {
                echo "Update Silahkan Ulangi !";
            } 
        }
    }  
}
?>