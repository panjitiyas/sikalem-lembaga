<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pesan Keluar</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Kotak Pesan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('pesan_out') ?>">Pesan Keluar</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Daftar Pesan Keluar</h2>
      <div class="float-right">
        <!-- <a href="" data-toggle="modal" data-target="#tambahpesan" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Kirim Pesan Baru</a>
        <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
      <table class="table table-sm table-hover" id="table4">
        <thead class="thead-light">
          <tr class="text-center">
            <th width="1px">*</th>
            <th width="200px">Kepada</th>
            <th>Perihal</th>
            <th width="1px"></th>
            <th width="120px">Waktu</th>
            <th width="40px">Status</th>
            <th width="40px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          foreach ($row->result() as $key => $data) { ?>
            <tr class="<?=$data->dibaca=="N" ? "table-success" :""?>">
              <!-- <td><?= $no++ ?>.</td> -->
              <td class="text-center"><?php
                  if ($data->sifat == 1) {
                    echo '<span class="text-sm text-success"><i class="fas fa-star"></i></span>';
                  } elseif ($data->sifat == 2) {
                    echo '<span class="text-sm text-warning"><i class="fas fa-star"></i></span>';
                  } elseif ($data->sifat == 3) {
                    echo '<span class="text-sm text-danger"><i class="fas fa-star"></i></span>';
                  } else {
                    echo '<span class="text-sm text-muted"><i class="fas fa-star"></i></span>';
                  }
                  ?>
              </td>
           
              <td>
              <?php if ($data->dibaca == 'N'){?>
                <a id="detail" href="#" class="text-dark" data-toggle="modal" data-target="#modal_pesan" data-id="<?= $data->id_pesan_out ?>" data-pengirim="<?= $data->pengirim ?>" data-kepada="<?= $data->kepada ?>" data-judul="<?= $data->judul ?>" data-pesan="<?= $data->pesan ?>"><b><?=$data->kepada ?></b></a>
              <?php } else { ?>
                <a id="detail" href="#" class="text-gray" data-toggle="modal" data-target="#modal_pesan" data-id="<?= $data->id_pesan_out ?>" data-pengirim="<?= $data->pengirim ?>" data-kepada="<?= $data->kepada ?>" data-judul="<?= $data->judul ?>" data-pesan="<?= $data->pesan ?>"><?=$data->kepada ?></a>

              <?php } ?>
              </td>
              <td><span class="text-gray"><?= $data->judul ?> : <?=substr($data->pesan,0,60)?>....</span></td>
              <td>
              <?php if ($data->lampiran != null) { ?>
                  <a href="<?= base_url('uploads/pesan/' . $data->lampiran) ?>" class="text-danger"><i class="fa fa fa-paperclip"></i></a>
                
                <?php } ?>
              </td>
              
              <td class="text-center"><?= date('d F Y H:i',strtotime($data->jam)) ?></td>
              <td class="text-center">
                <div>
                  <?php if ( $data->dibaca == 'Y'){?>
                    <span class="text-primary" ><i class="far fa-eye"></i></span>
                  <?php } else { ?>
                    <span class="text-gray"><i class="fas fa-eye-slash"></i></a></span>
                  <?php } ?>
                </div>
              </td>
              <td class="text-center">                
                  <a href="#hapus" onclick="$('#hapus #formHapus').attr('action','<?= site_url('pesan_out/del_out/' . $data->id_pesan_out) ?>' )" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fas fa-trash"></i></a>     
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

<div class="modal fade" id="modal_pesan" tabindex="-1" role="dialog" aria-labelledby="modal_pesanlabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <form action="<?=site_url('pesan/proses_baca')?>" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="modal_pesanlabel"><b>Isi Pesan</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <div class="container-fluid">
            <table class="table">
              <tr>
                <td width="120px">Pengirim</td>
                <td width="1px">:</td>
                <td><span id="pengirim"></span></td>
              </tr>
              <tr>
                <td width="120px">Kepada</td>
                <td width="1px">:</td>
                <td><span id="kepada"></span></td>
              </tr>
              <tr>
                <td width="120px">Judul</td>
                <td width="1px">:</td>
                <td><span id="judul"></span></td>
              </tr>
              <tr>
                <td width="120px">Pesan</td>
                <td width="1px">:</td>
                <td><span id="pesan"></span></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
          <!-- <button type="submit" class="btn btn-primary btn-xs">Tutup</button> -->
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('click', '#detail', function() {
      var id = $(this).data('id');
      var pengirim = $(this).data('pengirim');
      var kepada = $(this).data('kepada');
      var judul = $(this).data('judul');
      var pesan = $(this).data('pesan');
      $('#id').val(id);
      $('#pengirim').text(pengirim);
      $('#kepada').text(kepada);
      $('#judul').text(judul);
      $('#pesan').text(pesan);
    })
  })
</script>
