<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengajuan Kegiatan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Pengajuan Kegiatan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('proses_tu') ?>">Pengajuan Baru</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
    <?php if ($this->fungsi->user_login()->level==1 || ($this->fungsi->user_login()->level==2)):?>
      <h2 class="card-title">Data Kegiatan Direktorat Kelembagaan</h2>
    <?php else : ?>
      <h2 class="card-title">Data Kegiatan <?=$this->fungsi->user_login()->subs?></h2>
      <?php endif ?>
      <div class="float-right">
        <a href="<?= site_url('proses_tu/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-plus-circle"></i> Tambah Data</a>
        <!-- <a href="#" data-toggle="modal" data-target="#tambah" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body">
       <div class="table-responsive">
        <table class="table table-sm table-hover text-sm" id="tabletu" style="width: 100%;">
          <thead class="bg-navy">
            <tr class="text-center">
              <th style="width: 8px" data-priority="1">#</th>
              <th style="width: 60px" data-priority="10006">Pengajuan</th>
              <!-- <th width="80px" data-priority="10001">Kel. Substansi</th> -->
              <th style="width: 280px" data-priority="2">Kegiatan</th>
              <th style="width: 60px" data-priority="6"> Tgl. Kegiatan</th>
              <!-- <th width="100px" data-priority="7">Tgl. Selesai</th> -->
              <th style="width: 120px" data-priority="7">Lokasi</th>
              <th style="width: 70px" data-priority="8">BPP</th>
              <th style="width: 150px" data-priority="4">Rev. BPP</th>
              <th style="width: 30px"data-priority="3">Status</th>
              <th style="width: 40px" data-priority="5">Aksi</th>
              
            </tr>
          </thead>
        </table>
      </div>

    </div>
  </div>
</section>


<!-- Modal -->

 

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
        "url": '<?= site_url('proses_tu/get_ajax') ?>',
        "type": 'POST'
      },
      bAutowidth: false,
      responsive: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [
         
        {
          'targets': [1, 3, 4, 5,  7, 8],
          'className': "text-center",
        },
        {
          'targets': [0, 2,4, 5, 6, 7, 8],
          'orderable': false,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
      "order": [],
      
    })
  })
</script>