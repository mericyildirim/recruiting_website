﻿<?php
include('../baglan.php');

function buyuk_harf($str) {
	$str = str_replace(array('i', 'ı', 'ü', 'ğ', 'ş', 'ö', 'ç'), array('İ', 'I', 'Ü', 'Ğ', 'Ş', 'Ö', 'Ç'), $str);
	return strtoupper($str);
	}

function yonlen($adres) { 
  $y = "<script language='JavaScript'>window.location.href='".$adres."'</script>"; 
  return $y;
  }

function yonlen_zamanli($adres,$zaman) { 
  $y = "<script language='JavaScript'>
		setTimeout(function () { 
			window.location.href= '".$adres."'; // 
		},".$zaman."); // seconds
		</script>";
  return $y;  
  }
  
function yetki_seviyesi($kid) { 
	global $conn;
  	$sorgu = mysqli_query($conn,"select * from uyeler where id='$kid' ");
    $satir = mysqli_fetch_array($sorgu);
	$uyelik_turu = $satir['uyelik_turu'];
	if ( $uyelik_turu == 1  )
		$ys = 2;
	elseif ( $uyelik_turu == 2 or $uyelik_turu == 3  )
		$ys = 1;
	else {
		$ys = 0;
	}
	return $ys;
  }
  
function yazdir_yetkisiz_islem() { 
		echo "
		<center>
		<img src='admin_img/hata.png' height=64 width=64 /><p>
		<h4>Geçersiz bir istekte bulundunuz</h4>
		</center>";
  }
  

 ?>