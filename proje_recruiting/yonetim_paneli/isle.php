<?php
@session_start();

include_once('../baglan.php');
include_once('editor_fonks.php');
include_once('editor_fonks_mail.php');

$ip = $_SERVER['REMOTE_ADDR'];  
$islem = $_REQUEST['islem'];
date_default_timezone_set('Europe/Istanbul');

//echo $islem;

if ( $islem == 'giris_kontrol'  ){

$kullanici = mysqli_real_escape_string($conn,@$_POST['kullanici']);
$kod= mysqli_real_escape_string($conn,@$_POST['kod']);
$sifre = mysqli_real_escape_string($conn,@$_POST['sifre']);
$dkod= $_SESSION["dogrulamakodu"]; 


if ( buyuk_harf($kod) != $dkod) {
		echo "<center><img src='admin_img/hata.png' width='24' height='24'> <br>";
		echo "<font color='red'>Doğrulama Kodu Yanlış</font></center>";
        die;
}

$sorgu = mysqli_query($conn,"Select * from uyeler where mail='$kullanici'");
$say_uye = mysqli_num_rows($sorgu);

if (  $say_uye > 0  ) {
    $satir = mysqli_fetch_array($sorgu);
    $d_sifre = $satir['sifre'];
    echo $d_sifre."<br>";
	echo md5(sha1(sha1(sha1(md5('deneme')))));
}

if (  $say_uye == 0 ) {
		echo "<center><img src='admin_img/hata.png' width='24' height='24'> <br>";
		echo "<font color='red'>Kullanıcı adı yanlış</font></center>";	
} elseif (  md5(sha1(sha1(sha1(md5($sifre))))) != $d_sifre  ) {
		echo "<center><img src='admin_img/hata.png' width='24' height='24'> <br>";
		echo "<font color='red'>Kullanıcı adı veya şifre yanlış</font></center>";
} else {
	 $u = $satir['id'];
	 $_SESSION["giris_yapan_uye"] = $u;
 	 mysqli_query($conn,"update uyeler set giris_sayisi=giris_sayisi + 1 where id='$u'");
	 
	 echo yonlen('editor_index.php'); 
}

} 
elseif ( $islem == 'uye_ol_form'  ){

$ad = buyuk_harf(mysqli_real_escape_string($conn,@$_POST['ad']));
$soyad = buyuk_harf(mysqli_real_escape_string($conn,@$_POST['soyad']));
$email = strtolower(mysqli_real_escape_string($conn,@$_POST['e-mail']));
$tel = mysqli_real_escape_string($conn,@$_POST['tel']);
$cinsiyet = @$_POST['cinsiyet'];
$dtarih = mysqli_real_escape_string($conn,@$_POST['dtarih']);

//$tarih = date("Y-m-d H:i:s");

$md5yap=md5(rand(0,999999));
$sifre = strtoupper(substr($md5yap, 8, 6));
$db_sifre = md5(sha1(sha1(sha1(md5($sifre)))));

	$sorgu_kontrol = mysqli_query($conn,"select * from uyeler where mail='$email'");
	$say_kontrol = mysqli_num_rows($sorgu_kontrol);
	if ( $say_kontrol > 0  ) {
		echo "<center><img src='admin_img/hata.png' width='24' height='24'> <br>";
		echo "<font color='red'>Girilen mail adresi sistemde kayıtlıdır.<br>Şifremi unuttum bağlantısını kullanınız.</font></center>";
		die();
	}

	$sql = "Insert into uyeler (adi, email, cinsiyet, sifre, uyelik_turu, mail, tel, dtarih, ip  ) 
			values 
			(	'$ad', 
				'$soyad', 
				'$cinsiyet',
				'$db_sifre',
				'2',
				'$email', 
				'$tel' ,
				'$dtarih', 
				'$ip'  )";	
//	echo $sql;
	mysqli_query($conn,$sql);



			echo "<center><img src='admin_img/ok.png' width='24' height='24'> <br>";
			echo "<p style='color: blue;'>Üyelik İşleminiz Tamamlandı!!! <br> Şifre için mail adresinizi kontrol ederek giriş yapabilirsiniz. </p></center>";
			
			$icerik ="işe Alım Kayıt İşleminiz Tamamlanmıştır. <p>
			İşe Alım üyelik bilgileriniz :  <p>
			<ul>
			<li>Ad : $ad </li>
			<li>Soyad : $soyad </li>
			<li>Telefon : $tel </li>		
			<li>E-mail : $email </li>
			<li>Şifre : $sifre </li>
			</ul>";
			
			// echo $icerik;
			
	//	mail_gonder($email,$icerik);
	mail_gonder('İşe Alım Üyelik Bilgileri',$icerik,array($email));
	
}

