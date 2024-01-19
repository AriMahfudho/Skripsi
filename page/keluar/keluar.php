<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="box box-primary box-solid">
                        <div class="box-header with-border">
                            Data Surat Keluar
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php  if ($_SESSION['admin']) { ?>
                              <a href="?page=keluar&aksi=tambah" style="margin-bottom: 8px; margin-left: 5px;"  class="btn btn-success"> <i class="fa fa-plus"></i> Tambah</a>
                              <?php } ?> 
                              <a href="?page=keluar&aksi=buat" style="margin-bottom: 8px; margin-left: 5px;"  class="btn btn-warning"> <i class="fa fa-plus"></i> Buat</a>
                        <!-- <a id="lap_masuk" data-toggle="modal" data-target="#lap" style="margin-bottom: 8px; margin-left: 5px;" class="btn btn-default"><i class="fa fa-print"></i> Cetak PDF</a> -->
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
                  <th>File</th>
                  <th>Aksi</th>
                </tr>
                </thead>

                <tbody>

                  <?php
                    if ($_SESSION['admin']) {
                      $no = 1;
                      $sql = $koneksi->query("select * from tb_surat_keluar order by tb_surat_keluar.id desc ");
                    }else{
                      $no = 1;
                      $sql = $koneksi->query("select * from tb_surat_keluar order by tb_surat_keluar.id desc ");
                    }  
                      while ($data=$sql->fetch_assoc()) {



                  ?>

                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['no_agenda'] ?></td>
                    <td><?php echo $data['no_surat'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($data['tgl_surat'])) ?></td>
                    <td><?php echo $data['tujuan'] ?></td>
                    <!-- <td><?php echo $data['sifat_surat'] ?></td> -->
                    <td><?php echo $data['perihal'] ?>
                    <td><a href="page/keluar/file_surat.php?id=<?php echo $data['no_agenda']; ?>" target="blank"><div style="color: green;"> [file: <?php echo $data['foto'];?>]</a><div></td>
                    <td>
                      <a  href="?page=keluar&aksi=ubah&id=<?php echo $data['no_agenda'];?>" class="btn btn-info "> <i class="fa fa-edit"></i> Ubah</a>
                      <a onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data ini...???')" href="?page=keluar&aksi=hapus&id=<?php echo $data['no_agenda'];?>"" class="btn btn-danger "> <i class="fa fa-trash"></i> Hapus</a>
                    </td>
                  </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>

<?php if ($_SESSION['admin']) {?>

<div class="modal fade" id="lap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Laporan Surat Keluar</h4>
      </div>
      <div class="modal-body">
        <form role="form" method="POST" action="page/keluar/cetak.php" target="blank" >
          <div class="form-group">
            <label>Dari Tanggal</label>
            <input class="form-control" type="date" name="tgl1" /> 
          </div>

          <div class="form-group">
            <label> Sampai Tanggal</label>
            <input class="form-control" type="date" name="tgl2" /> 
          </div>
        <div class="modal-footer">
          <button type="submit" name="cetak" class="btn btn-default" style="margin-top: 8px;"><i class="fa fa-print"></i> Cetak per Periode</button>
        </div>
        </form> 
      </div> 
    </div>
  </div>
</div>
<?php } 