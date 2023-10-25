<?php
require_once('../../login/connection.php');
$id = $_GET['id'];
if (isset($id)) {
    $check_q2 = "SELECT * FROM tb_pengajuan WHERE id_pengajuan = '" . $id . "'";
    $check_r2 = mysqli_query($mysqli, $check_q2);
    while ($row = mysqli_fetch_array($check_r2)) {
        $noreg = $row['no_pengajuan'];
    }

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
    </style>
    <!-- page content -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <title>Material Design for Bootstrap</title>
        <!-- MDB -->
        <!-- <link rel="stylesheet" href="../css/mdb.min.css" /> -->
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
        <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
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
                                    <a class="btn btn-outline-light btn-lg m-2" href="form/format_pengajuan.php" target="_blank" role="button">Download
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
                                    <a href="pengajuan.php" class="btn btn-outline-primary"> <i class="fa
                                        fa-chevron-left"> </i> Kembali
                                    </a>
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
                                                <h4 class="text-black h3  mt-30 mb-0 "><u>FILE PENDUKUNG PENGAJUAN SANTUNAN
                                                        JASA
                                                        RAHARJA</u></h4>
                                                <p class="mb-30 mt-0">(Lampirkan Data Yang Valid dan Jelas, Agar Mempermudah
                                                    Proses
                                                    Pengecekan)</p>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <form enctype='multipart/form-data' class="needs-validation" method="post" action="aksiupload.php" novalidate>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label ">No Registrasi
                                                        Polisi <span class="required">*</span></label>
                                                    <div class=" col-sm-12 col-md-7 mb-3 p-0">
                                                        <input id="no_reg" type="text" name="no_reg" class="form-control" readonly value='<?= $noreg ?>' required>
                                                    </div>

                                                    <!-- <select class="form-control has-feedback-left" name="no_reg"> -->
                                                    <?php
                                                    // $query = mysqli_query($mysqli, "select a.id_pengajuan, no_pengajuan FROM tb_upload_file a RIGHT JOIN tb_pengajuan b ON b.id_pengajuan = a.id_pengajuan WHERE a.id_pengajuan IS NULL ORDER BY b.id_pengajuan DESC");
                                                    // while ($row = mysqli_fetch_array($query)) {

                                                    //     echo '<option value="' . $row['no_pengajuan'] . '">' . $row['no_pengajuan'] . '</option>';
                                                    // }
                                                    ?>

                                                    <!-- </select> -->


                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label ">Berkas Hasil Laporan
                                                        Polisi <span class="required">*</span></label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="polisi" type="file" name="polisi" class="custom-file-input " value='' required>
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
                                                    <label class="col-sm-12 col-md-4 col-form-label ">Kartu Keluarga <span class="required">*</span></label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="kk" name="kk" type="file" class="custom-file-input" required>
                                                        <label id="l_kk" class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label ">Akte Nikah /
                                                        Keterangan
                                                        Nikah <span class="required">*</span></br>
                                                        <font style="font-size: x-small;">(Korban yang sudah menikah)</font>
                                                    </label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="akte_nikah" name="akte_nikah" type="file" class="custom-file-input" required>
                                                        <label id="l_akte_nikah" class="custom-file-label">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label ">Akte Kelahiran <span class="required">*</span></label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="akte_lahir" name="akte_lahir" type="file" class="custom-file-input" required>
                                                        <label id="l_akte_lahir" class="custom-file-label">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Surat Keterangan
                                                        (Diagnosa) Rumah Sakit <span class="required">*</span></label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="diagnosis" name="diagnosis" type="file" class="custom-file-input" required>
                                                        <label id="l_diagnosis" class="custom-file-label">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Surat Keterangan Ahli
                                                        Waris <span class="required">*</span><br>
                                                        <font style="font-size: x-small;">Dari Kepala Desa/Kelurahan</font>
                                                    </label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="ahli_waris" name="ahli_waris" type="file" class="custom-file-input" required>
                                                        <label id="l_ahli_waris" class="custom-file-label">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label">Kwitansi Pembelian Obat
                                                        <span class="required">*</span>
                                                        <br>
                                                        <font style="font-size: x-small;">Sesuai Resep Dokter yang Merawat
                                                            Korban
                                                        </font>
                                                    </label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="kwitansi" name="kwitansi" type="file" class="custom-file-input" required>
                                                        <label id="l_kwitansi" class="custom-file-label">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-12 col-md-4 col-form-label ">Kwitansi Pembelian
                                                        Obat
                                                        Apotek <span class="required">*</span><br>
                                                        <font style="font-size: x-small;">Dari Apotek Sesuai Resep Dokter
                                                            Yang Merawat
                                                            Korban</font>
                                                    </label>
                                                    <div class="custom-file col-sm-12 col-md-7 mb-3">
                                                        <input id="kwitansi_apotek" name="kwitansi_apotek" type="file" class="custom-file-input" required>
                                                        <label id="l_kwitansi_apotek" class="custom-file-label">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="jumlah" name="jumlah" value="0">
                                                <div id="dynamic_field">
                                                    <div class="form-group row">
                                                        <label class="col-sm-12 col-md-4 col-form-label">Kuitansi Biaya
                                                            Rawat
                                                            Korban <span class="required">*</span></label>
                                                        <div class="custom-file col-sm-12 col-md-7 mr-2 mb-1">
                                                            <input id="kwitansi_rawat" name="kwitansi_rawat" type="file" class="custom-file-input" required>
                                                            <label id="l_kwitansi_rawat" class="custom-file-label">Choose
                                                                file</label>
                                                        </div>
                                                        <button type="button" name="add" id="add" class="btn btn-sm btn-success"><i class="fa fa-plus"></i></button>
                                                        <button type="button" name="add" id="remove" class="d-none btn btn-sm btn-danger"><i class="fa fa-minus"></i></button>
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
                </section>
                <!--Section: Content-->



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
        <!-- <script type="text/javascript" src="../js/mdb.min.js"></script> -->
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
        <!-- add sweet alert js & css in footer -->
        <script src="../../assets/vendors/sweetalert2/sweetalert2.all.js"></script>
        <script src="../../assets/vendors/sweetalert2/sweet-alert.init.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="../../assets/build/js/custom.min.js"></script>


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
            });
        </script>

    </body>

    </html>
<?php } ?>