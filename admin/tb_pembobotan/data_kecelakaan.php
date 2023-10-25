<?php
require_once '../../login/connection.php';
if (isset($_POST['data'])) {
    $data = $_POST['data'];

    $sql = "SELECT (ROW_NUMBER() OVER (Order by id_peng_kecelakaan)) as nomor, id_peng_kecelakaan, b.id_pengajuan, no_pengajuan, nama_pengaju,
    DATE_FORMAT(tgl_kejadian, '%d-%m-%Y %H:%i') as tanggal, tmp_kejadian, ajukan_santunan, kasus_kecelakaan FROM tb_pengajuan_kecelakaan a 
    left join tb_pengajuan b ON a.id_pengajuan = b.id_pengajuan 
    left join tb_santunan c ON a.ajukan_santunan = c.id_santunan
    left join tb_kasus_kecelakaan d ON a.jenis_kecelakaan = d.id_kasus_kecelakaan WHERE b.id_pengajuan ='$data'";
    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
?>
<div class="clearfix">
    <div class="text-center">
        <h4 class="text-black h3  mt-30 mb-0 "><u>DATA KECELAKAAN SANTUNAN JASA
                RAHARJA</u></h4>
    </div>
</div>
<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
    width="100%">
    <thead>
        <tr>
            <th>Kolom</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>No. Pengajuan</td>
            <td><?=$baris['no_pengajuan'];?></td>
        </tr>
        <tr>
            <td>Tanggal</td>
            <td><?=$baris['tanggal']?></td>
        </tr>
        <tr>
            <td>Nama Pengaju</td>
            <td><?=$baris['nama_pengaju']?></td>
        </tr>
        <tr>
            <td>Tempat Tempat Kejadian</td>
            <td><?=$baris['tmp_kejadian'].",".$baris['tgl_lahir']?></td>
        </tr>
        <tr>
            <td>Pengajuan Santunan</td>
            <td><?=$baris['ajukan_santunan']?></td>
        </tr>
        <tr>
            <td>Kasus Kecelakaan</td>
            <td><?=$baris['kasus_kecelakaan']?></td>
        </tr>

    </tbody>
</table>
<?php
}}
?>