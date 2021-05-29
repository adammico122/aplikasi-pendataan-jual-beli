<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('Template/light') }}/assets/Hartono.png">
    <title>Hartono - Daftar</title>
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
        <form method="POST" action="{{ route('register') }}" class="col-lg-6 col-md-8 col-10 mx-auto">
            @csrf
          <div class="mx-auto text-center my-4">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="/">
                <img id="logo" class="navbar-brand-img" src="{{ asset('Template/light') }}/assets/Hartono_Logo.png" width="190" height="80">
              </a>
            <h2 class="my-3">Daftar Sekarang!</h2>
          </div>
          <div class="form-group">
            <label for="email">Email Anda</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Masukkan Email Anda">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
          <div class="form-row">
            <div class="form-group col-md-12 col-lg-12 col-sm-12">
              <label for="name">Nama Anda</label>
              <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Anda">
              @error('name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
            </div>
          </div>
          <hr class="my-4">
          <div class="row mb-4">
            <div class="col-md-6">
              <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Buat Password Baru">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror  
            </div>
              <div class="form-group">
                <label for="password_confirmation">Password Konfirmasi</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Konfirmasi">
            </div>
            </div>
            <div class="col-md-6">
              <p class="mb-2">Password requirements</p>
              <p class="small text-muted mb-2"> Untuk Membuat Password, Pastikan Anda Mengikuti Langkah Dibawah ini: </p>
              <ul class="small text-muted pl-4 mb-0">
                <li> Minimal memilik 8 character </li>
                <li>Setidaknya memiliki 1 angka</li>
                <li>Password harus sama dengan password konfirmasi </li>
              </ul>
            </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
          <p class="mt-5 mb-3 text-muted text-center">©Created By <i class="fe fe-heart text-danger"></i> By <a href="https://www.facebook.com/F1F2F12">Adam Mico</a> 2021</p>
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
