<!--------CONTENT START----------->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Rincian Anggaran Biaya</h1>
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
                <a href="<?=site_url('proses_pumk/rab')?>">RAB</a>
              </li>
            </ol>
          </div>
</section>
    <!-- /.content-header -->

    <!-- Main content -->
<section class="content">
  <div class="col-md-12">
    <div class="card card-outline card-navy">
        <div class="card-header">
            <h3 class="card-title">Proses RAB</h3>
            <span class="float-right font-weight-bold text-uppercase">Substansi <?=$row->k_subs?></span><br>
            <span class="float-right font-font-weight-light text-sm">Nomor Undangan : <?=$row->no_undangan?></span>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-8 offset-md-3">
              <h3<span class="font-weight-bold">RENCANA ANGGARAN BELANJA DAN RINCIAN KEBUTUHAN DANA KEGIATAN</span></h3>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-8 offset-md-0">
              <table class="table-hover table-sm" width="100%">
                <tr>
                  <td width="5px" class="text-sm">1.</td>
                  <td width="100px" class="text-sm">Satker</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm font-weight-bold">(690438) Direktorat Kelembagaan</td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">2.</td>
                  <td width="100px" class="text-sm">Kegiatan</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm font-weight-bold">(4259) Pengembangan Kelembagaan</td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">3.</td>
                  <td width="100px" class="text-sm">Output</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm">-</td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">4.</td>
                  <td width="100px" class="text-sm">Suboutput</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm">-</td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">5.</td>
                  <td width="100px" class="text-sm">Komponen Input</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm">-</td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">6.</td>
                  <td width="100px" class="text-sm">Sub Komponen</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm">-</td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">7.</td>
                  <td width="100px" class="text-sm">Tujuan Pekerjaan</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="600px" class="text-sm"><?=$row->nm_keg?></td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">8.</td>
                  <td width="100px" class="text-sm">Waktu Pelaksanaan</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm"><?=tanggal_indonesia($row->tgl_mulai)?></td>
                </tr>
                <tr>
                  <td width="5px" class="text-sm">9.</td>
                  <td width="150px" class="text-sm">Tempat Pelaksanaan</td>
                  <td width="5px" class="text-sm">:</td>
                  <td width="300px" class="text-sm"><?=$row->lokasi?></td>
                </tr>
              </table>
            </div>
          </div>
          <br>
          <div>
            Pilih Kolom : <input type="checkbox" class="toggle-vis chk" data-column="5"  checked> HR - <input type="checkbox" class="toggle-vis chk" data-column="6" checked> UH - <input type="checkbox" class="toggle-vis chk" data-column="7" checked> US - <input type="checkbox" class="toggle-vis chk" data-column="8" checked> Rep - <input type="checkbox" class="toggle-vis chk" data-column="9" checked> TL - <input type="checkbox" class="toggle-vis chk" data-column="10" checked> KD - <input type="checkbox" class="toggle-vis chk" data-column="11" checked> TX - <input type="checkbox" class="toggle-vis chk" data-column="12" checked> TK - <input type="checkbox" class="toggle-vis chk" data-column="13" checked> AK - <input type="checkbox" class="toggle-vis chk" data-column="14" checked> LL 
          </div>
          <div class="row">
            <div class="col-md-12">
              <table class="table table-xs table-responsive table-bordered" width="100%" id="tabelrab">
                <thead class= "thead-light table-fit">
                  <tr>
                    <th data-priority="2" width="5px" class="text-sm text-center fit">No.</th>
                    <th data-priority="1" width="10px" class="text-sm text-center"><input type="checkbox" id="Del"/></th>
                    <th data-priority="3" width="400px" class="text-sm fit text-center">Nama Peserta</th>
                    <th data-priority="4" width="10px" class="text-sm fit text-center">Gol.</th>
                    <th data-priority="5" width="500px" class="text-sm fit text-center">Instansi/Jabatan</th>
                    <th data-priority="6" width="100px" class="text-sm text-center">Honorarium</th>
                    <th data-priority="7" width="100px" class="text-sm text-center">Uang Harian</th>
                    <th data-priority="8" width="100px" class="text-sm text-center">Uang Saku</th>
                    <th data-priority="9" width="100px" class="text-sm fit text-center">Representatif</th>
                    <th data-priority="10" width="100px" class="text-sm text-center">Transport Lokal</th>
                    <th data-priority="11" width="100px" class="text-sm text-center">Kendaraan Darat</th>
                    <th data-priority="12" width="100px" class="text-sm text-center fit">Taksi</th>
                    <th data-priority="13" width="100px" class="text-sm text-center fit">Tiket</th>
                    <th data-priority="14" width="100px" class="text-sm text-center">Akomodasi</th>
                    <th data-priority="15" width="100px" class="text-sm fit text-center">Lain-lain</th>
                    <th data-priority="10001" width="100px" class="text-sm">Pajak</th>
                    <th data-priority="10002" width="100px" class="text-sm">Jumlah</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-sm">1.</td>
                    <td class="text-sm"><input type="checkbox" name="chkDel[]"/></td>
                    <td class="text-sm"><input  type="text" class="teks" name="nm_rab[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="gol[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="instansi[]" value=""></td>
                    <td class="text-sm"><input   type="number" class="teks" name="komp_hr[]" value=""></td>
                    <td class="text-sm"><input   type="text" class="teks" name="komp_uh[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="komp_us[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="komp_rep[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="komp_tl[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="komp_darat[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="komp_taksi[]" value=""></td>
                    <td class="text-sm"><input type="text" class="teks" name="komp_tiket[]" value=""></td>
                    <td class="text-sm"><input  type="text" class="teks" name="komp_akom[]" value=""></td>
                    <td class="text-sm"><input type="text" class="teks" name="komp_lain[]" value=""></td>
                    <td class="text-sm"><input type="text" class="teks" name="komp_pjk[]" value=""></td>
                    <td class="text-sm"><input type="text" class="teks" name="total_brt[]" value=""></td>
  
                  </tr>
                </tbody>
               
              </table>
            </div>
          </div>
        </div>
        <div class="card-footer fixed-bottom">
          <button type="button"  id="addRow" class="btn btn-success btn-circle float-right"><i class="fas fa-plus fa-1x"></i></button>
          <button type="button"  id="delRow" class="btn btn-danger btn-circle float-right"><i class="fas fa-minus fa-1x"></i></button>

        </div>
    </div>        
  </div>
</section>



<script>
  $(document).ready(function(){
    $(document).on('click', '#pilih_dipa',function(){
      var opt      = $(this).data('output');
      var sopt      = $(this).data('suboutput');
      var komp   = $(this).data('komponen');
      var skomp = $(this).data('subkomponen');
      $('#opt').val(opt);
      $('#sopt').val(sopt);
      $('#komp').val(komp);
      $('#skomp').val(skomp);
      $('#modal_dipa').modal('hide');
    })
  })
</script>
<script>
  $(document).ready(function(){
    $(document).on('click', '#pilih_akun',function(){
      var akun      = $(this).data('akun');
      $('#akun').val(akun);
      $('#modal_akun').modal('hide');
    })
  })
</script>
<!-- <script>
  $(document).ready(function(){
  //nambah
    $('#addRow').on('click', function(){
      var lrow =$('#tabelrab tbody tr:last').html();
      // alert(lrow);
      $('#tabelrab tbody').append('<tr>'+lrow+'</tr>');
      $('#tabelrab tbody tr:last input').val('');
    });

  //hapus
  $('#delRow').on('click', function(){
      var lenRow =$('#tabelrab tbody tr').length;
      // alert(lenRow);
      if (lenRow == 1 || lenRow <= 1){
        alert('STOP!!');
      } else {
        $('#tabelrab tbody tr:last').remove();
      }
    })

  //hapus
  })
</script> -->
<!-- <script>
  $(document).ready(function(){
  //nambah
   var t = $('#tabelrb').DataTable({
      stateSave:false,
      responsive: true,
      autoWidth: true,
      "lengthMenu": [
        [10, 25, 50, -1],
        [10, 25, 50, "All"]
      ],
      "columnDefs": [
      {
        'targets': [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16],
        'orderable': false,
      },
      ],
  });
  var no = 1;
  $('#addRow').on('click', function(){
    t.row.add([
      no +'.',
      '<input type="checkbox" name="chkDel[]"/>',
      '<input  type="text" class="teks text-sm form-control" name="nm_rab[]" value="">',
      '<input  type="text" class="teks text-sm form-control" name="gol[]" value="">',
      '<input  type="text" class="teks text-sm form-control" name="instansi[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_hr[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_uh[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_us[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_rep[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_tl[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_darat[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_taksi[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_tiket[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_akom[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_lain[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="komp_pjk[]" value="">',
      '<input  type="text" class="teks text-sm form-control"" name="total_brt[]" value="">',
    ]).draw(false);
    no++;
  });

  $('#addRow').click();

  $('.chk').change(function(e){
    e.preventDefault();
    // var cbHR =document.getElementById("cbHR");
  
    // Get the column API object
    var column = t.column( $(this).attr('data-column') );

    // Toggle the visibility
    if ($(this).is(':checked')){
      column.visible (! column.visible());
    } else {
      column.visible (! column.visible());
    }
  });

})  
</script> -->
<script>
 $(document).ready(function(){

$('#tabelrab').SetEditable({
  $addButton: $('#but_add')

});
 })
</script>
