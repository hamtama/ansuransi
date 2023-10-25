<?php
function base_url($url = null)
{
	$base_url = "https://ansuransi.site/";
	if ($url != null) {
		return $base_url . "/" . $url;
	} else {
		return $base_url;
	}
}
