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
if ($module=='siswa_kelas' AND $act=='hapus'){
  mysql_query("DELETE FROM siswa_kelas WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input menu utama
if ($module=='siswa_kelas' AND $act=='tambah'){
  mysql_query("INSERT INTO siswa_kelas(id_siswa,id_kelas,angkatan) VALUES ('$_POST[id_siswa]','$_POST[id_kelas]','$_POST[angkatan]')");
  header('location:../../media.php?module='.$module);
}

// Update menu utama
elseif ($module=='siswa_kelas' AND $act=='edit'){
  mysql_query("UPDATE siswa_kelas SET id_siswa='$_POST[id_siswa]',id_kelas='$_POST[id_kelas]',angkatan='$_POST[angkatan]'
               WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>