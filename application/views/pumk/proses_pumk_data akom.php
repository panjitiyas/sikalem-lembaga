<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Proses Akomodasi</h1>
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
            <a href="<?= site_url('proses_pumk') ?>">Proses Akomodasi</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h2 class="card-title">Data Pengajuan Akomodasi Kegiatan Direktorat Kelembagaan</h2>
        <!-- <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-rounded btn-warning btn-xs"><i class="fa fa-user-plus"></i> Tambah</a> -->
      </div>
      <?php $this->load->view('pesan'); ?>
      <div class="card-body table-responsive">
        <table class="table table-hover table-sm text-sm " id=<?=$this->fungsi->user_login()->nama=='Putri Nailatul Himma'?"tablepumk2":"tableakom"?> width="100%">
          <thead class="bg-info">
            <tr class="text-center">
              <th data-priority="1">#</th>
              <th data-priority="2" >Disposisi</th>
              <th data-priority="3">Substansi</th>
              <th data-priority="4" width="500px">Kegiatan</th>
              <th data-priority="5" class="fit">Tgl. Kegiatan</th>
              <!-- <th width="80px" data-priority="10">Tgl. Selesai</th> -->
              <th data-priority="9" width="150px">BPP</th>
              <th data-priority="10">GUP/LS</th>
              <th data-priority="11" class="fit">Proses</th>
              <th  data-priority="12">Selesai Proses</th>
              <th  data-priority="13">Kd Anggaran</th>
              <th  data-priority="14">MAK</th>
              <th  data-priority="15">Nilai</th>
              <th  data-priority="6">Status</th>
              <th  data-priority="7">Aksi</th>
              <th  data-priority="8">Dokumen</th>
              
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="modal fade" id="modal_lengkap" tabindex="-1" role="dialog" aria-labelledby="modal_lengkapLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title" id="modal_lengkapLabel"><b>Rincian Pengajuan Akomodasi</b></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="card card-shadow">
                        <div class="card-body">
                        <p class="text-sm text-primary"> Di disposisi tanggal : <span id="tgl_dispo" class="text-xs text-primary"></span></p>
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
                                        <span id="ksubs"></span>
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
                                    <td width="160px">LS / GUP</td>
                                    <td width="1px">:</td>
                                    <td><span id="sis_byr_akom"></span></td>
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
    $('#tablepumk2').dataTable({
      // "createdRow": function(row, data, dataIndex) {
      //   $(row).addClass('<?= empty($data->nilai) ? "table-warning" : "" ?>');
      // },
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": '<?= site_url('proses_pumk/get_ajax') ?>',
        "type": 'POST'
      },
      colReorder: true,
      responsive: {
        details: {
                type: 'inline'
            }
      },
      autoWidth: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [
        {
            className: 'dtr-control',
            orderable: false,
            targets:   0
        },
        {
          'targets': [0,1,2,4,5,6,7,8,9,10,11,12,13,14],
          'className': "text-center",
        },
        {
          'targets': [0, 9,10,11,12,13,14],
          'orderable': false,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
      "order": []
    })
    $('#tableakom').dataTable({
      // "createdRow": function(row, data, dataIndex) {
      //   $(row).addClass('<?= empty($data->nilai) ? "table-warning" : "" ?>');
      // },
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": '<?= site_url('proses_pumk/data_akom') ?>',
        "type": 'POST'
      },
      colReorder: true,
      responsive: {
        details: {
                type: 'inline'
            }
      },
      autoWidth: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [
        {
            className: 'dtr-control',
            orderable: false,
            targets:   0
        },
        {
          'targets': [0,1,2,4,5,6,7,8,9,10,11,12,13,14],
          'className': "text-center",
        },
        {
          'targets': [0, 9,10,11,12,13,14],
          'orderable': false,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
      "order": []
    })
    $(document).on('click', '#inform', function() {
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
        sis_byr="-";
      }else{
        sis_byr=$(this).data('sis_byr');
      }
      var sis_byr_hr = $(this).data('sis_byr_hr');
      if(sis_byr_hr==""){
        sis_byr_hr="-";
      }else{
        sis_byr_hr= $(this).data('sis_byr_hr');
      }
      var sis_byr_akom = $(this).data('sis_byr_akom');
      if(sis_byr_akom==""){
        sis_byr_akom="-";
      }else{
        sis_byr_akom=$(this).data('sis_byr_akom');
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
  })
</script>