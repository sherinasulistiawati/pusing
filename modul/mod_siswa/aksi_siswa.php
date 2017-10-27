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


if ($module=='siswa' AND $act=='hapus'){
  mysql_query("DELETE FROM siswa WHERE id='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}

if ($module=='siswa' AND $act=='tambah'){
  $pass=md5($_POST['password']);
  $folder = './upload/';
  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  move_uploaded_file($source, $folder.$nama_file);
  mysql_query("INSERT INTO siswa(nama,jk,alamat,kelas_asal,foto,tgl_lahir,tempat_lahir,username,password) VALUES ('$_POST[nama]','$_POST[jk]','$_POST[alamat]','$_POST[kelas_asal]','$nama_file','$_POST[tgl_lahir]','$_POST[tempat_lahir]','$_POST[username]','$pass')");
  header('location:../../media.php?module='.$module);

}

elseif ($module=='siswa' AND $act=='edit'){
 $pass=md5($_POST['password']);
  $folder = './upload/';
  $nama_file = $_FILES['gambar']['name'];
  $source = $_FILES['gambar']['tmp_name'];
  move_uploaded_file($source, $folder.$nama_file);
  mysql_query("UPDATE siswa SET nama='$_POST[nama]',jk='$_POST[jk]',alamat='$_POST[alamat]',kelas_asal='$_POST[kelas_asal]',foto='$nama_file',tgl_lahir='$_POST[tgl_lahir]',tempat_lahir='$_POST[tempat_lahir]',username='$_POST[username]',password='$pass'
               WHERE id='$_POST[id]'");
  header('location:../../media.php?module='.$module);

}
}
?>
