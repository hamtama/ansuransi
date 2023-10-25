<?php
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');
?>

<div class="">

    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Upload Berkas Pengajuan Santunan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="text-center">
                                <h4 class="text-black h3  mt-30 mb-0 "><u>FILE PENDUKUNG PENGAJUAN SANTUNAN JASA
                                        RAHARJA</u></h4>
                                <p class="mb-30 mt-0">(Lampirkan Data Yang Valid dan Jelas, Agar Mempermudah Proses
                                    Pengecekan)</p>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <form enctype='multipart/form-data' class="needs-validation" method="post"
                                action="aksiupload.php" novalidate>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label  ">No. Registrasi <span
                                            class="required">*</span></label>
                                    <div class="col-sm-12 col-md-7 p-0">
                                        <select class="form-control has-feedback-left" name="no_reg">
                                            <?php
                                $query = mysqli_query($mysqli, "select a.id_pengajuan, no_pengajuan FROM tb_upload_file a RIGHT JOIN tb_pengajuan b ON b.id_pengajuan = a.id_pengajuan WHERE a.id_pengajuan IS NULL ORDER BY b.id_pengajuan DESC");
                                while ($row = mysqli_fetch_array($query)) {
                                    
                                    echo '<option value="'.$row['no_pengajuan'].'">'.$row['no_pengajuan'].'</option>';
                                }
                                ?>
                                            <!-- <input type="text" readonly name="no_reg" value="<?= $noreg; ?>"
                                            class="form-control "> -->
                                        </select>
                                        <span class="fa fa-cogs form-control-feedback left"> </span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Berkas Hasil Laporan
                                        Polisi <span class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="polisi" type="file" name="polisi" class="custom-file-input " value=''
                                            required>
                                        <label id="l_polisi" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Surat Izin Mengemudi
                                        (SIM) <span class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="sim" type="file" name="sim" class="custom-file-input" required>
                                        <label id="l_sim" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Surat Tanda Nomor
                                        Kendaraan (STNK) <span class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="stnk" type="file" name="stnk" class="custom-file-input" required>
                                        <label id="l_stnk" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">KTP Korban / KTP Ahli
                                        Waris <span class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="ktp" type="file" name="ktp" class="custom-file-input" required>
                                        <label id="l_ktp" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Kartu Keluarga <span
                                            class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="kk" name="kk" type="file" class="custom-file-input" required>
                                        <label id="l_kk" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Akte Nikah / Keterangan
                                        Nikah <span class="required">*</span></br>
                                        <font style="font-size: x-small;">(Korban yang sudah menikah)</font>
                                    </label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="akte_nikah" name="akte_nikah" type="file" class="custom-file-input"
                                            required>
                                        <label id="l_akte_nikah" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Akte Kelahiran <span
                                            class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="akte_lahir" name="akte_lahir" type="file" class="custom-file-input"
                                            required>
                                        <label id="l_akte_lahir" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Surat Keterangan
                                        (Diagnosa) Rumah Sakit <span class="required">*</span></label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="diagnosis" name="diagnosis" type="file" class="custom-file-input"
                                            required>
                                        <label id="l_diagnosis" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Surat Keterangan Ahli
                                        Waris <span class="required">*</span><br>
                                        <font style="font-size: x-small;">Dari Kepala Desa/Kelurahan</font>
                                    </label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="ahli_waris" name="ahli_waris" type="file" class="custom-file-input"
                                            required>
                                        <label id="l_ahli_waris" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label">Kwitansi Pembelian Obat <span
                                            class="required">*</span>
                                        <br>
                                        <font style="font-size: x-small;">Sesuai Resep Dokter yang Merawat Korban
                                        </font>
                                    </label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="kwitansi" name="kwitansi" type="file" class="custom-file-input"
                                            required>
                                        <label id="l_kwitansi" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-md-4 col-form-label ">Kwitansi Pembelian Obat
                                        Apotek <span class="required">*</span><br>
                                        <font style="font-size: x-small;">Dari Apotek Sesuai Resep Dokter Yang Merawat
                                            Korban</font>
                                    </label>
                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                        <input id="kwitansi_apotek" name="kwitansi_apotek" type="file"
                                            class="custom-file-input" required>
                                        <label id="l_kwitansi_apotek" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                                <input type="hidden" id="jumlah" name="jumlah" value="0">
                                <div id="dynamic_field">
                                    <div class="form-group row">
                                        <label class="col-sm-12 col-md-4 col-form-label">Kuitansi Biaya Rawat
                                            Korban <span class="required">*</span></label>
                                        <div class="custom-file col-sm-12 col-md-7 mr-2 mb-1">
                                            <input id="kwitansi_rawat" name="kwitansi_rawat" type="file"
                                                class="custom-file-input" required>
                                            <label id="l_kwitansi_rawat" class="custom-file-label">Choose file</label>
                                        </div>
                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success"><i
                                                class="fa fa-plus"></i></button>
                                        <button type="button" name="add" id="remove"
                                            class="d-none btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div>
                                <input type="hidden" id="jumi" name="jumi">
                                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success">
                            </form>
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
// VALIDASI
$(function() {
    let validator = $('form.needs-validation').jbvalidator({
        errorMessage: true,
        successClass: true,
        language: '<?= base_url(); ?>/assets/src/plugins/jbvalidator/dist/lang/en.json'
    });
});

