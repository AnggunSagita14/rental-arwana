<?php

include 'koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $nama   = $_POST['nama'];
    $hp     = $_POST['hp'];
    $ktp    = $_POST['ktp'];
    $sim    = $_POST['sim'];
    $lahir  = $_POST['lahir'];
    $alamat = $_POST['alamat'];

    $query = $conn->query("
        SELECT MAX(id_penyewa) AS terakhir
        FROM penyewa
    ");

    $data = $query->fetch(PDO::FETCH_ASSOC);

    $nomor = (int) substr($data['terakhir'], 3);

    $nomor++;

    $id_penyewa =
    'PYW' . str_pad($nomor, 3, '0', STR_PAD_LEFT);

    $stmt = $conn->prepare("
        INSERT INTO penyewa
        (
            id_penyewa,
            nama_penyewa,
            no_hp,
            no_KTP,
            no_simA,
            tanggal_lahir,
            alamat
        )
        VALUES
        (
            ?,?,?,?,?,?,?
        )
    ");

    $stmt->execute([
        $id_penyewa,
        $nama,
        $hp,
        $ktp,
        $sim,
        $lahir,
        $alamat
    ]);

}

header("Location: penyewa.php");
exit;