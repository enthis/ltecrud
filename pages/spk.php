<?php require_once('config/main.php');
$query=mysqli_query($con,"select * from teknisi");
 ?>

 <div class="box">
    <div class="box-header">
      <h3 class="box-title">Data Pembelian ( Terdapat <?php echo mysqli_num_rows($query); ?> Data)</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
    <?php if (isset($_SESSION['username'])): ?>
     <a href="tambah.php?tambah=spk" style="margin-bottom: 10px;" class="btn btn-md btn-primary"> <i class="fa fa-plus"></i> Tambah Data SPK</a>
	<?php endif; ?>
		<table class="table table-bordered" id="tabel">
			<thead>
				<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>PELANGGAN</th>
				<th>ALAMAT</th>
				<th>KONTAK</th>
				<th>TELEPON</th>
				<th>TANGGAL</th>
				<th>JAM</th>
				<?php if (isset($_SESSION['username'])): ?>
				<th></th>
				<?php endif; ?>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=1;
				while($q=mysqli_fetch_array($query)){
				?>
				<tr>
				<td><?php echo $no++; ?></td>     
				<td><?php echo $q['nama']?></td>
				<td><?php echo $q['pelanggan']?></td>
				<td><?php echo $q['alamat']?></td>
				<td><?php echo $q['kontak']?></td>
				<td><?php echo $q['telp']?></td>
				<td><?php echo $q['tgl']?></td>
				<td><?php echo $q['jam']?></td>
				<?php if (isset($_SESSION['username'])): ?>
				<td>
			    	<a class="btn btn-success" href="edit.php?edit=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Edit</a>
			    	<a class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" href="hapus.php?hapus=<?php echo $_GET['page']; ?>&id=<?php echo $q['id']; ?>">Hapus</a>
			    </td>
				<?php endif; ?>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
</div>
<script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 <script type="text/javascript">
	 $(document).ready(function() {
	 	$('#tabel').dataTable({
	          "bPaginate": true,
	          "bLengthChange": true,
	          "bFilter": true,
	          "bSort": true,
	          "bInfo": true,
	          "bAutoWidth": true
	    });
	 });
</script>