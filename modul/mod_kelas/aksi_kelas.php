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
if ($module=='kelas' AND $act=='hapus'){
  mysql_query("DELETE FROM kelas WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input menu utama
if ($module=='kelas' AND $act=='tambah'){
  mysql_query("INSERT INTO kelas(nama_kelas) VALUES('$_POST[nama_kelas]')");
  header('location:../../media.php?module='.$module);
}

// Update menu utama
elseif ($module=='kelas' AND $act=='edit'){
  mysql_query("UPDATE kelas SET nama_kelas='$_POST[nama_kelas]'
               WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
