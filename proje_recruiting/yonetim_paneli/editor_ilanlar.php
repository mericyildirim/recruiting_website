<?php
include_once('editor_fonks.php');
include_once('editor_ses_kontrol.php');
if ($yetki_seviyesi <> 2) {
    yazdir_yetkisiz_islem();
    die;
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jobs </h1>
    <div class="card-body">
        <div id="ilan_tablosu">
            <?php
            $ilan_basharf = @$_REQUEST["ilan_basharf"];
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" width='100%' id="dataTable" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th style='text-align:center' width="10%">Image</th>
                            <th style='text-align:center' width="15%">Company Name</th>
                            <th style='text-align:center' width="15%">E-mail</th>
                            <th style='text-align:center' width="10%">Price</th>
                            <th style='text-align:center' width="15%">Title</th>
                            <th style='text-align:center' width="10%">Experience Level</th>
                            <th style='text-align:center' width="10%">Job Category</th> <!-- Kategori eklendi -->
                            <th style='text-align:center' width="10%">City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       if ($ilan_basharf == 'tum') {
                        $sorgu_ilan = mysqli_query($conn, "SELECT ilanlar.*, sirketler.sirketAdi, sirketler.email AS sirket_email, tecrube.deneyim, is_kategori.kategori, sehirler.sehir FROM ilanlar INNER JOIN sirketler ON ilanlar.sirket_id = sirketler.sirket_id INNER JOIN tecrube ON ilanlar.deneyim_id = tecrube.deneyim_id INNER JOIN is_kategori ON ilanlar.kategori_id = is_kategori.kategori_id INNER JOIN sehirler ON ilanlar.sehirler_id = sehirler.sehirler_id ORDER BY sirketAdi, sirket_email ASC");
                    } else {
                        $sorgu_ilan = mysqli_query($conn, "SELECT ilanlar.*, sirketler.sirketAdi, sirketler.email AS sirket_email, tecrube.deneyim, is_kategori.kategori, sehirler.sehir FROM ilanlar INNER JOIN sirketler ON ilanlar.sirket_id = sirketler.sirket_id INNER JOIN tecrube ON ilanlar.deneyim_id = tecrube.deneyim_id INNER JOIN is_kategori ON ilanlar.kategori_id = is_kategori.kategori_id INNER JOIN sehirler ON ilanlar.sehirler_id = sehirler.sehirler_id WHERE sehirler.sehir = '$ilan_basharf' ORDER BY sirketAdi, sirket_email ASC");
                    }
                        while ($satir_ilan = mysqli_fetch_array($sorgu_ilan)) {
                            $i_id = $satir_ilan['id'];

                            // Şifreleme işlemi
                            $encryption_key = "sifreleme_123456";
                            $sifreli_id = openssl_encrypt($i_id, 'AES-256-CBC', $encryption_key, 0, $encryption_key);
                            $sifreli_id = base64_encode($sifreli_id);
                        ?>

                            <tr>
                                <td style="text-align:center; vertical-align: middle;">
                                    <a href="?istek=ilan_detay&ilan=<?php echo $sifreli_id; ?>">
                                        <img style="border-radius: 23%;" width=75 height=75 src="../images/ilanlar/<?php echo $satir_ilan['resim']; ?>">
                                    </a>
                                </td>
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['sirketAdi']; ?></td>
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['sirket_email']; ?></td>
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['maas']; ?></td> <!-- Maaş -->
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['baslik']; ?></td> <!-- Başlık -->
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['deneyim']; ?></td> <!-- Deneyim Seviyesi -->
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['kategori']; ?></td> <!-- İş Kategorisi -->
                                <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['sehir']; ?></td> <!-- Şehir -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <form id='ilan_harf_sec' name='ilan_harf_sec' method="post" action="#">
            <?php
            $sorgu_ilan_ilkharfler = mysqli_query($conn, "select substr(sirketAdi,1,1) as harf, count(id) as sayi 
										from ilanlar group by substr(sirketAdi,1,1)");
            ?>

            <p align='right'> Seçiniz: <select id='ilan_basharf' name='ilan_basharf'>
                    <option <?php echo ($ilan_basharf == 'tum') ? "selected" : ""; ?> value='tum'>#</option>
                    <?php
                    while ($satir_ilkharf = mysqli_fetch_array($sorgu_ilan_ilkharfler)) {
                    ?>
                        <option <?php echo ($ilan_basharf == $satir_ilkharf['harf']) ? "selected" : "" ?> value='<?php echo $satir_ilkharf['harf'] ?>'><?php echo $satir_ilkharf['harf'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </p>
        </form>

    </div>
</div>

<script>
    // Get the select element
    var select = document.getElementById("ilan_basharf");
    select.addEventListener("change", function() {
        var selectedOption = select.value;
        document.getElementById("ilan_harf_sec").action = "editor_index.php?istek=ilanlar&ilan_basharf=" + selectedOption;
        document.getElementById("ilan_harf_sec").submit();
    });
</script>

