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
                    
					<h1 class="h3 mb-4 text-gray-800">Yeni ilan Ekleme</h1>					
						<div class="card-body">
						
		<div class="table-responsive">
		<table width='80%' >
		<tbody>
		<tr>
		<td>
		<?php
            // Deneyim bilgilerini sorgula
            $sql_deneyim = "SELECT deneyim_id, deneyim FROM tecrube WHERE deneyim_id BETWEEN 1 AND 7";
            $result_deneyim = $conn->query($sql_deneyim);

            // Kategori bilgilerini sorgula
            $sql_kategori = "SELECT kategori_id, kategori FROM is_kategori WHERE kategori_id BETWEEN 1 AND 8";
            $result_kategori = $conn->query($sql_kategori);

            // Şehir bilgilerini sorgula
            $sql_sehir = "SELECT sehirler_id, sehir FROM sehirler WHERE sehirler_id BETWEEN 1 AND 81";
            $result_sehir = $conn->query($sql_sehir);

            // Hata ayıklama
            if (!$result_deneyim || !$result_kategori || !$result_sehir) {
                die("Sorgu hatası: " . $conn->error);
            }
            ?>

            <form id='ilan_bilgileri' name='ilan_bilgileri' method="post" enctype="multipart/form-data" action="isle.php?islem=ilan_ekleme">
                <table class="table table-bordered" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><strong>Şirket Logosu</strong></td>
                        <td><input type='file' accept="image/gif, image/jpg, image/jpeg, image/png" name='ilan_resim'></td>
                    </tr>
                    <tr>
                        <td><strong>Şirket Adı</strong></td>
                        <td><input type="text" class="text" required name='ilan_sirketAdi' /></td>
                    </tr>
                    <tr>
                        <td><strong>İlan Başlığı</strong></td>
                        <td><input type="text" class="text" required name='ilan_baslik' /></td>
                    </tr>
                    <tr>
                        <td><strong>e-mail</strong></td>
                        <td><input type="text" class="text" required name='ilan_email' /></td>
                    </tr>
                    <tr>
                        <td><strong>telefon</strong></td>
                        <td><input type="int" class="int" required name='ilan_telefon' /></td>
                    </tr>
                    <tr>
                        <td><strong>Maaş</strong></td>
                        <td><input type="int" class="int" required name='ilan_maasi' /></td>
                    </tr>
                    <tr>
                        <td><strong>Deneyim</strong></td>
                        <td>
                            <select name="ilan_deneyim" required>
                                <?php
                                // Tecrube tablosundaki tüm deneyim seviyelerini dropdown'a ekle
                                if ($result_deneyim->num_rows > 0) {
                                    while ($row_deneyim = $result_deneyim->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row_deneyim["deneyim_id"], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row_deneyim["deneyim"], ENT_QUOTES, 'UTF-8') . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Deneyim bulunamadı</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Kategori</strong></td>
                        <td>
                            <select name="ilan_kategori" required>
                                <?php
                                // Kategori tablosundaki tüm kategorileri dropdown'a ekle
                                if ($result_kategori->num_rows > 0) {
                                    while ($row_kategori = $result_kategori->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row_kategori["kategori_id"], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row_kategori["kategori"], ENT_QUOTES, 'UTF-8') . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Kategori bulunamadı</option>";
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Şehirler</strong></td>
                        <td>
                            <select name="ilan_sehir" required>
                                <?php
                                // Şehir tablosundaki tüm şehirleri dropdown'a ekle
                                if ($result_sehir->num_rows > 0) {
                                    while ($row_sehir = $result_sehir->fetch_assoc()) {
                                        echo "<option value='" . htmlspecialchars($row_sehir["sehirler_id"], ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($row_sehir["sehir"], ENT_QUOTES, 'UTF-8') . "</option>";
                                    }
                                } else {
                                    echo "<option value=''>Şehir bulunamadı</option>";
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
                                <textarea id='ilan_aciklama' name="ilan_aciklama"> </textarea>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align:right; vertical-align: middle;"><span id='sonuc'></span></td>
                        <td style="text-align:left; vertical-align: middle;">
                            <input type='submit' name='submit' style="background-color: #124559;color: white;border-radius: 7px;" value='İlan Kaydet'>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>

<?php
$conn->close();
?>

		</td>
		</tr>
		</tbody>			
		</table>
		</div>
	
 
	</div>	
	</div>
	

	
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
              


