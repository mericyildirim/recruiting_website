<!DOCTYPE html>
<html lang="en">
<?php   
include('baglan.php');
?>
  <head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Job Agency Website Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">

    </head>
    
    <body>
    
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ***** Preloader End ***** -->
    
    
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="anasayfa" class="logo">İş<em> Bul</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="anasayfa">Anasayfa</a></li>
                            <li><a href="işler" class="active">İşler</a></li>
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Hakkında</a>
                              
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="hakkında">Hakkımızda</a>
                                   

                                    <a class="dropdown-item" href="şartlar">Şartlar</a>
                                </div>
                            </li>
                            <li><a href="iletişim">İletişim</a></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Call to Action Start ***** -->
    <section class="section section-bg" id="call-to-action" style="background-image: url(assets/images/banner-image-1-1920x500.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2> <em>İşlerimiz</em></h2>
                        <p>Hayallerine Uygun İş, Bir Tık Uzağında!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Call to Action End ***** -->

    <?php

$url = "https://api.exchangerate-api.com/v4/latest/USD";
$json = file_get_contents($url);
$data = json_decode($json, true);
$dolar_tl = $data["rates"]["TRY"];


?>


<!-- ***** Fleet Starts ***** -->
<section class="section" id="trainers">
    <div class="container">
        <br>
        <br>

        <div class="row">
            <div class="col-lg-4">
                <form action="#" method="POST">

                    <br>

                    <h5 style="margin-bottom: 15px">Salary</h5> 

                    
                    <div>
                        <label>
                            <input type="radio" name="salary" value="30000">
                            <span>30,000₺ az</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="salary" value="30000-50000">
                            <span>30,000₺ - 50,000₺</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="salary" value="50000-70000">
                            <span>50,000₺ - 70,000₺</span>
                        </label>
                    </div>

                    <div>
                        <label>
                            <input type="radio" name="salary" value="70000">
                            <span>70,000₺ den çok</span>
                        </label>
                    </div>
                    <div>
                        <label>
                        <?php echo "Dolar ₺ Kuru: " . $dolar_tl;?>
                        </label>
                    </div>

                    <br>
                    <h5 style="margin-bottom: 15px">Category</h5>

                    <?php
                    // Query to fetch categories from the is_kategori table
                    $sql_categories = "SELECT kategori_id, kategori FROM is_kategori";
                    $result_categories = $conn->query($sql_categories);

                    // Loop through the categories and display radio buttons
                    if ($result_categories->num_rows > 0) {
                        while ($row = $result_categories->fetch_assoc()) {
                            $category_id = $row['kategori_id'];
                            $category = $row['kategori'];
                            echo '<div>
                                      <label>
                                           <input type="radio" name="category" value="' . $category_id . '">
                                           <span>' . $category . '</span>
                                      </label>
                                 </div>';
                        }
                    }
                    ?>

                    <br>

                    <h5 style="margin-bottom: 15px">Experience</h5>

                    <?php
                    // Query to fetch career levels from the tecrube table
                    $sql_career_levels = "SELECT  deneyim_id, deneyim FROM tecrube";
                    $result_career_levels = $conn->query($sql_career_levels);

                    // Loop through the career levels and display checkboxes
                    if ($result_career_levels->num_rows > 0) {
                        while ($row = $result_career_levels->fetch_assoc()) {
                            $career_level_id = $row['deneyim_id'];
                            $career_level = $row['deneyim'];
                            echo '<div>
                                      <label>
                                           <input type="checkbox" name="experience[]" value="' . $career_level_id . '">
                                           <span>' . $career_level . '</span>
                                      </label>
                                 </div>';
                        }
                    }
                    ?>

                    <br>
                    <br>

                    <button type="submit" style="background-color: #007bff; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">İş Ara</button>

                </form>

                <br>
            </div>
            <?php
            // Toplam kayıt sayısını bulma
            $sql_count = "SELECT COUNT(*) as total FROM ilanlar";
            $result_count = $conn->query($sql_count);
            $row_count = $result_count->fetch_assoc();
            $total_records = $row_count['total'];

            // Sayfa başına gösterilecek ilan sayısı
            $records_per_page = 6;

            // Toplam sayfa sayısını hesaplama
            $total_pages = ceil($total_records / $records_per_page);

            // Mevcut sayfayı belirleme (default 1)
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            if ($page < 1) $page = 1;
            if ($page > $total_pages) $page = $total_pages;

            // Offset'i hesaplama
            $offset = ($page - 1) * $records_per_page;

            $sql = "SELECT ilanlar.id, ilanlar.resim, ilanlar.maas, ilanlar.baslik, ilanlar.aciklama, is_kategori.kategori, sehirler.sehir, sirketler.sirketAdi
                    FROM ilanlar
                    JOIN is_kategori ON ilanlar.kategori_id = is_kategori.kategori_id
                    JOIN tecrube ON ilanlar.deneyim_id = tecrube.deneyim_id
                    JOIN sehirler ON ilanlar.sehirler_id = sehirler.sehirler_id
                    JOIN sirketler ON ilanlar.sirket_id = sirketler.sirket_id";

            // Check if form is submitted
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Get selected salary range
                $selectedSalary = isset($_POST['salary']) ? $_POST['salary'] : []; ;

                // Get selected categories
                $selectedCategories = isset($_POST['category']) ? $_POST['category'] : [];

                // Get selected experience levels
                $selectedExperienceLevels = isset($_POST['experience']) ? $_POST['experience'] : [];

                // Build the SQL query based on the selected filters
                $sql .= " WHERE 1=1"; // Start with a true condition

                // Add salary range filter
                if (!empty($selectedSalary)) {
                    if ($selectedSalary == "30000") {
                        $sql .= " AND ilanlar.maas < 30000";
                    } elseif ($selectedSalary == "30000-50000") {
                        $sql .= " AND ilanlar.maas >= 30000 AND ilanlar.maas <= 50000";
                    } elseif ($selectedSalary == "50000-70000") {
                        $sql .= " AND ilanlar.maas >= 50000 AND ilanlar.maas <= 70000";
                    } elseif ($selectedSalary == "70000") {
                        $sql .= " AND ilanlar.maas > 70000";
                    }
                }

                // Add category filter
                if (!empty($selectedCategories)) {
                    $category_id = $selectedCategories[0]; // Only allow selecting one category
                    $sql .= " AND is_kategori.kategori_id = $category_id";
                }

                // Add experience level filter
                if (!empty($selectedExperienceLevels)) {
                    $experienceLevels = implode("','", $selectedExperienceLevels);
                    $sql .= " AND tecrube.deneyim_id IN ('$experienceLevels')";
                }
            }

            $sql .= " LIMIT $records_per_page OFFSET $offset";
            $result = $conn->query($sql);
            ?>
            <style>
                .image-thumb img {
                    width: 300px;
                    height: 150px;
                    object-fit: scale-down; /* Resmi kesmeden boyutlandırır */
                }

                .trainer-item {
                    margin-bottom: 20px; /* İlanlar arasında boşluk bırakır */
                }

                .down-content {
                    padding: 10px;
                    background-color: #f9f9f9; /* İçerik arka plan rengi */
                    border: 1px solid #ddd; /* İçerik çerçevesi */
                    border-radius: 5px; /* Köşeleri yuvarlat */
                }

                .social-icons li {
                    display: inline;
                    margin-right: 10px;
                }

                .pagination {
                    display: flex;
                    justify-content: center;
                    list-style-type: none;
                    padding: 0;
                }

                .pagination li {
                    margin: 0 5px;
                }

                .pagination a {
                    text-decoration: none;
                    padding: 8px 16px;
                    color: #007bff;
                    border: 1px solid #ddd;
                    border-radius: 5px;
                }

                .pagination a:hover {
                    background-color: #f0f0f0;
                }
            </style>
            <body>
                <div class="col-lg-8">
                    <div class="row">
                        <?php
                        

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $jobId = isset($row["id"]) ? $row["id"] : ""; // Check if "id" key exists in the row array

                                echo '
                                <div class="col-md-6">
                                    <a href="iş_detayları?id=' . $jobId . '">
                                        <div class="trainer-item">
                                            <div class="image-thumb">
                                                <img src="images/ilanlar/' . $row["resim"] . '" alt="ilan resmi">
                                            </div>
                                            <div class="down-content">
                                                <p>' . $row["sirketAdi"] . '</p>
                                                <h4>' . $row["baslik"] . '</h4>
                                                <p>' . $row["kategori"] . ' &nbsp;/&nbsp; ' . $row["sehir"] . '</p>
                                                <span style="font-size: 20px;">' . $row["maas"] . '<sup>₺</sup></span>
                                                <ul class="social-icons">
                                                
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </div>';
                            }
                        } else {
                            echo "Herhangi Bir İŞ Bulunamadı";
                        }

                        ?>
                    </div>
                </div>
                

                <nav>
                    <ul class="pagination pagination-lg justify-content-center">
                        <?php if ($page > 1) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($page < $total_pages) : ?>
                            <li class="page-item">
                                <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </body>
            <?php $conn->close(); ?>
        </div>
    </div>
</section>
<!-- ***** Fleet Ends ***** -->

    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>
                        Copyright © 2020 İŞBUL
                        - Template by: <a href="https://www.phpjabbers.com/">PHPJabbers.com</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script> 
    <script src="assets/js/mixitup.js"></script> 
    <script src="assets/js/accordions.js"></script>
    
    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

  </body>
</html>