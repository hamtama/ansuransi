<?php
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');

date_default_timezone_set('Asia/Jakarta');
echo date('d F Y');
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
</style>
<!-- page content -->

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Pengajuan Santunan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form role="form" class="form-horizontal form-label-left needs-validation" method="post"
                        id="form_pengajuan" action="aksitambah.php" novalidate>
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
                                        <h4 class="text-black h3  mt-30 mb-0"><u>FORMULIR PENGAJUAN SANTUNAN JASA
                                                RAHARJA</u></h4>
                                        <p class="mb-30 mt-0">(Diisi dan Ditandatangani Oleh Penerima Dana Santunan)</p>
                                    </div>
                                </div>


                                <div class="form-group field item row">
                                    <?php
                                    $no = '';
                                    $tgl = date('d');
                                    $bln = date('m');
                                    $thn = date('Y');
                                    $a = array("0", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX", "X" , "XI", "XII");
                                    for ($i = 0; $i < count($a); $i++){
                                        $k = ltrim($bln, '0');
                                        if($i == $bln){
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
                                    }?>
                                    <label for="no_reg"
                                        class="col-form-label col-md-3 col-sm-3 label-align col-form-label">No.
                                        Registrasi <span class="required">*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <input class="form-control" autocomplete="off" value="<?= $no_reg; ?>"
                                            name="no_reg" type="text" readonly>
                                    </div>
                                </div>
                                <input type="hidden" name="date_reg" value="<?= $today; ?>">
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-lengkap">
                                        Nama Lengkap <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="nama" required="required" class="form-control"
                                            placeholder="Nama Lengkap Pengaju" required>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align"
                                        for="last-name">Tempat/Tanggal Lahir <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 input-group">
                                        <input type="text" name="tempat_lahir" autocomplete="off"
                                            aria-label="Tempat lahir" class="form-control" placeholder="Tempat Lahir"
                                            required>
                                        <input type="date" id="tanggal_lahir" autocomplete="off" max="<?= $t; ?>"
                                            name="tanggal_lahir" aria-label="Tanggal lahir" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Umur <span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" name="umur" id="umur" readonly autocomplete="off"
                                            data-v-max-length="2" class="form-control" placeholder="Umur" required>
                                    </div>
                                </div>

                                <div class="form-group field item row">
                                    <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor KTP/NIK <span
                                            class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 ">
                                        <input type="text" aria-label="NIK" id="nik" autocomplete="off" name="nik"
                                            autocomplete="off" data-v-min-length="16" data-v-max-length="16"
                                            class="form-control" placeholder="NIK" required>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Provinsi <span
                                            class="required">*</span></label>
                                    <div id="pilprov" class="col-sm-12 col-md-6"></div>
                                </div>
                                <div id="kota-kab" class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Kabupaten<span
                                            class="required">*</span></label>
                                    <div id="pilkab" class="col-sm-12 col-md-6"></div>
                                </div>
                                <div id="kecamatan" class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Kecamatan<span
                                            class="required">*</span></label>
                                    <div id="pilkec" class="col-sm-12 col-md-6"></div>
                                </div>
                                <div id="kelurahan" class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Kelurahan<span
                                            class="required">*</span></label>
                                    <div id="pilkel" class="col-sm-12 col-md-6"></div>
                                </div>
                                <div id="alamat" class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Alamat Detail<span
                                            class="required">*</span></label>
                                    <div id="inputalamat" class="col-sm-12 col-md-6">
                                        <input type="text" aria-label="Alamat" id="alamatlgkp" autocomplete="off"
                                            name="alamat" class="form-control" placeholder="Alamat lengkap" required>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">No. Telp <span
                                            class="required">*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <input type="tel" aria-label="No Telp" id="notel" autocomplete="off"
                                            name="notel" class="form-control" placeholder="No Telp" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Kelamin <span
                                            class="required">*</span></label>
                                    <div class="col-sm-12 col-md-6 ">
                                        <div class="custom-control custom-radio  jk">
                                            <input type="radio" id="customRadio1" value="Laki-Laki" name="jk"
                                                class="custom-control-input" required>
                                            <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                                        </div>
                                        <div class="custom-control  custom-radio jk">
                                            <input type="radio" id="customRadio2" value="Perempuan" name="jk"
                                                class="custom-control-input">
                                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Pekerjaan <span
                                            class="required">*</span></label>
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
                                                <input type="radio" id="radio2" value="lainnya" name="pekerjaan"
                                                    class="custom-control-input">
                                                <label class="custom-control-label" for="radio2">Lainnya</label>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                                <div id="kerja_lainnya" class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Pekerjaan
                                        Lainnya<span class="required">*</span></label>
                                    <div id="inputpekerjaan" class="col-sm-12 col-md-6">
                                        <input type="text" id="kerja_lain" autocomplete="off" name="kerja_lain"
                                            class="form-control" placeholder="Lainnya">
                                    </div>
                                </div>
                            </div>
                            <div id="step-2">
                                <div class="text-center">
                                    <h4 class="text-black h2 mt-30 mb-4"><u>HUBUNGAN DENGAN KORBAN SEBAGAI</u></h4>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Tanggal
                                        Kejadian <span class="required">*</span></label>
                                    <div class="col-sm-12 col-md-6 input-group date" id='myDatepicker2'>
                                        <!-- <input type="hidden"> -->
                                        <input class="form-control" autocomplete="off" placeholder="Tanggal Kejadian"
                                            id="show" type="text" required>
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

                                        <input class="form-control " name="waktukejadian" autocomplete="off" id="waktu"
                                            placeholder="Select Time" type="time" required>
                                    </div>
                                </div>
                                <div class="form-group field item row">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Tempat Kejadian
                                        <span class="required">*</span></label>
                                    <div class="col-sm-12 col-md-6">
                                        <input class="form-control" name="tkp" id="tkp" autocomplete="off"
                                            placeholder="Alamat, Kelurahan, Kecamata, Kabupaten, Provinsi" type="text"
                                            required>
                                    </div>
                                </div>
                                <div class="form-group field item row " data-checkbox-group data-v-required
                                    data-v-min-select="1">
                                    <label class="col-sm-12 col-md-3 col-form-label label-align"> Mengajukan
                                        Santunan
                                        Sebagai <span class="required">*</span> <br>
                                        <font style="font-size: x-small; padding-right: 10px;">Dapat Lebih Dari Satu
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
                                    <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Kecelakaan
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
                                    <h4 class="text-black h2 mt-30 mb-4"><u>DATA DIRI KORBAN KECELAKAAN</u></h4>
                                </div>
                                <section class="pt-4">
                                    <p class="h6">2. Identitas Korban Kecelakaan (Tidak Perlu Diisi Jika Yang
                                        Mengajukan
                                        Adalah
                                        Korban Sendiri) Sebagai Berikut :</p>
                                    <div class="col-sm-12 col-md-12 mb-30">
                                        <div class="card card-box">
                                            <div class="card-body">
                                                <blockquote class="blockquote mb-0">
                                                    <cite title="Source Title"
                                                        class="d-flex justify-content-center">Form
                                                        Tidak
                                                        Perlu Diisi Jika Anda Adalah Korban</cite>
                                                    <p class="h6 text-center" style="font-size: 12px;">*Klik Tombol
                                                        Bila
                                                        Ingin
                                                        Mengisi Form*</p>
                                                    <div class=" d-flex justify-content-center">
                                                        <button type="button" id="aktif_form"
                                                            class="btn btn-ml m-2 rounded-pill ufrom"
                                                            data-color="#ffffff"><i
                                                                class="fa fa-toggle-off"></i></button>
                                                        <button type="button" class="btn" id="nonaktif_form"></button>
                                                    </div>
                                                </blockquote>
                                                <input type="hidden" id="aktif_form3" name="check" value="tidakaktif">
                                            </div>
                                        </div>
                                        <div class="form-group field item row mt-3">
                                            <label class="col-sm-12 col-md-3 col-form-label">Nama
                                                Lengkap <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-9">
                                                <input class="form-control ck" id="nama_kb" autocomplete="off"
                                                    name="nama_kb" type="text" placeholder="Nama Lengkap Korban"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Tempat &
                                                Tanggal
                                                Lahir <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-9 input-group mb-0">
                                                <input type="text" id="t4_lahir_kb" autocomplete="off"
                                                    name="tempat_lahir_kb" class="form-control ck"
                                                    placeholder="Tempat Lahir Korban" required>
                                                <input type="date" id="tanggal_lahir_kb" autocomplete="off"
                                                    max="<?= $t; ?>" name="tanggal_lahir_kb" class="form-control ck"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label ">Umur
                                                Korban <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text" id="umur_kb" readonly aria-label="Umur"
                                                    data-v-max-length="2" class="form-control ck" placeholder="Umur"
                                                    name="umur_kb" required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label ">Nomor KTP/NIK
                                                Korban <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-9">
                                                <input type="text" aria-label="NIK Korban" id="nik_kb" name="nik_kb"
                                                    data-v-min-length="16" data-v-max-length="16"
                                                    class="form-control ck" placeholder="NIK Korban" required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Provinsi <span
                                                    class="required">*</span></label>
                                            <div id="pilprov_kb" class="col-sm-12 col-md-9"></div>
                                        </div>
                                        <div id="kota-kab_kb" class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Kabupaten<span
                                                    class="required">*</span></label>
                                            <div id="pilkab_kb" class="col-sm-12 col-md-9"></div>
                                        </div>
                                        <div id="kecamatan_kb" class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Kecamatan<span
                                                    class="required">*</span></label>
                                            <div id="pilkec_kb" class="col-sm-12 col-md-9"></div>
                                        </div>
                                        <div id="kelurahan_kb" class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Kelurahan<span
                                                    class="required">*</span></label>
                                            <div id="pilkel_kb" class="col-sm-12 col-md-9"></div>
                                        </div>
                                        <div id="alamat_kb" class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Alamat Lengkap<span
                                                    class="required">*</span></label>
                                            <div id="inputalamat_kb" class="col-sm-12 col-md-9">
                                                <input type="text" aria-label="Alamat Koban" id="alamatlgkp_kb"
                                                    name="alamat_kb" class="form-control ck"
                                                    placeholder="Alamat lengkap" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label required">No. Telp
                                                Korban</label>
                                            <div class="col-sm-12 col-md-9">
                                                <input type="tel" aria-label="No Telp Korban" id="notel_kb"
                                                    autocomplete="off" name="notel_kb" class="form-control ck"
                                                    placeholder="No Telp Korban" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Jenis
                                                Kelamin <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-9 ">
                                                <div class="custom-control custom-radio jk_k">
                                                    <input type="radio" id="radio_jk_kb1" value="Laki-Laki" name="jk_kb"
                                                        class="custom-control-input ck" required>
                                                    <label class="custom-control-label" for="radio_jk_kb1">Laki -
                                                        Laki</label>
                                                </div>
                                                <div class="custom-control  custom-radio jk_k">
                                                    <input type="radio" id="radio_jk_kb2" value="Perempuan" name="jk_kb"
                                                        class="custom-control-input ck">
                                                    <label class="custom-control-label"
                                                        for="radio_jk_kb2">Perempuan</label>
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
                                                        <input type="radio" id="radiokb2" value="lainnya_kb"
                                                            name="pekerjaan_kb" class="custom-control-input ck">
                                                        <label class="custom-control-label"
                                                            for="radiokb2">Lainnya</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kerja_lainnya_kb" class="form-group row field item">
                                            <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis
                                                Pekerjaan
                                                Lainnya<span class="required">*</span></label>
                                            <div id="inputpekerjaan_kb" class="col-sm-12 col-md-9">
                                                <input type="text" aria-label="kerja_lain_kb" id="kerja_lain_kb"
                                                    name="kerja_lain_kb" class="form-control ck" placeholder="Lainnya">
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            </div>
                            <div id="step-4">
                                <section>
                                    <p class="h6">3. Dalam pengajuan santuan Jasa Raharja ini saya menyatakan dengan
                                        sebenar-benarnya, dlam keadaan sadar dan tanpa paksaan dari pihak manapun,
                                        bahwa:</p>
                                    <div class="card mb-2   ">
                                        <div class="card-body">
                                            <ul style="list-style-type: decimal;" class="m-1">
                                                <li>Saya bersedia memenuhi ketentuan dan persyaratan yang berlaku
                                                    dalam
                                                    pengajuan santunan Jasa Raharja</li>
                                                <li>Seluruh keterangan yang saya berikan dan seluruh dokumen
                                                    persyaratan
                                                    yang
                                                    saya serahkan adalah benar dan absah.</li>
                                                <li>Apabila di kemudian hari terbukti bahwa keterangan yang saya
                                                    berikan
                                                    tidak
                                                    benar dan/atau dokumen persyaratan yang saya serahkan tidak
                                                    absah,
                                                    maka saya
                                                    bersedia dituntut di muka pengadilan sesuai ketentuan hukup yang
                                                    berlaku dan
                                                    bersedia mengembalikan seluruh dana santuan yang telah saya
                                                    terima.
                                                </li>
                                                <li>Saya bersedia mengembalikan dana santuanan yang telah saya
                                                    terima
                                                    apabila di
                                                    kemudian hari ternyata ditemukan adanya kesalahan dalam
                                                    perhitungan
                                                    jumlah
                                                    dana santunan yang seharusnya saya terima</li>
                                                <li>Apabila penyerahan dana melalui pemindahbukuan atau transfer
                                                    bank,
                                                    maka
                                                    Bukti Pemindahbukuan/transfer Bank milik PT. Jasa Raharja
                                                    (Persero)
                                                    berlaku
                                                    juga sebagai bukti tanda terima dana santunan yag sah</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12 text-right">
                                            <button type='submit' id="finish" class="btn btn-success">Simpan <i
                                                    class="fa fa-send"></i></button>
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
</div>
</div>

<!-- /page content -->
<?php
require_once('../../layout/wrapperadmin/footer.php');
?>
<script type="text/javascript">
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
$('#finish').on('click', function() {
    $("#form_pengajuan").submit();
});
</script>