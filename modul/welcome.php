            <title>Beranda</title>
            <!-- row -->
            <div class="container-fluid">
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, selamat datang <?php echo ucfirst($_SESSION['username']); ?> !</h4>
                            <span class="ml-0">Di sistem pakar diagnosa penyakit dan hama tanaman jambu air</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-xxl-6 col-xl-4 col-lg-6">
                        <div class="card" style="background-image: url(assets/images/adm_back.svg); height: 89%;">
                            <div class="card-header">
                                <div>
                                    <h2 class="mb-0 font-weight-normal"><i class="mdi mdi-weather-cloudy mr-2"></i>31<sup>C</sup></h2>
                                </div>
                                <div class="ml-2">
                                    <h4 class="location font-weight-normal">Purbalingga</h4>
                                    <h6 class="font-weight-normal">Indonesia</h6>
                                </div>
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
                    <div class="row">
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                        <?php 
                            $htdata=mysql_query("SELECT count(*) as total from gejala");
                            $dtdata=mysql_fetch_assoc($htdata); 
                        ?>
                        <div class="card" style="background-color: #70c745;">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Total Gejala </div>
                                    <div class="stat-digit"><i class="fa fa-eyedropper" style="font-size: 25px;"></i> <?php echo $dtdata["total"]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                        <?php 
                            $htdata=mysql_query("SELECT count(*) as total from penyakit");
                            $dtdata=mysql_fetch_assoc($htdata); 
                        ?>
                        <div class="card" style="background-color: #43de45;">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Total Penyakit</div>
                                    <div class="stat-digit"> <i class="fa fa-bug" style="font-size: 25px;"></i></i> <?php echo $dtdata["total"]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                        <?php 
                            $htdata=mysql_query("SELECT count(*) as total from basis_pengetahuan");
                            $dtdata=mysql_fetch_assoc($htdata); 
                        ?>
                        <div class="card" style="background-color: #adde43;">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Total Knowlage Base</div>
                                    <div class="stat-digit"> <i class="fa fa-group" style="font-size: 25px;"></i> <?php echo $dtdata["total"]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                        <?php 
                            $htdata=mysql_query("SELECT count(*) as total from admin");
                            $dtdata=mysql_fetch_assoc($htdata); 
                        ?>
                        <div class="card" style="background-color: #f5f325;">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Total Pakar</div>
                                    <div class="stat-digit"> <i class="fa fa-user" style="font-size: 25px;"></i> <?php echo $dtdata["total"]; ?></div>
                                </div>
                                <!--<div class="progress">
                                </div>-->
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    </div>
                    </div>
                    <!-- /# column -->
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body p-4">
                                <div class="bootstrap-carousel">
                                    <div class="carousel slide" data-ride="carousel">
                                        <div class="carousel-inner">
                                            <div class="carousel-item active">
                                                <img class="d-block w-100" src="assets/images/banner/b1.jpg" alt="First slide">
                                            </div>
                                            <div class="carousel-item">
                                                <img class="d-block w-100" src="assets/images/banner/b2.jpg" alt="Second slide">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-4 col-xxl-4 col-md-4">
                        <div class="card">
                            <div class="social-graph-wrapper">
                                <span><img src="assets/images/core-img/b1.png" alt=""></span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4>Aplikasi Responsif</h4>
                                        <p>Aplikasi sistem pakar ini dapat menyesuaikan ukuran perangkat anda, jadi walupun di akses melalui perangkat mobile tetap nyaman juga.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-4 col-xxl-4 col-md-4">
                        <div class="card">
                            <div class="social-graph-wrapper">
                                <span><img src="assets/images/core-img/b2.png" alt=""></span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4>Sahabat Petani</h4>
                                        <p>Sistem Pakar ini terus di sesuaikan perhitungan diagnosanya, supaya akurasi terhadap penyakit yang diderita lebih sesuai dan menjadi acuan petani.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-4 col-xxl-4 col-md-4">
                        <div class="card">
                            <div class="social-graph-wrapper">
                                <span><img src="assets/images/core-img/b4.png" alt=""></span>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                        <h4>Admin Pakar</h4>
                                        <p>Terdapat fitur admin pakar, untuk mengatur pengetahuan dan CF pakar, telah di sesuaikan tampilannya sehingga pakar bisa lebih mengeksplore aplikasi.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>               

            </div>