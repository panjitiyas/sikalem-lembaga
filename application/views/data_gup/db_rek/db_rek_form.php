<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Database Rekening</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Database Rekening</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('db_rek') ?>">Database Rekening</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="col-md-8 offset-md-2">
    <div class="card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title"><?= ucfirst($page) ?> Database Rekening</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
          
            <?= form_open_multipart('db_rek/proses') ?>
            <?php if (validation_errors()){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6><b>Perhatian!</b></h6>
            <small>
                <?php echo validation_errors()?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </small>
            </div>
            <?php } ?>
              <div class="form-group">
                <label>Nama Rekening <span class="text-danger">*</span></label>
                <input type="hidden" name="id" value=<?= $row->id_rek ?>>
                <input type="text" name="nama_rek" class="form-control form-control-sm"  value="<?= $page=='tambah' ? set_value('nama_rek') : $row->nama_rek ?>">
              </div>
              <div class="form-group">
                <label>Instansi<span class="text-danger">*</span></label>
                <input type="text" name="instansi" value="<?= $page=='tambah'?set_value('instansi'): $row->instansi ?>" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label>Nama Bank<span class="text-danger">*</span></label>
                <input  type="text" name="nama_bank" value="<?= $page=='tambah'?set_value('nama_bank'):$row->nama_bank ?>" class="form-control form-control-sm">
              </div>
              <div class="form-group">
                <label>No. Rekening<span class="text-danger">*</span></label>
                <input type="text" name="no_rek" value="<?= $page=='tambah'?set_value('no_rek'): $row->no_rek ?>" class="form-control form-control-sm" >
              </div>
              <div class="form-group">
                <label>No. Telepon/Handphone<span class="text-danger">*</span></label>
                <input  type="text" name="no_telp" value="<?= $page=='tambah'?set_value('no_telp'): $row->no_telp ?>" class="form-control form-control-sm" >
              </div>
              </div>
                
              <div class="form-group float-right">
                <button type="submit" name="<?= $page ?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                <a href="<?= site_url('db_rek') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
              <?= form_close ()?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="modal_data" tabindex="-1" role="dialog" aria-labelledby="modal_dataLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_dataLabel">Data Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>
