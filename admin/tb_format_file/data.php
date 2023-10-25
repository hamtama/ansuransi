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
                    <h2>Data Format File</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <button class="btn btn-success tambah" id="1"><i class="fa fa-plus"> Tambah</i></button>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box">
                                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                                            <th>No </th>
                                            <th>Nama FIle</th>
                                            <th>File</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ket = "";

                                        $query = "SELECT *, (ROW_NUMBER() OVER (Order by id_format_file)) as nomor FROM tb_format_file";
                                        $sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
                                        if (mysqli_num_rows($sql) > 0) {
                                            while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                                <tr>
                                                    <td style="width:10%">
                                                        <button class="btn btn-warning btn-xs edit" data-id="<?= $row['id_format_file'] ?>"><i class="fa fa-pencil text-light"></i></button>
                                                        <button class="btn btn-danger btn-xs" onclick="javascript:delete_id(<?= $row['id_format_file'] ?>)"><i class="fa fa-trash"></i></button>
                                                        <a class="btn btn-success btn-xs" href="download.php?id=<?= $row['id_format_file'] ?>"><i class="fa fa-download">
                                                            </i></a>
                                                        <button class="btn btn-info    btn-xs lihat" data-id="<?= $row['id_format_file'] ?>"><i class=" fa fa-eye"></i></button>
                                                    </td>
                                                    <td><?= $row['nomor'] ?>.</td>
                                                    <td><?= $row['nama_file'] ?></td>
                                                    <td><?= $row['file'] ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title"></h4>
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

<?php
require_once('../../layout/wrapperadmin/footer.php');
?>

<script type="text/javascript">
    //LIHAT DATA
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

    function delete_id(id) {
        if (confirm('Anda Serius Untuk Menghapus Data ?')) {
            window.location.href = 'hapus.php?delete_id=' + id;
        }
    }
    // TAMBAH DATA
    $(document).ready(function() {
        $('.tambah').click(function() {
            $('#myModal').modal('show');
            var id = $(this).attr('id');
            //Menggunakan fungsi Ajax untuk Pengambilan Data
            $.ajax({
                type: 'post',
                url: 'tambah.php',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    $('.modal-title').text('Tambah Data Format File');
                }
            });
        });
    });
    // EDIT DATA
    $(document).ready(function() {
        $('.edit').click(function() {
            var rowid = $(this).attr('data-id');
            //Menggunakan fungsi Ajax untuk Pengambilan Data
            $.ajax({
                type: 'post',
                url: 'edit.php',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    $('.modal-title').text('Edit Data Format File');
                    $('#myModal').modal('show');
                }
            });
        });
    });



    function swalow(bag) {
        swal({
            type: 'error',
            title: 'Oops...',
            text: bag,
        })
    }

    $(document).ready(function() {
        $('#myModal').on('shown.bs.modal', function(e) {

            $('#myDatepicker2').datetimepicker({
                format: 'DD MM YYYY',
                maxDate: 'now',
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
    });
</script>