<?php

include '../koneksi.php';

session_start();

if($_SESSION['status'] != 'login'){

    session_unset();
    session_destroy();

    header("location:../");

}

if (isset($_POST['simpan'])) {

    // File upload handling
    $gambar_lapangan = $_FILES['foto']['name'];
    $gambar_temp = $_FILES['foto']['tmp_name'];
    $upload_dir = '../uploads/'; // Specify your upload directory

    $lokasi_foto = "uploads/" . $gambar_lapangan;

    if (move_uploaded_file($gambar_temp, $upload_dir . $gambar_lapangan)) {
        // Save data to database
        $simpan = mysqli_query($koneksi, "INSERT INTO lapangan (nama_lapangan, harga, id_kategori, foto, fasilitas) 
        VALUES ('$_POST[nama_lapangan]', '$_POST[harga]', '$_POST[id_kategori]', '$lokasi_foto', '$_POST[fasilitas]')");

        if ($simpan) {
            echo "<script>
                    alert('Simpan data sukses!');
                    document.location='lapangan.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Simpan data Gagal!');
                    document.location='lapangan.php';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Upload foto gagal!');
                document.location='lapangan.php';
              </script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dashboard</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="assets/vendors/jquery-bar-rating/css-stars.css">
    <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile border-bottom">
            <a href="#" class="nav-link flex-column">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile">
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex ms-0 mb-3 flex-column">
                <span class="fw-semibold mb-1 mt-2 text-center"><?= $_SESSION['nama_admin'] ?></span>
              </div>
            </a>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Home</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-compass-outline menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="pt-2 pb-1">
            <span class="nav-item-head">Fitur</span>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Lapangan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="lapangan.php">Lihat Lapangan</a></li>
                <li class="nav-item"> <a class="nav-link" href="tambahlapangan.php">Tambah Lapangan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
              <i class="mdi mdi-contacts menu-icon"></i>
              <span class="menu-title">Reservasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Lihat Reservasi</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Lihat Laporan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Rating Lapangan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="#">Lihat Rating</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pelanggan" aria-expanded="false" aria-controls="pelanggan">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Pelanggan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pelanggan">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pelanggan.php">Pelanggan</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="navbar-menu-wrapper d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-chevron-double-left"></span>
            </button>
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown d-none d-md-block">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <div class="nav-profile-text">Profile </div>
                </a>
                <div class="dropdown-menu center navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item" href="hapusSession.php">
                    <i class="flag-icon flag-icon-bl me-3"></i> Logout </a>
                  <div class="dropdown-divider"></div>
                </div>
              </li>
              <li class="nav-item nav-logout d-none d-lg-block">
                <a class="nav-link" href="index.php">
                  <i class="mdi mdi-home-circle"></i>
                </a>
                
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Tambah Lapangan</h3>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form class="forms-sample" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="nama_lapangan">Nama Lapangan</label>
                        <input type="text" class="form-control" id="nama_lapangan" name="nama_lapangan" placeholder="Nama Lapangan" autofocus required>
                      </div>
                      <div class="form-group">
                        <label for="harga">Harga/Jam</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga" required>
                      </div>
                      <div class="form-group">
                        <label for="id_kategori">Kategori Lapangan</label>
                        <select class="form-select" id="id_kategori" name="id_kategori" required>
                          <option disabled selected>Pilih Kategori</option>
                          <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM kategori");
                            while($data = mysqli_fetch_array($tampil)):
                            ?>
                          <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                          <?php
                            endwhile; 
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="foto" class="file-upload-default" required>
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image" required>
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="fasilitas">Fasilitas</label>
                        <textarea class="form-control" id="fasilitas" name="fasilitas" rows="10" required></textarea>
                      </div>
                      <button type="submit" name="simpan" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="assets/vendors/jquery-bar-rating/jquery.barrating.min.js"></script>
    <script src="assets/vendors/chart.js/chart.umd.js"></script>
    <script src="assets/vendors/flot/jquery.flot.js"></script>
    <script src="assets/vendors/flot/jquery.flot.resize.js"></script>
    <script src="assets/vendors/flot/jquery.flot.categories.js"></script>
    <script src="assets/vendors/flot/jquery.flot.fillbetween.js"></script>
    <script src="assets/vendors/flot/jquery.flot.stack.js"></script>
    <script src="assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="assets/js/proBanner.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
    <script src="assets/js/file-upload.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        new DataTable('#example');
    </script>
  </body>
</html>