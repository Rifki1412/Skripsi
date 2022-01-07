<?php $koneksi = mysqli_connect("localhost", "root", "", "db_spcf"); ?>
<title>Riwayat Diagnosa</title>
<style type="text/css">
  .turquoise{
    color: #1abc9c;
  }
  .emerald{
    color: #2ecc71;
  }
  .river{
    color: #3498db;
  }
  .amethyst{
    color: #9b59b6;
  }
  .asphalt{
    color: #34495e;
  }
  .sun{
    color: #f1c40f;
  }
  .carrot{
    color: #e67e22;
  }
  .alizarin{
    color: #e74c3c;
  }
  .concrete{
    color: #95a5a6;
  }
  .clouds{
    color: #ecf0f1;
  }
  .hole{
    color: #2980b9;
  }
  .midnight{
    color: #2c3e50;
  }
  .pome{
    color: #c0392b;
  }
</style>
<div class="container-fluid">
  <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
      <div class="welcome-text">
        <h4>Riwayat Diagnosa!</h4>
        <span class="ml-0">Hasil Diagnosa Gejala Penyakit Tanaman Jambu Air</span>
      </div>
    </div>
  </div>
  <?php
  include "config/fungsi_alert.php";
  switch ($_GET[act]) {   
  // Tampil hasil
    default:
        $offset = $_GET['offset'];
        //jumlah data yang ditampilkan perpage
        $limit = 15;
        if (empty($offset)) {
            $offset = 0;
        }

        $sqlgjl = mysql_query("SELECT * FROM gejala order by kode_gejala+0");
        while ($rgjl = mysql_fetch_array($sqlgjl)) {
            $argjl[$rgjl['kode_gejala']] = $rgjl['nama_gejala'];
        }

        $sqlpkt = mysql_query("SELECT * FROM penyakit order by kode_penyakit+0");
        while ($rpkt = mysql_fetch_array($sqlpkt)) {
            $arpkt[$rpkt['kode_penyakit']] = $rpkt['nama_penyakit'];
            $ardpkt[$rpkt['kode_penyakit']] = $rpkt['det_penyakit'];
            $arspkt[$rpkt['kode_penyakit']] = $rpkt['srn_penyakit'];
        }

        $tampil = mysql_query("SELECT * FROM hasil ORDER BY id_hasil DESC");
        $baris = mysql_num_rows($tampil);
        if ($baris > 0) {
            echo"
            <div class='row'>
              <div class='col-sm-12 col-md-12 col-xxl-8 col-xl-6 col-lg-8'>
                <div class='card'>
                  <div class='card-header'>
                    <h4 class='card-title'><i class='fa fa-database'></i> <strong>Data Diagnosa</strong></h4>
                  </div>
                  <div class='card-body'>
                    <div class='table-responsive'>
                      <table class='table table-striped' style='border: 2px solid #70c745;' cellpadding='0' cellspacing='0'>
                        <thead style='background-color: #70c745; color: #fff;'>
                          <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Penyakit</th>
                            <th nowrap>Nilai CF</th>
                            <th width='21%' class='text-center'>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>";
                      $hasil = mysql_query("SELECT * FROM hasil ORDER BY id_hasil DESC limit $offset,$limit");
                      $no = 1;
                      $no = 1 + $offset;
                      $counter = 1;
                      while ($r = mysql_fetch_array($hasil)) {
                        if ($r[hasil_id]>0){
                          if ($counter % 2 == 0)
                              $warna = "dark";
                          else
                              $warna = "light";
            echo "
                          <tr class='" . $warna . "'>
                    			  <td align=center>$no</td>
                    			  <td>$r[tanggal]</td>
                    			  <td>" . $arpkt[$r[hasil_id]] . "</td>
                    			  <td><span class='badge badge-dark'>" . $r[hasil_nilai] . "</span></td>
                    			  <td align=center>
                    			    <a type='button' class='btn btn-info' target='_blank' href=riwayat-detail/$r[id_hasil]><i class='fa fa-eye' aria-hidden='true'></i> Detail </a> &nbsp;
                    	     </td>
                          </tr>";
                          $counter++;
                        }
                        $no++;
                      }
            echo "      </tbody>
                      </table>";
            echo "    <nav>
                        <ul class='pagination pagination-sm pagination-gutter'>";
                        if ($offset != 0) {
                            $prevoffset = $offset - $limit;
                            echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=riwayat&offset=$prevoffset>Back</a></li>";
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
                                echo "<li class='page-item'><a class='page-link' href=index.php?module=riwayat&offset=$newoffset>$i</a></li>";
                            } else {
                                echo "<li class='page-item active'><a class='page-link' href='javascript:void()'>" . $i . "</a></li>";
                            }
                        }

                        if (!(($offset / $limit) + 1 == $halaman) && $halaman != 1) {
                            $newoffset = $offset + $limit;
                            echo "<li class='page-item page-indicator'><a class='page-link' href=index.php?module=riwayat&offset=$newoffset>Next</a></li>";
                        } else {
                            echo "<li class='page-item page-indicator active'><a class='page-link' href='javascript:void()'>Next</a></li>";
                        }
            echo "
                        </ul>
                      </nav>";
            echo "  </div>
                  </div>
                </div>
              </div>";
  ?>
              <div class="col-sm-12 col-md-12 col-xxl-4 col-xl-2 col-lg-4">
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title"><i class="fa fa-pie-chart"></i> <strong>Grafik</strong></h4>
                  </div>
                  <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                      <canvas id="myPieChart"></canvas>
                    </div>
                    <hr>
                    <div class="mt-4 text-center small">
                      <span class="mr-2">
                        <i class="fa fa-circle turquoise"></i> Lalat Buah
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle emerald"></i> Ulat Kupu-Kupu Gajah
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle river"></i> Ulat Pagoda
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle amethyst"></i> Tungau
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle asphalt"></i> Benalu
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle sun"></i> Kutu Putih
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle carrot"></i> Penggerek Batang
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle alizarin"></i> Kelelawar
                      </span>
                      <span class="mr-2">
                        <i class="fa fa-circle clouds"></i> Antraknosa
                      </span>
                    </div>
                    <div id="legend-container"></div>
                  </div>
                  <!-- /.box-body-->
                </div>
              </div>
  <?php
            echo "
            </div>";
          } else {
            echo "
            <div class='row'>
              <div class='col-12'>
                <div class='card'>
                  <div class='card-body'>
                    <b>Data Kosong !</b>
                  </div>
                </div>
              </div>
            </div>";
          }
  }
  ?>

  <script>
    var ctx = document.getElementById("myPieChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'pie',
      data: {
        datasets: [{
          label: '',
          data: [
          <?php 
          $P001 = mysqli_query($koneksi,"select * from hasil where hasil_id='1'");
          echo mysqli_num_rows($P001);
          ?>,
          <?php 
          $P002 = mysqli_query($koneksi,"select * from hasil where hasil_id='2'");
          echo mysqli_num_rows($P002);
          ?>,
          <?php 
          $P003 = mysqli_query($koneksi,"select * from hasil where hasil_id='3'");
          echo mysqli_num_rows($P003);
          ?>,
          <?php 
          $P004 = mysqli_query($koneksi,"select * from hasil where hasil_id='4'");
          echo mysqli_num_rows($P004);
          ?>,
          <?php 
          $P005 = mysqli_query($koneksi,"select * from hasil where hasil_id='5'");
          echo mysqli_num_rows($P005);
          ?>,
          <?php 
          $P006 = mysqli_query($koneksi,"select * from hasil where hasil_id='6'");
          echo mysqli_num_rows($P006);
          ?>,
          <?php 
          $P007 = mysqli_query($koneksi,"select * from hasil where hasil_id='7'");
          echo mysqli_num_rows($P007);
          ?>,
          <?php 
          $P008 = mysqli_query($koneksi,"select * from hasil where hasil_id='8'");
          echo mysqli_num_rows($P008);
          ?>,
          <?php 
          $P009 = mysqli_query($koneksi,"select * from hasil where hasil_id='9'");
          echo mysqli_num_rows($P009);
          ?>,
          ],
          backgroundColor: [
          'rgb(26, 188, 156)','rgb(46, 204, 113)','rgb(52, 152, 219)','rgb(155, 89, 182)','rgb(52, 73, 94)','rgb(241, 196, 15)','rgb(230, 126, 34)','rgb(231, 76, 60)','rgb(236, 240, 241)','rgb(149, 165, 166)','rgb(41, 128, 185)','rgb(44, 62, 80)','rgb(192, 57, 43)'
          ]
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
</div>



