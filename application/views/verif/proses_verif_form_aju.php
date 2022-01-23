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
            <a href="<?= site_url('proses_verif') ?>">Verifikasi Pengajuan</a>
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
        <h3 class="card-title">Verifkasi Pengajuan</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <form action="<?= site_url('proses_verif/proses_aju') ?>" method="post">
              <fieldset disabled>
                <div class="form-group">
                  <label>Kegiatan</label>
                  <textarea name="nm_keg" class="form-control form-control-sm"><?= $row->nm_keg ?></textarea>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>PUMK</label>
                      <input type="text" name="nm_pumk" class="form-control form-control-sm" value="<?= $row->nm_pumk ?>">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Nilai</label><small> (dalam rupiah) </small>
                      <input type="text" name="nilai" value="<?= number_format($row->nilai, 0, ',', '.'); ?>" class="form-control form-control-sm" id="rupiah">
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
                      <label  class="text-center">SOutput</label>
                      <input type="text" name="sub_output" value="<?= $row->sub_output ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-2">
                    <div class="form-group">
                      <label>Komp</label>
                      <input type="text" name="komponen" value="<?= $row->komponen ?>" class="form-control form-control-sm">
                    </div>
                  </div>
                  <div class="col-sm-1">
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
                  <div class="col-sm-3">
                    <div class="form-group">
                      <label>LS/GUP</label>
                      <input type="text" name="sis_bayar" class="form-control form-control-sm" value="<?= $row->sis_bayar ?>">
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="col-sm-3">
                  <div class="form-group">
                    <label>Revisi</label>
                    <select name="revisi" value="<?= $this->input->post('revisi') ? $this->input->post('revisi') : $row->revisi ?>" class="form-control form-control-sm" id="revisi">
                      <option value="" <?= $row->revisi == "" ? 'selected' : null ?>>-Pilih-</option>
                      <option value="ya" <?= $row->revisi == "ya" ? 'selected' : null ?>>Ya</option>
                      <option value="tidak" <?= $row->revisi == "tidak" ? 'selected' : null ?>>Tidak</option>
                    </select>
                  </div>
                </div>
              <div class="form-group">
                <label>Catatan</label>
                <textarea rows="6" name="catatan_aju" class="form-control form-control-sm"><?= $row->catatan_aju ?></textarea>
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Tgl. Verifikasi Pengajuan</label>
                    <input type="hidden" name="id" value=<?= $row->id_verif ?>>
                    <input type="text" name="tgl_periksa" value="<?= $row->tgl_periksa ?>" class="form-control form-control-sm tanggal" id="tgl_periksa" required>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Verifikator</label>
                    <select name="verifikator" class="form-control form-control-sm" required>
                      <option class="text-center" value="">- Pilih -</option>
                      <?php foreach ($verif->result() as $key => $data) { ?>
                        <option class="text-center" value="<?= $data->nm_verif ?>" <?= $data->nm_verif == $row->verifikator ? "selected" : null ?>><?= $data->nm_verif ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="form-group float-right">
                <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                <a href="<?= site_url('proses_verif') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</section>
<script>
  $(document).ready(function (){
    $('#tgl_verif').change(function(){
      fungsi_lamalpj ();
      fungsi_lamaverif();
    });
    $('#tgl_update_verif').change(function(){
      fungsi_lamalpj ();
      fungsi_lamaverif()
    });
    $('#tgl_terimalpj').change(function(){
      fungsi_lamaverif()
    });
    $('#kelengkapan').change(function(){
      fungsi_lamalpj ();
      fungsi_lamaverif()
    });

  function fungsi_lamalpj () {
    var kelengkapan = $('#kelengkapan').val ();
    var tgl_update_verif =$('#tgl_update_verif').val ();
    var tgl_awal = $('#tgl_umk').val ();
    var tgl_akhir =$('#tgl_verif').val();
    if (kelengkapan = "Lengkap" && tgl_update_verif == '')
    {
        tgl_akhir = $('#tgl_verif').val();
    } else 
    {
        tgl_akhir = $('#tgl_update_verif').val();
    }

    $.ajax ({
      method    :"POST",
      url       : "<?=site_url('proses_verif/lama_lpj')?>",
      
      data      :{tgl_awal : tgl_awal, tgl_akhir : tgl_akhir},
      success   : function(data,status)
      {
        $('#lamalpj').val(data);
      }
    });
  };
  function fungsi_lamaverif () {
    var kelengkapan = $('#kelengkapan').val ();
    var tgl_update_verif =$('#tgl_update_verif').val ();
    var tgl_awal = $('#tgl_terimalpj').val ();
    var tgl_akhir =$('#tgl_verif').val();
    if (kelengkapan = "Lengkap" && tgl_update_verif == '')
    {
        tgl_akhir = $('#tgl_verif').val();
    } else 
    {
        tgl_akhir = $('#tgl_update_verif').val();
    }

    $.ajax ({
      method    :"POST",
      url       : "<?=site_url('proses_verif/lama_lpj')?>",
      
      data      :{tgl_awal : tgl_awal, tgl_akhir : tgl_akhir},
      success   : function(data,status)
      {
        // alert(data);
        $('#lamaverif').val(data);
      }
    });
  };
  })
</script>
