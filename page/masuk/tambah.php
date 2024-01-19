<script type="text/javascript">
    function validasi(form) {
        if (form.no.value == "") {
            alert("Nomor Surat Tidak Boleh Kosong");
            form.no.focus();
            return (false);
        }
        if (form.tujuan.value == "") {
            alert("Tujuan Surat Tidak Boleh Kosong");
            form.tujuan.focus();
            return (false);
        }
        if (form.tgl_surat.value == "") {
            alert("Tanggal Surat Tidak Boleh Kosng");
            form.tgl_surat.focus();
            return (false);
        }
        if (form.tgl_terima.value == "") {
            alert("Tanggal Terima Tidak Boleh Kosong");
            form.tgl_terima.focus();
            return (false);
        }
        if (form.asal.value == "") {
            alert("Asal Surat Tidak Boleh Kosong");
            form.asal.focus();
            return (false);
        }
        if (form.agenda.value == "") {
            alert("No Agenda Tidak Boleh Kosong");
            form.agenda.focus();
            return (false);
        }
        if (form.sifat.value == "") {
            alert("Sifat Surat Tidak Boleh Kosong");
            form.sifat.focus();
            return (false);
        }
        if (form.perihal.value == "") {
            alert("Perihal Surat Tidak Boleh Kosong");
            form.perihal.focus();
            return (false);
        }
        if (form.foto.value == "") {
            alert("File Surat Tidak Boleh Kosong");
            form.foto.focus();
            return (false);
        }
        return (true);
    }
</script>



<?php

$tahun = date('Y');

$sql = $koneksi->query("select no_agenda from tb_surat_masuk where tahun='$tahun' order by no_agenda desc");

$data = $sql->fetch_assoc();

$id = $data['no_agenda'];

$urut = substr($id, 0, 2);
$tambah = (int) $urut + 1;


if (strlen($tambah) == 1) {
    $format = "0" . $tambah;
    // }else if(strlen($tambah) == 2){
    //     $format="00".$tambah;
    // }else if(strlen($tambah) == 3){
    //     $format="0".$tambah;
} else {
    $format = $tambah;
}


?>

<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                Tambah Surat Masuk
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <form method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                            <div class="form-group">
                                <label>NO Agenda</label>
                                <input class="form-control" name="agenda" id="agenda" readonly="" value="<?php echo $format ?>" />
                            </div>

                            <div class="form-group">
                                <label>Sifat Surat :</label>
                                <select class="form-control" id="sifat" name="sifat_surat">
                                    <option value="b">Biasa</option>
                                    <option value="p">Penting</option>
                                    <option value="sp">Sangat Penting</option>
                                    <option value="s">Segera</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Asal Surat :</label>
                                <input type="text" class="form-control" name="asal_surat">
                            </div>

                            <div class="form-group">
                                <label>Nomor Surat</label>
                                <input class="form-control" name="no" id="no" />
                            </div>


                            <div class="form-group">
                                <label>Perihal :</label>
                                <textarea class="form-control" rows="3" name="perihal" id="perihal"></textarea>
                            </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Tujuan Surat :</label>
                            <input type="text" class="form-control" name="tujuan">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Surat </label>
                            <input type="date" class="form-control" name="tgl surat" id="tgl_surat" />
                        </div>

                        <div class="form-group">
                            <label>Tanggal Terima </label>
                            <input type="date" class="form-control" name="tanggal terima" id="tanggal_terima" />
                        </div>

                        <div class="form-group">
                            <label>File Surat</label>
                            <input type="file" name="foto" id="foto" />
                        </div>
                        <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                        <input type="submit" name="simpan" value="Simpan" class="btn btn-success">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php

$tahun = date('Y');
$no = $_POST['no'];
$tgl_surat = $_POST['tgl_surat'];
$tgl_terima = $_POST['tanggal_terima'];
$asal = $_POST['asal_surat'];
$sifat = $_POST['sifat_surat'];
$perihal = $_POST['perihal'];
$agenda = $_POST['agenda'];
$tujuan = $_POST['tujuan'];
$foto = $_FILES['foto']['name'];
$lokasi = $_FILES['foto']['tmp_name'];
if(!is_null($lokasi) && is_string($lokasi)){
    $upload = move_uploaded_file($lokasi, "file/".$foto);
  }

// // Pastikan file yang diunggah adalah gambar
// if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
//     $foto = $_FILES['foto']['name'];
//     $lokasi = $_FILES['foto']['tmp_name'];
//     $imageFileType = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

//     // Batasi jenis file yang diizinkan hanya untuk gambar
//     $allowedExtensions = array('jpg', 'jpeg', 'png');
//     if (in_array($imageFileType, $allowedExtensions)) {
//         $upload = move_uploaded_file($lokasi, "file/" . $foto);
//         if ($upload) {
//             echo ".";
//         }
//     } else {
//         echo "
//     <script>
//         setTimeout(function() {
//             swal({
//                 title: 'Aduhh!',
//                 text: 'file harus jpg, png, jpeg!',
//                 type: 'error'
//             }, function() {
//                 window.location = '?page=masuk';
//             });
//         }, 300);
//     </script>
// ";
    
//     }
// }



$simpan = $_POST['simpan'];


if ($simpan) {
    if ($upload) {
        $sql = $koneksi->query("insert into tb_surat_masuk (no_surat, tgl_surat, tanggal_terima, asal_surat, sifat_surat, perihal, no_agenda, file_surat, status, tujuan, tahun)values('$no', '$tgl_surat', '$tgl_terima', '$asal', '$sifat', '$perihal', '$agenda', '$foto', 0, '$tujuan',  '$tahun')");


        if ($sql) {
            echo "

        <script>
            setTimeout(function() {
                swal({
                    title: 'Selamat!',
                    text: 'Surat Masuk Berhasil Disimpan!',
                    type: 'success'
                }, function() {
                    window.location = '?page=masuk';
                });
            }, 300);
        </script>
    ";
        }
    }
}

?>