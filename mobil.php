<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Data Mobil</title>

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

/* MAIN */

.main{

    margin-left:270px;

    width:100%;

    padding:35px;
}

/* TOPBAR */

.topbar{

    display:flex;
    justify-content:space-between;
    align-items:center;

    margin-bottom:30px;
}

.title h1{

    font-size:34px;

    margin-bottom:8px;
}

.title p{
    color:#6b7280;
}

.add-btn{

    border:none;

    background:#2563eb;

    color:white;

    padding:14px 24px;

    border-radius:16px;

    cursor:pointer;

    font-size:15px;

    font-weight:600;
}

/* TABLE */

.table-card{

    background:white;

    border-radius:28px;

    padding:25px;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.04);
}

table{

    width:100%;

    border-collapse:collapse;
}

th{

    text-align:left;

    padding-bottom:20px;

    color:#6b7280;
}

td{

    padding:18px 0;

    border-top:1px solid #e5e7eb;
}

.car{

    display:flex;
    align-items:center;

    gap:15px;
}

.car img{

    width:90px;
    height:60px;

    object-fit:cover;

    border-radius:14px;
}

.status{

    padding:8px 14px;

    border-radius:30px;

    font-size:13px;

    font-weight:600;
}

.available{

    background:#dcfce7;
    color:#16a34a;
}

.rented{

    background:#fee2e2;
    color:#dc2626;
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
    background:#0ea5e9;
}

.edit{
    background:#f59e0b;
}

.delete{
    background:#ef4444;
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

    width:500px;

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
}

