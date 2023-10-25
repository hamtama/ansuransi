<?php  
require_once ('../../login/connection.php');
if(isset($_GET['id'])){
$sum = $mysqli->query("SELECT SUM(skala) as sum FROM  tb_bobot_kriteria a INNER JOIN tb_skala b ON b.id_skala = a.id_skala");
$row = mysqli_fetch_array($sum);
echo $sum = $row[0];
$sql = $mysqli->query("SELECT * FROM tb_bobot_kriteria a INNER JOIN tb_skala b ON b.id_skala = a.id_skala");
while ($row = mysqli_fetch_array($sql)){
    $kriteria = $row['kriteria'];
    if($kriteria == 'Biaya'){
        $normal = -$row['skala']/$sum;
    } else {
        $normal = $row['skala']/$sum;
    }
    
    $id = $row['id_bobot_kriteria'];
    $sql_normalisasi = mysqli_query($mysqli, "UPDATE tb_bobot_kriteria SET normalisasi = '$normal' WHERE id_bobot_kriteria = '$id';");
    echo "UPDATE tb_bobot_kriteria SET normalisasi = '$normal' WHERE id_bobot_kriteria = '$id'";
    
}	
if($sql_normalisasi){
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