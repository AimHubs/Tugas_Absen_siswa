<?php
if(!isset($_SESSION['id_user'])){
//jika belum login jangan lanjut..
header("Location:http://localhost/Tugas_Absen_siswa/");
}

//cek level user
if($_SESSION['akses']!="wali_kelas"){
header("Location:http://localhost/Tugas_Absen_siswa/404.php");//jika bukan admin jangan lanjut
}
?>
