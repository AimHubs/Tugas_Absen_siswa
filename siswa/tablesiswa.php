<?php
 include '../db/koneksi.php';
 include 'akses.php';
 include '../layout/header.php'; ?>
<!-- awal pencarian -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i> Home
            </a>
            <a href="http://localhost/Tugas_Absen_siswa/wali_kelas" class="tip-bottom">Siswa</a>
            <a href="#" class="current">table Siswa</a>
        </div>
        <h1>Data Siswa</h1>
    </div>
    <div class="container">
        <div class="span11">
            <div class="widget-box">
                <div class="widget-title"> 
                    <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>Cari</h5>
                </div>
                <div class="widget-content">
                    <form method="get">
                        <div class="control-group">
                            <label class="control-label">NIS :</label>
                            <div class="controls">
                                <input type="text" placeholder="NIS" name="carinis" />
                            </div>
                        </div><br>
                        <div class="control-group" >
                            <label class="control-label">Pilih Kelas :</label>
                            <br>
                            <select name="kelas">
                                <?php
                                $query_kelas = mysqli_query($konek, "SELECT * FROM kelas");
                                while ($data_kelas = mysqli_fetch_array($query_kelas)) {
                                    echo "<option value='$data_kelas[id_kelas]'>$data_kelas[nama_kelas]</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" style="margin-top: 20px;">Cari</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- akhir pencarian  -->
<!--main-container-part-->
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
                  <th>id siswa</th>
                  <th>nama</th>
                  <th>P/L</th>
                  <th>alamat</th>
                  <th>kelas</th>
                  <th>tanggal lahir</th>
                  <th>Nomor Telepon</th>    
              </tr>
              </thead>
              <tbody>
                <?php
                if (isset($_GET['carinis']) && isset($_GET['kelas'])) {
                    $cari_nis_siswa = $_GET['carinis'];
                    $kelas = $_GET['kelas'];

                    if ($cari_nis_siswa != "") {
                        $query_tampil = mysqli_query($konek, "SELECT * FROM siswa JOIN kelas ON siswa.kelas=kelas.id_kelas WHERE siswa.id_siswa = '$cari_nis_siswa' AND siswa.kelas = '$kelas' ORDER BY siswa.kelas ASC");
                    } else {
                        $query_tampil = mysqli_query($konek, "SELECT * FROM siswa JOIN kelas ON siswa.kelas=kelas.id_kelas WHERE siswa.kelas = '$kelas' ORDER BY siswa.kelas ASC");
                    }
                } else {
                    $query_tampil = mysqli_query($konek, "SELECT * FROM siswa JOIN kelas ON siswa.kelas=kelas.id_kelas WHERE siswa.kelas = '1' ORDER BY siswa.kelas ASC");
                }

                $no = 1; 
                while ($data = mysqli_fetch_array($query_tampil)) {
                    $kelamin = strtoupper($data['jenis_kelamin']);
                ?>
                <tr class="gradeX">
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['id_siswa']; ?></td>
                  <td><?php echo $data['nama']; ?></td>
                  <td><?php echo $kelamin; ?></td>
                  <td><?php echo $data['alamat']; ?></td>
                  <td><?php echo $data['nama_kelas']; ?></td>
                  <td><?php echo $data['tgl_lahir']; ?></td>
                  <td><?php echo $data['telepon']; ?></td>
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
