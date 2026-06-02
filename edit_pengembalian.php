<?php

include 'koneksi.php';

$id = $_GET['id'];

$stmt =
$conn->prepare("
SELECT *
FROM pengembalian
WHERE id_pengembalian=?
");

$stmt->execute([$id]);

$data =
$stmt->fetch(PDO::FETCH_ASSOC);

?>

<form
action="update_pengembalian.php"
method="POST">

<input
type="hidden"
name="id_pengembalian"
value="<?= $data['id_pengembalian']; ?>">

<p>ID Transaksi</p>

<input
type="text"
name="id_transaksi"
value="<?= $data['id_transaksi']; ?>">

<p>Tanggal Kembali</p>

<input
type="date"
name="tanggal_kembali"
value="<?= $data['tanggal_kembali']; ?>">

<p>Keterlambatan</p>

<input
type="number"
name="keterlambatan"
value="<?= $data['keterlambatan']; ?>">

<p>Status</p>

<select name="status_pengembalian">

<option
value="DIKEMBALIKAN"
<?= $data['status_pengembalian']=="DIKEMBALIKAN" ? "selected" : ""; ?>>

DIKEMBALIKAN

</option>

<option
value="TERLAMBAT"
<?= $data['status_pengembalian']=="TERLAMBAT" ? "selected" : ""; ?>>

TERLAMBAT

</option>

</select>

<br><br>

<button type="submit">

Update

</button>

</form>