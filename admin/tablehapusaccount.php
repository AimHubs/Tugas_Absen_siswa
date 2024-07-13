<?php
 include '../db/koneksi.php';
 include 'akses.php';
 include '../layout/header.php'; ?>
<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
      <a href="http://localhost/Tugas_Absen_siswa/admin/account" class="tip-bottom">Account Siswa</a>
       <a href="#" class="current">Hapus</a> </div>
    <h1>Hapus Account siswa</h1>
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
                  <th>No</th>
                  <th>Id account</th>
                  <th>Nama siswa</th>
                  <th>Kelas</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th colspan="2">Aksi</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $query_tampil=mysqli_query($konek,"select * from siswa JOIN account ON siswa.id_siswa=account.id_siswa where account.id_account=$_GET[hapus]");
                $no=1; while ($data=mysqli_fetch_array($query_tampil)) {
                 ?>
                <tr class="gradeX">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_account']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td>
                  <?php
                  $id_kelas = $data['id_kelas'];
                  if (!isset($id_kelas)) {
                      echo "Error: id_kelas is not set.";
                  } else {
                      $query_kelas = mysqli_query($konek, "SELECT nama_kelas FROM kelas WHERE id_kelas=$id_kelas");
                      if (!$query_kelas) {
                          echo "Error: " . mysqli_error($konek);
                      } else {
                          $data_kelas = mysqli_fetch_array($query_kelas);
                          if (!$data_kelas) {
                              echo "Error: No class found for id_kelas = $id_kelas";
                          } else {
                              echo $data_kelas['nama_kelas'];
                          }
                      }
                  }
                  ?>
                  </td>
                  <td><?php echo $data['username']; ?></td>
                  <td><?php echo $data['password']; ?></td>
                  <td><a href="http://localhost/Tugas_Absen_siswa/admin/proses.php?hapus_account=<?PHP echo $data['id_account']?>"class="btn btn-info">Ya</a></td>
                  <td><a href="http://localhost/Tugas_Absen_siswa/admin/account"class="btn btn-danger">Tidak</a></td>
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
