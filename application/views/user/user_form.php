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
            <a href="<?= site_url('user') ?>">Pengguna</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="col-md-4 offset-md-4 mb-2">
    <div class="card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title">Tambah Pengguna</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">

            <?php // echo validation_errors(); 
            ?>
            <form action="" method="POST">
              <div class="form-group">
                <label>Nama*</label>
                <input type="text" name="nama" value="<?= set_value('nama') ?>" class="form-control form-control-sm">
                <?= form_error('nama') ?>
              </div>
              <div class="form-group">
                <label>Username*</label>
                <input type="text" name="username" value="<?= set_value('username') ?>" class="form-control form-control-sm">
                <?= form_error('username') ?>
              </div>
              <div class="form-group">
                <label>Kata Sandi*</label>
                <input id="myPassword" type="password" name="password" class="form-control form-control-sm">
                <?= form_error('password') ?>
                <input type="checkbox" onclick="myFunction()"> <small>Lihat Kata Sandi</small>
                <script>
                  function myFunction() {
                    var x = document.getElementById("myPassword");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
              </div>

              <div class="form-group">
                <label>Konfirmasi Kata Sandi*</label>
                <input id="myPassword2" type="password" name="password_konf" class="form-control form-control-sm">
                <?= form_error('password_konf') ?>
                <input type="checkbox" onclick="myFunction2()"> <small>Lihat Kata Sandi</small>
                <script>
                  function myFunction2() {
                    var x = document.getElementById("myPassword2");
                    if (x.type === "password") {
                      x.type = "text";
                    } else {
                      x.type = "password";
                    }
                  }
                </script>
              </div>
              <div class="form-group">
                <label>Substansi*</label>
                <select name="subs" class="form-control form-control-sm">
                  <option value="">-Pilih-</option>
                  <option value="Pengembangan">Pengembangan</option>
                  <option value="Penataan">Penataan</option>
                  <option value="Penguatan">Penguatan</option>
                  <option value="Pengendalian">Pengendalian</option>
                  <option value="Penilaian Kinerja">Penilaian Kinerja</option>
                  <option value="Tata Usaha">Tata Usaha</option>
                </select>
                <?= form_error('subs') ?>
              </div>
              <div class="form-group">
                <label>BPP*</label>
                <select name="bpp" class="form-control form-control-sm">
                  <option value="">-Pilih-</option>
                  <?php 
                  $this->load->model('bpp_m');
                  $bpp=$this->bpp_m->get();
                  foreach ($bpp->result() as $key => $data) { ?>
                    <option class="text-center" value="<?=$data->nm_bpp ?>"><?= $data->nm_bpp ?></option>
                  <?php } ?>
                </select>
                <?= form_error('bpp') ?>
              </div>
              <div class="form-group">
                <label>Level*</label>
                <select name="level" class="form-control form-control-sm">
                  <option value="">-Pilih-</option>
                  <option value="1">Super-Admin</option>
                  <option value="2">Admin</option>
                  <!-- <option value="3">Operator SPM</option>
                  <option value="4">Operator SPP</option> -->
                  <option value="5">PUMK</option>
                  <option value="6">Admin BPP</option>
                  <option value="7">Admin Substansi</option>
                </select>
                <?= form_error('level') ?>
              </div>
              
              <div class="form-group float-right">
                <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                <a href="<?= site_url('user') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Pengguna</h5> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
          
          <div class="modal-body">
            <div class="row">
              <div class="col-sm-6">
                  <form action="" method="POST">
                      <div class="form-group">
                          <label>Nama *</label>
                          <input type="text" name="nama" class="form-control form-control-sm">
                      </div>
                      <div class="form-group">
                          <label>Username *</label>
                          <input type="text" name="username" class="form-control form-control-sm">
                      </div>
                      <div class="form-group">
                          <label>Kata Sandi *</label>
                          <input type="password" name="password" class="form-control form-control-sm">
                      </div>
                      <div class="form-group">
                          <label>Konfirmasi Kata Sandi *</label>
                          <input type="password" name="password_konf" class="form-control form-control-sm">
                      </div>
                      <div class="form-group">
                          <label>Level*</label>
                          <select name="level" class="form-control form-control-sm">
                            <option value="">-Pilih-</option>
                            <option value="1">Super-Admin</option>
                            <option value="2">Admin</option>
                            <option value="3">Operator SPM</option>
                            <option value="4">Operator SPP</option>
                            <option value="5">PUMK</option>
                            <option value="6">Verifikator</option>
                            <option value="7">Petugas TU</option>
                          </select>
                      </div>
                      <div class="form-group float-right">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="reset" class="btn btn-default btn-sm">Reset</button>
                      </div>
                  </form>
              </div>
            </div> 
          </div>
      </div>
      </div>
  </div> -->