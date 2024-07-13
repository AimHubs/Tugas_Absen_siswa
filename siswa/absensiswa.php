<?php
include '../db/koneksi.php';
include 'akses.php';
include '../layout/header.php';

// deklarasi variable absen
$keterangan_alpha = 0;
$keterangan_izin = 0;
$keterangan_sakit = 0;
$keterangan_terlambat = 0;

// pencarian data
if (isset($_GET['carinis'])) {
    $cari_nis_siswa = $_GET['carinis'];
    if ($cari_nis_siswa == "") {
        $query_tampil = mysqli_query($konek, "SELECT * FROM siswa WHERE kelas = $_GET[kelas] ORDER BY nama");
    } else {
        $query_tampil = mysqli_query($konek, "SELECT * FROM siswa WHERE id_siswa = $cari_nis_siswa ORDER BY nama");
    }
} else {
    // query tampil
    $query_tampil = mysqli_query($konek, "SELECT * FROM siswa WHERE kelas = 1 ORDER BY nama");
}
// end pencarian data
?>
<!-- card pencarian -->
<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
            <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i> Home
            </a>
            <a href="http://localhost/Tugas_Absen_siswa/siswa" class="tip-bottom">Siswa</a>
            <a href="#" class="current">Absen</a>
        </div>
        <h1>Siswa</h1>
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
    <!-- akhir card pencarian -->
    <!-- card melihat data -->
    <div class="container">
        <div class="span7">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon"> <i class="icon-th"></i> </span>
                    <?php if (isset($_GET['carinis'])) { ?>
                        <h5><?php echo date('Y-m-d'); ?></h5>
                    <?php } else { ?>
                        <h5><?php echo date('Y-m-d'); ?></h5>
                    <?php } ?>
                </div>
                <div class="widget-content">
                    <div class="table-responsive">
                        <form method="post" action="./proses.php?kategori=absen_siswa">
                            <table class="table table-bordered table-striped with-check">
                                <thead>
                                    <tr>
                                        <th rowspan='2'>
                                            <input type="checkbox" id="title-table-checkbox" name="title-table-checkbox" />
                                        </th>
                                        <th rowspan='2'>NIS/ID_SISWA</th>
                                        <th rowspan='2'>Nama</th>
                                        <th rowspan='2'>L/P</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; while ($data = mysqli_fetch_array($query_tampil)) { ?>
                                        <tr>
                                            <td><input type="checkbox" name="id_siswa[]" value="<?php echo $data['id_siswa']; ?>" /></td>
                                            <td><?php echo $data['id_siswa']; ?></td>
                                            <td><?php echo $data['nama']; ?></td>
                                            <td><?php echo $data['jenis_kelamin']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- akhir melihat data -->
        <!-- card absen -->
        <div class="container">
            <div class="span4">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon"> <i class="icon-th"></i> </span>
                        <h5>Pengabsenan</h5>
                    </div>
                    <div class="widget-content">
                        <div class="control-group">
                            <label class="control-label">Tanggal :</label>
                            <div class="controls">
                                <input type="date" name="tgl_absen" value="<?php echo date('Y-m-d'); ?>" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="kehadiran" value="h">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success" style="margin-top: 20px;">Hadir</button>
                        </div>
                    </form>
                 </div>
              </div>
            </div>
          </div>
        </div>
 </div>
 <!-- akhir card absen -->
<?php include '../layout/footer.php'; ?>
