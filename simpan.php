<?php include 'header.php'; ?>

<?php
date_default_timezone_set('Asia/Jakarta');

if(isset($_POST['simpan'])){
   $wktu = date('Y-m-d  H:i:s');
   $sender = $_POST['sender'];
   $no_tlp = $_POST['no_tlp'];
   $recipient = $_POST['recipient'];
   $jenis = $_POST['jenis'];
   $email = $_POST['email'];
  //  $room = 5;
    $status = 1;
   $token = bin2hex(random_bytes(3));


   $ceks = query("SELECT * FROM docu limit 1");
   foreach ($ceks as $cekstatus) {
    // echo $cekstatus['status'];
    $room = $cekstatus['room'];
   }


   $sql = " UPDATE docu SET sender = '".$sender."',
   no_tlp = '".$no_tlp."',
   recipient = '".$recipient."',
   token = '".$token."',
   email = '".$email."',
   status = '".$status."',
   updated_at = '".$wktu."'  WHERE room = '".$room."' ";
   

    if(mysqli_query($conn,$sql)){
      echo '
      <div class="alert alert-warning" role="alert">
      Data Berhasil di Ubah!
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
    <h1 class="h3 mb-0 text-gray-800">Simpan Dokumen</h1>
</div>
<div class="row mb-5"></div>
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Informasi Penerima Dokumen</h6>
    </div>
    <div class="card-body form">
      <form action="prosessimpan.php" method="post" role="form">
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Nama Pengirim <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="sender" placeholder="Nama Penerima" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">No Handphone <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="no_tlp" placeholder="No Handphone" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Nama Penerima <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="recipient" placeholder="Nama Penerima" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Jenis Dokumen <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="jenis" placeholder="Jenis Dokumen" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Email Pengirim <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="email" placeholder="Email" value=""></div>
          </div>
        </div>
        <div class="form-group">
            <div class="row">
              <label class="col-sm-3 control-label text-right">Chat Id Telegram <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="chat_id" placeholder="Chat Id" value=""></div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-user btn-block" name="simpan" >Simpan</button>
      </form>
    </div>
</div>
<!-- /.container-fluid -->

<div class="row mb-5"></div>
<div class="row mb-5"></div>

<?php include 'footer.php'; ?>
