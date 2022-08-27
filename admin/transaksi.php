<?php
include '../koneksi.php';
// menyimpan data kedalam variabel
$id = isset($_POST['id_pembelian']) ? $_POST['id_pembelian'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';;
// query SQL untuk insert data
$query="UPDATE pembelian SET status='$status' where id_pembelian='$id'";
mysqli_query($conn, $query);
// mengalihkan ke halaman index.php
echo "<script>alert('Data Berhasil Diubah');</script>";
echo "<script>location='index.php?halaman=pembelian';</script>";
?>