<script type="text/javascript">
    function validasi(form) {
        if (form.catatan.value == "") {
            alert("Catatan Surat Tidak Boleh Kosong");
            form.catatan.focus();
            return (false);
        }
        return (true);
    }
</script>

<?php

$id = $_GET['id'];
$sql = $koneksi->query("select * from tb_surat_masuk where no_agenda='$id'");
$data = $sql->fetch_assoc();

$no = $data['no_surat'];
$tgl_surat = $data['tgl_surat'];
$tgl_terima = $data['tanggal_terima'];
$asal = $data['asal_surat'];
$sifat = $data['sifat_surat'];
$perihal = $data['perihal'];
$agenda = $data['no_agenda'];
?>

<div class="box box-primary box-solid">
    <div class="box-header with-border">
        Disposisi Surat Masuk
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-md-6">
                <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                    <div class="form-group">
                        <label>Nomor Surat</label>
                        <input class="form-control" name="no surat" value="<?php echo $data['no_surat'] ?>" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Surat</label>
                        <input class="form-control" name="tgl surat" value="<?php echo $data['tgl_surat'] ?>" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Tanggal Terima</label>
                        <input class="form-control" name="tgl terima" value="<?php echo $data['tanggal_terima'] ?>" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Asal Surat</label>
                        <input class="form-control" name="asal surat" value="<?php echo $data['asal_surat'] ?>" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Perihal Surat</label>
                        <input class="form-control" name="perihal" value="<?php echo $data['perihal'] ?>" readonly="" />
                    </div>

                    <div class="form-group">
                        <label>Catatan :</label>
                        <textarea class="form-control" rows="3" name="ket" id="catatan"></textarea>
                    </div>
            </div>

            <div class="col-md-6">
                <!-- <div class="form-group">
                    <label>Sifat :</label>
                    <select class="form-control" id="sifat" name="sifat_dispos">                                                
                        <option value="Biasa">Biasa</option>
                        <option value="Penting">Penting</option>
                        <option value="Sangat Penting">Sangat Penting</option>
                        <option value="Segera">Segera</option>                                                
                    </select>
                </div> -->

                <div class="form-group">
                    <label>Batas Waktu</label>
                    <input type="date" class="form-control" name="batas" id='batas' />
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

        $ket = $_POST['ket'];
        $sifat_dispos = $_POST['sifat_dispos'];
        $batas = $_POST['batas'];

        $simpan = $_POST['simpan'];

        if ($simpan) {

            $sql = $koneksi->query("insert into tb_disposisi (no_surat, tgl_surat, tanggal_terima, asal_surat, sifat_surat, perihal, no_agenda,  ket, sifat_dispos, batas) values ('$no', '$tgl_surat', '$tgl_terima', '$asal', '$sifat', '$perihal', '$agenda',  '$ket', '$sifat_dispos', '$batas')");

            $sql = $koneksi->query("update tb_surat_masuk set status=1 where no_agenda=$id");

            if ($sql) {
                echo "
    <script>
    setTimeout(function() {
        swal({
            title: 'Selamat!',
            text: 'Disposisi Berhasil !',
            type: 'success'
        }, function() {
            window.location = '?page=disposisi';
            });
        }, 300);
    </script>
    ";
            }
        }
        ?>