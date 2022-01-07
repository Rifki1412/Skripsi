<title>Detail Riwayat Diagnosa</title>
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

  .box.box-solid.box-danger {
    border: 1px solid #dd4b39;
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

  .box.box-solid.box-danger>.box-header {
    color: #fff;
    background: #dd4b39;
    background-color: #dd4b39;
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
</style>
<?php

if ($_GET['id']) {
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

  $sqlhasil = mysql_query("SELECT * FROM hasil where id_hasil=" . $_GET['id']);
  while ($rhasil = mysql_fetch_array($sqlhasil)) {
    $arpenyakit = unserialize($rhasil['penyakit']);
    $argejala = unserialize($rhasil['gejala']);
  }

  $np1 = 0;
  foreach ($arpenyakit as $key1 => $value1) {
    $np1++;
    $idpkt1[$np1] = $key1;
    $vlpkt1[$np1] = $value1;
  }


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
            <table class='table table-bordered table-striped konsul'> 
              <tr>
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
        $gambar = 'assets/images/penyakit/' . $argpkt[$idpkt[1]];
      } else {
        $gambar = 'assets/images/noimage.png';
      }
    echo "  </table>
            <div class='well well-small'>
              <img style='float:right; margin-left:15px;' src='" . $gambar . "' height=200><h3><b>Hasil Diagnosa</b></h3>";
    echo "    <div class='callout callout-default'>Jenis penyakit yang diderita adalah <b>
                <h3 class='text text-success'>" . $nmpkt[1] . "</b> / " . round($vlpkt[1], 2) . " % (" . $vlpkt[1] . ")<br></h3>";
    echo "    </div>
            </div>
            <div class='box box-info box-solid'>
              <div class='box-header with-border'>
                <h4 class='box-title text-white'>Detail Penyakit</h4>
              </div>
              <div class='box-body'>
                <h6>";
    echo          $ardpkt[$idpkt[1]];
    echo "      </h6>
              </div>
            </div>
            <div class='box box-warning box-solid'>
              <div class='box-header with-border'>
                <h4 class='box-title text-white'>Solusi Penyakit</h4>
              </div>
              <div class='box-body'>
                <h6>";
    echo          $arspkt[$idpkt[1]];
    echo "      </h6>
              </div>
            </div>
            <div class='box box-danger box-solid'>
              <div class='box-header with-border'>
                <h4 class='box-title text-white'>Kemungkinan lain:</h4>
              </div>
              <div class='box-body'>";
                for ($ipl = 2; $ipl < count($idpkt); $ipl++) {
    echo "      <h6><i class='fa fa-bug'></i> " . $nmpkt[$ipl] . "</b> / " . round($vlpkt[$ipl], 2) . " % (" . $vlpkt[$ipl] . ")<br></h6>";
      }
    echo "    </div>
            </div>
    		  </div>
        </div>
      </div>
    </div>
  </div>";
}
?>