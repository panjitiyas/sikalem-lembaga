<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kode Anggaran</h1>
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
            <a href="<?= site_url('dipa') ?>">Kode Anggaran</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Data Kode Anggaran</h2>
      <div class="float-right">
        <a href="<?= site_url('dipa/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></a>
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">

    </div>
  </div>
</section>


<script>
  $(document).ready(function() {
    $('#tablePagu').dataTable({
      "bAutoWidth": false,
      "responsive": true,
      
      
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [

        {
          'targets': [0, 1, 3, 5,  7,9,  11],
          'className': "text-center",
        },
        {
          'targets': [0,1, 2, 3, 4, 5, 6,7, 8, 9, 10, 11 ],
          'orderable': false,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
    })
  })
</script>