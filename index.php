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

if(isset($_GET['id_lampu'])){
    $id = $_GET['id_lampu'];
    $value_lampu = $_GET['value'];

    if($value_lampu == 1){ $value = 0;}
    if($value_lampu == 0){ $value = 1;}

    // echo $id;
    // echo "<br>";
    // echo $value_lampu;
    // echo "<br>";
    // echo $value;

    $sql = " UPDATE sensors SET value = '$value' , updated_at = '$wktu' WHERE id = '".$id."' ";
   if(mysqli_query($conn,$sql)){
    //   echo "Berhasil";
   }else{
    //   echo "gagal";
   }
}

if(isset($_GET['id_pompa'])){
    $id = $_GET['id_pompa'];
    $valus_pompa = $_GET['value'];

    if($valus_pompa == 1){ $value = 0;}
    if($valus_pompa == 0){ $value = 1;}

    // echo $id;
    // echo "<br>";
    // echo $valus_pompa;
    // echo "<br>";
    // echo $value;

    $sql = " UPDATE sensors SET value = '$value' , updated_at = '$wktu' WHERE id = '".$id."' ";
   if(mysqli_query($conn,$sql)){
    //   echo "Berhasil";
   }else{
    //   echo "gagal";
   }
}


?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-1">
                            <div class="text-s text-primary text-uppercase mb-1">
                                Kapasitas Ruang</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">50</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                            <i class="fas fa-leaf fa-3x text-gray-300"></i>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">20</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> -->
                            <i class="fas fa-tint fa-3x text-gray-300"></i>
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
                            <div class="text-s font-weight-bold text-info text-uppercase mb-1">Dokumen Keluar
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">5</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-clipboard-list fa-2x text-gray-300"></i> -->
                            <i class="far fa-sun fa-3x text-gray-300"></i>
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
                            <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fas fa-comments fa-2x text-gray-300"></i> -->
                            <i class="fas fa-temperature-high fa-3x text-gray-300"></i>
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
                            <div id="card" class="card ">
                                <button type="button" class="btn-lg btn-success">Simpan Dokumen <i class="fas fa-file-download"></i></button>
                            </div>
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

<?php include 'footer.php'; ?>
