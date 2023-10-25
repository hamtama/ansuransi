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
    <!-- <link rel="stylesheet" href="../css/mdb.min.css" /> -->
    <!-- Bootstrap -->
    <link href="../../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../../assets/build/css/custom.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Data Toggle -->
    <link href="../../assets/vendors/bootstrap-toggle/bootstrap-toggle.css" rel="stylesheet">
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
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false"
                    aria-label="Toggle navigation">
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
                                <a class="btn btn-outline-light btn-lg m-2" href="../index.php" role="button"
                                    rel="nofollow" target="_blank">Beranda</a>
                                <a class="btn btn-outline-light btn-lg m-2" href="form/format_pengajuan.php"
                                    target="_blank" role="button">Download
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
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Download Format File Pengajuan Santunan</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <a href="../index.php" class="btn btn-outline-primary"> <i class="fa
                                        fa-chevron-left"> </i> Kembali
                    </a>

                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box">


                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>

                                                <th>No </th>
                                                <th>Nama FIle</th>
                                                <th>File</th>
                                                <th style="text-align: center;">Aksi Tombol</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$ket = "";
                                        
										$query = "SELECT (ROW_NUMBER() OVER (Order by id_format_file)) as nomor, `*` FROM tb_format_file";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										    ?>
                                            <tr>

                                                <td><?= $row['nomor'] ?>.</td>
                                                <td><?= $row['nama_file'] ?></td>
                                                <td><?= $row['file'] ?></td>
                                                <td style="width:20%; text-align: center;">

                                                    <a class="btn btn-success btn-xs"
                                                        href="download.php?id=<?= $row[1] ?>"><i class="fa fa-download">
                                                        </i></a>
                                                    <button class="btn btn-info btn-xs lihat"
                                                        data-id="<?= $row[1] ?>"><i class=" fa fa-eye"></i></button>
                                                </td>
                                            </tr>
                                            <?php
											}
										} 
										?>
                                        </tbody>
                                    </table>
                                    <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title"></h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span
                                                            aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="fetched-data">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
    <!-- jQuery -->
    <script src="../../assets/vendors/jquery/dist/jquery.min.js"></script>
    <!-- NProgress -->
    <script src="../../assets/vendors/nprogress/nprogress.js"></script>
    <!-- FastClick -->
    <script src="../../assets/vendors/fastclick/lib/fastclick.js"></script>
    <!-- Data Togle -->
    <script src="../../assets/vendors/bootstrap-toggle/bootstrap-toggle.js"></script>
    <!-- Bootstrap -->
    <script src="../../assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../../assets/build/js/custom.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $('.lihat').click(function() {
            // var id = $(this).attr('id');
            var id = $(this).attr('data-id');
            console.log(id);
            //Menggunakan fungsi Ajax untuk Pengambilan Data
            $.ajax({
                type: 'post',
                url: 'showpdf.php',
                data: {
                    id: id

                },
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    $('.modal-title').text("Data Upload File");
                    $('#myModal').modal('show');
                }
            });
        });
    });
    </script>
</body>

</html>