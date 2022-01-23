<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengguna</h1>
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
            <a href="<?= site_url('user') ?>">Pengguna</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h3 class="card-title">Data Pengguna</h3>
      <div class="float-right">
        <a href="<?= site_url('user/tambah') ?>" class="btn btn-warning btn-sm"><i class="fa fa-user-plus"></i> Tambah</a>
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
      <table class="table table-striped table-sm" id="tableuser">
        <thead class="thead-light">
          <tr class="text-center">
            <th>#</td>
            <th>Nama</td>
            <th>Username</td>
            <th>Level</td>
            <th>Aksi</td>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr>
              <td><li></li></td>
              <td><?= $data->nama ?></td>
              <td><?= $data->username ?></td>
              <td><?php
                  $level = $data->level;
                  if ($level == 1) {
                    echo "Super Admin";
                  } elseif ($level == 2) {
                    echo "Admin";
                  } elseif ($level == 3) {
                    echo "Operator SPM";
                  } elseif ($level == 4) {
                    echo "Operator SPP";
                  } elseif ($level == 5) {
                    echo "PUMK";
                  } elseif ($level == 6) {
                    echo "Admin BPP";
                  } else {
                    echo "Admin Substansi";
                  }
                  ?>
              </td>
              <td class="text-centered" width="100px">
                <div class="btn-group btn-group-xs">
                  <a href="<?= site_url('user/ubah/' . $data->user_id) ?>" class="btn btn-info btn-xs"><i class="fas fa-pencil-alt"></i></a>
                  <!-- <input type="hidden" name="user_id" value="<?= $data->user_id ?>"> -->
                  <!-- <button onclick="return confirm('Apakah anda yakin data ini akan dihapus?')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button> -->
                  <a href="#hapus" onclick="$('#hapus #formHapus').attr('action','<?= site_url('user/del/'. $data->user_id) ?>' )" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
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
    $('#tableuser').dataTable({
      "bAutoWidth": false,

      "responsive": true,

      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [

        {
          'targets': [0, 2, 3,4],
          'className': "text-center",
        },
        {
          'targets': [0,1, 2,4 ],
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