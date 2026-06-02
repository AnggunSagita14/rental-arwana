<?php

include 'koneksi.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $stmt = $conn->prepare("
    DELETE FROM mobil
    WHERE id_mobil = ?
    ");

    $stmt->execute([$id]);
}

header("Location: mobil.php");
exit;