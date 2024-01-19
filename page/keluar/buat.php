<div class="row">
  <div class="col-md-12">
    <div class="box box-warning box-solid">
      <div class="box-header with-border">
        Buat Surat Keluar
      </div>
      <div class="panel-body">

        <div class="table-responsive">
          <a href="?page=keluar&aksi=tambah_surat" style="margin-bottom: 8px; margin-left: 5px;" class="btn btn-success"> <i class="fa fa-plus"></i> Buat Surat Keluar</a>
          <input style="margin-bottom: 10px;; margin-left: 5px;" type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
          <table class="table table-striped table-bordered table-hover" id="example1">
            <thead>
              <tr>
                <th>No</th>
                <th>No Agenda</th>
                <th>No Surat</th>
                <th>Tanggal Surat </th>
                <th>Tujuan Surat</th>
                <!-- <th>Sifat Surat</th> -->
                <th>Perihal</th>
                <th >Persetujuan</th>
                <th>Aksi</th>
              </tr>
            </thead>

            <tbody>

              <?php
              error_reporting(0);
              if ($_SESSION['admin']) {
                $no = 1;
                $sql = $koneksi->query("select * from tb_surat_keluar order by tb_surat_keluar.id desc ");
              } else {
                $no = 1;
                $sql = $koneksi->query("select * from tb_surat_keluar order by tb_surat_keluar.id desc ");
              }
              while ($data = $sql->fetch_assoc()) {
              ?>

                <tr>
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $data['no_agenda'] ?></td>
                  <td><?php echo $data['no_surat'] ?></td>
                  <td><?php echo date('d-m-Y', strtotime($data['tgl_surat'])) ?></td>
                  <td><?php echo $data['tujuan'] ?></td>
                  <!-- <td><?php echo $data['sifat_surat'] ?></td> -->
                  <td><?php echo $data['perihal'] ?>
                  <td>

                    <?php if ($data['setuju'] == 0) { ?>
                      <?php if ($_SESSION['user']) { ?>
                      <a style="margin-bottom: 10px;; margin-left: 5px;" data-toggle="modal" data-target="#myModal<?php echo $data['no_agenda']; ?>" class="btn btn-danger">Belum</a>
                      <?php } else { ?>
                        <a disabled="" style="margin-bottom: 10px;; margin-left: 5px;" class="btn btn-danger">Belum</a>
                      <?php } ?>
                      <div class="modal fade" id="myModal<?php echo $data['no_agenda']; ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h2 class="modal-title" style="text-align:center;">Konfirmasi</h2>
                            </div>
                            <div class="modal-body">
                              <h4 style="text-align:center;" >Apakah Anda Akan Menyetujui Surat ini?</h4>
                            </div>
                            <form role="form" method="POST" enctype="multipart/form-data">
                              <div class="modal-footer " style="text-align:center;">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                <input type="submit" name="setuju" value="Setuju" class="btn btn-success">
                              </div>
                            </form>


                            <?php
                            $id = $data['no_agenda'];
                            if (isset($_POST['setuju'])) {
                              $setuju = $_POST['setuju'];

                              if ($setuju) {
                                $sql = $koneksi->query("update tb_surat_keluar set setuju=1 where no_agenda='$id'");

                                if ($sql) {
                                    echo "
                                    <script>
                                    setTimeout(function() {
                                        swal({
                                            title: 'Selamat!',
                                            text: 'Data sudah berhasil Disetujui !',
                                            type: 'success'
                                        }, function() {
                                            window.location = '?page=keluar&aksi=buat';
                                        });
                                    }, 300);
                                    </script>
                                    ";
                                }
                              }
                            }
                            ?>
                          </div>
                        </div>
                      </div>
                    <?php } else { ?>
                      <span style="margin-bottom: 10px;; margin-left: 5px;" class="btn btn-success">Sudah</span>
                    <?php } ?>    
                  </td>
                  
                  <td>
                    <?php if ($_SESSION['admin']) { ?>
                    <a href="?page=keluar&aksi=ubah_surat&id=<?php echo $data['no_agenda']; ?>" class="btn btn-info"> <i class="fa fa-edit"></i> Ubah</a>
                      <?php if ($data['setuju'] == 1) { ?>
                        <a href="page/keluar/cetak_surat.php?id=<?php echo $data['id']; ?>" target="blank" class="btn btn-warning"><i class="fa fa-print "></i> Cetak</a>
                      <?php } else { ?>
                        <a disabled="" class="btn btn-warning"><i class="fa fa-print "></i> Cetak</a>
                      <?php } ?>

                    <?php } else { ?>
                      <a href="page/keluar/cetak_surat.php?id=<?php echo $data['id']; ?>" target="blank" class="btn btn-warning"><i class="fa fa-print "></i> Cetak</a>
                    <?php } ?>
                  <?php } ?>
                  </td>
                </tr>

                <?php  ?>
            </tbody>
          </table>
        </div>