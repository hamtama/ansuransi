<?php  
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT (ROW_NUMBER() OVER (Order by id_pengajuan_kb)) as nomor, 
    id_pengajuan_kb, no_pengajuan, 
     
    nama_pengaju_kb, tempat_lhr_pengaju_kb, 
    DATE_FORMAT(tgl_lahir_kb, '%Y-%m-%d') as tgl_lahir_kb, 
    ktp_pengaju_kb, 
    id_prov_pengaju_kb as prov,  id_kab_pengaju_kb as kab, id_kec_pengaju_kb as kec, id_kel_pengaju_kb as kel,  
    b.nama as n_prov, c.nama as n_kab, d.nama as n_kec, e.nama as n_kel, alamat_pengaju,
    alamat_pengaju_kb ,umur_pengaju_kb, jk_pengaju_kb,  pekerjaan_pengaju_kb,
    (case when pekerjaan_pengaju_kb='lainnya_kb' then pekerjaan_pengaju_lain_kb else f.pekerjaan end ) as pekerjaan, 
    no_telp_pengaju_kb from tb_pengajuan_korban a  
    LEFT JOIN wilayah_2020 b ON b.kode = a.id_prov_pengaju_kb
    LEFT JOIN wilayah_2020 c ON c.kode = a.id_kab_pengaju_kb 
    LEFT JOIN wilayah_2020 d ON d.kode = a.id_kec_pengaju_kb
    LEFT JOIN wilayah_2020 e ON e.kode = a.id_kel_pengaju_kb  
    LEFT JOIN tb_pekerjaan f ON f.id_pekerjaan = a.pekerjaan_pengaju_kb
    LEFT join tb_pengajuan g ON g.id_pengajuan = a.id_pengajuan WHERE id_pengajuan_kb ='$id'";
	$result = $mysqli->query($sql);
	foreach ($result as $baris) {
        $baris['tgl_lahir_kb'];
        $jk = $baris['jk_pengaju_kb'];
        echo $v_pekerjaan = $baris['pekerjaan'];
        echo $lain = $baris['pekerjaan_pengaju_kb'];
        date_default_timezone_set('Asia/Jakarta');
        date('d F Y');
        $t = date('Y-m-d');
        $today = date('Y-m-d G:i:s');
                                        
?>
<div class="">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Data Pengajuan Korban</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <form role="form" action="aksiedit.php" method="post">
                                    <input type="hidden" name="id" value="<?=$id?>">
                                    <div class="text-center">
                                        <h4 class="text-black h2 mt-30 mb-4"><u>DATA DIRI KORBAN KECELAKAAN</u></h4>
                                    </div>

                                    <p class="h6">2. Identitas Korban Kecelakaan (Tidak Perlu Diisi Jika Yang
                                        Mengajukan
                                        Adalah
                                        Korban Sendiri) Sebagai Berikut :</p>
                                    <div class="col-sm-12 col-md-12 mb-30">
                                        <div class="form-group field item row">
                                            <label for="no_reg"
                                                class="col-form-label col-md-3 col-sm-3 col-form-label">No.
                                                Registrasi <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-6">
                                                <input class="form-control" autocomplete="off"
                                                    value="<?= $baris['no_pengajuan']; ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group field item row mt-3">
                                            <label class="col-sm-12 col-md-3 col-form-label">Nama
                                                Lengkap <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-6">
                                                <input class="form-control ck" value="<?=$baris['nama_pengaju_kb']?>"
                                                    id="nama_kb" autocomplete="off" name="nama_kb" type="text"
                                                    placeholder="Nama Lengkap Korban" required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Tempat &
                                                Tanggal
                                                Lahir <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-6 input-group mb-0">
                                                <input type="text" value="<?=$baris['tempat_lhr_pengaju_kb']?>"
                                                    id="t4_lahir_kb" autocomplete="off" name="tempat_lahir_kb"
                                                    class="form-control ck" placeholder="Tempat Lahir Korban" required>
                                                <input type="date" value="<?=$baris['tgl_lahir_kb']?>"
                                                    id="tanggal_lahir_kb" autocomplete="off" max="<?= $t; ?>"
                                                    name="tanggal_lahir_kb" class="form-control ck" required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Umur
                                                Korban <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-3">
                                                <input type="text" value="<?=$baris['umur_pengaju_kb']?>" id="umur_kb"
                                                    readonly aria-label="Umur" data-v-max-length="2"
                                                    class="form-control ck" placeholder="Umur" name="umur_kb" required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Nomor
                                                KTP/NIK
                                                Korban <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-6">
                                                <input type="text" aria-label="NIK Korban" id="nik_kb" name="nik_kb"
                                                    data-v-min-length="16" value="<?=$baris['ktp_pengaju_kb']?>"
                                                    data-v-max-length="16" class="form-control ck"
                                                    placeholder="NIK Korban" required>
                                            </div>
                                        </div>
                                        <div class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Provinsi <span
                                                    class="required">*</span></label>
                                            <div id="pilprov_kb" class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div id="kota-kab_kb" class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Kabupaten<span
                                                    class="required">*</span></label>
                                            <div id="pilkab_kb" class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div id="kecamatan_kb" class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Kecamatan<span
                                                    class="required">*</span></label>
                                            <div id="pilkec_kb" class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div id="kelurahan_kb" class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Kelurahan<span
                                                    class="required">*</span></label>
                                            <div id="pilkel_kb" class="col-sm-12 col-md-6"></div>
                                        </div>
                                        <div id="alamat_kb" class="form-group field item row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Alamat Lengkap<span
                                                    class="required">*</span></label>
                                            <div id="inputalamat_kb" class="col-sm-12 col-md-6">
                                                <input type="text" aria-label="Alamat Koban" id="alamatlgkp_kb"
                                                    name="alamat_kb" class="form-control ck"
                                                    placeholder="Alamat lengkap" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label required">No. Telp
                                                Korban</label>
                                            <div class="col-sm-12 col-md-6">
                                                <input type="tel" aria-label="No Telp Korban" id="notel_kb"
                                                    autocomplete="off" value="<?=$baris['no_telp_pengaju_kb']?>"
                                                    name="notel_kb" class="form-control ck" placeholder="No Telp Korban"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 col-md-3 col-form-label">Jenis
                                                Kelamin <span class="required">*</span></label>
                                            <div class="col-sm-12 col-md-6 ">
                                                <div class="custom-control custom-radio jk_k">
                                                    <input type="radio"
                                                        <?= ($jk == 'Laki-Laki') ? 'Checked="Checked"' : 'Checked=""' ;?>
                                                        id="radio_jk_kb1" value="Laki-Laki" name="jk_kb"
                                                        class="custom-control-input ck" required>
                                                    <label class="custom-control-label" for="radio_jk_kb1">Laki
                                                        -
                                                        Laki</label>
                                                </div>
                                                <div class="custom-control  custom-radio jk_k">
                                                    <input type="radio"
                                                        <?= ($jk == 'Perempuan') ? 'Checked="Checked"' : 'Checked=""' ;?>
                                                        id="radio_jk_kb2" value="Perempuan" name="jk_kb"
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
                                        <input type="radio" id="kerja_korban' . $id_p . '" '.(($v_pekerjaan === $pekerjaan) ?  'Checked="Checked"' :  '').' value="' . $id_p . '" name="pekerjaan_kb" class="custom-control-input ck" required>
                                        <label class="custom-control-label" for="kerja_korban' . $id_p . '">' . $pekerjaan . '</label></div></div>';
                                        }
                                        ?>
                                                <div class="col-md-5 col-sm-12">
                                                    <div class="custom-control custom-radio jenispk_kb">
                                                        <input type="radio"
                                                            <?= ($lain == 'lainnya_kb') ? 'Checked="Checked"' : '' ;?>
                                                            id="radiokb2" value="lainnya_kb" name="pekerjaan_kb"
                                                            class="custom-control-input ck">
                                                        <label class="custom-control-label"
                                                            for="radiokb2">Lainnya</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="kerja_lainnya_kb" class="form-group row field item">
                                            <label class="col-sm-12 col-md-3 col-form-label">Jenis
                                                Pekerjaan
                                                Lainnya<span class="required">*</span></label>
                                            <div id="inputpekerjaan_kb" class="col-sm-12 col-md-6">
                                                <input type="text"
                                                    value="<?=($lain == 'lainnya_kb') ? $baris['pekerjaan'] : '' ;?>"
                                                    aria-label="kerja_lain_kb" id="kerja_lain_kb" name="kerja_lain_kb"
                                                    class="form-control ck" placeholder="Lainnya">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 offset-md-3">
                                                <input type="hidden" id="masuk" name="ninja" value="mbuh">
                                                <button type='reset' class="btn btn-danger" id="reset">Reset</button>
                                                <button type='submit' class="btn btn-primary"
                                                    id="submit">Simpan</button>
                                            </div>
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
    if ($("#radiokb2").is(":checked")) {
        $('#kerja_lainnya_kb').removeAttr('hidden');
    } else {
        $('#kerja_lainnya_kb').attr('hidden', true);
    }
    $('#show').val('');

    // JQUERY NIK AND NIK KB
    $('#nik_kb').attr("maxlength", "16");
    $('#notel_kb').attr("maxlength", "13");
    $('input#nik,#nik_kb,#notel_kb').on('keyup', function() {
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

    var prov = "<?=$baris['prov']?>";
    var kab = "<?=$baris['kab']?>";
    var kec = "<?=$baris['kec']?>";
    var kel = "<?=$baris['kel']?>";
    var n_prov = "<?=$baris['n_prov']?>";
    var n_kab = "<?=$baris['n_kab']?>";
    var n_kec = "<?=$baris['n_kec']?>";
    var n_kel = "<?=$baris['n_kel']?>";
    var alamat = "<?=$baris['alamat_pengaju_kb']?>";

    if (prov !== null) {

        // TAMPIL PROVINSI
        $.post("tes2.php", {
            req: 'provinsi_kb',
            n_prov: n_prov,
            prov: prov,

        }, function(data) {
            $('#pilprov_kb').html(JSON.parse(data));
        });

        // TAMPIL KABUPATEN
        $.post("tes2.php", {
            id: prov,
            n_kab: n_kab,
            kab: kab,
            req: 'kota-kab_kb',
        }, function(data) {
            $('#pilkab_kb').html(JSON.parse(data));
        });
        $('#kota-kab_kb').removeAttr('hidden');

        // TAMPIL KECAMATAN
        $.post("tes2.php", {
            id: kab,
            n_kec: n_kec,
            kec: kec,
            req: 'kecamatan_kb',
        }, function(data) {
            $('#pilkec_kb').html(JSON.parse(data));
        });
        $('#kecamatan_kb').removeAttr('hidden');

        // TAMPIL KELURAHAN
        $.post("tes2.php", {
            id: kec,
            n_kel: n_kel,
            kel: kel,
            req: 'kelurahan_kb',
        }, function(data) {
            $('#pilkel_kb').html(JSON.parse(data));
        });
        $('#kelurahan_kb').removeAttr('hidden');
        $('#alamatlgkp_kb').val('');
        $('#alamatlgkp_kb').removeClass('is-valid');
        $('#alamat_kb').removeAttr('hidden');

        // TAMPIL ALAMAT DETAIL
        $.post("tes2.php", {
            id: kel,
            req: 'kelurahan',
        }, function(data) {
            $('#alamatlgkp_kb').val(alamat);
            $('#alamatlgkp_kb').removeClass('is-valid');
            $('#alamat_kb').removeAttr('hidden');
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
// UMUR FORM 2
$(document).on('change', '#tanggal_lahir_kb', function() {
    end = $(this).val();
    var input = new Date(end).getTime();
    var sekarang = Date.now();
    var age = Math.floor((sekarang - input) / 31536000000) + " Tahun";
    $('#umur_kb').val(age);

    console.log(age);
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