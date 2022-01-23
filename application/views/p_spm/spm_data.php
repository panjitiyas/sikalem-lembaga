<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Operator SPM</h1>
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
            <a href="<?= site_url('spm') ?>">Operator SPM</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Data Operator</h2>
      <div class="float-right">
        <a href="<?= site_url('spm/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
      <table class="table table-bordered table-striped table-sm" id="table1">
        <thead class="thead-light">
          <tr class="text-center">
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?>.</td>
              <td class="text-center"><?= $data->nm_spm ?></td>
              <td class="text-center"><?= $data->email_spm ?></td>
              <td class="text-center" width="100px">
                <div class="btn-group-xs btn-group">
                <a href="<?= site_url('spm/ubah/' . $data->spmid) ?>" class="btn btn-info btn-rounded btn-xs"><i class="fas fa-pencil-alt"></i></a>
                <!-- <a href="<?= site_url('spm/del/' . $data->spmid) ?>" onclick="return confirm('Apakah anda yakin data ini akan dihapus?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a> -->
                <a href="#hapus" onclick="" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
                </div>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="hapusLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah yakin data ini akan dihapus?
      </div>
      <div class="modal-footer">
        <form id="formHapus" action="" method="post">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Iya</button>
        </form>
      </div>
    </div>
  </div>
</div>