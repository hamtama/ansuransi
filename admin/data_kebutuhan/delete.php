<?php
include '../../login/connection.php';

$jenis_santunan = $_POST['jenis_santunan'];
$kategori = $_POST["kategori"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sql = $mysqli->query("DELETE FROM tb_santunan WHERE jenis_santunan ='$jenis_santunan' and kategori='$kategori'");
    if ($sql) {
?>
        <script language="javascript">
            alert('Hapus Data Berhasil');
            document.location = 'data.php';
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Hapus Data Gagal, Silahkan Ulangi !");
            document.location = 'data.php';
        </script>
<?php
        echo $mysqli->error($sql);
    }
}
