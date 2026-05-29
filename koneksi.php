<?php
$host = "localhost";
$port = "3307"; 
$db   = "mbdminiproject";
$user = "root";
$pass = "";

try {

    $conn = new PDO(
        "mysql:host=$host;port=$port;dbname=$db",
        $user,
        $pass
    );

    $conn->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    );

} catch(PDOException $e){

    die("Koneksi gagal: " . $e->getMessage());

}
?>