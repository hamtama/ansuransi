<?php
require_once('../../login/connection.php');

date_default_timezone_set('Asia/Jakarta');
// echo date('d F Y');
$t = date('Y-m-d');
$today = date('Y-m-d G:i:s');

?>
<style>
    div::-webkit-scrollbar {
        display: none;
        /* for Chrome, Safari, and Opera */
    }


    div::-webkit-scrollbar {
        display: none;
        /* for Chrome, Safa*/
    }

    @media print {

        /* Hide Every other element */
        body,
        footer,
        header,
        content,
        nav {
            visibility: hidden;
        }

        title * {
            visibility: hidden;
        }

        .x_title {
            display: none;
            margin: 0px;
            padding: 0px;
        }

        #hide_div {
            display: none;
            margin: 0px;
            padding: 0px;
        }

        /*then displaying print x-content */


        .x_content {

            background-color: transparent !important;
        }

        .x_panel {
            background-color: transparent;
            margin: 2em;
            padding: 0px;
        }
    }
</style>
<!-- page content -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sistem Pakar Ansuransi</title>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../login/assets/vendors/images/apple-touch-icon_2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../login/assets/vendors/images/favicon-32x32_2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../login/assets/vendors/images/favicon-16x16_2.png">
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
    <!-- Bootstrap -->
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts Roboto -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" /> -->
    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Data Toggle -->
    <link href="../../assets/vendors/bootstrap-toggle/bootstrap-toggle.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../../assets/vendors/bootstrap-icheck/icheck-bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendors/bootstrap-icheck/icheck-bootstrap.css" rel="stylesheet">
    <!-- bootstrap-daterangepicker -->
    <link href="../../assets/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- bootstrap-datetimepicker -->
    <link href="../../assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">


</head>

