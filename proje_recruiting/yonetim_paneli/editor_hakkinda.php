<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hakkında Kısmını Düzenle</title>
    <style>
        .editor {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 50px auto;
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        textarea {
            width: 100%;
            height: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="editor">
    <h1>Hakkında Kısmını Düzenle</h1>

    <?php
    include('../baglan.php');

    // Mevcut "hakkında" yazısını veritabanından çek
    $sorgu = "SELECT yazi FROM hakkinda WHERE id = 1";
    $sonuc = mysqli_query($conn, $sorgu);
    $mevcut_yazi = "";
    if ($sonuc && mysqli_num_rows($sonuc) > 0) {
        $satir = mysqli_fetch_assoc($sonuc);
        $mevcut_yazi = $satir['yazi'];
    }

    // Form gönderildiğinde
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $yeni_yazi = $_POST["yazi"];

        // Mevcut bir "hakkında" girdisi varsa, güncelleme yap
        if (isset($_POST['yazi1'])) {
            $sql = "UPDATE hakkinda SET yazi1 = '$yeni_yazi' WHERE id = 1";
        } else if (isset($_POST['yazi2'])) {
            $sql = "UPDATE hakkinda SET yazi2 = '$yeni_yazi' WHERE id = 1";
        } else if (isset($_POST['yazi3'])) {
            $sql = "UPDATE hakkinda SET yazi3 = '$yeni_yazi' WHERE id = 1";
        } else {
            // Mevcut bir girdi yoksa, yeni bir girdi ekle
            $sql = "INSERT INTO hakkinda (yazi1, yazi2, yazi3) VALUES ('$yeni_yazi', '', '')";
        }

        if (mysqli_query($conn, $sql)) {
            echo "<p>Hakkında kısmı başarıyla güncellendi.</p>";
            $mevcut_yazi = $yeni_yazi; // Güncellenen yazıyı tekrar göster
        } else {
            echo "Hata: " . mysqli_error($conn);
        }
    }

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
    ?>

    <form method="POST" action="">
        <textarea id='hakkinda' name="yazi"><?php echo htmlspecialchars($mevcut_yazi); ?></textarea><br>
        <input type="submit" name="yazi1" value="hedefimiz">
        <input type="submit" name="yazi2" value="işimiz">
        <input type="submit" name="yazi3" value="tutkumuz">
    </form>
</div>

</body>
</html>

</body>
</html>
<script>
      ClassicEditor
      .create( document.querySelector( '#hakkinda' ), {
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

