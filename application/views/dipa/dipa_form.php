<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Kode Anggaran</h1>
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
            <a href="<?= site_url('dipa') ?>">Kode Anggaran</a>
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
            <h3 class="card-title"><?=ucfirst($page)?> Data Kode Anggaran</h3>
        </div>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                  <form action="<?=site_url('dipa/proses')?>" method="post">
                      <div class="form-group" > 
                          <label>Kode Program*</label>
                          <input type="hidden" name="id" value=<?=$row->id_pagu?>>
                          <input type="text" name ="kdProgram" class="form-control" value="<?=$row->kd_program?>" required>
                      </div>
                      <div class="form-group" >
                          <label>Nama Program*</label> 
                          <input type="text" name ="nmProgram" class="form-control" value="<?=$row->nm_program?>"required> 
                      </div>
                      <div class="form-group" > 
                          <label>Kode Kegiatan*</label>
                          <input type="text" name ="kdGiat" class="form-control" value="<?=$row->kd_giat?>"required>
                      </div>
                      <div class="form-group" >
                          <label>Nama Kegiatan*</label> 
                          <input type="text" name ="nmGiat" class="form-control" value="<?=$row->nm_giat?>"required> 
                      </div>
                      <div class="form-group" > 
                          <label>Kode KRO*</label>
                          <input type="text" name ="kdOutput" class="form-control" value="<?=$row->kd_kro?>"required>
                      </div>
                      <div class="form-group" >
                          <label>Nama KRO*</label> 
                          <input type="text" name ="nmOutput" class="form-control" value="<?=$row->nm_kro?>"required> 
                      </div>
                      <div class="form-group" >
                          <label>Kode RO*</label> 
                          <input type="text" name ="kdSuboutput" class="form-control" value="<?=$row->kd_ro?>"required> 
                      </div> 
                      <div class="form-group" >
                          <label>Nama RO*</label> 
                          <input type="text" name ="nmSuboutput" class="form-control" value="<?=$row->nm_ro?>"required> 
                      </div> 
                      <div class="form-group" >
                          <label>Kode Komponen*</label> 
                          <input type="text" name ="kdKomponen" class="form-control" value="<?=$row->kd_komp?>"required> 
                      </div> 
                      <div class="form-group" >
                          <label>Nama Komponen*</label> 
                          <input type="text" name ="nmKomponen" class="form-control" value="<?=$row->nm_komp?>"required> 
                      </div> 
                      <div class="form-group" >
                          <label>Kode Subkomponen*</label> 
                          <input type="text" name ="kdSubkomponen" class="form-control" value="<?=$row->kd_skomp?>"required> 
                      </div> 
                      <div class="form-group" >
                          <label>Nama Subkomponen*</label> 
                          <input type="text" name ="nmSubkomponen" class="form-control" value="<?=$row->nm_skomp?>"required> 
                      </div>           
                      <div class="form-group float-right">
                          <button type="submit" name="<?=$page?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                          <a href="<?=site_url('dipa')?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
                      </div>
                  </form>
              </div>
          </div>  
        </div>
    </div>
  </div>
</section>


