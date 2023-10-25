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
                        <button type="button" class="btn btn-success tambah"><i class="icon-copy dw dw-add"></i> Tambah</button>
                    </div>
                </div>
            </div>
            <!-- Simple Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">Data Jenis Pekerjaan</h4>
                </div>
                <div class="pb-20">
                    <table id="datatabel" class="data-table table stripe hover" width="100%">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort align-middle ">No</th>
                                <th class="align-middle">Jenis Pekerjaan</th>
                                <th class="datatable-nosort text-center">Action</th>
                            </tr>

                        </thead>
                        <tbody></tbody>
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
                                <form id="form_pekerjaan" class="needs-validation" novalidate>
                                    <div class="form-group">
                                        <label class="col-sm-12 col-form-label required pl-0">Data Jenis Pekerjaan</label>
                                        <input type="text" id="pekerjaan" name="pekerjaan" class="form-control" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="mode" name="mode" value="" />
                                        <input type="hidden" id="id" name="id" value="" />
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
    var myModal = new bootstrap.Modal(document.getElementById('Medium-modal'), {}),
        tabel = null;

    $(document).ready(function() {
        // clear();
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
                    "data": "pekerjaan",
                    "className": "text-start"
                },
                {
                    "render": function(data, type, row) {
                        var html = '<input type="hidden" name="id_pekerjaan" value="' + row.id_pekerjaan + '"/>'
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
            $('#myLargeModalLabel').text('Edit Data Pekerjaan');
            var data = ($('#datatabel').hasClass('collapsed')) ? tabel.row($(this).closest('tr').index() - 1).data() : tabel.row($(this).closest('tr').index()).data();
            var idpekerjaan = $(this).closest('tr').find('td input[name="id_pekerjaan"]').val();
            $('#id').val(idpekerjaan);
            $('#pekerjaan').addClass('is-valid');
            $('#pekerjaan').val(data.pekerjaan);

            myModal.toggle();
            $("#batal").on('click', function() {
                myModal.toggle();
            });
        });

        $('#datatabel tbody').on('click', '.deleteBtn', function() {
            var data = ($('#datatabel').hasClass('collapsed')) ? tabel.row($(this).closest('tr').index() - 1).data() : tabel.row($(this).closest('tr').index()).data();
            var idpekerjaan = $(this).closest('tr').find('td input[name="id_pekerjaan"]').val();
            if (confirm("Hapus data Jenis Pekerjaan : \n'" + data.pekerjaan + "'?") === true) {
                $.post("crudData.php", {
                    id: idpekerjaan,
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
            $('#myLargeModalLabel').text('Tambah Data Jenis Pekerjaan');
            myModal.toggle();
            $("#batal").on('click', function() {
                myModal.toggle();
            });
        });

        $('#simpan').click(function() {
            if ($('#pekerjaan').hasClass('is-valid')) {
                $('#form_pekerjaan').addClass('was-validated');
                $('#form_pekerjaan').submit();
            }
        });

        $('#form_pekerjaan').on('submit', function(e) {
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
            $('#pekerjaan').removeClass('is-valid');
            $('#pekerjaan').val('');
            tabel.draw();
            // clear();
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