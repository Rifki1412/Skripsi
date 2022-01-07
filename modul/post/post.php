<title>Post Informasi Penyakit dan Hama</title>
<script type="text/javascript">
  function Blank_TextField_Validator()
  {
    if (text_form.nama_post.value == "")
    {
      alert("Nama Post tidak boleh kosong !");
      text_form.nama_post.focus();
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
</script>
<?php
  include "config/fungsi_alert.php";
  $aksi = "modul/post/aksi_post.php";
  switch ($_GET[act]) {
    // Tampil post
    default:
        $offset = $_GET['offset'];
        //jumlah data yang ditampilkan perpage
        $limit = 15;
        if (empty($offset)) {
            $offset = 0;
        }
        $tampil = mysql_query("SELECT * FROM post ORDER BY kode_post");
        echo "
        <div class='container-fluid'>
          <div class='row page-titles mx-0'>
              <div class='col-sm-6 p-md-0'>
                  <div class='welcome-text'>
                      <h4>Post Informasi Penyakit dan Hama</h4>
                      <span class='ml-0'>Pengolahan Informasi Penyakit dan Hama Tanaman Jambu Air</span>
                  </div>
              </div>
              <div class='col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex'>
                <ol class='breadcrumb'>
                  <button type='button' name=tambah class='btn mb-1 btn-success text-white' title='Informasi Penyakit dan Hama' alt='tambah' onclick=\"window.location.href='post/tambahpost';\">Tambah Informasi</button>
                </ol>
              </div>
          </div>
          <div class='row'>
            <div class='col-12'>
              <div class='card'>
                <div class='card-body'>
                  <form method=POST action='?module=post' name=text_form onsubmit='return Blank_TextField_Validator_Cari()'>
                    <div class='input-group mb-3'>
                        <input type='text' name='keyword' placeholder='Ketik dan tekan cari...' class='form-control' value='$_POST[keyword]' required>
                        <div class='input-group-append'>
                            <input type='submit' name=Go class='btn btn-warning text-white' value='Search'>
                        </div>
                    </div>
                  </form>";
        $baris = mysql_num_rows($tampil);
        if ($_POST[Go]) {
            $numrows = mysql_num_rows(mysql_query("SELECT * FROM post where nama_post like '%$_POST[keyword]%'"));
            if ($numrows > 0) {
        echo "    <div class='alert alert-success alert-dismissible alert-alt fade show'>
                    <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
                    </button>
                    <strong><i class='fa fa-check'></i> Success!</strong> Data yang anda cari di temukan.
                  </div>";
              $i = 1;
        echo"     <div class='table-responsive'>
                    <table class='table table-striped' style='border: 2px solid #70c745;' cellpadding='0' cellspacing='0'>
                      <thead style='background-color: #70c745; color: #fff;'>
                        <tr>
                          <th>No</th>
                          <th>Nama Post</th>
                  			  <th>Detail Post</th>
                  			  <th>Saran Post</th>
                          <th width='106'>Aksi</th>
                        </tr>
                      </thead>
            		      <tbody>";
                $hasil = mysql_query("SELECT * FROM post where nama_post like '%$_POST[keyword]%'");
                $no = 1;
                $counter = 1;
                while ($r = mysql_fetch_array($hasil)) {
                    if ($counter % 2 == 0)
                        $warna = "dark";
                    else
                        $warna = "light";
        echo "          <tr class='" . $warna . "'>
                  			  <td align=center>$no</td>
                  			  <td>$r[nama_post]</td>
                  			  <td>$r[det_post]</td>
                  			  <td>$r[srn_post]</td>
                  			  <td align=center>
                            <div class='btn-group'>
                              <a type='button' class='btn btn-warning text-white' href=post/editpost/$r[kode_post]><i class='fa fa-pencil' aria-hidden='true'></i></a>
                            </div>
                            <div class='btn-group'>
                              <a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=post&act=hapus&id=$r[kode_post]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"> <i class='fa fa-trash-o' aria-hidden='true'></i></a>
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
          </div>
        </div>";
            } else {
        echo "    <div class='alert alert-danger alert-dismissible alert-alt fade show'>
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
          if ($baris > 0) {
        echo "    <div class='table-responsive'> 
                    <table class='table table-striped' style='border: 2px solid #454545;' cellpadding='0' cellspacing='0'>
                      <thead style='background-color: #454545; color: #fff;'>
                        <tr>
                          <th>No</th>
                          <th>Nama Post</th>
                  			  <th>Detail Post</th>
                  			  <th>Saran Post</th>
                          <th width='106'>Aksi</th>
                        </tr>
                      </thead>
            		      <tbody>";
            $hasil = mysql_query("SELECT * FROM post ORDER BY kode_post limit $offset,$limit");
            $no = 1;
            $no = 1 + $offset;
            $counter = 1;
            while ($r = mysql_fetch_array($hasil)) {
              if ($counter % 2 == 0)
                $warna = "dark";
              if (strlen($r[det_post]) > 150) {
                $maxLength = 140;
						    $r[det_post] = substr($r[det_post], 0, $maxLength);
						  }
						  if (strlen($r[srn_post]) > 150) {
                $maxLength = 140;
						    $r[srn_post] = substr($r[srn_post], 0, $maxLength);
						  } 
              else
                $warna = "light";
        echo "          <tr class='" . $warna . "'>
                  			  <td align=center>$no</td>
                  			  <td>$r[nama_post]</td>
                  			  <td>$r[det_post]</td>
                  			  <td>$r[srn_post]</td>
                  			  <td align=center>
                            <div class='btn-group'>
                  			     <a type='button' class='btn btn-warning text-white' href=post/editpost/$r[kode_post]><i class='fa fa-pencil' aria-hidden='true'></i></a>
                            </div>
                            <div class='btn-group'>
                              <a type='button' class='btn btn-danger' href=\"JavaScript: confirmIt('Anda yakin akan menghapusnya ?','$aksi?module=post&act=hapus&id=$r[kode_post]','','','','u','n','Self','Self')\" onMouseOver=\"self.status=''; return true\" onMouseOut=\"self.status=''; return true\"><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                            </div>
                          </td>
                        </tr>";
                $no++;
                $counter++;
              }
        echo "        </tbody>
                    </table>";
        echo "      <nav>
                      <ul class='pagination pagination-sm pagination-gutter'>";
                      if ($offset != 0) {
                        $prevoffset = $offset - 10;
                        echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=post&offset=$prevoffset>Back</a></li>";
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
                          echo "<li class='page-item'><a class='page-link' href=index.php?module=post&offset=$newoffset>$i</a></li>";
                        } else {
                          echo "<li class='page-item active'><a class='page-link' href='javascript:void()'>" . $i . "</a></li>"; 
                        }
                      }

                      if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
                        $newoffset = $offset + $limit;
                        echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=post&offset=$newoffset>Next</a></li>";
                      } else {
                        echo "<li class='page-item page-indicator active'><a class='page-link' href='javascript:void()'>Next</a></li>"; 
                      }
        echo "        </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>";
        } else {
        echo "  <b>Data Kosong !</b>
                </div>
              </div>
            </div>
          </div>
        </div>";
        }
    }
    break;

    case "tambahpost":
      echo " 
      <div class='container-fluid'>     
        <div class='row page-titles mx-0'>
          <div class='col-sm-6 p-md-0'>
            <div class='welcome-text'>
              <h4>Post Informasi Penyakit dan Hama</h4>
              <span class='ml-0'>Tambah informasi penyakit dan hama tanaman jambu air</span>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <div class='basic-form'>
                  <form name=text_form method=POST action='$aksi?module=post&act=input' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label>Nama Informasi</label>
                      <input type=text autocomplete='off' id='nama_post' name='nama_post' class='form-control' required> 
                    </div>
                    <div class='form-group'>
                      <label>Detail Informasi</label>
                      <textarea class='form-control summernote' id='det_post' name='det_post' required></textarea>
                    </div>
                    <div class='form-group'>
                      <label>Solusi Informasi</label>
                      <textarea class='form-control summernote' id='srn_post' name='srn_post' required></textarea> 
                    </div>
                    <div class='form-group'>
                      <label>Gambar</label>
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
                    <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=post';\">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>";
    break;

    case "editpost":
      $edit = mysql_query("SELECT * FROM post WHERE kode_post='$_GET[id]'");
      $r = mysql_fetch_array($edit);
      if ($r[gambar]) {
          $gambar = 'assets/images/posting/' . $r[gambar];
      } else {
          $gambar = 'assets/images/noimage.png';
      }

      echo "
      <div class='container-fluid'>     
        <div class='row page-titles mx-0'>
          <div class='col-sm-6 p-md-0'>
            <div class='welcome-text'>
              <h4>Post Informasi Penyakit dan Hama</h4>
              <span class='ml-0'>Ubah informasi penyakit dan hama tanaman jambu air</span>
            </div>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <div class='basic-form'>
                  <form name=text_form method=POST action='$aksi?module=post&act=update' onsubmit='return Blank_TextField_Validator()' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <input type=hidden name=id value='$r[kode_post]'>
                      <label>Nama Informasi</label>
                      <input type=text autocomplete='off' id='nama_post' name='nama_post' class='form-control' value=\"$r[nama_post]\"> 
                    </div>
                    <div class='form-group'>
                      <label>Detail Informasi</label>
                      <textarea class='form-control summernote' id='det_post' name='det_post'>$r[det_post]</textarea>
                    </div>
                    <div class='form-group'>
                      <label>Solusi Informasi</label>
                      <textarea class='form-control summernote' id='srn_post' name='srn_post'>$r[srn_post]</textarea> 
                    </div>
                    <div class='form-group'>
                      <label>Gambar</label><br>
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
                    <input type='button' name='batal' class='btn btn-danger' value='Batal' onclick=\"window.location.href='?module=post';\">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>";
    break;
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

    $(function () {
      CKEDITOR.replace('editor1');
      CKEDITOR.replace('editor2');
      CKEDITOR.replace('editor1a');
      CKEDITOR.replace('editor2a');
    })
</script>
