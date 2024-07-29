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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <center>
                <img src="{{ url('public') }}/assets/images/ktp.png" style="width: 20%" alt="logo">
                <h4>E-Rapat Dinas Pendidikan</h4>
                <h6 class="font-weight-light">Sistem Undangan dan Jadwal Rapar Dinas Pendidikan <br> Kabupaten Ketapang</h6>
            </center>
              </div>
            
              <form class="pt-3" action="{{url('login')}}" method="post">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" name="email" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div>
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <div class="my-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">MASUK</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register-2.html" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; {{date('Y')}}  All rights reserved. <br> <img src="{{ url('public') }}/assets/images/logo.jpg" style="max-width: 30px" alt=""> Politeknik Negeri Ketapang</p>
           
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
  <script src="{{url('public')}}/assets/js/dataTables.bootstrap4.js"></script>
  <!-- endinject -->
</body>

</html>
