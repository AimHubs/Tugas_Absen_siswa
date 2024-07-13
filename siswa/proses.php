<?php
include "../db/koneksi.php";
include 'akses.php';
//proses pengabsesnan
if(isset($_GET['kategori'])){
  if($_GET['kategori']=="absen_siswa"){
        foreach ($_POST['id_siswa'] as $id_siswa ) {
          $query_absen=mysqli_query($konek,"insert into absen_siswa(tgl_absen,keterangan,id_siswa)
          values('$_POST[tgl_absen]','$_POST[kehadiran]',$id_siswa);");
        }
    }
    Header("Location:../siswa/");
  }
 ?>
