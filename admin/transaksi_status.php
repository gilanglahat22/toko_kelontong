<? include 'protect.php';

$data  = $_POST['invoice'];
$status  = $_POST['status'];

mysqli_query($conn, "UPDATE pembelian set status_pembelian='$status' where id_pembelian='$data'");

header("location:pembelian.php");
}
?>