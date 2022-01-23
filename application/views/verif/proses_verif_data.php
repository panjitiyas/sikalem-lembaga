<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Proses Bendahara</h1>
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
            <a href="<?= site_url('proses_verif') ?>">Proses Bendahara</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-outline card-danger">
      <div class="card-header">
      <?php if ($this->fungsi->user_login()->level==1 || ($this->fungsi->user_login()->level==2)):?>
      <h2 class="card-title">Data Kegiatan Direktorat Kelembagaan</h2>
    <?php else : ?>
      <h2 class="card-title">Data Kegiatan BPP : <span class="text-danger"><?=$this->fungsi->user_login()->nama?></span></h2>
      <?php endif ?>
      </div>
      <?php $this->load->view('pesan'); ?>
      <div class="card-body table-responsive ">
        <table class="table  table-hover table-sm text-sm" id="tableverif" style="width:100%">
          <thead class="bg-danger">
            <tr class="text-center">
              <th data-priority="1">*</th>
              <th data-priority="5">#</th>
              <th data-priority="6"width="60px">Pengajuan</th>
              <th width="60px" data-priority="4">Substansi</th>
              <th width="300px" data-priority="2"> Kegiatan</th>
              <th data-priority="7"width="80px" class="fit">Tgl. Kegiatan</th>
              <th data-priority="8" >PUMK</th>
              <th width="80px" data-priority="3">Status</th>
              <th width="100px" data-priority="9">Aksi</th>
              <th width="100px" data-priority="10">Dokumen</th>
              <th width="40px" data-priority="11">Bukti</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>

</section>



