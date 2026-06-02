<?php

include 'koneksi.php';

$id_pembayaran      = $_POST['id_pembayaran'];
$id_transaksi       = $_POST['id_transaksi'];
$tanggal_pembayaran = $_POST['tanggal_pembayaran'];
$jenis_pembayaran   = $_POST['jenis_pembayaran'];
$jumlah_pembayaran  = $_POST['jumlah_pembayaran'];
$metode_pembayaran  = $_POST['metode_pembayaran'];
$status_pembayaran  = $_POST['status_pembayaran'];

$sql = "
UPDATE pembayaran
SET
id_transaksi=?,
tanggal_pembayaran=?,
jenis_pembayaran=?,
jumlah_pembayaran=?,
metode_pembayaran=?,
status_pembayaran=?
WHERE id_pembayaran=?
";

$stmt = $conn->prepare($sql);

$stmt->execute([
    $id_transaksi,
    $tanggal_pembayaran,
    $jenis_pembayaran,
    $jumlah_pembayaran,
    $metode_pembayaran,
    $status_pembayaran,
    $id_pembayaran
]);

header("Location: pembayaran.php");
exit;
?>