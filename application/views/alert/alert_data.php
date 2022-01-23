<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Info Alert</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Info Alert</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('pesan_out') ?>">Info Alert</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Data Info Alert</h2>
      <div class="float-right">
      <a href="<?= site_url('alert/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Tambah Alert</a>
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
      <table class="table table-sm table-hover" id="table4">
        <thead class="thead-light">
          <tr class="text-center">
            <th width="1px">*</th>
            <th width="100px">Judul</th>
            <th width="200px">Isi</th>
            <th width="80px">Warna</th>
            <th width="80px">Jenis</th>
            <th width="40px">Status</th>
            <th width="40px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?>.</td>
              <td class="text-center"><span><?=$data->judul_alert?></span></td>
              <td class="text-center"><span><?=$data->isi_alert?></span></td>
              <td class="text-center">
              <span ><?php
              if($data->warna_alert=="alert-danger"){
                echo "Merah";
              } elseif ($data->warna_alert=="alert-warning"){
                echo "Kuning";
              } elseif ($data->warna_alert=="alert-success"){
                echo "Hijau";
              } else {
                echo "Biru";
              }?></span></td>
              <td class="text-center"><span ><?php
              if($data->jenis==1) {
                echo "Alert";
              } else {
                echo "Running Text";
              }
              ?></span></td>
              <td class="text-center"><span ><?php
              if($data->status_alert==1) {
                echo "Aktif";
              } else {
                echo "Non-Aktif";
              }
              ?></span></td>
              <td class="text-center">
              <div class="btn-group">
                  <a href="<?= site_url('alert/update/' . $data->id_alert)?>" class="btn btn-info btn-sm"><i class="fas fa-pencil-alt"></i></a>                     
                  <a href="#hapus" onclick="$('#hapus #formHapus').attr('action','<?= site_url('alert/del/' . $data->id_alert) ?>' )" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>     
                  <?php if ($data->status_alert==1){?>
                    <a href="<?= site_url('alert/nonaktif/' . $data->id_alert)?>" class="btn btn-success btn-sm"><i class="fas fa-power-off"></i></a>
                  <?php } else {?>
                    <a href="<?= site_url('alert/aktif/' . $data->id_alert)?>" class="btn btn-secondary btn-sm"><i class="fas fa-power-off"></i></a>                     
                   <?php } ?> 
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



