<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kwitansi Tanda Terima UMK</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/responsive/css/responsive.bootstrap.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css">



</head>
<body>
  <div class="container">
    <table class="table table-borderless table-sm" width="100%">
      <thead>
        <tr>
          <td>LOGO</td>
          <td class="text-center"width ="85%"  colspan="3"><span>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN <br><b>DIREKTORAT JENDERAL PENDIDIKAN TINGGI</b><br>Jalan Pintu Satu Senayan, Jakarta Pusat 10270<br></span></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4" class="text-center"><h2><b>KUITANSI</b></h2></td>
        </tr>
        <tr></tr>
        <tr>
          <td width="200px">Sudah Diterima Dari</td>
          <td width="1px">:</td>
          <td colspan="2" width="80%"> Kuasa Pengguna Anggaran Direktorat Kelembagaan Ditjen Pendidikan Tinggi</td>
        </tr>
        <tr>
          <td width="120px">Jumlah Uang</td>
          <td width="1px">:</td>
          <td colspan="2" width="80%"><span class="font-weight-bold"><?php echo 'Rp. '.number_format($row->nilai_umk,0, ',', '.');?></span></td>
        </tr>
        <tr>
          <td width="120px">Uang Sebesar</td>
          <td width="1px">:</td>
          <td colspan="2" width="80%">...... </td>
        </tr>
        <tr>
          <td width="200px">Untuk Pembayaran</td>
          <td width="1px">:</td>
          <td colspan="2" width="80%">Uang Muka Kegiatan <?php echo $row->nm_keg?> pd tanggal <?=tanggal_indonesia($row->tgl_mulai)?> </td>
        </tr>
        <tr></tr>
        <tr>
          <td colspan="4" class="text-right">Jakarta <?= tanggal_indonesia($row->tgl_umk)?></td>
        </tr>
        <tr>
          <td colspan="3" class="text-left">Bendahara Pengeluaran Pembantu</td>
          <td class="text-left" width="15%">Penerima,</td><br>
        </tr>
      </tbody>
    </table>
    <br><br>
    <table class="table table-borderless table-sm" width="100%">
      <tr>
        <td colspan="2"   class="text-left"><?= $row->nm_bpp?></td>
        <td colspan="2" class="text-left" width="15%"><?= $row->nm_pumk?></td>
      </tr>
    </table>
  </div>
</body>
<script>
// window.print();
</script>
</html>