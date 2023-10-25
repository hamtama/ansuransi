<?php
require_once('../../layout/wrapperadmin/head.php');
require_once('../../layout/wrapperadmin/sidebar.php');
require_once('../../layout/wrapperadmin/header.php');
require_once('../../layout/wrapperadmin/content.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($mysqli, "SELECT * FROM tb_upload_file a left join tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan WHERE id_upload_file = '$id'");
    foreach ($query as $baris) {
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
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;"><i class="fa fa-cog"></i></th>
                                                    <th>No </th>
                                                    <th>Nama File</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $tg = 1;
                                                $query_field = mysqli_query($mysqli, "SHOW COLUMNS FROM tb_upload_file WHERE Field LIKE '%file%' AND Field <> 'id_upload_file'");
                                                while($fc = mysqli_fetch_assoc($query_field)){
                                                    $fetchCol[$tg] = $fc['Field'];
                                                    $tg++;
                                                }
                                                $max = $query_field->num_rows;
                                                    for ($i=1 ;$i<=$max; $i++){
                                                        $check = mysqli_query($mysqli, "SELECT $fetchCol[$i] FROM tb_upload_file WHERE id_upload_file ='$id'");
                                                        while ($row = mysqli_fetch_array($check)){
                                                            $r_ket = str_replace("_"," ",$fetchCol[$i]);
                                                            $h_ket = ucwords($r_ket);
                                                            echo '
                                                                <tr>
                                                                <td style="width:10%">
                                                                <button class="btn btn-warning btn-xs edit" data-toggle="modal"
                                                                    id="'.$id.'" data-target="#myModal"
                                                                    data-id="'.$fetchCol[$i].'"><i class="fa fa-pencil"></i></button>
                                                                    <button class="btn btn-info btn-xs lihat" data-toggle="modal"
                                                                    id="'.$id.'" data-target="#myModal"
                                                                    data-id="'.$fetchCol[$i].'"><i class="fa fa-eye"></i></button>
                                                                </td>
                                                                <td>'.$h_ket.'</td>
                                                                <td>'.$row[0].'</td>
                                                                </tr>
                                                                ';
                                                        }
                                                    }
                                                    ?>
                                            </tbody>
                                        </table>
                                        <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1"
                                            role="dialog" aria-hidden="true">
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
    </div>
</div>
<?php
require_once('../../layout/wrapperadmin/footer.php');
?>
<script type="text/javascript">
// EDIT DATA
$(document).ready(function() {
    $('.edit').click(function() {

        var id = $(this).attr('id');
        var kolom = $(this).attr('data-id');
        console.log(id);
        //Menggunakan fungsi Ajax untuk Pengambilan Data
        $.ajax({
            type: 'post',
            url: 'edit_pdf.php',
            data: {
                id: id,
                kolom: kolom
            },
            success: function(data) {
                $('.fetched-data').html(data); //menampilkan data ke dalam modal
                $('.modal-title').text("Edit Data Upload File");
                $('#myModal').modal('show');
            }
        });
    });
});

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

// VALIDASI
$('#myModal').on('shown.bs.modal', function(e) {
    $(function() {
        let validator = $('form.needs-validation').jbvalidator({
            errorMessage: true,
            successClass: true,
            language: '<?= base_url(); ?>/assets/vendors/jbvalidator/dist/lang/en.json'
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

$('#myModal').on('shown.bs.modal', function(e) {
    $(document).on('change', "input[type='file']", function() {
        // $("input[type='file']").on('change', function() {
        var kelas = $(this).attr('id');
        var a = ext = $('#' + kelas).val();
        var ext = $('#' + kelas).val().split('.').pop().toLowerCase();
        console.log(ext);
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
});
</script>
<?php }} ?>