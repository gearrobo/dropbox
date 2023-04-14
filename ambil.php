<?php include 'header.php'; ?>

<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['caritoken'])){
    $wktu = date('Y-m-d  H:i:s');
    print_r($_POST['token']);
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
        <h6 class="m-0 font-weight-bold text-primary">Informasi Dokumen</h6>
    </div>
    <div class="card-body form">
      <form action="tesUsb.php" method="post" role="form">
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Token <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="token" placeholder="Token" value=""></div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block" name="caritoken" value="add">Ambil</button>
      </form>
    </div>
</div>
<!-- /.container-fluid -->

<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>

<?php include 'footer.php'; ?>
