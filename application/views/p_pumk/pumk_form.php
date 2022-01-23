<!--------CONTENT START----------->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Petugas PUMK</h1>
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
                <a href="<?=site_url('pumk')?>">Petugas PUMK</a>
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
            <h3 class="card-title"><?=ucfirst($page)?> Data PUMK</h3>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                  <form action="<?=site_url('pumk/proses')?>" method="post">
                      <div class="form-group" > 
                          <label>Nama*</label>
                          <input type="hidden" name="id" value=<?=$row->pumkid?>>
                          <input type="text" name ="pumk_nm" class="form-control" value="<?=$row->pumk_nm?>"required>
                      </div>
                      <div class="form-group" >
                          <label>Substansi*</label> 
                          <select name="sub" class="form-control form-control-sm" required>
                          <option class="text-center" value="">- Pilih -</option>
                          <?php foreach ($subs->result() as $key=>$data) { ?>
                            <option class="text-center" value="<?= $data->nm_ksub ?>" <?= $data->nm_ksub == $row->sub ? "selected" : null ?>><?= $data->nm_ksub ?></option>
                          <?php } ?>
                          </select>
                          <!-- <input type="text" name ="sub" class="form-control" value="<?=$row->sub?>">  -->
                      </div> 
                      <div class="form-group">
                        <label>BPP*</label>
                        <select name="bpp" class="form-control form-control-sm">
                        <option value="">-Pilih-</option>
                        <?php 
                        foreach ($bpp->result() as $key => $data) { ?>
                            <option class="text-center" value="<?=$data->nm_bpp?>" <?=$data->nm_bpp==$row->bpp?"selected":""?>><?= $data->nm_bpp ?></option>
                        <?php } ?>
                        </select>
                      </div>
                                 
                      <div class="form-group float-right">
                          <button type="submit" name="<?=$page?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                          <a href="<?=site_url('pumk')?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
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