$('#reset').click(function() {
    $('#nama_kasus').removeAttr('disabled');
});

function swalow(bag) {
    swal({
        type: 'error',
        title: 'Oops...',
        text: bag,
    })
}

$(document).ready(function() {

    var i = 0;
    var jum = [1, 2, 3, 4, 5];
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<div class="form-group row" id="row' + i +
            '" ><label for="dokumen_lain" class="col-sm-12 col-md-4 col-form-label">Dokumen Pendukung Lain ' +
            i +
            ' <span class="required">*</span></label><div class="custom-file col-sm-12 col-md-7 mr-2 mb-3"><input name="dokumen_lain' +
            i + '"  id="dokumen_lain' + i +
            '" type="file" class="custom-file-input" required><label id="l_dokumen_lain' + i +
            '" class="custom-file-label">Choose file</label></div></div>');
        if (i == 5) {
            $('#add').hide();
        } else if (i > 0) {
            $('#remove').removeClass('d-none');
        }
        // console.log(i);
        $('#jumlah').val(i)
    });
    $(document).on('click', '#remove', function() {
        $('#row' + i + '').remove();
        i--;
        $('#jumlah').val(i)
        if (i <= 5) {
            $('#add').show();
            if (i == 0) {
                $('#remove').addClass('d-none');
            }
        }
        console.log(i);

    });

});



$(document).on('change', "input[type='file']", function() {
    // $("input[type='file']").on('change', function() {
    var kelas = $(this).attr('id');
    var a = ext = $('#' + kelas).val();
    var ext = $('#' + kelas).val().split('.').pop().toLowerCase();

    if ($.inArray(ext, ['png', 'pdf', 'jpg', 'jpeg']) == -1) {
        $('#' + kelas).addClass('is-invalid');
        $('#' + kelas).removeClass('is-valid');
        $('#' + kelas).val(null);
        $('#l_' + kelas).text('Choose file');
        swalow('Extensi tidak sesuai! Mendukung Extensi png, jpg, jpeg, pdf');
    } else if (this.files[0].size > 2000000) {
        swalow('Ukuran File Terlalu Besar! Ukuran Max File 2 MB');
        $('#l_' + kelas).text('Choose file');
        $('#' + kelas).removeClass('is-valid');
        $('#' + kelas).addClass('is-invalid');
    } else {
        $('#l_' + kelas).text(a.split('\\').pop().toLowerCase());
        $('#' + kelas).removeClass('is-invalid');
        $('#' + kelas).addClass('is-valid');
    }
    console.log(kelas);
    // });
});
</script>