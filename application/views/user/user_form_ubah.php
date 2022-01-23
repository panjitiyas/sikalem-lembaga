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
  <div class="col-md-4 offset-md-4">
    <div class="card card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title">Ubah Data</h3>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
           
            <form action="" method="POST">
              <div class="form-group">
                <label>Nama</label>
                <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                <input type="text" name="nama" value="<?= $this->input->post('nama') ?? $row->nama ?>" class="form-control form-control-sm">
                <?= form_error('nama') ?>
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" value="<?= $this->input->post('username') ?? $row->username ?>" class="form-control form-control-sm">
                <?= form_error('username') ?>
              </div>
              <div class="form-group">
                <label>Kata Sandi</label>
                <input id="myPassword" type="password" name="password" value="<?= $this->input->post('password') ?>" class="form-control form-control-sm">
                <?= form_error('password') ?><br>
                <input type="checkbox" onclick="myFunction()"> <small>Lihat</small>
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
                <label>Konfirmasi Kata Sandi</label>
                <input id="myPassword2" type="password" name="password_konf" value="<?= $this->input->post('password_konf') ?>" class="form-control form-control-sm">
                <?= form_error('password_konf') ?><br>
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
                <label>Substansi</label>
                <select name="subs" value="<?= $this->input->post('subs') ? $this->input->post('subs') : $row->subs ?>" class="form-control form-control-sm">
                  $subs = $data->subs;
                  <option value="Pengembangan" <?= $row->subs == "Pengembangan" ? 'selected' : null ?>>Pengembangan</option>
                  <option value="Penataan" <?= $row->subs == "Penataan" ? 'selected' : null ?>>Penataan</option>
                  <option value="Penguatan" <?= $row->subs == "Penguatan" ? 'selected' : null ?>>Penguatan</option>
                  <option value="Pengendalian" <?= $row->subs == "Pengendalian" ? 'selected' : null ?>>Pengendalian</option>
                  <option value="Penilaian Kinerja" <?= $row->subs == "Penilaian Kinerja" ? 'selected' : null ?>>Penilaian Kinerja</option>
                  <option value="Tata Usaha" <?= $row->subs == "Tata Usaha" ? 'selected' : null ?>>Tata Usaha</option>
                </select>
                <?= form_error('subs') ?>
              </div>
              <div class="form-group">
                <label>BPP*</label>
                <select name="bpp" value="<?= $this->input->post('bpp') ? $this->input->post('bpp') : $row->bpp ?>" class="form-control form-control-sm" >
                  <?php foreach ($bpp->result() as $key => $data) { ?>
                    <option class="text-center" value="<?= $data->nm_bpp ?>" <?=$row->bpp==$data->nm_bpp?'selected':null?>><?= $data->nm_bpp ?></option>
                  <?php } ?>
                </select>
                <?= form_error('bpp') ?>
              </div>
              <div class="form-group">
                <label>Level</label>
                <select name="level" value="<?= $this->input->post('level') ? $this->input->post('level') : $row->level ?>" class="form-control form-control-sm">
                  $level = $data->level;
                  <option value="1" <?= $row->level == 1 ? 'selected' : null ?>>Super-Admin</option>
                  <option value="2" <?= $row->level == 2 ? 'selected' : null ?>>Admin</option>
                  <!-- <option value="3" <?= $row->level == 3 ? 'selected' : null ?>>Operator SPM</option>
                  <option value="4" <?= $row->level == 4 ? 'selected' : null ?>>Operator SPP</option> -->
                  <option value="5" <?= $row->level == 5 ? 'selected' : null ?>>PUMK</option>
                  <option value="6" <?= $row->level == 6 ? 'selected' : null ?>>Admin BPP</option>
                  <option value="7" <?= $row->level == 7 ? 'selected' : null ?>>Admin Substansi</option>
                </select>
                <?= form_error('level') ?>
              </div>
              <div class="form-group float-right">
                <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= site_url('user') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>