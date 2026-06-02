<?php

include 'koneksi.php';

$id = $_GET['id'];

$stmt = $conn->prepare("
SELECT *
FROM mobil
WHERE id_mobil = ?
");

$stmt->execute([$id]);

$data = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_POST['update'])){

    $stmt = $conn->prepare("
    UPDATE mobil
    SET
        plat_kendaraan=?,
        merk_mobil=?,
        seat_row=?,
        status_mobil=?,
        tarif_sewa=?
    WHERE id_mobil=?
    ");

    $stmt->execute([
        $_POST['plat'],
        $_POST['merk'],
        $_POST['seat'],
        $_POST['status'],
        $_POST['tarif'],
        $id
    ]);

    header("Location: mobil.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Mobil</title>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>

body{
    background:#f5f7fb;
    font-family:Poppins;
}

.card{

    width:500px;

    margin:40px auto;

    background:white;

    padding:30px;

    border-radius:20px;
}

input,select{

    width:100%;

    height:50px;

    margin-bottom:15px;

    padding:10px;
}

button{

    border:none;

    background:#2563eb;

    color:white;

    padding:12px 20px;

    border-radius:10px;

    cursor:pointer;
}

</style>

</head>

<body>

<div class="card">

<h2>Edit Mobil</h2>

<form method="POST">

<input
type="text"
name="merk"
value="<?= $data['merk_mobil']; ?>">

<input
type="text"
name="plat"
value="<?= $data['plat_kendaraan']; ?>">

<input
type="text"
name="seat"
value="<?= $data['seat_row']; ?>">

<input
type="number"
name="tarif"
value="<?= $data['tarif_sewa']; ?>">

<select name="status">

<option
value="Tersedia"
<?= $data['status_mobil']=="Tersedia" ? "selected" : "" ?>>
Tersedia
</option>

<option
value="Disewa"
<?= $data['status_mobil']=="Disewa" ? "selected" : "" ?>>
Disewa
</option>

</select>

<button
type="submit"
name="update">

Simpan Perubahan

</button>

</form>

</div>

</body>
</html>