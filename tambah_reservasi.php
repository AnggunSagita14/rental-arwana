<?php
include 'koneksi.php';

$id_reservasi = $_POST['id_reservasi'];
$id_admin = $_POST['id_admin'];
$id_penyewa = $_POST['id_penyewa'];
$id_mobil = $_POST['id_mobil'];
$tanggal = $_POST['tanggal_reservasi'];
$status = $_POST['status_reservasi'];

$sql = "INSERT INTO reservasi
(
id_reservasi,
id_admin,
id_penyewa,
id_mobil,
tanggal_reservasi,
status_reservasi
)
VALUES
(
?,
?,
?,
?,
?,
?
)";

$stmt = $conn->prepare($sql);

$stmt->execute([
$id_reservasi,
$id_admin,
$id_penyewa,
$id_mobil,
$tanggal,
$status
]);

header("Location: reservasi.php");
exit;
?>