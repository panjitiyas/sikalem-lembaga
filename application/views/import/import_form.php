<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Import Database</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Pengaturan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('import') ?>">Import Database</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="col-md-6 offset-md-3">
    <div class="card card-outline card-orange ">
      <div class="card-header">
        <h3 class="card-title">Import Data</h3>

      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
          <?php $this->view('pesan') ?>
            <a class="float-right" href="<?= base_url('_import/sample/format.xlsx') ?>">Unduh Format</a>
            <form action="<?= site_url('import/proses') ?>" method="post" enctype="multipart/form-data">
              <div class="custom-file">
                <input type="file" name="import" class="custom-file-input" id="db">
                <label for="import" class="custom-file-label"  data-browse="Telusuri">Pilih File Excel</label>
              </div>
            <br><br>
              <div class="form-group float-right">
                <button type="submit" name="import" class="btn btn-success  btn-sm" id="unggah"><span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" id="loading"></span> unggah</button><br>
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
$(document).ready(function(){
  $('#loading').hide();

})
$('#unggah').click(function() {
  $('#loading').show();
  })

</script>