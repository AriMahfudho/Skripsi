<script type="text/javascript">
    function validasi(form){
        if (form.no.value=="") {
            alert("Nomor Surat Tidak Boleh Kosong");
            form.no.focus();
            return(false);
        }if (form.tgl.value=="") {
            alert("Tanggal Surat Tidak Boleh Kosng");
            form.tgl.focus();
            return(false);
        }if (form.sifat.value=="") {
            alert("Sifat Surat Tidak Boleh Kosong");
            form.sifat.focus();
            return(false);
        }if (form.tujuan.value=="") {
            alert("Tujuan Surat Tidak Boleh Kosong");
            form.tujuan.focus();
            return(false);
        }if (form.perihal.value=="") {
            alert("Perihal Surat Tidak Boleh Kosong");
            form.perihal.focus();
            return(false);
        }
        return(true);
    }
</script>


<?php

    $tahun = date('Y');

    $sql = $koneksi->query("select no_agenda from tb_surat_keluar where tahun='$tahun' order by no_agenda desc");

    $data = $sql->fetch_assoc();

    $id = $data['no_agenda'];

    $urut = substr($id, 0, 2);
    $tambah = (int) $urut+1;

    if(strlen($tambah) == 1){
    $format="0".$tambah;
    // }else if(strlen($tambah) == 2){
    //   $format="00".$tambah;
    // }else if(strlen($tambah) == 3){
    //   $format="0".$tambah;
    }else{
    $format=$tambah;
    }


?>



<div class="row">
    <div class="col-md-12" >
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                Tambah Surat Keluar
            </div>
            <div class="panel-body" >
                <div class="row">
                    <div class="col-md-12">
                        <form role="form" method="POST" enctype="multipart/form-data" onsubmit="return validasi(this)">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No Agenda</label>
                                <input class="form-control" name="agenda" id="agenda" readonly="" value="<?php echo $format ?>"  />
                            </div>
                            <!-- <div class="form-group">
                                <label>Sifat Surat :</label>
                                <select class="form-control" name="sifat" id="sifat">
                                    <option value="Biasa">Biasa</option>
                                    <option value="Penting">Penting</option>
                                    <option value="Sangat Penting">Sangat Penting</option>
                                    <option value="Segera">Segera</option>
                                </select>
                            </div> -->

                            <div class="form-group">
                                <label>Tujuan Surat :</label>
                                <input type="text" class="form-control" name="tujuan">
                            </div>

                            <div class="form-group">
                                <label>No Surat :</label>
                                <input type="text" class="form-control" name="no" id="no"  />
                            </div>

                            <div class="form-group">
                                <label>Perihal :</label>
                                <textarea class="form-control" rows="3" id="perihal" name="perihal"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">  
                            <div class="form-group">
                                <label>Tanggal Surat </label>
                                <input type="date" class="form-control" name="tgl" id="tgl" />
                            </div>

                            <div class="form-group">
                                <label>File Surat</label>
                                <input type="file" name="foto" id="foto" />
                            </div>

                            <input type=button value=Kembali onclick=self.history.back() class="btn btn-info" />
                            <input type="submit" name="simpan" value="Simpan" class="btn btn-success">

                        </form>

<?php

	if (isset($_POST['simpan'])) {

    $tahun = date('Y');

		$no = $_POST['no'];
		$tgl = $_POST['tgl'];
    	$sifat = $_POST['sifat'];
    	$tujuan = $_POST['tujuan'];
    	$perihal = $_POST['perihal'];
        $agenda = $_POST ['agenda'];
        // $foto = $_FILES['foto']['name'];
        // $lokasi = $_FILES['foto']['tmp_name'];
        // if(!is_null($lokasi) && is_string($lokasi)){
        //     $upload = move_uploaded_file($lokasi, "file/".$foto);
        // }
        if ($_FILES['foto']['error'] === UPLOAD_ERR_OK) {
            $foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            $imageFileType = strtolower(pathinfo($foto, PATHINFO_EXTENSION));

            // Batasi jenis file yang diizinkan hanya untuk gambar
            $allowedExtensions = array('jpg', 'jpeg', 'png');
            if (in_array($imageFileType, $allowedExtensions)) {
                $upload = move_uploaded_file($lokasi, "file/" . $foto);
                if ($upload) {
                    echo ".";
                }
            } else {
                echo "
                        <script>
                            alert('File yang harus jpg, jpeg, png !!!')
                        </script>
                    ";
            }
        }


        $simpan = $_POST ['simpan'];
        if ($simpan) {
        // if ($upload) {

		$sql = $koneksi->query("insert into tb_surat_keluar (no_surat, tgl_surat, sifat_surat, perihal, no_agenda, tujuan, tahun)
        values('$no', '$tgl',  '$sifat',  '$perihal', '$agenda', '$tujuan', '$tahun')");


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
