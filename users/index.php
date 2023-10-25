<?php
require_once('../login/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Sistem Pakar Ansuransi</title>
    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../login/assets/vendors/images/apple-touch-icon_2.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../login/assets/vendors/images/favicon-32x32_2.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../login/assets/vendors/images/favicon-16x16_2.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <!-- Custom styles -->
    <!-- <link rel="stylesheet" href="css/style.css" /> -->
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
                background-image: url('img/ansuransi1.jpg');
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
                <a class="navbar-brand nav-link" target="_blank" href="#">
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
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="0" class="active"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="1"></li>
                <li data-mdb-target="#introCarousel" data-mdb-slide-to="2"></li>
            </ol>

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
                                <a class="btn btn-outline-light btn-lg m-2" href="form/pengajuan.php" role="button" rel="nofollow">Daftar Pengajuan</a>
                                <button type="button" class="btn btn-outline-light btn-lg m-2" data-mdb-toggle="modal" data-mdb-target="#exampleModal">
                                    Check Pengajuan
                                </button>
                                <a class="btn btn-outline-light btn-lg m-2" href="form/format_pengajuan.php" role="button">Download
                                    Format File Pengajuan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="pdfPreview"></div>






        <!-- Carousel wrapper -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main class="mt-5">
        <div class="container">
            <!--Section: Content-->
            <section>
                <div class="row">
                    <div class="col-md-6 gx-5 mb-4">
                        <div class="bg-image hover-overlay ripple shadow-2-strong" data-mdb-ripple-color="light">
                            <img src="https://mdbootstrap.com/img/new/slides/031.jpg" class="img-fluid" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                    </div>


                    <div class="col-md-6 gx-5 mb-4">
                        <h4><strong>Tentang Aplikasi</strong></h4>
                        <p class="text-muted">
                            Sistem rekomendasi klaim customer yang layak untuk mendapatkan santunan akibat kecelakaan
                            berkendaraan bermotor ini dibuat untuk membantu para korban kecelakaan untuk mengajukan
                            haknya sebagai korban kecelakaan agar mendapatkan santunan selayaknya. Seorang korban harus
                            memberikan keterangan dengan jelas serta menjelaskan keterangan kejadian dengan jujur untuk
                            bisa mendapatkan santunan sesuai dengan haknya yang sudah diatur. Serta Mematuhi setiap
                            peraturan dan setiap langkah dalam pengajuan, agar santuanan dapat dengan mudah dan cepat
                            cair
                        </p>

                    </div>
                </div>
            </section>
            <!--Section: Content-->

            <hr class="my-5" />

            <!--Section: Content-->
            <section class="text-center">
                <h4 class="mb-5"><strong>PENGEMBANG SISTEM</strong></h4>
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="img/dosen1.png" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Jemmy Edwin Bororing, S.Kom., M.Eng.</h6>
                                <p class="card-text">
                                    Dosen Pembimbing 1
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="img/image.jpg" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Novita Ick</h5>
                                <p class="card-text">
                                    Programmer
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <img src="img/dosen2.png" class="img-fluid" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Yumarlin MZ, S.Kom., M.Pd., M.Kom.</h6>
                                <p class="card-text">
                                    Dosen Pembimbing 2
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--Section: Content-->
            <hr class="my-5" />
            <!--Section: Content-->
            <section class="mb-5">
                <h4 class="mb-5 text-center"><strong>Jenis Santunan Jasa Raharja</strong></h4>
                <table class="table table-bordered">
                    <thead>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Santunan</th>
                                <th>Darat/Laut</th>
                                <th>Udara</th>
                            </tr>
                        </thead>
                    <tbody>
                        <?php
                        function rupiah($curr)
                        {
                            $hasil = "Rp." . number_format($curr, 0, ',', '.');
                            return $hasil;
                        }
                        $no = 1;
                        $query = "SELECT a.jenis_santunan,id_santunan,(select santunan from tb_santunan where jenis_santunan=a.jenis_santunan AND kategori='Darat/Laut') as darat_laut, (select santunan from tb_santunan where jenis_santunan=a.jenis_santunan AND kategori='Udara') as udara from tb_santunan a group by jenis_santunan;";
                        $sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
                        if (mysqli_num_rows($sql) > 0) {
                            while ($row = mysqli_fetch_array($sql)) {
                        ?>
                                <tr>
                                    <td><?= $no++ ?>.</td>
                                    <td><?= $row['jenis_santunan'] ?></td>
                                    <td><?= rupiah($row['darat_laut']); ?></td>
                                    <td><?= rupiah($row['udara']); ?></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </section>
            <!--Section: Content-->
        </div>
        <!-- Modal Check Pengajuan -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Check Pengajuan Anda</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="">
                            <label for="no_reg">Masukkan No Registrasi Pengajuan</label>
                            <input type="text" id="no_reg" class="form-control">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
                        <button type="button" id="check_pengajuan" class="btn btn-primary">Check Pengajuan</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->
    <!--Footer-->
    <footer class="bg-light text-lg-start">
        <hr class="m-0" />
        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2020 Copyright:
            <a class="text-dark" href="#">Sistem Pakar Ansuransi Jasa Raharja</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer-->
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom scripts -->
    <!-- <script type="text/javascript" src="js/script.js"></script> -->
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('#check_pengajuan').on('click', function() {
            var no_reg = $('#no_reg').val();

            $.ajax({

                url: 'check_data.php',
                method: 'POST',
                data: {
                    noreg: no_reg
                },
                success: function(data) {
                    var data = JSON.parse(data);
                    alert(data.message);
                    window.location.href = 'form/upload.php?id=' + data.id;
                },
                error: function(xhr, status, error) {
                    // Error handling
                }
            })

        })
    })
</script>