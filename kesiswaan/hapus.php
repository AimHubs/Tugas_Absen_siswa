<?php
include "../db/koneksi.php";
include 'akses.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

//cek bulan
if($_GET['bulan']<10){
  $bulan="0".$_GET['bulan'];
}else{
  $bulan=$_GET['bulan'];
}
$hapus_absen=mysqli_query($konek,"DELETE FROM absen_siswa WHERE tgl_absen LIKE '%$_GET[tahun]-$bulan%'");
if($hapus_absen){
  Header("Location:../kesiswaan/laporan");
}else {
  echo "
  <script>
    alert('gagal menghapus');
  </script>
  ";
  Header("Location:../kesiswaan/laporan");
}
?>
