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
            <a href="<?= site_url('db_rek') ?>">Data Rekening</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Data Rekening</h2>

      <div class="float-right">
      <a type="button" href="<?= site_url('db_rek/export_excel') ?>" role="button" class="btn-sm btn-success"><i class="fas fa-download"></i> Unduh Excel</a>
        <a href="<?= site_url('db_rek/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
        <a type="button" href="<?= site_url('db_rek/impor') ?>" role="button" class="btn-sm btn-primary"><i class="fas fa-upload"></i> Impor Database</a>
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm table-hover" width="100%" id="tabletu">
          <thead class="thead-light">
            <tr class="text-center">
              <th data-priority="1">#</th>
              <th width="200px" data-priority="2">Nama</th>
              <th width="200px" data-priority="3">Instansi</th>
              <th width="150px" data-priority="4">Nama Bank</th>
              <th width="200px" data-priority="5">No. Rekening</th>
              <th width="200px" data-priority="6">No. Handphone</th>
              <th width="150px" data-priority="7">Aksi</th>
              
            </tr>
          </thead>
        </table>
      </div>
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
<script>
  $(document).ready(function() {
    $('#tabletu').dataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": '<?= site_url('db_rek/get_ajax') ?>',
        "type": 'POST'
      },
      responsive: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [
        {
          'targets': [0, 3,4,5,6],
          'className': "text-center",
        },
        {
          'targets': [0, 4, 5,6],
          'orderable': false,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
      "order": []
    })
  })
</script>