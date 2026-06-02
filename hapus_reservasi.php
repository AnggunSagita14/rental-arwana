<?php

include 'koneksi.php';

$id = $_GET['id'];

$sql = "DELETE FROM reservasi
WHERE id_reservasi=?";

$stmt = $conn->prepare($sql);

$stmt->execute([$id]);

header("Location: reservasi.php");
exit;
?>