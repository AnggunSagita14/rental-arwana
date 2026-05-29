<?php
// includes/topbar.php
// Requires: $pageTitle variable
if(!isset($pageTitle)) $pageTitle = 'Dashboard';
?>
<header class="topbar">
  <div class="topbar-left">
    <div>
      <div class="page-title"><?= htmlspecialchars($pageTitle) ?></div>
      <div class="breadcrumb"><i class="fas fa-home" style="font-size:10px"></i> Arwana RentCar / <?= htmlspecialchars($pageTitle) ?></div>
    </div>
  </div>
  <div class="topbar-right">
    <div class="search-bar">
      <i class="fas fa-search"></i>
      <input type="text" placeholder="Cari sesuatu...">
    </div>
    <div class="topbar-date">
      <i class="fas fa-calendar"></i>
      <?= date('d M Y') ?>
    </div>
    <div class="admin-profile" onclick="location.href='profile.php'">
      <div class="admin-av"><?= strtoupper(substr($_SESSION['nama'] ?? 'A', 0, 1)) ?></div>
      <div>
        <div class="admin-name"><?= htmlspecialchars($_SESSION['nama'] ?? 'Admin') ?></div>
        <div class="admin-role2">Administrator</div>
      </div>
      <i class="fas fa-chevron-down" style="font-size:10px;color:var(--text-muted)"></i>
    </div>
  </div>
</header>