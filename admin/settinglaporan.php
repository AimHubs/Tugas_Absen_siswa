<?php
 include '../db/koneksi.php';
 include 'akses.php';
 include '../layout/header.php'; ?>

 <div id="content">
 <div id="content-header">
   <div id="breadcrumb"> <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a>
     <a href="http://localhost/Tugas_Absen_siswa/admin/settinglaporan" class="current">Setting Laporan</a> </div>
   <h1>Setting Laporan</h1>
 </div>
 <div class="container-fluid">
   <hr>
   <div class="row-fluid">
     <div class="span12">

       <div class="widget-box">
         <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
           <h5>Laporan</h5>
         </div>
         <div class="widget-content nopadding">
           <?php
           $query_pilih_tampil=mysqli_query($konek,"select * from biodata_laporan");
           while($data=mysqli_fetch_array($query_pilih_tampil)){
             ?>
           <form action="./proses.php?edit_laporan" method="post" class="form-horizontal"enctype="multipart/form-data">
             <div class="control-group">
               <label class="control-label">Nama Kepala Sekolah:</label>
               <div class="controls">
                 <input type="text" class="span11" placeholder="Nama Kepala Sekolah"name="nama_ketua"
                 value="<?php echo $data['nama_ketua']; ?>" />
               </div>
             </div>
             <div class="control-group">
               <label class="control-label">Nama Wakil Sekolah :</label>
               <div class="controls">
                 <input type="text" class="span11" placeholder="Nama Wali Sekolah"name="nama_wakil"
                 value="<?php echo $data['nama_wakil']; ?>" />
               </div>
             </div>
             <div class="form-actions">
               <button type="submit" class="btn btn-success">Save</button>
                <button type="reset" class="btn btn-warning">Reset</button>
             </div>
           </form>
           <?php } ?>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>

 <?php include '../layout/footer.php'; ?>
