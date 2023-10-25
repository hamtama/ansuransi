<?php
require_once '../../login/connection.php';
if ($_POST['id']) {
    $id = $_POST['id'];
    
    $sql = "SELECT `file` FROM tb_format_file WHERE id_format_file ='$id'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
        $dir = "../../admin/tb_format_file/file/";
        $file = $baris['file'];
        if(isset($dir)){
            $data = "../../admin/tb_format_file/file/".$file;
        } else {
            $data = "Data Kosong";
        }
}
$data
?>
<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" width="100%" height="400px" src="<?=$data?>" allowfullscreen></iframe>
</div>

<?php
}
?>