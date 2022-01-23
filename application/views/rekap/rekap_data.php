<!--------CONTENT START----------->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Rekap Pengajuan</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item active">
            <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
          </li>
          <li class="breadcrumb-item active">
            <a href="">Pengajuan Keuangan</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="<?= site_url('rekap') ?>">Rekap Pengajuan</a>
          </li>
        </ol>
      </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="card card-outline card-teal table-responsive-sm">
      <div class="card-header">
        <h2 class="card-title">Rekap Pengajuan</h2>
        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) { ?>
          <a type="button" href="<?= site_url('rekap/export_excel') ?>" role="button" class="btn-xs btn-success float-right"><i class="fas fa-download"></i> Unduh Excel</a>
        <?php } ?>
      </div>
      <div class="card-body">
        <table class="table table-hover table-sm" id="tablerekap" width="100%">
          <thead class="bg-teal">
            <tr class="text-center">
              <th width="50px" data-priority="1">#</th>
              <th width="100px">Pengajuan</th>
              <th data-priority="6">Substansi</th>
              <th data-priority="2" width="400px">Kegiatan</th>
              <th width="100px" class="fit">Tgl Kegiatan</th>
              <!-- <th width="100px" >Tgl Selesai</th> -->
              <th width="60px">Status</th>
              <!-- <th data-priority="3" width="60px">Detil</th> -->
              <th data-priority="4" width="80px">Dokumen</th>
              <th data-priority="5" width="80px">Bukti</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
        </table>

      </div>
    </div>
  </div>
</section>

<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="modal_rekap2" tabindex="-1" role="dialog" aria-labelledby="modal_rekap2label" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_rekap2label"><b>Pengajuan Substansi <span id="ksubs"></span></b><br><sup><small class="text-secondary">Tanggal : <span id="tgl_terima"></span></small></sup></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>

      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="accordion" id="accordionExample">
            <div class="card card-outline card-primary">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <span class="text-primary font-weight-bold">Data Kegiatan</span>
                  </button>
                </h2>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table-sm text-sm">
                    <tr>
                      <td width="120px">No. Undangan</td>
                      <td width="1px">:</td>
                      <td><span id="no_undangan"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Nama Kegiatan</td>
                      <td width="1px">:</td>
                      <td><span id="nm_keg"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Tanggal Mulai</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_mulai"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Tanggal Selesai</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_selesai"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Lokasi</td>
                      <td width="1px">:</td>
                      <td><span id="lokasi"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Kode Anggaran</td>
                      <td width="1px">:</td>
                      <td><span id="kd_anggar"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Perjalanan Dinas</td>
                      <td width="1px">:</td>
                      <td><span id="sis_byr"></span> - <span class="text-success" id="nilai_pd"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Honorarium</td>
                      <td width="1px">:</td>
                      <td><span id="sis_byr_hr"></span> - <span class="text-danger" id="nilai_hr"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Akomodasi</td>
                      <td width="1px">:</td>
                      <td><span id="sis_byr_akom"></span> - <span class="text-primary" id="nilai_ak"></span></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="card card-outline card-secondary">
              <div class="card-header" id="headingTwo">
                <h2 class="mb-0">
                  <button class="btn  btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class="text-secondary font-weight-bold">Data Proses BPP</span>
                  </button>
                </h2>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table-sm text-sm">
                    <tr>
                      <td width="150px">Nama BPP</td>
                      <td width="1px">:</td>
                      <td><span id="nm_bpp"></span></td>
                    </tr>
                    <tr>
                      <td width="150px">Catatan Revisi (Substansi)</td>
                      <td width="1px">:</td>
                      <td><span id="catat_subs"></span></td>
                    </tr>
                    <tr>
                      <td width="150px">Tanggal Revisi (Substansi)</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_rev3"></span></td>
                    </tr>
                    <tr>
                      <td width="150px">Tanggal Terima Revisi (Substansi)</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_terima_rev3"></span></td>
                    </tr>
                    <tr>
                      <td width="150px">Tanggal Dispo PUMK</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_dispo"></span></td>
                    </tr>
                    <tr>
                      <td width="150px">Catatan Dispo PUMK</td>
                      <td width="1px">:</td>
                      <td><span id="nota_pumk"></span></td>
                    </tr>
                    <tr>
                      <td width="150px">Tanggal Proses UMK</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_ok"></span></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="card card-outline card-warning">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span class="text-warning font-weight-bold">Data Proses PUMK</span>
                  </button>
                </h2>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table-sm text-sm">
                    <tr>
                      <td width="180px">Nama PUMK</td>
                      <td width="1px">:</td>
                      <td><span id="nm_pumk"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal Pengajuan UMK</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_proses"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Catatan Revisi (PUMK)</td>
                      <td width="1px">:</td>
                      <td><span id="catat_pumk"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal Revisi 1 (PUMK)</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_rev1"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal Penyerahan Revisi 1</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_terima_rev1"></span></td>
                    </tr>
                    <td width="180px">Tanggal Revisi 2 (PUMK)</td>
                    <td width="1px">:</td>
                    <td><span id="tgl_rev2"></span></td>
                    </tr>
                    <td width="180px">Tanggal Penyerahan Revisi 2</td>
                    <td width="1px">:</td>
                    <td><span id="tgl_terima_rev2"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal Terima UMK</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_umk"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Nilai UMK</td>
                      <td width="1px">:</td>
                      <td><span id="nilai_umk"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal LPJ UMK</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_lpj"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Nilai LPJ</td>
                      <td width="1px">:</td>
                      <td><span id="nilai_lpj"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">PUMK AKOM</td>
                      <td width="1px">:</td>
                      <td><span id="nm_pumk_akom"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal Proses Akom</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_proses_akom"></span></td>
                    </tr>
                    <tr>
                      <td width="180px">Tanggal Selesai Proses Akom</td>
                      <td width="1px">:</td>
                      <td><span id="tgl_selesaiproses_akom"></span></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="card card-outline card-danger">
              <div class="card-header" id="headingFour">
                <h2 class="mb-0">
                  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    <span class="text-danger font-weight-bold">Data Dokumen</span>
                  </button>
                </h2>
              </div>
              <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table-sm text-sm">
                    <tr>
                      <td width="120px">Bukti Transfer</td>
                      <td width="1px">:</td>
                      <td><span id="dok_aju"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Undangan</td>
                      <td width="1px">:</td>
                      <td><span id="dokaju"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Surat Tugas</td>
                      <td width="1px">:</td>
                      <td><span id="dokaju2"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Absen</td>
                      <td width="1px">:</td>
                      <td><span id="dokaju3"></span></td>
                    </tr>
                    <tr>
                      <td width="120px">Notulasi</td>
                      <td width="1px">:</td>
                      <td><span id="dokaju4"></span></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#tablerekap').dataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": '<?= site_url('rekap/get_ajax') ?>',
        "type": 'POST'
      },
      responsive: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [{
          'targets': [0, 1, 2, 4, 5, 6, ],
          'className': "text-center",
        },
        {
          'targets': [1, 2, 3, 4],
          'orderable': true,
        },
      ],
      stateSave: true,
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
      },
      "order": []
    })
  })
