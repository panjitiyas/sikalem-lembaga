<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Proses SISKA/SPP</h1>
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
            <a href="<?= site_url('proses_spp') ?>">Proses SISKA/SPP</a>
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
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
      <?php $this->load->view('pesan'); ?>
      <div class="card-body table-responsive">
        <table class="table table-hover table-sm" id="tablespp" width="100%">
          <thead class="thead-light">
            <tr class="text-center">
              <th data-priority="1">#</th>
              <th data-priority="2">Kegiatan</th>
              <th width="100px">Tgl. Mulai</th>
              <th width="100px">Tgl. Selesai</th>
              <th>Lokasi</th>
              <th>GUP</th>
              <th>Nilai SPP</th>
              <th width="100px">Operator SPP</th>
              <th data-priority="4">Status</th>
              <th width="80px" data-priority="3">Aksi</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
        <div class="row">
          <div class="col-sm-12">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="card card-outline card-navy collapsed-card">
      <div class="card-header">
        <h2 class="card-title">Data GUP</h2>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
          </button>
        </div>
      </div>
      <div class="card-body">
        <a class="text-primary float-right" id="refresh"><i class="fa fa-sync-alt"></i></a>
        <div id="gup"></div>
      </div>
    </div>
  </div>


</section>
<script>
  $(document).ready(function() {
    $('#tablespp').dataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": '<?= site_url('proses_spp/get_ajax') ?>',
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
<script>
  $(document).ready(function() {

    $('#gup').load('<?= site_url('proses_spp/totgup') ?>')

    $('#refresh').click(function() {
      $('#gup').load('<?= site_url('proses_spp/totgup') ?>')

    })

    setInterval(function() {
      $('#gup').load('<?= site_url('proses_spp/totgup') ?>')
    }, 60000)


  })
</script>