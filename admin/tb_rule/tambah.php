    <?php
    require_once('../../login/connection.php');
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    ?>
    <form role="form" action="aksitambah.php" method="post" name="add_name" id="add_name">
        <div class="form-group field item row">
            <label for="nama_kategori" class="col-form-label col-md-3 col-sm-3 label-align">Kategori<span
                    class="required">*</span></label>
            <div class="col-md-9 col-sm-9">
                <select class="form-control has-feedback-left" name="kategori" id="kategori" required>
                    <?php
                        $query_3 = "SELECT * FROM tb_kategori";
                        $sql_3 = mysqli_query($mysqli, $query_3) or die(mysqli_error($query_3));
                        echo '<option value="">-- Pilih Kategori --</option>';
                        while ($row3 = mysqli_fetch_array($sql_3)) {
                            echo '<option value="' . $row3['id_kategori'] . '">' . $row3['kategori'] . '</option>';
                        }
                        ?>
                </select>
                <span class="fa fa-cogs form-control-feedback left"> </span>
            </div>
        </div>
        <?php
            $i = 1;
            $query = "SELECT * FROM tb_kriteria Order By id_kriteria ASC";
            $sql = mysqli_query($mysqli, $query) or die(mysqli_error($query));

            while ($row = mysqli_fetch_array($sql)) {
                $id_kriteria =  $row['id_kriteria'];
            ?>
        <!-- <input type="checkbox" checked class="d-none" name="id_kriteria[]" value="<?= $id_kriteria ?>"> -->
        <div class="form-group field item row">
            <label for="nama_kategori" class="col-form-label col-md-3 col-sm-3 label-align">Rule<?= $i++ ?> <span
                    class="required">*</span></label>
            <div class="col-md-9 col-sm-9">
                <select class="form-control has-feedback-left" name="kriteria[]" id="kriteria<?= $id_kriteria ?>"
                    required>
                    <?php
                            $query_2 = "SELECT * FROM tb_sub_kriteria a left join tb_kriteria b ON b.id_kriteria = a.id_kriteria 
                            left join tb_skala c ON c.id_skala = a.id_skala where a.id_kriteria='$id_kriteria'";
                            $sql_2 = mysqli_query($mysqli, $query_2) or die(mysqli_error($query_2));
                            echo '<option value="">' . $row['kriteria'] . '</option>';
                            while ($row2 = mysqli_fetch_array($sql_2)) {
                                echo '<option value="' . $row2['id_sub_kriteria'] . '">' . $row2['sub_kriteria'] . '</option>';
                            }
                            ?>
                </select>
                <span class="fa fa-cogs form-control-feedback left"> </span>
            </div>
        </div>
        <?php
            }
            ?>
        <div class="form-group">
            <div class="col-md-6 offset-md-3">
                <input type="hidden" id="masuk" name="ninja" value="mbuh">
                <button type='reset' class="btn btn-danger" id="reset">Reset</button>
                <input type='submit' name="submit" class="btn btn-primary" id="submit">Simpan</button>
            </div>
        </div>
    </form>
    <script src="../../assets/vendors/validator/multifield.js"></script>
    <script src="../../assets/vendors/validator/validator.js"></script>
    <script type="text/javascript">
$('#reset').click(function() {
    $('#nama_kasus').removeAttr('disabled');
});

// initialize a validator instance from the "FormValidator" constructor.
// A "<form>" element is optionally passed as an argument, but is not a must
var validator = new FormValidator({
    "events": ['blur', 'input', 'change']
}, document.forms[0]);
// on form "submit" event
document.forms[0].onsubmit = function(e) {
    var submit = true,
        validatorResult = validator.checkAll(this);
    console.log(validatorResult);
    return !!validatorResult.valid;
};
// on form "reset" event
document.forms[0].onreset = function(e) {
    validator.reset();
};
// stuff related ONLY for this demo page:
$('.toggleValidationTooltips').change(function() {
    validator.settings.alerts = !this.checked;
    if (this.checked)
        $('form .alert').remove();
}).prop('checked', false);
    </script>
    <?php
    }
    ?>