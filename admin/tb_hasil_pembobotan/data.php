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
                    <h2>Data Hasil Pembobotan Santunan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <a href="vector_v.php?id=submit" class="btn btn-success"><i class="fa fa-refresh">
                        Vector V</i></a>
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
                                            <th>No </th>
                                            <th>No Pengajuan</th>
                                            <th>Nama Pengajuan</th>
                                            <th>Vector S</th>
                                            <th>Vektor V</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
										$query = "SELECT * from tb_pembobotan a INNER JOIN tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan ORDER BY vector_v DESC";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										?>
                                        <tr>

                                            <td><?= $no++?>.</td>
                                            <td><?= $row['no_pengajuan'] ?></td>
                                            <td><?= $row['nama_pengaju'] ?></td>
                                            <td><?= $row['vector_s'] ?></td>
                                            <td><?= $row['vector_v'] ?></td>
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
function delete_id(id) {
    if (confirm('Anda Serius Untuk Menghapus Data Pembobotan Dan Melakukan Pembobotan Ulang?')) {
        window.location.href = 'hapus.php?delete_id=' + id;
    }
}
</script>