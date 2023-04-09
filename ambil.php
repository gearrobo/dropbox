<?php include 'header.php'; ?>

<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['addplant'])){
   $name = $_POST['name'];
   $description = $_POST['description'];
   $api_key = $_POST['api_key'];
   $status = "Baik";
   $value = 39.90;
   $wktu = date('Y-m-d  H:i:s');

    //query
    $sql = "INSERT INTO plants (name, description, api_key, value, status, created_at) VALUES ('$name','$description','$api_key','$value','$status','$wktu') ";

    if(mysqli_query($conn,$sql)){
        echo '
            <div class="alert alert-success" role="alert">
                Data Tanaman Berhasil di Tambah!
            </div>
        ';
    }else{
        echo "ERROR, tidak berhasil". mysqli_error($conn);
    }
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
      <form action="" method="post" role="form">
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Name <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="name" placeholder="Nama Penerima" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">NIP <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="nip" placeholder="No Induk Pegawai" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Token <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="token" placeholder="Token" value=""></div>
          </div>
        </div>

        <button type="submit" class="btn btn-primary btn-user btn-block" name="addplant" value="add">Simpan</button>
      </form>
    </div>
</div>
<!-- /.container-fluid -->

<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>

<?php include 'footer.php'; ?>

<script type="text/javascript">
function alertmsg(){
    alert("You pressed the keyboard inside the document!")
}
document.onkeypress=alertmsg
</script>