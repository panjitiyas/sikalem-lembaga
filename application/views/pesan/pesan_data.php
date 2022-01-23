<!--------CONTENT START----------->
<section class="content-header">

  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Pesan Masuk</h1>
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
            <a href="<?= site_url('pesan') ?>">Pesan Masuk</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="card card-outline card-navy">
    <div class="card-header">
      <h2 class="card-title">Daftar Pesan Masuk</h2>
      <div class="float-right">
        <a href="" data-toggle="modal" data-target="#tambahpesan" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i> Kirim Pesan Baru</a>
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
    </div>
    <?php $this->load->view('pesan'); ?>
    <div class="card-body table-responsive">
    <div id="inbox"> 
        </div>
      
      
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

<div class="modal fade" id="modal_pesan" tabindex="-1" data-backdrop="static" role="dialog" aria-labelledby="modal_pesanlabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <!-- <form id="formbaca"action="<?=site_url('pesan/proses_baca')?>" method="post"> -->
        <div class="modal-header">
          <h5 class="modal-title" id="modal_pesanlabel"><b>Isi Pesan</b></h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <form id="formbaca" name="baca" role="form">
        <div class="modal-body table-responsive">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                    <input type="hidden" name="id" id="id">
                    <input type="hidden" name="pengirim" id="pengiriminput">
                    <input type="hidden" name="judul" id="judulinput">
                    <input type="hidden" name="pesan" id="pesaninput">
                </div>
              </div>
            </div>
            <table class="table">
              <tr>
                <td width="120px">Pengirim</td>
                <td width="1px">:</td>
                <td><span id="pengirim"></span></td>
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
          <!-- <button type="button" class="btn btn-primary" id="baca">OK</button> -->
          <button class="btn btn-primary btn-xs" id=balas>Balas</button>
          <input type="submit" class="btn btn-danger btn-xs" id="submit" value="Tutup">
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="tambahpesan" tabindex="-1" role="dialog" aria-labelledby="tambahpesanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="formPesan" action="<?= site_url('pesan/proses') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahpesanLabel">Kirim Pesan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <!-- <div class="col-sm-4"><label for="pengirim">Dari :</label></div> -->
                <div class="col-sm-12"><input type="hidden" class="form-control form-control-sm  "name="pengirim" value="<?= $this->fungsi->user_login()->nama ?>" disabled>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="kepada">Kepada :</label></div>
                <div class="col-sm-12">
                  <select class="form-control form-control-sm  " name="kepada" required>
                    <option value="">-pilih-</option>
                    <?php foreach ($user->result() as $key => $data) { ?>
                      <option class="text-center" value="<?= $data->nama ?>"><?= $data->nama ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="judul">Judul</label></div>
                <div class="col-sm-12"><input type="text" class="form-control form-control-sm  "name="judul"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="sifat">Sifat</label></div>
                <div class="col-sm-12">
                  <select class="form-control form-control-sm"  name="sifat">
                    <option value=0>Pilih-</option>
                    <option style="color:#008000;" value=1>Biasa</p>
                    </option>
                    <option style="color:#ffa500;" value=2>Penting</option>
                    <option style="color:#800000;" value=3>Sangat Penting</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="pesan">Pesan</label></div>
                <div class="col-sm-12">
                  <textarea rows="6" class="form-control form-control-sm"  name="pesan" id="tambah_pesan"><b>coba</b></textarea>
                </div>
              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
              <div class="col-sm-4"><label>Lampiran</label></div>
                <div class="col-sm-12">
                  <div class="custom-file custom-file-sm" >
                    <input type="file" class="custom-file-input" name ="lampiran" id="customFile">
                    <label class="custom-file-label" for="customFile" data-browse="Telusuri">Pilih Berkas</label>
                    <br><small> *biarkan kosong jika tidak ada lampiran </small>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Kirim">
        <button type="reset" class="btn btn-primary">Reset</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>  
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="balaspesan" tabindex="-1" role="dialog" aria-labelledby="balaspesanLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <form id="formPesan" action="<?= site_url('pesan/proses') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-header">
          <h5 class="modal-title" id="balaspesanLabel">Balas Pesan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-12"><input type="hidden" class="form-control form-control-sm  " id="kirim_pengirim" name="pengirim" value="<?= $this->fungsi->user_login()->nama ?>" disabled>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="kepada">Kepada :</label></div>
                <div class="col-sm-12">
                  <select class="form-control form-control-sm  " id="kirim_kepada" name="kepada" required>
                    <option value="">-pilih-</option>
                    <?php foreach ($user->result() as $key => $data) { ?>
                      <option class="text-center" value="<?= $data->nama ?>"><?= $data->nama ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="judul">Judul</label></div>
                <div class="col-sm-12"><input type="text" class="form-control form-control-sm  " id="kirim_judul" name="judul"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="pesan">Pesan</label></div>
                <div class="col-sm-12">
                  <textarea rows="6" class="form-control form-control-sm"  id="kirim_pesan" name="pesan"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <div class="col-sm-4"><label for="sifat">Sifat</label></div>
                <div class="col-sm-12">
                  <select class="form-control form-control-sm" id="kirim_sifat" name="sifat">
                    <option value=0>Pilih-</option>
                    <option style="color:#008000;" value=1>Biasa</p>
                    </option>
                    <option style="color:#ffa500;" value=2>Penting</option>
                    <option style="color:#800000;" value=3>Sangat Penting</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
              <div class="col-sm-4"><label>Lampiran</label></div>
                <div class="col-sm-12">
                  <div class="custom-file custom-file-sm" >
                    <input type="file" class="custom-file-input" name ="lampiran" id="customFile">
                    <label class="custom-file-label" for="customFile" data-browse="Telusuri">Pilih Berkas</label>
                    <br><small> *biarkan kosong jika tidak ada lampiran </small>
                  </div> 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Kirim">
        <!-- <button type="reset" class="btn btn-primary">Reset</button> -->
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>          
        </div>
      </form>
    </div>
  </div>
</div>
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#detail', function() {
      var id = $(this).data('id');
      var pengirim = $(this).data('pengirim');
      var judul = $(this).data('judul');
      var pesan = $(this).data('pesan');
      $('#id').val(id);
      $('#pengiriminput').val(pengirim);
      $('#judulinput').val(judul);
      $('#pesaninput').val(pesan);
      $('#pengirim').text(pengirim);
      $('#judul').text(judul);
      $('#pesan').text(pesan);
    })
  })
</script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#balas', function() {
      $('#balaspesan').modal('show');
      var kepada = document.getElementById("pengiriminput").value;
      var judul = "Bls: "+document.getElementById("judulinput").value;
      var pesan = "<b><i> balas pesan "+kepada+": "+document.getElementById("pesaninput").value+"</i></b>" ;
      $('#kirim_kepada').val(kepada);
      $('#kirim_judul').val(judul);
      $('#kirim_pesan').val(pesan);
    })
  })
</script>
<script>
  $(document).ready(function() {
    $('#formbaca').submit(function(e) {
      $.ajax({
        url: "<?=site_url('pesan/proses_baca')?>",
        cache:false,
        type: "POST",
        data: $('form#formbaca').serialize(),
        success: function () {
          $('#modal_pesan').modal('hide');
          $('#inbox').load('<?=site_url('pesan/inbox')?>')
        },
        error: function(){
          alert('Error');
        }
      });
      return false;
    })
    $('#inbox').load('<?=site_url('pesan/inbox')?>')
  })
</script>
<!-- <script>
    CKEDITOR.replace( 'tambah_pesan' );
    CKEDITOR.replace( 'kirim_pesan' );
</script> -->





