<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Laporan Beli</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="backend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="backend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="backend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="backend/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="backend/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="backend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="backend/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="backend/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <i class="bi bi-list toggle-sidebar-btn"></i>
      <a href="index.html" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block">Rushbin</span>
      </a>
      
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <!-- Notification Dropdown Items -->
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <!-- Messages Dropdown Items -->
          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        @include('test.components.dropdown')

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  @include('test.components.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Transaksi Beli</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="transaksi_beli">Transaksi</a></li>
          <li class="breadcrumb-item active">Transaksi Beli</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="row">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-pills card-header-pills">
                        <li class="nav-item">
                            <a href="{{ route('transaksi.jual') }}" class="btn btn-primary">
                                Transaksi Jual
                                </a>
                              </li>
                            </ul>
                          </div>
                          <div class="card-body">
                          <div class="card-body">
                        <form method="POST" action="{{ route('transaksibeli.tambah') }}">
                          @csrf
                          <div class="form-group">
                            <div class="label-input">
                              <label for="id_sampah">Id Sampah:</label>
                              <input type="text" class="form-control custom-textbox" id="id_sampah" name="id_sampah" placeholder="Masukkan Id Sampah" required>
                            </div>
                          </div>
                          <div class="form-group">
                            <div class="label-input">
                              <label for="jumlah_sampah">Total Sampah:</label>
                              <input type="text" class="form-control custom-textbox" id="jumlah_sampah" name="jumlah_sampah" placeholder="Masukkan Total Sampah" required>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary ">Tambah</button>
                        </form>
                      </div>
                      <div class="table-responsive">
                      <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Sampah</th>
                            <th>Nama Sampah</th>
                            <th>Total Sampah</th>
                            <th>Harga Jual</th>
                            <th>Total Point</th>
                            <th>Order</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($filtered_transaksibeli as $tb)
                        @php
                            $daftarSampah = $daftar_sampah->firstWhere('id_sampah', $tb->id_sampah);
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $tb->id_sampah }}</td>
                            <td>{{ $tb->nama_sampah }}</td>
                            <td>{{ $tb->jumlah_sampah }}</td>
                            @if ($daftarSampah)
                                <td>{{ $daftarSampah->harga_jual }}</td>
                                <td>{{ $tb->point }}</td>
                            @endif
                            <td>
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal-{{ $tb->kode_transaksi }}">
                                Bayar
                            </button>
                            <form action="{{ route('transaksibeli.destroy', $tb->kode_transaksi) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Batalkan Transaksi?')">Batal</button>
                    </form>
                    
                </td>
            </tr>
            @include('test.components.modalbayar')
        @endforeach
    </tbody>
</table>
      
      </div>
    </div>
    </div>
  </div>
</section>

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Left side content -->
          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">
          <!-- Right side content -->
        </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="backend/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="backend/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="backend/assets/vendor/echarts/echarts.min.js"></script>
  <script src="backend/assets/vendor/quill/quill.min.js"></script>
  <script src="backend/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="backend/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="backend/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="backend/assets/js/main.js"></script>
  

</body>

</html>