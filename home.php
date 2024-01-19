<strong><h3 style='text-align:center'>SELAMAT DATANG DI SISTEM INFORMASI SURAT SDN 1 BLULUKAN</strong></h3>
<?php

if ($_SESSION['admin']) {
	$sql = $koneksi->query("select * from tb_surat_masuk");
	while($data=$sql->fetch_assoc()){
      $masuk=$sql->num_rows;
	}

  $sql = $koneksi->query("select * from tb_surat_keluar");
	while($data=$sql->fetch_assoc()){
      $keluar=$sql->num_rows;
	}

  $sql = $koneksi->query("select * from tb_disposisi");
	while($data=$sql->fetch_assoc()){
      $disposisi=$sql->num_rows;
  }

  $sql = $koneksi->query("select * from tb_user");
  while($data=$sql->fetch_assoc()){
      $user=$sql->num_rows;
	}

}else{

  $sql = $koneksi->query("select * from tb_surat_masuk");
  while($data=$sql->fetch_assoc()){
      $masuk=$sql->num_rows;
  }

  $sql = $koneksi->query("select * from tb_surat_keluar ");
  while($data=$sql->fetch_assoc()){
      $keluar=$sql->num_rows;
  }

  $sql = $koneksi->query("select * from tb_disposisi ");
  while($data=$sql->fetch_assoc()){
      $disposisi=$sql->num_rows; 
  }

  $sql = $koneksi->query("select * from tb_user where level='$admin'");
  while($data=$sql->fetch_assoc()){
      $user=$sql->num_rows; 
  }
}
?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-blue">
            <div class="inner">
            <h1><?= $masuk; ?></sup></h1>
              <p><b>Surat Masuk</p></b>
            </div>
            <div class="icon">
              <i class="ion ion-email-unread"></i>
            </div>
            <a href="?page=masuk" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-yellow">
            <div class="inner">
              <h1><?php echo $keluar; ?></sup></h1>
              <p><b>Surat Keluar</p></b>
            </div>
            <div class="icon">
              <i class="ion ion-email"></i>
            </div>
            <a href="?page=keluar" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <div class="small-box bg-green">
            <div class="inner">
              <h1><?php echo $disposisi; ?></h1>

              <p><b>Disposisi</p></b>
            </div>
            <div class="icon">
              <i class="ion ion-paper-airplane"></i>
            </div>
            <a href="?page=disposisi" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>


    <?php if ($_SESSION['admin']) {?>
      <div class="col-lg-3 col-xs-6">

          <div class="small-box bg-maroon">
            <div class="inner">
              <h1><?php $jumlah_user = mysqli_query($koneksi, "select * from tb_user"); ?></h1>
              <h1 class="counter"><?php echo mysqli_num_rows($jumlah_user); ?></h1>
              <p><b>Pengguna Sistem</p></b>
              <?php
                  if($_SESSION['admin']){
                      $user_l=$_SESSION['admin'];
                  }

                  $sql_u = $koneksi->query("select* from tb_user where id='$user_l'");
                  $data_u = $sql_u->fetch_assoc();

                  // $tujuan = $data_u['level_pimpinan'];
        ?>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="?page=pengguna" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><?php } ?>

