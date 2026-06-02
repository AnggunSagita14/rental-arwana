<?php

include 'koneksi.php';

$id_pembayaran = $_POST['id_pembayaran'];
$id_transaksi = $_POST['id_transaksi'];
$tanggal = $_POST['tanggal_pembayaran'];
$jenis = $_POST['jenis_pembayaran'];
$jumlah = $_POST['jumlah_pembayaran'];
$metode = $_POST['metode_pembayaran'];
$status = $_POST['status_pembayaran'];

$sql = "
INSERT INTO pembayaran
(
id_pembayaran,
id_transaksi,
tanggal_pembayaran,
jenis_pembayaran,
jumlah_pembayaran,
metode_pembayaran,
status_pembayaran
)
VALUES
(
?,?,?,?,?,?,?
)
";

$stmt = $conn->prepare($sql);

$stmt->execute([
$id_pembayaran,
$id_transaksi,
$tanggal,
$jenis,
$jumlah,
$metode,
$status
]);

header("Location: pembayaran.php");
exit;
?>