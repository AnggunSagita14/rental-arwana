<?php
session_start();
if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']) {
    header('Location: dashboard.php'); exit;
}

$error = '';
if($_SERVER['REQUEST_METHOD']==='POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    // Hardcode demo + PDO check
    if($username === 'pashanggunamu' && $password === 'mbdasik') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username']  = 'pashanggunamu';
        $_SESSION['nama']      = 'Faturrahman Pasha';
        $_SESSION['role']      = 'admin';
        header('Location: dashboard.php'); exit;
    }
    // Also check DB
    require_once 'koneksi.php';
    $stmt = $conn->prepare("SELECT * FROM admin WHERE username = ? LIMIT 1");
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    if($admin && $admin['password'] === $password) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username']  = $admin['username'];
        $_SESSION['nama']      = $admin['nama'];
        $_SESSION['role']      = $admin['role'];
        header('Location: dashboard.php'); exit;
    }
    $error = 'Username atau password salah!';
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login — Arwana RentCar</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Poppins', sans-serif;
  min-height: 100vh;
  background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #0f172a 100%);
  display: flex; align-items: center; justify-content: center;
  position: relative; overflow: hidden;
}
/* Animated background circles */
body::before {
  content: ''; position: absolute; width: 600px; height: 600px;
  background: radial-gradient(circle, rgba(37,99,235,.35) 0%, transparent 70%);
  top: -150px; left: -150px; animation: float1 8s ease-in-out infinite;
}
body::after {
  content: ''; position: absolute; width: 500px; height: 500px;
  background: radial-gradient(circle, rgba(6,182,212,.25) 0%, transparent 70%);
  bottom: -100px; right: -100px; animation: float2 10s ease-in-out infinite;
}
@keyframes float1 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(30px,20px)} }
@keyframes float2 { 0%,100%{transform:translate(0,0)} 50%{transform:translate(-20px,30px)} }

.particles { position: absolute; inset: 0; overflow: hidden; }
.particle {
  position: absolute; width: 4px; height: 4px; border-radius: 50%;
  background: rgba(255,255,255,.2); animation: rise linear infinite;
}
@keyframes rise { from{transform:translateY(100vh);opacity:0} 10%{opacity:1} 90%{opacity:1} to{transform:translateY(-10vh);opacity:0} }

.login-wrap {
  position: relative; z-index: 10;
  width: 440px; max-width: 96vw;
}

