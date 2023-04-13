<?php include 'header.php'; ?>
<link rel="stylesheet" type="text/css" href="ok.css">
<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Silahkan Menunggu Proses Dokumen</h1>
</div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<!-- DataTales Example -->

<div class="loader3">Loading..</div>
 
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>
<div class="row mb-5"></div>

<?php include 'footer.php'; ?>

<script>
    setInterval( () => {
   window.location.href = 'tutup.php';
}, 15000);
</script>