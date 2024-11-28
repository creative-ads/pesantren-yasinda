<nav class="navbar navbar-expand-lg position-fixed">
  <div class="container-fluid">
    <a href="#" class="navbar-brand d-lg-none">
      <img src="../assets/qris.jpg" alt="Logo" class="logo-mobile">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon navbar-toggler-icon"> </span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'beranda.php') ? 'active' : ''; ?> " aria-current="page" href="beranda.php"> <i class="fa fa-house"></i> Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'kegiatan.php') ? 'active' : ''; ?>" href="kegiatan.php#kegiatan"><i class="fa fa-rocket"></i> Kegiatan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'galery.php') ? 'active' : ''; ?>" href="galery.php#galery"><i class="fa fa-image"></i> Galeri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'ppdb.php') ? 'active' : ''; ?>" href="ppdb.php#ppdb"><i class="fa fa-shekel-sign"></i> PPDB</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'pengumuman.php') ? 'active' : ''; ?>" href="pengumuman.php#pengumuman"><i class="fa fa-triangle-exclamation"></i> Pengumuman</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'santri.php') ? 'active' : ''; ?>" href="santri.php#santri"><i class="fa fa-user-check"></i> Santri</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo (basename($_SERVER['PHP_SELF']) == 'video.php') ? 'active' : ''; ?>" href="video.php#video"><i class="fa fa-video"></i> Video</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit"> <i class="fa fa-magnifying-glass"></i> </button>
      </form>
    </div>
  </div>
</nav>