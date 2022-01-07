<?php
  session_start();
  if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header('location:index.php');
    exit();
  } else {
?>
<?php
    session_start();
    include "../../config/koneksi.php";

    $module=$_GET[module];
    $act=$_GET[act];

    // Hapus admin
    if ($module=='admin' AND $act=='hapus'){
      mysql_query("DELETE FROM admin WHERE id='$_GET[id]'");
      header('location:../../index.php?module='.$module);
      header('location:../../index.php?module=' . $module);
    }

    // Input admin
    elseif ($module=='admin' AND $act=='input'){
      $username=$_POST[username];
      $nama_lengkap=$_POST[nama_lengkap];
      $pass=md5($_POST[password]);
      $pertanyaan = $_POST[question];
      $jawaban = md5($_POST[answer]);
      mysql_query("INSERT INTO admin(
  			      username,password,pertanyaan,jawaban,nama_lengkap) 
  	                       VALUES(
  				'$username','$pass','$pertanyaan','$jawaban','$nama_lengkap')");
      header('location:../../index.php?module=' . $module);
    }

    // Update admin
    elseif ($module=='admin' AND $act=='update'){
      $username=$_POST[username];
      $nama_lengkap=$_POST[nama_lengkap];
      mysql_query("UPDATE admin SET
    					username   = '$username',
    					nama_lengkap   = '$nama_lengkap'
                    WHERE id       = '$_POST[id]'");
      header('location:../../index.php?module='.$module);
    }
?>
<?php } ?>