.modal-buttons{

    display:flex;

    justify-content:flex-end;

    gap:10px;

    margin-top:20px;
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

    <a href="mobil.php" class="active">

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

</div>

<div class="main">

    <div class="topbar">

        <div class="title">

            <h1>Data Mobil</h1>

            <p>Kelola data mobil rental</p>

        </div>

        <button class="add-btn"
        onclick="openModal()">

            <i class="fa-solid fa-plus"></i>

            Tambah Mobil

        </button>

    </div>

    <div class="table-card">

        <table>

            <thead>

                <tr>

                    <th>Mobil</th>
                    <th>Plat</th>
                    <th>Seat</th>
                    <th>Tarif</th>
                    <th>Status</th>
                    <th>Aksi</th>

                </tr>

            </thead>

<tbody id="mobilTable">

<?php

$query = $conn->query("SELECT * FROM mobil");

while($row = $query->fetch(PDO::FETCH_ASSOC)){

?>

<tr>

    <td>

<div style="
display:flex;
align-items:center;
gap:16px;
">

<?php

$gambar = "default.jpg";

if($row['merk_mobil'] == "Toyota Alphard"){
    $gambar = "alphard.jpg";
}

else if($row['merk_mobil'] == "Honda Civic"){
    $gambar = "civic.jpg";
}

else if($row['merk_mobil'] == "Mitsubishi Pajero"){
    $gambar = "pajero.jpg";
}

else if($row['merk_mobil'] == "Toyota Fortuner"){
    $gambar = "fortuner.jpg";
}

else if($row['merk_mobil'] == "Honda Brio"){
    $gambar = "brio.jpg";
}

else if($row['merk_mobil'] == "Mazda CX-5"){
    $gambar = "mazda.jpg";
}

else if($row['merk_mobil'] == "BMW Series 3"){
    $gambar = "bmw.jpg";
}

else if($row['merk_mobil'] == "Wuling Alvez"){
    $gambar = "wuling.jpg";
}

else if($row['merk_mobil'] == "Toyota Camry"){
    $gambar = "camry.jpg";
}

else if($row['merk_mobil'] == "Hyundai Creta"){
    $gambar = "hyundai.jpg";
}
?>

<img 
src="<?= $gambar; ?>" 
style="
width:95px;
height:65px;
object-fit:cover;
border-radius:14px;
">

<span>
    <?= $row['merk_mobil']; ?>
</span>

</div>

</td>

    <td>
        <?= $row['plat_kendaraan']; ?>
    </td>

    <td>
        <?= $row['seat_row']; ?>
    </td>

    <td>
        Rp <?= number_format($row['tarif_sewa'],0,',','.'); ?>
    </td>

    <td>

        <?php
        $statusClass =
        $row['status_mobil']=="Tersedia"
        ? "available"
        : "rented";
        ?>

        <span class="status <?= $statusClass ?>">

            <?= $row['status_mobil']; ?>

        </span>

    </td>

   <td>

    <div class="actions">

        <button
        class="action-btn edit"
        onclick="editMobil(this)">

            <i class="fa-solid fa-pen"></i>

        </button>

        <button
        class="action-btn delete"
        onclick="hapusMobil(this)">

            <i class="fa-solid fa-trash"></i>

        </button>

    </div>

</td> 

</tr>

<?php } ?>

</tbody>
<!-- MODAL -->

<div class="modal" id="modal">

    <div class="modal-content">

        <h2>Tambah Mobil</h2>

        <div class="form-group">

            <label>Nama Mobil</label>

            <input type="text" id="namaMobil">

        </div>

        <div class="form-group">

            <label>Plat Nomor</label>

            <input type="text" id="platMobil">

        </div>

        <div class="form-group">

            <label>Seat</label>

            <input type="number" id="seatMobil">

        </div>

        <div class="form-group">

            <label>Tarif</label>

            <input type="text" id="tarifMobil">

        </div>

        <div class="form-group">

            <label>Status</label>

            <select id="statusMobil">

               <option>Tersedia</option> 

           </select> 

        </div> 

        <div class="modal-buttons">

            <button class="cancel"
            onclick="closeModal()">

                Batal

            </button>

            <button class="save"
            onclick="tambahMobil()">

                Simpan

            </button>

        </div>

    </div>

</div>

<script>

function openModal(){

    document.getElementById("modal").style.display = "flex";
}

function closeModal(){

    document.getElementById("modal").style.display = "none";
}

/* DETAIL */

function toggleMobil(button){

    let row =
    button.closest("tr");

    if(row.style.opacity == "0.3"){

        row.style.opacity = "1";

    }else{

        row.style.opacity = "0.3";
    }
}

/* HAPUS */

function hapusMobil(button){

    if(confirm("Yakin ingin menghapus mobil?")){

        button.closest("tr").remove();
    }
}

/* EDIT */

let editRow = null;

function editMobil(button){

    editRow =
    button.closest("tr");

    let kolom =
    editRow.querySelectorAll("td");

    document.getElementById("namaMobil").value =
    kolom[0].innerText.trim();

    document.getElementById("platMobil").value =
    kolom[1].innerText.trim();

    document.getElementById("seatMobil").value =
    kolom[2].innerText.trim();

    document.getElementById("tarifMobil").value =
    kolom[3].innerText
    .replace("Rp","")
    .replaceAll(".","")
    .trim();

    document.getElementById("statusMobil").value =
    kolom[4].innerText.trim();

    openModal();
}

/* TAMBAH */

function tambahMobil(){

    let nama =
    document.getElementById("namaMobil").value;

    let plat =
    document.getElementById("platMobil").value;

    let seat =
    document.getElementById("seatMobil").value;

    let tarif =
    document.getElementById("tarifMobil").value;

    let status =
    document.getElementById("statusMobil").value;

    let kelas =
    status == "Tersedia"
    ? "available"
    : "rented";

    let rowHTML = `

    <td>

        <div class="car">

            <img src="camry.jpg">

            ${nama}

        </div>

    </td>

    <td>${plat}</td>

    <td>${seat}</td>

    <td>Rp ${tarif}</td>

    <td>

        <span class="status ${kelas}">

            ${status}

        </span>

    </td>

    <td>

        <div class="actions">

            <button
            class="action-btn detail"
            onclick="toggleMobil(this)">

                <i class="fa-solid fa-eye"></i>

            </button>

            <button
            class="action-btn edit"
            onclick="editMobil(this)">

                <i class="fa-solid fa-pen"></i>

            </button>

            <button
            class="action-btn delete"
            onclick="hapusMobil(this)">

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
        .getElementById("mobilTable")
        .appendChild(tr);
    }

    closeModal();
}

</script>

</body>
</html>