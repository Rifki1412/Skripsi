<?php
  $module = $_GET['module'];
?>
<ul class="metismenu" id="menu">
  <li class="nav-label first">Main Menu</li>
  <li>
    <a <?php if ($page == "") echo 'class="active"'; ?> href="./">
      <i class="icon icon-home"></i> <span class="nav-text">Beranda</span>
    </a>
  </li>
    <?php
      if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    ?>
    <li>
      <a <?php if ($page == "admin") echo 'class="active"'; ?> href="admin">
        <i class="icon-user"></i> <span class="nav-text">Admin</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "penyakit") echo 'class="active"'; ?> href="penyakit">
        <i class="icon icon-bug"></i> <span class="nav-text">Penyakit</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "gejala") echo 'class="active"'; ?> href="gejala">
        <i class="icon icon-broken-heart"></i> <span class="nav-text">Gejala</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "pengetahuan") echo 'class="active"'; ?> href="pengetahuan">
        <i class="icon icon-check-square-11"></i> <span class="nav-text">Pengetahuan</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "post") echo 'class="active"'; ?> href="post">
        <i class="icon icon-single-content-03"></i> <span class="nav-text">Informasi</span>
      </a>
    </li>
    <?php
    } else {
    ?>
    <li>
      <a <?php if ($page == "diagnosa") echo 'class="active"'; ?> href="diagnosa">
        <i class="icon icon-layers-3"></i> <span class="nav-text">Diagnosa</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "riwayat") echo 'class="active"'; ?> href="riwayat">
        <i class="icon icon-book-open-2"></i> <span class="nav-text">Riwayat</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "keterangan") echo 'class="active"'; ?> href="keterangan">
        <i class="icon icon-bug"></i> <span class="nav-text">Info Penyakit</span>
      </a>
    </li>
    <li>
      <a <?php if ($page == "harga") echo 'class="active"'; ?> href="harga">
        <i class="icon icon-tag"></i> <span class="nav-text">Info Harga</span></a><li>
      <?php
  }
  ?>
  <li class="nav-label first">Extra</li>
  <li>
    <a <?php if ($page == "tentang") echo 'class="active"'; ?> href="tentang">
      <i class="icon icon-alert-circle-exc"></i> <span class="nav-text">Tentang</span>
    </a>
  </li>
</ul>