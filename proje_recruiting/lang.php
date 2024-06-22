<?php
if ( isset($_GET["lang"]) )  {
	$dil = $_GET["lang"];
} else {
	$lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2);
	if ( $lang == "tr" ) {
		$dil = "tr";
	} elseif ( $lang == "en" ) {
		$dil = "en";
	} else {
		$dil = "en";
	} 		
}
?>
