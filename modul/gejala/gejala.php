<title>Gejala Penyakit</title>
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
	if (text_form.nama_gejala.value == "")
	{
	   alert("Nama Gejala tidak boleh kosong !");
	   text_form.nama_gejala.focus();
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
	$aksi="modul/gejala/aksi_gejala.php";
	switch($_GET[act]){
		default:
	  	$offset=$_GET['offset'];
		//jumlah data yang ditampilkan perpage
		$limit = 10;
		if (empty ($offset)) {
			$offset = 0;
		}
  		$tampil=mysql_query("SELECT * FROM gejala ORDER BY kode_gejala");
	echo "
	<div class='container-fluid'>
		<div class='row page-titles mx-0'>
		    <div class='col-sm-6 p-md-0'>
			    <div class='welcome-text'>
			        <h4>Gejala Penyakit</h4>
			        <span class='ml-0'>Pengolahan Data Gejala Penyakit Tanaman Jambu Air</span>
			    </div>
		    </div>
		    <div class='col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex'>
		     	<ol class='breadcrumb'>
		        	<button type='button' name=tambah class='btn mb-1 btn-success text-white' title='Tambah Jenis Kerusakan' onclick=\"window.location.href='gejala/tambahgejala';\">Tambah Data Gejala</button>
		      	</ol>
		    </div>
		</div>
	  	<div class='row'>
	    	<div class='col-12'>
	      		<div class='card'>
	        		<div class='card-body'>
						<form method=POST action='?module=gejala' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
							<div class='input-group mb-3'>
                                    <input type='text' name='keyword' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' required>
                                    <div class='input-group-append'>
                                        <input type='submit' name=Go class='btn btn-warning text-white' value='Search'>
                                    </div>
                                </div>
		                </form>";
		$baris=mysql_num_rows($tampil);
		if ($_POST[Go]){
			$numrows = mysql_num_rows(mysql_query("SELECT * FROM gejala where nama_gejala like '%$_POST[keyword]%'"));
			if ($numrows > 0){
	echo "				<div class='alert alert-success alert-dismissible alert-alt fade show'>
		                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
		                    </button>
		                    <strong><i class='fa fa-check'></i> Success!</strong> Gejala yang anda cari di temukan.
		                </div>";
				$i = 1;
	echo "				<div class='table-responsive'> 				
							<table class='table table-striped' style='border: 2px solid #70c745;' cellpadding='0' cellspacing='0'>
						        <thead style='background-color: #70c745; color: #fff;'>
						            <tr>
						               <th>No</th>
						               <th>Nama Gejala</th>
						               <th width='106'>Aksi</th>
						            </tr>
						        </thead>
								<tbody>"; 
				$hasil = mysql_query("SELECT * FROM gejala where nama_gejala like '%$_POST[keyword]%'");
				$no = 1;
				$counter = 1;
			    while ($r=mysql_fetch_array($hasil)){
					if ($counter % 2 == 0) $warna = "dark";
					else $warna = "light";
    echo "							<tr class='".$warna."'>
										<td align=center>$no</td>
										<td>$r[nama_gejala]</td>
										<td align=center>
											<div class='btn-group'>
												<a type='button' class='btn btn-warning text-white' href=gejala/editgejala/$r[kode_gejala]><i class='fa fa-pencil' aria-hidden='true'></i></a>
											</div>
											<div class='btn-group'>
								          		<a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=gejala&act=hapus&id=$r[kode_gejala]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
								          	</div
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
		                    <strong><i class='fa fa-ban'></i> Failed!</strong> Maaf, Gejala yang anda cari tidak ditemukan, silahkan inputkan dengan benar dan cari kembali.
		                </div>
		                </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>";
			}
		} else {
			if($baris>0) {
	echo" 				<div class='table-responsive'> 				
							<table class='table table-striped' style='border: 2px solid #454545;' cellpadding='0' cellspacing='0'>
						        <thead style='background-color: #454545; color: #fff;'>
						            <tr>
						               <th width='10'>No</th>
						               <th>Nama Gejala</th>
						               <th width='106'>Aksi</th>
						            </tr>
						        </thead>
								<tbody>"; 
				$hasil = mysql_query("SELECT * FROM gejala ORDER BY kode_gejala limit $offset,$limit");
				$no = 1;
				$no = 1 + $offset;
				$counter = 1;
			    while ($r=mysql_fetch_array($hasil)){
					if ($counter % 2 == 0) $warna = "dark";
					else $warna = "light";
    echo "							<tr class='".$warna."'>
										<td>$no</td>
										<td>$r[nama_gejala]</td>
										<td align=center>
											<div class='btn-group'>
										 		<a type='button' class='btn btn-warning text-white' href=gejala/editgejala/$r[kode_gejala]><i class='fa fa-pencil' aria-hidden='true'></i></a>
										 	</div>
										 	<div class='btn-group'>
								          		<a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=gejala&act=hapus&id=$r[kode_gejala]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
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
					                echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=gejala&offset=$prevoffset>Back</a></li>";
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
					                  echo "<li class='page-item'><a class='page-link' href=index.php?module=gejala&offset=$newoffset>$i</a></li>";
					                } else {
					                  echo "<li class='page-item active'><a class='page-link' href='javascript:void()'>" . $i . "</a></li>"; 
					                }
					            }

					            if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
					                $newoffset = $offset + $limit;
					                echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=gejala&offset=$newoffset>Next</a></li>";
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
  
  	case "tambahgejala":
    echo "
    <div class='container-fluid'>     
		<div class='row page-titles mx-0'>
		    <div class='col-sm-6 p-md-0'>
			    <div class='welcome-text'>
			        <h4>Gejala Penyakit</h4>
			        <span class='ml-0'>Tambah data gejala penyakit tanaman jambu air</span>
			    </div>
		    </div>
		</div>
		<div class='row'>
		    <div class='col-12'>
		     	<div class='card'>
		        	<div class='card-body'>
		          		<div class='basic-form'>
						    <form name=text_form method=POST action='$aksi?module=gejala&act=input' onsubmit='return Blank_TextField_Validator()'>
				              	<div class='form-group'>
					                <label>Nama Gejala</label>
					                <input type=text id='nama_gejala' name='nama_gejala' autocomplete='off' class='form-control' placeholder='Masukkan gejala baru...' required> 
				              	</div>
				                <input type=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
				                <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=gejala';\">
				            </form>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>";
    break;
    
  	case "editgejala":
    $edit=mysql_query("SELECT * FROM gejala WHERE kode_gejala='$_GET[id]'");
    $r=mysql_fetch_array($edit);
	
    echo "
    <div class='container-fluid'>     
		<div class='row page-titles mx-0'>
		    <div class='col-sm-6 p-md-0'>
			    <div class='welcome-text'>
			        <h4>Gejala Penyakit</h4>
			        <span class='ml-0'>Tambah data gejala penyakit tanaman jambu air</span>
			    </div>
		    </div>
		</div>
		<div class='row'>
		    <div class='col-12'>
		     	<div class='card'>
		        	<div class='card-body'>
		          		<div class='basic-form'>
						    <form name=text_form method=POST action='$aksi?module=gejala&act=update' onsubmit='return Blank_TextField_Validator()'>
						    	<input type=hidden name=id value='$r[kode_gejala]'>
				              	<div class='form-group'>
					                <label>Nama Gejala</label>
					                <input type=text id='nama_gejala' name='nama_gejala' autocomplete='off' class='form-control' placeholder='Masukkan gejala baru...' value=\"$r[nama_gejala]\" required> 
				              	</div>
				                <input type=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
				                <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=gejala';\">
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