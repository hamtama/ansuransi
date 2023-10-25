<?php
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($mysqli, "SELECT * FROM tb_upload_file a left join tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan WHERE id_upload_file = '$id'");
    foreach ($query as $baris) {
        $id_pengajuan = $baris['id_pengajuan'];
        $check_data = mysqli_query($mysqli, "SELECT * FROM tb_pembobotan WHERE id_pengajuan = '$id_pengajuan'");
        if (mysqli_num_rows($check_data) == 0) {
            $data_pembobotan = "Data Kosong";
            $btn = "";
        } else {
            $data_pembobotan = "Ada";
            $btn = "d-none";
        }


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
                        <a class="btn btn-success" href="data.php"><i class="fa fa-chevron-left"></i> Kembali </a>
                        <button class="btn btn-info pengajuan" data-toggle="modal" data-target="#myModal" data-id="<?= $id_pengajuan; ?>"><i class="fa fa-file"></i> Data Pengajuan</button>
                        <button class="btn btn-info  kecelakaan" data-toggle="modal" data-target="#myModal" data-id="<?= $id_pengajuan; ?>"><i class="fa fa-file"> Data Kecelakaan</i></button>
                        </td>
                        <div class="x_content">
                            <div class="pd-20 card-box mb-30">
                                <div class="clearfix">
                                    <div class="text-center">
                                        <h4 class="text-black h3  mt-30 mb-0 "><u>PEMBOBOTAN DATA PENGAJUAN SANTUNAN JASA
                                                RAHARJA</u></h4>
                                    </div>
                                </div>
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="card-box">
                                                <!-- <form role="form" action="aksi.php" method="post"> -->
                                                <input type="hidden" name="id_u" value="<?= $id ?>">
                                                <input type="hidden" name="id_p" value="<?= $id_pengajuan ?>">
                                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                                    <?php
                                                    if ($data_pembobotan == "Data Kosong") {
                                                    ?>
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                                                                <th>File </th>
                                                                <th>Nama File</th>
                                                                <th>Bobot</th>
                                                                <th>Penilaian</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>
                                                            <?php
                                                            $tg = 1;
                                                            $query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE Field LIKE '%file%' AND Field <> 'id_upload_file'");
                                                            while ($fc = mysqli_fetch_assoc($query_field)) {
                                                                $fetchCol[$tg] = $fc['Field'];
                                                                $tg++;
                                                            }
                                                            $max = $query_field->num_rows;
                                                            for ($i = 1; $i <= $max; $i++) {
                                                                $check = mysqli_query($mysqli, "SELECT $fetchCol[$i] FROM tb_upload_file WHERE id_upload_file ='$id'");
                                                                while ($row = mysqli_fetch_array($check)) {
                                                                    if (!empty($row[0])) {
                                                                        $r_ket = str_replace("_", " ", $fetchCol[$i]);
                                                                        $h_ket = ucwords($r_ket);

                                                            ?>
                                                                        <tr>
                                                                            <td><?= $i ?>.</td>
                                                                            <td style="width:10%">
                                                                                <button class="btn btn-info btn-xs lihat" data-toggle="modal" id="<?= $id ?>" data-target="#myModal" data-id="<?= $fetchCol[$i] ?>"><i class="fa fa-eye"></i></button>
                                                                            </td>
                                                                            <td><?= $h_ket ?></td>
                                                                            <td><?= $row[0] ?></td>
                                                                            <td><?= $data_pembobotan ?></td>
                                                                            <td>
                                                                                <div class=" field item form-group row">
                                                                                    <select class="form-control form-control-sm" name="<?= $fetchCol[$i] ?>" required>
                                                                                        <option value="">-- Pilih Bobot --</option>
                                                                                        <?php
                                                                                        $sql = mysqli_query($mysqli, "SELECT * FROM tb_bobot order by id_bobot ASC");
                                                                                        while ($row = mysqli_fetch_array($sql)) {
                                                                                            echo '<option value="' . $row[0] . '">' . $row[2] . '</option>';
                                                                                        }
                                                                                        ?>
                                                                                        ?>
                                                                                    </select>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                            <?php
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    <?php
                                                    } elseif ($data_pembobotan == "Ada") {
                                                    ?>
                                                        <thead>
                                                            <tr>
                                                                <th>No.</th>
                                                                <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                                                                <th>File </th>
                                                                <th>Nama File</th>
                                                                <th>Bobot</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $tg = 1;
                                                            $query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE Field LIKE '%file%' AND Field <> 'id_upload_file'");
                                                            while ($fc = mysqli_fetch_assoc($query_field)) {
                                                                $fetchCol[$tg] = $fc['Field'];
                                                                $tg++;
                                                            }
                                                            $max = $query_field->num_rows;
                                                            for ($i = 1; $i <= $max; $i++) {
                                                                $check = mysqli_query($mysqli, "SELECT $fetchCol[$i] FROM tb_upload_file WHERE id_upload_file ='$id'");
                                                                while ($row = mysqli_fetch_array($check)) {
                                                                    if (!empty($row[0])) {
                                                                        $r_ket = str_replace("_", " ", $fetchCol[$i]);
                                                                        $h_ket = ucwords($r_ket);

                                                                        $check_pembobotan = mysqli_query($mysqli, "SELECT $fetchCol[$i] FROM tb_pembobotan WHERE id_pengajuan ='$id_pengajuan'");
                                                                        while ($row_p = mysqli_fetch_array($check_pembobotan)) {
                                                                            // echo $row_p[0];
                                                            ?>
                                                                            <tr>
                                                                                <td><?= $i ?>.</td>
                                                                                <td style="width:10%">
                                                                                    <button class="btn btn-info btn-xs lihat" data-toggle="modal" id="<?= $id ?>" data-target="#myModal" data-id="<?= $fetchCol[$i] ?>"><i class="fa fa-eye"></i></button>
                                                                                </td>
                                                                                <td><?= $h_ket ?></td>
                                                                                <td><?= $row[0] ?></td>
                                                                                <td><?= $row_p[0] ?></td>
                                                                            </tr>
                                                            <?php
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                            ?>
                                                        </tbody>
                                                    <?php
                                                    }
                                                    ?>
                                                </table>
                                                <div class="col-md-12 <?= $btn ?>">
                                                    <button type='submit' class="btn btn-success float-right"><i class="fa fa-save"></i>
                                                        Simpan</button>
                                                </div>
                                                <!-- </form> -->
                                                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="judul"></h4>
                                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="fetched-data">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            </div>
        </div>
        <?php
        require_once('../../layout/wrapperadmin/footer.php');
        ?>
        <script type="text/javascript">
            $('#datatable-responsive').dataTable({
                "pageLength": <?= $max ?>
            });
            $('#datatable-responsive_length').addClass('d-none')
            $(document).ready(function() {
                $('.lihat').click(function() {
                    var id = $(this).attr('id');
                    var kolom = $(this).attr('data-id');
                    console.log(id);
                    //Menggunakan fungsi Ajax untuk Pengambilan Data
                    $.ajax({
                        type: 'post',
                        url: 'showpdf.php',
                        data: {
                            id: id,
                            kolom: kolom
                        },
                        success: function(data) {
                            $('.fetched-data').html(data); //menampilkan data ke dalam modal
                            $('.modal-title').text("Data Upload File");
                            $('#myModal').modal('show');
                        }
                    });
                });
            });

            // MODAL DATA PENGAJUAN
            $(document).ready(function() {
                $('.pengajuan').click(function() {
                    var data = $(this).attr('data-id');
                    console.log(data);
                    //Menggunakan fungsi Ajax untuk Pengambilan Data
                    $.ajax({
                        type: 'post',
                        url: 'data_pengajuan.php',
                        data: {
                            data: data
                        },
                        success: function(data) {
                            $('.fetched-data').html(data); //menampilkan data ke dalam modal
                            $('.modal-title').text("Detail Data Pengajuan");
                            $('#myModal').modal('show');
                        }
                    });
                });
            });

            // MODAL DATA KECELAKAAN
            $(document).ready(function() {
                $('.kecelakaan').click(function() {
                    var data = $(this).attr('data-id');
                    console.log(data);
                    //Menggunakan fungsi Ajax untuk Pengambilan Data
                    $.ajax({
                        type: 'post',
                        url: 'data_kecelakaan.php',
                        data: {
                            data: data
                        },
                        success: function(data) {
                            $('.fetched-data').html(data); //menampilkan data ke dalam modal
                            $('.modal-title').text("Detail Data Kecelakaan");
                            $('#myModal').modal('show');
                        }
                    });
                });
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
<?php }
} ?>