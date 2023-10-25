<?php
require '../../login/connection.php';
$wil = array(
	2 => array(5, 'Kota/Kabupaten', 'kab'),
	5 => array(8, 'Kecamatan', 'kec'),
	8 => array(13, 'Kelurahan', 'kel')
);
// print($wil);
if (isset($_GET['id']) && !empty($_GET['id'])) {
	$n = strlen($_GET['id']);
	$id = $_GET['id'];
	$o = $wil[$n][0];
	$query = mysqli_query($mysqli, "SELECT * FROM wilayah_2020 WHERE LEFT(kode,$n)='$id' AND CHAR_LENGTH(kode)=$o ORDER BY nama");

	$resultHtml .= '<option value="">Pilih ' . $wil[$n][1] . '</option>';
	while ($d = mysqli_fetch_array($query))
		$resultHtml .= '<option value="' . $d['kode'] . '>' . $d['nama'] . '</option>';
} else {
	$resultHtml = '
	<script>
		var my_ajax = do_ajax();
		var ids;
		var wil = new Array("kab", "kec", "kel");

		function ajax(id) {
			if (id.length < 13) {
				ids = id;
				var url = "?id=" + id + "&sid=" + Math.random();
				my_ajax.onreadystatechange = stateChanged;
				my_ajax.open("GET", url, true);
				my_ajax.send(null);
			}
		}

		function do_ajax() {
			if (window.XMLHttpRequest) return new XMLHttpRequest();
			if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
			return null;
		}
		
		function stateChanged() {
			var n = ids.length;
			var w = (n == 2 ? wil[0] : (n == 5 ? wil[1] : wil[2]));
			var data;
			if (my_ajax.readyState == 4) {
				data = my_ajax.responseText;
				document.getElementById(w).innerHTML = data.length >= 0 ? data : "<option selected>Pilih Kota/Kab</option>";
				<?php foreach ($wil as $k => $w) : ?>
					document.getElementById("<?php echo $w[2]; ?>_box").style.display = (n > <?php echo $k - 1; ?>) ? "table-row" : "none";
				<?php endforeach; ?>
			}
		}
	</script>';

	$resultHtml = '<div class="form-group row">';
	$resultHtml .= '<label class="col-sm-12 col-md-3 col-form-label required">Alamat</label>';
	$resultHtml .= '<div class="col-sm-12 col-md-4">';
	$resultHtml .= '<select class="form-control" id="prov" name="prov" onchange="ajax(this.value)">';
	$resultHtml .= '<option value="">Provinsi</option>';


	$query = mysqli_query($mysqli, "SELECT kode,nama FROM wilayah_2020 WHERE CHAR_LENGTH(kode)=2 ORDER BY nama");
	// $query->execute();
	while ($data = mysqli_fetch_array($query))
		$resultHtml .= '<option value="' . $data['kode'] . '">' . $data['nama'] . '</option>';

	$resultHtml .= '<select>';
	$resultHtml .= '</div></div>';
	foreach ($wil as $w) :
		$resultHtml .= '<div class="form-group row">';
		$resultHtml .= '<div class="col-sm-12 col-md-4">';
		$resultHtml .= '<select class="form-control" id="' . $w[2] . '" name="' . $w[2] . '" onchange="ajax(this.value)">';
		$resultHtml .= '<option value="">Pilih ' . $w[1] . '</option>';
		$resultHtml .= '</select>';
		$resultHtml .= '</div>';
		$resultHtml .= '</div>';

	endforeach;
}

echo json_encode($resultHtml);
