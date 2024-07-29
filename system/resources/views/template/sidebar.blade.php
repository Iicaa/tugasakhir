  @if(Auth::guard('pegawai')->user())
  <nav class="sidebar sidebar-offcanvas" id="sidebar">

    <ul class="nav" style="position: fixed;">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('x/beranda') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Beranda</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url('x/absensi') }}">
                <i class="mdi mdi-qrcode-scan menu-icon"></i>
                <span class="menu-title">Absensi</span>
            </a>
        </li>

        @if(Auth::guard('pegawai')->user()->pegawai_level == 2)
        <li class="nav-item">
            <a class="nav-link" href="{{ url('x/jadwal-rapat/create') }}">
                <i class="mdi mdi-forum menu-icon"></i>
                <span class="menu-title">Buat Jadwal Rapat</span>
            </a>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" href="{{ url('x/history-rapat') }}">
                <i class="mdi mdi-forum menu-icon"></i>
                <span class="menu-title">History Rapat</span>
            </a>
        </li>

    </ul>
</nav>


@else
<nav class="sidebar sidebar-offcanvas" id="sidebar">

  <ul class="nav" style="position: fixed;">
      <li class="nav-item">
          <a class="nav-link" href="{{ url('admin/beranda') }}">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link" href="{{url('admin/undangan')}}">
              <i class="mdi mdi-file-document-box menu-icon"></i>
              <span class="menu-title">List Undangan</span>
          </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('admin/data-pegawai')}}">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Data Pegawai</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{url('admin/data-bidang')}}">
            <i class="mdi mdi-monitor-multiple menu-icon"></i>
            <span class="menu-title">Data Bidang</span>
        </a>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="{{url('admin/akun-operator')}}">
          <i class="mdi mdi-file-document-box menu-icon"></i>
          <span class="menu-title">Akun Operator</span>
      </a>
  </li>

  <li class="nav-item">
      <a class="nav-link" href="{{url('admin/history')}}">
          <i class="mdi mdi-chart-pie menu-icon"></i>
          <span class="menu-title">History Rapat</span>
      </a>
  </li>



</ul>
</nav>

@endif

