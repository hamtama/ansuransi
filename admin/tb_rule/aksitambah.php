<?php

use Sabberworm\CSS\CSSList\KeyFrame;

require_once('../../login/connection.php');
if (isset($_POST['submit'])) {
    $data_input = array();
    $k = array();
    // $id = $_POST['id_kriteria'];
    $kategori =  $_POST['kategori'];
    $number = sizeof($_POST['kriteria']);
    $hitungRule = mysqli_query($mysqli, "SELECT kode_rule FROM tb_rule");
    $jmlhRule = $hitungRule->num_rows;
    for ($i = 1; $i <= 5; $i++){
        $kode[$i] = "R0".$i;
        $a = mysqli_query($mysqli,"SELECT kode_rule FROM tb_rule where kode_rule = '$kode[$i]'");
        if(mysqli_num_rows($a) == 0){
            $code = "'".$kode[$i]."'";
            break;
        } 
    }
    $gjl = "";

    for ($i = 0; $i < $number; $i++) {
        if ($_POST['kriteria'][$i] != '') {
            $gjl .= "'" . $_POST['kriteria'][$i] . "'";
            if ($i != $number - 1) {
                $gjl .= ", ";
            }
        }
    }
    for ($i = 0; $i < (10 - $number); $i++) {
        $gjl .= ", NULL";
        // if($i != (7-$number)-1){
        //     $gjl .= ", ";
        // }
    }
    echo $kategori;
    // echo $gjl;
    $cek = mysqli_num_rows($mysqli->query("SELECT id_kategori FROM tb_rule WHERE id_kategori ='$kategori'"));
    if ($cek >= 1) {
        ?>
<script language="javascript">
alert('Rule Kriteria Sudah Ada. Silahkan Ganti');
document.location = 'data.php';
</script>
<?php
    } else {
        $jan = "INSERT INTO tb_rule VALUES(NULL, " . $code . "," . $kategori . ", " . $gjl . ")";
        $sql = mysqli_query($mysqli, $jan);
        if ($sql) {
        ?>
<script language="javascript">
alert('Input Data Berhasil');
document.location = 'data.php';
</script>
<?php
        } else {
            echo "Input Silahkan Ulangi !";
            // mysqli_error($mysqli,$sql);
        }
    }
}