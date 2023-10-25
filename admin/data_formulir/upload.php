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
                    <div class="col-md-8 col-sm-12">
                        <div class="title">
                            <h4>Formulir</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>/layout/wrapperadmin/wrapper.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Basic</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-12 col-sm-12 text-right">
                        <div class="dropdown">
                            <a class="btn btn-secondary" href="#" role="button" data-toggle="dropdown">
                                <?php
                                date_default_timezone_set('Asia/Jakarta');
                                echo date('d F Y');
                                ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="text-center">
                        <h4 class="text-black h3  mt-30 mb-0 "><u>FILE PENDUKUNG PENGAJUAN SANTUNAN JASA RAHARJA</u></h4>
                        <p class="mb-30 mt-0">(Lampirkan Data Yang Valid dan Jelas, Agar Mempermudah Proses Pengecekan)</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <form enctype='multipart/form-data' class="needs-validation" method="post" action="aksiupload.php" novalidate>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">No. Registrasi</label>
                            <div class="col-sm-12 col-md-6 p-0">
                                <?php
                                $query = mysqli_query($mysqli, "SELECT * from tb_pengajuan order by id_pengajuan desc limit 1");
                                while ($row = mysqli_fetch_array($query)) {
                                    $noreg = $row['no_pengajuan'];
                                    $nama = $row['nama_pengaju'];
                                }
                                ?>
                                <input type="text" readonly name="no_reg" value="<?= $noreg; ?>" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Berkas Hasil Laporan Polisi</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="polisi" type="file" name="polisi" class="custom-file-input " value='' required>
                                <label id="l_polisi" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Surat Izin Mengemudi (SIM)</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="sim" type="file" name="sim" class="custom-file-input" required>
                                <label id="l_sim" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Surat Tanda Nomor Kendaraan (STNK)</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="stnk" type="file" name="stnk" class="custom-file-input" required>
                                <label id="l_stnk" class="custom-file-label">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">KTP Korban / KTP Ahli Waris</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="ktp" type="file" name="ktp" class="custom-file-input" required>
                                <label id="l_ktp" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Kartu Keluarga</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="kk" name="kk" type="file" class="custom-file-input" required>
                                <label id="l_kk" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Akte Nikah / Keterangan Nikah<br>
                                <font style="font-size: x-small;">(Korban yang sudah menikah)</font>
                            </label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="akte_nikah" name="akte_nikah" type="file" class="custom-file-input" required>
                                <label id="l_akte_nikah" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Akte Kelahiran</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="akte_lahir" name="akte_lahir" type="file" class="custom-file-input" required>
                                <label id="l_akte_lahir" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Surat Keterangan (Diagnosa) Rumah Sakit</label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="diagnosis" name="diagnosis" type="file" class="custom-file-input" required>
                                <label id="l_diagnosis" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Surat Keterangan Ahli Waris<br>
                                <font style="font-size: x-small;">Dari Kepala Desa/Kelurahan</font>
                            </label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="ahli_waris" name="ahli_waris" type="file" class="custom-file-input" required>
                                <label id="l_ahli_waris" class="custom-file-label">Choose file</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Kwitansi Pembelian Obat <br>
                                <font style="font-size: x-small;">Sesuai Resep Dokter yang Merawat Korban </font>
                            </label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="kwitansi" name="kwitansi" type="file" class="custom-file-input" required>
                                <label id="l_kwitansi" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-4 col-form-label required">Kwitansi Pembelian Obat Apotek<br>
                                <font style="font-size: x-small;">Dari Apotek Sesuai Resep Dokter Yang Merawat Korban</font>
                            </label>
                            <div class="custom-file col-sm-12 col-md-6 mb-3">
                                <input id="kwitansi_apotek" name="kwitansi_apotek" type="file" class="custom-file-input" required>
                                <label id="l_kwitansi_apotek" class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <input type="hidden" id="jumlah" name="jumlah" value="0">
                        <div id="dynamic_field">
                            <div class="form-group row">
                                <label class="col-sm-12 col-md-4 col-form-label required">Kuitansi Biaya Rawat Korban</label>
                                <div class="custom-file col-sm-12 col-md-6 mr-2 mb-1">
                                    <input id="kwitansi_rawat" name="kwitansi_rawat" type="file" class="custom-file-input" required>
                                    <label id="l_kwitansi_rawat" class="custom-file-label">Choose file</label>
                                </div>
                                <button type="button" name="add" id="add" class="btn btn-success mr-1"><i class="fa fa-plus"></i></button>
                                <button type="button" name="add" id="remove" class="d-none btn btn-danger ml-1"><i class="fa fa-minus"></i></button>
                            </div>
                        </div>
                        <input type="hidden" id="jumi" name="jumi">
                        <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-success">
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
            $('#dynamic_field').append('<div class="form-group row" id="row' + i + '" ><label for="dokumen_lain" class="col-sm-12 col-md-4 col-form-label required">Dokumen Pendukung Lain ' + i + '</label><div class="custom-file col-sm-12 col-md-6 mr-2 mb-3"><input name="dokumen_lain' + i + '"  id="dokumen_lain' + i + '" type="file" class="custom-file-input" required><label id="l_dokumen_lain' + i + '" class="custom-file-label">Choose file</label></div></div>');
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