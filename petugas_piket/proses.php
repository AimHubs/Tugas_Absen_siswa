<?php
include "../db/koneksi.php";
include 'akses.php';
//proses pengabsenan
if(isset($_GET['kategori'])){
  if($_GET['kategori']=="absen_siswa"){
      if($_POST['aksi']=="absen_baru"){
        foreach ($_POST['id_siswa'] as $id_siswa ) {
          $query_absen=mysqli_query($konek,"insert into absen_siswa(tgl_absen,keterangan,id_siswa)
          values('$_POST[tgl_absen]','$_POST[kehadiran]',$id_siswa);");
        }
      }else if($_POST['aksi']=="edit_absen"){
        foreach ($_POST['id_siswa'] as $id_siswa ) {
          $query_absen=mysqli_query($konek,"UPDATE absen_siswa SET tgl_absen = '$_POST[tgl_absen]', keterangan = '$_POST[kehadiran]'
          WHERE id_siswa = $id_siswa and tgl_absen='$_POST[tgl_absen]';");
        }
      }else {
        foreach ($_POST['id_siswa'] as $id_siswa ) {
          $query_absen=mysqli_query($konek,"DELETE FROM absen_siswa WHERE id_siswa = $id_siswa and tgl_absen='$_POST[tgl_absen]'");
        }
      }
    Header("Location:../petugas_piket/siswa/");
  }
}
 ?>
