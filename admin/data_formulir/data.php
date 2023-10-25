<?php
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');

?>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Formulir</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary" href="#" role="button" data-toggle="dropdown">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                echo date('d F Y');
                                $t = date('Y-m-d');
                                $today = date('Y-m-d G:i:s');
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="text-center">
                        <h4 class="text-black h3  mt-30 mb-0 "><u>FORMULIR PENGAJUAN SANTUNAN JASA RAHARJA</u></h4>
                        <p class="mb-30 mt-0">(Diisi dan Ditandatangani Oleh Penerima Dana Santunan)</p>
                    </div>
                </div>

                <div class="wizard-content">
                    <form class="needs-validation tab-wizard wizard-circle wizard" method="post" id="form_pengajuan" action="aksitambah.php" novalidate>

                        <!-- DATA FORM 1     -->
                        <h5>Data Diri Yang</br>Mengajukan Santunan</h5>
                        <section class="pt-4">
                            <p class="h5">1. Saya yang bertanda tangan di bawah ini</p>

                            <div class="form-group row mt-3">
                                <label class="col-sm-12 col-md-3 col-form-label required">No. Registrasi</label>
                                <div class="col-sm-12 col-md-9 ">
                                    <?php
                                    $no = '';
                                    $tgl = date('d');
                                    $bln = date('m');
                                    $thn = date('Y');
                                    switch ($bln) {
                                        case '01':
                                            $bln = 'I';
                                            break;
                                        case '02':
                                            $bln = 'II';
                                            break;
                                        case '03':
                                            $bln = 'III';
                                            break;
                                        case '04':
                                            $bln = 'IV';
                                            break;
                                        case '05':
                                            $bln = 'V';
                                            break;
                                        case '06':
                                            $bln = 'VI';
                                            break;
                                        case '07':
                                            $bln = 'VII';
                                            break;
                                        case '08':
                                            $bln = 'VIII';
                                            break;
                                        case '09':
                                            $bln = 'IX';
                                            break;
                                        case '10':
                                            $bln = 'X';
                                            break;
                                        case '11':
                                            $bln = 'XI';
                                            break;
                                        case '12':
                                            $bln = 'XII';
                                            break;
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
                                    }
                                    ?>
                                    <input class="form-control" autocomplete="off" value="<?= $no_reg; ?>" name="no_reg" type="text" readonly>
                                </div>
                            </div>
                            <input type="hidden" name="date_reg" value="<?= $today; ?>">
                            <div class="form-group row mt-3">
                                <label class="col-sm-12 col-md-3 col-form-label required">Nama Lengkap</label>
                                <div class="col-sm-12 col-md-9 ">
                                    <input class="form-control" autocomplete="off" name="nama" type="text" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">Tempat & Tanggal Lahir</label>
                                <div class="col-sm-12 col-md-9 input-group mb-0">
                                    <input type="text" name="tempat_lahir" autocomplete="off" aria-label="Tempat lahir" class="form-control" placeholder="Tempat Lahir" required>
                                    <input type="date" id="tanggal_lahir" autocomplete="off" max="<?= $t; ?>" name="tanggal_lahir" aria-label="Tanggal lahir" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">Umur</label>
                                <div class="col-sm-12 col-md-3">
                                    <input type="text" name="umur" id="umur" readonly aria-label="Umur" autocomplete="off" data-v-max-length="2" class="form-control" placeholder="Umur" required>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <label class="col-sm-12 col-md-3 col-form-label required">Nomor KTP/NIK</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="text" aria-label="NIK" id="nik" autocomplete="off" name="nik" autocomplete="off" data-v-min-length="16" data-v-max-length="16" class="form-control" placeholder="NIK" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">Alamat</label>
                                <div id="pilprov" class="col-sm-12 col-md-9"></div>
                            </div>
                            <div id="kota-kab" class="form-group row">
                                <div id="pilkab" class="col-sm-12 col-md-9"></div>
                            </div>
                            <div id="kecamatan" class="form-group row">
                                <div id="pilkec" class="col-sm-12 col-md-9"></div>
                            </div>
                            <div id="kelurahan" class="form-group row">
                                <div id="pilkel" class="col-sm-12 col-md-9"></div>
                            </div>
                            <div id="alamat" class="form-group row">
                                <div id="inputalamat" class="col-sm-12 col-md-9">
                                    <input type="text" aria-label="Alamat" id="alamatlgkp" autocomplete="off" name="alamat" class="form-control" placeholder="Alamat lengkap" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">No. Telp</label>
                                <div class="col-sm-12 col-md-9">
                                    <input type="tel" aria-label="No Telp" id="notel" autocomplete="off" name="notel" class="form-control" placeholder="No Telp" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">Jenis Kelamin</label>
                                <div class="col-sm-12 col-md-9 ">
                                    <div class="custom-control custom-radio jk">
                                        <input type="radio" id="customRadio1" value="Laki-Laki" name="jk" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Laki - Laki</label>
                                    </div>
                                    <div class="custom-control  custom-radio jk">
                                        <input type="radio" id="customRadio2" value="Perempuan" name="jk" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">Jenis Pekerjaan</label>
                                <div class="col-sm-12 col-md-9 row">
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * from tb_pekerjaan");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id_p = $row['id_pekerjaan'];
                                        $pekerjaan = $row['pekerjaan'];
                                        echo
                                        '
                                        <div class="col-sm-12 col-md-5 custom-control custom-radio ml-3 jenispk">
                                        <input type="radio" id="kerja' . $id_p . '" value="' . $id_p . '" name="pekerjaan" class="custom-control-input">
                                        <label class="custom-control-label" for="kerja' . $id_p . '">' . $pekerjaan . '</label></div>';
                                    }
                                    ?>
                                    <div class="col-sm-12 col-md-5 custom-control  custom-radio jenispk ml-3">
                                        <input type="radio" id="radio2" value="lainnya" name="pekerjaan" class="custom-control-input">
                                        <label class="custom-control-label" for="radio2">Lainnya</label>
                                    </div>
                                </div>

                            </div>
                            <div id="kerja_lainnya" class="form-group row">
                                <div id="inputpekerjaan" class="col-sm-12 col-md-9">
                                    <input type="text" id="kerja_lain" autocomplete="off" name="kerja_lain" class="form-control" placeholder="Lainnya">
                                </div>
                            </div>
                        </section>
                        <!-- DATA FORM 2 -->
                        <h5>Data Pengajuan </br> dan Jenis Kecelakaan</h5>
                        <section class="pt-4">
                            <p class="h5">Hubungan Dengan Korban Sebagai</p>
                            <div class="form-group row" style="margin-bottom: 0px;">
                                <label class="col-sm-12 col-md-3 col-form-label required">Tanggal/Waktu Kejadian</label>
                                <div id="tanggalk" class="col-sm-12 col-md-9 input-group row">
                                    <input id="datepicker" class="form-control date-picker" data-date="" data-date-format="DD, dd MM yyyy" value="" placeholder="Tangga Kejadian" type="text" required>
                                    <input type="hidden" name="tanggalkejadian" id="tanggalz" value="">
                                    <input class="form-control" name="waktukejadian" autocomplete="off" id="waktu" placeholder="Select Time" type="time">
                                </div>
                            </div>
                            <div class="form-group row" style="margin-bottom: 0px;">
                                <label class="col-sm-12 col-md-3 col-form-label required">Tempat Kejadian</label>
                                <div class="col-sm-12 col-md-9 input-group row">
                                    <input class="form-control" name="tkp" id="tkp" autocomplete="off" placeholder="Alamat, Kelurahan, Kecamata, Kabupaten, Provinsi" type="text">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label"><span class="required">Mengajukan Santunan Sebagai</span> <br>
                                    <span class="required"></span>
                                    <font style="font-size: x-small;">Dapat Lebih Dari Satu</font>
                                </label>
                                <div id=" jsantunan" class="col-sm-12 col-md-9 row">
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * from tb_santunan group by jenis_santunan");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id_s = $row['id_santunan'];
                                        $santunan = $row['jenis_santunan'];
                                        echo
                                        '<div class="custom-control col-sm-5 col-md-4  custom-checkbox  dsantunan">
                                        <input type="checkbox" id="santunan' . $id_s . '" value="' . $id_s . '" name="santunan[]" class="custom-control-input isantunan">
                                        <label class="custom-control-label" for="santunan' . $id_s . '">' . $santunan . '</label></div>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-3 col-form-label required">Jenis Kecelakaan</label>
                                <div class="col-sm-12 col-md-9 row">
                                    <?php
                                    $query = mysqli_query($mysqli, "SELECT * from tb_kasus_kecelakaan");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id_k = $row['id_kasus_kecelakaan'];
                                        $kecelakaan = $row['kasus_kecelakaan'];
                                        echo
                                        '<div class="custom-control custom-radio jkecel">
                                            <input type="radio" id="Radiokecel' . $id_k . '" value="' . $id_k . '" name="jkecel" class="custom-control-input">
                                            <label class="custom-control-label" for="Radiokecel' . $id_k . '">' . $kecelakaan . '</label>
                                        </div>';
                                    }
                                    ?>
                                </div>
                            </div>
                        </section>
                        <!-- DATA FORM 3 -->
                        <h5>Data Diri </br> Korban Kecelakaan</h5>
                        <section class="pt-4">
                            <p class="h5">2. Identitas Korban Kecelakaan (Tidak Perlu Diisi Jika Yang Mengajukan Adalah Korban Sendiri) Sebagai Berikut :</p>
                            <div class="col-sm-12 col-md-12 mb-30">
                                <div class="card card-box">
                                    <div class="card-body">
                                        <blockquote class="blockquote mb-0">
                                            <cite title="Source Title" class="d-flex justify-content-center">Form Tidak Perlu Diisi Jika Anda Adalah Korban</cite>
                                            <p class="h6 text-center" style="font-size: 12px;">*Klik Tombol Bila Ingin Mengisi Form*</p>
                                            <div class=" d-flex justify-content-center">
                                                <button type="button" id="aktif_form" class="btn btn-ml m-2 rounded-pill ufrom" data-color="#ffffff"><i class="icon-copy fa fa-toggle-off"></i></button>
                                                <button type="button" class="btn" id="nonaktif_form"></button>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-9 ">
                                        <input class="form-control ck" id="nama_kb" autocomplete="off" name="nama_kb" type="text" placeholder="Nama Lengkap Korban" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Tempat & Tanggal Lahir</label>
                                    <div class="col-sm-12 col-md-9 input-group mb-0">
                                        <input type="text" id="t4_lahir_kb" autocomplete="off" name="tempat_lahir_kb" aria-label="Tempat lahir Korban" class="form-control ck" placeholder="Tempat Lahir Korban" required>
                                        <input type="date" id="tanggal_lahir_kb" autocomplete="off" max="<?= $t; ?>" name="tanggal_lahir_kb" aria-label="Tanggal lahir Korban" class="form-control ck" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Umur Korban</label>
                                    <div class="col-sm-12 col-md-3">
                                        <input type="text" id="umur_kb" readonly aria-label="Umur" data-v-max-length="2" class="form-control ck" placeholder="Umur" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Nomor KTP/NIK Korban</label>
                                    <div class="col-sm-12 col-md-9">
                                        <input type="text" aria-label="NIK Korban" id="nik_kb" name="nik_kb" data-v-min-length="16" data-v-max-length="16" class="form-control ck" placeholder="NIK Korban" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Alamat Korban</label>
                                    <div id="pilprov_kb" class="col-sm-12 col-md-9"></div>
                                </div>
                                <div id="kota-kab_kb" class="form-group row">
                                    <div id="pilkab_kb" class="col-sm-12 col-md-9"></div>
                                </div>
                                <div id="kecamatan_kb" class="form-group row">
                                    <div id="pilkec_kb" class="col-sm-12 col-md-9"></div>
                                </div>
                                <div id="kelurahan_kb" class="form-group row">
                                    <div id="pilkel_kb" class="col-sm-12 col-md-9"></div>
                                </div>
                                <div id="alamat_kb" class="form-group row">
                                    <div id="inputalamat_kb" class="col-sm-12 col-md-9">
                                        <input type="text" aria-label="Alamat Koban" id="alamatlgkp_kb" name="alamat_kb" class="form-control ck" placeholder="Alamat lengkap" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Jenis Kelamin</label>
                                    <div class="col-sm-12 col-md-9 ">
                                        <div class="custom-control custom-radio jk_k">
                                            <input type="radio" id="radio_jk_kb1" value="Laki-Laki" name="jk_kb" class="custom-control-input ck">
                                            <label class="custom-control-label" for="radio_jk_kb1">Laki - Laki</label>
                                        </div>
                                        <div class="custom-control  custom-radio jk_k">
                                            <input type="radio" id="radio_jk_kb2" value="Perempuan" name="jk_kb" class="custom-control-input ck">
                                            <label class="custom-control-label" for="radio_jk_kb2">Perempuan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-3 col-form-label required">Jenis Pekerjaan</label>
                                    <div class="col-sm-12 col-md-9 row">
                                        <?php
                                        $query = mysqli_query($mysqli, "SELECT * from tb_pekerjaan");
                                        while ($row = mysqli_fetch_array($query)) {
                                            $id_p = $row['id_pekerjaan'];
                                            $pekerjaan = $row['pekerjaan'];
                                            echo
                                            '
                                        <div class="col-sm-12 col-md-5 custom-control custom-radio ml-3 jenispk_kb">
                                        <input type="radio" id="kerja_korban' . $id_p . '" value="' . $id_p . '" name="pekerjaan_kb" class="custom-control-input ck">
                                        <label class="custom-control-label" for="kerja_korban' . $id_p . '">' . $pekerjaan . '</label></div>';
                                        }
                                        ?>
                                        <div class="col-sm-12 col-md-5 custom-control  custom-radio ml-3 jenispk_kb">
                                            <input type="radio" id="radiokb2" value="lainnya_kb" name="pekerjaan_kb" class="custom-control-input ck">
                                            <label class="custom-control-label" for="radiokb2">Lainnya</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="kerja_lainnya_kb" class="form-group row">
                                    <div id="inputpekerjaan_kb" class="col-sm-12 col-md-9">
                                        <input type="text" aria-label="kerja_lain_kb" id="kerja_lain_kb" name="kerja_lain_kb" class="form-control ck" placeholder="Lainnya">
                                    </div>
                                </div>
                        </section>
                        <h5>Syarat </br>Ketentuan</h5>
                        <section>
                            <p class="h5">3. Dalam pengajuan santuan Jasa Raharja ini saya menyatakan dengan sebenar-benarnya, dlam keadaan sadar dan tanpa paksaan dari pihak manapun, bahwa:</p>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <ul style="list-style-type: decimal;" class="m-2">
                                        <li>Saya bersedia memenuhi ketentuan dan persyaratan yang berlaku dalam pengajuan santunan Jasa Raharja</li>
                                        <li>Seluruh keterangan yang saya berikan dan seluruh dokumen persyaratan yang saya serahkan adalah benar dan absah.</li>
                                        <li>Apabila di kemudian hari terbukti bahwa keterangan yang saya berikan tidak benar dan/atau dokumen persyaratan yang saya serahkan tidak absah, maka saya bersedia dituntut di muka pengadilan sesuai ketentuan hukup yang berlaku dan bersedia mengembalikan seluruh dana santuan yang telah saya terima.</li>
                                        <li>Saya bersedia mengembalikan dana santuanan yang telah saya terima apabila di kemudian hari ternyata ditemukan adanya kesalahan dalam perhitungan jumlah dana santunan yang seharusnya saya terima</li>
                                        <li>Apabila penyerahan dana melalui pemindahbukuan atau transfer bank, maka Bukti Pemindahbukuan/transfer Bank milik PT. Jasa Raharja (Persero) berlaku juga sebagai bukti tanda terima dana santunan yag sah</li>
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Default Basic Forms End -->
    <div class="footer-wrap pd-20 mb-20 card-box">
        DeskApp - Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Ankit Hingarajiya</a>
    </div>
