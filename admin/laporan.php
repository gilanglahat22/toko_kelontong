<?php 
  $conn= new mysqli('localhost','root','','edel');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Toko Ibu Ilah</title>
</head>
<body>
 
  <center>
 
    <h2>DATA LAPORAN PENJUALAN</h2>
 
  </center>

  <table border="1" style="width: 100%">
    <tr>
      <th width="1%">No</th>
      <th>Nama Pelanggan</th>
      <th>Tanggal</th>
      <th width="5%">Total</th>
    </tr>
    <?php $no=1; ?>
    <?php $query=$conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan") ?>
      <?php while ($data=$query->fetch_assoc()) {
        ?>
    
    <tr>
      <td><?php echo $no++; ?></td>
      <td><?php echo $data['nama_pelanggan']; ?></td>
      <td><?php echo $data['tanggal_pembelian']; ?></td>
      <td><?php echo $data['total_pembelian']; ?></td>
    </tr>
    <?php 
    }
    ?>
  </table>
  <script>
    window.print();
  </script>
 
</body>
</html>