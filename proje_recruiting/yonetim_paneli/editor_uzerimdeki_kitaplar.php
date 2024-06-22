<?php
include_once('editor_fonks.php');
include_once('editor_ses_kontrol.php');
	if ( $yetki_seviyesi < 1 ) {
		yazdir_yetkisiz_islem();
		die;
	}


