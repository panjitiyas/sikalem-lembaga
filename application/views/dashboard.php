<!--------CONTENT START----------->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Beranda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
                    </li>
                </ol>
            </div>
</section>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <?php $this->load->view('pesan'); ?>
    <?php foreach ($alert->result() as $key => $dt) { ?>
        <?php if ($dt->status_alert == 1 && $dt->jenis == 1) { ?>
            <div class="alert <?= $dt->warna_alert ?> alert-dismissible fade show" role="alert">
                <strong><?= $dt->judul_alert ?></strong> <?= $dt->isi_alert ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
    <?php } ?>
    <div class="card card-outline card-navy">
        <div class="card-header">
            <h2 class="card-title font-weight-bold">Info Proses Pengajuan</h2>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row text-center mx-auto">
                    <div class="col-sm-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-danger"><i class="fas fa-file-download"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-danger font-weight-bold">Belum Proses</span>
                                <span class="info-box-number">
                                    <?php
                                    $x   = $this->fungsi->user_login()->nama;
                                    $y   = 'Putri Nailatul Himma';
                                    $z   = $this->fungsi->user_login()->subs;
                                    if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
                                        echo count_masuk();
                                    } elseif ($this->session->userdata('level') == 6) {
                                        echo count_masukbp($x);
                                    } elseif ($this->session->userdata('level') == 5 && $this->fungsi->user_login()->nama == $y) {
                                        echo count_masukakom($y);
                                    } elseif ($this->session->userdata('level') == 5 && $this->fungsi->user_login()->nama != $y) {
                                        echo count_masuk2($x);
                                    } else {
                                        echo count_masuksub($z);
                                    } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-primary"><i class="fas fa-file-alt"></i></span>

                            <div class="info-box-content">
                                <span class="info-box-text text-primary font-weight-bold">Proses</span>
                                <span class="info-box-number" id="proses">
                                    <?php
                                    $x   = $this->fungsi->user_login()->nama;
                                    $y   = 'Putri Nailatul Himma';
                                    $z   = $this->fungsi->user_login()->subs;
                                    if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
                                        echo count_proses();
                                    } elseif ($this->fungsi->user_login()->level == 6) {
                                        echo count_prosesbp($x);
                                    } elseif ($this->session->userdata('level') == 5 && $this->fungsi->user_login()->nama == $y) {
                                        echo count_prosesakom($y);
                                    } elseif ($this->session->userdata('level') == 5 && $this->fungsi->user_login()->nama != $y) {
                                        echo count_proses2($x);
                                    } else {
                                        echo count_prosessub($z);
                                    } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="fas fa-file-archive"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text text-success font-weight-bold">Selesai LPJ</span>
                                <span class="info-box-number" id="lpj">
                                    <?php
                                    $x   = $this->fungsi->user_login()->nama;
                                    $y   = 'Putri Nailatul Himma';
                                    $z   = $this->fungsi->user_login()->subs;
                                    if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) {
                                        echo count_lpj();
                                    } elseif ($this->fungsi->user_login()->level == 6) {
                                        echo count_lpjbp($x);
                                    } elseif ($this->session->userdata('level') == 5 && $this->fungsi->user_login()->nama == $y) {
                                        echo count_lpjakom($y);
                                    } elseif ($this->session->userdata('level') == 5 && $this->fungsi->user_login()->nama != $y) {
                                        echo count_lpj2($x);
                                    } else {
                                        echo count_lpjsub($z);
                                    } ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php if ($this->session->userdata('level') == 2 or $this->session->userdata('level') == 1 or $this->session->userdata('level') == 6) { ?>
                        <div class="row">
                            <div class="col-sm-12 ">
                                <a href="<?= site_url('rekap') ?>" class="text-orange float-right"> <span class="spinner-grow spinner-grow-sm float right" role="status"></span> cek selengkapnya...</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php if ($this->session->userdata('level') == 2 or $this->session->userdata('level') == 1 or $this->session->userdata('level') == 6) { ?>
        <div class="card card-outline card-orange">
            <div class="card-header">
                <h2 class="card-title font-weight-bold">Info PUMK</h2>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">

                        <?php foreach ($row->result() as $key => $data) { ?>
                            <div class="col-md-3">
                                <!-- Widget: user widget style 1 -->
                                <div class="card card-widget widget-user">
                                    <!-- Add the bg color to the header using any of the bg-* classes -->
                                    <!-- <div class="card-header bg-danger"> -->
                                    <?php
                                    if ($data->bpp == "Budi Harin P") {
                                        echo '<div class="card-header bg-warning">';
                                    } else {
                                        echo '<div class="card-header bg-teal">';
                                    }
                                    ?>
                                    <h6 class="card-title font-weight-bold"><?= $data->pumk_nm ?></h6>
                                </div>
                                <div class="layout-sm-footer-fixed">
                                    <div class="row">
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header text-danger"><?= hitung_data($data->pumk_nm) ?></h5>
                                                <span class="description-text text-danger">Belum</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header text-primary"><?= hitung_proses($data->pumk_nm) ?></h5>
                                                <span class="description-text text-primary">Proses</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-sm-4">
                                            <div class="description-block">
                                                <h5 class="description-header text-success"><?= hitung_lpj($data->pumk_nm) ?></h5>
                                                <span class="description-text text-success">LPJ</span>
                                            </div>
                                            <!-- /.description-block -->
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                            </div>
                            <!-- /.widget-user -->
                    </div>
                <?php } ?>
                <?php if ($this->session->userdata('level') != 6 || $this->session->userdata('level') == 2 || $this->session->userdata('level') == 1) { ?>
                    <div class="col-md-3">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <!-- <div class="card-header bg-danger"> -->
                            <div class="card-header bg-secondary">
                                <?php $pumkom = "Putri Nailatul Himma" ?>
                                <h5 class="card-title font-weight-bold">Akomodasi</h5>
                            </div>
                            <div class="layout-sm-footer-fixed">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header text-danger"><?= hitung_dataakom($pumkom) ?></h5>
                                            <span class="description-text text-danger">Belum</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header text-primary"><?= hitung_prosesakom($pumkom) ?></h5>
                                            <span class="description-text text-primary">Proses</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header text-success"><?= hitung_lpjakom($pumkom) ?></h5>
                                            <span class="description-text text-success">LPJ</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                <?php } else { ?>
                    <div class="col-md-3">
                        <!-- Widget: user widget style 1 -->
                        <div class="card card-widget widget-user">
                            <!-- Add the bg color to the header using any of the bg-* classes -->
                            <!-- <div class="card-header bg-danger"> -->
                            <div class="card-header bg-secondary">
                                <?php $bpp = $this->fungsi->user_login()->bpp ?>
                                <h5 class="card-title font-weight-bold">Akomodasi</h5>
                            </div>
                            <div class="layout-sm-footer-fixed">
                                <div class="row">
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header text-danger"><?= hitung_dataakom2($bpp) ?></h5>
                                            <span class="description-text text-danger">Belum</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 border-right">
                                        <div class="description-block">
                                            <h5 class="description-header text-primary"><?= hitung_prosesakom2($bpp) ?></h5>
                                            <span class="description-text text-primary">Proses</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4">
                                        <div class="description-block">
                                            <h5 class="description-header text-success"><?= hitung_lpjakom2($bpp) ?></h5>
                                            <span class="description-text text-success">LPJ</span>
                                        </div>
                                        <!-- /.description-block -->
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.widget-user -->
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        </div>
    <?php } ?>
    <?php foreach ($alert->result() as $key => $dt) : ?>
        <?php if ($dt->status_alert == 1 && $dt->jenis == 0) : ?>
            <marquee class="alert <?=$dt->warna_alert?>" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                <!-- <div id="marquee"> -->
                <?= $dt->isi_alert ?>
                <!-- </div> -->
            </marquee>
        <?php endif ?>
    <?php endforeach ?>
</section>
<!-- <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
<script>
$(document).ready(function() {
load_chart();
$('#refresh').click(function(){
  load_chart();
})
Pusher.logToConsole = true;

var pusher = new Pusher('32b201d0d6662e79c8b3', {
  cluster: 'ap1',
  forceTLS: true
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  load_chart();
});

function load_chart(){
  $('#mychart').load('<?= site_url('dashboard/getchart') ?>');
}
})
</script> -->