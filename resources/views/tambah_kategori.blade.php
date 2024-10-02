<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tambah Kategori - JalanYuk </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo">
              <span>Adm JalanYuk</span>
            </a>
          </div>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item">
                <a class="nav-link" href="/dashboard">
                  <i class="mdi mdi-grid-large menu-icon"></i>
                  <span class="menu-title">Dashboard</span>
                </a>
              </li>
              <li class="nav-item nav-category">Data JalanYuk</li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#usr" aria-expanded="false" aria-controls="usr">
                  <i class="menu-icon mdi mdi-account-circle-outline"></i>
                  <span class="menu-title">User</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="usr">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/daftar-user"> Lihat User </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/user/create"> Tambah User </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#ktgr" aria-expanded="false" aria-controls="ktgr">
                  <i class="menu-icon mdi mdi-floor-plan"></i>
                  <span class="menu-title">Kategori</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ktgr">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/daftar-kategori"> Lihat Kategori </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/kategori/create"> Tambah Kategori </a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#dst" aria-expanded="false" aria-controls="dst">
                    <i class="menu-icon mdi mdi-floor-plan"></i>
                    <span class="menu-title">Destinasi</span>
                    <i class="menu-arrow"></i>
                  </a>
                  <div class="collapse" id="dst">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="/daftar-destinasi"> Lihat Destinasi </a></li>
                      <li class="nav-item"> <a class="nav-link" href="/destinasi/create"> Tambah Destinasi </a></li>
                    </ul>
                  </div>
                </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" data-bs-target="#wisata" aria-expanded="false" aria-controls="wisata">
                  <i class="menu-icon mdi mdi-card-text-outline"></i>
                  <span class="menu-title">Wisata</span>
                  <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="wisata">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/daftar-wisata"> Lihat Wisata </a></li>
                    <li class="nav-item"> <a class="nav-link" href="/wisata/create"> Tambah Wisata </a></li>
                  </ul>
                </div>
              </li>
            </ul>
          </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              <div class="grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Tambah Data Kategori</h4>
                    <form class="forms-sample" action="/kategori/create" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="nama_kategori">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama_kategori') is-invalid @enderror" id="nama_kategori" name="nama_kategori" placeholder="Nama Kategori" value="{{ old('nama_kategori') }}">
                        @error('nama_kategori')
                          <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" placeholder="Deskripsi" value="{{ old('deskripsi') }}">
                        @error('deskripsi')
                          <div class=" invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>     
            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>