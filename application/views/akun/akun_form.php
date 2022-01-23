<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kode Akun</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Pengaturan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('akun') ?>">Kode Akun</a>
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
            <h3 class="card-title"><?=ucfirst($page)?> Data Kelompok Substansi</h3>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                  <form action="<?=site_url('akun/proses')?>" method="post">
                      <div class="form-group" > 
                          <label>Kode Akun*</label>
                          <input type="hidden" name="id" value=<?=$row->id_akun?>>
                          <input type="text" name ="kdAkun" class="form-control" value="<?=$row->kdAkun?>"required>
                      </div>
                      <div class="form-group" >
                          <label>Nama Akun*</label> 
                          <input type="text" name ="nmAkun" class="form-control" value="<?=$row->nmAkun?>"required> 
                      </div>            
                      <div class="form-group float-right">
                          <button type="submit" name="<?=$page?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                          <a href="<?=site_url('akun')?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
                      </div>
                  </form>
              </div>
          </div>  
        </div>
    </div>
  </div>
</section>


