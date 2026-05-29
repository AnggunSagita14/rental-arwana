<?php
session_start();

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Pembayaran</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f5f7fb;
    display:flex;
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

    transition:0.3s;
}

.menu a:hover{

    background:rgba(255,255,255,0.15);
}

.active{

    background:white !important;

    color:#2563eb !important;

    font-weight:600;
}

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

/* MAIN */

.main{
    margin-left:270px;
    width:calc(100% - 270px);
    padding:35px;
}

.topbar{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:25px;
}

.title h1{

    font-size:34px;
    margin-bottom:8px;
}

.title p{
    color:#6b7280;
}

.actions-top{

    display:flex;
    gap:15px;
}

.search{

    width:280px;
    height:52px;

    background:white;

    border-radius:16px;

    padding:0 18px;

    display:flex;
    align-items:center;

    gap:12px;
}

.search input{

    border:none;
    outline:none;
    width:100%;
}

/* CARD */

.stats{

    display:flex;

    gap:20px;

    margin-bottom:25px;

    align-items:stretch;
}

.stat-card{

    background:white;

    padding:25px;

    border-radius:24px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.04);
}

.stat-card h3{

    color:#6b7280;

    font-size:15px;

    margin-bottom:12px;
}

.stat-card h1{

    font-size:32px;
}

/* TABLE */

    .table-card{
margin-top:10px;

    background:white;

    border-radius:28px;

    padding:25px;

    overflow-x:auto;

    width:100%;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.04);
}

table{

    width:100%;

    border-collapse:collapse;
}

th,
td{

    padding:18px 16px;

    text-align:left;

    white-space:nowrap;
}

.actions{

    display:flex;
    gap:10px;
}

.action-btn{

    width:40px;
    height:40px;

    border:none;

    border-radius:12px;

    color:white;

    cursor:pointer;
}

.edit{
    background:#f59e0b;
}

.delete{
    background:#ef4444;
}
.detail{
    background:#2563eb;
}
/* STATUS */

.status{

    padding:8px 14px;

    border-radius:999px;

    font-size:13px;

    font-weight:600;
}

.lunas{

    background:#dcfce7;
    color:#166534;
}

.belum{

    background:#fee2e2;
    color:#dc2626;
}

/* MODAL */

.modal{

    position:fixed;

    top:0;
    left:0;

    width:100%;
    height:100%;

    background:rgba(0,0,0,0.4);

    display:none;

    justify-content:center;
    align-items:center;
}

.modal-content{

    width:450px;

    max-height:90vh;
    overflow-y:auto;

    background:white;

    border-radius:28px;

    padding:30px;
}

.form-group{

    margin-bottom:18px;
}

.form-group label{

    display:block;

    margin-bottom:8px;
}

.form-group input,
.form-group select{

    width:100%;

    height:52px;

    border:1px solid #d1d5db;

    border-radius:14px;

    padding:0 15px;

    outline:none;
}

.modal-buttons{

    display:flex;
    justify-content:flex-end;
    gap:10px;
}

.modal-buttons button{

    border:none;

    padding:13px 20px;

    border-radius:14px;

    cursor:pointer;
}

.cancel{
    background:#e5e7eb;
}

.save{
    background:#2563eb;
    color:white;
}

.add-btn{

    border:none;

    background:#2563eb;

    color:white;

    padding:14px 22px;

    border-radius:16px;

    cursor:pointer;

    font-weight:600;
}

</style>

</head>

<body>

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

    <a href="dashboard.php">

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

    <a href="pembayaran.php" class="active">

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

<div class="main">

<div class="topbar">

<div class="title">

    <h1>Pembayaran</h1>

    <p>Kelola transaksi pembayaran rental mobil</p>

</div>

<div class="actions-top">

<div class="search">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input
    type="text"
    id="searchInput"
    placeholder="Cari pembayaran..."
    onkeyup="searchData()">

</div>

<button class="add-btn"
onclick="openModal()">

    <i class="fa-solid fa-plus"></i>

    Tambah

</button>

</div>

</div>

<!-- CARD -->

<?php

