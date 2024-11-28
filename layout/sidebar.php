<?php
// Mendapatkan nama file halaman saat ini
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<div class="sidebar">
    <div class="logo-content">
        <div class="logo">
            <i class="fas fa-gem"></i>
            <span class="logo-name">MySidebar</span>
        </div>
        <i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
        <li class="<?php echo ($currentPage == 'dashboard.php') ? 'active' : ''; ?>">
            <a href="dashboard.php">
                <i class="fas fa-chart-pie"></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'santri.php') ? 'active' : ''; ?>">
            <a href="santri.php">
                <i class="fas fa-user-graduate"></i>
                <span class="links-name">Santri</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'banner.php') ? 'active' : ''; ?>">
            <a href="banner.php">
                <i class="fas fa-mobile"></i>
                <span class="links-name">Banner</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'pengumuman.php') ? 'active' : ''; ?>">
            <a href="pengumuman.php">
                <i class="fas fa-triangle-exclamation"></i>
                <span class="links-name">Pengumuman</span>
            </a>
        </li>
        <li  class="<?php echo ($currentPage == 'dok_kegiatan.php') ? 'active' : ''; ?>">
            <a href="dok_kegiatan.php">
                <i class="fas fa-rocket"></i>
                <span class="links-name">Kegiatan</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'galery.php') ? 'active' : ''; ?>">
            <a href="galery.php">
                <i class="fas fa-images"></i>
                <span class="links-name">Galery</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'ppdb.php') ? 'active' : ''; ?>">
            <a href="ppdb.php">
                <i class="fas fa-shekel-sign"></i>
                <span class="links-name">PPDB</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'pendaftaran.php') ? 'active' : ''; ?>">
            <a href="pendaftaran.php">
                <i class="fas fa-thumbtack"></i>
                <span class="links-name">Pendaftaran</span>
            </a>
        </li>
        <li class="<?php echo ($currentPage == 'video.php') ? 'active' : ''; ?>">
            <a href="video.php">
                <i class="fas fa-video"></i>
                <span class="links-name">Video</span>
            </a>
        </li>
    </ul>
</div>

<div class="navbar">
    <div class="navbar-content">
        <div class="account">
            <i class="fas fa-user-astronaut"></i> Hi, User
        </div>
        <button class="btn btn-light"> <i class="fa fa-right-to-bracket"> </i> Logout</button>
    </div>
</div>