<?php
require_once('../../login/connection.php');
$data_input = array();
$k = array();
$cf = array();
$id = $_POST['id_kriteria'];
$kategori = $_POST['kategori'];
// AMBIL DATA KRITERIA DARI FORM TAMBAH DATA
for ($i = 0; $i < sizeof($id); $i++) {
    $kriteria = mysqli_query($mysqli, "SELECT * FROM tb_kriteria where id_kriteria='$id[$i]'");
    $jumlah = mysqli_num_rows($kriteria);
    while ($a = mysqli_fetch_array($kriteria)) {
        $j = $a['id_kriteria'];
        $k['kriteria' . $i] = "kriteria" . $j;
    }
}

// AMBIL COLOM YANG MEMILIKI GEJALA PADA TABLE RULE
$ruleGejala = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_rule WHERE Field LIKE '%gejala%'");
$tg = 1;
while($fc = mysqli_fetch_assoc($ruleGejala)){
    $fetchCol[$tg] = $fc['Field'];
    $tg++;
}

// AMBIL VALUE PADA TABLE RULE BERDASARKAN KATEGORI YANG DIPILIH
$maxgejala = $ruleGejala->num_rows;
for ($i=1 ;$i<=$maxgejala; $i++){
$sql_rule = mysqli_query($mysqli, "SELECT $fetchCol[$i] FROM tb_rule WHERE id_kategori='$kategori'") or die (mysql_error($mysqli));
    while ($row = mysqli_fetch_array($sql_rule)){
        if ($row[0] != NULL){
            $cf['G'.$i]= $row[0]; 
        } else {
            $cf['G'.$i] = 0;
        }
    }
}
// print_r($cf);


// AMBIL DATA NILAI SKALA DARI TABLE RULE UNTUK PERHITUNGAN DARI DATA INPUT USER
for ($i=1 ;$i<=$maxgejala; $i++){
    $a[$i] = $cf['G'.$i];
    // echo "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria=".$cf['G'.$i]."";
    $sql_rule = mysqli_query($mysqli, "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='$a[$i]'") or die (mysql_error($mysqli));
        while ($row = mysqli_fetch_array($sql_rule)){
            if ($row[0] != NULL){
                $cf['G'.$i]= $row[0]; 
                $cf['nilai_skala'.$i]= $row['nilai_skala']; 
            } else {
                $cf['G'.$i] = 0;
                $cf['nilai_skala'.$i]= ''; 
            }
        }
    }
// print_r($cf);
$l = sizeof($k);
// print_r($_POST);

// AMBIL DATA NILAI SKALA DARI DATA YANG DIINPUTKAN OLEH USER
for ($i = 0; $i < $maxgejala; $i++) {
    $post[$i] = $_POST[$k['kriteria' . $i]];
    // echo "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='$post[$i]'";
    $sql_kriteria = mysqli_query($mysqli, "SELECT * FROM tb_sub_kriteria a inner join tb_skala b ON b.id_skala = a.id_skala WHERE id_sub_kriteria='$post[$i]'") or die (mysql_error($mysqli));
        while ($row = mysqli_fetch_array($sql_kriteria)){
            if ($row[0] != NULL){
                $n_user['N'.$i]= $row[0]; 
                $n_user['nilai_skala'.$i]= $row['nilai_skala']; 
            } else {
                $n_user['N'.$i] = 0;
                $n_user['nilai_skala'.$i]= ''; 
            }
        }
}
// print_r($n_user);


// PERHITUNGAN 
for ($i = 1; $i < $maxgejala; $i++) {
    $perhitungan[$i] = $n_user['nilai_skala'.$i]-$cf['nilai_skala'.$i];
    $nilai['hasil' . $i] = pow($perhitungan[$i], 2);
    // $hitung += $perhitungan[$i];
    $jumlah += $nilai['hasil' . $i];
    // echo $n_user['nilai_skala'.$i]."-".$cf['nilai_skala'.$i] ."=".$nilai['hasil' . $i]."<br>";
    // echo $perhitungan[$i];
}
$akar = sqrt($jumlah);
// print_r($nilai);
// echo $akar;
// echo "hitung = ".$hitung;
// echo "Akar dari = ".pow(0,2);
$n_kriteria = "";
for ($i = 0; $i<$maxgejala; $i++){
    if($post[$i] != ''){
        $n_kriteria .= "'".$post[$i]."'";
        if($i != $maxgejala-1){
            $n_kriteria .= ", ";
        }
    } 
}
echo "INSERT INTO tb_pengetahuan VALUES (NULL, $n_kriteria, '$akar','$kategori')";
$sql_insert = mysqli_query($mysqli, "INSERT INTO tb_pengetahuan VALUES (NULL, $n_kriteria, '$akar','$kategori');");
if($sql_insert){
    echo "input berhasil";
    ?>
<!-- <script language="javascript">
alert('Input Data Berhasil');
document.location = 'data.php';
</script> -->
<?php
} else {
    echo "Input Silahkan Ulangi !";
}