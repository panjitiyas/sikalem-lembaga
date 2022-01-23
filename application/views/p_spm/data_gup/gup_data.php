<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Data GUP</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Pengajuan Keuangan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('data_gup') ?>">Proses SISKA/SPP</a>
          </li>
        </ol>
      </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-outline card-orange">
        <div class="card-header">
            <h2 class="card-title">Data Arsip GUP</h2>
            <a class="text-primary float-right text-md" id="refresh"><i class="fa fa-sync-alt"></i></a>  
        </div>
        <div class="card-body">
             
                <div id="gup"></div>
        </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {

$('#gup').load('<?=site_url('proses_spp/totgup')?>')

$('#refresh').click(function(){
  $('#gup').load('<?=site_url('proses_spp/totgup')?>')

})




})
</script>