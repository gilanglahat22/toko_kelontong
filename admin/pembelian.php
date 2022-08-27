<?php include 'protect.php'; ?>
<h2>Data Pembelian</h2>

<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Tanggal</th>
				<th>Total</th>
				<th>Status</th>
				<th>Ubah Status</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $no=1; ?>
			<?php $query=$conn->query("SELECT * FROM pembelian JOIN pelanggan ON pembelian.id_pelanggan=pelanggan.id_pelanggan") ?>
			<?php while ($data=$query->fetch_assoc()) {
				?>
				<tr>
					<td><?php echo $no++; ?></td>
					<td><?php echo $data['nama_pelanggan']; ?></td>
					<td><?php echo $data['tanggal_pembelian']; ?></td>
					<td>Rp.<?php echo number_format($data['total_pembelian']); ?></td>
					<td class="text-center">
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
					<td class="text-center">
						<a href="index.php?halaman=detail&id=<?php echo $data['id_pembelian']; ?>" class="btn btn-info">Detail</a>
					</td>
				</tr>
				<?php
			} ?>
		</tbody>
	</table>	
</div>