<?php
 include '../db/koneksi.php';
 include 'akses.php';
 include '../layout/header.php'; ?>
<!--main-container-part-->
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
       <a href="http://localhost/Tugas_Absen_siswa/admin/account" class="current">Account siswa</a> </div>
    <h1>Table account siswa</h1>
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
                  <th>id account</th>
                  <th>nama</th>
                  <th>kelas</th>
                  <th>username</th>
                  <th>password</th>
                  <th>edit</th>
                  <th>Hapus</th>
              </tr>
              </thead>
              <tbody>
                <?php
                $query_tampil=mysqli_query($konek,"select * from siswa JOIN account ON siswa.id_siswa=account.id_siswa");
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
                  <td><a href="http://localhost/Tugas_Absen_siswa/admin/account/edit/<?PHP echo $data['id_account']?>"class="btn btn-info">Edit</a></td>
                  <td><a href="http://localhost/Tugas_Absen_siswa/admin/account/hapus/<?PHP echo $data['id_account']?>"class="btn btn-danger">Hapus</a></td>
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
