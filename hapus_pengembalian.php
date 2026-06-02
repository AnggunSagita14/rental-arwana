<?php

include 'koneksi.php';

$id =
$_GET['id'];

$sql =
"DELETE FROM pengembalian
WHERE id_pengembalian=?";

$stmt =
$conn->prepare($sql);

$stmt->execute([$id]);

header("Location: pengembalian.php");

?>