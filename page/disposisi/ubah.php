<?php

$id = $_GET['id'];
$sql = $koneksi->query("select * from tb_disposisi where no_agenda='$id'");
$data = $sql->fetch_assoc();

$tgl_surat = $data['tgl_surat'];
$tanggal_terima = $data['tanggal_terima'];
// $tujuan = $data['tujuan'];
$asal_tujuan = $data['asal_surat'];

?>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
        Ubah Disposisi
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>No Agenda</label>
                        <input class="form-control" name="agenda" value="<?php echo $data['no_agenda'] ?>" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Sifat Surat :</label>
                        <select class="form-control" name="sifat">
                            <option>--Pilih Sifat Surat--</option>
                            <option value="b" <?php if ($data['sifat_surat'] == 'b') {
                                                    echo "selected";
                                                } ?>>Biasa</option>
                            <option value="p" <?php if ($data['sifat_surat'] == 'p') {
                                                    echo "selected";
                                                } ?>>Penting</option>
                            <option value="sp" <?php if ($data['sifat_surat'] == 'sp') {
                                                    echo "selected";
                                                } ?>>Sangat Penting</option>
                            <option value="s" <?php if ($data['sifat_surat'] == 's') {
                                                    echo "selected";
                                                } ?>>Segera </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Asal Surat :</label>
                        <input class="form-control" name="asal_surat" value="<?php echo $data['asal_surat'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input class="form-control" name="no" value="<?php echo $data['no_surat'] ?>" />
                    </div>

                    <div class="form-group">
                        <label>Perihal :</label>
                        <textarea class="form-control" rows="3" name="perihal"><?php echo $data['perihal'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Catatan :</label>
                        <textarea class="form-control" rows="3" name="ket"><?php echo $data['ket'] ?> </textarea>
                    </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" class="form-control" name="tgl_surat" value="<?php echo $tgl_surat ?>" />
                </div>

                <div class="form-group">
                    <label>Tanggal Terima</label>
                    <input type="date" class="form-control" name="tgl_terima" value="<?php echo $tanggal_terima ?>" />
                </div>

                <div class="form-group">
                    <label>Batas Waktu</label>
                    <input type="date" class="form-control" name="batas" id="batas" value="<?php echo $data['batas'] ?>" />
                </div>

                <div>
                    <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                    <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                </div>
            </div>

            </form>
        </div>
        <script>
            //batas waktu tdk boleh sebelum hari ini
            var hari_ini = new Date();
            hari_ini.setHours(0, 0, 0, 0);
            var batas = '';


            var bataswaktu = document.getElementById('batas');

            bataswaktu.addEventListener('input', function() {
                batas = bataswaktu.value;
                var tanggal = new Date(bataswaktu.value);
                if (tanggal <= hari_ini) {
                    alert("Batas waktu hari ini atau setelah hari ini.");
                    bataswaktu.value = '';
                }
            });
        </script>



        <?php
        if (isset($_POST['simpan'])) {

            $no = $_POST['no'];
            $tgl_surat = $_POST['tgl_surat'];
            $tgl_terima = $_POST['tgl_terima'];
            $asal = $_POST['asal_surat'];
            $sifat = $_POST['sifat'];
            $perihal = $_POST['perihal'];
            $agenda = $_POST['agenda'];
            $tujuan = $_POST['tujuan'];

            $ket = $_POST['ket'];
            $batas = $_POST['batas'];


            $simpan = $_POST['simpan'];


            if ($simpan) {

                $sql = $koneksi->query("update  tb_disposisi set no_surat='$no', tgl_surat='$tgl_surat', tanggal_terima='$tgl_terima', asal_surat='$asal', sifat_surat='$sifat', perihal='$perihal',batas='$batas', ket='$ket', no_agenda='$agenda' where no_agenda='$id'");


                if ($sql) {
                    echo "

              <script>
                  setTimeout(function() {
                      swal({
                          title: 'Selamat!',
                          text: 'Data Berhasil Diubah!',
                          type: 'success'
                      }, function() {
                          window.location = '?page=disposisi';
                      });
                  }, 300);
              </script>

          ";
                }
            } else {
                $sql = $koneksi->query("update  tb_disposisi set no_surat='$no', tgl_surat='$tgl_surat', tanggal_terima='$tgl_terima', asal_surat='$asal',  perihal='$perihal',batas='$batas', ket='$ket' where no_agenda='$id'");

                if ($sql) {
                    echo "

              <script>
                  setTimeout(function() {
                      swal({
                          title: 'Selamat!',
                          text: 'Data Berhasil Diubah!',
                          type: 'success'
                      }, function() {
                          window.location = '?page=disposisi';
                      });
                  }, 300);
              </script>

          ";
                }
            }
        }


        ?>