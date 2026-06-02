<?php

include 'koneksi.php';

$id_reservasi = $_POST['id_reservasi'];
$id_admin = $_POST['id_admin'];
$id_penyewa = $_POST['id_penyewa'];
$id_mobil = $_POST['id_mobil'];
$tanggal_reservasi = $_POST['tanggal_reservasi'];
$status_reservasi = $_POST['status_reservasi'];

$sql = "
UPDATE reservasi
SET
id_admin=?,
id_penyewa=?,
id_mobil=?,
tanggal_reservasi=?,
status_reservasi=?
WHERE id_reservasi=?
";

$stmt = $conn->prepare($sql);

$stmt->execute([
$id_admin,
$id_penyewa,
$id_mobil,
$tanggal_reservasi,
$status_reservasi,
$id_reservasi
]);

header("Location: reservasi.php");
exit;
?>