<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";
include "../../config/fungsi_seo.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Hapus menu utama
if ($module=='absensi' AND $act=='hapus'){
  mysql_query("DELETE FROM absensi WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input menu utama
if ($module=='absensi' AND $act=='tambah'){
  mysql_query("INSERT INTO absensi(status,keterangan,siswa_kelas,waktu_pengajar) VALUES ('$_POST[status]','$_POST[keterangan]','$_POST[siswa_kelas]','$_POST[waktu_pengajar]')");
  header('location:../../media.php?module='.$module);
}

// Update menu utama
elseif ($module=='absensi' AND $act=='edit'){
  mysql_query("UPDATE absensi SET status='$_POST[status]',keterangan='$_POST[keterangan]',siswa_kelas='$_POST[siswa_kelas]',waktu_pengajar='$_POST[waktu_pengajar]' WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>