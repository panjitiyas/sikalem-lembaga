<!--------CONTENT START----------->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tools Pendukung</h1>
          </div> 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">
                <a href="<?=site_url('dashboard')?>"><i class="fas fa-home"></i></a>
              </li>
              <li class="breadcrumb-item active">
                <a href="">Modul Pendukung</a>
              </li>
              <li class="breadcrumb-item active">
                <a href="<?=site_url('tools')?>">Aplikasi Pendukung</a>
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
            <h3 class="card-title"><?=ucfirst($page)?> Data Aplikasi</h3>
        </div>
        <?php $this->load->view('pesan');?>
        <div class="card-body">
          <div class="row">
              <div class="col-md-12">
                <?=form_open_multipart('tools/proses')?>
                      <div class="form-group" > 
                          <label>Uraian*</label>
                          <input type="hidden" name="id" value=<?=$row->id_tools?>>
                          <input type="text" name ="uraian" class="form-control" value="<?=$row->uraian?>"required>
                      </div>
                      <?php if($page=='ubah'){
                              if($row->lampiran !=null) {?>
                              <a class="text-success" href="<?=base_url('uploads/dukung/' .$row->lampiran)?>">sudah ada file :<?=$row->lampiran?></a>
                              <?php }?>
                          <?php }?>
                      <div class="custom-file" >
                          <!-- <label >Lampiran</label> <br> -->
                          
                          <input type="file" class="custom-file-input" name ="lampiran" id="customFile">
                          <label class="custom-file-label" for="customFile" data-browse="Telusuri">Pilih Berkas</label>
                          <br><small> *biarkan kosong jika tidak  <?=$page=='ubah' ? 'diganti / tidak ada perubahan' : 'ada lampiran'?></small>
                      </div>            
                      <div class="form-group float-right">
                          <button type="submit" name="<?=$page?>" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                          <a href="<?=site_url('tools')?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
                      </div>
                  <?=form_close()?>
              </div>
          </div>  
        </div>
    </div>
  </div>
</section>