<body>
    <!--Main Navigation-->
    <header>
        <style>
            /* Carousel styling */
            #introCarousel,
            .carousel-inner,
            .carousel-item,
            .carousel-item.active {
                height: 100vh;
            }

            .carousel-item:nth-child(1) {
                background-image: url('../img/ansuransi1.jpg');
                background-repeat: no-repeat;
                background-size: cover;
                background-position: center center;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #introCarousel {
                    margin-top: -58.59px;
                }

                #introCarousel,
                .carousel-inner,
                .carousel-item,
                .carousel-item.active {
                    height: 50vh;
                }
            }

            .navbar .nav-link {
                color: #fff !important;
            }
        </style>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand nav-link" href="../index.php">
                    <strong>Jasa Raharja</strong>
                </a>
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </nav>
        <!-- Navbar -->

        <!-- Carousel wrapper -->
        <div id="introCarousel" class="carousel slide carousel-fade shadow-2-strong" data-mdb-ride="carousel">
            <!-- Inner -->
            <div class="carousel-inner">
                <!-- Single item -->
                <div class="carousel-item active">
                    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <div class="text-white text-center">
                                <h1 class="mb-3"></h1>
                                <h5 class="mb-4">SISTEM REKOMENDASI KLAIM <br>
                                    PENENTUAN CUSTOMER YANG LAYAK MENDAPATKAN
                                    ANSURANSI KECELAKAAN KENDARAAN BERMOTOR <br> MENGGUNAKAN METODE WEIGHTED PRODUCT
                                </h5>
                                <a class="btn btn-outline-light btn-lg m-2" href="../index.php" role="button" rel="nofollow" target="_blank">Beranda</a>
                                <a class="btn btn-outline-light btn-lg m-2" href="format_pengajuan.php" target="_blank" role="button">Download
                                    Format File Pengajuan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel wrapper -->
    </header>
    <!--Main Navigation-->
    <!--Main layout-->
    <main class="mt-5">
        <div class="container">
            <!--Section: Content-->
            <section>
                <div class="row">
                    <div class="col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <a href="../index.php" class="btn btn-outline-primary"> <i class="fa
                                        fa-chevron-left"> </i> Kembali
                                </a>
                                <!-- <a href="upload.php" class="btn btn-outline-primary"> <i class="fa
                                        fa-upload"> </i> Upload File
                                </a> -->
                                <!-- <button type="button" class="btn btn-outline-primary" id="btn_print" data-toggle="modal" data-target="#exampleModal"> Print</button> -->

                                <!-- <button id="previewBtn">Preview PDF</button> -->
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>

                                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form role="form" class="form-horizontal form-label-left needs-validation" method="post" id="form_pengajuan" action="aksitambah.php" novalidate>
                                    <!-- Smart Wizard -->
                                    <div id="wizard" class="form_wizard wizard_horizontal">
                                        <ul class="wizard_steps">
                                            <li>
                                                <a href="#step-1">
                                                    <span class="step_no">1</span>
                                                    <span class="step_descr">
                                                        Step 1<br />
                                                        <small>Step 1 description</small>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-2">
                                                    <span class="step_no">2</span>
                                                    <span class="step_descr">
                                                        Step 2<br />
                                                        <small>Step 2 description</small>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-3">
                                                    <span class="step_no">3</span>
                                                    <span class="step_descr">
                                                        Step 3<br />
                                                        <small>Step 3 description</small>
                                                    </span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#step-4">
                                                    <span class="step_no">4</span>
                                                    <span class="step_descr">
                                                        Step 4<br />
                                                        <small>Step 4 description</small>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>

                                        <div id="step-1">
                                            <div class="clearfix">
                                                <div class="text-center">
                                                    <h4 class="text-black h3  mt-30 mb-0"><u>FORMULIR PENGAJUAN SANTUNAN
                                                            JASA
                                                            RAHARJA</u></h4>
                                                    <p class="mb-30 mt-0">(Diisi dan Ditandatangani Oleh Penerima Dana
                                                        Santunan)</p>
                                                </div>
                                            </div>


                                            <div class="form-group field item row">
                                                <?php
                                                $no = '';
                                                $tgl = date('d');
                                                $bln = date('m');
                                                $thn = date('Y');
                                                $a = array("0", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X", "XI", "XII");
                                                for ($i = 0; $i < count($a); $i++) {
                                                    $k = ltrim($bln, '0');
                                                    if ($i == $bln) {
                                                        $bln = $a[$i];
                                                    }
                                                }
                                                $sql = mysqli_query($mysqli, "SELECT * FROM tb_pengajuan ORDER BY id_pengajuan DESC LIMIT 1") or die(mysqli_error($mysqli));
                                                if (mysqli_num_rows($sql) > 0) {
                                                    while ($row = mysqli_fetch_array($sql)) {
                                                        $no_reg = explode('/', $row['no_pengajuan']);
                                                        $no_reg = substr($no_reg[0], 3);
                                                        if ($tgl == 01 && $bln == 01) {
                                                            $no_urut == 00;
                                                        } else {
                                                            $no_urut = $no_reg + 1;
                                                        }
                                                        if ($no_reg >= 99) {
                                                            $r = 'REG';
                                                        } else if ($no_reg >= 9) {
                                                            $r = 'REG0';
                                                        } else {
                                                            $r = 'REG00';
                                                        }
                                                        $no_reg = $r . $no_urut . '/' . $bln . '/' . $thn . '';
                                                    }
                                                } else {
                                                    $no_reg = 'REG001' . '/' . $bln . '/' . $thn . '';
                                                } ?>
                                                <label for="no_reg" class="col-form-label col-md-3 col-sm-3 label-align col-form-label">No.
                                                    Registrasi <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6">
                                                    <input class="form-control" autocomplete="off" value="<?= $no_reg; ?>" name="no_reg" type="text" id="no_reg" readonly>
                                                </div>
                                            </div>
                                            <input type="hidden" name="date_reg" value="<?= $today; ?>">
                                            <div class="form-group field item row">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-lengkap">
                                                    Nama Lengkap <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" name="nama" id="nama" required="required" class="form-control" placeholder="Nama Lengkap Pengaju" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Tempat/Tanggal Lahir <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 input-group">
                                                    <input type="text" name="tempat_lahir" id="tempat_lahir" autocomplete="off" aria-label="Tempat lahir" class="form-control" placeholder="Tempat Lahir" required>
                                                    <input type="date" id="tanggal_lahir" autocomplete="off" max="<?= $t; ?>" name="tanggal_lahir" aria-label="Tanggal lahir" class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Umur <span class="required">*</span></label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" name="umur" id="umur" readonly autocomplete="off" data-v-max-length="2" class="form-control" placeholder="Umur" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor
                                                    KTP/NIK <span class="required">*</span>
                                                </label>
                                                <div class="col-md-6 col-sm-6 ">
                                                    <input type="text" aria-label="NIK" id="nik" autocomplete="off" name="nik" autocomplete="off" data-v-min-length="16" data-v-max-length="16" class="form-control" placeholder="NIK" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Provinsi
                                                    <span class="required">*</span></label>
                                                <div id="pilprov" class="col-sm-12 col-md-6"></div>
                                            </div>
                                            <div id="kota-kab" class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Kabupaten<span class="required">*</span></label>
                                                <div id="pilkab" class="col-sm-12 col-md-6"></div>
                                            </div>
                                            <div id="kecamatan" class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Kecamatan<span class="required">*</span></label>
                                                <div id="pilkec" class="col-sm-12 col-md-6"></div>
                                            </div>
                                            <div id="kelurahan" class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Kelurahan<span class="required">*</span></label>
                                                <div id="pilkel" class="col-sm-12 col-md-6"></div>
                                            </div>
                                            <div id="alamat" class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Alamat
                                                    Detail<span class="required">*</span></label>
                                                <div id="inputalamat" class="col-sm-12 col-md-6">
                                                    <input type="text" aria-label="Alamat" id="alamatlgkp" autocomplete="off" name="alamat" class="form-control" placeholder="Alamat lengkap" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">No. Telp
                                                    <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6">
                                                    <input type="tel" aria-label="No Telp" id="notel" autocomplete="off" name="notel" class="form-control" placeholder="No Telp" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis
                                                    Kelamin <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6 ">
                                                    <div class="custom-control custom-radio  jk">
                                                        <input type="radio" id="customRadio1" value="Laki-Laki" name="jk" class="custom-control-input" required>
                                                        <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                                    </div>
                                                    <div class="custom-control  custom-radio jk">
                                                        <input type="radio" id="customRadio2" value="Perempuan" name="jk" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis
                                                    Pekerjaan <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6 row ">
                                                    <?php
                                                    $query = mysqli_query($mysqli, "SELECT * from tb_pekerjaan");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $id_p = $row['id_pekerjaan'];
                                                        $pekerjaan = $row['pekerjaan'];
                                                        echo
                                                        '<div class="col-md-5 col-sm-12">
                                                        <div class="custom-control custom-radio jenispk">
                                                        <input type="radio" id="kerja' . $id_p . '" value="' . $id_p . '" name="pekerjaan" class="custom-control-input" required>
                                                        <label class="custom-control-label" for="kerja' . $id_p . '">' . $pekerjaan . '</label></div></div>';
                                                    }
                                                    ?>
                                                    <div class="col-md-5 col-sm-12">
                                                        <div class="custom-control field item custom-radio jenispk ">
                                                            <input type="radio" id="radio2" value="lainnya" name="pekerjaan" class="custom-control-input">
                                                            <label class="custom-control-label" for="radio2">Lainnya</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="kerja_lainnya" class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis
                                                    Pekerjaan
                                                    Lainnya<span class="required">*</span></label>
                                                <div id="inputpekerjaan" class="col-sm-12 col-md-6">
                                                    <input type="text" id="kerja_lain" autocomplete="off" name="kerja_lain" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-2">
                                            <div class="text-center">
                                                <h4 class="text-black h2 mt-30 mb-4"><u>HUBUNGAN DENGAN KORBAN
                                                        SEBAGAI</u></h4>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Tanggal
                                                    Kejadian <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6 input-group date" id='myDatepicker2'>
                                                    <!-- <input type="hidden"> -->
                                                    <input class="form-control" autocomplete="off" placeholder="Tanggal Kejadian" id="show" type="text" required>
                                                    <span class="input-group-addon">
                                                        <span class="fa fa-calendar"></span>
                                                    </span>
                                                </div>
                                                <input type="hidden" name="tanggalkejadian" id="myDatepicker" value="">
                                            </div>

                                            <div class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Waktu
                                                    Kejadian <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6 ">

                                                    <input class="form-control" name="waktukejadian" autocomplete="off" id="waktu" placeholder="Select Time" type="time" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Tempat
                                                    Kejadian
                                                    <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6">
                                                    <input class="form-control" name="tkp" id="tkp" autocomplete="off" placeholder="Alamat, Kelurahan, Kecamata, Kabupaten, Provinsi" type="text" required>
                                                </div>
                                            </div>
                                            <div class="form-group field item row " data-checkbox-group data-v-required data-v-min-select="1">
                                                <label class="col-sm-12 col-md-3 col-form-label label-align"> Mengajukan
                                                    Santunan
                                                    Sebagai <span class="required">*</span> <br>
                                                    <font style="font-size: x-small; padding-right: 10px;">Dapat Lebih
                                                        Dari Satu
                                                    </font>
                                                </label>
                                                <div id="jsantunan" class="col-sm-12 col-md-6">
                                                    <?php
                                                    $query = mysqli_query($mysqli, "SELECT * from tb_santunan group by jenis_santunan");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $id_s = $row['id_santunan'];
                                                        $santunan = $row['jenis_santunan'];
                                                        echo
                                                        '<div class="custom-control custom-checkbox dsantunan" >
                                                            <input type="checkbox" id="santunan' . $id_s . '" value="' . $santunan . '" name="santunan[]" class="custom-control-input isantunan">
                                                            <label class="custom-control-label" for="santunan' . $id_s . '">' . $santunan . '</label></div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="form-group row" data-checkbox-group data-v-required>
                                                <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis
                                                    Kecelakaan
                                                    <span class="required">*</span></label>
                                                <div class="col-sm-12 col-md-6">
                                                    <?php
                                                    $query = mysqli_query($mysqli, "SELECT * from tb_kasus_kecelakaan");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        $id_k = $row['id_kasus_kecelakaan'];
                                                        $kecelakaan = $row['kasus_kecelakaan'];
                                                        echo
                                                        '<div class="custom-control custom-radio jkecel">
                                    <input type="radio" id="Radiokecel' . $id_k . '" value="' . $id_k . '" name="jkecel" class="custom-control-input" required>
                                    <label class="custom-control-label" for="Radiokecel' . $id_k . '">' . $kecelakaan . '</label>
                                </div>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="step-3">

                                            <div class="text-center">
                                                <h4 class="text-black h2 mt-30 mb-4"><u>DATA DIRI KORBAN KECELAKAAN</u>
                                                </h4>
                                            </div>
                                            <section class="pt-4">
                                                <p class="h6">2. Identitas Korban Kecelakaan (Tidak Perlu Diisi Jika
                                                    Yang
                                                    Mengajukan
                                                    Adalah
                                                    Korban Sendiri) Sebagai Berikut :</p>
                                                <div class="col-sm-12 col-md-12 mb-30">
                                                    <div class="card card-box">
                                                        <div class="card-body">
                                                            <blockquote class="blockquote mb-0">
                                                                <cite title="Source Title" class="d-flex justify-content-center">Form
                                                                    Tidak
                                                                    Perlu Diisi Jika Anda Adalah Korban</cite>
                                                                <p class="h6 text-center" style="font-size: 12px;">*Klik
                                                                    Tombol
                                                                    Bila
                                                                    Ingin
                                                                    Mengisi Form*</p>
                                                                <div class=" d-flex justify-content-center">
                                                                    <button type="button" id="aktif_form" class="btn btn-ml m-2 rounded-pill ufrom" data-color="#ffffff"><i class="fa fa-toggle-off"></i></button>
                                                                    <button class="d-none" type="button" class="btn" id="nonaktif_form"></button>
                                                                </div>
                                                            </blockquote>
                                                            <input type="hidden" id="aktif_form3" name="check" value="tidakaktif">
                                                        </div>
                                                    </div>
                                                    <div class="form-group field item row mt-3">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Nama
                                                            Lengkap <span class="required">*</span></label>
                                                        <div class="col-sm-12 col-md-9">
                                                            <input class="form-control ck" id="nama_kb" autocomplete="off" name="nama_kb" type="text" placeholder="Nama Lengkap Korban" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field item row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Tempat &
                                                            Tanggal
                                                            Lahir <span class="required">*</span></label>
                                                        <div class="col-sm-12 col-md-9 input-group mb-0">
                                                            <input type="text" id="t4_lahir_kb" autocomplete="off" name="tempat_lahir_kb" class="form-control ck" placeholder="Tempat Lahir Korban" required>
                                                            <input type="date" id="tanggal_lahir_kb" autocomplete="off" max="<?= $t; ?>" name="tanggal_lahir_kb" class="form-control ck" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field item row">
                                                        <label class="col-sm-12 col-md-3 col-form-label ">Umur
                                                            Korban <span class="required">*</span></label>
                                                        <div class="col-sm-12 col-md-3">
                                                            <input type="text" id="umur_kb" readonly aria-label="Umur" data-v-max-length="2" class="form-control ck" placeholder="Umur" name="umur_kb" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field item row">
                                                        <label class="col-sm-12 col-md-3 col-form-label ">Nomor KTP/NIK
                                                            Korban <span class="required">*</span></label>
                                                        <div class="col-sm-12 col-md-9">
                                                            <input type="text" aria-label="NIK Korban" id="nik_kb" name="nik_kb" data-v-min-length="16" data-v-max-length="16" class="form-control ck" placeholder="NIK Korban" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group field item row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Provinsi <span class="required">*</span></label>
                                                        <div id="pilprov_kb" class="col-sm-12 col-md-9"></div>
                                                    </div>
                                                    <div id="kota-kab_kb" class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Kabupaten<span class="required">*</span></label>
                                                        <div id="pilkab_kb" class="col-sm-12 col-md-9"></div>
                                                    </div>
                                                    <div id="kecamatan_kb" class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Kecamatan<span class="required">*</span></label>
                                                        <div id="pilkec_kb" class="col-sm-12 col-md-9"></div>
                                                    </div>
                                                    <div id="kelurahan_kb" class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Kelurahan<span class="required">*</span></label>
                                                        <div id="pilkel_kb" class="col-sm-12 col-md-9"></div>
                                                    </div>
                                                    <div id="alamat_kb" class="form-group field item row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Alamat
                                                            Lengkap<span class="required">*</span></label>
                                                        <div id="inputalamat_kb" class="col-sm-12 col-md-9">
                                                            <input type="text" aria-label="Alamat Koban" id="alamatlgkp_kb" name="alamat_kb" class="form-control ck" placeholder="Alamat lengkap" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label required">No.
                                                            Telp
                                                            Korban</label>
                                                        <div class="col-sm-12 col-md-9">
                                                            <input type="tel" aria-label="No Telp Korban" id="notel_kb" autocomplete="off" name="notel_kb" class="form-control ck" placeholder="No Telp Korban" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-3 col-form-label">Jenis
                                                            Kelamin <span class="required">*</span></label>
                                                        <div class="col-sm-12 col-md-9 ">
                                                            <div class="custom-control custom-radio jk_k">
                                                                <input type="radio" id="radio_jk_kb1" value="Laki-Laki" name="jk_kb" class="custom-control-input ck" required>
                                                                <label class="custom-control-label" for="radio_jk_kb1">Laki -
                                                                    Laki</label>
                                                            </div>
                                                            <div class="custom-control  custom-radio jk_k">
                                                                <input type="radio" id="radio_jk_kb2" value="Perempuan" name="jk_kb" class="custom-control-input ck">
                                                                <label class="custom-control-label" for="radio_jk_kb2">Perempuan</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-3  col-form-label">Jenis
                                                            Pekerjaan <span class="required">*</span></label>
                                                        <div class="col-sm-12 col-md-6 row">
                                                            <?php
                                                            $query = mysqli_query($mysqli, "SELECT * from tb_pekerjaan");
                                                            while ($row = mysqli_fetch_array($query)) {
                                                                $id_p = $row['id_pekerjaan'];
                                                                $pekerjaan = $row['pekerjaan'];
                                                                echo
                                                                '<div class="col-md-5 col-sm-12">
                                <div class="custom-control custom-radio jenispk_kb">
                                <input type="radio" id="kerja_korban' . $id_p . '" value="' . $id_p . '" name="pekerjaan_kb" class="custom-control-input ck" required>
                                <label class="custom-control-label" for="kerja_korban' . $id_p . '">' . $pekerjaan . '</label></div></div>';
                                                            }
                                                            ?>
                                                            <div class="col-md-5 col-sm-12">
                                                                <div class="custom-control custom-radio jenispk_kb">
                                                                    <input type="radio" id="radiokb2" value="lainnya_kb" name="pekerjaan_kb" class="custom-control-input ck">
                                                                    <label class="custom-control-label" for="radiokb2">Lainnya</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="kerja_lainnya_kb" class="form-group row field item">
                                                        <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis
                                                            Pekerjaan
                                                            Lainnya<span class="required">*</span></label>
                                                        <div id="inputpekerjaan_kb" class="col-sm-12 col-md-9">
                                                            <input type="text" aria-label="kerja_lain_kb" id="kerja_lain_kb" name="kerja_lain_kb" class="form-control ck" placeholder="Lainnya">
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                        <div id="step-4">
                                            <section>
                                                <p class="h6">3. Dalam pengajuan santuan Jasa Raharja ini saya
                                                    menyatakan dengan
                                                    sebenar-benarnya, dlam keadaan sadar dan tanpa paksaan dari pihak
                                                    manapun,
                                                    bahwa:</p>
                                                <div class="card mb-2   ">
                                                    <div class="card-body">
                                                        <ul style="list-style-type: decimal;" class="m-1">
                                                            <li>Saya bersedia memenuhi ketentuan dan persyaratan yang
                                                                berlaku
                                                                dalam
                                                                pengajuan santunan Jasa Raharja</li>
                                                            <li>Seluruh keterangan yang saya berikan dan seluruh dokumen
                                                                persyaratan
                                                                yang
                                                                saya serahkan adalah benar dan absah.</li>
                                                            <li>Apabila di kemudian hari terbukti bahwa keterangan yang
                                                                saya
                                                                berikan
                                                                tidak
                                                                benar dan/atau dokumen persyaratan yang saya serahkan
                                                                tidak
                                                                absah,
                                                                maka saya
                                                                bersedia dituntut di muka pengadilan sesuai ketentuan
                                                                hukup yang
                                                                berlaku dan
                                                                bersedia mengembalikan seluruh dana santuan yang telah
                                                                saya
                                                                terima.
                                                            </li>
                                                            <li>Saya bersedia mengembalikan dana santuanan yang telah
                                                                saya
                                                                terima
                                                                apabila di
                                                                kemudian hari ternyata ditemukan adanya kesalahan dalam
                                                                perhitungan
                                                                jumlah
                                                                dana santunan yang seharusnya saya terima</li>
                                                            <li>Apabila penyerahan dana melalui pemindahbukuan atau
                                                                transfer
                                                                bank,
                                                                maka
                                                                Bukti Pemindahbukuan/transfer Bank milik PT. Jasa
                                                                Raharja
                                                                (Persero)
                                                                berlaku
                                                                juga sebagai bukti tanda terima dana santunan yag sah
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-md-12 text-right">
                                                        <!-- <button type="button" class="btn btn-primary" id="btn_finish">Finish</button> -->
                                                        <button type='submit' id="finish" class="btn btn-success">Simpan
                                                            <i class="fa fa-send"></i></button>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                    <!-- End SmartWizard Content -->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!--Section: Content-->

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Check Pengajuan Anda</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="invoiceContainer">

                            </div>
                            <!-- <div id="pdfPreview"></div> -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </main>
    <!--Main layout-->

    <!--Footer-->
    <footer class="bg-light text-lg-start ml-0" width="100%">

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="#">Sistem Pakar Ansuransi Jasa Raharja</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="../js/mdb.min.js"></script>
    <!-- jQuery -->
    <script src="../../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- Data Togle -->
    <script src="../../assets/vendors/bootstrap-toggle/bootstrap-toggle.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../assets/vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../../assets/vendors/iCheck/icheck.min.js"></script>
    <!-- jbvalidator -->
    <script src="<?= base_url(); ?>/assets/vendors/jbvalidator/dist/jbvalidator.min.js"></script>
    <!-- jQuery Smart Wizard -->
    <script src="../../assets/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../assets/build/js/custom.min.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../../assets/vendors/moment/min/moment.min.js"></script>
    <script src="../../assets/vendors/moment/min/locales.min.js"></script>
    <script src="../../assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
    <script type="module" src="../../assets/vendors/jspdf/dist/jspdf.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/qrcode-generator/qrcode.min.js"></script>
    <script type="text/javascript">
        $('#finish').on('click', function() {

            const {
                jsPDF
            } = window.jspdf;

            var datapengajuan = {
                // Label Question 1
                noreg: "No Registrasi",
                namalengkap: "Nama Lengkap",
                tmp_lhr: "Tempat / Tanggal Lahir",
                umur: "Umur",
                nik: "NIK",
                provinsi: "Provinsi",
                kabupaten: "Kabupaten",
                kecamatan: "Kecamatan",
                kelurahan: "Kelurahan",
                alamat: "Alamat",
                notel: "No. Telp",
                jk: "Jenis Kelamin",
                jenispekerjaan: "Jenis Pekerjaan",

                //  Label Question 2
                tgl_kejadian: "Tanggal Kejadian",
                waktu_kejadian: "Waktu Kejadian",
                tmp_kejadian: "Tempat Kejadian",
                pengajuan_santunan: "Mengajukan Santunan Sebagai",
                jenis_kecelakaan: "Jenis Kecelakaan",

                // Label Question 3
                nama_kb: "Nama Lengkap",
                tmp_lhr_kb: "Tempat & Tanggal Lahir",
                umur_kb: "Umur ",
                nik_kb: "NIK ",
                provinsi_kb: "Provinsi ",
                kabupaten_kb: "Kabupaten ",
                kecamatan_kb: "Kecamatan ",
                kelurahan_kb: "Kelurahan ",
                alamat_kb: "Alamat ",
                notel_kb: "No. Telp ",
                jk_kb: "Jenis Kelamin ",
                jenis_pekerjaan_kb: "Jenis Pekerjaan ",

                // Value Question 1
                v_noreg: ": " + $('#no_reg').val(),
                v_namalengkap: ": " + $('#nama').val(),
                v_tmp_lhr: ": " + $('#tempat_lahir').val() + ", ",
                v_tgl_lhr: $('#tanggal_lahir').val(),
                v_umur: ": " + $('#umur').val(),
                v_nik: ": " + $('#nik').val(),
                v_provinsi: ": " + $('#pilprov option:selected').text(),
                v_kabupaten: ": " + $('#pilkab option:selected').text(),
                v_kecamatan: ": " + $('#pilkec option:selected').text(),
                v_kelurahan: ": " + $('#pilkel option:selected').text(),
                v_alamatlgkp: ": " + $('#alamatlgkp').val(),
                v_notel: ": " + $('#notel').val(),
                v_jenis_kelamin: ": " + $('input[name="jk"]:checked').siblings('label').text(),
                v_jenis_pekerjaan: ": " + $('input[name="pekerjaan"]:checked').siblings('label').text(),
                v_jenis_pekerjaan_lain: ": " + $('#kerja_lain').val(),

                // Value Question 2
                v_tanggal_kejadian: ": " + $('#show').val(),
                v_waktu_kejadian: ": " + $('#waktu').val(),
                v_tmp_kejadian: ": " + $('#ktp').val(),
                v_santunan: ": " + $('input[type="checkbox"][name="santunan[]"]:checked').siblings('label').map(function() {
                    return $(this).text();
                }).get().join(', '),
                v_jkecel: ": " + $('input[type="radio"][name="jkecel"]:checked').siblings('label').text(),

                // value question 3
                v_nama_lengkapkb: ": " + $('#nama_kb').val(),
                v_tmplahirkb: ": " + $('#t4_lahir_kb').val() + ", ",
                v_tgl_lhrkb: $('#tanggal_lahir_kb').val(),
                v_umur_kb: ": " + $('#umur_kb').val(),
                v_nikkb: ": " + $('#nik_kb').val(),
                v_provinsi_kb: ": " + $('#pilprov_kb option:selected').text(),
                v_kabupaten_kb: ": " + $('#pilkab_kb').text(),
                v_kecamatan_kb: ": " + $('#pilkec_kb').text(),
                v_kelurahan_kb: ": " + $('#pilkec_kb').text(),
                v_alamatlgkp_kb: ": " + $('#alamtlgkp_kb').val(),
                v_notel_kb: ": " + $('#notel_kb').val(),
                v_jenis_kelamin_kb: ": " + $('input[name="jk_kb"]:checked').val(),
                v_jenis_pekerjaan_kb: ": " + $('input[name="pekerjaan_kb"]:checked').val(),
                v_jenis_pekerjaan_lain_kb: ": " + $('#kerja_lain_kb').val()
            }

            var v_jenis_pekerjaan = ($('input[name="pekerjaan"]:checked').val() == 'lainnya') ? datapengajuan.v_jenis_pekerjaan_lain : datapengajuan.v_jenis_pekerjaan;
            var v_jenis_pekerjaan_kb = ($('input[name="pekerjaan_kb"]:checked').val() == 'lainnya') ? datapengajuan.v_jenis_pekerjaan_lain_kb : datapengajuan.v_jenis_pekerjaan_kb;

            var doc = new jsPDF();

            // Add logo image
            var imageUrl = "<?= base_url(); ?>/assets/images/copjasaraharja.png";
            var logoWidth = 2560;
            var logoHeight = 498;
            var imageResolution = 300; // Specify the desired resolution (in DPI)
            var maxWidth = 43;

            // Load the logo image as a data URL
            var logoImage = new Image();
            logoImage.crossOrigin = "Anonymous";
            logoImage.src = imageUrl;

            // Function to add dynamic text after existing text
            function addDynamicTextAfter(existingText, dynamicText, startX, y, fontSize) {
                doc.setFontSize(fontSize);
                doc.text(startX, y, existingText);
                var existingTextWidth = doc.getStringUnitWidth(existingText) * fontSize / doc.internal.scaleFactor;
                var dynamicTextX = startX + existingTextWidth;
                doc.text(dynamicTextX, y, dynamicText);
            }

            function wrapText(words, maxWidth) {
                var lines = [];
                var currentLine = words[0];
                for (var i = 1; i < words.length; i++) {
                    var word = words[i];
                    var width = doc.getStringUnitWidth(currentLine + ' ' + word); // Corrected the concatenation to include a space between words
                    if (width < maxWidth) {
                        currentLine += ' ' + word; // Corrected the concatenation to include a space between words
                    } else {
                        lines.push(currentLine);
                        currentLine = word;
                    }
                }
                lines.push(currentLine);
                return lines;
            }

            function addWrappedTextToDocument(doc, sentences, maxWidth, x, y) {
                var lines = wrapText(sentences.split(' '), maxWidth); // Splitting the string into an array of words
                var lineHeight = 5; // Adjust this value according to your needs
                for (var i = 0; i < lines.length; i++) {
                    doc.text(x, y + i * lineHeight, lines[i]);
                }
            }
            // Get the current date
            var currentDate = new Date();

            // Get the individual components of the date
            var day = ("0" + currentDate.getDate()).slice(-2);
            var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
            var year = currentDate.getFullYear();

            // Format the date as dd-mm-yyyy
            var tanggal = day + "-" + month + "-" + year;


            logoImage.onload = function() {
                var canvas = document.createElement("canvas");
                canvas.width = logoWidth;
                canvas.height = logoHeight;
                var context = canvas.getContext("2d");
                context.drawImage(logoImage, 0, 0, logoWidth, logoHeight);
                var logoDataUrl = canvas.toDataURL("image/png");

                // Calculate the image width and height based on the desired resolution
                var imageWidth = logoWidth * imageResolution / 72; // 72 is the default DPI of jsPDF
                var imageHeight = logoHeight * imageResolution / 72;

                // Add the image to the PDF with the specified resolution
                doc.addImage(logoDataUrl, "PNG", 10, 5, 50, 10, null, "FAST", 0, imageResolution);
















                // Add invoice content
                // Set posisi awal judul
                var position = 10;
                var titleX = 50;
                var titleY = 22;

                // Set font judul
                doc.setFontSize(13);
                // doc.setFont('bold');

                // Tulis judul
                doc.text('FORMULIR PENGAJUAN SANTUNAN JASA RAHARJA', titleX, titleY);

                // Membuat garis underscore
                var lineWidth = doc.getStringUnitWidth('FORMULIR PENGAJUAN SANTUNAN JASA RAHARJA') * doc.internal.getFontSize();
                var lineLength = 112;
                doc.setLineWidth(0.5);
                doc.line(titleX, titleY + 2, titleX + lineLength, titleY + 2);


                doc.setFontSize(10);
                doc.text('(Diisi dan Ditandatangani Oleh Penerima Dana Santunan)', 65, 28);

                doc.setFontSize(12);
                doc.text('1. Saya Yang bertanda Tangan Dibawah Ini', 10, 35);
                doc.text('2. Hubungan Dengan Korban Sebagai', 10, 106)
                doc.setFontSize(12);



                doc.setFontSize(12);
                // Label Question 1
                doc.text(datapengajuan.noreg, 15, 42);
                doc.text(datapengajuan.namalengkap, 15, 47);
                doc.text(datapengajuan.tmp_lhr, 15, 52);
                doc.text(datapengajuan.umur, 15, 57);
                doc.text(datapengajuan.notel, 15, 62);
                doc.text(datapengajuan.jk, 15, 67);
                doc.text(datapengajuan.jenispekerjaan, 15, 72);
                doc.text(datapengajuan.provinsi, 15, 77);
                doc.text(datapengajuan.kabupaten, 15, 82);
                doc.text(datapengajuan.kecamatan, 15, 87);
                doc.text(datapengajuan.kelurahan, 15, 92);
                doc.text(datapengajuan.alamat, 15, 97);

                // Value Question 1
                doc.text(datapengajuan.v_noreg, 60, 42);
                doc.text(datapengajuan.v_namalengkap, 60, 47);
                addDynamicTextAfter(datapengajuan.v_tmp_lhr, datapengajuan.v_tgl_lhr, 60, 52, 13);
                doc.text(datapengajuan.v_umur, 60, 57);
                doc.text(datapengajuan.v_notel, 60, 62);
                doc.text(datapengajuan.v_jenis_kelamin, 60, 67);
                doc.text(v_jenis_pekerjaan, 60, 72);

                doc.text(datapengajuan.v_provinsi, 60, 77);
                doc.text(datapengajuan.v_kabupaten, 60, 82);
                doc.text(datapengajuan.v_kecamatan, 60, 87);
                doc.text(datapengajuan.v_kelurahan, 60, 92);
                doc.text(datapengajuan.v_alamatlgkp, 60, 97);



                // Label Question 2
                doc.text(datapengajuan.tgl_kejadian, 15, 113);
                doc.text(datapengajuan.waktu_kejadian, 15, 118);
                doc.text(datapengajuan.tmp_kejadian, 15, 123);
                doc.text(datapengajuan.pengajuan_santunan, 15, 128);
                doc.text(datapengajuan.jenis_kecelakaan, 15, 133);




                // value Question 2
                doc.text(datapengajuan.v_tanggal_kejadian, 80, 113);
                doc.text(datapengajuan.v_waktu_kejadian, 80, 118);
                doc.text(datapengajuan.v_tmp_kejadian, 80, 123);
                doc.text(datapengajuan.v_santunan, 80, 128);
                // doc.text(datapengajuan.v_jkecel, 75, 106);
                addWrappedTextToDocument(doc, datapengajuan.v_jkecel, 27, 80, 133);



                if ($('#aktif_form3').val() == "aktif") {

                    //Judul Point 3
                    var judul3 = "3. Identitas Korban Kecelakaan (Tidak Perlu Diisi Jika Yang Mengajukan Adalah Korban Sendiri) Sebagai Berikut : ";
                    addWrappedTextToDocument(doc, judul3, 43, 10, 150);

                    // Label Question 3
                    doc.text(datapengajuan.nama_kb, 15, 162);
                    doc.text(datapengajuan.tmp_lhr_kb, 15, 167);
                    doc.text(datapengajuan.umur_kb, 15, 172);
                    doc.text(datapengajuan.nik_kb, 15, 177);
                    doc.text(datapengajuan.notel, 15, 182);
                    doc.text(datapengajuan.jk_kb, 15, 187);
                    doc.text(datapengajuan.jenis_pekerjaan_kb, 15, 192);
                    doc.text(datapengajuan.provinsi_kb, 15, 197);
                    doc.text(datapengajuan.kabupaten_kb, 15, 202);
                    doc.text(datapengajuan.kecamatan_kb, 15, 207);
                    doc.text(datapengajuan.kelurahan_kb, 15, 212);
                    doc.text(datapengajuan.alamat_kb, 15, 217);

                    // Values Question 3
                    doc.text(datapengajuan.v_nama_lengkapkb, 75, 162);
                    addDynamicTextAfter(datapengajuan.v_tmplahirkb, datapengajuan.v_tgl_lhrkb, 75, 167, 13);
                    doc.text(datapengajuan.v_umur_kb, 75, 172);
                    doc.text(datapengajuan.v_nikkb, 75, 177);
                    doc.text(datapengajuan.v_notel_kb, 75, 182);
                    doc.text(datapengajuan.v_jenis_kelamin_kb, 75, 187);
                    doc.text(v_jenis_pekerjaan_kb, 75, 192);

                    doc.text(datapengajuan.v_provinsi_kb, 75, 197);
                    doc.text(datapengajuan.v_kabupaten_kb, 75, 202);
                    doc.text(datapengajuan.v_kecamatan_kb, 75, 207);
                    doc.text(datapengajuan.v_kelurahan_kb, 75, 212);
                    doc.text(datapengajuan.v_alamatlgkp_kb, 75, 217);

                }


                doc.text("Yogyakarta, " + tanggal, 150, 270);
                var fontSize = 12;
                var contentWidth = doc.getStringUnitWidth($('#nama').val()) * fontSize / doc.internal.scaleFactor;
                var docWidth = 350;
                var leftPosition = (docWidth - contentWidth) / 2;
                doc.setFontSize(fontSize);
                doc.text("(" + $('#nama').val() + ")", leftPosition, 290);














                // Save the PDF document
                // doc.save("document.pdf");

                // Display PDF in the modal (optional)
                // var pdfDataUri = doc.output("datauristring");
                // $("#invoiceContainer").html('<iframe src="' + pdfDataUri + '" width="100%" height="400"></iframe>');
                $("#form_pengajuan").submit();
                doc.save("output.pdf");
            };


        });




        // FUNGSI WAKTU KEJADIAN
        $('#waktu').on('change', function() {
            var a = $(this).val();
            var tgl = $
            console.log(a);
        })

        $(function() {
            let validator = $('form.needs-validation').jbvalidator({
                errorMessage: true,
                successClass: true,
                language: '<?= base_url(); ?>/assets/vendors/jbvalidator/dist/lang/en.json'
            });
        });

        $(document).ready(function() {
            clear();
            clear_kb();
            $('#show').val('');

            // JQUERY NIK AND NIK KB
            $('#nik,#nik_kb').attr("maxlength", "16");
            $('#notel,#notel_kb').attr("maxlength", "13");
            $('input#nik,#nik_kb,#notel,#notel_kb').on('keyup', function() {
                var c = this.selectionStart,
                    r = /[^0-9]/gi,
                    v = $(this).val();
                if (r.test(v)) {
                    $(this).val(v.replace(r, ''));
                    c--;
                }
                this.setSelectionRange(c, c);
            });

        });

        // CLEAR FOR FORM 1
        function clear() {
            $.post("tes.php", {
                req: 'provinsi'
            }, function(data) {
                $('#pilprov').html(JSON.parse(data));
            });
            $('#kota-kab, #kecamatan, #kelurahan, #alamat, #kerja_lainnya').attr('hidden', true);
        }
        // CLEAR FOR FORM 2
        function clear_kb() {
            $.post("tes2.php", {
                req: 'provinsi_kb'
            }, function(data) {
                $('#pilprov_kb').html(JSON.parse(data));
            });
            $('#kota-kab_kb, #kecamatan_kb, #kelurahan_kb, #alamat_kb, #kerja_lainnya_kb').attr('hidden', true);
        }

        function bambang(tes) {
            $(tes).attr('hidden', true);
            $(tes).removeClass('d-flex flex-row-reverse');
        }

        function langit(bag) {
            $(bag + ' > input[type="radio"]').removeClass('is-valid');
        }

        $(document).on('change', 'input[type="checkbox"]', function() {
            if (!$(this).is(":checked") && $(this).hasClass('is-valid')) {
                $(this).removeClass('is-valid');
            }
        });
        // REMOVE STYLE VALID FORM JENIS KECELAKAAN
        $(document).on('change', 'input[type="radio"]', function() {
            var test = $(this).closest('div').hasClass('jkecel') ? '.jkecel' : '';
            if (test === ".jkecel") {
                langit(test);
                $(this).addClass('is-valid');
            }
        });
        // RADIO JENIS KELAMIN DAN JENIS PEKERJAAN FORM 1
        $(document).on('change', 'input[type="radio"]', function() {
            var tes = $(this).closest('div').hasClass('jk') ? '.jk' : '.jenispk';
            if (tes === ".jk") {
                langit(tes);
                $(this).addClass('is-valid');
            } else {
                langit(tes);
                if ($(this).val() === "lainnya") {
                    // $('#kerja_lainnya').addClass('d-flex flex-row-reverse');
                    $('#kerja_lain').removeAttr('disabled');
                    $('#kerja_lain').attr('required', true);
                    $('#kerja_lainnya').removeAttr('hidden');
                } else {
                    bambang('#kerja_lainnya');
                    $('#kerja_lainnya').attr('hidden', true);
                    $('#kerja_lain').removeAttr('required');
                    $('#kerja_lain').attr('disabled', true);
                    $(this).addClass('is-valid');
                }
            }
        });
        // RADIO JENIS KELAMIN DAN JENIS PEKERJAAN FORM 3
        $(document).on('change', 'input[type="radio"]', function() {
            var tes = $(this).closest('div').hasClass('jk_k') ? '.jk_k' : '.jenispk_kb';
            if (tes === ".jk_k") {
                langit(tes);
                $(this).addClass('is-valid');
            } else {
                langit(tes);
                if ($(this).val() === "lainnya_kb") {
                    // $('#kerja_lainnya_kb').addClass('d-flex flex-row-reverse');
                    $('#kerja_lain_kb').removeAttr('disabled');
                    $('#kerja_lain_kb').attr('required', true);
                    $('#kerja_lainnya_kb').removeAttr('hidden');
                } else {
                    bambang('#kerja_lainnya_kb');
                    $('#kerja_lainnya_kb').attr('hidden', true);
                    $('#kerja_lain_kb').removeAttr('required');
                    $('#kerja_lain_kb').attr('disabled', true);
                    $(this).addClass('is-valid');
                }
            }
        });
        // SELECT PROVINSI FORM 1
        $(document).on('change', '#prov', function() {
            let content = ($(this).val() == '') ? 'none' : $(this).val();
            var divs = '#kota-kab, #kecamatan, #kelurahan, #alamat';
            if (content == 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#kota-kab').addClass('d-flex flex-row-reverse');
                $.post("tes.php", {
                    id: content,
                    req: 'kota-kab'
                }, function(data) {
                    $('#pilkab').html(JSON.parse(data));
                });
                $('#kota-kab').removeAttr('hidden');
            }
        });

        // SELECT PROVINSI FORM 3
        $(document).on('change', '#prov_kb', function() {
            let content = ($(this).val() == '') ? 'none' : $(this).val();
            var divs = '#kota-kab_kb, #kecamatan_kb, #kelurahan_kb, #alamat_kb';
            if (content == 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#kota-kab_kb').addClass('d-flex flex-row-reverse');
                $.post("tes2.php", {
                    id: content,
                    req: 'kota-kab_kb'
                }, function(data) {
                    $('#pilkab_kb').html(JSON.parse(data));
                });
                $('#kota-kab_kb').removeAttr('hidden');
            }
        });
        // PILIH KABUKATEN FORM 1
        $(document).on('change', '#kab', function() {
            let content = ($(this).val() == '') ? 'none' : $(this).val();
            var divs = '#kecamatan, #kelurahan, #alamat';
            if (content == 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#kecamatan').addClass('d-flex flex-row-reverse');
                $.post("tes.php", {
                    id: content,
                    req: 'kecamatan'
                }, function(data) {
                    $('#pilkec').html(JSON.parse(data));
                });
                $('#kecamatan').removeAttr('hidden');
            }
        });

        // PILIH KABUKATEN FORM 3
        $(document).on('change', '#kab_kb', function() {
            let content = ($(this).val() == '') ? 'none' : $(this).val();
            var divs = '#kecamatan_kb, #kelurahan_kb, #alamat_kb';
            if (content == 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#kecamatan_kb').addClass('d-flex flex-row-reverse');
                $.post("tes2.php", {
                    id: content,
                    req: 'kecamatan_kb'
                }, function(data) {
                    $('#pilkec_kb').html(JSON.parse(data));
                });
                $('#kecamatan_kb').removeAttr('hidden');
            }
        });
        // PILIH KECAMATAN FORM 1
        $(document).on('change', '#kec', function() {
            let content = ($(this).val() === '') ? 'none' : $(this).val();
            var divs = '#kelurahan, #alamat';
            if (content === 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#kelurahan').addClass('d-flex flex-row-reverse');
                $.post("tes.php", {
                    id: content,
                    req: 'kelurahan'
                }, function(data) {
                    $('#pilkel').html(JSON.parse(data));
                });
                $('#kelurahan').removeAttr('hidden');
            }
        });
        // PILIH KECAMATAN FORM 3
        $(document).on('change', '#kec_kb', function() {
            let content = ($(this).val() === '') ? 'none' : $(this).val();
            var divs = '#kelurahan_kb, #alamat_kb';
            if (content === 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#kelurahan_kb').addClass('d-flex flex-row-reverse');
                $.post("tes2.php", {
                    id: content,
                    req: 'kelurahan_kb'
                }, function(data) {
                    $('#pilkel_kb').html(JSON.parse(data));
                });
                $('#kelurahan_kb').removeAttr('hidden');
            }
        });
        // PILIH KELURAHAN FORM 1
        $(document).on('change', '#kel', function() {
            let content = ($(this).val() === '') ? 'none' : $(this).val();
            var divs = '#alamat';
            if (content === 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#alamat').addClass('d-flex flex-row-reverse');
                $('#alamatlgkp').val('');
                $('#alamatlgkp').removeClass('is-valid');
                $('#alamat').removeAttr('hidden');
            }
        });
        // PILIH KELURAHAN FORM 3
        $(document).on('change', '#kel_kb', function() {
            let content = ($(this).val() === '') ? 'none' : $(this).val();
            var divs = '#alamat_kb';
            if (content === 'none') {
                bambang(divs);
            } else {
                bambang(divs);
                // $('#alamat_kb').addClass('d-flex flex-row-reverse');
                $('#alamatlgkp_kb').val('');
                $('#alamatlgkp_kb').removeClass('is-valid');
                $('#alamat_kb').removeAttr('hidden');
            }
        });
        // UMUR FORM 1
        $(document).on('change', '#tanggal_lahir', function() {
            end = $(this).val();
            var input = new Date(end).getTime();
            var sekarang = Date.now();
            var age = Math.floor((sekarang - input) / 31536000000) + " Tahun";
            $('#umur').val(age);
            // console.log(end);
        });
        // UMUR FORM 2
        $(document).on('change', '#tanggal_lahir_kb', function() {
            end = $(this).val();
            var input = new Date(end).getTime();
            var sekarang = Date.now();
            var age = Math.floor((sekarang - input) / 31536000000) + " Tahun";
            $('#umur_kb').val(age);
            // console.log(end);
        });
        // ACTION BUTTON AKTIF FORM 3
        $(document).ready(function() {
            $('.ufrom').addClass('red');
            // $('.ufrom').addClass('green');
            $('.ck').attr('disabled', 'disabled');
            $(".ufrom").click(function() {
                // alert('hidup');
                $('.ufrom i').toggleClass('fa-toggle-on');

                $('.ufrom i').toggleClass('fa-toggle-off').fadeIn(150);
                if ($('.ufrom i').hasClass('fa-toggle-off')) {
                    $('#aktif_form').removeClass('green');
                    $('.ufrom').addClass('red');
                    $('.ck').attr('disabled', 'disabled');
                    $('#aktif_form3').val("tidakaktif");
                }
                if ($('.ufrom i').hasClass('fa-toggle-on')) {
                    $('#aktif_form').removeClass('red');
                    $('#aktif_form').addClass('green');
                    $('.ck').attr('disabled', false);
                    $('#aktif_form3').val("aktif");
                }
            });
        });

        // TANGGAL KEJADIAN
        $('#myDatepicker2').datetimepicker({
            format: 'DD MM YYYY',
            maxDate: 'now',

        });

        $('#myDatepicker2').on('dp.change', function() {
            var v = $("#myDatepicker2").find("input").val();
            console.log(v);
            var m = moment(v, 'DD MM YYYY');
            var tanggal = m.locale("id").format("dddd, DD MMMM YYYY");
            $('#show').val(tanggal);
            var dbTanggal = m.locale("id").format("YYYY-MM-DD");
            // console.log(formatted);
            $('#myDatepicker').val(dbTanggal);
        });

        // SUBMIT FORM
        // $('#finish').on('click', function() {

        // });

        $('#btn_finish').on('click', function() {
            let santunan = $('input[type="checkbox"][name="santunan[]"]:checked').siblings('label').map(function() {
                return $(this).text();
            }).get().join(', ');
            $('#show_norek').text($('input[name="no_reg"]').val());
            $('#show_namepeng').text($('input[name="nama"]').val());
            $('#show_pengajuan').text(santunan);
            $('#show_jkecel').text($('input[type="radio"][name="jkecel"]:checked').siblings('label').text());
        });

        // btn_finish
    </script>
</body>

</html>