<?php
// includes/sidebar.php
// Requires: $activePage variable set in parent
if(!isset($activePage)) $activePage = '';
?>
<aside class="sidebar">
  <div class="sidebar-logo">
    <div class="logo-icon">🚗</div>
    <div>
      <div class="logo-name">Arwana</div>
      <div class="logo-tagline">RentCar System</div>
    </div>
  </div>

  <div class="nav-section">
    <span class="nav-label">Menu Utama</span>
    <a href="dashboard.php" class="nav-link <?= $activePage==='dashboard'?'active':'' ?>">
      <i class="fas fa-home"></i> Dashboard
    </a>
  </div>

  <div class="nav-section">
    <span class="nav-label">Manajemen Data</span>
    <a href="mobil.php" class="nav-link <?= $activePage==='mobil'?'active':'' ?>">
      <i class="fas fa-car"></i> Data Mobil
    </a>
    <a href="penyewa.php" class="nav-link <?= $activePage==='penyewa'?'active':'' ?>">
      <i class="fas fa-users"></i> Data Penyewa
    </a>
  </div>

  <div class="nav-section">
    <span class="nav-label">Transaksi</span>
    <a href="reservasi.php" class="nav-link <?= $activePage==='reservasi'?'active':'' ?>">
      <i class="fas fa-calendar-check"></i> Reservasi
    </a>
    <a href="pembayaran.php" class="nav-link <?= $activePage==='pembayaran'?'active':'' ?>">
      <i class="fas fa-credit-card"></i> Pembayaran
    </a>
    <a href="pengembalian.php" class="nav-link <?= $activePage==='pengembalian'?'active':'' ?>">
      <i class="fas fa-undo-alt"></i> Pengembalian
    </a>
  </div>

  <div class="nav-section">
    <span class="nav-label">Laporan & Sistem</span>
    <a href="laporan.php" class="nav-link <?= $activePage==='laporan'?'active':'' ?>">
      <i class="fas fa-chart-bar"></i> Laporan
    </a>
    <a href="profile.php" class="nav-link <?= $activePage==='profile'?'active':'' ?>">
      <i class="fas fa-cog"></i> Profile & Settings
    </a>
  </div>

  <div class="sidebar-footer">
    <div class="user-mini" onclick="location.href='profile.php'">
      <div class="user-av">A</div>
      <div>
        <div class="user-mini-name"><?= htmlspecialchars($_SESSION['nama'] ?? 'Admin') ?></div>
        <div class="user-mini-role">Administrator</div>
      </div>
      <i class="fas fa-chevron-right" style="margin-left:auto;color:#475569;font-size:11px"></i>
    </div>
  </div>
</aside>