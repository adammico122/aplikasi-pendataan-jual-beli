<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('Template/light') }}/assets/Hartono.png">
    <title>Hartono</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{ asset('Template/light') }}/css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{ asset('Template/light') }}/css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="{{ asset('Template/light') }}/css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{ asset('Template/light') }}/css/app-light.css" id="lightTheme">
    <link rel="stylesheet" href="{{ asset('Template/light') }}/css/app-dark.css" id="darkTheme" disabled>
  </head>
  <body class="light ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form method="POST" action="{{ route('login') }}" class="col-lg-3 col-md-4 col-10 mx-auto text-center">
          @csrf
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
            <img id="logo" class="navbar-brand-img" src="{{ asset('Template/light') }}/assets/Hartono_Logo.png" width="190" height="80">
          </a>
          <h1 class="h6 mb-3">Login Page</h1>
          <div class="form-group">
            <label for="email" class="sr-only">Email address</label>
            <input type="email" id="email" name="email" class="form-control form-control-md" placeholder="Masukkan Email" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="password" class="sr-only">Password</label>
            <input type="password" id="password" name="password" class="form-control form-control-md" placeholder="Masukkan Password" required="">
          </div>
          <button class="btn btn-md btn-primary btn-block" type="submit" value="login">Login Sekarang!</button>
          <a href="{{ route('register') }}" class="btn btn-md btn-secondary btn-block">Daftar Akun</a>
          <p class="mt-5 mb-3 text-muted">©Created By <i class="fe fe-heart text-danger"></i> By. <a href="https://www.facebook.com/F1F2F12">Adam Mico</a> 2021</p>
        </form>
      </div>
    </div>
    <script src="{{ asset('Template/light') }}/js/jquery.min.js"></script>
    <script src="{{ asset('Template/light') }}/js/popper.min.js"></script>
    <script src="{{ asset('Template/light') }}/js/moment.min.js"></script>
    <script src="{{ asset('Template/light') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('Template/light') }}/js/simplebar.min.js"></script>
    <script src='{{ asset('Template/light') }}/js/daterangepicker.js'></script>
    <script src='{{ asset('Template/light') }}/js/jquery.stickOnScroll.js'></script>
    <script src="{{ asset('Template/light') }}/js/tinycolor-min.js"></script>
    <script src="{{ asset('Template/light') }}/js/config.js"></script>
    <script src="{{ asset('Template/light') }}/js/apps.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>