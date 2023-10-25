<?php  
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT (ROW_NUMBER() OVER (Order by id_pengajuan)) as nomor, id_pengajuan, no_pengajuan,  
    DATE_FORMAT(tgl_reg, '%d-%m-%Y %H:%i') as tanggal,  nama_pengaju, tempat_lhr_pengaju, 
    DATE_FORMAT(tgl_lahir, '%Y-%m-%d') as tgl_lahir, ktp_pengaju, 
    id_prov_pengaju as prov,  id_kab_pengaju as kab, id_kec_pengaju as kec, id_kel_pengaju as kel,  
    b.nama as n_prov, c.nama as n_kab, d.nama as n_kec, e.nama as n_kel, alamat_pengaju, 
    umur_pengaju, jk_pengaju,  pekerjaan_pengaju, pekerjaan_lain_pengaju,
    (case when pekerjaan_pengaju='lainnya' then pekerjaan_lain_pengaju else f.pekerjaan end ) as pekerjaan, 
    no_telp_pengaju from tb_pengajuan a  JOIN wilayah_2020 b ON b.kode = a.id_prov_pengaju 
     JOIN wilayah_2020 c ON c.kode = a.id_kab_pengaju 
     JOIN wilayah_2020 d ON d.kode = a.id_kec_pengaju 
     JOIN wilayah_2020 e ON e.kode = a.id_kel_pengaju  
     LEFT JOIN tb_pekerjaan f ON f.id_pekerjaan = a.pekerjaan_pengaju WHERE id_pengajuan ='$id'";
	$result = $mysqli->query($sql);
	foreach ($result as $baris) {
        $baris['tgl_lahir'];
        $jk = $baris['jk_pengaju'];
        $v_pekerjaan = $baris['pekerjaan'];
        $lain = $baris['pekerjaan_pengaju'];
?>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pengajuan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- <button class="btn btn-success tambah" id="01"><i class="fa fa-plus"> Tambah</i></button> -->
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <form role="form" action="aksiedit.php" method="post">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <div class="clearfix">
                                        <div class="text-center">
                                            <h4 class="text-black h3  mt-30 mb-0"><u>FORMULIR PENGAJUAN SANTUNAN JASA
                                                    RAHARJA</u></h4>
                                            <p class="mb-30 mt-0">(Diisi dan Ditandatangani Oleh Penerima Dana Santunan)
                                            </p>
                                        </div>
                                    </div>
                                    <div class="form-group field item row">
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');
                                        date('d F Y');
                                        $t = date('Y-m-d');
                                        $today = date('Y-m-d G:i:s');
                                        ?>
                                        <label for="no_reg"
                                            class="col-form-label col-md-3 col-sm-3 label-align col-form-label">No.
                                            Registrasi <span class="required">*</span></label>
                                        <div class="col-sm-12 col-md-6">
                                            <input class="form-control" autocomplete="off"
                                                value="<?= $baris['no_pengajuan']; ?>" name="no_reg" type="text"
                                                readonly>
                                        </div>
                                    </div>
                                    <!-- <input type="hidden" name="date_reg" value="<?= $today; ?>"> -->
                                    <div class="form-group field item row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nama-lengkap">
                                            Nama Lengkap <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="nama" value="<?=$baris['nama_pengaju']?>"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group field item row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align"
                                            for="last-name">Tempat/Tanggal Lahir <span class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 input-group">
                                            <input type="text" name="tempat_lahir"
                                                value="<?=$baris['tempat_lhr_pengaju']?>" autocomplete="off"
                                                aria-label="Tempat lahir" class="form-control" required>
                                            <input type="date" id="tanggal_lahir" autocomplete="off" max="<?= $t; ?>"
                                                name="tanggal_lahir" aria-label="Tanggal lahir"
                                                value="<?=$baris['tgl_lahir']?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group field item row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Umur <span
                                                class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" name="umur" id="umur" readonly autocomplete="off"
                                                data-v-max-length="2" class="form-control"
                                                placeholder="<?=$baris['umur_pengaju']?>" required>
                                        </div>
                                    </div>
                                    <div class="form-group field item row">
                                        <label class="col-form-label col-md-3 col-sm-3 label-align">Nomor KTP/NIK <span
                                                class="required">*</span>
                                        </label>
                                        <div class="col-md-6 col-sm-6 ">
                                            <input type="text" aria-label="NIK" id="nik" autocomplete="off" name="nik"
                                                autocomplete="off" data-v-min-length="16" data-v-max-length="16"
                                                class="form-control" value="<?=$baris['ktp_pengaju']?>" required>
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
                                                name="alamat" class="form-control" placeholder="Alamat lengkap"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group field item row">
                                        <label class="col-sm-12 col-md-3 col-form-label label-align">No. Telp <span
                                                class="required">*</span></label>
                                        <div class="col-sm-12 col-md-6">
                                            <input type="tel" aria-label="No Telp" id="notel" autocomplete="off"
                                                name="notel" value="<?=$baris['no_telp_pengaju']?>" class="form-control"
                                                placeholder="No Telp" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Kelamin <span
                                                class="required">*</span></label>
                                        <div class="col-sm-12 col-md-6 ">
                                            <div class="custom-control custom-radio  jk">
                                                <input type="radio" id="customRadio1"
                                                    <?= ($jk == 'Laki-Laki') ? 'Checked="Checked"' : 'Checked=""' ;?>
                                                    value="Laki-Laki" name="jk" class="custom-control-input" required>
                                                <label class="custom-control-label" for="customRadio1">Laki -
                                                    Laki</label>
                                            </div>
                                            <div class="custom-control  custom-radio jk">
                                                <input type="radio" id="customRadio2"
                                                    <?= ($jk == 'Perempuan') ? 'Checked="Checked"' : 'Checked=""' ;?>
                                                    value="Perempuan" name="jk" class="custom-control-input">
                                                <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group field item row">
                                        <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Pekerjaan
                                            <span class="required">*</span></label>
                                        <div class="col-sm-12 col-md-6 row ">
                                            <?php
                                    $query = mysqli_query($mysqli, "SELECT * from tb_pekerjaan");
                                    while ($row = mysqli_fetch_array($query)) {
                                        $id_p = $row['id_pekerjaan'];
                                        $pekerjaan = $row['pekerjaan'];
                                        echo
                                        '<div class="col-md-5 col-sm-12">
                                        <div class="custom-control custom-radio jenispk">
                                        <input type="radio" id="kerja' . $id_p . '" '.(($v_pekerjaan === $pekerjaan) ?  'Checked="Checked"' :  '').' value="' . $id_p . '" name="pekerjaan" class="custom-control-input" required>
                                        <label class="custom-control-label" for="kerja' . $id_p . '">' . $pekerjaan . '</label></div></div>';
                                    }
                                    ?>
                                            <div class="col-md-5 col-sm-12">
                                                <div class="custom-control field item custom-radio jenispk ">
                                                    <input type="radio" id="radio2"
                                                        <?= ($lain == 'lainnya') ? 'Checked="Checked"' : '' ;?>
                                                        value="lainnya" name="pekerjaan" class="custom-control-input">
                                                    <label class="custom-control-label" for="radio2">Lainnya</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="kerja_lainnya" class="form-group field item row">
                                        <label class="col-sm-12 col-md-3 col-form-label label-align">Jenis Pekerjaan
                                            Lainnya<span class="required">*</span></label>
                                        <div id="inputpekerjaan" class="col-sm-12 col-md-6">
                                            <input type="text"
                                                value="<?=($lain == 'lainnya') ? $baris['pekerjaan'] : '' ;?>"
                                                id="kerja_lain" autocomplete="off" name="kerja_lain"
                                                class="form-control" placeholder="Lainnya">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <input type="hidden" id="masuk" name="ninja" value="mbuh">
                                            <button type='reset' class="btn btn-danger" id="reset">Reset</button>
                                            <button type='submit' class="btn btn-primary" id="submit">Simpan</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once('../../layout/wrapperadmin/footer.php');
?>
<script type="text/javascript">
$(document).ready(function() {
    clear();
    // var a = $('div#pilprov select').val("<?=$baris['prov']?>");
    if ($("#radio2").is(":checked")) {
        $('#kerja_lainnya').removeAttr('hidden');
    } else {
        $('#kerja_lainnya').attr('hidden', true);
    }

    $('#show').val('');

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
});

// CLEAR FOR FORM 1
function clear() {

    var prov = "<?=$baris['prov']?>";
    var kab = "<?=$baris['kab']?>";
    var kec = "<?=$baris['kec']?>";
    var kel = "<?=$baris['kel']?>";
    var n_prov = "<?=$baris['n_prov']?>";
    var n_kab = "<?=$baris['n_kab']?>";
    var n_kec = "<?=$baris['n_kec']?>";
    var n_kel = "<?=$baris['n_kel']?>";
    var alamat = "<?=$baris['alamat_pengaju']?>";

    if (prov !== null) {

        // TAMPIL PROVINSI
        $.post("tes.php", {
            req: 'provinsi',
            n_prov: n_prov,
            prov: prov,

        }, function(data) {
            $('#pilprov').html(JSON.parse(data));
        });

        // TAMPIL KABUPATEN
        $.post("tes.php", {
            id: prov,
            n_kab: n_kab,
            kab: kab,
            req: 'kota-kab',
        }, function(data) {
            $('#pilkab').html(JSON.parse(data));
        });
        $('#kota-kab').removeAttr('hidden');

        // TAMPIL KECAMATAN
        $.post("tes.php", {
            id: kab,
            n_kec: n_kec,
            kec: kec,
            req: 'kecamatan',
        }, function(data) {
            $('#pilkec').html(JSON.parse(data));
        });
        $('#kecamatan').removeAttr('hidden');

        // TAMPIL KELURAHAN
        $.post("tes.php", {
            id: kec,
            n_kel: n_kel,
            kel: kel,
            req: 'kelurahan',
        }, function(data) {
            $('#pilkel').html(JSON.parse(data));
        });
        $('#kelurahan').removeAttr('hidden');
        $('#alamatlgkp').val('');
        $('#alamatlgkp').removeClass('is-valid');
        $('#alamat').removeAttr('hidden');

        // TAMPIL ALAMAT DETAIL
        $.post("tes.php", {
            id: kel,
            req: 'kelurahan',
        }, function(data) {
            $('#alamatlgkp').val(alamat);
            $('#alamatlgkp').removeClass('is-valid');
            $('#alamat').removeAttr('hidden');
        });
    }
    // $('#kota-kab, #kecamatan, #kelurahan').removeAttr('hidden');
    // $('#kab, #kec, #kel').removeAttr('hidden');
    // $('#alamat, #kerja_lainnya').attr('hidden', true);
}

function bambang(tes) {
    $(tes).attr('hidden', true);
    $(tes).removeClass('d-flex flex-row-reverse');
}

function langit(bag) {
    $(bag + ' > input[type="radio"]').removeClass('is-valid');
}

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
// UMUR FORM 1
$(document).on('change', '#tanggal_lahir', function() {
    end = $(this).val();
    var input = new Date(end).getTime();
    var sekarang = Date.now();
    var age = Math.floor((sekarang - input) / 31536000000) + " Tahun";
    $('#umur').val(age);
    // console.log(end);
});

$(document).ready(function() {

    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
        "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
        var submit = true,
            validatorResult = validator.checkAll(this);
        console.log(validatorResult);
        return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
        validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
        validator.settings.alerts = !this.checked;
        if (this.checked)
            $('form .alert').remove();
    }).prop('checked', false);

});
</script>
<?php  
}}
?>