/* Left branding panel (visible on wider screens) */
.login-brand {
  text-align: center; margin-bottom: 32px; color: #fff;
}
.brand-logo {
  width: 72px; height: 72px; border-radius: 20px;
  background: linear-gradient(135deg, #2563eb, #06b6d4);
  display: inline-flex; align-items: center; justify-content: center;
  font-size: 32px; margin-bottom: 16px;
  box-shadow: 0 16px 40px rgba(37,99,235,.5);
}
.brand-name { font-size: 28px; font-weight: 800; letter-spacing: -1px; }
.brand-name span { color: #60a5fa; }
.brand-tagline { font-size: 13px; color: rgba(255,255,255,.6); margin-top: 4px; }

.login-card {
  background: rgba(255,255,255,.06);
  backdrop-filter: blur(24px);
  border: 1px solid rgba(255,255,255,.12);
  border-radius: 24px;
  padding: 36px 40px;
  box-shadow: 0 32px 80px rgba(0,0,0,.4);
}

.login-title { font-size: 22px; font-weight: 700; color: #fff; margin-bottom: 4px; }
.login-sub   { font-size: 13px; color: rgba(255,255,255,.5); margin-bottom: 28px; }

.field-group { margin-bottom: 18px; }
.field-label { display: block; font-size: 12.5px; font-weight: 600; color: rgba(255,255,255,.7); margin-bottom: 8px; }
.field-wrap  { position: relative; }
.field-icon  { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: rgba(255,255,255,.4); font-size: 14px; }
.field-input {
  width: 100%; padding: 13px 14px 13px 42px;
  background: rgba(255,255,255,.08);
  border: 1.5px solid rgba(255,255,255,.12);
  border-radius: 12px; color: #fff;
  font-family: 'Poppins', sans-serif; font-size: 14px;
  outline: none; transition: all .2s;
}
.field-input::placeholder { color: rgba(255,255,255,.3); }
.field-input:focus { border-color: #60a5fa; background: rgba(255,255,255,.12); box-shadow: 0 0 0 4px rgba(96,165,250,.15); }
.field-toggle {
  position: absolute; right: 14px; top: 50%; transform: translateY(-50%);
  color: rgba(255,255,255,.4); cursor: pointer; background: none; border: none; font-size: 14px;
}

.error-box {
  background: rgba(239,68,68,.15); border: 1px solid rgba(239,68,68,.3);
  border-radius: 10px; padding: 12px 16px; color: #fca5a5;
  font-size: 13px; margin-bottom: 18px;
  display: flex; align-items: center; gap: 8px;
}

.btn-login {
  width: 100%; padding: 14px; border-radius: 12px; border: none;
  background: linear-gradient(135deg, #2563eb, #06b6d4);
  color: #fff; font-family: 'Poppins', sans-serif;
  font-size: 14px; font-weight: 700; cursor: pointer;
  transition: all .2s; letter-spacing: .3px;
  box-shadow: 0 8px 24px rgba(37,99,235,.4);
}
.btn-login:hover { transform: translateY(-2px); box-shadow: 0 12px 32px rgba(37,99,235,.5); }
.btn-login:active { transform: translateY(0); }
.btn-login .loading { border-color: #fff; border-top-color: transparent; }

.login-hint { text-align: center; margin-top: 20px; font-size: 12px; color: rgba(255,255,255,.35); }
.login-hint code { background: rgba(255,255,255,.08); padding: 2px 8px; border-radius: 4px; color: rgba(255,255,255,.6); font-family: monospace; }

.divider-line { display: flex; align-items: center; gap: 10px; margin: 20px 0; }
.divider-line::before, .divider-line::after { content:''; flex:1; height:1px; background: rgba(255,255,255,.1); }
.divider-line span { font-size: 11px; color: rgba(255,255,255,.3); }
</style>
</head>
<body>
<div class="particles">
  <?php for($i=0;$i<15;$i++): $l=rand(2,98); $d=rand(5,20); $sz=rand(2,5); ?>
  <div class="particle" style="left:<?=$l?>%;width:<?=$sz?>px;height:<?=$sz?>px;animation-duration:<?=$d?>s;animation-delay:<?=rand(0,$d)?>s"></div>
  <?php endfor; ?>
</div>

<div class="login-wrap">
  <div class="login-brand">
    <div class="brand-logo">🐟</div>
    <div class="brand-name">Arwana <span>RentCar</span></div>
    <div class="brand-tagline">Sistem Informasi Penyewaan Mobil</div>
  </div>

  <div class="login-card">
    <div class="login-title">Selamat Datang 👋</div>
    <div class="login-sub">Masuk ke panel admin Arwana RentCar</div>

    <?php if($error): ?>
    <div class="error-box"><i class="fas fa-exclamation-circle"></i> <?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" id="loginForm">
      <div class="field-group">
        <label class="field-label">Username</label>
        <div class="field-wrap">
          <i class="fas fa-user field-icon"></i>
          <input type="text" name="username" class="field-input" placeholder="Masukkan username"
                 value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required autocomplete="username">
        </div>
      </div>
      <div class="field-group">
        <label class="field-label">Password</label>
        <div class="field-wrap">
          <i class="fas fa-lock field-icon"></i>
          <input type="password" name="password" id="passwordField" class="field-input"
                 placeholder="Masukkan password" required autocomplete="current-password">
          <button type="button" class="field-toggle" onclick="togglePw()">
            <i class="fas fa-eye" id="pwEye"></i>
          </button>
        </div>
      </div>
      <button type="submit" class="btn-login" id="loginBtn">
        <i class="fas fa-sign-in-alt"></i> Masuk Sekarang
      </button>
    </form>

    <div class="login-hint">
      Demo: <code>pashanggunamu</code> / <code>mbdasik</code>
    </div>
  </div>
</div>

<script>
function togglePw() {
  const f = document.getElementById('passwordField');
  const e = document.getElementById('pwEye');
  if(f.type === 'password') { f.type = 'text'; e.className = 'fas fa-eye-slash'; }
  else { f.type = 'password'; e.className = 'fas fa-eye'; }
}
document.getElementById('loginForm').addEventListener('submit', function() {
  const btn = document.getElementById('loginBtn');
  btn.innerHTML = '<span class="loading"></span> Memproses...';
  btn.disabled = true;
});
</script>
</body>
</html>