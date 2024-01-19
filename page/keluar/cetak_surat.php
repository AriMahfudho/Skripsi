<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi/koneksi.php";
?>

<style type="text/css">
	.tabel{border-collapse: collapse;}
	.tabel th{padding: 8px 5px; background-color: #cccccc;}
	.tabel td{padding: 8px 5px;}
	img{width:125px; height:130px;}
	td{font-size:13px;}
	th{font-size:10px;}

	.style2 {
    color: black;
    font-weight: bold;
    margin-left:20px ;
}
</style>


<script>
  window.print();
  window.onfocus=function() {window.close();}
</script>
</head>
<body onload="window.print()">

  <?php

  $id = $_GET['id'];
  $sql1 = $koneksi->query("select * from tb_surat_keluar where  tb_surat_keluar.id='$id'");
  $tampil=$sql1->fetch_assoc();

  ?>

<table class="tabel" width="800" border="1" style="margin-left: 10px;">
  <tr>
  <td height="46" width="44" ><img src="../../images/logo.png" class="logo"></td>
    <td height="46" ><div align="center">
      <strong style="font-size: 18px;">PEMERINTAH KABUPATEN KARANGANYAR <br> DINAS PENDIDIKAN 
    <br> SEKOLAH DASAR NEGERI 1 BLULUKAN </strong><br>Jl. Adi Soemarmo No. 12 Blulukan Colomadu Karanganyar</div></td>
  </tr>
  <tr>
    <td colspan="2">No <span style="margin-left: 38px">:</span> <?php echo $tampil['no_surat'] ?>
    <br>Perihal <span style="margin-left: 17px">: </span><?php echo $tampil['perihal'] ?><br><br>
    <br>Kepada Yth <br> <?php echo $tampil['tujuan'] ?> <br> Di Tempat<br>
    <br> Diberitahukan kepada <?php echo $tampil['tujuan'] ?> dikarenakan ujian akhir semester telah diselenggarakan maka dimohon kedatangannya untuk menghadiri <?php echo $tampil['perihal'] ?> yang akan dilaksanakan pada : <br>
    <br> <span style="margin-left: 13px"> Tanggal : <?php echo date('d F Y', strtotime($tampil['tgl_surat'])) ?>
    <br><span style="margin-left: 13px"> Pukul   : 08.00 WIB <br><span style="margin-left: 13px"> Tempat  : SDN 1 Blulukan<br> </span>
    <br> Rapot adalah salah satu bentuk evaluasi hasil belajar anak Anda di sekolah. Kami berharap kerjasama yang baik antara pihak sekolah dan orang tua/wali siswa untuk meningkatkan kualitas pendidikan anak.
    Demikian yang dapat kami sampaikan, atas perhatiannya diucapkan terima kasih.<br>
    <br><span style="margin-left: 311px"> Hormat saya </span><br> 
    <br><span style="margin-left: 311px"> Kepala Sekolah </span><br>
</td>
</table>


  </tbody>
