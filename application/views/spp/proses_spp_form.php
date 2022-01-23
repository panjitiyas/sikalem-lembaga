<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pengajuan Keuangan</h1>
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
  <div class="col-md-8 offset-md-2">
    <div class="card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title">Proses SISKA/SPP</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= site_url('proses_spp/proses') ?>" method="post">
              <fieldset disabled>
                <div class="form-group">
                  <label>Kegiatan</label>
                  <textarea name="nm_keg" class="form-control form-control-sm"><?= $row->nm_keg ?></textarea>
                </div>
                <div class="row">
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Tgl. Mulai Kegiatan</label>
                      <input type="text" name="tgl_mulai" class="form-control form-control-sm tanggal" value="<?= tanggal_indonesia($row->tgl_mulai) ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Tgl. Selesai Kegiatan</label>
                      <input type="text" name="tgl_selesai" value="<?= tanggal_indonesia($row->tgl_selesai) ?>" class="form-control form-control-sm tanggal">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>PUMK</label>
                      <input type="text" name="nm_pumk" class="form-control form-control-sm" value="<?= $row->nm_pumk ?>">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>Nilai</label><small> (dalam rupiah)</small>
                      <input type="text" name="nilai" value="<?= number_format($row->nilai, 0, ',', '.'); ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Output</label>
                      <input type="text" name="output" value="<?= $row->output ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div>
                      <label>Sub-Output</label>
                      <input type="text" name="sub_output" value="<?= $row->sub_output ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Komponen</label>
                      <input type="text" name="komponen" value="<?= $row->komponen ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>SKomp</label>
                      <input type="text" name="sub_komp" value="<?= $row->sub_komp ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Akun</label>
                      <input type="text" name="akun_mak" value="<?= $row->akun_mak ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>LS/GUP</label>
                      <input type="text" name="sis_bayar" class="form-control form-control-sm" value="<?= $row->sis_bayar ?>">
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>No. SPP</label>
                    <input type="hidden" name="id" value=<?= $row->id_spp ?>>
                    <input type="text" name="no_spp" value="<?= $row->no_spp ?>" class="form-control form-control-sm">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Tgl. SPP</label>
                    <input type="text" name="tgl_spp" value="<?= $row->tgl_spp!==null ? date('d-m-Y', strtotime($row->tgl_spp)) : "" ?>" class="form-control form-control-sm tanggal">
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Nilai SPP<small><i> (dalam rupiah)</i></small></label>
                    <input type="text" name="nilai_spp" value="<?=$row->nilai_spp?>" class="form-control form-control-sm uang" required>
                    <small><i> masukkan nilai 0 jika dikosongkan</i></small>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label>Operator</label>
                    <select name="operator" class="form-control form-control-sm">
                      <option value="">-Pilih-</option>
                      <?php foreach ($spp->result() as $key => $data) { ?>
                        <option class="text-center" value="<?= $data->nm_spp ?>" <?= $data->nm_spp == $row->sppid ? "selected" : null ?>><?= $data->nm_spp ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>

              </div>
              <div class="row">
                <div class="col-sm-2">
                  <div class="form-group">
                    <label>Arsip GUP</label>
                    <select name="arsip_gup" class="form-control form-control-sm">
                      <option value="">-Pilih-</option>
                      <?php for ($i = 1; $i <= 30; $i++) { ?>
                        <option value="<?php echo $i; ?>" <?php echo $i == $row->arsip_gup ? 'Selected' : null ?>><?php echo $i; ?></option>
                      <?php
                      } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group float-right">
                <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                <a href="<?= site_url('proses_spp') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>