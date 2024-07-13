<?php $query_header=mysqli_query($konek,"SELECT * FROM biodata");
  $header_photo=mysqli_fetch_array($query_header);
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $header_photo['nama_sekolah'] ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  if ($actual_link=="http://localhost/Tugas_Absen_siswa/admin/index.php" or $actual_link=="http://localhost/Tugas_Absen_siswa/petugas_piket/index.php") {
?>
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/bootstrap.min.css" />
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/fullcalendar.css" />
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/matrix-style.css" />
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/matrix-media.css" />
<link href="http://localhost/Tugas_Absen_siswa/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<?php }else{
  if ($actual_link=="http://localhost/Tugas_Absen_siswa/petugas_piket/tableguru.php" or $actual_link=="http://localhost/Tugas_Absen_siswa/petugas_piket/tablesiswa.php"
    or $actual_link=="http://localhost/Tugas_Absen_siswa/siswa/index.php") { ?>
    <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/bootstrap2.min.css" />
  <?PHP }else{?>
  <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/bootstrap.min.css" />
 <?PHP } ?>

  <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/uniform.css" />
  <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/select2.css" />
  <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/matrix-style.css" />
  <link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/matrix-media.css" />
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/colorpicker.css" />
<link rel="stylesheet" href="http://localhost/Tugas_Absen_siswa/css/datepicker.css" />

  <link href="http://localhost/Tugas_Absen_siswa/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

<?PHP } ?>
<link rel="icon" href="http://localhost/Tugas_Absen_siswa/img/<?PHP echo $header_photo['photo']; ?>" type="image/gif" sizes="16x16">
</head>
<body>
<!--Header-part-->
<div id="header">
  <h3 style="margin-left:50px;">
    <a href="http://localhost/Tugas_Absen_siswa/<?PHP ECHO $_SESSION['akses']; ?>/"style="
    color: #fff;
">Absensi</a>
  </h3>
</div>
<!--close-Header-part-->


<!--top-Header-menu-->

<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" >
    <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"style="
    color: #fff;
"><i class="icon icon-user"></i>
      <span class="text"><b> <?php echo $_SESSION['username']; ?></b></span><b class="caret"></b>
    </a>
      <ul class="dropdown-menu">
        <?php if($_SESSION['akses']!="siswa"){ ?>
        <li><a href="http://localhost/Tugas_Absen_siswa/profile"><i class="icon-user"></i><b> Edit Profile</b></a></li>
        <?php } ?>
        <li class="divider"></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/logout.php?id=<?PHP echo $_SESSION['id_user']; ?>"><i class="icon-key"></i><b> Log Out</b></a></li>
      </ul>
    </li>
    <?php if ($_SESSION['akses']=='admin') {?>
    <li class=""><a title="Biodata Sekolah" href="http://localhost/Tugas_Absen_siswa/admin/setting"style="color: #fff;"><i class="icon icon-cog"></i> <span class="text"><b>Settings</b></span></a></li>
    <li class=""><a title="Biodata Sekolah" href="http://localhost/Tugas_Absen_siswa/admin/settinglaporan"style="color: #fff;"><i class="icon icon-cog"></i> <span class="text"><b>Settings Laporan</b></span></a></li>
    <?php } ?>
    <li class=""><a title="" href="http://localhost/Tugas_Absen_siswa/logout.php?id=<?PHP echo $_SESSION['id_user']; ?>"style="
    color: #fff;
"><i class="icon icon-share-alt"></i> <span class="text"><b>Logout</b></span></a></li>
  </ul>
</div>
<!--close-top-Header-menu-->

<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="http://localhost/Tugas_Absen_siswa/<?PHP echo $_SESSION['akses']; ?>/">
    <i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <?php if ($_SESSION['akses']=='admin') {?>
    <li class="submenu"> <a href="#"><i class="icon-user"></i> <span>Admin</span><span class="label label-important">></span></a>
      <ul>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/admin">Table Admin</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/admin/add">Tambah Admin</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-group"></i> <span>Guru</span> <span class="label label-important">></span></a>
      <ul>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/guru">Table Guru</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/guru/add">Tambah Guru</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-group"></i> <span>Siswa</span> <span class="label label-important">></span></a>
      <ul>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/siswa">Table Siswa</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/siswa/add">Tambah Siswa</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/account">Table account siswa</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/account/add">Tambah account</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-sitemap"></i> <span>Kelas</span> <span class="label label-important">></span></a>
      <ul>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/kelas">Table Kelas</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/kelas/add">Tambah Kelas</a></li>
      </ul>
    </li>
    <li class="submenu"> <a href="#"><i class="icon-user"></i> <span>Wali Kelas</span> <span class="label label-important">></span></a>
      <ul>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/wali">Table Wali Kelas</a></li>
        <li><a href="http://localhost/Tugas_Absen_siswa/admin/wali/add">Tambah Wali Kelas</a></li>
      </ul>
    </li>
    <li> <a href="http://localhost/Tugas_Absen_siswa/petugas_piket/siswa"><i class="icon-calendar"></i> <span>Absen Siswa</span> </a></li>
    <li> <a href="http://localhost/Tugas_Absen_siswa/kesiswaan/laporan"><i class="icon-print"></i> <span>laporan Absen Siswa</span> </a></li>
    <?PHP }else if($_SESSION['akses']=='petugas_piket'){?>
      <li> <a href="http://localhost/Tugas_Absen_siswa/petugas_piket/guru"><i class="icon-group"></i> <span>Data Guru</span> </a></li>
      <li> <a href="http://localhost/Tugas_Absen_siswa/petugas_piket/siswa"><i class="icon-calendar"></i> <span>Absen Siswa</span> </a></li>
    <?PHP }else if($_SESSION['akses']=='kesiswaan'){ ?>
      <li> <a href="http://localhost/Tugas_Absen_siswa/kesiswaan/laporan"><i class="icon-print"></i> <span>laporan</span> </a></li>
    <?php }else if($_SESSION['akses']=='wali_kelas'){ ?>
      <li> <a href="http://localhost/Tugas_Absen_siswa/wali_kelas/siswa"><i class="icon-group"></i>Table Siswa</a></li>
      <li> <a href="http://localhost/Tugas_Absen_siswa/wali_kelas/laporan"><i class="icon-print"></i> <span>laporan</span> </a></li>
      <?php }else if($_SESSION['akses']=='siswa'){ ?>
      <li> <a href="http://localhost/Tugas_Absen_siswa/siswa/siswa"><i class="icon-group"></i> <span>Siswa</span> </a></li>
      <li> <a href="http://localhost/Tugas_Absen_siswa/siswa/absen"><i class="icon-calendar"></i> <span>absen Siswa</span> </a></li>
    <?php } ?>
  </ul>
</div>
<!--sidebar-menu-->
