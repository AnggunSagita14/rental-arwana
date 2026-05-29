<?php
session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

/* TOTAL MOBIL */
$queryMobil =
$conn->query("SELECT COUNT(*) as total FROM mobil");

$dataMobil =
$queryMobil->fetch(PDO::FETCH_ASSOC);

$totalMobil =
$dataMobil['total'];

/* TOTAL PENYEWA */
$queryPenyewa =
$conn->query("SELECT COUNT(*) as total FROM penyewa");

$dataPenyewa =
$queryPenyewa->fetch(PDO::FETCH_ASSOC);

$totalPenyewa =
$dataPenyewa['total'];

/* TOTAL RESERVASI */
$queryReservasi =
$conn->query("SELECT COUNT(*) as total FROM reservasi");

$dataReservasi =
$queryReservasi->fetch(PDO::FETCH_ASSOC);

$totalReservasi =
$dataReservasi['total'];

/* TOTAL PENDAPATAN */
$queryPendapatan =
$conn->query("SELECT SUM(jumlah_pembayaran) as total FROM pembayaran");

$dataPendapatan =
$queryPendapatan->fetch(PDO::FETCH_ASSOC);

$totalPendapatan =
$dataPendapatan['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
    content="width=device-width, initial-scale=1.0">

    <title>
        Dashboard | Rental Mobil Arwana
    </title>

    <!-- GOOGLE FONT -->

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
    rel="stylesheet">

    <!-- FONT AWESOME -->

    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
    
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

html,body{
    overflow-x:hidden;
}

body{
    background:#f5f7fb;
    display:flex;
    min-height:100vh;
}

/* SIDEBAR */

.sidebar{
    width:270px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;

    background:linear-gradient(180deg,#2563eb,#1d4ed8);

    padding:30px 22px;
    color:white;
}

.logo{
    display:flex;
    align-items:center;
    gap:15px;
    margin-bottom:50px;
}

.logo-icon{
    width:58px;
    height:58px;
    border-radius:20px;
    background:rgba(255,255,255,0.15);

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;
}

.logo h2{
    font-size:30px;
}

.logo p{
    font-size:14px;
    opacity:0.8;
}

/* MENU */

.menu{
    display:flex;
    flex-direction:column;
    gap:12px;
    margin-top:20px;
}

.menu a{
    text-decoration:none;
    color:white;

    height:58px;

    border-radius:18px;

    display:flex;
    align-items:center;
    gap:15px;

    padding:0 20px;

    transition:0.3s;
}

.menu a:hover{
    background:rgba(255,255,255,0.12);
}

.active{
    background:white !important;
    color:#2563eb !important;
    font-weight:600;
}

/* LOGOUT */

.logout{
    position:absolute;
    bottom:30px;
    width:calc(100% - 44px);
}

.logout a{
    text-decoration:none;
    color:white;

    height:58px;

    border-radius:18px;

    display:flex;
    align-items:center;
    gap:15px;

    padding:0 20px;
}

.logout a:hover{
    background:rgba(255,255,255,0.12);
}

/* MAIN */

.main{
    margin-left:270px;
    width:calc(100% - 270px);
    padding:30px;
}

/* TOPBAR */

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:35px;
}

.search{
    width:360px;
    height:58px;

    background:white;

    border-radius:20px;

    padding:0 20px;

    display:flex;
    align-items:center;
    gap:14px;

    box-shadow:0 10px 25px rgba(0,0,0,0.04);
}

.search input{
    border:none;
    outline:none;
    background:none;
    width:100%;
}

.profile{
    display:flex;
    align-items:center;
    gap:15px;
}

.profile img{
    width:55px;
    height:55px;
    border-radius:50%;
    object-fit:cover;
}

/* HERO */

.hero{
    width:100%;

    background:linear-gradient(135deg,#2563eb,#1d4ed8);

    border-radius:30px;

    padding:40px;

    color:white;

    margin-bottom:30px;
}

.hero h1{
    font-size:38px;
    margin-bottom:12px;
}

.hero p{
    opacity:0.9;
    line-height:1.8;
}

/* STATS */

.cards{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:22px;
    margin-bottom:30px;
}

.card{
    background:white;
    border-radius:28px;
    padding:24px;

    box-shadow:0 10px 30px rgba(0,0,0,0.05);

    transition:0.3s;
}

.card:hover{
    transform:translateY(-5px);
}

.icon{
    width:62px;
    height:62px;

    border-radius:18px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;

    margin-bottom:20px;
}

.blue{
    background:#dbeafe;
    color:#2563eb;
}

.green{
    background:#dcfce7;
    color:#16a34a;
}

.orange{
    background:#ffedd5;
    color:#ea580c;
}

.purple{
    background:#ede9fe;
    color:#7c3aed;
}

.red{
    background:#fee2e2;
    color:#dc2626;
}

.card h2{
    font-size:32px;
    margin-bottom:8px;
}

.card p{
    color:#6b7280;
}

/* STATUS */

.status-wrapper{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:25px;
    margin-bottom:30px;
}

.hero-mini{
    background:linear-gradient(135deg,#2563eb,#1d4ed8);
    border-radius:30px;
    padding:35px;
    color:white;
}

.hero-mini h2{
    font-size:35px;
    margin-bottom:10px;
}

.status-card{
    background:white;
    border-radius:30px;
    padding:30px;

    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.progress{
    height:12px;
    background:#e5e7eb;
    border-radius:30px;
    overflow:hidden;
    margin-top:10px;
}

.fill-green{
    width:80%;
    height:100%;
    background:#22c55e;
}

.fill-orange{
    width:45%;
    height:100%;
    background:#f59e0b;
}

/* ACTIVITY */

.content-card{
    background:white;
    border-radius:30px;
    padding:30px;

    box-shadow:0 10px 30px rgba(0,0,0,0.05);
}

.content-card h3{
    margin-bottom:25px;
}

.activity-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.activity-item{
    background:#f9fafb;
    border-radius:24px;
    padding:25px;
}

.activity-icon{
    width:65px;
    height:65px;
    border-radius:20px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;

    margin-bottom:20px;
}

/* RESPONSIVE */

@media(max-width:1200px){

    .cards{
        grid-template-columns:repeat(2,1fr);
    }

    .activity-grid{
        grid-template-columns:repeat(2,1fr);
    }

    .status-wrapper{
        grid-template-columns:1fr;
    }
}

@media(max-width:768px){

    .sidebar{
        display:none;
    }

    .main{
        margin-left:0;
        width:100%;
    }

    .cards{
        grid-template-columns:1fr;
    }

    .activity-grid{
        grid-template-columns:1fr;
    }

    .topbar{
        flex-direction:column;
        gap:20px;
    }

    .search{
        width:100%;
    }
}

.search input{

    border:none;
    outline:none;
    background:none;

    width:100%;
}

.profile{

    display:flex;
    align-items:center;

    gap:15px;
}

.profile img{

    width:55px;
    height:55px;

    border-radius:50%;

    object-fit:cover;
}

/* TITLE */

.title{

    margin-bottom:30px;
}

.title h1{

    font-size:36px;

    margin-bottom:10px;

    color:#111827;
}

.title p{

    color:#6b7280;
}

/* HERO */

.hero{

    width:100%;

    background:
    linear-gradient(
        135deg,
        #2563eb,
        #1d4ed8
    );

    border-radius:32px;

    padding:40px;

    color:white;

    margin-bottom:30px;
}

.hero h1{

    font-size:40px;

    margin-bottom:12px;
}

.hero p{

    opacity:0.9;

    max-width:700px;

    line-height:1.8;
}

/* STATS */

.cards{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:22px;

    margin-bottom:30px;
}

.card{

    background:white;

    border-radius:28px;

    padding:24px;

    min-height:170px;

    box-shadow:
    0 10px 25px rgba(0,0,0,0.05);

    transition:0.3s;
}

.card:hover{

    transform:translateY(-5px);
}

.card-top{

    margin-bottom:25px;
}

.icon{

    width:65px;
    height:65px;

    border-radius:20px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;
}

.blue{
    background:#dbeafe;
    color:#2563eb;
}

.green{
    background:#dcfce7;
    color:#16a34a;
}

.orange{
    background:#ffedd5;
    color:#ea580c;
}

.purple{
    background:#ede9fe;
    color:#7c3aed;
}
.red{
    background:#fee2e2;
    color:#dc2626;
}

.card h2{

    font-size:34px;

    margin-bottom:8px;

    color:#111827;
}

.card p{

    color:#6b7280;

    font-size:15px;
}

/* ACTIVITY */

.content-card{

    width:100%;

    background:white;

    border-radius:32px;

    padding:30px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.04);
}

.content-card h3{

    margin-bottom:25px;

    font-size:24px;
}

.activity-grid{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:20px;
}

.activity-item{

    background:#f9fafb;

    border-radius:24px;

    padding:25px;

    min-height:250px;
}

.activity-icon{

    width:65px;
    height:65px;

    border-radius:20px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;

    margin-bottom:20px;
}

.activity-item h4{

    font-size:22px;

    margin-bottom:15px;
}

.activity-item p{

    color:#6b7280;

    line-height:1.8;

    margin-bottom:20px;
}

.activity-item small{

    color:#9ca3af;
}

/* RESPONSIVE */

@media(max-width:1200px){

    .cards{
        grid-template-columns:repeat(2,1fr);
    }

    .activity-grid{
        grid-template-columns:repeat(2,1fr);
    }
}

@media(max-width:768px){

    .sidebar{
        display:none;
    }

    .main{
        margin-left:0;
        width:100%;
    }

    .cards{
        grid-template-columns:1fr;
    }

    .activity-grid{
        grid-template-columns:1fr;
    }

    .topbar{
        flex-direction:column;
        gap:20px;
    }

    .search{
        width:100%;
    }
}

        /* SIDEBAR */

        .sidebar{

            width:270px;
            height:100vh;

            background:
            linear-gradient(
                180deg,
                #2563eb,
                #1d4ed8
            );

            padding:30px 22px;

            position:fixed;

            color:white;
        }

        /* LOGO */

        .logo{

            display:flex;
            align-items:center;

            gap:15px;

            margin-bottom:50px;
        }

        .logo-icon{

            width:58px;
            height:58px;

            border-radius:20px;

            background:rgba(255,255,255,0.15);

            display:flex;
            justify-content:center;
            align-items:center;

            font-size:24px;
        }

        .logo h2{

            font-size:28px;
        }

        .logo p{

            font-size:14px;

            opacity:0.8;
        }

        /* MENU */

        .menu-title{

            font-size:13px;

            opacity:0.7;

            margin-bottom:15px;
        }

      .menu{

    display:flex;
    flex-direction:column;

    gap:12px;

    margin-top:-10px;
    margin-bottom:90px;
}

.menu a{

    text-decoration:none;

    color:white;

    height:58px;

    border-radius:18px;

    display:flex;
    align-items:center;

    gap:15px;

    padding:0 20px;

    font-size:16px;
    font-weight:500;
}

.menu a:hover{

    background:rgba(255,255,255,0.15);
}

.active{

    background:white;
    color:#2563eb !important;
    font-weight:600;
}

        /* MAIN */

 .main{

    margin-left:270px;

    width:calc(100% - 270px);

    padding:30px;
}

        /* TOPBAR */

        .topbar{

            display:flex;
            justify-content:space-between;
            align-items:center;

            margin-bottom:40px;
        }

        .search{

            width:360px;
            height:60px;

            background:white;

            border-radius:20px;

            padding:0 20px;

            display:flex;
            align-items:center;

            gap:15px;

            box-shadow:
            0 10px 30px rgba(0,0,0,0.04);
        }

        .search input{

            border:none;
            outline:none;

            width:100%;

            background:none;
        }

        .profile{

            display:flex;
            align-items:center;

            gap:15px;
        }

        .profile img{

            width:55px;
            height:55px;

            border-radius:50%;
        }

        /* TITLE */

      .title{

    margin-top:-15px;

    margin-bottom:25px;
}

       .title h1{

    font-size:30px;

            margin-bottom:10px;

            color:#111827;
        }

        .title p{

            color:#6b7280;
        }

        /* CARD */

.cards{

    display:grid;

    grid-template-columns:repeat(4,1fr);

    gap:22px;

    margin-bottom:30px;
}

.card{

    background:white;

    border-radius:28px;

    padding:24px;

    min-height:170px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.05);

    transition:0.3s;

    position:relative;

    overflow:hidden;
}
.card:hover{

    transform:translateY(-5px);

    box-shadow:
    0 15px 35px rgba(37,99,235,0.12);
}

       .card-top{

    display:flex;

    justify-content:flex-start;

    align-items:center;

    margin-bottom:20px;
}

.icon{

    width:62px;

    height:62px;

    border-radius:18px;

    display:flex;
    justify-content:center;
    align-items:center;

    font-size:24px;
}

        .blue{

            background:#dbeafe;
            color:#2563eb;
        }

        .green{

            background:#dcfce7;
            color:#16a34a;
        }

        .orange{

            background:#ffedd5;
            color:#ea580c;
        }

        .purple{

            background:#ede9fe;
            color:#7c3aed;
        }

.card h2{

    font-size:34px;

    font-weight:700;

    color:#111827;

    margin-bottom:8px;
}

.card p{

    color:#6b7280;

    font-size:15px;

    font-weight:500;
}

        /* CONTENT */

        .content{

            display:grid;

            grid-template-columns:2fr 1fr;

            gap:24px;
        }

.content-card{

    width:100%;

    background:white;

    border-radius:30px;

    padding:28px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.04);
}

        /* CHART */

        .chart{

            height:320px;

            background:
            linear-gradient(
                180deg,
                #eff6ff,
                #ffffff
            );

            border-radius:24px;

            margin-top:20px;

            position:relative;

            overflow:hidden;
        }

        .wave{

            position:absolute;

            width:100%;
            height:100%;

            background:
            linear-gradient(
                rgba(37,99,235,0.2),
                transparent
            );

            clip-path: polygon(
                0% 75%,
                10% 65%,
                20% 70%,
                30% 40%,
                40% 55%,
                50% 30%,
                60% 45%,
                70% 35%,
                80% 60%,
                90% 20%,
                100% 35%,
                100% 100%,
                0% 100%
            );
        }

        /* BOOKING */

       .booking img{

    width:75px;

    border-radius:14px;
}
.booking img{

    width:90px;

    height:60px;

    object-fit:cover;

    border-radius:14px;
}

        .booking-info{

            flex:1;
        }

        .status{

            padding:10px 15px;

            border-radius:30px;

            font-size:13px;
        }

        .success{

            background:#dcfce7;
            color:#16a34a;
        }

        .pending{

            background:#fef3c7;
            color:#d97706;
        }

        /* LOGOUT */

        .logout{

    position:absolute;

    bottom:30px;

    width:calc(100% - 44px);
}

.logout a{

    text-decoration:none;

    color:white;

    height:58px;

    border-radius:18px;

    display:flex;

    align-items:center;

    gap:15px;

    padding:0 20px;

    font-weight:500;

    transition:0.3s;
}

.logout a:hover{

    background:#dbeafe;

    transform:translateY(-2px);
}
.booking{

    display:flex;

    align-items:center;

    gap:18px;

    margin-top:22px;
}

.booking img{

    width:90px;

    height:60px;

    object-fit:cover;

    border-radius:14px;
}

.booking-info strong{

    font-size:18px;
}

.booking-info p{

    font-size:14px;

    color:#6b7280;
}

.content-card h3{

    font-size:18px;
}
    </style>

</head>

<body>

    <!-- SIDEBAR -->

   <div class="sidebar">

    <div class="logo">

        <div class="logo-icon">

            <i class="fa-solid fa-car-side"></i>

        </div>

        <div>

            <h2>Arwana</h2>
            <p>Rental Mobil</p>

        </div>

    </div>

    <p style="margin:40px 0 20px;color:#dbeafe;font-size:14px;">
        MAIN MENU
    </p>

    <div class="menu">

       <a href="dashboard.php" class="active">

    <i class="fa-solid fa-house"></i>

    Dashboard

</a>

        <a href="mobil.php">

            <i class="fa-solid fa-car"></i>

            Data Mobil

        </a>

        <a href="penyewa.php">

            <i class="fa-solid fa-users"></i>

            Penyewa

        </a>

        <a href="reservasi.php">

            <i class="fa-solid fa-calendar"></i>

            Reservasi

        </a>

        <a href="pembayaran.php">

            <i class="fa-solid fa-wallet"></i>

            Pembayaran

        </a>

        <a href="pengembalian.php">

            <i class="fa-solid fa-rotate-left"></i>

            Pengembalian

        </a>

    </div>

   <div class="logout">

    <a href="logout.php">

        <i class="fa-solid fa-right-from-bracket"></i>

        Logout

    </a>

</div>

</div>
    <!-- MAIN -->

    <div class="main">

        <!-- TOPBAR -->

        <div class="topbar">

            <div class="search">

                <i class="fa-solid fa-magnifying-glass"></i>

                <input
                type="text"
                placeholder="Search...">

            </div>

            <div class="profile">

                <img src="anggun.jpg">

                <div>

                    <h4>

                        <?php
                        echo $_SESSION['admin'];
                        ?>

                    </h4>

                    <p>
                        Administrator
                    </p>

                </div>

            </div>

        </div>

        <!-- TITLE -->

        <div class="title">

            <h1>
                Dashboard
            </h1>

            <p>
                Selamat datang kembali di
                Rental Mobil Arwana
            </p>

        </div>

<!-- CARDS -->

<div class="cards">

    <div class="card">
        <div class="icon blue">
            <i class="fa-solid fa-car"></i>
        </div>

        <h2><?= $totalMobil ?></h2>
        <p>Total Mobil</p>
    </div>

    <div class="card">
        <div class="icon green">
            <i class="fa-solid fa-users"></i>
        </div>

        <h2><?= $totalPenyewa ?></h2>
        <p>Total Penyewa</p>
    </div>

    <div class="card">
        <div class="icon orange">
            <i class="fa-solid fa-calendar"></i>
        </div>

        <h2><?= $totalReservasi ?></h2>
        <p>Total Reservasi</p>
    </div>

    <div class="card">
        <div class="icon purple">
            <i class="fa-solid fa-wallet"></i>
        </div>

        <h2>
            Rp <?= number_format($totalPendapatan,0,',','.') ?>
        </h2>

        <p>Total Pendapatan</p>
    </div>

</div>

<!-- HERO + STATUS -->

<div class="status-wrapper">

    <!-- HERO -->

    <div class="hero-mini">

        <h2>Rental Mobil Arwana</h2>

        <p style="margin-top:10px; line-height:1.8;">
            Kelola mobil, reservasi, penyewa,
            pembayaran, dan pengembalian
            dalam satu dashboard modern.
        </p>

        <div style="display:flex; gap:15px; margin-top:25px; flex-wrap:wrap;">

            <div style="
            background:rgba(255,255,255,0.15);
            padding:12px 18px;
            border-radius:16px;
            ">
                <i class="fa-solid fa-car"></i>
                <?= $totalMobil ?> Mobil
            </div>

            <div style="
            background:rgba(255,255,255,0.15);
            padding:12px 18px;
            border-radius:16px;
            ">
                <i class="fa-solid fa-users"></i>
                <?= $totalPenyewa ?> Penyewa
            </div>

        </div>

    </div>

    <!-- STATUS -->

    <div class="status-card">

        <h3 style="margin-bottom:25px;">
            Status Rental
        </h3>

        <div style="margin-bottom:25px;">

            <p>Mobil Tersedia</p>

            <div class="progress">
                <div class="fill-green"></div>
            </div>

        </div>

        <div>

            <p>Mobil Disewa</p>

            <div class="progress">
                <div class="fill-orange"></div>
            </div>

        </div>

    </div>

</div>

<!-- MOBIL TERBARU -->

<div class="content-card" style="margin-bottom:30px;">

    <h3>Mobil Rental</h3>

    <div class="activity-grid">

        <!-- MOBIL 1 -->

        <div class="activity-item">

            <div class="activity-icon blue">
                <i class="fa-solid fa-car-side"></i>
            </div>

            <h4>Toyota Alphard</h4>

            <p>
                Plat: KB1001AA
            </p>

            <span class="status pending">
                Disewa
            </span>

        </div>

        <!-- MOBIL 2 -->

        <div class="activity-item">

            <div class="activity-icon green">
                <i class="fa-solid fa-car"></i>
            </div>

            <h4>Honda Civic</h4>

            <p>
                Plat: KB1002BB
            </p>

            <span class="status success">
                Tersedia
            </span>

        </div>

        <!-- MOBIL 3 -->

        <div class="activity-item">

            <div class="activity-icon orange">
                <i class="fa-solid fa-car-side"></i>
            </div>

            <h4>Wuling Alvez</h4>

            <p>
                Plat: KB1009II
            </p>

            <span class="status pending">
                Disewa
            </span>

        </div>

        <!-- MOBIL 4 -->

        <div class="activity-item">

            <div class="activity-icon purple">
                <i class="fa-solid fa-car"></i>
            </div>

            <h4>Toyota Camry</h4>

            <p>
                Plat: KB1010CC
            </p>

            <span class="status success">
                Tersedia
            </span>

        </div>

    </div>

</div>

<!-- AKTIVITAS -->

<div class="content-card">

    <h3>Aktivitas Terbaru</h3>

    <div class="activity-grid">

        <!-- 1 -->

        <div class="activity-item">

            <div class="activity-icon blue">
                <i class="fa-solid fa-calendar-check"></i>
            </div>

            <h4>Reservasi Baru</h4>

            <p>
                Aurelian Kazemi melakukan reservasi mobil.
            </p>

            <small>
                10 Juni 2026, 09:15
            </small>

        </div>

        <!-- 2 -->

        <div class="activity-item">

            <div class="activity-icon green">
                <i class="fa-solid fa-rotate-left"></i>
            </div>

            <h4>Pengembalian</h4>

            <p>
                Toyota Alphard telah dikembalikan.
            </p>

            <small>
                10 Juni 2026, 10:15
            </small>

        </div>

        <!-- 3 -->

        <div class="activity-item">

            <div class="activity-icon purple">
                <i class="fa-solid fa-wallet"></i>
            </div>

            <h4>Pembayaran</h4>

            <p>
                Keinan Alvero melakukan pembayaran.
            </p>

            <small>
                10 Juni 2026, 11:00
            </small>

        </div>

        <!-- 4 -->

        <div class="activity-item">

            <div class="activity-icon red">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>

            <h4>Denda</h4>

            <p>
                Naufal Akram terkena denda keterlambatan.
            </p>

            <small>
                10 Juni 2026, 21:25
            </small>

        </div>

    </div>

</div>

</div>

</body>
</html>