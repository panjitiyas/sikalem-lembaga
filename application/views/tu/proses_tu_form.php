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
  <div class="col-md-8 offset-md-2">
    <div class="card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title"><?= ucfirst($page) ?> Pengajuan</h3>
        <?php if($this->fungsi->user_login()->level!=1 && $this->fungsi->user_login()->level!=2):?>
        <span class="float-right font-weight-bold">Substansi <?=$this->fungsi->user_login()->subs?></span>
        <?php endif ?>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
          
            <?= form_open_multipart('proses_tu/proses') ?>
            <?php if (validation_errors()){?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h6><b>Pengajuan Tidak Dapat Diproses!</b></h6>
            <small>
                <?php echo validation_errors()?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </small>
            </div>
            <?php } ?>
            
            
              <div class="form-group">
                <!-- <label>Waktu Pengajuan</label> -->
                <input type="hidden" name="id" value=<?= $row->id_keg ?>>
                <input type="hidden" name="tgl_terima" class="form-control form-control-sm"  value="<?= date('d-m-Y H:i') ?>" readonly>
              </div>
              <div class="form-group">
                <label>No. Undangan<span class="text-danger">* </span></label>
                <input id="no_undangan" type="text" name="no_undangan" value="<?= $page=='tambah'?set_value('no_undangan'): $row->no_undangan ?>" class="form-control form-control-sm <?= form_error ('no_undangan') ? "is-invalid" : ""?>"
                <?php if ($page == 'ubah'){
                  if ($proses->tgl_proses!=null){
                    echo 'readonly';
                  }
                } else {
                  echo '';
                }?>
                >
              </div>
              <div class="form-group">
                <?php
                if ($this->session->userdata('level') == 2 or $this->session->userdata('level') == 1){?>

                <label>Kel. Substansi<span class="text-danger">*</span></label>
                <select id="subs_opt" name="k_subs" class="form-control form-control-sm"
                <?php if ($page == 'ubah'){
                  if ($proses->tgl_proses!=null){
                    echo 'readonly';
                  }
                } else {
                  echo 'required';
                }?>>
                    <option class="text-center" value="">- Pilih -</option>
                    <?php foreach ($nm_ksubs->result() as $key => $data) { ?>
                    <option class="text-center" value="<?= $data->nm_ksub ?>" <?= $page=='ubah' && $data->nm_ksub==$row->k_subs ? 'selected' :""?>><?= $data->nm_ksub ?></option>
                    <?php } ?>
                </select>
                <?php } else {?>
                <!-- <label>Kel. Substansi<span class="text-danger">*</span></label> -->
                <input id="subs_opt" type="hidden" name="k_subs" value="<?= $row->k_subs ?>" class="form-control form-control-sm" readonly>
                <?php } ?>
              </div>
              <div class="form-group">
              <div class="row">
              <div class="col-sm-6">
              <label>Kegiatan<span class="text-danger">*</span></label>
              </div>
              <!-- <div class="col-sm-6">
                  <?php if ($page == 'tambah') { ?>
                    <a  class="text-primary float-right"  data-toggle="modal" data-target="#modal_data"><i class="fa fa-search"></i></a>
                  <?php }  ?>
              </div> -->
              </div>
                <textarea rows="4" id="keg" name="nm_keg" class="form-control form-control-sm" 
                <?php if ($page == 'ubah'){
                  if ($proses->tgl_proses!=null){
                    echo 'readonly';
                  }
                } else {
                  echo 'required';
                }?>
                 ><?= $page=='tambah'?set_value('nm_keg'): $row->nm_keg ?></textarea>
              </div>
              <div class="row">
                <div class="col-sm-5">
              <div class="form-group">
                <label>Tgl. Mulai<span class="text-danger">*</span></label>
                <input id="mulai" type="text" name="tgl_mulai" value="<?= $page=='tambah'?set_value('tgl_mulai'): $row->tgl_mulai ?>" class="form-control form-control-sm tanggal <?= form_error ('tgl_mulai') ? "is-invalid" : ""?>" 
                <?php if ($page == 'ubah'){
                  if ($proses->tgl_proses!=null){
                    echo 'readonly';
                  }
                } else {
                  echo 'required';
                }?>
                >
              </div>
                </div>
                <div class="col-sm-1">
                <span class="text-center">s.d</span>
                
                </div>
                <div class="col-sm-6">
              <div class="form-group">
                <label>Tgl. Selesai<span class="text-danger">*</span></label>
                <input id="selesai" type="text" name="tgl_selesai" value="<?= $page=='tambah'?set_value('tgl_selesai'): $row->tgl_selesai ?>" class="form-control form-control-sm tanggal <?= form_error ('tgl_selesai') ? "is-invalid" : ""?>" 
                <?php if ($page == 'ubah'){
                  if ($proses->tgl_proses!=null){
                    echo 'readonly';
                  }
                } else {
                  echo 'required';
                }?>
                >
              </div>
              </div>
              </div>
              <span><small><i> Jika kegiatan dilaksanakan dalam satu tanggal (satu hari), tanggal selesai kegiatan diisi sama dengan tanggal mulai kegiatan</i></small></span>              
              <br>
              <br>
              <div class="form-group">
                <label>Lokasi<span class="text-danger">*</span></label>
                <input id="lokasi" type="text" name="lokasi" value="<?= $page=='tambah'?set_value('lokasi'): $row->lokasi ?>" class="form-control form-control-sm" 
                <?php if ($page == 'ubah'){
                  if ($proses->tgl_proses!=null){
                    echo 'readonly';
                  }
                } else {
                  echo 'required';
                }?>
                >
              </div>
              <div class="form-group">
                <?php if ($this->fungsi->user_login()->level==1 || $this->fungsi->user_login()->level==2) : ?>
                  <label>Bendahara (BPP)<span class="text-danger">*</span></label>
                  <select id="nm_bpp"  name="nm_bpp" class="form-control form-control-sm">
                    <option value="">-Pilih-</option>
                    <?php foreach ($bpp->result() as $key => $data) :?>
                      <option value="<?=$data->nm_bpp?>" <?=$data->nm_bpp==$row->nm_bpp?'selected':""?>><?=$data->nm_bpp?></option>
                      <?php endforeach ?>
                    </select>
                    <?php else : ?>
                      <input id="nm_bpp" type="hidden" name="nm_bpp" value="<?= $row->nm_bpp ?>" class="form-control form-control-sm" readonly>
                <?php endif ?>
              </div>
              <div class="form-group">
                        <?php 
                        if ($row->dokaju !=null) { ?>
                        <a class="text-success" href="<?= base_url('uploads/dok/'.$row->k_subs.'/' . $row->dokaju) ?>"><b>Undangan </b> <i class="fas fa-check"></i><small> (<?=$row->dokaju?>)</small></a>
                        <?php } else { ?>
                        <label><span>Undangan<span class="text-danger">*</span>- <small>dalam format pdf</small></span></label>
                        <?php } ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control-sm <?= form_error ('dokaju_1') ? "is-invalid" : ""?>" name="dokaju_1" id="dokAju"
                            <?php if ($page=='tambah'){
                              echo '';
                            } elseif ($page=='ubah' && strpos($row->dokaju,"Rev2") || $page=='ubah' && $row->dokaju!=null && !empty($rkp->tgl_lpj)){
                              echo 'disabled';
                            } else {
                              echo "";
                            } ?>>
                            <label class="custom-file-label" for="dokAju" data-browse="Telusuri">Pilih Berkas</label>
                            <?php if ($page=='ubah'){?>
                            <span><small><i>berkas biarkan kosong jika tidak ada perubahan</i></small></span>
                            <?php } else { ?>
                            <span><small><i>wajib melampirkan dan melengkapi dokumen pengajuan</i></small></span> 
                            <?php } ?>
                        </div>
                </div>
                <br>
                <div class="form-group">
                        <?php 
                        if ($row->dokaju2 !=null) { ?>
                        <a class="text-success" href="<?= base_url('uploads/dok/'.$row->k_subs.'/'. $row->dokaju2) ?>"><b>Surat Tugas </b> <i class="fas fa-check"></i><small> (<?=$row->dokaju2?>)</small></a>
                        <?php } else { ?>
                        <label><span>Surat Tugas<span class="text-danger">*</span> - <small>dalam format pdf</small></span></label>
                        <?php } ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control-sm <?= form_error ('dokaju_2') ? "is-invalid" : ""?>" name="dokaju_2" id="dokAju2"
                            <?php if ($page=='tambah'){
                              echo '';
                            } elseif ($page=='ubah' && strpos($row->dokaju2,"Rev2") || $page=='ubah' && $row->dokaju2!=null && !empty($rkp->tgl_lpj)){
                              echo 'disabled';
                            } else {
                              echo "";
                            } ?>>
                            <label class="custom-file-label" for="dokAju2" data-browse="Telusuri">Pilih Berkas</label>
                            <?php if ($page=='ubah'){?>
                            <span><small><i>berkas biarkan kosong jika tidak ada perubahan</i></small></span>
                            <?php } else { ?>
                            <span><small><i>wajib melampirkan dan melengkapi dokumen pengajuan</i></small></span> 
                            <?php } ?>
                        </div>
                </div>
                <br>
                <div class="form-group">
                        <?php 
                        if ($row->dokaju3 !=null) { ?>
                        <a class="text-success" href="<?= base_url('uploads/dok/'.$row->k_subs.'/' .  $row->dokaju3) ?>"><b>Absen </b> <i class="fas fa-check"></i><small> (<?=$row->dokaju3?>)</small></a>
                        <?php } else { ?>
                        <label><span>Absen<span class="text-danger">*</span> - <small>dalam format pdf/xls/xlsx/rar</small></span></label>
                        <?php } ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control-sm <?= form_error ('dokaju_3') ? "is-invalid" : ""?>" name="dokaju_3" id="dokAju3" 
                            <?php if ($page=='ubah' && strpos($row->dokaju3,"Rev2")){
                              echo 'disabled';
                            } else {
                              echo "";
                            } ?>>
                            <label class="custom-file-label" for="dokAju3" data-browse="Telusuri">Pilih Berkas</label>
                            <?php if ($page=='ubah'){?>
                            <span><small><i>berkas biarkan kosong jika tidak ada perubahan</i></small></span>
                            <?php } else { ?>
                            <span><small><i>wajib dilampirkan apabila pengajuan dilaksanakan setelah kegiatan selesai</i></small></span> 
                            <?php } ?>
                        </div>
                </div>
                <br>
              <div class="form-group">
                        <?php 
                        if ($row->dokaju4 !=null) { ?>
                        <a class="text-success" href="<?= base_url('uploads/dok/'.$row->k_subs.'/' .  $row->dokaju4) ?>"><b>Notulasi </b> <i class="fas fa-check"></i><small> (<?=$row->dokaju4?>)</small></a>
                        <?php } else { ?>
                        <label><span>Notulasi<span class="text-danger">*</span> - <small>dalam format doc/docx/pdf</small></span></label>
                        <?php } ?>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input form-control-sm <?= form_error ('dokaju_4') ? "is-invalid" : ""?>" name="dokaju_4" id="dokAju4" 
                            <?php if ($page=='ubah' && strpos($row->dokaju4,"Rev2")){
                              echo 'disabled';
                            } else {
                              echo "";
                            } ?>>
                            <label class="custom-file-label" for="dokAju4" data-browse="Telusuri">Pilih Berkas</label>
                            <?php if ($page=='ubah'){?>
                            <span><small><i>berkas biarkan kosong jika tidak ada perubahan</i></small></span>
                            <?php } else { ?>
                            <span><small><i>wajib dilampirkan apabila pengajuan dilaksanakan setelah kegiatan selesai</i></small></span>
                            <?php } ?>
                            
                        </div>
                </div>
                <br>
              <div class="form-group float-right">
                <button type="submit" name="<?= $page ?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                <a href="<?= site_url('proses_tu') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
              <?= form_close ()?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
            <th>Lokasi</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($keg->result() as $data) { ?>
          <tr class="text-sm">
            <td class="text-center"><b><?=$data->k_subs?></b></td>
            <td><?=$data->nm_keg?></td>
            <td class="text-center"><?=tanggal_indonesia($data->tgl_mulai)?></td>
            <td class="text-center"><?=tanggal_indonesia($data->tgl_selesai)?></td>
            <td class="text-center"><?=$data->lokasi?></td>
            <td class="text-center">
              <button class="btn btn-xs btn-primary" id="pilih" 
              data-keg="<?=$data->nm_keg?>"
              data-subs_opt="<?=$data->k_subs?>"
              data-mulai="<?=$data->tgl_mulai?>"
              data-selesai="<?=$data->tgl_selesai?>"
              data-lokasi="<?=$data->lokasi?>">
              <i class="fas fa-check"></i>
               </button>
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
  $(document).ready(function(){
    $(document).on('click', '#pilih',function(){
      var nm_keg      = $(this).data('keg');
      var k_subs      = $(this).data('subs_opt');
      var tgl_mulai   = $(this).data('mulai');
      var tgl_selesai = $(this).data('selesai');
      var lokasi      = $(this).data('lokasi');
      $('#keg').val(nm_keg);
      $('#subs_opt').val(k_subs);
      $('#mulai').val(tgl_mulai);
      $('#selesai').val(tgl_selesai);
      $('#lokasi').val(lokasi);
      $('#modal_data').modal('hide');
    })
  })
</script>