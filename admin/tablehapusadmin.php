<?php
 include '../db/koneksi.php';
 include 'akses.php';
 include '../layout/header.php'; ?>
<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="http://localhost/Tugas_Absen_siswa/admin/admin" class="tip-bottom"> Admin</a>
      <a href="#" class="current">Hapus</a> </div>
    <h1>Hapus Admin</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Data table</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>no</th>
                  <th>id admin</th>
                  <th>Username</th>
                  <th>Nama</th>
                  <th>Password</th>
                  <th>Email</th>
                  <th>Akses</th>
                  <th colspan="2">Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $query_tampil=mysqli_query($konek,"select * from user where id_user=$_GET[hapus]");
                $no=1; while ($data=mysqli_fetch_array($query_tampil)) {
                 ?>
                <tr class="gradeX">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_user']; ?></td>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['nama']?></td>
                  <td><?php echo $data['password']; ?></td>
                  <td><?php echo $data['email']; ?></td>
                  <td><?php echo $data['akses']; ?></td>
                  <td><a href="http://localhost/Tugas_Absen_siswa/admin/proses.php?hapus_admin=<?PHP echo $data['id_user']?>"class="btn btn-info">Ya</a></td>
                  <td><a href="http://localhost/Tugas_Absen_siswa/admin/admin/"class="btn btn-danger">Tidak</a></td>
                </tr>
                <?php $no++; } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end-main-container-part-->
<?php include '../layout/footer.php'; ?>
