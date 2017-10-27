<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	$aksi="modul/mod_siswa/aksi_siswa.php";
switch($_GET[act]){
	// Tampil User
default:
?>
	<section class="content-header">
		<h1>Siswa</h1>
	</section>

	<!-- Main content -->
	<section class="content">

	  <!-- SELECT2 EXAMPLE -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">List Data Siswa</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<!-- /.col -->
					<div class="col-md-12">
						<table id="example1" class="table table-bordered table-striped">
							<thead>
								<tr>
								  <th>No</th>
								  <th>Nama</th>
								  <th>Jenis Kelamin</th>
								  <th>Alamat</th>
								  <th>Kelas Asal</th>
								  <th>Foto</th>
								  <th>Tanggal Lahir</th>
								  <th>Tempat lahir</th>
								  <th>Username</th>
								 
								</tr>
							</thead>
							<tbody>
								<?php
									$tampil=mysql_query("SELECT * FROM siswa");
									$x=1;
									while ($r=mysql_fetch_array($tampil)){
									?>
										<tr>
											<td><?php echo $x;?></td>
											<td><?php echo $r['nama'];?></td>
											<td><?php echo $r['jk'];?></td>
											<td><?php echo $r['alamat'];?></td>
											<td><?php echo $r['kelas_asal'];?></td>
											<td><img src="modul/mod_siswa/upload/<?php echo $r['foto'];?>" height="120px" width="100px" ></td>
											<td><?php echo $r['tgl_lahir'];?></td>		
											<td><?php echo $r['tempat_lahir'];?></td>									
											<td><?php echo $r['username'];?></td>
											<td class='center' width='85'><a href="?module=siswa&act=edit&id=<?=$r['id']?>"><img src='images/edit.png' border='0' title='edit' /></a>
											<a href="<?=$aksi?>?module=siswa&act=hapus&id=<?=$r['id']?>"><img src='images/del.png' border='0' title='hapus' /></a></td>
										</tr>
									<?php
									$x++;
									}
								?>
							</tbody>
						</table>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
			
			<div class="box-footer">
				<div class="text-center">
					<a href="?module=siswa&act=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>&nbsp Tambah Data</button></a>
				</div>
			</div>
			<!-- /.box-footer -->
			<!-- /.col -->
		</div>
		<!-- /.row -->
	</section>
	<script>
		$(function () {
			$("#example1").DataTable();
		});
	</script>
<?php
break;
	  
case "tambah":
?>
	<section class="content-header">
		<h1>Siswa</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Menu Utama</a></li>
			<li class="active">Form Tambah</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

	  <!-- SELECT2 EXAMPLE -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Form Tambah</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<!-- /.col -->
					<div class="col-md-12">	
						<!-- form start -->
						<form class="form-horizontal" method="POST" action="<?=$aksi?>?module=siswa&act=tambah" enctype="multipart/form-data">
						  <div class="box-body">
							<div class="form-group">
							  <label class="col-sm-2 control-label">Nama</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="nama">
							  </div>
							</div>

							 <div class="form-group">
							  <label class="col-sm-2 control-label">Jenis Kelamin</label>
							  <div class="col-sm-6">
								<label>
								  <input type="radio" name="jk" value="perempuan">
								  Perempuan
								</label>
								<label>
								  <input type="radio" name="jk" value="laki-laki">
								  Laki-Laki
								</label>
							  </div>
							</div>


							<div class="form-group">
							  <label class="col-sm-2 control-label">Alamat</label>
							  <div class="col-sm-6">
								<textarea name="alamat" class="form-control"></textarea>
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Kelas Asal</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="kelas_asal">
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Foto</label>
							  <div class="col-sm-6">
								<input type="file" name="gambar">
							  </div>
							</div>

							<div class="form-group">
                            	<label class="col-sm-2 control-label">Tanggal Lahir</label>
                                <div class="col-sm-6">
                                    <input type="date" name="tgl_lahir" class="form-control" placeholder="Tahun-Bulan-Tanggal">
                                </div>
                            </td>
							</div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Tempat Lahir</label>
                                <div class="col-sm-6">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat Lahir">
                                </div>
                            </div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Username</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="username">
							  </div>
							 </div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Password</label>
							  <div class="col-sm-6">
								<input type="password" class="form-control" name="password">
							  </div>
							</div>

							</div>
							</div>
						  </div>
						  <!-- /.box-body -->
						  <div class="box-footer">
							<button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
						  </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
break;
		
case "edit":
 $edit = mysql_query("SELECT * FROM siswa WHERE id='$_GET[id]'");
 $data    = mysql_fetch_array($edit);
 ?>
	<section class="content-header">
		<h1>Siswa</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Menu Utama</a></li>
			<li class="active">Form Edit</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

	  <!-- SELECT2 EXAMPLE -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Form Edit</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<div class="row">
					<!-- /.col -->
					<div class="col-md-12">	
						<!-- form start -->
						<form class="form-horizontal" method="POST" action="<?=$aksi?>?module=siswa&act=edit" enctype="multipart/form-data">
							<div class="box-body">
								
							<div class="form-group">
							  <label class="col-sm-2 control-label">Nama</label>
							  <div class="col-sm-6">
							  	<input type="hidden" name="id" value="<?=$data['id'];?>">
								<input type="text" class="form-control" name="nama" value="<?=$data['nama'];?>">
							  </div>
							</div>


						   <div class="form-group">
							  <label class="col-sm-2 control-label">Jenis Kelamin</label>
							  <div class="col-sm-6">
							  <?php
									if($r['jk']=="perempuan"){
										?>
											<label>
											  <input type="radio" name="jk" value="perempuan" checked>
											  Perempuan
											</label>
											<label>
											  <input type="radio" name="jk" value="laki-laki">
											  Laki-Laki
											</label>
										<?php
									}
									else{
										?>
											<label>
											  <input type="radio" name="jk" value="perempuan" >
											  Perempuan
											</label>
											<label>
											  <input type="radio" name="jk" value="laki-laki" checked>
											  Laki-Laki
											</label>
										<?php
									}
								?>
							  </div>
							</div>
							
							<div class="form-group">
							  <label class="col-sm-2 control-label">Alamat</label>
							  <div class="col-sm-6">
								<textarea name="alamat" class="form-control" value="<?=$data['alamat'];?>"><?=$data['alamat'];?></textarea>
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Kelas Asal</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="kelas_asal" value="<?=$data['kelas_asal'];?>">
							  </div>
							</div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Foto</label>
							  <div class="col-sm-6">
								<img src="modul/mod_siswa/upload/<?php echo $data['foto'];?>"  width="100px" height="120px"> <br><br>
								<input type="file" name="gambar">
							  </div>
							</div>

							 <div class="form-group">
							  <label class="col-sm-2 control-label">Tanggal Lahir</label>   
                                <div class="col-md-6">
                                    <input type="date" name="tgl_lahir" class="form-control" value="<?=$data['tgl_lahir'];?>">
                                </div>
							</div>


							<div class="form-group">
							  <label class="col-sm-2 control-label">Tempat Lahir</label>
                                <div class="col-md-6">
                                    <input type="text" name="tempat_lahir" class="form-control" value="<?=$data['tempat_lahir'];?>" placeholder="Tempat Lahir">
                                </div>
                             </div>
                          
							<div class="form-group">
							  <label class="col-sm-2 control-label">Username</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="username" value="<?=$data['username'];?>">
							  </div>
							 </div>

							<div class="form-group">
							  <label class="col-sm-2 control-label">Password</label>
							  <div class="col-sm-6">
								<input type="password" class="form-control" value="<?=$data['password'];?>" name="password">
							  </div>
							</div>

																
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
								<button type="submit" name="submit" class="btn btn-primary pull-right">Submit</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
break;
	}
}
?>