$totalPembayaran = $conn->query("
SELECT SUM(jumlah_pembayaran) as total
FROM pembayaran
")->fetch(PDO::FETCH_ASSOC);

$totalLunas = $conn->query("
SELECT COUNT(*) as total
FROM pembayaran
WHERE status_pembayaran='LUNAS'
")->fetch(PDO::FETCH_ASSOC);

$totalBelum = $conn->query("
SELECT COUNT(*) as total
FROM pembayaran
WHERE status_pembayaran IS NULL
")->fetch(PDO::FETCH_ASSOC);

?>

<div class="stats">

<div class="stat-card">

    <h3>Total Pembayaran</h3>

    <h1>
        Rp <?= number_format($totalPembayaran['total'] ?? 0,0,',','.'); ?>
    </h1>

<div class="stat-card">

    <h3>Pembayaran Lunas</h3>

    <h1>
        <?= $totalLunas['total']; ?>
    </h1>

</div>

<div class="stat-card">

    <h3>Belum Lunas</h3>

    <h1>
        <?= $totalBelum['total']; ?>
    </h1>

</div>

</div>

<!-- TABLE -->

<div class="table-card">

<table>

<thead>

<tr>

    <th>Penyewa</th>
    <th>Mobil</th>
    <th>Total Bayar</th>
    <th>Metode</th>
    <th>Status</th>
    <th>Aksi</th>

</tr>

</thead>

<tbody id="pembayaranTable">

<?php

$query = $conn->query("
SELECT 
    pembayaran.*,
    penyewa.nama_penyewa,
    mobil.merk_mobil
FROM pembayaran

LEFT JOIN transaksisewa
ON pembayaran.id_transaksi = transaksisewa.id_transaksi

LEFT JOIN reservasi
ON transaksisewa.id_reservasi = reservasi.id_reservasi

LEFT JOIN penyewa
ON reservasi.id_penyewa = penyewa.id_penyewa

LEFT JOIN mobil
ON reservasi.id_mobil = mobil.id_mobil
");

while($row = $query->fetch(PDO::FETCH_ASSOC)){

$statusClass = "belum";

if(strtolower($row['status_pembayaran']) == "lunas"){
    $statusClass = "lunas";
}

?>

<tr>

    <td>
        <?= $row['nama_penyewa']; ?>
    </td>

    <td>
        <?= $row['merk_mobil']; ?>
    </td>

    <td>
        Rp <?= number_format($row['jumlah_pembayaran'],0,',','.'); ?>
    </td>

    <td>
        <?= $row['metode_pembayaran']; ?>
    </td>

    <td>

        <span class="status <?= $statusClass; ?>">

            <?= $row['status_pembayaran']; ?>

        </span>

    </td>

    <td>

     <div class="actions">

    <button
    class="action-btn detail"
    onclick="togglePembayaran(this)">

        <i class="fa-solid fa-eye"></i>

    </button>

    <button
    class="action-btn edit"
    onclick="editPembayaran(this)">

        <i class="fa-solid fa-pen"></i>

    </button>

    <button
    class="action-btn delete"
    onclick="hapusPembayaran(this)">

        <i class="fa-solid fa-trash"></i>

    </button>

</div>

    </td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

<!-- MODAL -->

<div class="modal" id="modal">

<div class="modal-content">

<h2>Tambah Pembayaran</h2>

<br>

<div class="form-group">

<label>Nama Penyewa</label>

<input type="text" id="penyewa">

</div>

<div class="form-group">

<label>Mobil</label>

<input type="text" id="mobil">

</div>

<div class="form-group">

<label>Total Bayar</label>

<input type="text" id="total">

</div>

<div class="form-group">

<label>Metode Pembayaran</label>

<select id="metode">

<option>Transfer</option>
<option>Cash</option>
<option>E-Wallet</option>

</select>

</div>

<div class="form-group">

<label>Status Pembayaran</label>

<select id="status">

<option>Lunas</option>
<option>Belum Lunas</option>

</select>

</div>

<div class="modal-buttons">

<button class="cancel"
onclick="closeModal()">

Batal

</button>

<button class="save"
onclick="tambahPembayaran()">

Simpan

</button>

</div>

</div>

</div>

<script>

/* MODAL */

function openModal(){

    document.getElementById("modal").style.display = "flex";
}

function closeModal(){

    document.getElementById("modal").style.display = "none";
}

/* DETAIL */

function togglePembayaran(button){

    let row =
    button.closest("tr");

    if(row.style.opacity == "0.4"){

        row.style.opacity = "1";

    }else{

        row.style.opacity = "0.4";
    }
}

/* HAPUS */

function hapusPembayaran(button){

    if(confirm("Yakin ingin menghapus pembayaran?")){

        button.closest("tr").remove();
    }
}

/* EDIT */

let editRow = null;

function editPembayaran(button){

    editRow =
    button.closest("tr");

    let kolom =
    editRow.querySelectorAll("td");

    document.getElementById("penyewa").value =
    kolom[0].innerText.trim();

    document.getElementById("mobil").value =
    kolom[1].innerText.trim();

    document.getElementById("total").value =
    kolom[2].innerText
    .replace("Rp","")
    .replaceAll(".","")
    .trim();

    document.getElementById("metode").value =
    kolom[3].innerText.trim();

    document.getElementById("status").value =
    kolom[4].innerText.trim();

    openModal();
}

/* TAMBAH / UPDATE */

function tambahPembayaran(){

    let penyewa =
    document.getElementById("penyewa").value;

    let mobil =
    document.getElementById("mobil").value;

    let total =
    document.getElementById("total").value;

    let metode =
    document.getElementById("metode").value;

    let status =
    document.getElementById("status").value;

    let badgeClass =
    status == "Lunas"
    ? "lunas"
    : "belum";

    let rowHTML = `

    <td>${penyewa}</td>

    <td>${mobil}</td>

    <td>
        Rp ${parseInt(total).toLocaleString('id-ID')}
    </td>

    <td>${metode}</td>

    <td>

        <span class="status ${badgeClass}">

            ${status}

        </span>

    </td>

    <td>

        <div class="actions">

            <button
            class="action-btn detail"
            onclick="togglePembayaran(this)">

                <i class="fa-solid fa-eye"></i>

            </button>

            <button
            class="action-btn edit"
            onclick="editPembayaran(this)">

                <i class="fa-solid fa-pen"></i>

            </button>

            <button
            class="action-btn delete"
            onclick="hapusPembayaran(this)">

                <i class="fa-solid fa-trash"></i>

            </button>

        </div>

    </td>
    `;

    /* EDIT */

    if(editRow != null){

        editRow.innerHTML =
        rowHTML;

        editRow = null;
    }

    /* TAMBAH */

    else{

        let tr =
        document.createElement("tr");

        tr.innerHTML =
        rowHTML;

        document
        .getElementById("pembayaranTable")
        .appendChild(tr);
    }

    closeModal();
}

/* SEARCH */

function searchData(){

    let input =
    document.getElementById("searchInput")
    .value
    .toLowerCase();

    let tr =
    document.querySelectorAll("#pembayaranTable tr");

    tr.forEach(row => {

        let text =
        row.innerText.toLowerCase();

        if(text.includes(input)){

            row.style.display = "";

        }else{

            row.style.display = "none";
        }
    });
}

</script>

</body>
</html>