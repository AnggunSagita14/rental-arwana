<?php

include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("
SELECT *
FROM penyewa
WHERE id_penyewa = ?
");

$stmt->execute([$id]);

$data = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $stmt = $conn->prepare("
    UPDATE penyewa
    SET
        nama_penyewa=?,
        no_hp=?,
        no_KTP=?,
        no_simA=?,
        tanggal_lahir=?,
        alamat=?
    WHERE id_penyewa=?
    ");

    $stmt->execute([
        $_POST['nama'],
        $_POST['hp'],
        $_POST['ktp'],
        $_POST['sim'],
        $_POST['lahir'],
        $_POST['alamat'],
        $id
    ]);

    header("Location: penyewa.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Penyewa</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    font-family:Poppins;
    background:#f5f7fb;
}

.card{

    width:500px;
    margin:40px auto;

    background:white;

    padding:30px;

    border-radius:20px;
}

input{

    width:100%;
    height:50px;

    margin-bottom:15px;

    padding:10px;
}

button{

    border:none;

    padding:12px 20px;

    border-radius:10px;

    cursor:pointer;
}

.save{

    background:#2563eb;
    color:white;
}

</style>
</head>

<body>

<div class="card">

<h2>Edit Penyewa</h2>

<form method="POST">

<input
type="text"
name="nama"
value="<?= $data['nama_penyewa']; ?>">

<input
type="text"
name="hp"
value="<?= $data['no_hp']; ?>">

<input
type="text"
name="ktp"
value="<?= $data['no_KTP']; ?>">

<input
type="text"
name="sim"
value="<?= $data['no_simA']; ?>">

<input
type="date"
name="lahir"
value="<?= $data['tanggal_lahir']; ?>">

<input
type="text"
name="alamat"
value="<?= $data['alamat']; ?>">

<button
type="submit"
name="update"
class="save">

Simpan Perubahan

</button>

</form>

</div>

</body>
</html>