<link rel="stylesheet" href="assets/icons/font-awesome-4.2.0/font-awesome-4.2.0/css/font-awesome.min.css">
<style type="text/css">
  table.konsul th{
    background-color: #70c745;   
    color: #fff;
  }
  table.konsul {
    border: 2px solid #70c745;
  }
  table.table-bordered.konsul th{
    border: 1px solid #70c745;
  }
  table.table-bordered.konsul td {
    border: 1px solid #70c745;
  }

  table.diagnosa th{
    background-color: #ee3a0a;   
    color: #fff;
  }
  table.diagnosa {
    border: 2px solid #ee3a0a;
  }
  table.table-bordered.diagnosa th{
    border: 1px solid #ee3a0a;
  }
  table.table-bordered.diagnosa td {
    border: 1px solid #e9d5eb;
  }

  /*Riwayat*/
  table.riwayat th{
    background-color: #22a6b3;   
    color: #fff;
  }
  table.riwayat {
    border: 1px solid #22a6b3;
  }
  table.table-bordered.riwayat th{
    border: 1px solid #22a6b3;
  }
  table.table-bordered.riwayat td {
    border: 1px solid #c9d1d9;
    vertical-align: middle;
  }

  span.kondisipilih {
    background-color: #2f2130;
    padding: 2px 4px;
    border-radius: 4px;
  }

  div.paging {
    margin-top: 25px;
  }

  .margin4 {
    margin: 4px;
  }

  img.post{
      
  }

  .well {
    overflow: hidden;
  }

  .well {
    min-height: 20px;
    padding: 19px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
  }

  .img-bordered-sm {
    border: 2px solid #d2d6de;
    padding: 2px;
  }

  .box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    box-shadow: 0 1px 1px rgb(0 0 0 / 10%); 
  }

  .box.box-solid.box-info {
    border: 1px solid #00c0ef;
  }

  .box.box-solid.box-warning {
    border: 1px solid #f39c12;
  }

  .box.box-solid.box-secondary {
    border: 1px solid #9b59b6;
  }

  .box.box-solid.box-info>.box-header {
    color: #fff;
    background: #00c0ef;
    background-color: #00c0ef;
  }

  .box.box-solid.box-warning>.box-header {
    color: #fff;
    background: #f39c12;
    background-color: #f39c12;
  }

  .box.box-solid.box-secondary>.box-header {
    color: #fff;
    background: #9b59b6;
    background-color: #9b59b6;
  }

  .box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
  }

  .box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
  }

  .box-header>.fa, .box-header>.glyphicon, .box-header>.ion, .box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
  }

  .box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
  }

  .box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
  }

  .float{
    background: #70c745;
    color: white;
    border-top: 0;
    border-left: 0;
    border-right: 0;
    text-decoration: none;
    font-family: sans-serif;
    font-size: 14pt;
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color: #70c745;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    margin-top:32px;
  }
