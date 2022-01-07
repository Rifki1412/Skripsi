<title>Ubah Password</title>
<?php
	if ($_SESSION[username] != "" && $_SESSION[password] != ""){
		switch($_GET[act]){
			default:
			echo "	
			<div class='container-fluid'>
			  	<div class='row page-titles mx-0'>
			      	<div class='col-sm-6 p-md-0'>
			        	<div class='welcome-text'>
				            <h4>Ubah Password "; echo ucfirst($_SESSION['username']);echo"</h4>
				            <span class='ml-0'>Ubah password admin sistem pakar jambu air</span>
			        	</div>
			      	</div>
			  	</div> 
				<div class='row'>
				    <div class='col-12'>
				      	<div class='card'>
				        	<div class='card-body'>
				          		<div class='form-validation'>
				          			<form method='post' action='?module=password&act=updatepassword'>
										<div class='row'>
							                <div class='col-xl-6'>
							                  	<div class='form-group row'>
							                    	<label class='col-lg-4 col-form-label' for='val-username'>Username<span class='text-danger'>*</span></label>
							                    	<div class='col-lg-6'>
							                      		<input type='text' class='form-control' id='val-username' name='val-username' placeholder='Enter a username..' value='".$_SESSION[username]."' disabled>
							                    	</div>
							                  	</div>
							                  	<div class='form-group row'>
							                    	<label class='col-lg-4 col-form-label' for='val-password'>Password Lama<span class='text-danger'>*</span></label>
							                    	<div class='col-lg-6'>
							                      		<input type='password' class='form-control' id='val-password' name='val-password' placeholder='Ketik password lama...' required>
							                    	</div>
							                  	</div>
							                  	<div class='form-group row'>
							                    	<label class='col-lg-4 col-form-label' for='val-password-new'>Password Baru<span class='text-danger'>*</span></label>
							                    	<div class='col-lg-6'>
							                      		<input type='password' class='form-control' id='val-password-new' name='val-password-new' placeholder='Ketik password baru...' required>
							                    	</div>
							                  	</div>
							                  	<div class='form-group row'>
							                    	<label class='col-lg-4 col-form-label' for='val-confirm-password'>Konfirmasi Password Baru <span class='text-danger'>*</span></label>
							                    	<div class='col-lg-6'>
							                      		<input type='password' class='form-control' id='val-confirm-password' name='val-confirm-password' placeholder='Ulangi password baru...' required>
							                    	</div>
							                  	</div>
								            </div>
								            <div class='col-xl-6'>
								            	<label><b>Jika Anda Lupa Password</b></label>
								                <div class='form-group row'>
								                    <label class='col-lg-4 col-form-label' for='val-question'>Pilih Pertanyaan Rahasia
								                        <span class='text-danger'>*</span>
								                    </label>
								                    <div class='col-lg-7'>
								                        <select class='form-control' id='val-question' name='val-question'>
							                              	<option value='Apa Makanan Favorit Anda?'>Apa Makanan Favorit Anda?</option>
							                              	<option value='Apa Buku Favorit Anda?'>Apa Buku Favorit Anda?</option>
							                              	<option value='Apa Nama Sekolah Dasar Anda?'>Apa Nama Sekolah Dasar Anda?</option>
							                              	<option value='Siapa Nama Sahabat Anda Waktu Masih Kecil?'>Siapa Nama Sahabat Anda Waktu Masih Kecil?</option>
							                              	<option value='Siapa Nama Guru Favorit Anda?'>Siapa Nama Guru Favorit Anda?</option>
							                              	option value='Di Kota Manakah Ibu Anda Lahir?'>Di Kota Manakah Ibu Anda Lahir?</option>
								                        </select>
								                    </div>
								                </div>
								                <div class='form-group row'>
								                    <label class='col-lg-4 col-form-label' for='val-answer'>Jawaban Anda
								                        <span class='text-danger'>*</span>
								                    </label>
								                    <div class='col-lg-7'>
								                        <input type='text' class='form-control' id='val-answer' name='val-answer' required>
								                    </div>
								                </div>
								                <div class='form-group row'>
								                    <div class='col-lg-8 ml-auto'>
								                      	<input type=submit name=submit class='btn btn-success text-white' value='Simpan'>
								                      	<input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=';\">
								                      	<input type='hidden' name='pass' value='".$_SESSION[password]."'>
														<input type='hidden' name='nama' value='".$_SESSION[username]."'>
								                    </div>
								                </div>
								            </div>
								        </div>
								    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>";
		break;

		case "updatepassword":
			include "config/koneksi.php";
			$user = $_POST['nama'];
			$passwordlama = $_POST['val-password'];
			$passwordbaru1 = $_POST['val-password-new'];
			$passwordbaru2 = $_POST['val-confirm-password'];
			$pertanyaan = $_POST['val-question'];
			$jawaban = $_POST['val-answer'];
			$query = "SELECT * FROM admin WHERE username = '$user'";
			$hasil = mysql_query($query);
			$data  = mysql_fetch_array($hasil);

			if ($data['password'] ==  md5($passwordlama)) {
				if ($passwordbaru1 == $passwordbaru2) {
					$passwordbaruenkrip = md5($passwordbaru1);
					$jawabanenkrip = md5($jawaban);
					$query = "UPDATE admin SET password = '$passwordbaruenkrip', pertanyaan = '$pertanyaan', jawaban = '$jawabanenkrip' WHERE username = '$user' ";
					$hasil = mysql_query($query);
					
					if($hasil) 
					echo "
					<link href='assets/icons/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css' rel='stylesheet'>
					<link rel='stylesheet' href='aset/cinta.css'>
					<link href='assets/css/style.css' rel='stylesheet' type='text/css' media='all'/>
				  	<div class='errorpage' style='margin: 100px; 0px; 0px; 0px;'> 
				      <center>
				        <div class='danger'>
				          <i class='fa fa-check text-success'></i></div><br><h1>BERHASIL!</h1>
				          Password Berhasil Diubah.<br><br>
				          <input name='submit' id='submitku' type=submit class='btn btn-primary' style='padding: 6px 12px;' value='OK' onclick=\"window.location.href='logout.php';\">
				        </div>
				      </center>
				    </div>";
				} else 
				echo "
				<link href='assets/icons/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css' rel='stylesheet'>
				<link rel='stylesheet' href='aset/cinta.css'>
				<link href='assets/css/style.css' rel='stylesheet' type='text/css' media='all'/>
			  	<div class='errorpage' style='margin: 100px; 0px; 0px; 0px;'> 
			      <center>
			        <div class='danger'>
			          <i class='fa fa-remove'></i></div><br><h1><b>GAGAL!</b></h1>
			          Password Baru Anda Tidak Sama.<br><br>
			          <input name='submit' id='submitku' type=submit class='btn btn-primary' style='padding: 6px 12px;' value='OK' onclick=\"window.location.href='?module=password';\">
			        </div>
			      </center>
			    </div>";
			} else 
			echo "
			<link href='assets/icons/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css' rel='stylesheet'>
			<link rel='stylesheet' href='aset/cinta.css'>
			<link href='assets/css/style.css' rel='stylesheet' type='text/css' media='all'/>
		  	<div class='errorpage' style='margin: 100px; 0px; 0px; 0px;'> 
		      <center>
		        <div class='danger'>
		          <i class='fa fa-remove'></i></div><br><h1><b>GAGAL!</b></h1>
		          Password Lama Anda Salah.<br><br>
		          <input name='submit' id='submitku' type=submit class='btn btn-primary' style='padding: 6px 12px;' value='OK' onclick=\"window.location.href='?module=password';\">
		        </div>
		      </center>
		    </div>";
		break;
		}
	} else {
		echo "<h2><a href='#'>Akses Ditolak</a></h2>
		<br>
		<strong>Anda harus login untuk dapat mengakses menu ini!</strong><br><br>
		<input type=button value='   Klik Disini   ' onclick=location.href='./'><br><br><br><br>";
	}
?>