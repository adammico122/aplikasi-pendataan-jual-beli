<nav class="vertnav navbar navbar-light">
    <!-- nav bar -->
    <div class="w-100 mb-2 d-flex">
      <a class="navbar-brand mx-auto mt-1 flex-fill text-center" href="/">
        <img id="logo" class="navbar-brand-img" src="{{ asset('Template/light') }}/assets/Hartono_Logo.png" width="190" height="80">
      </a>
    </div>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item dropdown">
        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
          <i class="fe fe-home fe-16 text-primary"></i>
          <span class="ml-3 item-text">Dashboard</span><span class="sr-only">(current)</span>
        </a>
        <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
          <li class="nav-item active">
            <a class="nav-link pl-3" href="/"><span class="ml-1 item-text">Default</span></a>
          </li>
        </ul>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Product</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/produk">
          <b><i class="fe fe-box fe-16 text-primary"></i>
          <span class="ml-3 item-text">List Product</span></b>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/produk/tambah">
          <b><i class="fe fe-shopping-cart fe-16 text-primary"></i>
          <span class="ml-3 item-text">Tambah Product</span></b>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/refill">
          <b><i class="fe fe-list fe-16 text-primary"></i>
          <span class="ml-3 item-text">Data Refill Product</span></b>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/refill/tambah">
          <b><i class="fe fe-plus-square fe-16 text-primary"></i>
          <span class="ml-3 item-text">Refill Product</span></b>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Transaksi</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/transaksi">
          <b><i class="fe fe-shopping-bag fe-16 text-primary"></i>
          <span class="ml-3 item-text">List Transaksi</span></b>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/transaksi/tambah">
          <b><i class="fe fe-shopping-cart fe-16 text-primary"></i>
          <span class="ml-3 item-text">Transaksi Baru</span></b>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Peminjaman</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/pinjaman">
          <b><i class="fe fe-user fe-16 text-primary"></i>
          <span class="ml-3 item-text">Data Peminjaman</span></b>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/pinjaman/tambah">
          <b><i class="fe fe-user-plus fe-16 text-primary"></i>
          <span class="ml-3 item-text">Tambah Peminjam</span></b>
        </a>
      </li>
    </ul>
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Jenis</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/produk/jenis">
          <b><i class="fe fe-list fe-16 text-primary"></i>
          <span class="ml-3 item-text">List Jenis</span></b>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="/jenis/tambah">
          <b><i class="fe fe-plus-square fe-16 text-primary"></i>
          <span class="ml-3 item-text">Tambah Jenis</span></b>
        </a>
      </li>
    </ul>
  </nav>