elseif ( $islem == 'sifre_hatirlatma'  ){

$kullanici = mysqli_real_escape_string($conn,@$_POST['kullanici']);
$kod= mysqli_real_escape_string($conn,@$_POST['kod']);
$dkod= $_SESSION["dogrulamakodu"]; 


$sorgu = mysqli_query($conn,"Select * from uyeler where mail='$kullanici'");
$say_uye = mysqli_num_rows($sorgu);

echo "<br>";

if (  $say_uye > 0  ) {
    $satir = mysqli_fetch_array($sorgu);
    $kisi_id = $satir['id'];
    $kisi_ad = $satir['adi'];
    $kisi_soyad = $satir['soyadi'];
	$kisi_mail = $satir['mail'];
} 

if ( buyuk_harf($kod) != $dkod  ) {
    echo "<img src='admin_img/hata.png' width='24' height='24'><br>";
    echo "Doğrulama kodu hatalı";
} elseif (  $say_uye == 0  ) {
    echo "<img src='admin_img/hata.png' width='24' height='24'><br>";
    echo "Böyle bir üye bulunamadı.";
}
else {
    
	$sorgu_genel = mysqli_query($conn,"select * from genel_bilgiler");
	$satir_genel = mysqli_fetch_array($sorgu_genel);

	$simdiki_zaman = date("Y-m-d H:i:s");
	$sql = "UPDATE uyeler SET sifre_istek = 1, sifre_istek_tarihi = '$simdiki_zaman' WHERE id='$kisi_id'";
	$sorgu = mysqli_query($conn, $sql);


	// Mail Bilgisi
	$mail_icerik = "<h1>Sayın $kisi_ad $kisi_soyad </h1> <br>"
				.date("d-m-Y H:i:s")." tarihinde şifre sıfırlama talebinde bulundunuz. <br>
				   Şifrenizi sıfırlamak için aşağıda verilen linki kullanabilirsiniz. (<i>Link geçerlilik süresi 60 dakikadır</i>) <br>
				   <a href='".$satir_genel['www']."recruiting_2024/proje_recruiting/yonetim_paneli/yeni_sifre_olustur.php??id=".hash('sha256', rand(1,1000)).$kisi_id.hash('sha256', rand(1,1000))."'>Sıfırlama Linki </a>";
	// ***********************

		echo "<img src='admin_img/ok.png' width='24' height='24'><br>";
		echo "Şifre değiştirme maili adresinize gönderildi";
		
	 mail_gonder('Şifre sıfırlama talebi',$mail_icerik,array($kisi_mail));

	}
}

elseif ( $islem == 'yeni_sifre'  ){

	$kullanici = mysqli_real_escape_string($conn,@$_POST['kullanici']);
	$sifre = mysqli_real_escape_string($conn,@$_POST['sifre']);
	$tsifre = mysqli_real_escape_string($conn,@$_POST['tsifre']);

	$sorgu = mysqli_query($conn,"Select * from uyeler where mail='$kullanici'");
	$say_uye = mysqli_num_rows($sorgu);

	echo "<br>";

	if (  $say_uye > 0  ) {
		$satir = mysqli_fetch_array($sorgu);
		$kisi_id = $satir['id'];
	} 

	if (  $say_uye == 0 ) {
		echo "<img src='admin_img/hata.png' width='24' height='24'><br>";
		echo "Böyle bir üye bulunamadı.";
	} elseif (  $sifre != $tsifre ) {
		echo "<img src='admin_img/hata.png' width='24' height='24'><br>";
		echo "Şifreler Eşleşmiyor.";
	} 
	else {
		
		// echo "şifre güncellenecek";
		
		$db_sifre = md5(sha1(sha1(sha1(md5($sifre)))));
		
		$sql = "UPDATE uyeler
					SET sifre ='$db_sifre', sifre_istek = 0, sifre_istek_tarihi = ''
				WHERE id='$kisi_id'";
	     echo $sql;

		if (mysqli_query($conn,$sql)) {
			echo "<img src='admin_img/ok.png' width='24' height='24'><br>";
			echo "Şifreniz değiştirildi";
			echo yonlen_zamanli('index.php',2000); 
		}
		else{ echo "Beklenmeyen bir hata oluştu. Kod : 50";}

	}

}