</style>
<title>Diagnosa</title>
<?php
  switch ($_GET['act']) {
    default:
      if ($_POST['submit']) {
        $arcolor = array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
        date_default_timezone_set("Asia/Jakarta");
        $inptanggal = date('Y-m-d H:i:s');

        $arbobot = array('0', '1', '0.8', '0.6', '0.4', '-0.2', '-0.4', '-0.6', '-0.8', '-1');
        $argejala = array();

        for ($i = 0; $i < count($_POST['kondisi']); $i++) {
          $arkondisi = explode("_", $_POST['kondisi'][$i]);
          if (strlen($_POST['kondisi'][$i]) > 1) {
            $argejala += array($arkondisi[0] => $arkondisi[1]);
          }
        }

        $sqlkondisi = mysql_query("SELECT * FROM kondisi order by id+0");
        while ($rkondisi = mysql_fetch_array($sqlkondisi)) {
          $arkondisitext[$rkondisi['id']] = $rkondisi['kondisi'];
        }

        $sqlpkt = mysql_query("SELECT * FROM penyakit order by kode_penyakit+0");
        while ($rpkt = mysql_fetch_array($sqlpkt)) {
          $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
          $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
          $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
          $argpkt[$rpkt['kode_penyakit']] = $rpkt['gambar'];
        }

      //print_r($arkondisitext);
      // -------- perhitungan certainty factor (CF) ---------
      // --------------------- START ------------------------
      $sqlpenyakit = mysql_query("SELECT * FROM penyakit order by kode_penyakit");
      $arpenyakit = array();
      while ($rpenyakit = mysql_fetch_array($sqlpenyakit)) {
        $cftotal_temp = 0;
        $cf = 0;
        $sqlgejala = mysql_query("SELECT * FROM basis_pengetahuan where kode_penyakit=$rpenyakit[kode_penyakit]");
        $cflama = 0;
        while ($rgejala = mysql_fetch_array($sqlgejala)) {
          $arkondisi = explode("_", $_POST['kondisi'][0]);
          $gejala = $arkondisi[0];

          for ($i = 0; $i < count($_POST['kondisi']); $i++) {
            $arkondisi = explode("_", $_POST['kondisi'][$i]);
            $gejala = $arkondisi[0];
            if ($rgejala['kode_gejala'] == $gejala) {
              $cf = ($rgejala['mb'] - $rgejala['md']) * $arbobot[$arkondisi[1]];
              if (($cf >= 0) && ($cf * $cflama >= 0)) {
                $cflama = $cflama + ($cf * (1 - $cflama));
              }
              if ($cf * $cflama < 0) {
                $cflama = ($cflama + $cf) / (1 - Math . Min(Math . abs($cflama), Math . abs($cf)));
              }
              if (($cf < 0) && ($cf * $cflama >= 0)) {
                $cflama = $cflama + ($cf * (1 + $cflama));
              }
            }
          }
        }
        if ($cflama > 0) {
          $arpenyakit += array($rpenyakit[kode_penyakit] => number_format($cflama, 4));
        }
      }

      arsort($arpenyakit);

      $inpgejala = serialize($argejala);
      $inppenyakit = serialize($arpenyakit);

      $np1 = 0;
      foreach ($arpenyakit as $key1 => $value1) {
        $np1++;
        $idpkt1[$np1] = $key1;
        $vlpkt1[$np1] = $value1;
      }

      mysql_query("INSERT INTO hasil(
                  tanggal,
                  gejala,
                  penyakit,
                  hasil_id,
                  hasil_nilai
				  ) 
	        VALUES(
                '$inptanggal',
                '$inpgejala',
                '$inppenyakit',
                '$idpkt1[1]',
                '$vlpkt1[1]'
				)");
// --------------------- END -------------------------

      echo "
      <div class='container-fluid'>
        <div class='row page-titles mx-0'>
          <div class='col-sm-6 p-md-0'>
            <div class='welcome-text'>
              <h4>Hasil Diagnosa!</h4>
              <span class='ml-0'>Hasil Diagnosa Penyakit dan Hama Tanaman Jambu Air</span>
            </div>
          </div>
          <div class='col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex'>
            <ol class='breadcrumb'>
              <button type='button' class='btn mb-1 btn-success text-white' onClick='window.print();' data-toggle='tooltip' data-placement='right' title='Klik tombol ini untuk mencetak hasil diagnosa'>
              <i class='fa fa-print'></i> Cetak</button>
            </ol>
          </div>
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <table class='table table-bordered table-striped diagnosa'> 
                  <th width=8%>No</th>
                  <th width=10%>Kode</th>
                  <th>Gejala yang dialami (keluhan)</th>
                  <th width=20%>Pilihan</th>
                  </tr>";
          $ig = 0;
          foreach ($argejala as $key => $value) {
            $kondisi = $value;
            $ig++;
            $gejala = $key;
            $sql4 = mysql_query("SELECT * FROM gejala where kode_gejala = '$key'");
            $r4 = mysql_fetch_array($sql4);
            echo '<tr><td>' . $ig . '</td>';
            echo '<td>G' . str_pad($r4[kode_gejala], 3, '0', STR_PAD_LEFT) . '</td>';
            echo '<td><span class="hasil text text-primary">' . $r4[nama_gejala] . "</span></td>";
            echo '<td><span class="kondisipilih" style="color:' . $arcolor[$kondisi] . '">' . $arkondisitext[$kondisi] . "</span></td></tr>";
          }
          $np = 0;
          foreach ($arpenyakit as $key => $value) {
            $np++;
            $idpkt[$np] = $key;
            $nmpkt[$np] = $arpkt[$key];
            $vlpkt[$np] = $value;
          }
          if ($argpkt[$idpkt[1]]) {
            $gambar = 'gambar/penyakit/' . $argpkt[$idpkt[1]];
          } else {
            $gambar = 'gambar/noimage.png';
          }
      echo "    </table>
                <div class='well well-small'>
                  <img style='float:right; margin-left:15px;' src='" . $gambar . "' height=200>
                  <h3>Hasil Diagnosa</h3>";
      echo "      <div class='callout callout-default'>Jenis penyakit yang dialami adalah <b>
                    <h3 class='text text-success'>" . $nmpkt[1] . "</b> / " . round($vlpkt[1], 2) . " % (" . $vlpkt[1] . ")<br></h3>
                  </div>
                </div>";
      echo "    <div class='box box-info box-solid'>
                  <div class='box-header with-border'>
                    <h3 class='box-title text-white'>Detail Penyakit</h3>
                  </div>
                  <div class='box-body'>
                    <h5>";
      echo            $ardpkt[$idpkt[1]];
      echo "        </h5>
                  </div>
                </div>
                <div class='box box-warning box-solid'>
                  <div class='box-header with-border'>
                    <h3 class='box-title text-white'>Solusi Penyakit</h3>
                  </div>
                  <div class='box-body'>
                    <h5>";
      echo            $arspkt[$idpkt[1]];
      echo "        </h5>
                  </div>
                </div>
                <div class='box box-danger box-solid'>
                  <div class='box-header with-border'>
                    <h3 class='box-title'>Kemungkinan lain:</h3>
                  </div>
                  <div class='box-body'>";
      for ($ipl = 2; $ipl < count($idpkt); $ipl++) {
      echo "        <h5>
                      <i class='fa fa-caret-square-o-right'></i> " . $nmpkt[$ipl] . "</b> / " . round($vlpkt[$ipl], 2) . " % (" . $vlpkt[$ipl] . ")<br>
                    </h5>";
      }
      echo "    </div>
              </div>
            </div>
          </div>
        </div>
      </div>";
    } else {
      echo "
      <div class='container-fluid'>
        <div class='row page-titles mx-0'>
          <div class='col-sm-6 p-md-0'>
            <div class='welcome-text'>
              <h4>Diagnosa Penyakit</h4>
              <span class='ml-0'>Konsultasi Tentang Penyakit Tanaman Jambu Air</span>
            </div>
          </div>
        </div>
	      <div class='alert alert-danger alert-dismissible alert-alt fade show'>
          <button type='button' class='close h-100' data-dismiss='alert' aria-label='Close'><span><i class='mdi mdi-close'></i></span>
          </button>
          <strong style='font-size: 20px;'><i class='icon fa fa-exclamation-triangle'></i> Perhatian!</strong> <br>Silahkan memilih gejala sesuai dengan kondisi tanaman jambu air anda, anda dapat memilih kepastian kondisi tanaman jambu air dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses (<i class='fa fa-search'></i>)  di bawah untuk melihat hasil.
        </div>
        <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-body'>
                <div class='table-responsive'>
          		    <form name=text_form method=POST action='diagnosa' >
                    <table class='table table-striped konsul'>
                      <tbody class='pilihkondisi'>
                        <tr class='text-white'>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Gejala</th>
                          <th width='20%'>Pilih Kondisi</th>
                        </tr>
                        <tr>";
                  $sql3 = mysql_query("SELECT * FROM gejala order by kode_gejala");
                  $i = 0;
                  while ($r3 = mysql_fetch_array($sql3)) {
                    $i++;
                    echo "<td class=opsi>$i</td>";
                    echo "<td class=opsi>G" . str_pad($r3[kode_gejala], 3, '0', STR_PAD_LEFT) . "</td>";
                    echo "<td class=gejala>$r3[nama_gejala]</td>";
                    echo '<td class="opsi"><select name="kondisi[]" id="sl' . $i . '" class="opsikondisi"/><option data-id="0" value="0">Pilih jika sesuai</option>';
                    $s = "select * from kondisi order by id";
                    $q = mysql_query($s) or die($s);
                    while ($rw = mysql_fetch_array($q)) {
                      ?>
                      <option data-id="<?php echo $rw['id']; ?>" value="<?php echo $r3['kode_gejala'] . '_' . $rw['id']; ?>"><?php echo $rw['kondisi']; ?></option>
                      <?php
                    }
                    echo '</select></td>';
                    ?>
                  <script type="text/javascript">
                    $(document).ready(function () {
                      var arcolor = new Array('#ffffff', '#cc66ff', '#019AFF', '#00CBFD', '#00FEFE', '#A4F804', '#FFFC00', '#FDCD01', '#FD9A01', '#FB6700');
                      setColor();
                      $('.pilihkondisi').on('change', 'tr td select#sl<?php echo $i; ?>', function () {
                        setColor();
                      });
                      function setColor()
                      {
                        var selectedItem = $('tr td select#sl<?php echo $i; ?> :selected');
                        var color = arcolor[selectedItem.data("id")];
                        $('tr td select#sl<?php echo $i; ?>.opsikondisi').css('background-color', color);
                        console.log(color);
                      }
                    });
                  </script>
<?php
      echo "            </tr>";
                  }
      echo "
		                    <input class='btn btn-success float' type=submit data-toggle='tooltip' data-placement='top' title='Klik disini untuk melihat hasil diagnosa' name=submit value='&#xf002;' style='font-family:Arial, FontAwesome'>
                      </tbody>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>";
    }
    break;
}
?>
