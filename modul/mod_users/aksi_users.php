<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['passuser'])){
  echo "<link href='style.css' rel='stylesheet' type='text/css'>
 <center>Untuk mengakses modul, Anda harus login <br>";
  echo "<a href=../../index.php><b>LOGIN</b></a></center>";
}
else{
include "../../config/koneksi.php";

$module=$_GET['module'];
$act=$_GET['act'];

// Input user
if ($module=='users' AND $act=='tambah'){
  $pass=md5($_POST['password']);
  mysql_query("INSERT INTO users(username,
                                 password,
                                 nama_lengkap,
                                 email, 
                                 no_telp,
                                 id_users_level,
                                 id_session) 
	                       VALUES('$_POST[username]',
                                '$pass',
                                '$_POST[nama_lengkap]',
                                '$_POST[email]',
                                '$_POST[no_telp]',
                                '$_POST[id_users_level]',
                                '$pass')");
  header('location:../../media.php?module='.$module);
}

// Update user
elseif ($module=='users' AND $act=='edit'){
  if (empty($_POST['password'])) {
    mysql_query("UPDATE users SET nama_lengkap   = '$_POST[nama_lengkap]',
                                  email          = '$_POST[email]',
                                  blokir         = '$_POST[blokir]',  
                                  no_telp        = '$_POST[no_telp]',  
                                  id_users_level = '$_POST[id_users_level]'  
                           WHERE  id_users       = '$_POST[id]'");
  }
  // Apabila password diubah
  else{
    $pass=md5($_POST['password']);
    mysql_query("UPDATE users SET password       = '$pass',
                                 nama_lengkap    = '$_POST[nama_lengkap]',
                                 email           = '$_POST[email]',  
                                 blokir          = '$_POST[blokir]',  
                                 no_telp         = '$_POST[no_telp]',  
                                 no_telp         = '$_POST[id_users_level]'  
                           WHERE id_users        = '$_POST[id]'");
  }
  header('location:../../media.php?module='.$module);
}
}
?>