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
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
      <table class="table table-hover table-sm" id="tablePagu">
        <thead class="thead-light">
          <tr class="text-center">
            <th data-priority="1">#</th>
            <th data-priority="2" >Kode Program</th>
            <th data-priority="3">Nama Program</th>
            <th data-priority="4">Kode Kegiatan</th>
            <th data-priority="5">Nama Kegiatan</th>
            <th data-priority="6">Kode KRO</th>
            <th data-priority="7">Nama KRO</th>
            <th data-priority="8">Kode RO</th>
            <th data-priority="9">Nama RO</th>
            <th data-priority="11">Kode Komponen</th>
            <th data-priority="12">Nama Komponen</th>
            <th>Kode Subkomponen</th>
            <th>Nama Subkomponen</th>
            <th data-priority="10">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td class="text-center"><?= $no++ ?>.</td>
              <td class="text-center"><?= $data->kd_program ?></td>
              <td ><?= $data->nm_program ?></td>
              <td class="text-center"><?= $data->kd_giat ?></td>
              <td ><?= $data->nm_giat ?></td>
              <td class="text-center"><?= $data->kd_kro ?></td>
              <td ><?= $data->nm_kro ?></td>
              <td class="text-center"><?= $data->kd_ro ?></td>
              <td ><?= $data->nm_ro ?></td>
              <td class="text-center"><?= $data->kd_komp ?></td>
              <td ><?= $data->nm_komp ?></td>
              <td class="text-center"><?= $data->kd_skomp ?></td>
              <td ><?= $data->nm_skomp?></td>
              <td class="text-center" width="100px">
                <div class="btn-group btn-group-xs">
                <a href="<?= site_url('dipa/ubah/' . $data->id_pagu) ?>" class="btn btn-info btn-rounded btn-xs"><i class="fas fa-pencil-alt"></i></a>
                <!-- <a href="<?= site_url('dipa/del/' . $data->id_pagu) ?>" onclick="return confirm('Apakah anda yakin data ini akan dihapus?')" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a> -->
                <a href="#hapus" onclick="$('#hapus #formHapus').attr('action','<?= site_url('dipa/del/' . $data->id_pagu) ?>' )" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>
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