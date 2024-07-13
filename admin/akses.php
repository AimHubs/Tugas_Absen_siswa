<?php
if(!isset($_SESSION['id_user'])){
//jika belum login jangan lanjut..
header("Location:http://localhost/Tugas_Absen_siswa/");
}

//cek level user
if($_SESSION['akses']!="admin" and $_SESSION['akses']!="wali_kelas" and $_SESSION['akses']!="petugas_piket" ){
header("Location:http://localhost/Tugas_Absen_siswa/404.php");//jika bukan admin jangan lanjut
}
?>
