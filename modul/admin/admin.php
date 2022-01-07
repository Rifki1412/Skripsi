<title>Administrator</title>
<?php
	session_start();
	if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
	    header('location:index.php');
	    exit();
	} else {
?>
<script Language="JavaScript">
	function Blank_TextField_Validator() {
		if (text_form.username.value == "") {
		   alert("Username tidak boleh kosong !");
		   text_form.username.focus();
		   return (false);
		}
		if (text_form.password.value == "") {
		   alert("Password tidak boleh kosong !");
		   text_form.password.focus();
		   return (false);
		}
		return (true);
	}
	function Blank_TextField_Validator_Cari() {
		if (text_form.keyword.value == "") {
		   alert("Isi dulu keyword pencarian !");
		   text_form.keyword.focus();
		   return (false);
		}
		return (true);
	}
</script>

<?php
	include "config/fungsi_alert.php";
	$aksi="modul/admin/aksi_admin.php";
	switch($_GET[act]){
		// Tampil admin
	  	default:
	  	$offset=$_GET['offset'];
		//jumlah data yang ditampilkan perpage
		$limit = 10;
		if (empty ($offset)) {
			$offset = 0;
		}
	  	$tampil=mysql_query("SELECT * FROM admin ORDER BY username");
		echo "
		<div class='container-fluid'>
	        <div class='row page-titles mx-0'>
	            <div class='col-sm-6 p-md-0'>
	                <div class='welcome-text'>
	                    <h4>Administrator</h4>
	                    <span class='ml-0'>Pengolahan Data Admin atau Pakar Sistem</span>
	                </div>
	            </div>
	            <div class='col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex'>
	              	<ol class='breadcrumb'>
	                	<button type='button' name=tambah class='btn mb-1 btn-success text-white' title='Tambah Data' alt='tambah' onclick=\"window.location.href='admin/tambahadmin';\">Tambah Data Pakar</button>
	              	</ol>
	            </div>
	        </div>
	        <div class='row'>
		        <div class='col-12'>
		            <div class='card'>
		              	<div class='card-body'>
			                <form method=POST action='?module=admin' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
			                  	<div class='input-group mb-3'>
			                      	<input type='text' name='keyword' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' required>
			                      	<div class='input-group-append'>
			                          	<input type='submit' name=Go class='btn btn-warning text-white' value='Search'>
			                      	</div>
			                  	</div>
			                </form>";
		$baris=mysql_num_rows($tampil);
		if ($_POST[Go]){
			$numrows = mysql_num_rows(mysql_query("SELECT * FROM admin where username like '%$_POST[keyword]%'"));
			if ($numrows > 0){
				echo "
							<div class='alert alert-success alert-dismissible alert-alt fade show'>
			                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
			                    </button>
			                    <strong><i class='fa fa-check'></i> Success!</strong> Data yang anda cari di temukan.
			                </div>";
				$i = 1;
				echo" 
							<div class='table-responsive'>
			                  	<table class='table table-striped' style='border: 2px solid #70c745;' cellpadding='0' cellspacing='0'>
			                    	<thead style='background-color: #70c745; color: #fff;'>
			                      		<tr>
					                        <th>No</th>
					                        <th>Username</th>
					                		<th>Nama Lengkap</th>
					                        <th width='106'>Aksi</th>
			                      		</tr>
			                    	</thead>
			        		        <tbody>"; 
				$hasil = mysql_query("SELECT * FROM admin where username like '%$_POST[keyword]%'");
				$no = 1;
				$counter = 1;
			    while ($r=mysql_fetch_array($hasil)){
			    	if ($counter % 2 == 0) 
			    		$warna = "light";
			    	else 
			    		$warna = "dark";
	       			echo "				
	       								<tr class='".$warna."'>
										 	<td>$no</td>
								         	<td>$r[username]</td>
								         	<td>$r[nama_lengkap]</td>
										 	<td align=center>
										 		<div class='btn-group'>
										 			<a type='button' class='btn btn-warning' href=admin/editadmin/$r[id]><i class='fa fa-pencil text-white' aria-hidden='true'></i></a>
										 		</div>
										 		<div class='btn-group'>
								          			<a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=admin&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
								          		</div>
							             	</td>
							            </tr>";
				    $no++;
					$counter++;
	    		}
		echo " 						</tbody>
	                  			</table>
	                		</div>
	              		</div>
	            	</div>
	          	</div>
	        </div>
	    </div>";
			} else {
				echo "
							<div class='alert alert-danger alert-dismissible alert-alt fade show'>
			                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
			                    </button>
			                    <strong><i class='fa fa-ban'></i> Failed!</strong> Maaf, Data yang anda cari tidak ditemukan, silahkan inputkan dengan benar dan cari kembali.
                			</div>
              			</div>
            		</div>
          		</div>
        	</div>
      	</div>";
			}
		} else {
			if($baris>0){
				echo" 
							<div class='table-responsive'> 
					            <table class='table table-striped' style='border: 2px solid #454545;' cellpadding='0' cellspacing='0'>
					              	<thead style='background-color: #454545; color: #fff;'>
					                	<tr>
						                  	<th>No</th>
						                  	<th>Username</th>
						                  	<th>Nama Lengkap</th>
						                  	<th width='106'>Aksi</th>
					                	</tr>
					              	</thead>
							        <tbody>"; 
				$hasil = mysql_query("SELECT * FROM admin ORDER BY username limit $offset,$limit");
				$no = 1;
				$no = 1 + $offset;
				$counter = 1;
			    while ($r=mysql_fetch_array($hasil)){
			    	if ($counter % 2 == 0) 
			    		$warna = "dark";
			    	else 
			    		$warna = "light";
	       			echo "
	       								<tr class='".$warna."'>
										 	<td>$no</td>
								         	<td>$r[username]</td>
								         	<td>$r[nama_lengkap]</td>
										 	<td align=center>
										 		<div class='btn-group'>
										 			<a type='button' class='btn btn-warning text-white' href=admin/editadmin/$r[id]><i class='fa fa-pencil' aria-hidden='true'></i></a>
										 		</div>
										 		<div class='btn-group'>
								          			<a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=admin&act=hapus&id=$r[id]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
								          		</div>
							             	</td>
							            </tr>";
			      	$no++;
				  	$counter++;
	    		}
	    echo "
	    							</tbody>
	                  			</table>";
      	echo "					<nav>
      								<ul class='pagination pagination-sm pagination-gutter'>";
						              	if ($offset != 0) {
						              		$prevoffset = $offset - 10;
						               		echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=admin&offset=$prevoffset>Back</a></li>";
						              	} else {
						                	echo "<li class='page-item page-indicator active'><a class='page-link' href='javascript:void()'>Back</a></li>";
						              	}

						              	$halaman = intval($baris / $limit);

						              	if ($baris % $limit) {
						                	$halaman++;
						              	}
						              	for ($i = 1; $i <= $halaman; $i++) {
						                	$newoffset = $limit * ($i - 1);
						                	if ($offset != $newoffset) {
						                  		echo "<li class='page-item'><a class='page-link' href=index.php?module=admin&offset=$newoffset>$i</a></li>";
						                	} else {
						                  		echo "<li class='page-item active'><a class='page-link' href='javascript:void()'>" . $i . "</a></li>"; 
						                	}
						             	}

						              	if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
						                	$newoffset = $offset + $limit;
						                	echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=admin&offset=$newoffset>Next</a></li>";
						              	} else {
						                	echo "<li class='page-item page-indicator active'><a class='page-link' href='javascript:void()'>Next</a></li>"; 
						              	}
		echo "  					</ul>
      							</nav>
	                		</div>
	              		</div>
	            	</div>
	          	</div>
	        </div>
	    </div>";
			} else {
				echo "<b>Data Kosong !</b>
                  </div>
                </div>
              </div>
            </div>
          </div>";
			}
		}
		break;
	  
	case "tambahadmin":
		echo "
		<div class='container-fluid'>     
	        <div class='row page-titles mx-0'>
	          	<div class='col-sm-6 p-md-0'>
	            	<div class='welcome-text'>
		              	<h4>Administrator</h4>
		              	<span class='ml-0'>Tambah data admin atau pakar</span>
	            	</div>
	          	</div>
	        </div>
	        <div class='row'>
	          	<div class='col-12'>
	            	<div class='card'>
	              		<div class='card-body'>
	                		<div class='form-validation'>
								<form name=text_form method=POST action='$aksi?module=admin&act=input' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
									<div class='row'>
							            <div class='col-xl-6'>
							                <div class='form-group row'>
				                      			<label class='col-lg-4 col-form-label' for='val-name'>Nama Lengkap<span class='text-danger'>*</span></label>
				                      			<div class='col-lg-6'>
				                      				<input type=text autocomplete='off' id='nama_lengkap' name='nama_lengkap' class='form-control' placeholder='Masukkan nama lengkap...' required>
				                      			</div> 
				                    		</div>
						                    <div class='form-group row'>
						                      	<label class='col-lg-4 col-form-label' for='val-username'>Username<span class='text-danger'>*</span></label>
						                      	<div class='col-lg-6'>
						                      		<input type=text autocomplete='off' id='username' name='username' class='form-control' placeholder='Masukkan username...' required>
						                      	</div> 
						                    </div>
						                    <div class='form-group row'>
						                      	<label class='col-lg-4 col-form-label' for='val-password'>Password<span class='text-danger'>*</span></label>
						                      	<div class='col-lg-6'>
						                      		<input type=password autocomplete='off' id='password' name='password' class='form-control' placeholder='Masukkan password admin...' required>
						                      	</div> 
						                    </div>
						                </div>
					                    <div class='col-xl-6'>
							            	<label><b>Jika Anda Lupa Password</b></label>
							                <div class='form-group row'>
							                    <label class='col-lg-4 col-form-label' for='question'>Pilih Pertanyaan Rahasia
							                        <span class='text-danger'>*</span>
							                    </label>
							                    <div class='col-lg-7'>
							                        <select class='form-control' id='question' name='question'>
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
							                    <label class='col-lg-4 col-form-label' for='answer'>Jawaban Anda
							                        <span class='text-danger'>*</span>
							                    </label>
							                    <div class='col-lg-7'>
							                        <input type='text' class='form-control' id='answer' name='answer' required>
							                    </div>
							                </div>
							                <div class='form-group row'>
							                    <div class='col-lg-8 ml-auto'>
							                      	<input type=submit name=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
                									<input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=admin';\">
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
	    
	case "editadmin":
	    $edit=mysql_query("SELECT * FROM admin WHERE id='$_GET[id]'");
	    $r=mysql_fetch_array($edit);
		
	    echo "
	    <div class='container-fluid'>
	        <div class='row page-titles mx-0'>
	          	<div class='col-sm-6 p-md-0'>
	            	<div class='welcome-text'>
	              		<h4>Administrator</h4>
	              		<span class='ml-0'>Ubah data admin atau pakar</span>
	            	</div>
	          	</div>
	        </div>
	        <div class='row'>
	          	<div class='col-12'>
	            	<div class='card'>
	              		<div class='card-body'>
	                		<div class='basic-form'>
	    						<form name=text_form method=POST action='$aksi?module=admin&act=update' onsubmit='return Blank_TextField_Validator()'>
	    							<input type=hidden name=id value='$r[id]'>
	    							<div class='form-group'>
				                      	<label>Username</label>
				                      	<input type=text autocomplete='off' id='username' name='username' class='form-control' value=\"$r[username]\"> 
				                    </div>
				                    <div class='form-group'>
				                      	<label>Nama Lengkap</label>
				                      	<input type=text autocomplete='off' id='nama_lengkap' name='nama_lengkap' class='form-control' value=\"$r[nama_lengkap]\"> 
				                    </div>
						          	<input type=submit name=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
                    				<input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=admin';\">
						        </form>
						        </div>
			             	</div>
			            </div>
			        </div>
			    </div>
			</div>
		</div>";
	    break;  
	}
?>
<?php } ?>
