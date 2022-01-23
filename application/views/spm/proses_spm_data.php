<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Proses SPM</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Pengajuan Keuangan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('proses_spm') ?>">Proses SPM</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-outline card-navy">
      <div class="card-header">
        <h2 class="card-title">Data Kegiatan</h2>
      </div>
      <?php $this->load->view('pesan'); ?>
      <div class="card-body table-responsive">
        <table class="table  table-hover table-sm" id="tablespm" width="100%">
          <thead class="thead-light">
            <tr class="text-center">
              <th data-priority="1">#</th>
              <th data-priority="2">Kegiatan</th>
              <th width="100px">Tgl. Mulai</th>
              <th>No. SPP</th>
              <th width="100px">Tgl. SPP</th>
              <th>Nilai SPP</th>
              <th width="100px">Operator SPP</th>
              <th width="100px">Operator SPM</th>
              <th data-priority="4">Status</th>
              <th data-priority="3">Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</section>

<script>
  $(document).ready(function() {
    $('#tablespm').dataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": '<?= site_url('proses_spm/get_ajax') ?>',
        "type": 'POST'
      },
      responsive: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [

        {
          'targets': [0, 2, 3, 4, 5, 6, 7, 8, 9],
          'className': "text-center",
        },
        {
          'targets': [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
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