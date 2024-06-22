<!DOCTYPE html>
<html>
<head>






<?php
include('../baglan.php'); // Veritabanı bağlantısını sağlayan dosyayı dahil edin

// Form gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $konum = $_POST["konum"];

    // Veritabanında mevcut iletişim bilgisi var mı kontrol edin
    $sorgu = "SELECT * FROM iletisim_bilgileri";
    $sonuc = mysqli_query($conn, $sorgu);
    if (mysqli_num_rows($sonuc) > 0) {
        // Mevcut iletişim bilgisi varsa, güncelleme yap
        $sql = "UPDATE iletisim_bilgileri SET email = '$email', telefon = '$telefon', konum = '$konum'";
    } else {
        // Mevcut bir iletişim bilgisi yoksa, yeni bir kayıt ekle
        $sql = "INSERT INTO iletisim_bilgileri (email, telefon, konum) VALUES ('$email', '$telefon', '$konum')";
    }

    // SQL sorgusunu çalıştır
    if (mysqli_query($conn, $sql)) {
        echo "<p>İletişim bilgileri başarıyla kaydedildi.</p>";
    } else {
        echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
}
?>
    <title>İletişim Formu</title>
    <style>
        /* CSS kodları buraya */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        
        h1 {
            color: #333;
            text-align: center;
        }
        
        form {
            width: 300px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        
        input[type="email"],
        input[type="tel"],
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>İletişim Formu</h1>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>
        
        <label for="telefon">Telefon:</label>
        <input type="tel" name="telefon" id="telefon" required><br><br>
        
        <label for="konum">Konum:</label>
        <input type="text" name="konum" id="konum" required><br><br>
        
        <input type="submit" value="Kaydet">
    </form>
</body>
</html>