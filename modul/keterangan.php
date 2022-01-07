<title>Info Hama dan Peyakit</title>
<div class="container-fluid">
    <div class="row page-titles mx-0">
        <div class="col-sm-7 p-md-0">
            <div class="welcome-text">
                <h4>Informasi Hama dan Penyakit!</h4>
                <span class="ml-0">Detail informasi hama dan penyakit serta cara mengatasinya</span>
            </div>
        </div>
        <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
        </div>
    </div>
    <div class="row">

    <?php
        $hasil = mysql_query("SELECT * FROM post ORDER BY kode_post");
        while ($r = mysql_fetch_array($hasil)) {
    ?>

        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="card">
                <div class="stat-widget-two card-body">
                    <div class="stat-content">
                    <h4><?php echo $r['nama_post']; ?></h4>
                    <img src="<?php echo 'assets/images/posting/' . $r['gambar']; ?>" alt="" class="img-fluid">
                    </div><br>
                    <div class="row">
                        <div class="col-6">
                            <button class="btn btn-success text-light" data-toggle="modal" data-target="#modal<?php echo $r['kode_post']; ?>"><i class="fa fa-puzzle-piece"></i> Detail</button>
                        </div>
                        <div class="col-6">
                            <button class="btn btn-warning text-light" data-toggle="modal" data-target="#modaltindakan<?php echo $r['kode_post']; ?>"><i class="fa fa-quote-right"></i> Solusi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal<?php echo $r['kode_post'];?>" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header detail-ket">
                <button type="button" class="close" data-dismiss="modal" style="opacity: .99;color: #fff;">&times;</button>
                <h4 class="modal-title text text-ket"><i class="fa fa-puzzle-piece" aria-hidden="true"></i> Detail Untuk <?php echo $r[nama_post]; ?></h4>
              </div>
              <div class="modal-body" style="text-align: justify;text-justify: inter-word;">
                <p><?php echo $r[det_post]; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="modaltindakan<?php echo $r['kode_post'];?>" role="dialog">
          <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header saran-ket">
                <button type="button" class="close" data-dismiss="modal" style="opacity: .99;color: #fff;">&times;</button>
                <h4 class="modal-title text text-ket"><i class="fa fa-quote-right" aria-hidden="true"></i> Saran Untuk <?php echo $r[nama_post]; ?></h4>
              </div>
              <div class="modal-body" style="text-align: justify;text-justify: inter-word;">
                <p><?php echo $r[srn_post]; ?></p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>

    <?php } ?>

    </div>
</div>