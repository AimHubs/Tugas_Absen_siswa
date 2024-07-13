<?php
include "../db/koneksi.php";
include 'akses.php';
if(isset($_GET['edit_siswa'])){
  $query_edit=mysqli_query($konek,"UPDATE siswa SET nama='$_POST[nama]',jenis_kelamin='$_POST[jenis_kelamin]',
  kelas=$_POST[kelas],alamat='$_POST[alamat]',
  tgl_lahir='$_POST[tgl_lahir]',telepon='$_POST[telepon]' WHERE id_siswa=$_GET[edit_siswa]");
  Header("location:../wali_kelas/siswa");
}
?>