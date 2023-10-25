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
                    <h2>Data Pengajuan Kecelakaan</h2>
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
                                <table id="datatable-responsive"
                                    class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                    width="100%">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                                            <th>No </th>
                                            <th>No Pengajuan</th>
                                            <th>Tanggal Kejadian</th>
                                            <th>Nama Pengaju</th>
                                            <th>Tempat Kejadian</th>
                                            <th>Pengajuan Santunan</th>
                                            <th>Jenis Kecelakaan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$no = 1;
										$query = "SELECT (ROW_NUMBER() OVER (Order by id_peng_kecelakaan)) as nomor, id_peng_kecelakaan, no_pengajuan, nama_pengaju,
                                         DATE_FORMAT(tgl_kejadian, '%d-%m-%Y %H:%i') as tanggal, tmp_kejadian, ajukan_santunan, kasus_kecelakaan FROM tb_pengajuan_kecelakaan a 
                                         left join tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan 
                                         left join tb_santunan c ON a.ajukan_santunan = c.id_santunan
                                         left join tb_kasus_kecelakaan d ON a.jenis_kecelakaan = d.id_kasus_kecelakaan";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										?>
                                        <tr>
                                            <td style="width:10%">
                                                <a class="btn btn-warning btn-xs" data-toggle="modal" href="#myModal"
                                                    id="custId" data-target="#myModal"
                                                    data-id="<?= $row['id_peng_kecelakaan'] ?>"><i
                                                        class="fa fa-pencil"></i></a>
                                            </td>
                                            <td><?= $row['nomor'] ?>.</td>
                                            <td><?= $row['no_pengajuan'] ?></td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td><?= $row['nama_pengaju'] ?></td>
                                            <td><?= $row['tmp_kejadian']?></td>
                                            <td><?= $row['ajukan_santunan'] ?></td>
                                            <td><?= $row['kasus_kecelakaan'] ?></td>
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
                                                <h4 class="modal-title" id="judul"></h4>
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

<?php
require_once('../../layout/wrapperadmin/footer.php');
?>
<script type="text/javascript">
$(document).ready(function() {
    $('#myModal').on('shown.bs.modal', function(e) {

        $('#myDatepicker2').datetimepicker({
            format: 'DD MM YYYY',
            maxDate: 'now',
        });

        $('#myDatepicker2').on('dp.change', function() {
            var v = $("#myDatepicker2").find("input").val();

            var m = moment(v, 'DD MM YYYY');
            var tanggal = m.locale("id").format("dddd, DD MMMM YYYY");
            $('#show').val(tanggal);
            var dbTanggal = m.locale("id").format("YYYY-MM-DD");
            // console.log(formatted);
            $('#myDatepicker').val(dbTanggal);
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

// EDIT DATA
$(document).ready(function() {
    $('#myModal').on('show.bs.modal', function(e) {
        var rowid = $(e.relatedTarget).data('id');
        //Menggunakan fungsi Ajax untuk Pengambilan Data
        $.ajax({
            type: 'post',
            url: 'edit.php',
            data: 'rowid=' + rowid,
            success: function(data) {
                $('.fetched-data').html(data); //menampilkan data ke dalam modal
                $('.modal-title').text("Edit Data Pengajuan Kecelakaan");
                var g = $("#lihat").val();
                var m = moment(g, 'DD-MM-YYYY');
                var tanggal = m.locale("id").format("dddd, DD MMMM YYYY");
                $('#show').val(tanggal);
                var dbTanggal = m.locale("id").format("YYYY-MM-DD");
                // console.log(formatted);
                $('#myDatepicker').val(dbTanggal);
            }
        });
    });
});
</script>