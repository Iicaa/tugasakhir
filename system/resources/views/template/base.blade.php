<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>E-Rapat Dinas Pendidikan</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{url('public')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{url('public')}}/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ url('public') }}/assets/images/ktp.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex justify-content-center">
        <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">  
          <a class="navbar-brand brand-logo" href="3"><img src="{{url('public')}}/assets/images/ktp.png" style="width:30px !important" alt="logo"/> <b class="text-primary">E-Rapat</b></a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{url('public')}}/assets/images/ktp.png" alt="logo"/></a>
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-sort-variant"></span>
          </button>
        </div>  
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
       
        <ul class="navbar-nav navbar-nav-right">
         <!--  <li class="nav-item dropdown mr-1">
            <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center" href="{{url('x/absensi')}}">
              <i class="mdi mdi-qrcode-scan mx-0"></i>
              <span class="count"></span>
            </a>
          </li> -->
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <img src="{{ url('public') }}/assets/images/ktp.png" alt="profile"/>
              <span class="nav-profile-name">
                @if(Auth::guard('pegawai')->user())
                {{ucwords(Auth::guard('pegawai')->user()->pegawai_nama)}}
                @else
                {{Auth::user()->nama}}
                @endif
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              @if(Auth::guard('pegawai')->user())
              <a class="dropdown-item" href="{{url('x/ganti-password')}}">
                <i class="mdi mdi-settings text-primary"></i>
                Ganti Password
              </a>
              @else
              <a class="dropdown-item" href="{{url('admin/ganti-password')}}">
                <i class="mdi mdi-settings text-primary"></i>
                Ganti Password
              </a>
              @endif
              <a href="{{url('logout')}}" onclick="return confirm('Yakin untuk keluar?')" class="dropdown-item">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      @include('template.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">


          @yield('content')

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © {{ date('Y') }} All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-sm-0 text-center"> DINAS PENDIDIKAN KABUPATEN KETAPANG | <img src="{{ url('public') }}/assets/images/" style="max-width: 25px" alt=""> <img src="{{ url('public') }}/assets/images/ktp.png" style="max-width: 20px" alt=""></span>
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
  <script src="{{url('public')}}/assets/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{url('public')}}/assets/vendors/chart.js/Chart.min.js"></script>
  <script src="{{url('public')}}/assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{url('public')}}/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{url('public')}}/assets/js/off-canvas.js"></script>
  <script src="{{url('public')}}/assets/js/hoverable-collapse.js"></script>
  <script src="{{url('public')}}/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{url('public')}}/assets/js/dashboard.js"></script>
  <script src="{{url('public')}}/assets/js/data-table.js"></script>
  <script src="{{url('public')}}/assets/js/jquery.dataTables.js"></script>
  <script src="{{url('public')}}/assets/js/instascan.min.js"></script>
  <script src="{{url('public')}}/assets/js/dataTables.bootstrap4.js"></script>
  <!-- End custom js for this page-->

  <link href="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote.min.js"></script>

  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- Notifikasi -->
  @foreach(['success', 'warning', 'error', 'info'] as $status)
  @if (session($status))
  <script>
    Swal.fire({
      icon: "{{ $status }}",
      title: "{{ Str::upper($status) }}",
      text: "{{ session($status) }}!",
      showConfirmButton: false,
      timer: 3000
    })
  </script>
  @endif
  @endforeach


  <script>
    $(document).ready(function() {
      $('#summernote').summernote({
         placeholder: 'Masukkan catatan hasil rapat di sini...',
         height: 300
      });
    });
  </script>
</body>

</html>

