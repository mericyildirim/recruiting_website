<?php
$jsonTR = @file_get_contents('languages/lang_tr.json');
$jsonEN = @file_get_contents('languages/lang_en.json');
function ml_return($dil,$metin){
	global $jsonTR;
	global $jsonEN;
	if ( $dil == "tr" ) {
		$metinler = json_decode($jsonTR, true);	
	}
	elseif ( $dil == "en"  ) {
		$metinler = json_decode($jsonEN, true);
	}
		if ( is_array($metin) ) {
			$dizi = $metin;
			//print_r($dizi);
			$ilkAnahtar = array_keys($dizi)[0];
			$d_n = count($dizi);			
			if (array_key_exists($ilkAnahtar, $metinler)) {
			//	echo $metinler[$ilkAnahtar];
				if ( $d_n == 2  ) {
					$d1 = $dizi['d1'];
					$sonuc_metin = str_replace("{deger1}", $d1, $metinler[$ilkAnahtar]);
				} elseif ( $d_n == 3 ) {
					$d1 = $dizi['d1'];   
					$d2 = $dizi['d2'];
					$sonuc_metin = str_replace(array("{deger1}","{deger2}"), array($d1,$d2), $metinler[$ilkAnahtar]);
				}
			} else {
				$sonuc_metin = "no translation yet";				
			}				
		} else {
			if (array_key_exists($metin, $metinler)) {
			       $sonuc_metin = $metinler[$metin];
			} else {
				if ( is_numeric($metin)) {
					$sonuc_metin = $metin;
				}
				else {
					$sonuc_metin = "!!!".$metin;
				}
			}
		} 
	return $sonuc_metin;
}
function ml_yaz($dil,$metin){
	$ml_metin = ml_return($dil,$metin);
	echo $ml_metin;
}
?>