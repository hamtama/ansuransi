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
                    <h2>Data Pembobotan Santunan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="alert alert-warning" role="alert">
                    Data yang terdapat pada tabel adalah yang sudah mengisi formulir dengan benar serta mengupload
                    berkas pengajuan santunan
                </div>
                <div class="alert alert-primary" role="alert">
                    Data Yang Sudah Dilakukan Pembobotan Akan Tampil Tombol Hapus Data, Klik Tombol Hapus Jika
                    Ingin Mengulangi
                    Pembobotan Ulang Pada Data Pengajuan Santunan.
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
                                            <th>Nama Pengajuan</th>
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
                                                        if(!isset($row2[0])){
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
                                                <a class="btn btn-info btn-xs"
                                                    href="pembobotan.php?id=<?= $row[1] ?>"><i
                                                        class="fa fa-eye"></i></a>
                                                <?php
                                                        $check_pembobotan = mysqli_query($mysqli, "SELECT id_pengajuan FROM tb_pembobotan WHERE id_pengajuan ='$row[2]'");
                                                        while ($row_p = mysqli_fetch_array($check_pembobotan)){
                                                            echo '<button class="btn btn-danger btn-xs"
                                                            onclick="javascript:delete_id('.$row_p[0].')"><i
                                                                class="fa fa-trash"></i></button>';

                                                }
                                                ?>
                                            </td>
                                            <td><?= $row['nomor'] ?>.</td>
                                            <td><?= $row['no_pengajuan'] ?></td>
                                            <td><?= $row['nama_pengaju'] ?></td>
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
function delete_id(id) {
    if (confirm('Anda Serius Untuk Menghapus Data Pembobotan Dan Melakukan Pembobotan Ulang?')) {
        window.location.href = 'hapus.php?delete_id=' + id;
    }
}
</script>