</script>
<script>
  $(document).ready(function() {
    $(document).on('click', '#detail', function() {
      var tgl_terima = $(this).data('tgl_terima');
      var no_undangan = $(this).data('no_undangan');
      var ksubs = $(this).data('ksubs');
      var nm_keg = $(this).data('nm_keg');
      var tgl_mulai = $(this).data('tgl_mulai');
      var tgl_selesai = $(this).data('tgl_selesai');
      var lokasi = $(this).data('lokasi');
      var catat_pumk = $(this).data('catat_pumk');
      if (catat_pumk != '') {
        catat_pumk = $(this).data('catat_pumk');;
      } else {
        catat_pumk = "-";
      }
      var nota_pumk = $(this).data('nota_pumk');
      if (nota_pumk != '') {
        nota_pumk = $(this).data('nota_pumk');
      } else {
        nota_pumk = "-";
      }
      var catat_subs = $(this).data('catat_subs');
      if (catat_subs != '') {
        catat_subs = $(this).data('catat_subs');;
      } else {
        catat_subs = "-";
      }
      var kd_anggar = $(this).data('kd_anggaran');
      var nm_bpp = $(this).data('nm_bpp');
      var sis_byr = $(this).data('sis_byr');
      var sis_byr_hr = $(this).data('sis_byr_hr');
      var sis_byr_akom = $(this).data('sis_byr_akom');
      var nm_pumk = $(this).data('nm_pumk');
      var nm_pumk_akom = $(this).data('nm_pumk_akom');
      var tgl_umk     = $(this).data('tgl_umk');
      if (tgl_umk != '01-01-1970 07:00') {
        tgl_umk = $(this).data('tgl_umk');
      } else {
        tgl_umk = "-";
      }
      var nilai_umk   = $(this).data('nilai_umk');
      if(nilai_umk=='Rp.0,00' || nilai_umk=='Rp.0'){
        nilai_umk="-";
      }else{
        nilai_umk=$(this).data('nilai_umk');
      }
      var nilai_lpj  = $(this).data('nilai_lpj');
      if(nilai_lpj=='Rp.0,00' || nilai_lpj=='Rp.0'){
        nilai_lpj="-";
      }else{
        nilai_lpj=$(this).data('nilai_lpj');
      }
      var tgl_proses_akom = $(this).data('tgl_proses_akom');
      if (tgl_proses_akom != '01-01-1970 07:00') {
        tgl_proses_akom = $(this).data('tgl_proses_akom');;
      } else {
        tgl_proses_akom = "-";
      }
      var tgl_selesaiproses_akom = $(this).data('tgl_selesaiproses_akom');
      if (tgl_selesaiproses_akom != '01-01-1970 07:00') {
        tgl_selesaiproses_akom = $(this).data('tgl_selesaiproses_akom');;
      } else {
        tgl_selesaiproses_akom = "-";
      }
      //   if (nm_pumk == 1) nm_pumk = "Budi Setiawan"
      //   else if (nm_pumk == 2) nm_pumk = "Marwanto"
      //   else if (nm_pumk == 3) nm_pumk = "Nur Endah"
      //   else if (nm_pumk == 4) nm_pumk = "Siska Alce P"
      //   else if (nm_pumk == 5) nm_pumk = "Andita Pratiwi"
      //   else if (nm_pumk == "") nm_pumk = "";
      var tgl_proses = $(this).data('tgl_proses');
      if (tgl_proses != '01-01-1970 07:00') {
        tgl_proses = $(this).data('tgl_proses');;
      } else {
        tgl_proses = "-";
      }
      var tgl_lpj = $(this).data('tgl_lpj');
      if (tgl_lpj != '01-01-1970 07:00') {
        tgl_lpj = $(this).data('tgl_lpj');;
      } else {
        tgl_lpj = "-";
      }
      var tgl_rev1 = $(this).data('tgl_rev1');
      if (tgl_rev1 != '01-01-1970 07:00') {
        tgl_rev1 = $(this).data('tgl_rev1');;
      } else {
        tgl_rev1 = "-";
      }
      var tgl_rev2 = $(this).data('tgl_rev2');
      if (tgl_rev2 != '01-01-1970 07:00') {
        tgl_rev2 = $(this).data('tgl_rev2');;
      } else {
        tgl_rev2 = "-";
      }
      var tgl_rev3 = $(this).data('tgl_rev3');
      if (tgl_rev3 != '01-01-1970 07:00') {
        tgl_rev3 = $(this).data('tgl_rev3');;
      } else {
        tgl_rev3 = "-";
      }
      var tgl_terima_rev1 = $(this).data('tgl_terima_rev1');
      if (tgl_terima_rev1 != '01-01-1970 07:00') {
        tgl_terima_rev1 = $(this).data('tgl_terima_rev1');;
      } else {
        tgl_terima_rev1 = "-";
      }
      var tgl_terima_rev2 = $(this).data('tgl_terima_rev2');
      if (tgl_terima_rev2 != '01-01-1970 07:00') {
        tgl_terima_rev2 = $(this).data('tgl_terima_rev2');;
      } else {
        tgl_terima_rev2 = "-";
      }
      var tgl_terima_rev3 = $(this).data('tgl_terima_rev3');
      if (tgl_terima_rev3 != '01-01-1970 07:00') {
        tgl_terima_rev3 = $(this).data('tgl_terima_rev3');;
      } else {
        tgl_terima_rev3 = "-";
      }
      var tgl_dispo = $(this).data('tgl_dispo');
      if (tgl_dispo != '01-01-1970 07:00') {
        tgl_dispo = $(this).data('tgl_dispo');;
      } else {
        tgl_dispo = "-";
      }
      var tgl_ok = $(this).data('tgl_ok');
      if (tgl_ok != '01-01-1970 07:00') {
        tgl_ok = $(this).data('tgl_ok');;
      } else {
        tgl_ok = "-";
      }
      var nilai_hr=$(this).data('nilai_hr');
      var nilai_ak=$(this).data('nilai_ak');
      var nilai_pd=$(this).data('nilai_pd');
      if(nilai_pd=='Rp.0' || nilai_pd=='Rp.0,00'){
        nilai_pd="";
      }else{
        nilai_pd=$(this).data('nilai_pd');
      }
      if(nilai_hr=='Rp.0'|| nilai_hr=='Rp.0,00'){
        nilai_hr="";
      }else{
        nilai_hr=$(this).data('nilai_hr');
      }

      if(nilai_ak=='Rp.0'|| nilai_ak=='Rp.0,00'){
        nilai_ak="";
      }else{
        nilai_ak=$(this).data('nilai_ak');
      }
      var dok_aju = $(this).data('dok_aju');
      if (dok_aju != "") {
        dok_aju = "Sudah Transfer";
      } else {
        dok_aju = "Belum Transfer";
      }
      var dokaju = $(this).data('dokaju');
      if (dokaju != "") {
        dokaju = "Ada";
      } else {
        dokaju = "Belum Ada";
      }
      var dokaju2 = $(this).data('dokaju2');
      if (dokaju2 != "") {
        dokaju2 = "Ada";
      } else {
        dokaju2 = "Belum Ada";
      }
      var dokaju3 = $(this).data('dokaju3');
      if (dokaju3 != "") {
        dokaju3 = "Ada";
      } else {
        dokaju3 = "Belum Ada";
      }
      var dokaju4 = $(this).data('dokaju4');
      if (dokaju4 != "") {
        dokaju4 = "Ada";
      } else {
        dokaju4 = "Belum Ada";
      }
      // var verifikator = $(this).data('verifikator');
      // var lama_lpj = $(this).data('lama_lpj');
      // if (lama_lpj != "") {
      //   lama_lpj = $(this).data('lama_lpj') + ' hari';
      // } else {
      //   lama_lpj = $(this).data('lama_lpj');
      // }
      // var lama_verif = $(this).data('lama_verif');
      // if (lama_verif != "") {
      //   lama_verif = $(this).data('lama_verif') + ' hari';
      // } else {
      //   lama_verif = $(this).data('lama_verif');
      // }
      // var no_spm = $(this).data('no_spm');
      // var tgl_spm = $(this).data('tgl_spm');
      // var nilai_spm = $(this).data('nilai_spm');
      // var no_sp2d = $(this).data('no_sp2d');
      // var tgl_sp2d = $(this).data('tgl_sp2d');
      // var nilai_sp2d = $(this).data('nilai_sp2d');
      // var spm = $(this).data('spm');
      // var no_spp = $(this).data('no_spp');
      // var tgl_spp = $(this).data('tgl_spp');
      // var nilai_spp = $(this).data('nilai_spp');
      // var spp = $(this).data('spp');

      $('#tgl_terima').text(tgl_terima);
      $('#no_undangan').text(no_undangan);
      $('#ksubs').text(ksubs);
      $('#nm_keg').text(nm_keg);
      $('#tgl_mulai').text(tgl_mulai);
      $('#tgl_selesai').text(tgl_selesai);
      $('#lokasi').text(lokasi);
      $('#catat_subs').text(catat_subs);
      $('#sis_byr').text(sis_byr);
      $('#sis_byr_hr').text(sis_byr_hr);
      $('#sis_byr_akom').text(sis_byr_akom);
      $('#catat_pumk').text(catat_pumk);
      $('#nota_pumk').text(nota_pumk);
      $('#nm_bpp').text(nm_bpp);
      $('#kd_anggar').text(kd_anggar);
      $('#nm_pumk').text(nm_pumk);
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
      $('#dok_aju').text(dok_aju);
      $('#dokaju').text(dokaju);
      $('#dokaju2').text(dokaju2);
      $('#dokaju3').text(dokaju3);
      $('#dokaju4').text(dokaju4);
      $('#tgl_umk').text(tgl_umk);
      $('#nilai_umk').text(nilai_umk);
      $('#nilai_hr').text(nilai_hr);
      $('#nilai_ak').text(nilai_ak);
      $('#nilai_pd').text(nilai_pd);
      $('#nilai_lpj').text(nilai_lpj);
      // $('#peserta_tu').text(peserta_tu);
      // $('#kelengkapan').text(kelengkapan);
      // $('#keterangan').text(keterangan);
      // $('#lama_lpj').text(lama_lpj);
      // $('#lama_verif').text(lama_verif);
      // $('#no_spm').text(no_spm);
      // $('#tgl_spm').text(tgl_spm);
      // $('#nilai_spm').text(nilai_spm);
      // $('#no_sp2d').text(no_sp2d);
      // $('#tgl_sp2d').text(tgl_sp2d);
      // $('#spm').text(spm);
      // $('#no_spp').text(no_spp);
      // $('#tgl_spp').text(tgl_spp);
      // $('#nilai_spp').text(nilai_spp);
      // $('#spp').text(spp);
    })
  })
</script>