<div class="modal fade" id="modal_umk" tabindex="-1" role="dialog" aria-labelledby="modal_umkLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-teal">
        <h5 class="modal-title text-light" id="modal_umkLabel">Tanda Terima Uang Muka Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="card card-shadow">
            <div class="card-header">
              <div class="card-title">
              <h6><b>UMK Substansi :</b> <span id="k_subs"></span></h6>
              </div>
            </div>
            <div class="card-body">
              <form class="text-sm"action="<?= site_url('proses_verif/proses_umk')?>" method="post" target="blank">
                <table class="table table-sm table-borderless">
                  <tr>
                    <td width="120px" class="font-weight-bold">Nama Kegiatan</td>
                    <td width="1px">:</td>
                    <td><span id="nm_keg"></span></td>
                  </tr>
                  <tr>
                    <td width="160px" class="font-weight-bold">Tanggal Kegiatan</td>
                    <td width="1px">:</td>
                    <td><span id="tgl_keg"></span></td>
                  </tr>
                  <!-- <tr>
                    <td width="120px" class="font-weight-bold">Tanggal Selesai</td>
                    <td width="1px">:</td>
                    <td><span id="tgl_selesai"></span></td>
                  </tr> -->
                  <tr>
                    <td width="120px" class="font-weight-bold">PUMK</td>
                    <td width="1px">:</td>
                    <td><span id="nm_pumk"></span></td>
                  </tr>
                  
                  <tr class="table-borderless">
                    <td><input name="id" id="id" type="hidden" class="form-control form-control-sm"></td>
                  </tr>
                  <tr>
                    <td width="120px">Nilai UMK</td>
                    <td width="1px">:</td>
                    <td><input name="nilai_umk" id="nilai_umk" type="text" class="form-control form-control-sm uang"></td>
                  </tr>
                  <tr class="table-borderless">
                    <td width="120px">Tanggal UMK</td>
                    <td width="1px">:</td>
                    <td><input type="text" name="tgl_umk" id="tgl_umk" class="form-control form-control-sm tanggal"></td>
                  </tr>
                </table>
                <div class="form-group float-right">
                  <button type="submit" class="btn btn-success  btn-sm" id="simpen"><i class="fas fa-paper-plane"></i> Simpan</button>
                  <button type="reset" class="btn btn-primary btn-disable btn-sm">Reset</button>
                  <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modal_cek" tabindex="-1" role="dialog" aria-labelledby="modal_cekLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h6 class="modal-title" id="modal_cekLabel"><b>Rincian Pengajuan</b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-12">
          <div class="card card-shadow">
            <!-- <div class="card-header">
              <div class="card-title">
              <h6><b>UMK Substansi :</b> <span id="k_subs"></span></h6>
              </div>
            </div> -->
            <div class="card-body">
              <table class="table text-sm">
                <tr>
                  <td width="160px">No. Undangan</td>
                  <td width="1px">:</td>
                  <td><span id="no_undangan"></span></td>
                </tr>
                <tr>
                  <td width="160px">Substansi</td>
                  <td width="1px">:</td>
                  <td>
                    <a class="text-secondary text-xs" data-toggle="collapse" href="#sub" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-plus-circle"></i>
                    <span id="ksubs"></span>
                    </a>
                    <div class="collapse" id="sub">
                      <div class="col-sm-12">
                        <div class="card card-body card-sm">
                          <table class="table table-sm table-borderless text-sm">
                            <tr>
                                <td width="160px">Pengajuan</td>
                                <td width="1px">:</td>
                                <td><span id="tgl_terima"></span></td>
                            </tr>
                            <tr>
                                <td width="160px">Catatan</td>
                                <td width="1px">:</td>
                                <td><span id="catat_subs"></span></td>
                            </tr>
                            <tr>
                                <td width="160px">Tgl Revisi</td>
                                <td width="1px">:</td>
                                <td><span id="tgl_rev3"></span></td>
                            </tr>
                            <tr>
                                <td width="160px">Tgl Terima Revisi</td>
                                <td width="1px">:</td>
                                <td><span id="tgl_terima_rev3"></span></td>
                            </tr>
                          </table>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="160px">Kegiatan</td>
                  <td width="1px">:</td>
                  <td><span id="nmkeg"></span></td>
                </tr>
                <tr>
                  <td width="160px">Lokasi</td>
                  <td width="1px">:</td>
                  <td><span id="lokasi"></span></td>
                </tr>
                <tr>
                  <td width="160px">Tanggal Kegiatan</td>
                  <td width="1px">:</td>
                  <td><span id="tglkeg"></span></td>
                </tr>
                <tr>
                  <td width="160px">Kode Anggaran</td>
                  <td width="1px">:</td>
                  <td><span id="kd_anggar"></span></td>
                </tr>
                <tr>
                  <td width="160px">PUMK
                  </td>
                  <td width="1px">:</td>
                  <td>
                    <a class="text-primary text-xs" data-toggle="collapse" href="#lini" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-plus-circle"></i>
                    <span id="nmpumk"></span>
                    </a>
                    <div class="collapse" id="lini">
                      <div class="card card-body">
                        <table class="table table-sm table-borderless text-sm">
                          <tr>
                            <td width="160px"> Disposisi</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_dispo"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Pengajuan UMK</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_proses"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Revisi 1</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_rev1"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Terima Revisi 1</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_terima_rev1"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Revisi 2</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_rev2"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Terima Revisi 2</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_terima_rev2"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Proses UMK</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tgl_ok"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Terima UMK</td>
                            <td width="1px">:</td>
                            <td colspan="2"><span id="tglumk"></td>
                          </tr>
                          <tr>
                            <td width="160px"> LPJ</td>
                            <td width="1px">:</td>
                            <td><span id="tgl_lpj"></td>
                            <td class="text-center"><span class="text-success" id="nilai_lpj"></td>
                          </tr>
                          <tr>
                            <td width="160px"> Catatan Dispo PUMK</td>
                            <td width="1px">:</td>
                            <td colspan="2"> <span id="nota_pumk"></span></td>
                          </tr>
                          <tr>
                            <td width="160px"> Catatan Revisi</td>
                            <td width="1px">:</td>
                            <td colspan="2"> <span id="catat_pumk"></span></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="160px">Komp. Pengajuan
                  </td>
                  <td width="1px">:</td>
                  <td>
                    <a class="text-primary text-xs" data-toggle="collapse" href="#pd" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-plus-circle"></i>
                    Perjadin
                    </a>
                    <div class="collapse" id="pd">
                      <div class="col-sm-12">
                      <div class="card card-body card-sm">
                          <p><span id="sis_byr"></span><span id="nilai_pd"></span></p>
                        </div>
                      </div>
                    </div>
                    <a class="text-danger text-xs" data-toggle="collapse" href="#hr" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-plus-circle"></i>
                    Honorarium
                    </a>
                    <div class="collapse" id="hr">
                      <div class="col-sm-12">
                        <div class="card card-body card-sm">
                          <p><span id="sis_byr_hr"></span><span id="nilai_hr"></span></p>
                        </div>
                      </div>
                    </div>
                    <a class="text-success text-xs" data-toggle="collapse" href="#ak" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-plus-circle"></i>
                    Akomodasi
                    </a>
                    <div class="collapse" id="ak">
                      <div class="col-sm-12">
                        <div class="card card-body card-sm">
                          <p><span id="sis_byr_akom"></span><span id="nilai_ak"></span>
                          <span id="tgl_proses_akom"></span><span id="tgl_selesaiproses_akom"></span></p>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td width="160px">Nilai UMK</td>
                  <td width="1px">:</td>
                  <td><span id="nilaiumk"></span></td>
                </tr>
                <tr>
                  <td width="160px">Tanggal UMK</td>
                  <td width="1px">:</td>
                  <td><span id="tgl"></span></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#tableverif').dataTable({
      "bAutoWidth": false,
      "processing": true,
      "serverSide": true,
      "responsive": true,
      "ajax": {
        "url": '<?= site_url('proses_verif/get_ajax') ?>',
        "type": 'POST'
      },
      // responsive: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [
        {
          'targets': [0, 1,2, 5, 6, 7, 8, 9, 10],
          'className': "text-center",
        },
        {
          'targets': [0, 1, 7,8,9, 10,],
          'orderable': false,
        },
      ],
      // responsive: {
      //       details: {
      //           display: $.fn.dataTable.Responsive.display.modal( {
      //               header: function ( row ) {
      //                   var data = row.data();
      //                   return '<h6>Kegiatan '+data[4]+'</h6>';
      //               }
      //           } ),
      //           renderer: function ( api, rowIdx, columns ) {
      //           var data = $.map( columns, function ( col, i ) {
      //               return col.hidden ?
      //                   '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
      //                       '<td>'+col.title+':'+'</td> '+
      //                       '<td>'+col.data+'</td>'+
      //                   '</tr>' :
      //                   '';
      //           } ).join('');
      //           return data ?
      //               $('<table/>').append( data ) :
      //               false;
      //           },
      //       }
      //   },
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
      "order": [],
      // dom: 'Bfrtip',
      // "buttons":[
        
      //   'colvis',

    
      // ]
    })

    $(document).on('click', '#umk', function() {
      var id          = $(this).data('id');
      var k_subs       = $(this).data('k_subs');
      var nm_keg      = $(this).data('nm_keg');
      var tgl_mulai   = $(this).data('tgl_mulai');
      var tgl_selesai = $(this).data('tgl_selesai');
      if (tgl_selesai == tgl_mulai){
        var tgl_keg = tgl_mulai;
      } else {
        var tgl_keg = tgl_mulai+' s.d '+tgl_selesai;
      }
      var nm_pumk     = $(this).data('nm_pumk');
      var tgl_umk     = $(this).data('tgl_pumk');
      var nilai_umk   = $(this).data('nilai_umk');
      $('#id').val(id);
      $('#k_subs').text(k_subs);
      $('#nm_keg').text(nm_keg);
      $('#tgl_keg').text(tgl_keg);
      $('#tgl_selesai').text(tgl_selesai);
      $('#nm_pumk').text(nm_pumk);
      $('#tgl_umk').text(tgl_umk);
      $('#nilai_umk').text(nilai_umk);
    })


    $(document).on('click', '#cek', function() {
      var tgl_terima = $(this).data('tgl_terima');
      var no_undangan=$(this).data('no_undangan');
      var k_subs       = $(this).data('k_subs');
      var nm_keg      = $(this).data('nm_keg');
      var tgl_mulai   = $(this).data('tgl_mulai');
      var tgl_selesai = $(this).data('tgl_selesai');
      if (tgl_selesai == tgl_mulai){
        var tgl_keg = tgl_mulai;
      } else {
        var tgl_keg = tgl_mulai+' s.d '+tgl_selesai;
      }
      var nm_pumk     = $(this).data('nm_pumk');
      var lokasi = $(this).data('lokasi');
      var catat_pumk = $(this).data('catat_pumk');
      if (catat_pumk !='') {
        catat_pumk= $(this).data('catat_pumk');;
      } else {
         catat_pumk="-";
      }
      var nota_pumk = $(this).data('nota_pumk');
      if (nota_pumk !='') {
        nota_pumk= $(this).data('nota_pumk');;
      } else {
         nota_pumk="-";
      }
      var catat_subs = $(this).data('catat_subs');
      if (catat_subs !='') {
        catat_subs= $(this).data('catat_subs');;
      } else {
         catat_subs="-";
      }
      var kd_anggar=$(this).data('kd_anggaran');
      var nilai_lpj=$(this).data('nilai_lpj');
      var nilai_hr=$(this).data('nilai_hr');
      var nilai_ak=$(this).data('nilai_ak');
      var nilai_pd=$(this).data('nilai_pd');
      if(nilai_pd=='Rp.0,00'){
        nilai_pd="";
      }else{
        nilai_pd=' dengan nilai '+ $(this).data('nilai_pd');
      }
    
      if(nilai_lpj=='Rp.0,00'){
        nilai_lpj="";
      }else{
        nilai_lpj=$(this).data('nilai_ak');
      }
      if(nilai_hr=='Rp.0,00'){
        nilai_hr="";
      }else{
        nilai_hr=' dengan nilai '+$(this).data('nilai_hr');
      }

      if(nilai_ak=='Rp.0,00'){
        nilai_ak="";
      }else{
        nilai_ak=' dengan nilai '+$(this).data('nilai_ak');
      }
      var sis_byr = $(this).data('sis_byr');
      if(sis_byr==""){
        sis_byr="-tidak ada data-";
      }else{
        sis_byr='Mekanisme Pembayaran dengan '+$(this).data('sis_byr')+',';
      }
      var sis_byr_hr = $(this).data('sis_byr_hr');
      if(sis_byr_hr==""){
        sis_byr_hr="-tidak ada data-";
      }else{
        sis_byr_hr='Mekanisme Pembayaran dengan '+$(this).data('sis_byr_hr')+',';
      }
      var sis_byr_akom = $(this).data('sis_byr_akom');
      if(sis_byr_akom==""){
        sis_byr_akom="-tidak ada data-";
      }else{
        sis_byr_akom='Mekanisme Pembayaran dengan '+$(this).data('sis_byr_akom')+',';
      }
      var nm_pumk_akom = $(this).data('nm_pumk_akom');
      var tgl_umk     = $(this).data('tgl_umk');
      if (tgl_umk !='') {
        tgl_umk=$(this).data('tgl_umk');
      } else {
         tgl_umk="-";
      }
      var nilai_umk   = $(this).data('nilai_umk');
      var tgl_proses_akom = $(this).data('tgl_proses_akom');
      if (tgl_proses_akom !='') {
        tgl_proses_akom= '. Diproses  tanggal  '+$(this).data('tgl_proses_akom');;
      } else {
         tgl_proses_akom="-";
      }

      var tgl_selesaiproses_akom = $(this).data('tgl_selesaiproses_akom');
      if (tgl_selesaiproses_akom !='') {
        tgl_selesaiproses_akom=' dan selesai proses tanggal '+$(this).data('tgl_selesaiproses_akom');;
      } else {
         tgl_selesaiproses_akom="";
      }
      var tgl_proses = $(this).data('tgl_proses');
      if (tgl_proses !='') {
        tgl_proses= $(this).data('tgl_proses');;
      } else {
         tgl_proses="-";
      }
      var tgl_lpj = $(this).data('tgl_lpj');
      if (tgl_lpj !='') {
        tgl_lpj= $(this).data('tgl_lpj');;
      } else {
         tgl_lpj="-";
      }
      var tgl_rev1 = $(this).data('tgl_rev1');
      if (tgl_rev1 !='') {
        tgl_rev1= $(this).data('tgl_rev1');;
      } else {
         tgl_rev1="-";
      }
      var tgl_rev2 = $(this).data('tgl_rev2');
      if (tgl_rev2 !='') {
        tgl_rev2= $(this).data('tgl_rev2');;
      } else {
         tgl_rev2="-";
      }
      var tgl_rev3 = $(this).data('tgl_rev3');
      if (tgl_rev3 !='') {
        tgl_rev3= $(this).data('tgl_rev3');;
      } else {
         tgl_rev3="-";
      }
      var tgl_terima_rev1 = $(this).data('tgl_terima_rev1');
      if (tgl_terima_rev1 !='') {
        tgl_terima_rev1= $(this).data('tgl_terima_rev1');;
      } else {
         tgl_terima_rev1="-";
      }
      var tgl_terima_rev2 = $(this).data('tgl_terima_rev2');
      if (tgl_terima_rev2 !='') {
        tgl_terima_rev2= $(this).data('tgl_terima_rev2');;
      } else {
         tgl_terima_rev2="-";
      }
      var tgl_terima_rev3 = $(this).data('tgl_terima_rev3');
      if (tgl_terima_rev3 !='') {
        tgl_terima_rev3= $(this).data('tgl_terima_rev3');;
      } else {
         tgl_terima_rev3="-";
      }
      var tgl_dispo = $(this).data('tgl_dispo');
      if (tgl_dispo !='') {
        tgl_dispo= $(this).data('tgl_dispo');;
      } else {
         tgl_dispo="-";
      }
      var tgl_ok = $(this).data('tgl_ok');
      if (tgl_ok !='') {
        tgl_ok= $(this).data('tgl_ok');;
      } else {
         tgl_ok="-";
      }
      $('#tgl_terima').text(tgl_terima);
      $('#no_undangan').text(no_undangan);
      $('#ksubs').text(k_subs);
      $('#nmkeg').text(nm_keg);
      $('#tglkeg').text(tgl_keg);
      $('#tgl_mulai').text(tgl_mulai);
      $('#tgl_selesai').text(tgl_selesai);
      $('#lokasi').text(lokasi);
      $('#catat_subs').text(catat_subs);
      $('#sis_byr').text(sis_byr);
      $('#sis_byr_hr').text(sis_byr_hr);
      $('#sis_byr_akom').text(sis_byr_akom);
      $('#catat_pumk').text(catat_pumk);
      $('#nota_pumk').text(nota_pumk);
      $('#kd_anggar').text(kd_anggar);
      $('#nmpumk').text(nm_pumk);
      $('#nm_pumk_akom').text(nm_pumk_akom);
      $('#tgl_proses').text(tgl_proses);
      $('#tgl_proses_akom').text(tgl_proses_akom);
      $('#tgl_selesaiproses_akom').text(tgl_selesaiproses_akom);
      $('#tgl_lpj').text(tgl_lpj);
      $('#tgl_rev1').text(tgl_rev1);
      $('#tgl_rev2').text(tgl_rev2);
      $('#tgl_rev3').text(tgl_rev3);
      $('#tgl_terima_rev1').text(tgl_terima_rev1);
      $('#tgl_terima_rev2').text(tgl_terima_rev2);
      $('#tgl_terima_rev3').text(tgl_terima_rev3);
      $('#tgl_dispo').text(tgl_dispo);
      $('#tgl_ok').text(tgl_ok);
      $('#tglumk').text(tgl_umk);
      $('#nilaiumk').text(nilai_umk);
      $('#nilai_hr').text(nilai_hr);
      $('#nilai_ak').text(nilai_ak);
      $('#nilai_pd').text(nilai_pd);
      $('#nilai_lpj').text(nilai_lpj);
    })

    document.getElementById('frm_umk').addEventListener('submit',function() {
    $('#modal_umk').modal('hide');
    location.reload();
  });
  
  })
</script>