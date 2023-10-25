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
                    <h2>Data Pengajuan Upload File</h2>
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
                                            <th>Tempat Pengajuan</th>
                                            <th>Pengajuan Santunan</th>
                                            <th>Jenis Kecelakaan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$ket = "";
                                        
										$query = "SELECT (ROW_NUMBER() OVER (Order by id_upload_file)) as nomor, id_upload_file, a.id_pengajuan, no_pengajuan, nama_pengaju,
                                        tmp_kejadian, ajukan_santunan, kasus_kecelakaan FROM tb_upload_file a 
                                        left join tb_pengajuan_kecelakaan d ON d.id_pengajuan = a.id_pengajuan
                                        left join tb_kasus_kecelakaan e ON d.jenis_kecelakaan = e.id_kasus_kecelakaan
                                        left join tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan 
                                        left join tb_santunan c ON d.ajukan_santunan = c.id_santunan";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
                                                $id_upload = $row['id_upload_file'];
                                                $query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE Field LIKE '%file%' AND Field <> 'id_upload_file' AND Field NOT LIKE '%tambahan%'");
                                                $count =  mysqli_num_rows($query_field);
                                                while($fc = mysqli_fetch_array($query_field)){
                                                    $i = 1;
                                                    $check = mysqli_query($mysqli, "SELECT $fc[0] FROM tb_upload_file WHERE id_upload_file ='$id_upload'");
                                                    while($row2 = mysqli_fetch_array($check)){
                                                        if($row2[0] == ""){
                                                            $r_ket = str_replace("_"," ",$fc[0]);
                                                            $h_ket = ucwords($r_ket);
                                                            
                                                            $ket .= $h_ket." ,";
                                                            $i .= $i+1;
                                                        } else {
                                                            $ket = "Data Terpenuhi";
                                                        }
                                                    }
                                                }
                                                if($i > 5){
                                                    $ket = "Terdapat Banyak File Yang Belum Terpenuhi. Silahkan Lengkapi";
                                                } else {
                                                    $ket = $ket;
                                                }
										?>
                                        <tr>
                                            <td style="width:10%">
                                                <a class="btn btn-warning btn-xs" href="edit.php?id=<?= $row[1] ?>"><i
                                                        class="fa fa-pencil"></i></a>
                                            </td>
                                            <td><?= $row['nomor'] ?>.</td>
                                            <td><?= $row['no_pengajuan'] ?></td>
                                            <td><?= $row['tmp_kejadian'] ?></td>
                                            <td><?= $row['ajukan_santunan'] ?></td>
                                            <td><?= $row['kasus_kecelakaan'] ?></td>
                                            <td><?= $ket?></td>
                                        </tr>
                                        <?php
											}
										} 
										?>
                                    </tbody>
                                </table>
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
</script>