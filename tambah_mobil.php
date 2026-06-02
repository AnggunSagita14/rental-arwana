<?php

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD']=="POST"){

    $merk   = $_POST['merk'];
    $plat   = $_POST['plat'];
    $seat   = $_POST['seat'];
    $status = $_POST['status'];
    $tarif  = $_POST['tarif'];

    $query = $conn->query("
    SELECT id_mobil
    FROM mobil
    ORDER BY id_mobil DESC
    LIMIT 1
    ");

    $last = $query->fetch(PDO::FETCH_ASSOC);

    if($last){

        $angka =
        intval(substr($last['id_mobil'],3))+1;

    }else{

        $angka = 1;
    }

    $id =
    "MBL".str_pad($angka,3,"0",STR_PAD_LEFT);

    $stmt = $conn->prepare("
    INSERT INTO mobil
    VALUES(?,?,?,?,?,?)
    ");

    $stmt->execute([
        $id,
        $plat,
        $merk,
        $seat,
        $status,
        $tarif
    ]);
}

header("Location: mobil.php");
exit;
?>