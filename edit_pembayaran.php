<?php

include 'koneksi.php';

$id = $_GET['id'];

$sql = "
SELECT *
FROM pembayaran
WHERE id_pembayaran=?
";

$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

$data = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<form action="update_pembayaran.php" method="POST">

<input
type="hidden"
name="id_pembayaran"
value="<?= $data['id_pembayaran']; ?>">

<p>ID Transaksi</p>
<input
type="text"
name="id_transaksi"
value="<?= $data['id_transaksi']; ?>">

<br><br>

<p>Tanggal Pembayaran</p>
<input
type="date"
name="tanggal_pembayaran"
value="<?= $data['tanggal_pembayaran']; ?>">

<br><br>

<p>Jenis Pembayaran</p>
<input
type="text"
name="jenis_pembayaran"
value="<?= $data['jenis_pembayaran']; ?>">

<br><br>

<p>Jumlah Pembayaran</p>
<input
type="number"
name="jumlah_pembayaran"
value="<?= $data['jumlah_pembayaran']; ?>">

<br><br>

<p>Metode Pembayaran</p>
<input
type="text"
name="metode_pembayaran"
value="<?= $data['metode_pembayaran']; ?>">

<br><br>

<p>Status Pembayaran</p>
<input
type="text"
name="status_pembayaran"
value="<?= $data['status_pembayaran']; ?>">

<br><br>

<button type="submit">
Update
</button>

</form>