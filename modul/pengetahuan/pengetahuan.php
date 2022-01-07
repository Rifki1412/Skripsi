<title>Pengetahuan</title>
<?php
session_start();
if (!(isset($_SESSION['username']) && isset($_SESSION['password']))) {
    header('location:index.php');
    exit();
} else {
    ?>
<script type="text/javascript">
function Blank_TextField_Validator()
{
if (text_form.kode_penyakit.value == "")
{
   alert("Pilih dulu penyakit !");
   text_form.kode_penyakit.focus();
   return (false);
}
if (text_form.kode_gejala.value == "")
{
   alert("Pilih dulu gejala !");
   text_form.kode_gejala.focus();
   return (false);
}
if (text_form.mb.value == "")
{
   alert("Isi dulu MB !");
   text_form.mb.focus();
   return (false);
}
if (text_form.md.value == "")
{
   alert("Isi dulu MD !");
   text_form.md.focus();
   return (false);
}
return (true);
}
function Blank_TextField_Validator_Cari()
{
if (text_form.keyword.value == "")
{
   alert("Isi dulu keyword pencarian !");
   text_form.keyword.focus();
   return (false);
}
return (true);
}
-->
</script>
<?php
	include "config/fungsi_alert.php";
	$aksi="modul/pengetahuan/aksi_pengetahuan.php";
	switch($_GET[act]){
		default:
		$offset=$_GET['offset'];
		$limit = 10;
		if (empty ($offset)) {
			$offset = 0;
		}
		$tampil=mysql_query("SELECT * FROM basis_pengetahuan ORDER BY kode_pengetahuan");
		echo " 
		<div class='container-fluid'>
			<div class='row page-titles mx-0'>
			    <div class='col-sm-6 p-md-0'>
				    <div class='welcome-text'>
				        <h4>Basis Pengetahuan</h4>
				        <span class='ml-0'>Pengolahan Basis Pengetahuan Penyakit Tanaman Jambu Air</span>
				    </div>
			    </div>
			    <div class='col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex'>
			     	<ol class='breadcrumb'>
			        	<button type='button' name=tambah class='btn mb-1 btn-success text-white' title='Tambah Basis Pengetahuan' onclick=\"window.location.href='pengetahuan/tambahpengetahuan';\">Tambah Basis Pengetahuan</button>
			      	</ol>
			    </div>
			</div>
			<div class='row'>
		    	<div class='col-12'>
		      		<div class='card'>
		        		<div class='card-body'>
							<form method=POST action='?module=pengetahuan' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
								<div class='input-group mb-3'>
                                    <input type='text' name='keyword' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' required>
                                    <div class='input-group-append'>
                                        <input type='submit' name=Go class='btn btn-warning text-white' value='Search'>
                                    </div>
                                </div>
			                </form>";
			$baris=mysql_num_rows($tampil);
			if ($_POST[Go]){
				$numrows = mysql_num_rows(mysql_query("SELECT * FROM basis_pengetahuan b,penyakit p where b.kode_penyakit=p.kode_penyakit AND p.nama_penyakit like '%$_POST[keyword]%'"));
				if ($numrows > 0){
			echo "			<div class='alert alert-success alert-dismissible alert-alt fade show'>
			                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
			                    </button>
			                    <strong><i class='fa fa-check'></i> Success!</strong> Data yang anda cari di temukan.
			                </div>";
					$i = 1;
			echo" 			<div class='table-responsive'> 				
								<table class='table table-striped' style='border: 2px solid #70c745;' cellpadding='0' cellspacing='0'>
							        <thead style='background-color: #70c745; color: #fff;'>
								        <tr>
							              	<th>No</th>
							              	<th>Penyakit</th>
							              	<th>Gejala</th>
							              	<th>MB</th>
							              	<th>MD</th>
							              	<th width='106'>Aksi</th>
						              	</tr>
					          		</thead>
							  		<tbody>"; 
					$hasil = mysql_query("SELECT * FROM basis_pengetahuan b,penyakit p where b.kode_penyakit=p.kode_penyakit AND p.nama_penyakit like '%$_POST[keyword]%'");
					$no = 1;
					$counter = 1;
				    while ($r=mysql_fetch_array($hasil)){
						if ($counter % 2 == 0) $warna = "dark";
						else $warna = "light";
						$sql = mysql_query("SELECT * FROM gejala where kode_gejala = '$r[kode_gejala]'");
						$rgejala=mysql_fetch_array($sql);
			echo "						<tr class='".$warna."'>
										 	<td align=center>$no</td>
										 	<td>$r[nama_penyakit]</td>
										 	<td>$rgejala[nama_gejala]</td>
										 	<td align=center>$r[mb]</td>
										 	<td align=center>$r[md]</td>
										 	<td align=center>
										 		<div class='btn-group'>
										 			<a type='button' class='btn btn-warning text-white' href=pengetahuan/editpengetahuan/$r[kode_pengetahuan]><i class='fa fa-pencil' aria-hidden='true'></i></a> 
										 		</div>
										 		<div class='btn-group'>
								          			<a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=pengetahuan&act=hapus&id=$r[kode_pengetahuan]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
								          		</div>
							             	</td>
							            </tr>";
					    $no++;
						$counter++;
	    			}
	    echo "						</tbody>
	    						</table>
	    					</div>
	    				</div>
	    			</div>
	    		</div>
	    	</div>
	    </div>";
				} else {
		echo "				<div class='alert alert-danger alert-dismissible alert-alt fade show'>
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
			echo" 			<div class='table-responsive'> 				
								<table class='table table-striped' style='border: 2px solid #454545;' cellpadding='0' cellspacing='0'>
							        <thead style='background-color: #454545; color: #fff;'>
							            <tr>
							              	<th>No</th>
							              	<th>Penyakit</th>
							              	<th>Gejala</th>
							              	<th>MB</th>
							              	<th>MD</th>
							              	<th width='106'>Aksi</th>
							            </tr>
							        </thead>
									<tbody>"; 
				$hasil = mysql_query("SELECT * FROM basis_pengetahuan ORDER BY kode_pengetahuan limit $offset,$limit");
				$no = 1;
				$no = 1 + $offset;
				$counter = 1;
			    while ($r=mysql_fetch_array($hasil)){
					if ($counter % 2 == 0) $warna = "dark";
					else $warna = "light";
					$sql = mysql_query("SELECT * FROM gejala where kode_gejala = '$r[kode_gejala]'");
					$rgejala=mysql_fetch_array($sql);
					$sql2 = mysql_query("SELECT * FROM penyakit where kode_penyakit = '$r[kode_penyakit]'");
					$rpenyakit=mysql_fetch_array($sql2);
	       echo "						<tr class='".$warna."'>
											<td align=center>$no</td>
											<td>$rpenyakit[nama_penyakit]</td>
											<td>$rgejala[nama_gejala]</td>
											<td align=center>$r[mb]</td>
											<td align=center>$r[md]</td>
											<td align=center>
												<div class='btn-group'>
													<a type='button' class='btn btn-warning text-white' href=pengetahuan/editpengetahuan/$r[kode_pengetahuan]><i class='fa fa-pencil' aria-hidden='true'></i></a> 
												</div>
												<div class='btn-group'>
									          		<a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=pengetahuan&act=hapus&id=$r[kode_pengetahuan]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
											 	</div>
								            </td>
								        </tr>";
			      	$no++;
				  	$counter++;
	    		}
	    echo "						</tbody>
	    						</table>";
		echo "					<nav>
						            <ul class='pagination pagination-sm pagination-gutter'>";
						            if ($offset != 0) {
						                $prevoffset = $offset - 10;
						                echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=pengetahuan&offset=$prevoffset>Back</a></li>";
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
						                  echo "<li class='page-item'><a class='page-link' href=index.php?module=pengetahuan&offset=$newoffset>$i</a></li>";
						                } else {
						                  echo "<li class='page-item active'><a class='page-link' href='javascript:void()'>" . $i . "</a></li>"; 
						                }
						            }

						            if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
						                $newoffset = $offset + $limit;
						                echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=pengetahuan&offset=$newoffset>Next</a></li>";
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
		echo "				<b>Data Kosong !</b>
						</div>
		        	</div>
		      	</div>
		    </div>
		</div>";
				}
			}
	    break;
	  
	  	case "tambahpengetahuan":
		echo "
		<div class='container-fluid'>     
			<div class='row page-titles mx-0'>
			    <div class='col-sm-6 p-md-0'>
				    <div class='welcome-text'>
				        <h4>Basis Pengetahuan</h4>
				        <span class='ml-0'>Tambah basis pengetahuan penyakit tanaman jambu air</span>
				    </div>
			    </div>
			</div>
			<div class='row'>
			    <div class='col-12'>
			     	<div class='card'>
			        	<div class='card-body'>
			        		<div class='alert alert-info solid'>
					            <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
					            </button>
					            <h4 class='text-white'><strong><i class='fa fa-exclamation-triangle'></i>  Petunjuk Pengisian Basis Pengetahuan!</strong></h4>
					            Silahkan pilih gejala yang sesuai dengan penyakit yang ada, dan berikan <b>nilai kepastian (MB & MD)</b> dengan cakupan sebagai berikut:<br><br>
								<b>1.0</b> (Pasti Ya)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.8</b> (Hampir Pasti)&nbsp;&nbsp;|<br>
								<b>0.6</b> (Kemungkinan Besar)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.4</b> (Mungkin)&nbsp;&nbsp;|<br>
								<b>0.2</b> (Hampir Mungkin)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.0</b> (Tidak Tahu atau Tidak Yakin)&nbsp;&nbsp;|<br><br>
								<b>CF(Pakar) = MB – MD</b><br>
								MB : Ukuran kenaikan kepercayaan (measure of increased belief) MD : Ukuran kenaikan ketidakpercayaan (measure of increased disbelief) <br> <br>
								<b>Contoh:</b><br>
								Jika kepercayaan <b>(MB)</b> anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.8 (Hampir Pasti)</b><br>
								Dan ketidakpercayaan <b>(MD)</b> anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.2 (Hampir Mungkin)</b><br><br>
								<b>Maka:</b> CF(Pakar) = MB – MD (0.8 - 0.2) = <b>0.6</b> <br>
								Dimana nilai kepastian anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.6 (Kemungkinan Besar)</b>
					        </div>
					        <hr>
			          		<div class='basic-form'>
				          		<form name=text_form method=POST action='$aksi?module=pengetahuan&act=input' onsubmit='return Blank_TextField_Validator()'>
				          			<div class='form-group'>
	                                    <label>Penyakit</label>
	                                    <select name='kode_penyakit'  id='kode_penyakit' class='form-control' required>
	                                        <option>Pilih Penyakit</option>";
											$hasil4 = mysql_query("SELECT * FROM penyakit order by nama_penyakit");
											while($r4=mysql_fetch_array($hasil4)){
												echo "<option value='$r4[kode_penyakit]'>$r4[nama_penyakit]</option>";
											}
								echo "	</select>
	                                </div>
	                                <div class='form-group'>
	                                    <label>Gejala Penyakit</label>
	                                    <select name='kode_gejala' id='kode_gejala' class='form-control' required>
	                                        <option>Pilih Gejala</option>";
											$hasil4 = mysql_query("SELECT * FROM gejala order by nama_gejala");
											while($r4=mysql_fetch_array($hasil4)){
												echo "<option value='$r4[kode_gejala]'>$r4[nama_gejala]</option>";
											}
								echo "	</select>
	                                </div>
	                                <div class='form-row'>
	                                    <div class='form-group col-md-6'>
	                                        <label>MB</label>
	                                        <input type='text' name='mb' autocomplete='off' class='form-control' placeholder='Masukkan nilai MB' required>
	                                    </div>
	                                    <div class='form-group col-md-6'>
	                                        <label>MD</label>
	                                        <input type='text' name='md' autocomplete='off' class='form-control' placeholder='Masukkan nilai MD' required>
	                                    </div>
	                                </div>
	                                <input type=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
					                <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=pengetahuan';\">
					            </form>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>";
	    break;
	    
	  	case "editpengetahuan":
	    $edit=mysql_query("SELECT * FROM basis_pengetahuan WHERE kode_pengetahuan='$_GET[id]'");
	    $r=mysql_fetch_array($edit);
		
	    echo "
	    <div class='container-fluid'>     
			<div class='row page-titles mx-0'>
			    <div class='col-sm-6 p-md-0'>
				    <div class='welcome-text'>
				        <h4>Basis Pengetahuan</h4>
				        <span class='ml-0'>Ubah basis pengetahuan penyakit tanaman jambu air</span>
				    </div>
			    </div>
			</div>
			<div class='row'>
			    <div class='col-12'>
			     	<div class='card'>
			        	<div class='card-body'>
			        		<div class='alert alert-info solid'>
					            <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
					            </button>
					            <h4 class='text-white'><strong><i class='fa fa-exclamation-triangle'></i>  Petunjuk Pengisian Basis Pengetahuan!</strong></h4>
					            Silahkan pilih gejala yang sesuai dengan penyakit yang ada, dan berikan <b>nilai kepastian (MB & MD)</b> dengan cakupan sebagai berikut:<br><br>
								<b>1.0</b> (Pasti Ya)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.8</b> (Hampir Pasti)&nbsp;&nbsp;|<br>
								<b>0.6</b> (Kemungkinan Besar)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.4</b> (Mungkin)&nbsp;&nbsp;|<br>
								<b>0.2</b> (Hampir Mungkin)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.0</b> (Tidak Tahu atau Tidak Yakin)&nbsp;&nbsp;|<br><br>
								<b>CF(Pakar) = MB – MD</b><br>
								MB : Ukuran kenaikan kepercayaan (measure of increased belief) MD : Ukuran kenaikan ketidakpercayaan (measure of increased disbelief) <br> <br>
								<b>Contoh:</b><br>
								Jika kepercayaan <b>(MB)</b> anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.8 (Hampir Pasti)</b><br>
								Dan ketidakpercayaan <b>(MD)</b> anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.2 (Hampir Mungkin)</b><br><br>
								<b>Maka:</b> CF(Pakar) = MB – MD (0.8 - 0.2) = <b>0.6</b> <br>
								Dimana nilai kepastian anda terhadap gejala Mencret keputih-putihan untuk penyakit Berak Kapur adalah <b>0.6 (Kemungkinan Besar)</b>
					        </div>
					        <hr>
					        <div class='basic-form'>
					        	<form name=text_form method=POST action='$aksi?module=pengetahuan&act=update' onsubmit='return Blank_TextField_Validator()'>
					        		<input type=hidden name=id value='$r[kode_pengetahuan]'>
					        		<div class='form-group'>
	                                    <label>Penyakit</label>
	                                    <select name='kode_penyakit'  id='kode_penyakit' class='form-control' required>
	                                        <option>Pilih Penyakit</option>";
											$hasil4 = mysql_query("SELECT * FROM penyakit order by nama_penyakit");
											while($r4=mysql_fetch_array($hasil4)){
												echo "<option value='$r4[kode_penyakit]'"; if($r[kode_penyakit]==$r4[kode_penyakit]) echo "selected";
												echo ">$r4[nama_penyakit]</option>";
											}
								echo "	</select>
	                                </div>
	                                <div class='form-group'>
	                                    <label>Gejala Penyakit</label>
	                                    <select name='kode_gejala' id='kode_gejala' class='form-control' required>
	                                        <option>Pilih Gejala</option>";
											$hasil4 = mysql_query("SELECT * FROM gejala order by nama_gejala");
											while($r4=mysql_fetch_array($hasil4)){
												echo "<option value='$r4[kode_gejala]'"; if($r[kode_gejala]==$r4[kode_gejala]) echo "selected";
												echo ">$r4[nama_gejala]</option>";
											}
								echo "	</select>
	                                </div>
	                                <div class='form-row'>
	                                    <div class='form-group col-md-6'>
	                                        <label>MB</label>
	                                        <input type='text' name='mb' autocomplete='off' class='form-control' placeholder='Masukkan nilai MB' value='$r[mb]' required>
	                                    </div>
	                                    <div class='form-group col-md-6'>
	                                        <label>MD</label>
	                                        <input type='text' name='md' autocomplete='off' class='form-control' placeholder='Masukkan nilai MD' value='$r[md]' required>
	                                    </div>
	                                </div>
	                                <input type=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
					                <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=pengetahuan';\">
					            </form>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>";
	    break;  
		}
	} 
?>
