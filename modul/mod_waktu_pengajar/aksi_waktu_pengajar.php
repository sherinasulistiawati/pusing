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

// Hapus waktu pengajar
if ($module=='waktu_pengajar' AND $act=='hapus'){
  mysql_query("DELETE FROM waktu_pengajar WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

// Input waktu pengajar
if ($module=='waktu_pengajar' AND $act=='tambah'){
  mysql_query("INSERT INTO waktu_pengajar(tanggal,waktu_mulai,waktu_selesai,materi,pengajar,asisten) VALUES('$_POST[tanggal]','$_POST[waktu_mulai]','$_POST[waktu_selesai]','$_POST[materi]','$_POST[pengajar]','$_POST[asisten]')");
  header('location:../../media.php?module='.$module);
}

// Update waktu pengajar
elseif ($module=='waktu_pengajar' AND $act=='edit'){
  mysql_query("UPDATE waktu_pengajar SET tanggal='$_POST[tanggal]',waktu_mulai='$_POST[waktu_mulai]',waktu_selesai='$_POST[waktu_selesai]',materi='$_POST[materi]',pengajar='$_POST[pengajar]',asisten='$_POST[asisten]'
               WHERE id = '$_POST[id]'");
  header('location:../../media.php?module='.$module);
}
}
?>
