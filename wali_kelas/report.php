<?php include '../db/koneksi.php';
include "akses.php";
//deklarasi variable absen
$keterangan_alpha=0;
$keterangan_izin=0;
$keterangan_sakit=0;
$keterangan_terlambat=0;
$nama_bulan=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus',
            'September','Oktober','November','Desember'];
            $query=mysqli_query($konek,"SELECT * FROM biodata");
            $header_photo=mysqli_fetch_array($query);$query_laporan=mysqli_query($konek,"SELECT * FROM biodata_laporan");$data_laporan=mysqli_fetch_array($query_laporan);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cetak laporan</title>
  </head>
  <body>
    <div>
      <div style="width: 100%;">
        <table cellspacing="0"style="width: 100%;">
          <tr>
            <td style="width: 15%;"><img src="http://localhost/Tugas_Absen_siswa/img/<?PHP echo $header_photo['photo']; ?>"style="width: 70%;"></td>
              <td style="width: 70%;"align="center">
                <b>Pemerintah Kota <?PHP echo $header_photo['kota']; ?></b>
                <h2 style="margin-top:-5px;"><?PHP echo $header_photo['nama_sekolah']; ?></h2>
                  <p style="font-size: 3mm; margin-top:-20px;"><?PHP echo $header_photo['alamat']; ?>&nbsp;<?PHP echo $header_photo['kota']; ?>, Telp./Fax <?PHP echo $header_photo['telepon']; ?></p>
                  <p style="font-size: 3mm; margin-top:-20px;"><?PHP echo $header_photo['email']; ?></p>
              </td>
            <td style="width: 15%;"><img src="http://localhost/Tugas_Absen_siswa/img/tut.png"style="width: 100%;"></td>
          </tr>
        </table>
          <hr style="font-size: 3mm; margin-top:-20px;"></div>
      </div>
      <table cellspacing="0" style="padding: 1px; width: 100%; border: solid 2px #000000; font-size: 11pt;">
        <tr>
          <th rowspan="2"style="width: 8%; border: solid 1px #000000;">No</th>
          <th style="width: 8%; border: solid 1px #000000;"rowspan="2">NIS</th>
          <th style="width: 30%; border: solid 1px #000000;"rowspan="2">Nama</th>
          <th style="width: 8%; border: solid 1px #000000;"rowspan="2">Kelas</th>
          <th style="width: 8%; border: solid 1px #000000;"rowspan="2">L/P</th>
          <th style="width: 32%; border: solid 1px #000000;"colspan="4"><p align="center">Jumlah</p></th>
          <th style="width: 8%; border: solid 1px #000000;"rowspan="2"><p align="center">Jumlah</p></th>
        </tr>
        <tr>
          <th style="width: 8%; border: solid 1px #000000;">A</th><th style="width: 8%; border: solid 1px #000000;">I</th><th style="width: 8%; border: solid 1px #000000;">S</th><th style="width: 8%; border: solid 1px #000000;">T</th>
        </tr>
        <?php
        $no=1;
        $query_rekap=mysqli_query($konek,"SELECT * FROM siswa JOIN kelas ON siswa.kelas=kelas.id_kelas WHERE kelas.id_kelas=$_SESSION[id_kelas] ORDER BY kelas");
        while ($data=mysqli_fetch_array($query_rekap)) {
          //cek bulan
          if($_GET['bulan']<10){
            $bulan="0".$_GET['bulan'];
          }else{
            $bulan=$_GET['bulan'];
          }
          $query_jml=mysqli_query($konek,"SELECT * FROM absen_siswa WHERE tgl_absen like '%$_GET[tahun]-$bulan%' AND id_siswa=$data[id_siswa]");
          while ($data_jml=mysqli_fetch_array($query_jml)) {
            if($data_jml['keterangan']=='s'){ $keterangan_sakit++; }else if ($data_jml['keterangan']=='i') { $keterangan_izin++; }else if ($data_jml['keterangan']=='a') { $keterangan_alpha++; }else if ($data_jml['keterangan']=='t') { $keterangan_terlambat++; }
          }
         ?>
        <tr><th style="width: 8%; border: solid 1px #000000;"><?php echo $no; ?></th><td style="width: 8%; border: solid 1px #000000;"><?php echo $data['id_siswa']; ?></td><td style="width: 30%; border: solid 1px #000000;"><?php echo $data['nama']; ?></td><td style="width: 8%; border: solid 1px #000000;"><?php echo $data['nama_kelas']; ?></td><td style="width: 8%; border: solid 1px #000000;"><?php echo strtoupper($data['jenis_kelamin']); ?></td>
          <td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_alpha; ?></td><td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_izin; ?></td><td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_sakit; ?></td><td style="width: 8%; border: solid 1px #000000;"><?php echo $keterangan_terlambat; ?></td>
          <?php $total=$keterangan_alpha+$keterangan_sakit+$keterangan_izin; echo '<td style="width: 8%; border: solid 1px #000000;"><p align="center">'.$total.'</p></td>';?>
        </tr>
        <?php $no++;
        $keterangan_alpha=0;
        $keterangan_izin=0;
        $keterangan_sakit=0;
        $keterangan_terlambat=0;
      } ?>
      </table>
      <?php
      echo '<table cellspacing="0" style="width: 100%; text-align: center; font-size: 10pt">
                     <tr>
                         <td style="width: 30%">Gunung Putri, '.date('d-m-Y').'</td>
                         <td style="width: 40%"></td>
                         <td style="width: 30%">Gunung Putri, '.date('d-m-Y').'</td>
                     </tr>
                     <tr>
                       <td style="width: 30%"><br><br><br><br>'.$data_laporan['nama_ketua'].'<br>Kepala Sekolah</td>
                       <td style="width: 40%"></td>
                       <td style="width: 30%"><br><br><br><br>'.$data_laporan['nama_wakil'].'<br>Wakil Kepala Sekolah</td>
                     </tr>
                 </table>';
       ?>
  </body>
</html>
<?php
$filename="Laporan_siswa_bulan_".$nama_bulan[$_GET['bulan']-1].".pdf"; //ubah untuk menentukan nama file pdf yang dihasilkan nantinya
$content = ob_get_clean();
	$content = '<page style="font-family: freeserif">'.nl2br($content).'</page>';
	require_once('../vendor/autoload.php');
  use Spipu\Html2Pdf\Html2Pdf;
	try
	{
		$html2pdf = new html2pdf('P','A4','en', false, 'ISO-8859-15',array(30, 0, 20, 0));

		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }
?>
