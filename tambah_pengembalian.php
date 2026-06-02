<?php

include 'koneksi.php';

$id_pengembalian =
$_POST['id_pengembalian'];

$id_transaksi =
$_POST['id_transaksi'];

$tanggal_kembali =
$_POST['tanggal_kembali'];

$keterlambatan =
$_POST['keterlambatan'];

$status_pengembalian =
$_POST['status_pengembalian'];

$sql = "
INSERT INTO pengembalian
VALUES
(
?,
?,
?,
?,
?
)
";

$stmt = $conn->prepare($sql);

$stmt->execute([
$id_pengembalian,
$id_transaksi,
$tanggal_kembali,
$keterlambatan,
$status_pengembalian
]);

header("Location: pengembalian.php");

?>