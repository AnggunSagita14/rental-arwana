<?php

include 'koneksi.php';

$id = $_GET['id'];

$sql = "
DELETE FROM pembayaran
WHERE id_pembayaran=?
";

$stmt = $conn->prepare($sql);

$stmt->execute([$id]);

header("Location: pembayaran.php");
exit;
?>