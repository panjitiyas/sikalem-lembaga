<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Manifest Tiket</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Informasi</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('manifest_tiket') ?>">Manifest Tiket</a>
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
        <h3 class="card-title"><?= ucfirst($page) ?> Daftar Manifest Tiket</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <?= form_open_multipart('manifest_tiket/proses') ?>
            <?php if (validation_errors()) { ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h6><b>Perhatian!</b></h6>
                <small>
                  <?php echo validation_errors() ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </small>
              </div>
            <?php } ?>
            <div class="form-group text-sm">
              <label>Nama Kegiatan </label>
              <a href="" class="float-right text-primary" data-target="#giat" data-toggle="modal"><i class="fas fa-search"></i></a>
              <input type="hidden" name="id" value=<?= $row->id_manifest ?>>
              <textarea id="urgiat" rows="2" class="form-control form-control-sm text-sm" name="nmgiat"><?= $page == 'tambah' ? set_value('nmgiat') : $row->nmgiat ?></textarea>
              <input type="hidden" name="direktorat" value="Direktorat Kelembagaan" class="form-control form-control-sm text-sm">
            </div>
            <div class="form-group text-sm">
              <label>SPM</label>
              <input type="text" name="spm" value="<?= $page == 'tambah' ? set_value('spm') : $row->spm ?>" class="form-control form-control-sm text-sm">
            </div>
            <div class="form-group text-sm">
              <label>Nama</label>
              <input type="text" name="nmorang" value="<?= $page == 'tambah' ? set_value('nmorang') : $row->nmorang ?>" class="form-control form-control-sm text-sm">
            </div>
            <div class="form-group text-sm">
              <label>Maskapai Penerbangan</label>
              <select name="maskapai" class="form-control form-control-sm text-sm">
                <option value="">-pilih-</option>
                <option value="Garuda Indonesia" <?= $row->maskapai == "Garuda Indonesia" ? 'selected' : "" ?>>Garuda Indonesia</option>
                <option value="Batik Air" <?= $row->maskapai == "Batik Air" ? 'selected' : "" ?>>Batik Air</option>
                <option value="Sriwijaya Air" <?= $row->maskapai == "Sriwijaya Air" ? 'selected' : "" ?>>Sriwijaya Air</option>
                <option value="Nam Air" <?= $row->maskapai == "Nam Air" ? 'selected' : "" ?>>Nam Air</option>
                <option value="Lion Air" <?= $row->maskapai == "Lion Air" ? 'selected' : "" ?>>Lion Air</option>
                <option value="Wings Air" <?= $row->maskapai == "Wings Air" ? 'selected' : "" ?>>Wings Air</option>
                <option value="Citilink" <?= $row->maskapai == "Citilink" ? 'selected' : "" ?>>Citilink</option>
                <option value="Air Asia" <?= $row->maskapai == "Air Asia" ? 'selected' : "" ?>>Air Asia</option>
                <option value="Susi Air" <?= $row->maskapai == "Susi Air" ? 'selected' : "" ?>>Susi Air</option>
              </select>
            </div>
            <div class="form-row">
              <div class="col text-sm">
                <label>No. Invoice</label>
                <input type="text" name="noinvoice" value="<?= $page == 'tambah' ? set_value('noinvoice') : $row->noinvoice ?>" class="form-control form-control-sm text-sm">
              </div>
              <div class="col text-sm">
                <label>No. Penerbangan</label>
                <input type="text" name="noterbang" value="<?= $page == 'tambah' ? set_value('noterbang') : $row->noterbang ?>" class="form-control form-control-sm text-sm">
              </div>
              <div class="col text-sm">
                <label>No. Tiket</label>
                <input type="text" name="notiket" value="<?= $page == 'tambah' ? set_value('notiket') : $row->notiket ?>" class="form-control form-control-sm text-sm">
              </div>
              <div class="col text-sm">
                <label>Kode Booking</label>
                <input type="text" name="kdbook" value="<?= $page == 'tambah' ? set_value('kdbook') : $row->kdbook ?>" class="form-control form-control-sm text-sm">
              </div>
            </div>
            <div class="form-group text-sm">
              <label>Tgl. Berangkat dan Tujuan</label>
              <textarea rows="3" name="tglbrkttujuan" class="form-control form-control-sm text-sm"><?= $page == 'tambah' ? set_value('tglbrkttujuan') : $row->tglbrkttujuan ?></textarea>
            </div>
            <div class="form-row">
              <div class="col text-sm">
                <label>Harga Tiket (Basic Fare)</label>
                <input type="text" name="tiketdasar" value="<?= $page == 'tambah' ? set_value('tiketdasar') : $row->tiketdasar ?>" class="form-control form-control-sm text-sm uang">
              </div>
              <div class="col text-sm">
                <label>Harga Tiket (Total)</label>
                <input type="text" name="tikettotal" value="<?= $page == 'tambah' ? set_value('tikettotal') : $row->tikettotal ?>" class="form-control form-control-sm text-sm uang">
              </div>
            </div>
            <div class="form-group text-sm">
              <label>Keterangan</label>
              <textarea rows="5" type="text" name="ket" class="form-control form-control-sm text-sm"><?= $page == 'tambah' ? set_value('ket') : $row->ket ?></textarea>
            </div>
          </div>
          <div class="form-group float-right">
            <button type="submit" name="<?= $page ?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
            <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
            <a href="<?= site_url('manifest_tiket') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="giat" tabindex="-1" aria-labelledby="giatLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="giatLabel">Daftar Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover display compact table-sm text-sm" style="width:100%" id="tablegiat">
          <thead class="bg-info">
            <tr class="text-center">
              <th width="5%" data-priority="1">#</th>
              <th width="30%" data-priority="2">Kegiatan</th>
              <th width="15%" data-priority="3">Substansi</th>
              <th width="25%" data-priority="4">Tgl. Kegiatan</th>
              <th width="15%" data-priority="5">Lokasi</th>
              <th width="10%" data-priority="6">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($keg->result() as $key => $data) : ?>
              <tr>
                <td class="text-center"><?= $no++ ?>.</td>
                <td><?= $data->nm_keg ?></td>
                <td class="text-center"><?= $data->k_subs ?></td>
                <td class="text-center">
                    <?php
                    if ($data->tgl_selesai == $data->tgl_mulai){
                    $row[] = tanggal_indonesia($data->tgl_mulai);
                    } else {
                    if (date('M',strtotime($data->tgl_mulai))==date('M',strtotime($data->tgl_selesai))){
                    $row[] = tanggal($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                    } else {
                    $row[] = tgbulan($data->tgl_mulai)." s.d ".tanggal_indonesia($data->tgl_selesai);
                    }
                    }?>
                </td>
                <td class="text-center"><?= $data->lokasi ?></td>>
                <td class="text-center">
                  <a href=# class="btn btn-xs btn-success" id="pilih" data-giat="<?= $data->nm_keg ?>">pilih</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    $(document).on('click', '#pilih', function() {
      var giat = $(this).data('giat');
      $('#urgiat') = val(giat);
      $('#giat').modal('hide');
    })
  })
</script>