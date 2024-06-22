<!DOCTYPE html>
<html lang="tr">
<?php
session_start();
include('editor_fonks.php');
include('editor_ses_kontrol.php');
$kid = $_SESSION['giris_yapan_uye'];
include('../baglan.php');

	$sorgu = mysqli_query($conn,"select * from uyeler where id='$kid' ");
    $satir = mysqli_fetch_array($sorgu);
	
	
	
$id = @$_GET['istek'];

?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editör Paneli </title>

    <!-- Custom fonts for this template-->
    <link href="admin_vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin_css/sb-admin-2.min.css" rel="stylesheet">
	<link href="admin_css/ek.css" rel="stylesheet">
	
	    <script src="admin_vendor/jquery/jquery.min.js"></script>
		
	<script src="admin_vendor/ckeditor5-41.2.1-usmxa9flxj4t/build/ckeditor.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="editor_index.php">
                <div class="sidebar-brand-text mx-3">Admin Panel </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="editor_index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Home</span></a>
            </li>
			<?php
			
				if ( $yetki_seviyesi == 2 ) {
			?>

            <!-- Divider -->
            <hr class="sidebar-divider">

             <!-- Heading -->
            <div class="sidebar-heading">
                Jobs
            </div>
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="?istek=ilanlar&ilan_basharf=tum">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Jobs</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?istek=ilan_ekleme">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Add Job</span></a>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="?istek=basvurular">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Applications</span></a>
            </li>
            </li>
            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="?istek=hakkinda">
                    <i class="fas fa-fw fa-table"></i>
                    <span>About us</span></a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?istek=iletisim">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Contact</span></a>
            </li>
            


			
		
			
			<?php
				}
			?>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item">
    <span class="nav-link">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $satir['adi']." ".$satir['soyadi']; ?></span>
        <a href="cikis.php">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Exit
        </a>
    </span>
</li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
				
				   <?php 
		if ( $id == "ilan_ekleme" ) {
			include('editor_ilan_ekleme.php');
		} elseif ( $id == "ilanlar" ) {
			include('editor_ilanlar.php');
		} elseif ( $id == "ilan_detay" ) {
			include('editor_ilan_detay.php');
        } elseif ( $id == "basvurular" ) {
             include('editor_basvurular.php');
        } elseif ( $id == "hakkinda" ) {
            include('editor_hakkinda.php');
       }  elseif ( $id == "iletisim" ) {
        include('editor_iletisim.php');
   }
        
		else{
		?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Anasayfa</h1>                        
                    </div>

				
                 <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Ziyaret (Günlük)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">11</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ziyaret (Haftalık)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">13</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ziyaret (Aylık)
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">12</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ziyaret (Toplam)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">13</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
                                    <h6 class="m-0 font-weight-bold text-primary">İlan Sayıları </h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    
                                        <canvas id="gr2"></canvas>
                                    
                                </div>
                            </div>
                        </div>
						
<!-- Grafik 10 -->

<script>
new Chart(document.getElementById("gr2"), {
        	type: 'bar',
        	data: {
        		labels: ["Bugün", "Bu Hafta", "Bu Ay"],
        		datasets: [{
        			label: 'Muhasebe',
        			backgroundColor: "#d9ed92",
					fill: true,
        			data: [<?php echo 23; ?>, <?php echo 26; ?>, <?php echo 56; ?>],
        		}, {
        			label: 'Finans',
        			backgroundColor: "#f3722c",
					fill: true,
        			data: [<?php echo 24; ?>, <?php echo 23; ?>, <?php echo 56; ?>],
        		}, {
        			label: 'Yemek ',
        			backgroundColor: "#90be6d",
					fill: true,
        			data: [<?php echo 25; ?>, <?php echo 56; ?>, <?php echo 56; ?>],
        		}, {
        			label: 'Sağlık',
        			backgroundColor: "#43aa8b",
					fill: true,
        			data: [<?php echo 56; ?>, <?php echo 56; ?>, <?php echo 56; ?>],
        		}, {
        			label: 'İnsan Kaynakları',
        			backgroundColor: "#4d908e",
					fill: true,
        			data: [<?php echo 23; ?>, <?php echo 23; ?>, <?php echo 23; ?>],
        		}, {
                    label: 'Mühendislik',
        			backgroundColor: "#4d908e",
					fill: true,
        			data: [<?php echo 23; ?>, <?php echo 23; ?>, <?php echo 23; ?>],
        		}
				],
        	},
        	options: {
        		tooltips: {
        			displayColors: true,
        			callbacks: {
        				mode: 'x',
        			},
        		},
				plugins: {
				  legend: {
					display : true,
					position: 'right',
				  },
				},
        		scales: {
        			x: {
        				stacked: true,
        			},
        			y: {
        				stacked: true
        			}
        		},
        		responsive: true
        	}
        });
	</script>

 <!-- Grafik 11 -->

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">İlan Sayıları</h6>
                                </div>
                                <!-- Card Body -->
                               <div class="card-body">
                                    <div style='margin: 0 auto;' >
									
                                        <canvas id="gr3"></canvas>
									
                                    </div>
                                </div>
                            </div>
                        </div>
						

							<!-- Grafik 2 -->
 
						 <?php

 


						?>

						
					
   				

                <!-- /.container-fluid -->
		<?php
		}
		?>

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; İşe Alım Yönetim Sistemi</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Çıkış Onay</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Oturumu sonlandırmak istediğinize eminmisiniz?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">İptal</button>
                    <a class="btn btn-primary" href="cikis.php">Çıkış</a>
                </div>
            </div>
        </div>
    </div>

 <!-- Bootstrap core JavaScript-->
    <script src="admin_vendor/jquery/jquery.min.js"></script>
    <script src="admin_vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin_vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin_js/sb-admin-2.min.js"></script>


    <!-- Page level plugins -->
    <script src="admin_vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="admin_vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin_js/demo/datatables-demo.js"></script>	

</body>

</html>











