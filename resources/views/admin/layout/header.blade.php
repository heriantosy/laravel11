<body class="hold-transition sidebar-mini layout-fixed pace-primary">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ asset('panduan') }}" target="_blank" class="nav-link"><i class="fa fa-file-pdf"></i> Panduan</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ asset('/') }}" target="_blank" class="nav-link"><i class="fa fa-home"></i> Beranda</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link text-success" href="{{ asset('admin/user') }}">
          <i class="fa fa-lock"></i> 
          Galih
        </a>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="btn btn-primary btn-sm" href=""
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="" method="POST" class="d-none">
            @csrf
        </form>
      </li>


     


    </ul>
  </nav>
  <!-- /.navbar -->