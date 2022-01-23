<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Arsip</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Arsip</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('dok') ?>">Dokumen Kelengkapan</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Arsip Dokumen Kelengkapan</h2>
      <div class="float-right">
        <a href="<?= site_url('dok/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
      <table class="table  table-striped table-sm" id="table1">
        <thead class="thead-light">
          <tr class="text-center">
            <th>#</th>
            <th>Substansi</th>
            <th>Kegiatan</th>
            <th>Tgl. Mulai</th>
            <th>Tgl. Selesai</th>
            <th>Lampiran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td class="text-center" style="width:5%"><?= $no++ ?>.</td>
              <td class="text-center"><?= $data->substansi ?></td>
              <td class="text-center"><?= $data->nama_keg ?></td>
              <td class="text-center"><?= tanggal_indonesia($data->tgl_mulai) ?></td>
              <td class="text-center"><?= tanggal_indonesia($data->tgl_selesai) ?></td>
              <td class="text-center" width="120px">
                <div class="btn-group btn-group-sm">
                  <?php if ($data->lamp_1 != null) { ?>
                    <a href="<?= base_url('uploads/dok/' . $data->lamp_1) ?>" class="btn btn-danger btn-xs"><i class="fa fas fa-download"></i></a>
                  <?php } else { ?>
                    <a href=# class="btn btn-secondary btn-xs disabled"><i class="fa fas fa-download"></i></a>
                  <?php } ?>
                  <?php if ($data->lamp_2 != null) { ?>
                    <a href="<?= base_url('uploads/dok/' . $data->lamp_2) ?>" class="btn btn-warning btn-xs"><i class="fa fas fa-download"></i></a>
                  <?php } else { ?>
                    <a href=# class="btn btn-secondary btn-xs disabled"><i class="fa fas fa-download"></i></a>
                  <?php } ?>
                  <?php if ($data->lamp_3 != null) { ?>
                    <a href="<?= base_url('uploads/dok/' . $data->lamp_3) ?>" class="btn btn-success btn-xs"><i class="fa fas fa-download"></i></a>
                  <?php } else { ?>
                    <a href=# class="btn btn-secondary btn-xs disabled"><i class="fa fas fa-download"></i></a>
                  <?php } ?>
                </div>
              </td>
              <td class="text-center" width="80px">
                <div class="btn-group btn-group-sm">
                  <a href="<?= site_url('dok/ubah/' . $data->id_dok) ?>" class="btn btn-info btn-rounded btn-xs"><i class="fas fa-pencil-alt"></i></a>
                  <!-- <a href="<?= site_url('dok/del/' . $data->id_dok) ?>" onclick="return confirm('Apakah anda yakin data ini akan dihapus?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a> -->
                  <a href="#hapus" onclick="$('#hapus #formHapus').attr('action','<?= site_url('dok/del/' . $data->id_dok) ?>' )" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>

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