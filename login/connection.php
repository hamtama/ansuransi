<?php
date_default_timezone_set('Asia/Jakarta');
@session_start();

/*Database Connection Settings */
$userDB		= TRUE;
$host		= 'localhost';
$user 		= 'wesn6693_root';
$pass 		= 'Switchknight123';
$db 		= 'wesn6693_ansuransi';
$mysqli		= new mysqli($host, $user, $pass, $db) or die($mysqli->error);

function base_url($url = null)
{
	$base_url = "https://ansuransi.site/";
	if ($url != null) {
		return $base_url . "/" . $url;
	} else {
		return $base_url;
	}
}
