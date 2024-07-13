<?php
include '../db/koneksi.php';
include 'akses.php';
include '../layout/header.php';
?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"> <a href="http://localhost/Tugas_Absen_siswa/<?php echo $_SESSION['akses']; ?>/" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <div class="quick-actions_homepage">
            <ul class="quick-actions" style="display: flex; justify-content: center; flex-wrap: wrap;">
                <li class="bg_lb span11">
                    <a href="absen">
                        <i class="icon-group"></i> <strong>
                            Selamat datang anda dapat absen di bagian absen atau click ini
                        </strong>
                    </a>
                </li>
            </ul>
        </div>
        <!--End-Action boxes-->
        <hr/>
        <div class="row-fluid">
            <div class="span6">
            </div>
            <div class="span6">
            </div>
        </div>
    </div>
</div>

<!--end-main-container-part-->
<?php include '../layout/footer.php'; ?>
