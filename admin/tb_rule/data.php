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
                    <h2>Data Rule</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <button class="btn btn-success tambah" id="01"><i class="fa fa-plus"> Tambah</i></button>
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
                                            <th>Kategori</th>
                                            <th>Gejala 1 </th>
                                            <th>Gejala 2 </th>
                                            <th>Gejala 3 </th>
                                            <th>Gejala 4 </th>
                                            <th>Gejala 5 </th>
                                            <th>Gejala 6 </th>
                                            <th>Gejala 7 </th>
                                            <th>Gejala 8 </th>
                                            <th>Gejala 9 </th>
                                            <th>Gejala 10 </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $abjad = range("a", "k");
                                        $count = count($abjad);
                                        $header = "";
                                        $join = "";
                                        for ($i = 1; $i < $count; $i++) {
                                            if ($i != $count - 1) {
                                                $header .= $abjad[$i] . ".sub_kriteria AS gejala_" . $i . ",";
                                            } else {
                                                $header .= $abjad[$i] . ".sub_kriteria AS gejala_" . $i;
                                            }
                                            $join .= " LEFT JOIN tb_sub_kriteria " . $abjad[$i] . " ON " . $abjad[$i] . ".id_sub_kriteria = a.n_gejala_" . $i;
                                        }
                                        $query = "SELECT kode_rule,id_rule,z.kategori, $header  FROM tb_rule a left join tb_kategori z ON z.id_kategori = a.id_kategori $join order by kode_rule asc";
                                        $sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));
                                        if (mysqli_num_rows($sql) > 0) {
                                            while ($row = mysqli_fetch_array($sql)) {
                                        ?>
                                        <tr>
                                            <td style="width:10%">
                                                <button class="btn btn-danger btn-xs"
                                                    onclick="javascript:delete_id(<?= $row[0] ?>)"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                            <td><?= $row['kode_rule']?></td>
                                            <td><?= $row['kategori'] ?></td>
                                            <td><?= $row['gejala_1'] ?></td>
                                            <td><?= $row['gejala_2'] ?></td>
                                            <td><?= $row['gejala_3'] ?></td>
                                            <td><?= $row['gejala_4'] ?></td>
                                            <td><?= $row['gejala_5'] ?></td>
                                            <td><?= $row['gejala_6'] ?></td>
                                            <td><?= $row['gejala_7'] ?></td>
                                            <td><?= $row['gejala_8'] ?></td>
                                            <td><?= $row['gejala_9'] ?></td>
                                            <td><?= $row['gejala_10'] ?></td>
                                        </tr>
                                        <?php
                                            }
                                        } 
                                        ?>
                                    </tbody>
                                </table>
                                <input type="hidden" id="jum_data" value="<?= mysqli_num_rows($sql); ?>">
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
<script type="text/javascript">
// TAMBAH DATA
$(document).ready(function() {
    $('.tambah').click(function() {
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
                $('#myModal').modal('show');
                document.getElementById("judul").innerHTML = "Tambah Data Rule";
            }
        });
    });
});

$(document).ready(function() {
    var a = $('#jum_data').val();
    console.log(a);
    if (a == 5) {
        $('#01').addClass('d-none');
    }
});

function delete_id(id) {
    if (confirm('Anda Serius Untuk Menghapus Data ?')) {
        window.location.href = 'hapus.php?delete_id=' + id;
    }
}
$(document).ready(function() {
    $('.edit').click(function() {
        var rowid = $(this).attr('id');
        console.log(id_rule);
        console.log(rowid);
        //Menggunakan fungsi Ajax untuk Pengambilan Data
        $.ajax({
            type: 'post',
            url: 'edit.php',
            data: {
                rowid: rowid,
            },
            success: function(data) {
                $('.fetched-data').html(data); //menampilkan data ke dalam modal
                $('#myModal').modal('show');
                document.getElementById("judul").innerHTML = "Edit Data Rule";
            }
        });
    });
});
</script>
<?php
require_once('../../layout/wrapperadmin/footer.php');
?>