</div>
</div>
<?php
require_once('../../layout/wrapperadmin/footer.php');
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>
<script type="text/javascript">
    // $(".date-picker").on("change", function() {
    //     $(this).attr('data-date', moment(this.value, 'YYYY-MM-DD').format($(this).attr('data-date-format')));
    //     var tanggal = $(this).attr('data-date');
    //     $('#tanggal').val(tanggal);
    //     alert(tanggal);
    // }).trigger("change")

    $('#waktu').on('change', function() {
        var a = $(this).val();
        var tgl = $
        console.log(a);
    })

    $(document).ready(function() {
        clear();
        clear_kb();
        // JQUERY NIK AND NIK KB
        $('#nik,#nik_kb').attr("maxlength", "16");
        $('#notel').attr("maxlength", "13");
        $('input#nik,#nik_kb,#notel').on('keyup', function() {
            var c = this.selectionStart,
                r = /[^0-9]/gi,
                v = $(this).val();
            if (r.test(v)) {
                $(this).val(v.replace(r, ''));
                c--;
            }
            this.setSelectionRange(c, c);
        });

        // jQuery TANGGAL KEJADIAN
        $('.date-picker').on('change', function() {
            var v = $(this).val();
            var date = moment(v).format('YYYY-MM-DD');
            $('#tanggalz').val(date);
            $('#datepicker').removeClass('is-invalid');
            $('#datepicker').addClass('is-valid');
            if ($('#tanggalz').val() == '') {
                $('#datepicker').removeClass('is-valid');
                $('#datepicker').addClass('is-invalid');
            }
        });

    });
    // VALIDASI
    $(function() {
        let validator = $('form.needs-validation').jbvalidator({
            errorMessage: true,
            successClass: true,
            language: '<?= base_url(); ?>/assets/src/plugins/jbvalidator/dist/lang/en.json'
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
                $('#kerja_lainnya').addClass('d-flex flex-row-reverse');
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
                $('#kerja_lainnya_kb').addClass('d-flex flex-row-reverse');
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
            $('#kota-kab').addClass('d-flex flex-row-reverse');
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
            $('#kota-kab_kb').addClass('d-flex flex-row-reverse');
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
            $('#kecamatan').addClass('d-flex flex-row-reverse');
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
            $('#kecamatan_kb').addClass('d-flex flex-row-reverse');
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
            $('#kelurahan').addClass('d-flex flex-row-reverse');
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
            $('#kelurahan_kb').addClass('d-flex flex-row-reverse');
            $.post("tes2.php", {
                id: content,
                req: 'kelurahan_kb'
            }, function(data) {
                $('#pilkel_kb').html(JSON.parse(data));
            });
            $('#kelurahan').removeAttr('hidden');
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
            $('#alamat').addClass('d-flex flex-row-reverse');
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
            $('#alamat_kb').addClass('d-flex flex-row-reverse');
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
    $(document).ready(function() {
        $('.ufrom').addClass('red');
        // $('.ufrom').addClass('green');
        $('.ck').attr('disabled', 'disabled');




        $(".ufrom").click(function() {
            // alert('hidup');
            $('.ufrom i').show("slide", {
                direction: "left"
            }, 1000, function() {
                $(this).toggleClass('fa-toggle-on');
            });
            $('.ufrom i').toggleClass('fa-toggle-off').fadeIn(150);


            if ($('.ufrom i').hasClass('fa-toggle-off')) {
                $('#aktif_form').removeClass('green');
                $('.ufrom').addClass('red');
                $('.ck').attr('disabled', 'disabled');


            }

            if ($('.ufrom i').hasClass('fa-toggle-on')) {
                $('#aktif_form').removeClass('red');
                $('#aktif_form').addClass('green');
                $('.ck').attr('disabled', false);

            }
        });
    });

    $('#finish').on('click', function() {
        $("#form_pengajuan").submit();
    });

    // $(document).ready(function() {
    //     $('#tanggal_lahir').keyup(function() {
    //         var tanggal = parseFloat($(this).val());
    //         console.log(tanggal);
    //     });
    // });
</script>