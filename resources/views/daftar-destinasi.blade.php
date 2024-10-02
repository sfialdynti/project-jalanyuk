<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Daftar Destinasi - JalanYuk </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">

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
              <div class=" grid-margin stretch-card">
                <div class="card">
                  @if (Session::get('pesan'))
                    <div class="alert alert-info">
                    {{ Session::get('pesan') }}
                    </div>
                  @endif
                  <br>
                  <div class="card-body">
                    <h4 class="card-title">Destinasi</h4>
                    <div class="row mb-4">
                      <div class=" col-md-6">
                        <h5 class=""><a href="/destinasi/create" class=" text-decoration-none">Tambah Destinasi</a></h5>
                      </div>
                      <div class=" col-md-6" style="height: 20px">
                        <form class="search-form" action="/daftar-destinasi" method="post">
                          @csrf
                          <div class=" input-group">
                            <input type="search" class="form-control" placeholder="Cari" name="cari">
                            <button class="btn btn-success" type="submit">Cari</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Destinasi</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($destinasi as $key => $item)
                          <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->nama_destinasi }}</td>
                            <td>{{ $item->deskripsi }}</td>
                            <td>
                              <label class="badge badge-warning">
                                <a href="destinasi/edit/{{ $item->id }}" class=" text-decoration-none text-white">Edit</a>
                              </label>
                              <label class="badge badge-danger">
                                <a href="destinasi/delete/{{ $item->id }}" class=" text-decoration-none text-white" onclick="return window.confirm('Yakin hapus data ini?')">Hapus</a>
                              </label>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                      <div class=" my-5">
                        {{ $destinasi->withQueryString()->links() }}
                    </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
  </body>
</html>