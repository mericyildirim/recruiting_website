<!DOCTYPE html>
<?php
    include('baglan.php');

    // URL'den jobId parametresini al
    if (isset($_GET['id'])) {
        $jobId = $_GET['id'];

        // jobId'yi burada kullanabilirsin

    } else {
        echo "Job ID bulunamadı.";
        exit; // Job ID bulunamadığında işlemi durdur
    }
?>
<html>
<head>
    <title>Başvuru Formu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        .button-container {
            display: flex;
            justify-content: flex-start;
            gap: 10px; /* Butonlar arasına boşluk ekler */
        }

        .button-container input[type="submit"],
        .button-container button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button-container input[type="submit"]:hover,
        .button-container button:hover {
            background-color: #45a049;
        }

        p {
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<h1>Başvuru Formu</h1>

<?php
session_start(); // Oturumu başlat

include('baglan.php'); // Veritabanı bağlantısı dosyanızı ekleyin

// Başvuru formu gönderildiğinde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Formdan gelen verileri al
    $ad = $_POST["ad"];
    $soyad = $_POST["soyad"];
    $email = $_POST["email"];
    $telefon = $_POST["telefon"];
    $jobId = $_POST["id"];

    // Aynı ilan ve email ile başvuru yapılmış mı kontrol et
    $check_query = "SELECT * FROM basvurular WHERE email = '$email' AND ilan_id = '$jobId'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        echo "<p>Bu ilana zaten başvurdunuz.</p>";
    } else {
        $sql = "INSERT INTO basvurular (adi, soyadi, email, telefon, ilan_id) VALUES ('$ad', '$soyad', '$email', '$telefon','$jobId')";
        if (mysqli_query($conn, $sql)) {
            echo "<p>Başvurunuz alınmıştır. İlginiz için teşekkür ederiz!</p>";
        } else {
            echo "Hata: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . '?id=' . $jobId); ?>">
    <label for="ad">Adınız:</label>
    <input type="text" name="ad" required><br>

    <label for="soyad">Soyadınız:</label>
    <input type="text" name="soyad" required><br>

    <label for="email">E-posta Adresiniz:</label>
    <input type="email" name="email" required><br>

    <label for="telefon">Telefon Numaranız:</label>
    <input type="tel" name="telefon" required><br>

    <input type="hidden" name="id" value="<?php echo htmlspecialchars($jobId); ?>">

    <div class="button-container">
        <input type="submit" value="Başvur">
        <button type="button" onclick="window.location.href='anasayfa'">Ana Sayfa</button>
    </div>
</form>
</body>
</html>