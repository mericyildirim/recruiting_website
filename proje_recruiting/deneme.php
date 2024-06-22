<?php 
include 'baglan.php';
include 'dil_yonetici.php';

// Hata raporlamayı etkinleştirme
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// genel_bilgiler tablosundan site_adi sütununu çekme işlemi
$queryGenelBilgiler = "SELECT site_adi FROM genel_bilgiler LIMIT 1";
$resultGenelBilgiler = mysqli_query($conn, $queryGenelBilgiler);

if ($resultGenelBilgiler) {
    $rowGenelBilgiler = mysqli_fetch_assoc($resultGenelBilgiler);
    $siteAdi = $rowGenelBilgiler ? $rowGenelBilgiler['site_adi'] : "Veri bulunamadı.";
} else {
    $siteAdi = "Veri çekme hatası: " . mysqli_error($conn);
}

// iletisim tablosundan veri çekme işlemi
$queryIletisim = "SELECT adres, telefon, email FROM iletisim LIMIT 1";
$resultIletisim = mysqli_query($conn, $queryIletisim);

if ($resultIletisim) {
    $rowIletisim = mysqli_fetch_assoc($resultIletisim);
    $adres = $rowIletisim ? $rowIletisim['adres'] : "Veri bulunamadı.";
    $telefon = $rowIletisim ? $rowIletisim['telefon'] : "Veri bulunamadı.";
    $email = $rowIletisim ? $rowIletisim['email'] : "Veri bulunamadı.";
} else {
    $adres = "Veri çekme hatası: " . mysqli_error($conn);
    $telefon = "Veri çekme hatası: " . mysqli_error($conn);
    $email = "Veri çekme hatası: " . mysqli_error($conn);
}

// ilanlar tablosundan veri çekme işlemi
$queryIlanlar = "SELECT * FROM ilanlar";
$resultIlanlar = mysqli_query($conn, $queryIlanlar);

$ilanlar = [];
if ($resultIlanlar) {
    while($row = mysqli_fetch_assoc($resultIlanlar)) {
        $ilanlar[] = $row;
    }
} else {
    echo "Veri çekme hatası: " . mysqli_error($conn);
}
// Oda sayısı parametresini al
$odaSayisi = isset($_GET['oda_sayisi']) ? $_GET['oda_sayisi'] : '';

// Filtreleme sorgusu
$queryFiltrele = "SELECT * FROM ilanlar";
if (!empty($odaSayisi)) {
    $odaSayisiEscaped = mysqli_real_escape_string($conn, $odaSayisi);
    $queryFiltrele .= " WHERE oda_sayisi = '$odaSayisiEscaped'";
}

// İlanları çek
$resultIlanlar = mysqli_query($conn, $queryFiltrele);
$ilanlar = [];
if ($resultIlanlar) {
    while ($row = mysqli_fetch_assoc($resultIlanlar)) {
        $ilanlar[] = $row;
    }
} else {
    echo "Veri çekme hatası: " . mysqli_error($conn);
}


// İlanları göster
foreach ($ilanlar as $ilan) {
    // İlanları gösterme işlemleri burada yapılacak
}
?>

<!DOCTYPE html>
<html>
<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title><?php echo htmlspecialchars($siteAdi); ?></title>

  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="index.php">
            <span><?php echo htmlspecialchars($siteAdi); ?></span>
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="index.php"><?php echo getTranslation('home'); ?><span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="hakkinda.php"><?php echo getTranslation('about_us'); ?></a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="ilanlar.php"><?php echo getTranslation('properties'); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="iletisim.php"><?php echo getTranslation('contact'); ?></a>
                </li>
              </ul>
              <div class="user_option">
                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                  <button class="btn my-2 my-sm-0 nav_search-btn" type="submit"></button>
                </form>
              </div>
            </div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="?lang=tr">Türkçe</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?lang=en">English</a>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    <!-- Burada header ve diğer bileşenler yer alır -->
    <!-- header section ends -->
  </div>

  <form action="ilanlar.php" method="GET">
    <label for="oda_sayisi"><?php echo getTranslation('room_count'); ?>:</label>
    <select name="oda_sayisi" id="oda_sayisi">
        <option value=""><?php echo getTranslation('all'); ?></option>
        <?php
        // Veritabanından odaların sayılarını çek
        $queryOdaSayilari = "SELECT DISTINCT oda_sayisi FROM ilanlar";
        $resultOdaSayilari = mysqli_query($conn, $queryOdaSayilari);
        if ($resultOdaSayilari) {
            while ($rowOdaSayisi = mysqli_fetch_assoc($resultOdaSayilari)) {
                $odaSayisi = $rowOdaSayisi['oda_sayisi'];
                echo "<option value=\"$odaSayisi\">$odaSayisi Oda</option>";
            }
        }
        ?>
    </select>
    <button type="submit"><?php echo getTranslation('filter'); ?></button>
