<?php include 'protect.php'; ?>
<h2>Edit Status Pembelian</h2>
<?php 
$query=$conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan WHERE pembelian.id_pembelian");
$detail=$query->fetch_assoc();
?>
<p><strong><?php echo $detail['nama_pelanggan']; ?></strong><br></p>
<p>
	Nomer Telepon: <?php echo $detail['telepon_pelanggan']; ?><br>
	Email: <?php echo $detail['email_pelanggan']; ?>
</p>
<p>
	Tanggal : <?php echo $detail['tanggal_pembelian']; ?><br>
	Total : Rp.<?php echo number_format($detail['total_pembelian']); ?>
</p>

<div class="table-responsive">	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Produk</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
				<th class="text-center">Status</th>
				<th class="text-center">Ubah Status</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			<?php $query=$conn->query("SELECT * FROM pembelian_produk JOIN produk 
				ON pembelian_produk.id_produk=produk.id_produk JOIN pembelian ON pembelian_produk.id_pembelian=pembelian.id_pembelian WHERE pembelian_produk.id_pembelian"); ?>
			<?php while ( $data=$query->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['nama_produk']; ?></td>
					<td>Rp.<?php echo number_format($data['harga_produk']); ?></td>
					<td><?php echo $data['jumlah'] ?></td>
					<td>Rp.<?php echo number_format($data['harga_produk']*$data['jumlah']); ?></td><td class="text-center">
                        <?php 
                        if($data['status'] == 0){
                          echo "<span class='label label-warning'>Menunggu Pembayaran</span>";
                        }elseif($data['status'] == 1){
                          echo "<span class='label label-default'>Menunggu Konfirmasi</span>";
                        }elseif($data['status'] == 2){
                          echo "<span class='label label-danger'>Ditolak</span>";
                        }elseif($data['status'] == 3){
                          echo "<span class='label label-primary'>Dikonfirmasi & Sedang Diproses</span>";
                        }elseif($data['status'] == 4){
                          echo "<span class='label label-success'>Selesai Dikirim</span>";
                        }
                        ?>
                      </td>
                      <td class="text-center">
                        <form action="transaksi.php" method="post">
                          <input type="hidden" value="<?php echo $data['id_pembelian'] ?>" name="id_pembelian">
                          <select name="status" id="" class="form-control" onchange="form.submit()">
                            <option <?php if($data['status'] == "0"){echo "selected='selected'";} ?> value="0">Menunggu Pembayaran</option>
                            <option <?php if($data['status'] == "1"){echo "selected='selected'";} ?> value="1">Menunggu Konfirmasi</option>
                            <option <?php if($data['status'] == "2"){echo "selected='selected'";} ?> value="2">Ditolak</option>
                            <option <?php if($data['status'] == "3"){echo "selected='selected'";} ?> value="3">Dikonfirmasi & Sedang Diproses</option>
                            <option <?php if($data['status'] == "4"){echo "selected='selected'";} ?> value="4">Selesai Dikirim</option>
                          </select>
                        </form>
                      </td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>
</div>