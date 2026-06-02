<?php

include 'koneksi.php';

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $stmt = $conn->prepare("
        DELETE FROM penyewa
        WHERE id_penyewa = ?
    ");

    $stmt->execute([$id]);
}

header("Location: penyewa.php");
exit;