<?php
require '../../login/connection.php';
if (isset($_POST['submit'])) {

    $no_reg = $_POST["no_reg"];

    $query = mysqli_query($mysqli, "SELECT * from tb_pengajuan where no_pengajuan = '$no_reg'");
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id_pengajuan'];
        $noreg = explode("/", $row['no_pengajuan']);
        $nama = str_replace(" ", "_", $row['nama_pengaju']);
        $tgl = str_replace("-", "", $row['tgl_lahir']);
    }

    $sql_query = "INSERT INTO tb_upload_file SET id_pengajuan = '$id',";

    $lokasi = "pendaftaran/" . $noreg[0] . "_" . "$nama";
    if (!is_dir($lokasi)) {
        mkdir($lokasi, 0755);
    }
    // $pathFile .= "/"."pendaftaran/";

    // ini_set('display_errors', true);
    // error_reporting(E_ALL);



    // FILE KETERANGAN POLISI
    if (isset($_FILES)) {
        $polisi = ($_FILES['polisi']['tmp_name'] != "") ? 'ket_polisi.' . array_pop(explode(".", $_FILES["polisi"]["name"])) : "";
        $temp_polisi = $_FILES["polisi"]["tmp_name"];
        $pathFile = $lokasi . "/" . $polisi;
        ($_FILES['polisi']['tmp_name'] != "") ? move_uploaded_file($_FILES['polisi']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_kepolisian = '$polisi',";

        // FILE SIM
        $sim = ($_FILES['sim']['tmp_name'] != "") ? 'sim.' . array_pop(explode(".", $_FILES["sim"]["name"])) : "";
        $tmp_sim = $_FILES["sim"]["tmp_name"];
        $pathFile = $lokasi . "/" . $sim;
        ($_FILES['sim']['tmp_name'] != "") ? move_uploaded_file($_FILES['sim']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_sim = '$sim',";

        // FILE STNK
        $stnk = ($_FILES['stnk']['tmp_name'] != "") ? 'stnk.' . array_pop(explode(".", $_FILES["stnk"]["name"])) : "";
        $tmp_stnk = $_FILES["stnk"]["tmp_name"];
        $pathFile = $lokasi . "/" . $stnk;
        ($_FILES['stnk']['tmp_name'] != "") ? move_uploaded_file($_FILES['stnk']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_stnk = '$stnk',";

        // FIE KTP
        $ktp = ($_FILES['ktp']['tmp_name'] != "") ? 'ktp.' . array_pop(explode(".", $_FILES["ktp"]["name"])) : "";
        $tmp_ktp = $_FILES["ktp"]["tmp_name"];
        $pathFile = $lokasi . "/" . $ktp;
        ($_FILES['ktp']['tmp_name'] != "") ? move_uploaded_file($_FILES['ktp']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_ktp = '$ktp',";

        // FILE KK
        $kk = ($_FILES['kk']['tmp_name'] != "") ? "kk." . array_pop(explode(".", $_FILES["kk"]["name"])) : "";
        $tmp_kk = $_FILES["kk"]["tmp_name"];
        $pathFile = $lokasi . "/" . $kk;
        ($_FILES['kk']['tmp_name'] != "") ? move_uploaded_file($_FILES['kk']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_kk = '$kk',";

        // FILE AKTE NIKAH
        $akte_nikah = ($_FILES['akte_nikah']['tmp_name'] != "") ? "akta_nikah." . array_pop(explode(".", $_FILES["akte_nikah"]["name"])) : "";
        $tmp_akte = $_FILES["akte_nikah"]["name"];
        $pathFile = $lokasi . "/" . $akte_nikah;
        ($_FILES['akte_nikah']['tmp_name'] != "") ? move_uploaded_file($_FILES['akte_nikah']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_akta_nikah = '$akte_nikah',";

        // FILE AKTE KELAHIRAN
        $akte_kelahiran = ($_FILES['akte_lahir']['tmp_name'] != "") ? "akta_lahir." . array_pop(explode(".",  $_FILES["akte_lahir"]["name"])) : "";
        $tmp_akte = $_FILES["akte_lahir"]["tmp_name"];
        $pathFile = $lokasi . "/" . $akte_kelahiran;
        ($_FILES['akte_lahir']['tmp_name'] != "") ? move_uploaded_file($_FILES['akte_kelahiran']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_akta_lahir = '$akte_kelahiran',";

        // FILE DIAGNOSIS DOKTER
        $diagnosis = ($_FILES['diagnosis']['tmp_name'] != "") ? "diagnosis_dokter." . array_pop(explode(".", $_FILES["diagnosis"]["name"])) : "";
        $tmp_diagnosis = $_FILES["diagnosis"]["tmp_name"];
        $pathFile = $lokasi . "/" . $diagnosis;
        ($_FILES['diagnosis']['tmp_name'] != "") ? move_uploaded_file($_FILES['diagnosis']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_diagnosis_dokter = '$diagnosis',";

        // FILE AHLI WARIS
        $ahli_waris = ($_FILES['ahli_waris']['tmp_name'] != "") ? "ahli_waris." . array_pop(explode(".", $_FILES["ahli_waris"]["name"])) : "";
        $tmp_diagnosis = $_FILES["ahli_waris"]["tmp_name"];
        $pathFile = $lokasi . "/" . $ahli_waris;
        ($_FILES['ahli_waris']['tmp_name'] != "") ? move_uploaded_file($_FILES['ahli_waris']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_ahli_waris = '$ahli_waris',";

        // FILE KWITANSI DOKTER
        $kwitansi = ($_FILES['kwitansi']['tmp_name'] != "") ? "kwitansi_dokter." . array_pop(explode(".", $_FILES["kwitansi"]["name"])) : "";
        $tmp_kwitansi = $_FILES["kwitansi"]["tmp_name"];
        $pathFile = $lokasi . "/" . $kwitansi;
        ($_FILES['kwitansi']['tmp_name'] != "") ? move_uploaded_file($_FILES['kwitansi']['tmp_name'], $pathFile) : "";
        $sql_query .= "file_kwitansi_dokter = '$kwitansi',";

        // FILE KWITANSI APOTEK
        $kwitansi_apotek = ($_FILES['kwitansi']['tmp_name'] != "") ? "kwitansi_apotek." . array_pop(explode(".", $_FILES["kwitansi_apotek"]["name"])) : "";
        $tmp_kwitansi_apotek = $_FILES["kwitansi"]["tmp_name"];
        $pathFile = $lokasi . "/" . $kwitansi_apotek;
        ($_FILES['kwitansi_apotek']['tmp_name'] != "") ? move_uploaded_file($_FILES["kwitansi_apotek"]['tmp_name'], $pathFile) : "";
        $sql_query .= "file_kwitansi_apotek = '$kwitansi_apotek',";

        // FILE DOKUMEN KWITANSI RAWAT
        $kwitansi_rawat = ($_FILES['kwitansi_rawat']['tmp_name'] != "") ? "kwitansi_rawat." . array_pop(explode(".", $_FILES["kwitansi_rawat"]["name"])) : "";
        $tmp_kwitansi_rawat = $_FILES["kwitansi_rawat"]["tmp_name"];
        $pathFile = $lokasi . "/" . $dokumen_lain;
        ($_FILES['kwitansi_rawat']['tmp_name'] != "") ? move_uploaded_file($_FILES["kwitansi_rawat"]['tmp_name'], $pathFile) : "";
        $sql_query .= "file_kwitansi_rawat = '$kwitansi_rawat'";

        $j = $_POST["jumlah"];
        if ($j != 0) {
            $sql_query .= ",";
            for ($i = 0; $i < $j; $i++) {
                // FILE DOKUMEN TAMBAHAN 1
                $dokumen_lain[$i] = ($_FILES['dokumen_lain' . ($i + 1)]['tmp_name'] != "") ? "dokumen_tambahan" . ($i + 1) . "." . array_pop(explode(".", $_FILES["dokumen_lain" . ($i + 1)]["name"])) : "";
                $tmp_dokumen_lain[$i] = $_FILES["dokumen_lain" . ($i + 1)]["tmp_name"];
                $pathFile = $lokasi . "/" . $dokumen_lain[$i];
                move_uploaded_file($_FILES["dokumen_lain" . ($i + 1)]['tmp_name'], $pathFile);
                $sql_query .= "file_dokumen_tambahan" . ($i + 1) . " = '" . $dokumen_lain[$i] . "'";
                if ($i != ($j - 1)) {
                    $sql_query .= ",";
                }
            }
        }
        $sql = $mysqli->query($sql_query);
        // echo $sql_query;
        // echo "<br>";
        // echo "<pre>";
        // print_r($_FILES);
        // echo "</pre>";
        // $sql = $mysqli->query("INSERT INTO tb_upload_file SET                   
        //                                 id_pengajuan            = '$id',
        //                                 file_kepolisian         = '$polisi',
        //                                 file_sim                = '$sim',          
        //                                 file_stnk               ='$stnk',
        //                                 file_ktp                ='$ktp',    
        //                                 file_kk                 ='$kk', 
        //                                 file_akte_nikah         ='$akte_nikah', 
        //                                 file_akta_lahir         ='$akte_kelahiran ', 
        //                                 file_diagnosis_dokter   ='$diagnosis', 
        //                                 file_ahli_waris         ='$ahli_waris', 
        //                                 file_kwitansi_dokter    ='$kwitansi',   
        //                                 file_kwitansi_apotek    ='$kwitansi_apotek', 
        //                                 kwitansi_rawat          ='$dokumen_lain', 
        //                                 file_dokumen_tambahan1  ='', 
        //                                 file_dokumen_tambahan2  ='', 
        //                                 file_dokumen_tambahan3  ='', 
        //                                 file_dokumen_tambahan4  ='', 
        //                                 file_dokumen_tambahan5  =''")

        // // FILE DOKUMEN TAMBAHAN 2
        // $dokumen_lain = "dokumen_tambahan2." . array_pop(explode(".", $_FILES["dokumen_lain2"]["name"]));
        // $tmp_dokumen_lain = $_FILES["dokumen_lain2"]["tmp_name"];
        // $pathFile = $lokasi . "/" . $dokumen_lain;
        // move_uploaded_file($_FILES["dokumen_lain2"]['tmp_name'], $pathFile);

        // // FILE DOKUMEN TAMBAHAN 3
        // $dokumen_lain = "dokumen_tambahan3." . array_pop(explode(".", $_FILES["dokumen_lain3"]["name"]));
        // $tmp_dokumen_lain = $_FILES["dokumen_lain2"]["tmp_name"];
        // $pathFile = $lokasi . "/" . $dokumen_lain;
        // move_uploaded_file($_FILES["dokumen_lain3"]['tmp_name'], $pathFile);

        // // FILE DOKUMEN TAMBAHAN 4
        // $dokumen_lain = "dokumen_tambahan4." . array_pop(explode(".", $_FILES["dokumen_lain4"]["name"]));
        // $tmp_dokumen_lain = $_FILES["dokumen_lain4"]["tmp_name"];
        // $pathFile = $lokasi . "/" . $dokumen_lain;
        // move_uploaded_file($_FILES["dokumen_lain4"]['tmp_name'], $pathFile);

        // // FILE DOKUMEN TAMBAHAN 5
        // $dokumen_lain = "dokumen_tambahan5." . array_pop(explode(".", $_FILES["dokumen_lain5"]["name"]));
        // $tmp_dokumen_lain = $_FILES["dokumen_lain5"]["tmp_name"];
        // $pathFile = $lokasi . "/" . $dokumen_lain;
        // move_uploaded_file($_FILES["dokumen_lain5"]['tmp_name'], $pathFile);

        // chmod($namaDir, 0755);                       //command Linux
        exec('icacls "' . $lokasi . '" /q /c /reset'); //command windows(server Local)
    }
}
