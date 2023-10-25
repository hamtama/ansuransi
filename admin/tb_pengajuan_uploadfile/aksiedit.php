<?php
require '../../login/connection.php';
if (isset($_POST['submit'])) {

    $kolom = $_POST["kolom"];
    $id_upload = $_POST['id'];
    $file = $_POST['file'];
    $data = $_FILES[$file]["name"];

    $query = mysqli_query($mysqli, "SELECT * from tb_upload_file where id_upload_file = '$id_upload'");
    while ($row = mysqli_fetch_array($query)) {
        $lokasi = "file:///D:/Teguh/AppServ/www/apps/admin/pakar/".$row['dir'];
        
    }
 

    if (isset($_FILES)) {
        $upload = ($_FILES[$kolom]['tmp_name'] != "") ? $kolom."." . array_pop(explode(".", $_FILES[$kolom]["name"])) : "";
        $temp_polisi = $_FILES[$kolom]["tmp_name"];
        $pathFile = $lokasi . "/" . $upload;
        ($_FILES[$kolom]['tmp_name'] != "") ? move_uploaded_file($_FILES[$kolom]['tmp_name'], $pathFile) : "";
        $sql_query = "UPDATE tb_upload_file SET $kolom = '$upload' WHERE id_upload_file = '$id_upload'";
        $sql = $mysqli->query($sql_query);
        if($sql){
            echo "input berhasil";
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
    exec('icacls "' . $lokasi . '" /q /c /reset'); //command windows(server Local)
}