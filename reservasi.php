<?php
session_start();

include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reservasi</title>

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

    width:100%;

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

.add-btn{

    border:none;

    background:#2563eb;

    color:white;

    padding:14px 22px;

    border-radius:16px;

    cursor:pointer;

    font-weight:600;
}

/* TABLE */

.table-card{

    background:white;

    border-radius:28px;

    padding:25px;

    overflow:auto;

    box-shadow:
    0 10px 30px rgba(0,0,0,0.04);
}

table{

    width:100%;
    border-collapse:collapse;
}

th{

    text-align:left;

    padding-bottom:18px;

    color:#6b7280;
}

td{

    padding:18px 0;

    border-top:1px solid #e5e7eb;
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

.detail{
    background:#0ea5e9;
}

.edit{
    background:#f59e0b;
}

.delete{
    background:#ef4444;
}

/* STATUS */

.status{

    padding:8px 14px;

    border-radius:999px;

    font-size:13px;

    font-weight:600;
}

.selesai{

    background:#dcfce7;

    color:#166534;
}

.proses{

    background:#dbeafe;

    color:#1d4ed8;
}

.batal{

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

    width:500px;

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

    <a href="reservasi.php" class="active">

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

    <h1>Data Reservasi</h1>

    <p>Kelola data reservasi rental mobil</p>

</div>

<div class="actions-top">

<div class="search">

    <i class="fa-solid fa-magnifying-glass"></i>

    <input
    type="text"
    id="searchInput"
    placeholder="Cari reservasi..."
    onkeyup="searchData()">

</div>

<button class="add-btn"
onclick="openModal()">

    <i class="fa-solid fa-plus"></i>

    Tambah

</button>

</div>

</div>

<div class="table-card">

<table>


<thead>

    <tr>

        <th>ID Reservasi</th>
        <th>ID Admin</th>
        <th>Nama Penyewa</th>
<th>Mobil</th>
        <th>Tanggal Reservasi</th>
        <th>Status Reservasi</th>
        <th>Aksi</th>

    </tr>

</thead>
<tbody id="reservasiTable">

<?php

$query = $conn->query("
SELECT reservasi.*, 
       penyewa.nama_penyewa,
       mobil.merk_mobil
FROM reservasi
LEFT JOIN penyewa 
ON reservasi.id_penyewa = penyewa.id_penyewa
LEFT JOIN mobil
ON reservasi.id_mobil = mobil.id_mobil
");

while($row = $query->fetch(PDO::FETCH_ASSOC)){

?>

<tr>

    <td>
        <?= $row['id_reservasi']; ?>
    </td>

    <td>
        <?= $row['id_admin']; ?>
    </td>

    <td>
        <?= $row['nama_penyewa']; ?>
    </td>

    <td>
        <?= $row['merk_mobil']; ?>
    </td>

    <td>
        <?= $row['tanggal_reservasi']; ?>
    </td>

    <td>

        <span class="status selesai">
            <?= ucfirst($row['status_reservasi']); ?>
        </span>

    </td>

    <td>

        <div class="actions">

            <button
            class="action-btn detail"
            onclick="toggleReservasi(this)">

                <i class="fa-solid fa-eye"></i>

            </button>

            <button
            class="action-btn edit"
            onclick="editReservasi(this)">

                <i class="fa-solid fa-pen"></i>

            </button>

            <button
            class="action-btn delete"
            onclick="hapusReservasi(this)">

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

        <h2>Tambah Reservasi</h2>

        <br>

        <div class="form-group">

            <label>ID Reservasi</label>

            <input type="text" id="id_reservasi">

        </div>

        <div class="form-group">

            <label>ID Admin</label>

            <input type="text" id="id_admin">

        </div>

        <div class="form-group">

            <label>ID Penyewa</label>

            <input type="text" id="id_penyewa">

        </div>

        <div class="form-group">

            <label>ID Mobil</label>

            <input type="text" id="id_mobil">

        </div>

        <div class="form-group">

            <label>Tanggal Reservasi</label>

            <input type="date" id="tanggal_reservasi">

        </div>

        <div class="form-group">

            <label>Status Reservasi</label>

            <select id="status_reservasi">

                <option>disetujui</option>

            </select>

        </div>

        <div class="modal-buttons">

            <button
            class="cancel"
            onclick="closeModal()">

                Batal

            </button>

            <button
            class="save"
            onclick="tambahReservasi()">

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

function toggleReservasi(button){

    let row = button.closest("tr");

    if(row.style.opacity == "0.3"){

        row.style.opacity = "1";

    }else{

        row.style.opacity = "0.3";
    }
}

function hapusReservasi(button){

    button.closest("tr").remove();
}

let editRow = null;

function editReservasi(button){

    editRow = button.closest("tr");

    let kolom = editRow.querySelectorAll("td");

    document.getElementById("id_reservasi").value =
    kolom[0].innerText;

    document.getElementById("id_admin").value =
    kolom[1].innerText;

    document.getElementById("id_penyewa").value =
    kolom[2].innerText;

    document.getElementById("id_mobil").value =
    kolom[3].innerText;

    document.getElementById("tanggal_reservasi").value =
    kolom[4].innerText;

    document.getElementById("status_reservasi").value =
    kolom[5].innerText.trim();

    openModal();
}

function tambahReservasi(){

    let id_reservasi =
    document.getElementById("id_reservasi").value;

    let id_admin =
    document.getElementById("id_admin").value;

    let id_penyewa =
    document.getElementById("id_penyewa").value;

    let id_mobil =
    document.getElementById("id_mobil").value;

    let tanggal_reservasi =
    document.getElementById("tanggal_reservasi").value;

    let status_reservasi =
    document.getElementById("status_reservasi").value;

    let badgeClass = "selesai";

    if(status_reservasi.toLowerCase() == "disetujui"){

        badgeClass = "selesai";
    }

    // EDIT DATA
    if(editRow != null){

        editRow.innerHTML = `

        <td>${id_reservasi}</td>
        <td>${id_admin}</td>
        <td>${id_penyewa}</td>
        <td>${id_mobil}</td>
        <td>${tanggal_reservasi}</td>

        <td>
            <span class="status ${badgeClass}">
                ${status_reservasi}
            </span>
        </td>

        <td>

            <div class="actions">

                <button
                class="action-btn detail"
                onclick="toggleReservasi(this)">

                    <i class="fa-solid fa-eye"></i>

                </button>

                <button
                class="action-btn edit"
                onclick="editReservasi(this)">

                    <i class="fa-solid fa-pen"></i>

                </button>

                <button
                class="action-btn delete"
                onclick="hapusReservasi(this)">

                    <i class="fa-solid fa-trash"></i>

                </button>

            </div>

        </td>
        `;

        editRow = null;

        closeModal();

        return;
    }

    // TAMBAH DATA BARU
    document.getElementById("reservasiTable").innerHTML += `

    <tr>

        <td>${id_reservasi}</td>
        <td>${id_admin}</td>
        <td>${id_penyewa}</td>
        <td>${id_mobil}</td>
        <td>${tanggal_reservasi}</td>

        <td>
            <span class="status ${badgeClass}">
                ${status_reservasi}
            </span>
        </td>

        <td>

            <div class="actions">

                <button
                class="action-btn detail"
                onclick="toggleReservasi(this)">

                    <i class="fa-solid fa-eye"></i>

                </button>

                <button
                class="action-btn edit"
                onclick="editReservasi(this)">

                    <i class="fa-solid fa-pen"></i>

                </button>

                <button
                class="action-btn delete"
                onclick="hapusReservasi(this)">

                    <i class="fa-solid fa-trash"></i>

                </button>

            </div>

        </td>

    </tr>
    `;

    closeModal();
}

function searchData(){

    let input =
    document.getElementById("searchInput")
    .value
    .toLowerCase();

    let tr =
    document.querySelectorAll("#reservasiTable tr");

    tr.forEach(row => {

        let text =
        row.innerText.toLowerCase();

        if(text.includes(input)){

            row.style.display = "";

        }

        else{

            row.style.display = "none";
        }
    });
}

</script>

</body>
</html>