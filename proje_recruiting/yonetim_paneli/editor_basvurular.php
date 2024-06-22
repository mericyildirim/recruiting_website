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
    <h1 class="h3 mb-4 text-gray-800">Başvurular</h1>
    <div class="card-body">
        <div id="ilan_tablosu">
            <?php
            // Veritabanı bağlantısı
            include('../baglan.php');

            // Silme işlemi
            if(isset($_POST['delete'])){
                $delete_id = $_POST['delete'];
                $delete_query = "DELETE FROM basvurular WHERE ilan_id = '$delete_id'";
                if(mysqli_query($conn, $delete_query)) {
                    echo "<p>Başvuru başarıyla silindi.</p>";
                } else {
                    echo "<p>Hata: " . mysqli_error($conn) . "</p>";
                }
            }

            // Başvuruları çekme
            $ilan_basharf = @$_REQUEST["ilan_basharf"];
            ?>
            <div class="table-responsive">
                <table class="table table-bordered" width='100%' id="dataTable" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th style='text-align:center' width="10%">Başvurduğu ilan id</th>
                            <th style='text-align:center' width="10%">adı</th>
                            <th style='text-align:center' width="15%">soyadi</th>
                            <th style='text-align:center' width="15%">E-mail</th>
                            <th style='text-align:center' width="10%">telefon</th>
                            <th style='text-align:center' width="10%">Başvuruyu Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sorgu_ilan = mysqli_query($conn, "SELECT ilan_id, adi, soyadi, email, telefon FROM basvurular");
                    if (mysqli_num_rows($sorgu_ilan) > 0) {
                        while ($satir_ilan = mysqli_fetch_array($sorgu_ilan)) {
                        ?>

                        <tr>
                            <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['ilan_id']; ?></td>
                            <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['adi']; ?></td>
                            <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['soyadi']; ?></td>
                            <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['email']; ?></td>
                            <td style="text-align:center; vertical-align: middle;"><?php echo $satir_ilan['telefon']; ?></td>
                            <td style="text-align:center; vertical-align: middle;">
                                <form method="post" action="">
                                    <input type="hidden" name="delete" value="<?php echo $satir_ilan['ilan_id']; ?>">
                                    <button type="submit" class="btn btn-danger">Sil</button>
                                </form>
                            </td>
                        </tr>

                        <?php }
                    } else {
                        echo "<tr><td colspan='6' style='text-align:center;'>Başvuru bulunamadı.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>

        <form id='ilan_harf_sec' name='ilan_harf_sec' method="post" action="#">
            <?php
            $sorgu_ilan_ilkharfler = mysqli_query($conn, "SELECT SUBSTR(adi,1,1) as harf, COUNT(id) as sayi 
                                        FROM ilanlar GROUP BY SUBSTR(adi,1,1)");
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
</body>
</html>

<script>
    // Get the select element
    var select = document.getElementById("ilan_basharf");
    select.addEventListener("change", function() {
        var selectedOption = select.value;
        document.getElementById("ilan_harf_sec").action = "editor_index.php?istek=ilanlar&ilan_basharf=" + selectedOption;
        document.getElementById("ilan_harf_sec").submit();
    });
</script>