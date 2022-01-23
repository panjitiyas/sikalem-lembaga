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
            <a href="<?= site_url('dok') ?>">Arsip Dokumen Keuangan</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="col-md-8 offset-md-2">
    <div class="card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title"><?= ucfirst($page) ?> Arsip Dokumen Keuangan</h3>
      </div>
      <?php $this->load->view('pesan'); ?>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <?= form_open_multipart('dok/proses') ?>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-6">
                  <label>Kegiatan*</label>
                </div>
                <div class="col-sm-6">
                <a href="" class="text-primary float-right" data-toggle="modal" data-target="#modal_data"><i class="fa fa-search"></i></a>
                </div>
              </div>
              
              <textarea name="nama_keg" class="form-control form-control-sm" id="keg" required><?= $row->nama_keg ?></textarea>
            </div>
            <div class="form-group">
            <input type="hidden" name="id" value=<?=$row->id_dok?>>
              <label>Kel. Substansi*</label>
              <select name="substansi" class="form-control form-control-sm" id="subs_opt" required>
                <option class="text-center" value="">- Pilih -</option>
                <?php foreach ($nm_ksubs->result() as $key => $data) { ?>
                  <option class="text-center" value="<?= $data->nm_ksub ?>" <?= $data->nm_ksub == $row->substansi ? "selected" : null ?>><?= $data->nm_ksub ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tgl. Mulai</label>
                  <input type="text" name="tgl_mulai" value="<?= $row->tgl_mulai ?>" class="form-control form-control-sm tanggal" id="mulai">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tgl. Selesai</label>
                  <input type="text" name="tgl_selesai" value="<?= $row->tgl_selesai ?>" class="form-control form-control-sm tanggal" id="selesai">
                </div>
              </div>
            </div>
            <br>
            <hr>
            <hr>
            <br>

            <!-- input file-lamp_1 -->
            <div class="form-group">
              
              <?php if ($page == 'ubah') {
                if ($row->lamp_1 != null) { ?>
                  <a class="text-success" href="<?= base_url('uploads/dok/' . $row->lamp_1) ?>"><b>Lampiran Undangan</b> <i class="fas fa-check"></i><small> (<?=$row->lamp_1?>)</small></a>
                <?php } else { ?>
                  <label>Lampiran Undangan</label>
                <?php } ?>
              <?php } else { ?>
                <label>Lampiran Undangan</label>
              <?php } ?>
              <div class="custom-file">
                <input type="file" class="custom-file-input form-control-sm" name="lamp_1" id="customFile1">
                <label class="custom-file-label" for="customFile1" data-browse="Telusuri">Pilih Berkas</label>
                <br><small> *biarkan kosong jika tidak <?= $page == 'ubah' ? 'diganti / tidak ada perubahan' : 'ada lampiran' ?></small>
              </div>
            </div>
            <div class="form-group">
            <?php if ($page == 'ubah') {
                if ($row->lamp_2 != null) { ?>
                  <a class="text-success" href="<?= base_url('uploads/dok/' . $row->lamp_2) ?>"><b>Lampiran SK</b> <i class="fas fa-check"></i><small> (<?=$row->lamp_2?>)</small></a>
                <?php } else { ?>
                  <label>Lampiran SK</label>
                <?php } ?>
              <?php } else { ?>
                <label>Lampiran SK</label>
              <?php } ?>

              <div class="custom-file">
                <input type="file" class="custom-file-input form-control-sm" name="lamp_2" id="customFile2">
                <label class="custom-file-label" for="customFile2" data-browse="Telusuri">Pilih Berkas</label>
                <br><small> *biarkan kosong jika tidak <?= $page == 'ubah' ? 'diganti / tidak ada perubahan' : 'ada lampiran' ?></small>
              </div>
            </div>
            <div class="form-group">
            <?php if ($page == 'ubah') {
                if ($row->lamp_3 != null) { ?>
                  <a class="text-success" href="<?= base_url('uploads/dok/' . $row->lamp_3) ?>"><b>Lampiran Surat Tugas</b> <i class="fas fa-check"></i><small> (<?=$row->lamp_3?>)</small></a>
                <?php } else { ?>
                  <label>Lampiran Surat Tugas</label>
                <?php } ?>
              <?php } else { ?>
                <label>Lampiran Surat Tugas</label>
              <?php } ?>

              <div class="custom-file">
                <input type="file" class="custom-file-input form-control-sm" name="lamp_3" id="customFile3">
                <label class="custom-file-label" for="customFile3" data-browse="Telusuri">Pilih Berkas</label>
                <br><small> *biarkan kosong jika tidak <?= $page == 'ubah' ? 'diganti / tidak ada perubahan' : 'ada lampiran' ?></small>
              </div>
            </div>



            <div class="form-group float-right">
              <button type="submit" name="<?= $page ?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
              <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
              <a href="<?= site_url('dok') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
            </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="modal_data" tabindex="-1" role="dialog" aria-labelledby="modal_dataLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_dataLabel">Data Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-bordered table-striped table-sm" id="table1">
          <thead>
          <tr class="text-center">
            <th>Substansi</th>
            <th>Kegiatan</th>
            <th>Tgl. Mulai</th>
            <th>Tgl. Selesai</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($dt_tu->result() as $key => $data) { ?>
          <tr class="text-sm">
            <td class="text-center"><b><?=$data->k_subs?></b></td>
            <td><?=$data->nm_keg?></td>
            <td class="text-center"><?=tanggal_indonesia($data->tgl_mulai)?></td>
            <td class="text-center"><?=tanggal_indonesia($data->tgl_selesai)?></td>
            <td class="text-center">
              <button class="btn btn-xs btn-primary" id="pilih" 
              data-keg="<?=$data->nm_keg?>"
              data-subs_opt="<?=$data->k_subs?>"
              data-mulai="<?=$data->tgl_mulai?>"
              data-selesai="<?=$data->tgl_selesai?>">
              <i class="fas fa-check"></i>
               </button>
            </td>
          </tr>
        <?php } ?>
        </tbody>
        </table>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $(document).on('click', '#pilih',function(){
      var nm_keg      = $(this).data('keg');
      var k_subs      = $(this).data('subs_opt');
      var tgl_mulai   = $(this).data('mulai');
      var tgl_selesai = $(this).data('selesai');
      $('#keg').val(nm_keg);
      $('#subs_opt').val(k_subs);
      $('#mulai').val(tgl_mulai);
      $('#selesai').val(tgl_selesai);
      $('#modal_data').modal('hide');
    })
  })
</script>