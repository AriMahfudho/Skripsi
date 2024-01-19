<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include "../../koneksi/koneksi.php";
$content ='

<style type="text/css">
  
  .tabel{border-collapse: collapse;}
  .tabel th{padding: 8px 5px;  background-color:  #cccccc;  }
  .tabel td{padding: 8px 5px; font-size: 12px;    }
</style>


';

    if (isset($_POST['cetak'])) {
  
        $tgl1 = $_POST['tgl1'];
        $tgl2 = $_POST['tgl2'];

      }

    $content .= '
<page>

    <div style="text-align:center; font-size: 18px;">Laporan Surat Masuk</div>
    

   <div style="text-align:center;">Dari Tanggal '.date('d-m-Y', strtotime($tgl1)).' Sampai Tanggal  '.date('d-m-Y', strtotime($tgl2)).'</div>
    <br>
    <table border="1px" class="tabel" align="center">
      
        <tr>
          
          <th>No</th>
          <th>Tanggal Terima</th>
          <th>No Agenda</th>
          <th>No Surat</th>
          <th>Tanggal Surat</th>
          <th>Perihal</th>
          <th>Dari</th>
          <th>Tujuan Surat</th>
          <th> Disposisi</th>
        </tr>';

        
          $tgl4 = date("d-m-Y");
          

          if (isset($_POST['cetak'])) {
  
        $tgl1 = $_POST['tgl1'];
        $tgl2 = $_POST['tgl2'];

        $no = 1;


        $sql = $koneksi->query("select * from tb_surat_masuk where  tgl_surat between '$tgl1' and '$tgl2' ");
        while ($data=$sql->fetch_assoc()) {

            if ($data['sifat_surat']=='p') {
                  $sifat = "Penting";
              }

            if ($data['sifat_surat']=='sp') {
                  $sifat = "Sangat Penting";
              }
              
            if ($data['sifat_surat']== 'b') {
                  $sifat = "Biasa";
              }
              
            if ($data['sifat_surat']=='s') {
                  $sifat = "Segera";
              }   


            if ($data['status']==0) {
                $disposisi = "Belum";
              }

            if ($data['status']==1) {
              $disposisi = "Sudah";
            }    

          $content .='
          <tr>
              <td>'.$no++.' </td>
               <td> '.date('d-m-Y', strtotime( $data['tanggal_terima'])).' </td>
               <td> '.$data['no_agenda'].' </td>
               <td> '.$data['no_surat'].' </td>
              <td> '.date('d-m-Y', strtotime( $data['tgl_surat'])).' </td>
             
              <td width="200"> '.$data['perihal'].' </td>
              <td width="150">  '.$data['asal_tujuan'].' </td>
              <td width="150"> '.$data['nama_tujuan'].' </td>
            </tr>
            ';
            

        }

            
        
        }
        
        


$content .='  
    </table>

    
</page>';

    require_once('../../assets/html2pdf/html2pdf.class.php');
    $html2pdf = new HTML2PDF('L','LEGAL','fr');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('exemple.pdf');
?>