<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	$aksi="modul/mod_absensi/aksi_absensi.php";
switch($_GET[act]){
	// Tampil User
default:
?>
	<section class="content-header">
		<h1>Absensi</h1>
	</section>

	<!-- Main content -->
	<section class="content">

	  <!-- SELECT2 EXAMPLE -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">List Data Absensi</h3>
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
								  <th>Status</th>
								  <th>Keterangan</th>
								  <th>Nama Siswa</th>
								  <th>Kelas</th>
								  <th>Angkatan</th>
								  <th>Pengajar</th>
								  <th>Asisten</th>
								  <th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$tampil=mysql_query("SELECT absensi.*,siswa.nama,kelas.nama_kelas from 
									absensi join siswa ON siswa_kelas.id_siswa=siswa.id 
									join kelas ON siswa_kelas.id_kelas=kelas.id");

									$x=1;
									while ($r=mysql_fetch_array($tampil)){
									?>
										<tr>
											<td><?php echo $x;?></td>
											<td><?php echo $r['status'];?></td>
											<td><?php echo $r['keterangan'];?></td>
											<td><?php echo $r[''];?></td>										
											<td class='center' width='85'><a href="?module=absensi&act=edit&id=<?=$r['id']?>"><img src='images/edit.png' border='0' title='edit' /></a>
											<a href="<?=$aksi?>?module=absensi&act=hapus&id=<?=$r['id']?>"><img src='images/del.png' border='0' title='hapus' /></a></td>
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
					<a href="?module=absensi&act=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>&nbsp Tambah Data</button></a>
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
		<h1>Absensi</h1>
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
						<form class="form-horizontal" method="POST" action="<?=$aksi?>?module=absensi&act=tambah">
						  <div class="box-body">
						  <div class="form-group">
							  <label class="col-sm-2 control-label">Status</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="status">
							  </div>
							</div>
							 <div class="form-group">
							  <label class="col-sm-2 control-label">Status</label>
							  <div class="col-sm-6">
								<label>
								  <input type="radio" name="status" value="alpha">
								  Alpa
								</label>
								<label>
								  <input type="radio" name="status" value="izin">
								  izin
								</label>
								<label>
								  <input type="radio" name="status" value="sakit">
								  Sakit
								</label>
							  </div>
							</div>
							<div class="form-group">
								  <label class="col-sm-2 control-label">Keterangan</label>
							  <div class="col-sm-6">
								<input type="text" name="keterangan" class="form-control">
							</div>
							</div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Nama Siswa</label>
							  <div class="col-sm-6">
								<select name="id_siswa" class="form-control" >
									<?php
										$tampil=mysql_query("SELECT * FROM siswa");
										while ($r=mysql_fetch_array($tampil)) {
											?>
										<option value="<?php echo $r['id'] ?>"><?=$r['nama']?></option>
										<?php
										}
									?>
								</select>
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Kelas</label>
							  <div class="col-sm-6">
								<select name="id_kelas" class="form-control" >
									<?php
										$tampil=mysql_query("SELECT * FROM kelas");
										while ($r=mysql_fetch_array($tampil)) {
											?>
										<option value="<?php echo $r['id'] ?>"><?=$r['nama_kelas']?></option>
										<?php
										}
									?>
								</select>
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
 $edit = mysql_query("SELECT * FROM absensi WHERE id='$_GET[id]'");
 $data    = mysql_fetch_array($edit);
 ?>
	<section class="content-header">
		<h1>Absensi</h1>
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
						<form class="form-horizontal" method="POST" action="<?=$aksi?>?module=absensi&act=edit">
							<div class="box-body">
							<div class="form-group">
							  <label class="col-sm-2 control-label">Status</label>
							  <div class="col-sm-6">
							  <?php
									if($r['status']=="alpha"){
										?>
											<label>
											  <input type="radio" name="status" value="alpha">
											  Alpa
											</label>
											<label>
											  <input type="radio" name="status" value="izin">
											  Izin
											</label>
											<label>
											  <input type="radio" name="status" value="sakit">
											  Sakit
											</label>
										<?php
									}
									else{
										?>
											<label>
											  <input type="radio" name="status" value="alpha">
											  Alpa
											</label>
											<label>
											  <input type="radio" name="status" value="izin">
											  Izin
											</label>
											<label>
											  <input type="radio" name="status" value="sakit">
											  Sakit
											</label>
										<?php
									}
								?>
							  </div>
							</div>
							<div class="form-group">
								  <label class="col-sm-2 control-label">Keterangan</label>
							  <div class="col-sm-6">
								<input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan'] ?>">
							</div>
							</div>
							<input type="hidden" name="id" value="<?php echo $data['id'] ?>">
							<div class="form-group">
							  <label class="col-sm-2 control-label">Nama Siswa</label>
							  <div class="col-sm-6">
								<select name="id_siswa" class="form-control" >
									<?php
										$tampil=mysql_query("SELECT * FROM siswa");
										while ($r=mysql_fetch_array($tampil)) {
											?>
										<option value="<?php echo $r['id'] ?>" <?php if($data['id_siswa']==$r['id']) echo 'selected' ?>><?=$r['nama']?></option>
										<?php
										}
									?>
								</select>
							  </div>
							</div>
							

							<div class="form-group">
							  <label class="col-sm-2 control-label">Kelas</label>
							  <div class="col-sm-6">
								<select name="id_kelas" class="form-control" >
									<?php
										$tampil=mysql_query("SELECT * FROM kelas");
										while ($r=mysql_fetch_array($tampil)) {
											?>
										<option value="<?php echo $r['id'] ?>" <?php if($data['id_kelas']==$r['id']) echo 'selected' ?>> <?=$r['nama_kelas']?></option>
										<?php
										}
									?>
								</select>
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
