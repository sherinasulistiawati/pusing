<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
	$aksi="modul/mod_waktu_pengajar/aksi_waktu_pengajar.php";
switch($_GET[act]){
	// Tampil User
default:
?>
	<section class="content-header">
		<h1>Waktu Pengajar</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Waktu pengajar</li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">

	  <!-- SELECT2 EXAMPLE -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">List Data Waktu pengajar</h3>
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
								  <th>Tanggal</th>
								  <th>Waktu Mulai</th>
								  <th>waktu Selesai</th>
								  <th>Materi</th>
								  <th>Pengajar</th>
								  <th>Asisten</th>
								  <th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$tampil=mysql_query("SELECT * from waktu_pengajar");
									$x=1;
									while ($r=mysql_fetch_array($tampil)){
									?>
										<tr>
											<td><?php echo $x;?></td>
											<td><?php echo $r['tanggal'];?></td>
											<td><?php echo $r['waktu_mulai'];?></td>
											<td><?php echo $r['waktu_selesai'];?></td>
											<td><?php echo $r['materi'];?></td>
											<td><?php echo $r['pengajar'];?></td>
											<td><?php echo $r['asisten'];?></td>
											<td class='center' width='85'><a href="?module=waktu_pengajar&act=edit&id=<?=$r['id']?>"><img src='images/edit.png' border='0' title='edit' /></a>
											<a href="<?=$aksi?>?module=waktu_pengajar&act=hapus&id=<?=$r['id']?>"><img src='images/del.png' border='0' title='hapus' /></a></td>
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
					<a href="?module=waktu_pengajar&act=tambah"><button type="button" class="btn btn-primary"><i class="fa fa-fw fa-plus"></i>&nbsp Tambah Data</button></a>
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
		<h1>Waktu Pengajar</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Waktu Pengajar</a></li>
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
						<form class="form-horizontal" method="POST" action="<?=$aksi?>?module=waktu_pengajar&act=tambah">
						  <div class="box-body">
							<div class="form-group">
							<label class="col-sm-2 control-label">Tanggal</label>
							  <div class="col-sm-6">
								<input type="date" class="form-control" name="tanggal" placeholder="Input Tanggal">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Waktu Mulai</label>
							  <div class="col-sm-6">
								<input type="time" class="form-control" name="waktu_mulai" placeholder="Input Waktu Mulai">
							  </div>
							</div>
							<div class="form-group">
							<label class="col-sm-2 control-label">Waktu Selesai</label>
							  <div class="col-sm-6">
								<input type="time" class="form-control" name="waktu_selesai" placeholder="Input Waktu Selesai">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Materi</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="materi" placeholder="Input Materi">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Pengajar</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="pengajar" placeholder="Input Pengajar">
							  </div>
							</div>
							<div class="form-group">
							  <label class="col-sm-2 control-label">Asisten</label>
							  <div class="col-sm-6">
								<input type="text" class="form-control" name="asisten" placeholder="Input Asisten">
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
 $edit = mysql_query("SELECT * FROM waktu_pengajar WHERE id='$_GET[id]'");
 $r    = mysql_fetch_array($edit);
 ?>
	<section class="content-header">
		<h1>Waktu Pengajar</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Waktu Pengajar</a></li>
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
						<form class="form-horizontal" method="POST" action="<?=$aksi?>?module=waktu_pengajar&act=edit">
							<div class="box-body">
								<div class="form-group">
								<label class="col-sm-2 control-label">Tanggal</label>
								  <div class="col-sm-6">
									<input type="hidden" name="id" value="<?=$r['id'];?>">
									<input type="date" class="form-control" name="tanggal" value="<?=$r['tanggal'];?>">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-sm-2 control-label">Waktu Mulai</label>
								  <div class="col-sm-6">
									<input type="time" class="form-control" name="waktu_mulai" value="<?=$r['waktu_mulai'];?>">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-sm-2 control-label">Waktu Selesai</label>
								  <div class="col-sm-6">
									<input type="time" class="form-control" name="waktu_selesai" value="<?=$r['waktu_selesai'];?>">
								  </div>
								</div>
								<div class="form-group">
								  <label class="col-sm-2 control-label">Materi</label>
								  <div class="col-sm-6">
									<input type="hidden" name="id" value="<?=$r['id'];?>">
									<input type="text" class="form-control" name="materi" value="<?=$r['materi'];?>">
								  </div>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Pengajar</label>
								  <div class="col-sm-6">
									<input type="hidden" name="id" value="<?=$r['id'];?>">
									<input type="text" class="form-control" name="pengajar" value="<?=$r['pengajar'];?>">
								  </div>
								</div>
								<div class="form-group">
								<label class="col-sm-2 control-label">Asisten</label>
								  <div class="col-sm-6">
									<input type="hidden" name="id" value="<?=$r['id'];?>">
									<input type="text" class="form-control" name="asisten" value="<?=$r['asisten'];?>">
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