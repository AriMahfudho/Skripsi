<?php

    $id = $_GET['id'];
		$sql = $koneksi->query("select * from tb_surat_keluar where no_agenda='$id'");

		$data = $sql->fetch_assoc();

$asal_tujuan = $data['kepada'];

 ?>


<div class="row">
    <div class="col-md-12" >
        <!-- Form Elements -->
        <div class="box box-primary box-solid">
              <div class="box-header with-border">
                Ubah Surat Keluar
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST" enctype="multipart/form-data">

                          <div class="col-md-6">

                          <div class="form-group">
                                <label>NO Agenda</label>
                                <input class="form-control" name="agenda" id="agenda" readonly="" value="<?php echo $data['no_agenda']?>"  />

                            </div>

                            <!-- <div class="form-group">

                                            <label>Sifat Surat :</label>
                                            <select class="form-control" name="sifat">

                                                   <option >--Pilih Sifat Surat--</option>
                                                    <option value="Biasa" <?php if ($data['sifat_surat']=='Biasa'){ echo "selected";} ?> >Biasa</option>
                                                    <option value="Penting" <?php if ($data['sifat_surat']=='Penting'){ echo "selected";} ?> >Penting</option>
                                                    <option value="Sangat Penting" <?php if ($data['sifat_surat']=='Sangat Penting'){ echo "selected";} ?> >Sangat Penting</option>
                                                   <option value="Segera" <?php if ($data['sifat_surat']=='Segera'){ echo "selected";} ?> >Segera </option>
                                                       

                                            </select>
                                        </div> -->


                            <div class="form-group">

                                <label>Tujuan Surat :</label>
                                <input type="text" class="form-control" name="tujuan" value="<?php echo $data['tujuan'] ?>" >
                            </div>         

                            <div class="form-group">
                                <label>No Surat :</label>
                                <input type="text" class="form-control" name="no" value="<?php echo $data['no_surat'] ?>"  />
                            </div>


                             <div class="form-group">
                                  <label>Isi Ringkas :</label>
                                  <textarea class="form-control" rows="3" name="perihal"><?php echo $data['perihal'] ?></textarea>
                            </div>

                          </div>

                             <div class="col-md-6">  

                             <div class="form-group">
                                <label>Tanggal Surat </label>
                                <input type="date" class="form-control" name="tgl" value="<?php echo $data['tgl_surat'] ?>" />
                            </div>

                      <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                      <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                        </form>

<?php

  if (isset($_POST['simpan'])) {

    $no = $_POST['no'];
    $tgl = $_POST['tgl'];
      $sifat = $_POST['sifat'];
      $tujuan = $_POST['tujuan'];
      $perihal = $_POST['perihal'];
      $agenda = $_POST ['agenda'];



$simpan = $_POST ['simpan'];
if ($simpan) {

    $sql = $koneksi->query("update tb_surat_keluar set no_surat='$no', tgl_surat='$tgl',  tujuan='$tujuan', sifat_surat='$sifat', perihal='$perihal' where no_agenda='$id'");


    if ($sql) {
      echo "

          <script>
              setTimeout(function() {
                  swal({
                      title: 'Selamat!',
                      text: 'Data Berhasil Disimpan!',
                      type: 'success'
                  }, function() {
                      window.location = '?page=keluar';
                  });
              }, 300);
          </script>

      ";
    }

  }else{


      $sql = $koneksi->query("update tb_surat_keluar set no_surat='$no', tgl_surat='$tgl',  tujuan='$tujuan', sifat_surat='$sifat', perihal='$perihal',  kode_surat='$kode_surat' where no_agenda='$id'");


    if ($sql) {
      echo "

          <script>
              setTimeout(function() {
                  swal({
                      title: 'Selamat!',
                      text: 'Data Berhasil Disimpan!',
                      type: 'success'
                  }, function() {
                      window.location = '?page=keluar';
                  });
              }, 300);
          </script>

      ";
    }


  }  

  }

 ?>
