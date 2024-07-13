
<!--Footer-part-->

<div class="row-fluid">
  <div id="footer" class="span12"style="
    color: #fff;
    font-weight: bold;
    font-size: 15px;
">
     <?php echo "$header_photo[alamat] | $header_photo[email] | contac : $header_photo[telepon]"; ?> </div>
</div>

<!--end-Footer-part-->
<?php $actual_link = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
  if ($actual_link=="http://localhost/Tugas_Absen_siswa/kepala_sekolah/index.php"
    or $actual_link=="http://localhost/Tugas_Absen_siswa/guru/index.php"
    or $actual_link=="http://localhost/Tugas_Absen_siswa/siswa/index.php"
    or $actual_link=="http://localhost/Tugas_Absen_siswa/wali_kelas/index.php") {
?>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/bootstrap.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.flot.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.flot.resize.min.js"></script>

<!--Turning-series-chart-js-->
<script type="text/javascript">
$(function () {
  <?php
  if (isset($_SESSION['id_kelas'])) {
    $tambahan="AND siswa.kelas=$_SESSION[id_kelas]";
  }else{
    $tambahan="";
  }
   ?>
    var datasets = {
        "izin": {
            label: "IZIN",
            <?php
            $bulan=date('Y-m');
            $tanggal=date('d');
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              $query_izin=mysqli_query($konek,"SELECT COUNT(absen_siswa.id_absen_siswa) FROM absen_siswa
              JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
              WHERE absen_siswa.keterangan='i' AND absen_siswa.tgl_absen LIKE '$bulan-$tanggal_d' $tambahan");
              $data_izin=mysqli_fetch_array($query_izin);
              $jumlah_izin[$i]=$data_izin[0];
            }
             ?>
            data: [<?php
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              if ($i==6) {
                echo " [$tanggal_d,$jumlah_izin[$i]]";
              }else {
                echo "[$tanggal_d,$jumlah_izin[$i]],";
              }
            }
             ?>
                  ]
        },
        "sakit": {
            label: "SAKIT",
            <?php
            $bulan=date('Y-m');
            $tanggal=date('d');
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              $query_izin=mysqli_query($konek,"SELECT COUNT(absen_siswa.id_absen_siswa) FROM absen_siswa
              JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
              WHERE absen_siswa.keterangan='s' AND absen_siswa.tgl_absen LIKE '$bulan-$tanggal_d' $tambahan");
              $data_izin=mysqli_fetch_array($query_izin);
              $jumlah_izin[$i]=$data_izin[0];
            }
             ?>
            data: [<?php
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              if ($i==6) {
                echo " [$tanggal_d,$jumlah_izin[$i]]";
              }else {
                echo "[$tanggal_d,$jumlah_izin[$i]],";
              }
            }
             ?>
                  ]
        },
        "alpha": {
            label: "ALPHA",
            <?php
            $bulan=date('Y-m');
            $tanggal=date('d');
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              $query_izin=mysqli_query($konek,"SELECT COUNT(absen_siswa.id_absen_siswa) FROM absen_siswa
              JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
              WHERE absen_siswa.keterangan='a' AND absen_siswa.tgl_absen LIKE '$bulan-$tanggal_d' $tambahan");
              $data_izin=mysqli_fetch_array($query_izin);
              $jumlah_izin[$i]=$data_izin[0];
            }
             ?>
            data: [<?php
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              if ($i==6) {
                echo " [$tanggal_d,$jumlah_izin[$i]]";
              }else {
                echo "[$tanggal_d,$jumlah_izin[$i]],";
              }
            }
             ?>
                  ]
        },
        "terlambat": {
            label: "TERLAMBAT",
            <?php
            $bulan=date('Y-m');
            $tanggal=date('d');
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              $query_izin=mysqli_query($konek,"SELECT COUNT(absen_siswa.id_absen_siswa) FROM absen_siswa
              JOIN siswa ON siswa.id_siswa=absen_siswa.id_siswa
              WHERE absen_siswa.keterangan='t' AND absen_siswa.tgl_absen LIKE '$bulan-$tanggal_d' $tambahan");
              $data_izin=mysqli_fetch_array($query_izin);
              $jumlah_izin[$i]=$data_izin[0];
            }
             ?>
            data: [<?php
            for ($i=0; $i < 7; $i++) {
              $tanggal_d=$tanggal-$i;
              if ($i==6) {
                echo " [$tanggal_d,$jumlah_izin[$i]]";
              }else {
                echo "[$tanggal_d,$jumlah_izin[$i]],";
              }
            }
             ?>
                  ]
        }
    };
            }); 


</script>
<!--Turning-series-chart-js-->
<?php }else{ ?>

<script src="http://localhost/Tugas_Absen_siswa/js/jquery.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.ui.custom.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/bootstrap.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.uniform.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/select2.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/matrix.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/matrix.tables.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/bootstrap-colorpicker.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/bootstrap-datepicker.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/masked.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/matrix.form_common.js"></script>
<script src="http://localhost/Tugas_Absen_siswa/js/jquery.peity.min.js"></script>

<?PHP } ?>

</body>
</html>
