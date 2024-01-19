<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
  <?php
  $sql_u = $koneksi->query("SELECT COUNT(status) as 'jumlah' FROM `tb_surat_masuk` where status='belum';");
  $data_u = $sql_u->fetch_assoc()
  ?>
  <?php
  $sql_i = $koneksi->query("SELECT COUNT(setuju) as 'tambah' FROM `tb_surat_keluar` where setuju='belum';");
  $data_i = $sql_i->fetch_assoc()
  ?>

  <li><a href="index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
  <li><a href="?page=masuk">
      <i class="fa fa-envelope"></i>
      <span>Surat Masuk
        <?php if ($data_u['jumlah'] > 0) {
          echo "<span class='w3-badge w3-red'>" . $data_u['jumlah'] . "</span>";
        } ?>
      </span>
    </a>
  </li>
  <li><a href="?page=keluar"><i class="fa fa-envelope-o"></i>
      <span>Surat Keluar
        <?php if ($data_i['tambah'] > 0) {
          echo "<span class='w3-badge w3-red'>" . $data_i['tambah'] . "</span>";
        } ?>
      </span></a></li>
  <li><a href="?page=disposisi">
      <i class="fa fa-envelope-square"></i>
      <span>Disposisi</span></a></li>

  <?php if ($_SESSION['admin']) { ?>
    <li><a href="?page=pengguna"><i class="fa fa-user"></i> <span>Pengguna</span></a></li>
  <?php } ?>
</ul>