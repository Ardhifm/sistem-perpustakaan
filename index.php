<?php
include'koneksi.php';
$tgl=date('Y-m-d');
session_start();
if(isset($_SESSION['sesi'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistem Informasi Perpustakaan | Muhammad Ardhi Hidayad</title>

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar Perpus -->
    <ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-book"></i>
        </div>
        <div class="sidebar-brand-text mx-3">PERPUSTAKAAN UMUM BPTIK</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Beranda Perpus -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php?p=beranda">
          <i class="fa fa-fw fa-home"></i>
          <span>Halaman Utama</span></a>
      </li>

      <!-- Divider -->                 
        <hr class="sidebar-divider mt-3">

          <!-- Heading Data Master -->                 
            <div class="sidebar-heading">                     
              Data Master               
            </div> 
           
            <!-- Nav Item - Data Master -->
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=anggota">
                  <i class="fa fa-fw fa-users"></i>
                  <span>Data Anggota</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php?p=buku">
                  <i class="fa fa-fw fa-book"></i>
                  <span>Data Buku</span>
                </a>
              </li>

      <!-- Divider -->                 
      <hr class="sidebar-divider mt-3">
          <!-- Heading Data Master -->                 
            <div class="sidebar-heading">                     
              Data Transaksi              
            </div> 
          
            <!-- Nav Item - Data Master -->
              <li class="nav-item">
                <a class="nav-link" href="index.php?p=transaksi-peminjaman">
                  <i class="fa fa-fw fa-list"></i>
                  <span>Transaksi Peminjaman</span>
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php?p=transaksi-pengembalian">
                  <i class="fa fa-fw fa-list"></i>
                  <span>Transaksi Pengembalian</span>
                </a>
              </li>
      <!-- Divider -->                 
      <hr class="sidebar-divider mt-3">
          <!-- Heading Data Master -->                 
            <div class="sidebar-heading">                     
              Laporan Transaksi              
            </div> 
          
            <!-- Nav Item - Data Master -->
              <li class="nav-item">
                <a class="nav-link" a target="_blank" href="pages/cetak-data-transaksi-pengembalian.php">
                  <i class="fa fa-fw fa-address-book"></i>
                  <span>Laporan Transaksi</span>
                </a>
              </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

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
          <marquee>SISTEM INFORMASI PERPUSTAKAAN PRATIKUM JWD - 2021</marquee>
          <!-- Page Heading -->             
        <h1 class="h3 mb-2 text-gray-800"></h1> 

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo$_SESSION['sesi']; ?></span>
                <img class="img-profile rounded-circle" src="assets/images/admin-no-photo.jpg">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Keluar
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        </div>
        <!-- /.container-fluid -->
        <?php
			$pages_dir='pages';
			if(!empty($_GET['p'])){
				$pages=scandir($pages_dir,0);
				unset($pages[0],$pages[1]);
				$p=$_GET['p'];
				if(in_array($p.'.php',$pages)){
					include($pages_dir.'/'.$p.'.php');
				}else{
					echo'Halaman Tidak Ditemukan';
				}
			}else{
				include($pages_dir.'/beranda.php');
			}
		?>
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Sistem Informasi Perpustakaan (sipus) | Praktikum JWD - Muhammad Ardhi Hidayad - 2021</span>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Apakah kamu yakin akan keluar?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <a class="btn btn-info" href="login.php">Keluar</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="assets/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="assets/js/demo/chart-area-demo.js"></script>
  <script src="assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php
}
else {
	echo "<script>
		alert('Anda Harus Login Dahulu!');
	</script>";
	header('location:login.php');
}
?>