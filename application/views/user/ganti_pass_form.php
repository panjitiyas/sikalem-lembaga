<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Ubah Kata Sandi</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="col-md-5 offset-md-4">
    <div class="card card card-outline card-orange">
      <div class="card-header">
        <h3 class="card-title">Ubah Kata Sandi</h3>
      </div>
      <?php $this->load->view('pesan'); ?>
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
           
            <form action="" method="POST">
              <div class="form-group">
                <label>Kata Sandi Baru</label>
                <input type="hidden" name="user_id" value="<?= $row->user_id ?>">
                <input id="myPassword" type="password" name="passwordbaru" value="<?= $this->input->post('passwordbaru') ?>" class="form-control form-control-sm">
                <?= form_error('passwordbaru') ?><br>
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
                <input id="myPassword2" type="password" name="password_konfbaru" value="<?= $this->input->post('password_konfbaru') ?>" class="form-control form-control-sm">
                <?= form_error('password_konfbaru') ?><br>
                <input type="checkbox" onclick="myFunction2()"> <small>Lihat</small>
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
              <div class="form-group float-right">
                <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                <a href="<?= site_url('dashboard') ?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>