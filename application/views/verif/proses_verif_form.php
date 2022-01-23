<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Proses BPP</h1>
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
            <a href="<?= site_url('proses_verif') ?>">Proses BPP</a>
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
        <h3 class="card-title">Proses BPP</h3>
        <span class="text-maroon font-weight-bold float-right">Substansi <?= $row->k_subs ?></span>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <!-- <form action="<?= site_url('proses_verif/proses') ?>" method="post" > -->
            <?php echo form_open('proses_verif/proses')  ?>
            <?php if (validation_errors()) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <h6><b>Proses Tidak Dapat Dilanjutkan!</b></h6>
                                <small>
                                    <?php echo validation_errors() ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                </small>
                            </div>
                        <?php } ?>
              <fieldset>
                <table class="table table-sm text-sm table-borderless">
                  <tr>
                    <td width="25%">
                      <span class="font-weight-bold">
                        <p class="word-break ">Nomor Undangan</p>
                      </span>
                    </td>
                    <td width="5%">:</td>
                    <td colspan="2" width="70%">
                      <p class="word-break"><?= $row->no_undangan ?></p>
                    </td>
                  </tr>
                  <tr>
                    <td width="25%">
                      <span class="font-weight-bold">
                        <p class="word-break ">Kegiatan</p>
                      </span>
                    </td>
                    <td width="5%">:</td>
                    <td colspan="2" width="70%">
                      <span class="text-left"><?= $row->nm_keg ?></span>
                    </td>
                  </tr>
                  <tr>
                    <td width="25%">
                      <span class="font-weight-bold">Tgl. Mulai</span>
                    </td>
                    <td width="5%">:</td>
                    <td width="70%">
                      <span class="text-dark"><?= tanggal_indonesia($row->tgl_mulai) ?></span>
                  </tr>
                  <tr>
                    </td>
                    <td width="25%">
                      <span class="font-weight-bold">Tgl. Selesai</span>
                    </td>
                    <td width="5%">:</td>
                    <td width="70%">
                      <span class="text-dark"><?= tanggal_indonesia($row->tgl_selesai) ?></span>
                    </td>
                  </tr>
                  <tr>
                    </td>
                    <td width="25%">
                      <span class="font-weight-bold">Lokasi</span>
                    </td>
                    <td width="5%">:</td>
                    <td width="70%">
                      <span class="text-dark"><?= $row->lokasi ?></span>
                    </td>
                  </tr>
                </table>
              </fieldset>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>PUMK</label>
                    <select name="nm_pumk" class="form-control form-control-sm " <?= $row->tgl_proses != null ? "disabled" : "required" ?>>
                      <option value="">-Pilih-</option>
                      <?php foreach ($pumk->result() as $key => $data) { ?>
                        <option value=<?= str_replace(' ', '_', $data->pumk_nm) ?> <?= str_replace(' ', '_', $data->pumk_nm) == str_replace(' ', '_', $row->nm_pumk) ? "selected" : "" ?>><?= $data->pumk_nm ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label>Kode Anggaran</label> <a id="anggar" href="" class="btn btn-primary float-right btn-xs font-weight-bold" data-toggle="modal" data-target=<?= $row->tgl_proses != null ? "" : "#data_anggar" ?>>Daftar Kode</a>
                    <input id="kdanggaran" name="kd_anggaran" type="text" class="form-control form-control-sm" value="<?= $row->kd_anggaran ?>" <?= $row->tgl_proses != null ? "disabled" : "required" ?> readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <label>Mekanisme Pembayaran</label><br>
              </div>
              <div class="row">
                <input type="hidden" name="id" value=<?= $row->id_bppem ?>>
                <div class="col-sm-4">
                  <span class="text-success"><b>Perjalanan Dinas</b></span>
                  <?php foreach ($bayar->result() as $key => $data) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sis_byr" id="sis_byr<?= $data->id_bayar ?>" value="<?= $data->id_bayar ?>" <?= $data->nm_bayar == $row->sis_byr ? 'checked' : ""; ?> <?= $row->tgl_proses != null ? "disabled" : ""; ?>>
                      <label class="form-check-label" for="sis_byr<?= $data->id_bayar ?>">
                        <?= $data->nm_bayar ?>
                      </label>
                    </div>
                  <?php } ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sis_byr" id="sis_byr0" value="0" <?= $row->sis_byr == "" ? 'checked' : ""; ?> <?= $row->tgl_proses != null ? "disabled" : ""; ?>>
                    <label class="form-check-label" for="sis_byr0">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <span class="text-danger"><b>Honorarium</b></span>
                  <?php foreach ($bayar->result() as $key => $data) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sis_byr_hr" id="sis_byr<?= $data->id_bayar ?>" value="<?= $data->id_bayar ?>" <?= $data->nm_bayar == $row->sis_byr_hr ? 'checked' : ""; ?> <?= $row->tgl_proses != null ? "disabled" : ""; ?>>
                      <label class="form-check-label" for="sis_byr<?= $data->id_bayar ?>">
                        <?= $data->nm_bayar ?>
                      </label>
                    </div>
                  <?php } ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sis_byr_hr" id="sis_byr0" value="0" <?= $row->sis_byr_hr == "" ? 'checked' : ""; ?> <?= $row->tgl_proses != null ? "disabled" : ""; ?>>
                    <label class="form-check-label" for="sis_byr0">
                      Tidak Ada
                    </label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <span class="text-primary"><b>Akomodasi</b></span>
                  <?php foreach ($bayar->result() as $key => $data) { ?>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="sis_byr_akom" id="sis_byr<?= $data->id_bayar ?>" value="<?= $data->id_bayar ?>" <?= $data->nm_bayar == $row->sis_byr_akom ? 'checked' : ""; ?> <?= $row->tgl_proses_akom != null ? "disabled" : ""; ?>>
                      <label class="form-check-label" for="sis_byr<?= $data->id_bayar ?>">
                        <?= $data->nm_bayar ?>
                      </label>
                    </div>
                  <?php } ?>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="sis_byr_akom" id="sis_byr0" value="0" <?= $row->sis_byr_akom == "" ? 'checked' : ""; ?> <?= $row->tgl_proses_akom != null ? "disabled" : ""; ?>>
                    <label class="form-check-label" for="sis_byr0">
                      Tidak Ada
                    </label>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <hr>
        <div class="form-group">
          <label>Catatan Substansi</label><span class="text-sm text-warning"><?= $row->tgl_rev3 != null ? " tanggal " . tanggal_indonesia($row->tgl_rev3) : "" ?> #<?= $row->tgl_rev3 != null && $row->tgl_terima_rev3 == null ? lama_lpj($row->tgl_rev3, date('d-m-Y')) : "" ?></span>
        <div class="form-check-inline text-sm float-right">
          <input  id="tolak1" class="form-check"  type="radio" name="tolak" value="1" <?=$row->tolak=="1"?'checked':""?> <?=$row->tgl_proses!=null ? "disabled":""?>> 
          <label class="form-check-label text-danger font-weight-bold" for="tolak1"> Tolak </label>
        </div>
        <div class="form-check-inline text-sm float-right">
          <input  id="revisi1" class="form-check" type="radio" name="tolak" value="2" <?=$row->tolak=="2"?'checked':""?> <?= $row->tgl_proses != null ? "disabled" : "" ?>>
          <label class="form-check-label text-warning font-weight-bold" for="revisi1"> Revisi </label> 
        </div>
        <div class="form-check-inline text-sm float-right">
          <input  id="lanjut1" class="form-check" type="radio" name="tolak" value="" <?=$row->tolak==""?'checked':""?> <?= $row->tgl_proses != null ? "disabled" : "" ?>>
          <label class="form-check-label text-success font-weight-bold" for="lanjut1"> Lanjut </label> 
        </div>
          <textarea id ="csubs"rows="4" name="catat_subs" class="form-control form-control-sm" <?= $row->tgl_proses != null ? "disabled" : "" ?>><?= $row->catat_subs ?></textarea>
          <span class="text-xs font-italic text-danger font-weight-bold">* kosongkan jika tidak ada catatan atau revisi</span>

          <span class="float-right text-primary font-weight-bold"><input <?= $row->tgl_terima_rev3 != null || $row->tgl_rev3 == null  ? 'disabled' : "" ?> type="checkbox" name="tgl_terima_rev3" value="1" <?= $row->tgl_terima_rev3 != null ? "checked" : "" ?> <?= lama_lpj($row->tgl_rev3, date('d-m-Y')) >= 5 != null ? "required" : "" ?>><?= $row->tgl_terima_rev3 == null ? '<span class="text-sm text-secondary"> Revisi Selesai</span>' : '<span class="text-sm text-success"> Revisi Selesai Tgl. ' . tanggal_indonesia($row->tgl_terima_rev3) . '</span>' ?></span>
        </div>
        <div class="form-group">
          <label>Catatan Disposisi PUMK</label> <a id="bknota" class="text-primary"><i class="fas fa-chevron-circle-down"></i></a><a id="ttpnota" class="text-primary"><i class="fas fa-chevron-circle-up"></i></a>
          <textarea id="nota" rows="4" name="nota_pumk" class="form-control form-control-sm"><?= $row->nota_pumk ?></textarea>
        </div>
        <?php if (!empty($row->tgl_proses)) { ?>
          <fieldset>
            <div class="form-group">
              <label>Catatan Revisi PUMK</label>
              <textarea <?= empty($row->tgl_proses) || !empty($row->tgl_lpj) || !empty($row->tgl_ok) ? 'disabled' : "" ?> rows="4" name="catat_pumk" class="form-control form-control-sm"><?= $row->catat_pumk ?></textarea>
              <span class="text-xs font-italic text-danger font-weight-bold">* kosongkan jika tidak ada catatan atau revisi</span>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <!-- <label>Tgl. Revisi 1</label> -->
                  <input <?= $row->tgl_rev1 != null || $row->tgl_ok != null ? 'disabled' : "" ?> type="checkbox" name="tgl_rev1" value="1" <?= $row->tgl_rev1 != null ? "checked" : "" ?>>
                  <?php if ($row->tgl_rev1 != null) { ?>
                    <span class="text-sm text-success">Revisi 1 tgl. <?= tanggal_indonesia($row->tgl_rev1) ?></span>
                  <?php } else { ?>
                    <span class="text-sm text-orange font-weight-bold">Revisi 1</span>
                  <?php } ?>
                  <!-- <input  <?= $row->tgl_ok != null ? 'disabled' : "" ?> type="text" name="tgl_rev1" value="<?= $row->tgl_rev1 ?>" class="form-control form-control-sm tanggal" id="tgl_rev1"> -->
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <!-- <label>Tgl. Revisi 2</label> -->
                  <input <?= $row->tgl_rev1 == null || $row->tgl_ok != null ? 'disabled' : "" ?> type="checkbox" name="tgl_rev2" value="1" <?= $row->tgl_rev2 != null ? "checked" : "" ?>>
                  <?php if ($row->tgl_rev2 != null) { ?>
                    <span class="text-sm text-success">Revisi 2 tgl. <?= tanggal_indonesia($row->tgl_rev2) ?></span>
                  <?php } else { ?>
                    <span class="text-sm  text-orange font-weight-bold">Revisi 2</span>
                  <?php } ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <!-- <label>Tgl Proses BPP</label> -->
                  <input <?= empty($row->tgl_proses) || !empty($row->tgl_ok) ? 'disabled' : "" ?> type="checkbox" name="tgl_ok" value="1" <?= $row->tgl_ok != null ? "checked" : "" ?>>
                  <?php if ($row->tgl_ok != null) { ?>
                    <span class="text-sm text-success">Proses BPP tgl. <?= tanggal_indonesia($row->tgl_ok) ?></span>
                  <?php } else { ?>
                    <span class=" text-primary font-weight-bold">Proses BPP</span>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="row">
              <?php if ($row->tgl_rev1 != null) { ?>
                <div class="col-sm-4">
                  <div class="form-group">
                    <!-- <label>Tgl. Terima Revisi 1</label> -->
                    <input <?= $row->tgl_rev1 == null || $row->tgl_ok != null ? 'disabled' : "" ?> type="checkbox" name="tgl_terima_rev1" value="1" <?= $row->tgl_terima_rev1 != null ? "checked" : "" ?>>
                    <?php if ($row->tgl_terima_rev1 != null) { ?>
                      <span class="text-sm text-success">Terima Revisi 1 tgl. <?= tanggal_indonesia($row->tgl_rev1) ?></span>
                    <?php } else { ?>
                      <span class="text-sm text-secondary">Terima Revisi 1</span>
                    <?php } ?>
                    <!-- <input  <?= $row->tgl_ok != null ? 'disabled' : "" ?> type="text" name="tgl_rev1" value="<?= $row->tgl_rev1 ?>" class="form-control form-control-sm tanggal" id="tgl_rev1"> -->
                  </div>
                </div>
              <?php } ?>
              <?php if ($row->tgl_rev2 != null) { ?>
                <div class="col-sm-4">
                  <div class="form-group">
                    <!-- <label>Tgl. Terima Revisi 2</label> -->
                    <input <?= $row->tgl_terima_rev1 == null || $row->tgl_ok != null ? 'disabled' : "" ?> type="checkbox" name="tgl_terima_rev2" value="1" <?= $row->tgl_rev2 != null ? "checked" : "" ?>>
                    <?php if ($row->tgl_terima_rev2 != null) { ?>
                      <span class="text-sm text-success">Terima Revisi 2 tgl. <?= tanggal_indonesia($row->tgl_rev2) ?></span>
                    <?php } else { ?>
                      <span class="text-sm text-secondary">Terima Revisi 2</span>
                    <?php } ?>
                    <!-- <input  <?= empty($row->tgl_rev1) ? 'disabled' : "" ?> type="text" name="tgl_rev2" value="<?= $row->tgl_rev2 ?>" class="form-control form-control-sm tanggal" id="tgl_rev2"> -->
                  </div>
                </div>
              <?php } ?>
            </div>
          </fieldset>
        <?php } ?>
        <div class="form-group float-right">
          <button type="submit" class="btn btn-success  btn-sm" id="nyimpen"><i class="fas fa-paper-plane"></i> Simpan</button>
          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
          <a href="<?= site_url('proses_verif') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
        </div>
        <?php echo form_close()?>
        <!-- </form> -->
      </div>
    </div>
  </div>
  </div>
</section>

<div class="modal fade" id="data_anggar" tabindex="-1" role="dialog" aria-labelledby="data_anggarLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="data_anggarLabel">Data Kode DIPA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-hover display compact table-sm" style="width:100%" id="tablePagu2">
          <thead class="thead-light">
            <tr class="text-center">
              <th width="5px" data-priority="1">#</th>
              <th width="60px" data-priority="2">Kode Program/Kegiatan</th>
              <th width="150px" data-priority="3" class="fit">Nama Program/Kegiatan</th>
              <th width="60px" data-priority="4">Kode KRO/RO</th>
              <th width="150px" data-priority="5" class="fit">Nama KRO/RO</th>
              <th width="40px" data-priority="6">Kode Komp/Subkomp</th>
              <th width="150px" data-priority="7" class="fit">Nama Komp/Subkomp</th>
              <th data-priority="8" class="fit">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1;
            foreach ($dipa->result() as $key => $data) { ?>
              <tr>
                <td class="text-center"><?= $no++ ?>.</td>
                <td class="text-center"><?= $data->kd_program . '-' . $data->kd_giat ?></td>
                <td><?= $data->nm_program . '-' . $data->nm_giat ?></td>
                <td class="text-center"><?= $data->kd_kro . '-' . $data->kd_ro ?></td>
                <td><?= $data->nm_kro . '-' . $data->nm_ro ?></td>
                <td class="text-center"><?= $data->kd_komp . '-' . $data->kd_skomp ?></td>
                <td><?= $data->nm_komp . '-' . $data->nm_skomp ?></td>
                <td class="text-center">
                  <a href=# class="btn btn-xs btn-success" id="ambil" data-kd_program="<?= $data->kd_program ?>" data-kd_giat="<?= $data->kd_giat ?>" data-kd_kro="<?= $data->kd_kro ?>" data-kd_ro="<?= $data->kd_ro ?>" data-kd_komp="<?= $data->kd_komp ?>" data-kd_skomp="<?= $data->kd_skomp ?>">pilih</a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

      </div>
    </div>
  </div>
</div>



<script>
  $(document).ready(function() {
    $('#tablePagu2').dataTable({
      "bAutoWidth": true,
      "responsive": true,

      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [

        {
          'targets': [0, 1, 3, 5, 7],
          'className': "text-center",
        },
        {
          'targets': [0, 1, 2, 3, 4, 5, 6, 7],
          'orderable': false,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
    })
    $(document).on('click', '#ambil', function() {
      var program = $(this).data('kd_program');
      var giat = $(this).data('kd_giat');
      var kro = $(this).data('kd_kro');
      var ro = $(this).data('kd_ro');
      var komp = $(this).data('kd_komp');
      var skomp = $(this).data('kd_skomp');
      var kode = program + "." + giat + "." + kro + "." + ro + "." + komp + "." + skomp;
      $('#kdanggaran').val(kode);
      $('#data_anggar').modal('hide');
    })
  })

  $(document).ready(function() {

    $('#nota').hide();
    $('#ttpnota').hide();

    $('#bknota').click(function() {
      $('#nota').show();
      $('#ttpnota').show();
      $('#bknota').hide();
    })
    $('#ttpnota').click(function() {
      $('#nota').hide();
      $('#ttpnota').hide();
      $('#bknota').show();
    })
  })
</script>