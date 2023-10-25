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
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Data Master</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">DataTable</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <button type="button" class="btn btn-success tambah" id="1"><i class="icon-copy dw dw-add"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Jenis Santunan</h4>
                </div>
                <div class="pb-20">
                    <table class="data-table table stripe hover nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">No</th>
                                <th>Jenis Santunan</th>
                                <th>Darat/Laut</th>
                                <th>Udara</th>
                                <th class="datatable-nosort text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php
                                $no = 1;
                                $sql1 = mysqli_query($mysqli, "SELECT count(*)FROM information_schema.columns WHERE table_schema = 'spk_ansuransi' AND table_name = 'tb_santunan'");
                                $count = mysqli_fetch_array($sql1);
                                $count = $count[0] + 1;
                                $query = "SELECT a.jenis_santunan,id_santunan,(select santunan from tb_santunan where jenis_santunan=a.jenis_santunan AND kategori='Darat/Laut') as darat_laut, (select santunan from tb_santunan where jenis_santunan=a.jenis_santunan AND kategori='Udara') as udara from tb_santunan a group by jenis_santunan;";
                                $sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
                                if (mysqli_num_rows($sql) > 0) {
                                    while ($row = mysqli_fetch_array($sql)) {
                                ?>

                                        <td><?= $no++ ?>.</td>
                                        <td><?= $row['jenis_santunan'] ?></td>
                                        <td><?= rupiah($row['darat_laut']); ?></td>
                                        <td><?= rupiah($row['udara']); ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-xs btn-outline-info" data-toggle="modal" href="#Medium-modal" id="custId" data-target="#Medium-modal" data-id="<?= $row['id_santunan'] ?>"><i class="dw dw-edit2"></i></a>
                                            <button class="btn btn-xs btn-outline-info delete" id="<?= $row['jenis_santunan']; ?>"><i class="dw dw-delete-3"></i></a>
                                        </td>
                            </tr>
                    <?php
                                    }
                                } else {
                                    echo "<tr><td colspan=\"$count\" align=\"center\"> Data Tidak Ditemukan </td></tr>";
                                }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
            <!-- Medium modal -->
            <div class="col-md-4 col-sm-12 mb-30">
                <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="myLargeModalLabel"></h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            <div class="modal-body">

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-wrap pd-20 mb-20 card-box">
            Bootstrap 4 Admin Template By <a href="https://github.com/dropways" target="_blank">Jasa Raharja Apps</a>
        </div>
    </div>
</div>
<?php
require_once('../../layout/wrapperadmin/footer.php');
?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#Medium-modal').on('shown.bs.modal', function(e) {
            $(function() {
                let validator = $('form.needs-validation').jbvalidator({
                    errorMessage: true,
                    successClass: true,
                    language: '<?= base_url(); ?>/assets/src/plugins/jbvalidator/dist/lang/en.json'
                });
            });
        })
    });
    // TAMBAH DATA
    $(document).ready(function() {
        $('.tambah').click(function() {
            var id = $(this).attr('id');
            $('#Medium-modal').modal('show');
            //Menggunakan fungsi Ajax untuk Pengambilan Data
            $.ajax({
                type: 'post',
                url: 'tambah.php',
                data: {
                    id: id
                },
                success: function(data) {
                    $('.modal-body').html(data); //menampilkan data ke dalam modal
                    document.getElementById('myLargeModalLabel').innerHTML = "Tambah Data Santunan";
                }
            });
        });
    });

    // EDIT DATA
    $(document).ready(function() {
        $('#Medium-modal').on('show.bs.modal', function(e) {
            var rowid = $(e.relatedTarget).data('id');
            //Menggunakan fungsi Ajax untuk Pengambilan Data
            $.ajax({
                type: 'post',
                url: 'edit.php',
                data: 'rowid=' + rowid,
                success: function(data) {
                    $('.modal-body').html(data); //menampilkan data ke dalam modal
                    document.getElementById('myLargeModalLabel').innerHTML = "Edit Data Santunan";
                }
            });
        });
    });

    // DELETE DATA
    $(document).ready(function() {
        $('.delete').click(function() {
            var delete_id = $(this).attr('id');
            $('#Medium-modal').modal('show');
            //Menggunakan fungsi Ajax untuk Pengambilan Data
            $.ajax({
                type: 'post',
                url: 'hapus.php',
                data: 'delete_id=' + delete_id,
                success: function(data) {
                    $('.modal-body').html(data); //menampilkan data ke dalam modal
                    document.getElementById('myLargeModalLabel').innerHTML = "Hapus Data Santunan";
                }
            });
        });
    });
</script>