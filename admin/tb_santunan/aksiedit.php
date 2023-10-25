<?php
require_once('../../login/connection.php');
$id = $_POST["id"];
$jenis_santunan = $_POST['jenis_santunan' . $id];
$santunan = $_POST['currency-field' . $id];
$kategori = $_POST["kategori" . $id];

$santunan = preg_replace('/[^0-9]+/', '', $santunan);
$santunan = substr($santunan, 0, -2);
$cek     = mysqli_num_rows($mysqli->query("SELECT jenis_santunan FROM tb_santunan WHERE jenis_santunan ='$jenis_santunan' AND kategori='$kategori'"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($cek > 1) {
?>
<script language="javascript">
alert('Jenis Santunan Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
    } else {
        $sql = $mysqli->query("UPDATE tb_santunan SET jenis_santunan ='$jenis_santunan',santunan ='$santunan', kategori='$kategori' WHERE id_santunan ='$id'");
        if ($sql) {
        ?>
<script language="javascript">
alert('Ubah Data Berhasil');
document.location = 'data.php';
</script>
<?php
        } else {
        ?>
<script>
alert("Ubah Data Silahkan Ulangi !");
document.location = 'data.php';
</script>
<?php
            echo $mysqli->error($sql);
        }
    }
}
?>