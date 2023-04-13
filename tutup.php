<?php include 'header.php'; ?>

<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['caritoken'])){
    print_r($_POST['token']);
//    $name = $_POST['name'];
//    $description = $_POST['description'];
//    $api_key = $_POST['api_key'];
//    $status = "Baik";
//    $value = 39.90;
//    $wktu = date('Y-m-d  H:i:s');

//     //query
//     $sql = "INSERT INTO plants (name, description, api_key, value, status, created_at) VALUES ('$name','$description','$api_key','$value','$status','$wktu') ";

//     if(mysqli_query($conn,$sql)){
//         echo '
//             <div class="alert alert-success" role="alert">
//                 Data Tanaman Berhasil di Tambah!
//             </div>
//         ';
//     }else{
//         echo "ERROR, tidak berhasil". mysqli_error($conn);
//     }
}
?>

<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengambilan Dokumen</h1>
</div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Silahkan Ambil Dokumen Mohon Periksa Kembali</h6>
    </div>
    <div class="card-body form">
      <form action="index.php" method="post" role="form">
        
        <button type="submit" class="btn btn-primary btn-user btn-block" name="caritoken" value="add">Selesai Transaksi</button>
      </form>
    </div>
</div>
<!-- /.container-fluid -->

<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>

<?php include 'footer.php'; ?>
