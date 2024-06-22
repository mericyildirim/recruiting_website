<?php
session_start();

// 3 haneli bir doğrulama kodu oluştur
$dogrulamakodu = rand(100, 999);

// Dogrulama kodunu oturuma kaydet
$_SESSION["dogrulamakodu"] = $dogrulamakodu;

// Resmin boyutları belirleniyor
$en = 200;
$boy = 100;

// Uzerinde calisacagimiz resim olusturuluyor
$image = imagecreatetruecolor($en, $boy);

// Renkler olusturuluyor
$beyaz = imagecolorallocate($image, 255, 255, 255);
$siyah = imagecolorallocate($image, 0, 0, 0);

// Arka planı beyaz yap
imagefilledrectangle($image, 0, 0, $en, $boy, $beyaz);

// Font dosyası ve boyutu
$fontDosyasi = "font1.ttf";
$fontSize = 30;

// Doğrulama kodunu resme yaz
imagettftext($image, $fontSize, 0, 50, 60, $siyah, $fontDosyasi, $dogrulamakodu);

// Resmi görüntüleme tipi olarak belirt
header("Content-Type: image/png");

// Resmi png olarak bas
imagepng($image);

// Bellekten resmi sil
imagedestroy($image);
?>