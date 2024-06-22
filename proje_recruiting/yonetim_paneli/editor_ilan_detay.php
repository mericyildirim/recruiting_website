<?php
include_once('editor_fonks.php');
include_once('editor_ses_kontrol.php');
	if ( $yetki_seviyesi <> 2 ) {
		yazdir_yetkisiz_islem();
		die;
	}
	
?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
					<h1 class="h3 mb-4 text-gray-800">ilan Bilgileri </h1>					
						<div class="card-body">
						

	<?php
	$sifreli_id_bs64 = @$_GET["ilan"]; 
	$sifreli_id = base64_decode($sifreli_id_bs64);
	// echo $sifreli_id;
	$encryption_key = "sifreleme_123456";
	$i_id = openssl_decrypt($sifreli_id, 'AES-256-CBC', $encryption_key, 0, $encryption_key);
	
	/*
	if ($i_id === false) {
    echo 'Şifre çözme başarısız oldu: ' . openssl_error_string();
	}   else {
    echo 'Şifre çözme başarılı: ' . $i_id;
	}
	 */	
	?>

<?php
// ilan bilgilerini ilanlar tablosundan çek
$sorgu_ilan = mysqli_query($conn, "SELECT * FROM ilanlar WHERE id = $i_id");
if (!$sorgu_ilan) {
    die('İlan sorgusu başarısız: ' . mysqli_error($conn));
}
$satir_ilan = mysqli_fetch_array($sorgu_ilan);

$sirket_id = $satir_ilan['sirket_id'];
if (!$sirket_id) {
    die('İlan tablosunda sirket_id bulunamadı');
}

// sirket bilgilerini sirketler tablosundan çek
$sorgu_sirket = mysqli_query($conn, "SELECT * FROM sirketler WHERE sirket_id = $sirket_id");
if (!$sorgu_sirket) {
    die('Şirket sorgusu başarısız: ' . mysqli_error($conn));
}
$satir_sirket = mysqli_fetch_array($sorgu_sirket);
if (!$satir_sirket) {
    die('Şirket tablosunda veri bulunamadı');
}

// ilanın deneyim ID'sini al
$deneyim_id = $satir_ilan['deneyim_id'];
$kategori_id = $satir_ilan['kategori_id'];
$sehirler_id = $satir_ilan['sehirler_id'];

// Deneyim bilgisini sorgula
$sorgu_deneyim = mysqli_query($conn, "SELECT * FROM tecrube");
$sorgu_kategori = mysqli_query($conn, "SELECT * FROM is_kategori");
$sorgu_sehir = mysqli_query($conn, "SELECT * FROM sehirler");
if (!$sorgu_deneyim) {
    die('Deneyim bilgisi sorgusu başarısız: ' . mysqli_error($conn));
}


?>

