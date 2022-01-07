<title>Login Gagal!</title>
<?php
  session_start();
  include "config/koneksi.php";

  $user=$_POST['username'];
  $pass=md5($_POST['password']);

  $login=mysql_query("select * from admin where username='$user' and password='$pass'");

  $ketemu=mysql_num_rows($login);
  $r=mysql_fetch_array($login);
  if ($ketemu>0) {
  	$_SESSION['username'] = $r['username'];
  	$_SESSION['password'] = $r['password'];
  	$_SESSION['nama_lengkap'] = $r['nama_lengkap'];
  	header("location: index.php");
  }
  else{
    echo " 
    <link href='assets/icons/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css' rel='stylesheet'>
		<link rel='stylesheet' href='aset/cinta.css'>
		<link href='assets/css/style.css' rel='stylesheet' type='text/css' media='all'/>
  	<div class='errorpage' style='margin: 100px; 0px; 0px; 0px;'> 
      <center>
        <div class='danger'>
          <i class='fa fa-exclamation-triangle'></i></div><br><h1>LOGIN GAGAL!</h1>
          Username dan Password anda salah.<br><br>
          <input name='submit' id='submitku' type=submit class='btn btn-primary' style='padding: 6px 12px;' value='ULANGI LAGI' onclick=location.href='formlogin'><br>
          <p class='message'>Masih bingung, Kembali ke 
          <a href='bantuan'>Halaman Bantuan</a></p>
        </div>
      </center>
    </div>";
  }
?>