elseif ($islem == 'ilan_duzenleme') { // İlan düzenleme

    $sifreli_id_bs64 = @$_REQUEST["ilan_id"];
    $sifreli_id = base64_decode($sifreli_id_bs64);
    $encryption_key = "sifreleme_123456";
    $ilan_id = openssl_decrypt($sifreli_id, 'AES-256-CBC', $encryption_key, 0, $encryption_key);

    // İlanı ilanlar tablosundan çek
    $sorgu_ilan = mysqli_query($conn, "SELECT * FROM ilanlar WHERE id='$ilan_id'");
    if (!$sorgu_ilan) {
        die('İlan sorgusu başarısız: ' . mysqli_error($conn));
    }
    $satir_ilan = mysqli_fetch_array($sorgu_ilan);
    $ilan_eski_resim = $satir_ilan['resim'];

    $sirket_id = $satir_ilan['sirket_id'];

    // Şirket bilgilerini sirketler tablosundan çek
    $sorgu_sirket = mysqli_query($conn, "SELECT * FROM sirketler WHERE sirket_id='$sirket_id'");
    if (!$sorgu_sirket) {
        die('Şirket sorgusu başarısız: ' . mysqli_error($conn));
    }
    $satir_sirket = mysqli_fetch_array($sorgu_sirket);
    if (!$satir_sirket) {
        die('Şirket tablosunda veri bulunamadı');
    }

    $ilan_sirketAdi = @$_REQUEST["ilan_sirketAdi"];
    $ilan_email = @$_REQUEST["ilan_email"];
    $ilan_telefon = @$_REQUEST["ilan_telefon"];

    // Şirket adı, email ve telefon değerlerini güncelle
    $sql_sirket_guncelle = "UPDATE sirketler SET sirketAdi='$ilan_sirketAdi', email='$ilan_email', telefon='$ilan_telefon' WHERE sirket_id='$sirket_id'";
    if (mysqli_query($conn, $sql_sirket_guncelle)) {
        echo "Şirket bilgileri güncellendi.<br>";
    } else {
        echo "Şirket bilgileri güncellenemedi: " . mysqli_error($conn) . "<br>";
        die();
    }

    $ilan_baslik = @$_REQUEST["ilan_baslik"];
    $ilan_maas = @$_REQUEST["ilan_maas"];
    $ilan_aciklama = @$_REQUEST["ilan_aciklama"];
    $ilan_aciklama = htmlentities($ilan_aciklama, ENT_QUOTES, "UTF-8");

    // Deneyim ID'sini al
    $deneyim_id = @$_REQUEST["deneyim_id"];
	$kategori_id = @$_REQUEST["kategori_id"];
	$sehirler_id = @$_REQUEST["sehirler_id"];

    // İlanı güncelle
    $sql_ilan_guncelle = "UPDATE ilanlar SET baslik='$ilan_baslik', maas='$ilan_maas', aciklama='$ilan_aciklama', deneyim_id='$deneyim_id',kategori_id='$kategori_id',sehirler_id='$sehirler_id' WHERE id='$ilan_id'";
    if (mysqli_query($conn, $sql_ilan_guncelle)) {
        echo "İlan bilgileri güncellendi.<br>";
    } else {
        echo "İlan bilgileri güncellenemedi: " . mysqli_error($conn) . "<br>";
        die();
    }

    // Resim güncelleme işlemi
    $isim = $_FILES['ilan_resim']['name'];
    $boyut = $_FILES['ilan_resim']['size'];
    $tmp = $_FILES['ilan_resim']['tmp_name'];

    $yol = "../images/ilanlar/";
    $kabul_boyut = 800 * 800;
    $kabul_uzanti = array("gif", "jpg", "jpeg", "png");

    if (strlen($isim) > 0) {
        list($txt, $uzanti) = explode(".", $isim);
        if (!in_array($uzanti, $kabul_uzanti)) {
            echo "<img src='admin_img/gecersiz.png' width='24' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı' valign='middle'>";
            die();
        }

        if ($boyut > $kabul_boyut) {
            echo "<img src='admin_img/gecersiz.png' width='24' title='Resim boyutu kabul edilmiyor' alt='Resim boyutu kabul edilmiyor' valign='middle'>";
            die();
        }

        $yeni_isim = $sifreli_id_bs64 . "_" . time() . "." . $uzanti;

        if (move_uploaded_file($tmp, $yol . $yeni_isim)) {
            unlink($yol . $ilan_eski_resim);
            $sql_resim_guncelle = "UPDATE ilanlar SET resim='$yeni_isim' WHERE id='$ilan_id'";
            if (mysqli_query($conn, $sql_resim_guncelle)) {
                echo "İlan resmi güncellendi.<br>";
            } else {
                echo "İlan resmi güncellenemedi: " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "Resim yüklenemedi: Dosya taşınamadı.<br>";
            die();
        }
    }
}
elseif ($islem == 'ilan_ekleme') {
    // ilan ekleme
    $ilan_sirketAdi = @$_REQUEST["ilan_sirketAdi"];
    $ilan_baslik = @$_REQUEST["ilan_baslik"];
    $ilan_email = @$_REQUEST["ilan_email"];
    $ilan_telefon = @$_REQUEST["ilan_telefon"];
    $ilan_maasi = @$_REQUEST["ilan_maasi"];
    $ilan_aciklama = @$_REQUEST["ilan_aciklama"];
    $ilan_aciklama = htmlentities($ilan_aciklama, ENT_QUOTES, "UTF-8");
    $ilan_deneyim = @$_REQUEST["ilan_deneyim"]; // Deneyim ID'sini alıyoruz
    $ilan_kategori = @$_REQUEST["ilan_kategori"]; // Kategori ID'sini alıyoruz
	$ilan_sehir = @$_REQUEST["ilan_sehir"];
    // Deneyim ID'sinin geçerli olup olmadığını kontrol et
    $sql_deneyim = "SELECT deneyim_id FROM tecrube WHERE deneyim_id = '$ilan_deneyim'";
    $result_deneyim = $conn->query($sql_deneyim);

    if ($result_deneyim->num_rows == 0) {
        die("Geçersiz deneyim ID: $ilan_deneyim");
    }

    // Kategori ID'sinin geçerli olup olmadığını kontrol et
    $sql_kategori = "SELECT kategori_id FROM is_kategori WHERE kategori_id = '$ilan_kategori'";
    $result_kategori = $conn->query($sql_kategori);

    if ($result_kategori->num_rows == 0) {
        die("Geçersiz kategori ID: $ilan_kategori");
    }
	$sql_sehir = "SELECT sehirler_id FROM sehirler WHERE sehirler_id = '$ilan_sehir'";
    $result_sehir = $conn->query($sql_sehir);

	if ($result_sehir->num_rows == 0) {
        die("Geçersiz şehir ID: $ilan_sehir");
    }

    $isim = $_FILES['ilan_resim']['name'];
    $boyut = $_FILES['ilan_resim']['size'];
    $tmp = $_FILES['ilan_resim']['tmp_name'];

    $yol = "../images/ilanlar/";
    $kabul_boyut = 800 * 800;
    $kabul_uzanti = array("gif", "jpg", "jpeg", "png");

    if (!strlen($isim) > 0) {
        echo "<img src='admin_img/gecersiz.png' width='24' title='Resim Ekleyiniz' alt='Resim Ekleyiniz' valign='middle'>";
        die();
    }

    list($txt, $uzanti) = explode(".", $isim);
    if (!in_array($uzanti, $kabul_uzanti)) {
        echo "<img src='admin_img/gecersiz.png' width='24' title='Kabul edilmeyen resim formatı' alt='Kabul edilmeyen resim formatı'  valign='middle'>";
        die();
    }

    if ($boyut > $kabul_boyut) {
        echo "<img src='admin_img/gecersiz.png' width='24' title='Kabul edilmeyen resim boyutu' alt='Kabul edilmeyen resim boyutu'  valign='middle'>";
        die();
    }

    $yeni_isim = time() . rand(100, 999) . "." . $uzanti;

    if (move_uploaded_file($tmp, $yol . $yeni_isim)) {
        // Şirketi veritabanına ekle
        $sql = "INSERT INTO sirketler (sirketAdi, email, telefon) VALUES ('$ilan_sirketAdi', '$ilan_email', '$ilan_telefon')";

        if (mysqli_query($conn, $sql)) {
            // Şirket başarılı bir şekilde eklendi, şimdi şirket ID'sini alalım
            $sirket_id = mysqli_insert_id($conn);

            // İlanı veritabanına ekle
            $sql = "INSERT INTO ilanlar (sirket_id, baslik, aciklama, maas, resim, deneyim_id, kategori_id, sehirler_id) VALUES ('$sirket_id', '$ilan_baslik', '$ilan_aciklama', '$ilan_maasi', '$yeni_isim', '$ilan_deneyim','$ilan_kategori','$ilan_sehir')";

            if (mysqli_query($conn, $sql)) {
                echo "İlan başarıyla eklendi.<br>";
                echo yonlen('editor_index.php?istek=ilanlar&ilan_basharf=tum');
            } else {
                echo "<img src='admin_img/gecersiz.png' width='24' title='veri tabanı kaydı yapılamadı' alt='veri tabanı kaydı yapılamadı' valign='middle'>";
                echo "SQL Hatası: " . mysqli_error($conn) . "<br>";
            }
        } else {
            echo "<img src='admin_img/gecersiz.png' width='24' title='şirket kaydı yapılamadı' alt='şirket kaydı yapılamadı' valign='middle'>";
            echo "SQL Hatası: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "<img src='admin_img/gecersiz.png' width='24' title='resim yüklenemedi' alt='resim yüklenemedi' valign='middle'>";
        echo "Resim yüklenemedi: $tmp to " . $yol . $yeni_isim . "<br>";
        echo "Yükleme Yolu: " . realpath($yol) . "<br>";
        die();
    }
}


elseif ($islem == 'ilan_silme') {     // İlan silme

    $sifreli_id_bs64 = @$_REQUEST["ilan_id"]; 
    $sifreli_id = base64_decode($sifreli_id_bs64);
    $encryption_key = "sifreleme_123456";
    $ilan_id = openssl_decrypt($sifreli_id, 'AES-256-CBC', $encryption_key, 0, $encryption_key); 

    // İlanı ilanlar tablosundan çek
    $sorgu_ilan = mysqli_query($conn, "SELECT * FROM ilanlar WHERE id='$ilan_id'");
    if (!$sorgu_ilan) {
        die('İlan sorgusu başarısız: ' . mysqli_error($conn));
    }
    $satir_ilan = mysqli_fetch_array($sorgu_ilan);
    $ilan_resim = $satir_ilan['resim'];

    // İlgili ilanın resmini sil
    $yol = "../images/ilanlar/";
    unlink($yol . $ilan_resim);

    // İlgili ilanı ilanlar tablosundan sil
    $sql_ilan_sil = "DELETE FROM ilanlar WHERE id='$ilan_id'";
    if (mysqli_query($conn, $sql_ilan_sil)) {
    } else {
        echo "İlan silinemedi: " . mysqli_error($conn) . "<br>";
        die();
    }

    // İlanın bağlı olduğu şirketi de ilgili tablodan sil
    $sirket_id = $satir_ilan['sirket_id'];
    $sql_sirket_sil = "DELETE FROM sirketler WHERE sirket_id='$sirket_id'";
    if (mysqli_query($conn, $sql_sirket_sil)) {
		echo yonlen('editor_index.php?istek=ilanlar&ilan_basharf=tum');
    } else {
        echo "İlgili şirket bilgileri silinemedi: " . mysqli_error($conn) . "<br>";
        die();
    }


}



?>