<div class="table-responsive">
<table width='80%'>
<tbody>
<tr>
<td>
  <form id='ilan_bilgileri' name='ilan_bilgileri' method="post" enctype="multipart/form-data" action="isle.php?islem=ilan_duzenleme">  
  <table class="table table-bordered" cellpadding="0" cellspacing="0">
      <tr>
        <td style='text-align:center' colspan=2>
        <img style="border-radius: 53%;" width=175 height=175 src='../images/ilanlar/<?php echo $satir_ilan['resim']; ?>'>
        </td>
      </tr>
      <tr>
        <td><strong>Resim Değiştir</strong></td>
        <td><input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" name='ilan_resim'></td>
      </tr>
      <tr>
        <td><strong>Şirket Adı</strong></td>
        <td><input type="text" class="text" required name='ilan_sirketAdi' value='<?php echo $satir_sirket['sirketAdi']; ?>' /></td>
      </tr>
	  <tr>
        <td><strong>İlan Başlığı</strong></td>
        <td><input type="text" class="text" required name='ilan_baslik' value='<?php echo $satir_ilan['baslik']; ?>' /></td>
      </tr>
      <tr>
        <td><strong>E-mail</strong></td>
        <td><input type="text" class="text" required name='ilan_email' value='<?php echo $satir_sirket['email']; ?>' /></td>
      </tr>
	  <tr>
        <td><strong>Telefon</strong></td>
        <td><input type="int" class="int" required name='ilan_telefon' value='<?php echo $satir_sirket['telefon']; ?>' /></td>
      </tr>
      <tr>
        <td><strong>Maaş</strong></td>
        <td><input type="int" class="int" required name='ilan_maas' value='<?php echo $satir_ilan['maas']; ?>' /></td>
      </tr>
      <tr>
                                <td><strong>Deneyim Seviyesi</strong></td>
                                <td>
                                    <select name="deneyim_id">
                                        <?php
                                        while ($satir_deneyim = mysqli_fetch_array($sorgu_deneyim)) {
                                            $selected = ($satir_deneyim['deneyim_id'] == $deneyim_id) ? 'selected' : '';
                                            echo "<option value='{$satir_deneyim['deneyim_id']}' $selected>{$satir_deneyim['deneyim']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
      <tr>
      <tr>
                                <td><strong>İş Kategorisi</strong></td>
                                <td>
                                    <select name="kategori_id">
                                        <?php
                                        while ($satir_kategori = mysqli_fetch_array($sorgu_kategori)) {
                                            $selected = ($satir_kategori['kategori_id'] == $kategori_id) ? 'selected' : '';
                                            echo "<option value='{$satir_kategori['kategori_id']}' $selected>{$satir_kategori['kategori']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Şehirler</strong></td>
                                <td>
                                    <select name="sehirler_id">
                                        <?php
                                        while ($satir_sehir = mysqli_fetch_array($sorgu_sehir)) {
                                            $selected = ($satir_sehir['sehirler_id'] == $sehirler_id) ? 'selected' : '';
                                            echo "<option value='{$satir_sehir['sehirler_id']}' $selected>{$satir_sehir['sehir']}</option>";
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
      <tr>
        <td colspan=2><strong>Açıklama</strong></td>
      </tr>
      <tr>
        <td colspan=2>
        <div style='width:99%'>
        <textarea id='ilan_aciklama' name="ilan_aciklama"><?php echo $satir_ilan['aciklama']; ?></textarea>
        </div>
        </td>
      </tr>
      <tr>
          <td style="text-align:right; vertical-align: middle;"><span id='sonuc'></span></td>
          <td style="text-align:left; vertical-align: middle;">
            <input type="hidden" name='ilan_id' value='<?php echo $sifreli_id_bs64; ?>' />
            <input type='submit' name='submit' style="background-color: #124559;color: white;border-radius: 7px;" value='İlan Bilgilerini Kaydet'>
            <a href="isle.php?islem=ilan_silme&ilan_id=<?php echo $sifreli_id_bs64; ?>" class="ilan_sil_button" onclick="return confirm('İlanı silmek istediğinizden emin misiniz?')">
            İlan Sil
            </a>
          </td>
      </tr>
    </table>        
  </form>
</td>
</tr>
</tbody>
</table>

	
	
<script>
      ClassicEditor
      .create( document.querySelector( '#ilan_aciklama' ), {
		language: 'tr',
		mediaEmbed: {
             previewsInData:true
        }
        } )
        .then( editor => {
          console.log(editor);
        })
        .catch( error => {
            console.error( error );
        } );
</script>

  <script>
  // ajax    
  $('form#ilan_bilgileri').submit(function(event) {
    event.preventDefault(); 
		$('#sonuc').fadeIn().html("<img src=admin_img/l.gif width=24 height=24 valign='middle'>");
    var form = $(this);
    var formVeri= new FormData($('form#ilan_bilgileri')[0]);   
    $.ajax({
      type: form.attr('method'),
      url: form.attr('action'),
	  contentType: form.attr('enctype'),
      processData: false,
      contentType: false,
      data: formVeri,
	        success: function(response) {
                $('#sonuc').html(response);
            }  
	  });
  });	 
</script>



