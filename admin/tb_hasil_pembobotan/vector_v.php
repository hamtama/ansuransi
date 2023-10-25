<?php  
require_once ('../../login/connection.php');
if(isset($_GET['id'])){
$sum = $mysqli->query("SELECT SUM(vector_s) as sum FROM  tb_pembobotan");
$row = mysqli_fetch_array($sum);
echo $sum = $row[0];
$sql = $mysqli->query("SELECT * FROM tb_pembobotan ");
while ($row = mysqli_fetch_array($sql)){
    
    $vector_v = $sum/$row['vector_s'];
    
    
    $id = $row['id_pembobotan'];
    $sql_vector_v = mysqli_query($mysqli, "UPDATE tb_pembobotan SET vector_v = '$vector_v' WHERE id_pembobotan = '$id';");
    // echo "UPDATE tb_bobot_kriteria SET normalisasi = '$normal' WHERE id_bobot_kriteria = '$id'";
    
}	
if($sql_vector_v){
    ?>
<script language="javascript">
alert('Input Data Berhasil');
document.location = 'data.php';
</script>
<?php

} else {
    echo "update Gagal";
}
}
?>