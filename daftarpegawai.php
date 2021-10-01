<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Daftar Pegawai</font></center>
		<hr>
		<a href="index.php?page=tambah_pegawai"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nama Pegawai</th>
					<th>No Telepon</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel tb_pegawai urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM tb_pegawai ORDER BY id DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['mobile'].'</td>
							<td>'.$data['alamat'].'</td>
							<td>
								<a href="index.php?page=edit_pegawai&id='.$data['id'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="hapus.php?id='.$data['id'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
