<?php
require_once '../../login/connection.php';
if ($_POST['id'] && $_POST['kolom']) {
    $id = $_POST['id'];
    $kolom = $_POST['kolom'];
    
    $sql = "SELECT $kolom, id_upload_file, dir FROM tb_upload_file WHERE id_upload_file ='$id'";
    $v_kolom = str_replace("_"," ",$kolom);
    $v_kolom = ucwords($v_kolom);
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
        $dir = $baris['dir'];
        $file = $baris[$kolom];
        if(isset($dir)){
            $data = "../pakar/"."$dir"."/"."$file";
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