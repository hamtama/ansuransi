<?php
require_once '../../login/connection.php';
if (isset($_POST['data'])) {
    $data = $_POST['data'];
    
    $sql = "SELECT (ROW_NUMBER() OVER (Order by id_pengajuan)) as nomor, id_pengajuan, no_pengajuan,  
    DATE_FORMAT(tgl_reg, '%d-%m-%Y %H:%i') as tanggal,  nama_pengaju, tempat_lhr_pengaju, 
    DATE_FORMAT(tgl_lahir, '%d-%m-%Y') as tgl_lahir, 
    ktp_pengaju, b.nama as prov, c.nama as kab, d.nama kec, e.nama as kel, alamat_pengaju,umur_pengaju, jk_pengaju,  
    (case when pekerjaan_pengaju='lainnya' then pekerjaan_lain_pengaju else f.pekerjaan end ) as pekerjaan, 
    no_telp_pengaju from tb_pengajuan a  JOIN wilayah_2020 b ON b.kode = a.id_prov_pengaju 
     JOIN wilayah_2020 c ON c.kode = a.id_kab_pengaju 
     JOIN wilayah_2020 d ON d.kode = a.id_kec_pengaju 
     JOIN wilayah_2020 e ON e.kode = a.id_kel_pengaju  
     LEFT JOIN tb_pekerjaan f ON f.id_pekerjaan = a.pekerjaan_pengaju WHERE id_pengajuan ='$data'";

    $result = $mysqli->query($sql);
    foreach ($result as $baris) {
?>
<div class="clearfix">
    <div class="text-center">
        <h4 class="text-black h3  mt-30 mb-0 "><u>DATA PENGAJUAN SANTUNAN JASA
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
            <td>Tempat Tanggal Lahir</td>
            <td><?=$baris['tempat_lhr_pengaju'].",".$baris['tgl_lahir']?></td>
        </tr>
        <tr>
            <td>KTP Pengaju</td>
            <td><?=$baris['ktp_pengaju']?></td>
        </tr>
        <tr>
            <td>Alamat Pengaju</td>
            <td><?=$baris['alamat_pengaju']?>,<?=$baris['kel']?>,<?=$baris['kec']?>, <?=$baris['kab']?>,
                <?=$baris['prov']?></td>
        </tr>
        <tr>
            <td>Umur</td>
            <td><?=$baris['umur_pengaju']?></td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td><?=$baris['jk_pengaju']?></td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td><?=$baris['pekerjaan'] ?></td>
        </tr>
        <tr>
            <td>No. Telp</td>
            <td><?=$baris['no_telp_pengaju']?></td>
        </tr>
    </tbody>
</table>
<?php
}}
?>