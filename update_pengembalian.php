<?php

include 'koneksi.php';

$sql = "
UPDATE pengembalian
SET
id_transaksi=?,
tanggal_kembali=?,
keterlambatan=?,
status_pengembalian=?
WHERE id_pengembalian=?
";

$stmt =
$conn->prepare($sql);

$stmt->execute([

$_POST['id_transaksi'],
$_POST['tanggal_kembali'],
$_POST['keterlambatan'],
$_POST['status_pengembalian'],
$_POST['id_pengembalian']

]);

header("Location: pengembalian.php");

?>