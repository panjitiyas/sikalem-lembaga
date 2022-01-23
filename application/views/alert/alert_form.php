<!--------CONTENT START----------->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Info Alert</h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="<?=site_url('dashboard')?>"><i class="fas fa-home"></i></a>
              </li>
              <li class="breadcrumb-item active">
                <a href="">Pengaturan</a>
              </li>
              <li class="breadcrumb-item active">
                <a href="<?=site_url('alert')?>">Info Alert</a>
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
            <h3 class="card-title"><?=ucfirst($page)?> Info Alert</h3>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                  <form action="<?=site_url('alert/proses')?>" method="post">
                      <div class="form-group" > 
                          <label>Judul*</label>
                          <input type="hidden" name="id" value=<?=$row->id_alert?>>
                          <input type="hidden" name="status_alert" value=<?=$row->status_alert?>>
                          <input type="text" name ="judul_alert" class="form-control" value="<?=$row->judul_alert?>" required>
                      </div>
                      <div class="form-group" >
                          <label>Isi*</label> 
                          <textarea rows="4"name ="isi_alert" class="form-control"><?=$row->isi_alert?></textarea>
                      </div>
                      <div class="form-group" >
                          <label>Warna*</label>
                          <select class="form-control" name="warna_alert">
                          <option value="">-pilih-</option>
                          <option value="alert-danger" <?=$row->warna_alert=="alert-danger"?"selected":""?>>Merah</option>
                          <option value="alert-warning" <?=$row->warna_alert=="alert-warning"?"selected":""?>>Kuning</option>
                          <option value="alert-success" <?=$row->warna_alert=="alert-success"?"selected":""?>>Hijau</option>
                          <option value="alert-primary" <?=$row->warna_alert=="alert-primary"?"selected":""?>>Biru</option>
                          </select> 
                      </div>
                      <div class="form-group" >
                          <label>Jenis*</label>
                          <select class="form-control" name="jenis">
                          <option value="">-pilih-</option>
                          <option value= 1 <?=$row->jenis== 1?"selected":""?>>Alert</option>
                          <option value= 0 <?=$row->jenis== 0?"selected":""?>>Running Text</option>
                          </select> 
                      </div>                  
                      <div class="form-group float-right">
                          <button type="submit" name="<?=$page?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                          <a href="<?=site_url('alert')?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
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
                          <input type="text" name="nama" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Username *</label>
                          <input type="text" name="username" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Kata Sandi *</label>
                          <input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Konfirmasi Kata Sandi *</label>
                          <input type="password" name="password_konf" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>Level*</label>
                          <select name="level" class="form-control">
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

