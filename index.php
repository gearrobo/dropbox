<?php include 'header.php'; ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div> -->

    <!-- Content Row -->
    <div class="row">
<?php 
date_default_timezone_set('Asia/Jakarta');
$wktu = date('Y-m-d  H:i:s');
$docs = ("SELECT * FROM docu WHERE status = '0' ");
$sql = mysqli_query($conn,$docs);
$sum_docs = mysqli_num_rows($sql);
$sum_docs = $sum_docs - 10;

$docs_in = ("SELECT * FROM docu WHERE status = '1' ");
$sql_in = mysqli_query($conn,$docs_in);
$sum_docs_in = mysqli_num_rows($sql_in);
?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-1">
                            <div class="text-s text-primary text-uppercase mb-1">
                                Kapasitas Ruang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">40</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            <!-- <i class="fas fa-leaf fa-3x text-gray-300"></i> -->
                            <i class="fab fa-intercom fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                Dokumen Masuk</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_docs_in; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">Dokumen Keluar /hari
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">5</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                                Ruang Tersedia</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sum_docs; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fab fa-buromobelexperte fa-3x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mb-5"></div>
    <div class="row mb-5"></div>
    <div class="row mb-5"></div>

    <!-- Content Kontrol --> 
    <div class="row">

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                    <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-8 mb-2">
                            <form action="ambil.php" method="get">
                                <div class="card">
                                    <button type="submit" class="btn-lg btn-primary">Ambil Dokumen <i class="fas fa-file-upload"></i></button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Pompa Air -->
        <div class="col-lg-6 col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <!-- Informasi Pompa Air -->
                        <div class="col-xl-12 col-md-8 mb-2">
                            <form action="simpan.php" method="get">
                                <div id="card" class="card ">
                                    <button type="submit" class="btn-lg btn-success">Simpan Dokumen <i class="fas fa-file-download"></i></button>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <!-- end Informasi -->
    </div>
    <!-- End Content -->

</div>
<!-- /.container-fluid -->
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<?php include 'footer.php'; ?>
