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
                <a href="<?=site_url('dashboard')?>"><i class="fas fa-home"></i></a>
              </li>
              <li class="breadcrumb-item active">
                <a href="">Pengajuan Keuangan</a>
              </li>
              <li class="breadcrumb-item active">
                <a href="<?=site_url('proses_spm')?>">Proses SPM</a>
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
            <h3 class="card-title">Proses SPM</h3>
        </div>
        <div class="card-body">
        <div class="row">
              <div class="col-md-12">
                  <form action="<?=site_url('proses_spm/proses')?>" method="post">
                <fieldset disabled>
                      <div class="form-group"> 
                          <label>Kegiatan</label>
                          <textarea name="nm_keg" class="form-control form-control-sm"><?=$row->nm_keg?></textarea>
                      </div>
                  <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group" > 
                          <label>Tgl. Mulai Kegiatan</label>
                          <input type="text" name="tgl_mulai" class="form-control form-control-sm tanggal" value="<?=tanggal_indonesia($row->tgl_mulai)?>">
                        </div>
                      </div>
                    <div class="col-sm-6">  
                      <div class="form-group" > 
                          <label>Tgl. Selesai Kegiatan</label>
                          <input type="text" name="tgl_selesai" value="<?=tanggal_indonesia($row->tgl_selesai)?>" class="form-control form-control-sm tanggal">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                  <div class="col-sm-4">  
                      <div class="form-group" > 
                          <label>No. SPP</label>
                          <input type="text" name="no_spp" value="<?=$row->no_spp?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-4">  
                      <div class="form-group" > 
                          <label>Tgl SPP</label>
                          <input type="text" name="tgl_spp" value="<?=tanggal_indonesia($row->tgl_spp)?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-4">  
                      <div class="form-group" > 
                          <label>Nilai SPP</label><small> (dalam rupiah)</small>
                          <input type="text" name="nilai_spp" value="<?=number_format($row->nilai_spp, 0, ',', '.');?>" class="form-control form-control-sm">
                      </div>
                    </div>
                  </div>
                  <div class="row text-center">
                    <div class="col-sm-2">  
                      <div class="form-group text-center" >
                          <label>Output</label>
                          <input type="text" name="output" value="<?=$row->output?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-2">  
                      <div> 
                          <label class="text-center text-center">Sub-Output</label>
                          <input type="text" name="sub_output" value="<?=$row->sub_output?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-3">  
                      <div class="form-group text-center" > 
                          <label>Komponen</label>
                          <input type="text" name="komponen" value="<?=$row->komponen?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-2">  
                      <div class="form-group text-center" > 
                          <label >SKomp</label>
                          <input type="text" name="sub_komp" value="<?=$row->sub_komp?>" class="form-control form-control-sm">
                      </div>
                    </div>
                    <div class="col-sm-3">  
                      <div class="form-group text-center" > 
                          <label>Akun</label>
                          <input type="text" name="akun_mak" value="<?=$row->akun_mak?>" class="form-control form-control-sm">
                      </div>
                    </div>
                  </div>
                </fieldset>
                <div class="row">
                    <div class="col-sm-4">  
                    <div class="form-group" >
                          <label>No. SPM</label>
                          <input type="hidden" name="id" value=<?=$row->id_spm?>>
                          <input type="text" name="no_spm" value="<?=$row->no_spm?>" class="form-control form-control-sm" >
                      </div>
                    </div>
                      <div class="col-sm-4"> 
                      <div class="form-group" >
                          <label>Tgl. SPM</label>                          
                          <input type="text" name="tgl_spm" value="<?=$row->tgl_spm!==null ? date('d-m-Y', strtotime($row->tgl_spm)) : "" ?>" class="form-control form-control-sm tanggal" >
                      </div>
                    </div>
                    <div class="col-sm-4">  
                    <div class="form-group" > 
                          <label>Nilai SPM</label>
                          <input type="text" name="nilai_spm" value="<?=$row->nilai_spm?>" class="form-control form-control-sm uang" required>
                          <small><i> masukkan nilai 0 jika dikosongkan</i></small>
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">  
                    <div class="form-group" >
                          <label>No. SP2D</label>
                          <input type="hidden" name="id" value=<?=$row->id_spm?>>
                          <input type="text" name="no_sp2d" value="<?=$row->no_sp2d?>" class="form-control form-control-sm" >
                      </div>
                    </div>
                      <div class="col-sm-4"> 
                      <div class="form-group" >
                          <label>Tgl. SP2D</label>                          
                          <input type="text" name="tgl_sp2d" value="<?=$row->tgl_sp2d!==null ? date('d-m-Y', strtotime($row->tgl_sp2d)) : "" ?>" class="form-control form-control-sm tanggal" >
                      </div>
                    </div>
                    <div class="col-sm-4">  
                    <div class="form-group" > 
                          <label>Nilai SP2D</label>
                          <input type="text" name="nilai_sp2d" value="<?=$row->nilai_sp2d?>" class="form-control form-control-sm uang" required>
                          <small><i> masukkan nilai 0 jika dikosongkan</i></small>
                      </div>
                    </div>
                    </div>
                  <div class="row">
                  <div class="col-sm-3">  
                    <div class="form-group" > 
                          <label>Operator</label>
                          <select name="operator" class="form-control form-control-sm">  
                          <option value="">-Pilih-</option>
                          <?php foreach($spm->result() as $key => $data){?> 
                            <option class="text-center" value="<?=$data->nm_spm?>" <?=$data->nm_spm==$row->spmid ? "selected" : null?>><?=$data->nm_spm?></option>
                          <?php } ?> 
                          </select>
                    </div>
                  </div>
                  </div>
                  <div class="form-group float-right">
                          <button type="submit" class="btn btn-success  btn-sm"><i class="fas fa-paper-plane"></i> Simpan</button>
                          <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                          <a href="<?=site_url('proses_spm')?>" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Batal</a>
                </div>
                </form>
              </div>
          </div>        
    </div>
  </div>
</section>


