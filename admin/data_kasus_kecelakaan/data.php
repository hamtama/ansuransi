<?php
require_once('../../layout/wrapperadmin/head.php');
?>
<style type="text/css">
    table#datatabel>thead .sorting:before,
    table#datatabel>thead .sorting:after,
    table#datatabel>thead .sorting_asc:before,
    table#datatabel>thead .sorting_asc:after,
    table#datatabel>thead .sorting_desc:before,
    table#datatabel>thead .sorting_desc:after,
    table#datatabel>thead .sorting_asc_disabled:before,
    table#datatabel>thead .sorting_asc_disabled:after,
    table#datatabel>thead .sorting_desc_disabled:before,
    table#datatabel>thead .sorting_desc_disabled:after {
        bottom: 0em;
    }

    table#datatabel>tbody tr td:nth-child(1) {
        width: 7% !important;
        min-width: 7% !important;
        padding: 10px !important;
    }

    table#datatabel>tbody tr td:nth-child(2) {
        width: 20% !important;
        min-width: 20% !important;
        padding: 10px !important;
    }

    table#datatabel>tbody tr td:nth-child(3) {
        width: 58% !important;
        min-width: 58% !important;
        padding: 10px !important;
    }

    table#datatabel>tbody tr td:nth-child(4) {
        width: 15% !important;
        min-width: 15% !important;
        padding: 10px !important;
    }
</style>
<?php
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
                            <h4>Data Kasus Kecelakaan</h4>
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
                    <h4 class="text-blue h4">Data Kasus Kecelakaan</h4>
                </div>
                <div class="pb-20">
                    <table id="datatabel" class="data-table table-stripe hover" width="100%">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort align-middle">No</th>
                                <th class="text-center">Kategori Kecelakaan</th>
                                <th class="text-center">Kasus Kecelakaan</th>
                                <th class="datatable-nosort align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <!-- Simple Datatable End -->
            <!-- Medium modal -->
            <!-- <div class="col-md-4 col-sm-12 mb-30"> -->
            <div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header d-flex justify-content-center">
                            <h4 class="modal-title" id="myLargeModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            <form id="kskec" class="needs-validation" novalidate>
                                <div class="form-group row">
                                    <label class="col-sm-12 col-form-label">Kategori Kecelakaan</label>
                                    <div id="pilihKategori" class="col-sm-12"></div>
                                </div>
                                <div class="form-group">
                                    <label>Kasus Kecelakaan</label>
                                    <textarea name="kasus" id="kasus" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-6 offset-md-3">
                                        <input type="hidden" id="mode" name="mode" value="" />
                                        <input type="hidden" id="id" name="id" value="" />
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="simpan" class="btn btn-success"><i class="fa fa-send"></i> Simpan</button>
                            <button type="button" id="batal" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- </div> -->
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
    var myModal = new bootstrap.Modal(document.getElementById('Medium-modal'), {}),
        tabel = null;

    function clear() {
        $.post("getCategory.php", {
            data: 'dummy'
        }, function(data) {
            $('#pilihKategori').html(JSON.parse(data));
        });
    }
    $(document).ready(function() {
        clear();
        tabel = $('#datatabel').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "responsive": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "query.php",
                "type": "POST"
            },
            "deferRender": true,
            "aLengthMenu": [
                [10, 25, 50],
                [10, 25, 50]
            ],
            "columnDefs": [{
                "defaultContent": "-",
                "targets": "_all"
            }],
            "columns": [{
                    "data": "nomor",
                    "className": "text-center"
                },
                {
                    "data": "kategori",
                    "className": "text-start"
                },
                {
                    "data": "kasus_kecelakaan"

                },
                {
                    "render": function(data, type, row) {
                        var html = '<input type="hidden" name="id_kasus" value="' + row.id_kasus_kecelakaan + '"/>'
                        html += '<input type="hidden" name="id_cat" value="' + row.id_kategori + '"/>'
                        html += '<button class="btn btn-xs btn-outline-info editBtn"><i class="dw dw-edit2"></i></button>'
                        html += '<button class="btn btn-xs btn-outline-info deleteBtn"><i class="dw dw-delete-3"></i></button>'

                        return html
                    },
                    "className": "text-center"
                },
            ],
        });

        $('#datatabel tbody').on('click', '.editBtn', function() {
            $('#mode').val("update");
            $('#myLargeModalLabel').text('Edit Data Kasus Kecelakaan');
            var data = ($('#datatabel').hasClass('collapsed')) ? tabel.row($(this).closest('tr').index() - 1).data() : tabel.row($(this).closest('tr').index()).data();
            var idKasus = $(this).closest('tr').find('td input[name="id_kasus"]').val();
            var idCat = $(this).closest('tr').find('td input[name="id_cat"]').val();
            $('#pilihKategori>select').addClass('is-valid');
            $('#id').val(idKasus);
            $('#kasus').addClass('is-valid');
            $('#kasus').val(data.kasus_kecelakaan);
            $.post("getCategory.php", {
                id: idCat,
                selected: data.kategori
            }, function(data) {
                $('#pilihKategori').html(JSON.parse(data));
            });
            myModal.toggle();
            $("#batal").on('click', function() {
                myModal.toggle();
            });
        });

        $('#datatabel tbody').on('click', '.deleteBtn', function() {
            var data = ($('#datatabel').hasClass('collapsed')) ? tabel.row($(this).closest('tr').index() - 1).data() : tabel.row($(this).closest('tr').index()).data();
            var idKasus = $(this).closest('tr').find('td input[name="id_kasus"]').val();
            if (confirm("Hapus data kategori : \n'" + data.kategori + "'?") === true) {
                $.post("crudData.php", {
                    id: idKasus,
                    mode: "delete"
                }, function(data) {
                    if (JSON.parse(data) === true) {
                        alert("Data berhasil dihapus!");
                    } else {
                        alert(JSON.parse(data));
                    }
                    tabel.draw();
                });
            }
        });

        $('.tambah').click(function() {
            $('#mode').val("create");
            $('#id').val("");
            $('#myLargeModalLabel').text('Tambah Data Kasus Kecelakaan');
            myModal.toggle();
            $("#batal").on('click', function() {
                myModal.toggle();
            });
        });

        $('#simpan').click(function() {
            if ($('#kategori').hasClass('is-valid') && $('#kasus').hasClass('is-valid')) {
                $('#kskec').addClass('was-validated');
                $('#kskec').submit();
            }
        });

        $('#kskec').on('submit', function(e) {
            var str = $(this).serialize();
            var opt = ($('#mode').val() === "create") ? "Tambah" : "Update";
            e.preventDefault();
            myModal.toggle();
            $.post("crudData.php", str, function(data) {
                if (data === true) {
                    alert(opt + " data berhasil!");
                    tabel.draw();
                }
            });
        });

        $('#Medium-modal').on('hidden.bs.modal', function() {
            $('#kasus').removeClass('is-valid');
            $('#kasus').val('');
            tabel.draw();
            clear();
        });

        $('#Medium-modal').on('shown.bs.modal', function(e) {
            $(function() {
                let validator = $('form.needs-validation').jbvalidator({
                    errorMessage: true,
                    successClass: true,
                    language: '<?= base_url(); ?>/assets/src/plugins/jbvalidator/dist/lang/en.json'
                });
            });
        });
    });
</script>