</form>

<?php
$ilanlar = [];

// Filtreleme yapıldıysa
if (isset($_GET['oda_sayisi']) && !empty($_GET['oda_sayisi'])) {
    $selectedOdaSayisi = $_GET['oda_sayisi'];
    // Filtreleme sorgusu
    $queryIlanlar = "SELECT * FROM ilanlar WHERE oda_sayisi = $selectedOdaSayisi";
    $resultIlanlar = mysqli_query($conn, $queryIlanlar);
    if ($resultIlanlar) {
        while ($row = mysqli_fetch_assoc($resultIlanlar)) {
            $ilanlar[] = $row;
        }
    } else {
        echo "Veri çekme hatası: " . mysqli_error($conn);
    }
} else {
    // Filtreleme yapılmadıysa
    $queryIlanlar = "SELECT * FROM ilanlar";
    $resultIlanlar = mysqli_query($conn, $queryIlanlar);
    if ($resultIlanlar) {
        while ($row = mysqli_fetch_assoc($resultIlanlar)) {
            $ilanlar[] = $row;
        }
    } else {
        echo "Veri çekme hatası: " . mysqli_error($conn);
    }
}


// İlanları çek
$resultIlanlar = mysqli_query($conn, $queryIlanlar);
// İlanları diziye yerleştir
$ilanlar = [];
if ($resultIlanlar) {
  while ($row = mysqli_fetch_assoc($resultIlanlar)) {
    $ilanlar[] = $row;
  }
} else {
  echo "Veri çekme hatası: " . mysqli_error($conn);
}

// İlanları göster
foreach ($ilanlar as $ilan) {
  // İlanları gösterme işlemleri burada yapılacak
}
?>


  <!-- ilanlar section -->
  <section class="ilanlar_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2><?php echo getTranslation('properties'); ?></h2>
      </div>
      <div class="row">
        <?php foreach($ilanlar as $ilan): ?>
        <div class="col-lg-4 col-md-6 mb-4">
          <div class="box">
            <div class="name">
              <strong><a href="ilan_detay.php?id=<?php echo $ilan['id']; ?>"><?php echo htmlspecialchars($ilan['baslik']); ?></a></strong>
              <p><?php echo getTranslation('category'); ?>: <?php echo htmlspecialchars($ilan['kategori']); ?></p> <!-- Yeni eklenen satır -->
            </div>
            <div class="img-box owl-carousel owl-theme">
              <div class="item">
                <a href="ilan_detay.php?id=<?php echo $ilan['id']; ?>">
                  <img src="images/ilanlar/<?php echo htmlspecialchars($ilan['resim']); ?>" alt="">
                </a>
              </div>
              <?php for ($i = 2; $i <= 6; $i++): ?>
                <?php if (!empty($ilan['resim' . $i])): ?>
                  <div class="item">
                    <a href="ilan_detay.php?id=<?php echo $ilan['id']; ?>">
                      <img src="images/ilanlar/<?php echo htmlspecialchars($ilan['resim' . $i]); ?>" alt="">
                    </a>
                  </div>
                <?php endif; ?>
              <?php endfor; ?>
            </div>

            <div class="detail-box">
              <b class="mb-0"><?php echo htmlspecialchars_decode($ilan['aciklama']); ?></b>
              <p class="mt-2"><?php echo getTranslation('price'); ?>: <strong><?php echo htmlspecialchars($ilan['fiyat']); ?> TL</strong></p>
              <p class="mt-2"><?php echo getTranslation('room_count'); ?>: <strong><?php echo htmlspecialchars($ilan['oda_sayisi']); ?></strong></p>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>


    </div>
  </section>
  <!-- end ilanlar section -->

  <!-- info section -->
  <section class="info_section layout_padding2">
    <div class="container">
      <div class="info_items">
        <a href="">
          <div class="item">
            <div class="img-box box-1">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p><?php echo htmlspecialchars($adres); ?></p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item">
            <div class="img-box box-2">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p><?php echo htmlspecialchars($telefon); ?></p>
            </div>
          </div>
        </a>
        <a href="">
          <div class="item">
            <div class="img-box box-3">
              <img src="" alt="">
            </div>
            <div class="detail-box">
              <p><?php echo htmlspecialchars($email); ?></p>
            </div>
          </div>
        </a>
      </div>
    </div>
  </section>
  <!-- end info section -->

  <!-- footer section -->
  <footer class="container-fluid footer_section">
    <p>&copy; 2020 All Rights Reserved. Design by
      <a href="https://html.design/">Free Html Templates</a>
    </p>
  </footer>
  <!-- footer section -->

  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- Owl Carousel JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

  <script>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
      items: 1,
      loop: true,
      margin: 10,
      nav: true,
      dots: true,
      autoplay: true,
      autoplayTimeout: 3000,
      autoplayHoverPause: true
    });
  });
  </script>

</body>
</html>