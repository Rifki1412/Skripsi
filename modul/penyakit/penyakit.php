<title>Penyakit dan Hama</title>
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
      if (text_form.nama_penyakit.value == "")
      {
        alert("Nama Penyakit tidak boleh kosong !");
        text_form.nama_penyakit.focus();
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
    -- >
  </script>

<?php
  include "config/fungsi_alert.php";
  $aksi = "modul/penyakit/aksi_penyakit.php";
  switch ($_GET[act]) {
    // Tampil penyakit
    default:
      $offset = $_GET['offset'];
      //jumlah data yang ditampilkan perpage
      $limit = 10;
      if (empty($offset)) {
        $offset = 0;
      }
      $tampil = mysql_query("SELECT * FROM penyakit ORDER BY kode_penyakit");
      echo "
      <div class='container-fluid'>
        <div class='row page-titles mx-0'>
            <div class='col-sm-6 p-md-0'>
                <div class='welcome-text'>
                    <h4>Penyakit dan Hama</h4>
                    <span class='ml-0'>Pengolahan Data Penyakit dan Hama Tanaman Jambu Air</span>
                </div>
            </div>
            <div class='col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex'>
              <ol class='breadcrumb'>
                <button type='button' name=tambah class='btn mb-1 btn-success text-white' title='Tambah Data' alt='tambah' onclick=\"window.location.href='penyakit/tambahpenyakit';\">Tambah Data Penyakit</button>
              </ol>
            </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <form method=POST action='?module=penyakit' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
                  <div class='input-group mb-3'>
                      <input type='text' name='keyword' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' required>
                      <div class='input-group-append'>
                          <input type='submit' name=Go class='btn btn-warning text-white' value='Search'>
                      </div>
                  </div>
                </form>";
        $baris = mysql_num_rows($tampil);
        if ($_POST[Go]) {
          $numrows = mysql_num_rows(mysql_query("SELECT * FROM penyakit where nama_penyakit like '%$_POST[keyword]%'"));
          if ($numrows > 0) {
      echo "
                <div class='alert alert-success alert-dismissible alert-alt fade show'>
                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                    </button>
                    <strong><i class='fa fa-check'></i> Success!</strong> Penyakit yang anda cari di temukan.
                </div>";
                $i = 1;
      echo"     <div class='table-responsive'>
                  <table class='table table-striped' style='border: 2px solid #70c745;' cellpadding='0' cellspacing='0'>
                    <thead style='background-color: #70c745; color: #fff;'>
                      <tr>
                        <th>No</th>
                        <th>Nama Penyakit</th>
                			  <th>Detail Penyakit</th>
                			  <th>Saran Penyakit</th>
                        <th width='106'>Aksi</th>
                      </tr>
                    </thead>
        		        <tbody>";
          $hasil = mysql_query("SELECT * FROM penyakit where nama_penyakit like '%$_POST[keyword]%'");
          $no = 1;
          $counter = 1;
          while ($r = mysql_fetch_array($hasil)) {
            if ($counter % 2 == 0)
              $warna = "dark";
            else
              $warna = "light";
      echo "          <tr class='" . $warna . "'>
                			  <td>$no</td>
                			  <td>$r[nama_penyakit]</td>
                			  <td>$r[det_penyakit]</td>
                			  <td>$r[srn_penyakit]</td>
                			  <td align=center>
                          <div class='btn-group'>
                            <a type='button' class='btn btn-warning' href=penyakit/editpenyakit/$r[kode_penyakit] title='Ubah Data'><i class='fa fa-pencil text-white' aria-hidden='true'></i></a>
                          </div>
                          <div class='btn-group'>
                            <a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=penyakit&act=hapus&id=$r[kode_penyakit]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\" title='Hapus Data'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                          </div>
                        </td>
                      </tr>";
            $no++;
            $counter++;
          }
      echo "        </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>";
        } else {
      echo "    <div class='alert alert-danger alert-dismissible alert-alt fade show'>
                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                    </button>
                    <strong><i class='fa fa-ban'></i> Failed!</strong> Maaf, Penyakit yang anda cari tidak ditemukan, silahkan inputkan dengan benar dan cari kembali.
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>";
        }
      } else {
        if ($baris > 0) {
      echo"
          <div class='table-responsive'> 
            <table class='table table-striped' style='border: 2px solid #454545;' cellpadding='0' cellspacing='0'>
              <thead style='background-color: #454545; color: #fff;'>
                <tr>
                  <th>No</th>
                  <th>Nama Penyakit</th>
          			  <th>Detail Penyakit</th>
                  <th>Saran Penyakit</th>
                  <th width='106'>Aksi</th>
                </tr>
              </thead>
		          <tbody>";
          $hasil = mysql_query("SELECT * FROM penyakit ORDER BY kode_penyakit limit $offset,$limit");
          $no = 1;
          $no = 1 + $offset;
          $counter = 1;
          while ($r = mysql_fetch_array($hasil)) {
            if ($counter % 2 == 0)
              $warna = "dark";
            else
              $warna = "light";
      echo "    <tr class='" . $warna . "'>
          			  <td>$no</td>
          			  <td>$r[nama_penyakit]</td>
          			  <td>$r[det_penyakit]</td>
                  <td>$r[srn_penyakit]</td>
          			  <td align=center>
                    <div class='btn-group'>
            			    <a type='button' class='btn btn-warning' href=penyakit/editpenyakit/$r[kode_penyakit] title='Ubah Data'><i class='fa fa-pencil text-white' aria-hidden='true'></i></a>
                    </div>
                    <div class='btn-group'>
                      <a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=penyakit&act=hapus&id=$r[kode_penyakit]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\" title='Hapus Data'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                    </div>
                  </td>
                </tr>";
            $no++;
            $counter++;
          }
      echo "  </tbody>
            </table>";
      echo "<nav>
              <ul class='pagination pagination-sm pagination-gutter'>";
              if ($offset != 0) {
                $prevoffset = $offset - 10;
                echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=penyakit&offset=$prevoffset>Back</a></li>";
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
                  echo "<li class='page-item'><a class='page-link' href=index.php?module=penyakit&offset=$newoffset>$i</a></li>";
                } else {
                  echo "<li class='page-item active'><a class='page-link' href='javascript:void()'>" . $i . "</a></li>"; 
                }
              }

              if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
                $newoffset = $offset + $limit;
                echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=penyakit&offset=$newoffset>Next</a></li>";
              } else {
                echo "<li class='page-item page-indicator active'><a class='page-link' href='javascript:void()'>Next</a></li>"; 
              }
      echo "  </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>";
      
        } else {
          echo "    <b>Data Kosong !</b>
                  </div>
                </div>
              </div>
            </div>
          </div>";
        }
      }
    break;

    case "tambahpenyakit":
      echo "
      <div class='container-fluid'>     
        <div class='row page-titles mx-0'>
          <div class='col-sm-6 p-md-0'>
            <div class='welcome-text'>
              <h4>Penyakit dan Hama</h4>
              <span class='ml-0'>Tambah data penyakit dan hama tanaman jambu air</span>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <div class='basic-form'>
                  <form name=text_form method=POST action='$aksi?module=penyakit&act=input' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label>Nama Penyakit</label>
                      <input type=text autocomplete='off' id='nama_penyakit' name='nama_penyakit' class='form-control' required> 
                    </div>
                    <div class='form-group'>
                      <label>Keterangan</label>
                      <textarea class='form-control summernote' id='det_penyakit' name='det_penyakit' required></textarea>
                    </div>
                    <div class='form-group'>
                      <label>Solusi Penyakit</label>
                      <textarea class='form-control summernote' id='srn_penyakit' name='srn_penyakit' required></textarea> 
                    </div>
                    <div class='form-group'>
                      <label>Gambar Penyakit</label>
                      <div class='input-group mb-3'>
                          <div class='input-group-prepend'>
                              <button class='input-group-text' type='button' disbled>Upload Gambar (Ukuran Maks = 1 MB) :</button>
                          </div>
                          <div class='custom-file'>
                              <input type='file' name='gambar' class='custom-file-input'>
                              <label class='custom-file-label'>Choose file</label>
                          </div>
                      </div>
                    </div>
                    <input type=submit name=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
                    <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=penyakit';\">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>";
    break;

    case "editpenyakit":
      $edit = mysql_query("SELECT * FROM penyakit WHERE kode_penyakit='$_GET[id]'");
      $r = mysql_fetch_array($edit);
      if ($r[gambar]) {
        $gambar = 'assets/images/penyakit/' . $r[gambar];
      } else {
        $gambar = 'assets/images/noimage.png';
      }

      echo "
      <div class='container-fluid'>
        <div class='row page-titles mx-0'>
          <div class='col-sm-6 p-md-0'>
            <div class='welcome-text'>
              <h4>Penyakit dan Hama</h4>
              <span class='ml-0'>Ubah data penyakit dan hama tanaman jambu air</span>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <div class='basic-form'>
                  <form name=text_form method=POST action='$aksi?module=penyakit&act=update' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
                    <input type=hidden name=id value='$r[kode_penyakit]'>
                    <div class='form-group'>
                      <label>Nama Penyakit</label>
                      <input type=text autocomplete='off' id='nama_penyakit' name='nama_penyakit' class='form-control' value=\"$r[nama_penyakit]\"> 
                    </div>
                    <div class='form-group'>
                      <label>Keterangan</label>
                      <textarea class='form-control summernote' id='det_penyakit' name='det_penyakit'>$r[det_penyakit]</textarea>
                    </div>
                    <div class='form-group'>
                      <label>Solusi Penyakit</label>
                      <textarea class='form-control summernote' id='srn_penyakit' name='srn_penyakit'>$r[srn_penyakit]</textarea> 
                    </div>
                    <div class='form-group'>
                      <label>Gambar Penyakit</label><br>
                      <img id='preview' src='$gambar' width=200><br><br>
                      <div class='input-group mb-3'>
                          <div class='input-group-prepend'>
                              <button class='input-group-text' type='button' disbled>Upload Gambar (Ukuran Maks = 1 MB) :</button>
                          </div>
                          <div class='custom-file'>
                              <input type='file' name='gambar' class='custom-file-input' value=\"$r[gambar]\">
                              <label class='custom-file-label'>Choose file</label>
                          </div>
                      </div>
                    </div>
                    <input type=submit name=submit name=submit class='btn btn-success text-white' value='Simpan Data'>
                    <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=penyakit';\">
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

  <script>
    function readURL(input) {

      if (input.files &&
              input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#preview').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#upload").change(function () {
      readURL(this);
    });
  </script>
