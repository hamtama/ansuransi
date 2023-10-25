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
                    <h2>Data Pengajuan</h2>
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
                                            <th>Nama Pengaju</th>
                                            <th>Tempat/Tanggal Lahir</th>
                                            <th>NIK</th>
                                            <th>Alamat</th>
                                            <th>Umur</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Pekerjaan</th>
                                            <th>No. Telp</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
										$no = 1;
										$query = "SELECT (ROW_NUMBER() OVER (Order by id_pengajuan_kb)) as nomor, 
                                        id_pengajuan_kb, no_pengajuan, 
                                         
                                        nama_pengaju_kb, tempat_lhr_pengaju_kb, 
                                        DATE_FORMAT(tgl_lahir_kb, '%d-%m-%Y') as tgl_lahir_kb, 
                                        ktp_pengaju_kb, b.nama as prov, c.nama as kab, d.nama kec, e.nama as kel, alamat_pengaju_kb ,umur_pengaju_kb, jk_pengaju_kb,  
                                        (case when pekerjaan_pengaju_kb='lainnya_kb' then pekerjaan_pengaju_lain_kb else f.pekerjaan end ) as pekerjaan, 
                                                                                
                                        no_telp_pengaju_kb from tb_pengajuan_korban a  
                                        LEFT JOIN wilayah_2020 b ON b.kode = a.id_prov_pengaju_kb
                                        LEFT JOIN wilayah_2020 c ON c.kode = a.id_kab_pengaju_kb 
                                        LEFT JOIN wilayah_2020 d ON d.kode = a.id_kec_pengaju_kb
                                        LEFT JOIN wilayah_2020 e ON e.kode = a.id_kel_pengaju_kb  
                                        LEFT JOIN tb_pekerjaan f ON f.id_pekerjaan = a.pekerjaan_pengaju_kb
                                        LEFT JOIN tb_pengajuan g ON g.id_pengajuan = a.id_pengajuan";
										$sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
										if (mysqli_num_rows($sql) > 0) {
											while ($row = mysqli_fetch_array($sql)) {
										?>
                                        <tr>
                                            <td style="width:10%">
                                                <a class="btn btn-warning btn-xs " href="edit.php?id=<?= $row[1] ?>"><i
                                                        class="fa fa-pencil"></i></a>
                                            </td>
                                            <td><?= $row['nomor'] ?>.</td>
                                            <td><?= $row['no_pengajuan'] ?></td>
                                            <td><?= $row['nama_pengaju_kb'] ?></td>
                                            <td><?= $row['tempat_lhr_pengaju_kb'].",".$row['tgl_lahir_kb'] ?></td>
                                            <td><?= $row['ktp_pengaju_kb'] ?></td>
                                            <td><?= $row['alamat_pengaju_kb'].", ".$row['kel'].", ".$row['kec'].", ".$row['kab'].", ".$row['prov'] ?>
                                            </td>
                                            <td><?= $row['umur_pengaju_kb'] ?></td>
                                            <td><?= $row['jk_pengaju_kb'] ?></td>
                                            <td><?= $row['pekerjaan'] ?></td>
                                            <td><?= $row['no_telp_pengaju_kb'] ?></td>
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
    $('.edit').click(function() {
        var url = "edit.php";
        var id = $(this).attr('id');
        console.log(id);
        //Menggunakan fungsi Ajax untuk Pengambilan Data
        $.ajax({
            url: url,
            type: "post",
            data: {
                id: id
            },
            success: function(data) {
                // $('.fetched-data').html(data); //menampilkan data ke dalam modal
                // $('#myModal').modal('show');
                // document.getElementById("judul").innerHTML = "Edit Data Pengajuan";
                window.location = url;
            }
        });
    });
});
</script>