<!DOCTYPE html>
<html lang="en">
<!--------------------HEADER START------------------------------->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SiKalem | Sistem Informasi Keuangan Kelembagaan</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/sweetalert2-9/package/dist/sweetalert2.css">
    <!-- Font Awesome -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico" type="image/ico" />
    <!-- <link href='http://blog.gongsoft.com/favicon.ico' rel='icon' type='image/x-icon'/> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/timetable.js-master/timetable.js-master/dist/styles/timetablejs.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/responsive/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> -->
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/favicon.ico" type="image/ico"> -->
    <!-- <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.semanticui.min.css"> -->
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/bootstrap/css/bootstrap.css"> -->
    <!-- FullCalendar -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar2/fullcalendar.min.css">
    <!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/core/main.css"> -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/daygrid/main.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/timegrid/main.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/bootstrap/main.css">
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css"> -->


    <style type="text/css">
        .modal {
            overflow-y: auto !important;
            ;
        }
    </style>

    <style type="text/css">
        .fc-sun {
            color: red;
        }

        .fc-sat {
            color: red;
        }

        table.table-fit {
            width: 100%;
            table-layout: auto !important;
        }

        table.table-fit thead th,
        table.table-fit tfoot th {
            width: 100%;
        }

        table.table-fit tbody td,
        table.table-fit tfoot td {
            width: auto !important;
        }

        table th.fit {
            white-space: nowrap;
            width: 1%;
        }

        table {
            position: relative;
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            /* background-color: #A4A4A4; */
            /* border: 2px solid black; */
            /* table-layout: fixed; */
        }

        td input.teks {
            /* position: absolute; */
            display: block;
            top: 0;
            left: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            border: none;
            padding: 2px;
            box-sizing: border-box;
            /* width: 100%;
        box-sizing: border-box; */
        }

        /* .fc-unthemed td.fc-today {
      color: white;
      
    } */

        /* .fc-ltr .fc-dayGrid-view .fc-day-top .fc-day-number {
      float: none;
    } */

        .fc-day-top {
            text-align: right !important;
        }

        .fc-day.fc-today {
            position: relative;
        }

        .fc-day.fc-today::before,
        .fc-day.fc-today::after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            left: 0px;
            bottom: 0px;
            border-color: transparent;
            border-style: solid;
        }

        .fc-day.fc-today::before {
            border-width: 1px;
        }

        .fc-day.fc-today::after {
            border-radius: 0;
            border-width: 3px;

            border-bottom-color: darkred;
        }
    </style>
    <style>
        .ui-datepicker {
            z-index: 9999999 !important;
        }
    </style>

    <!-- Daterange picker -->
    <link rel=" stylesheet" href="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.css" />

    <!-- <style type='text/css'>
        /*<![CDATA[*/
        /* Marquee */
        .marquee {
            padding: 0 20px;
            width: 100%;
            background: darkred;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -webkit-box-shadow: 2px 2px 3px rgba(0, 0, 0, .05);
            -o-box-shadow: 2px 2px 3px rgba(0, 0, 0, .05);
            -ms-box-shadow: 2px 2px 3px rgba(0, 0, 0, .05);
            box-shadow: 2px 2px 3px rgba(0, 0, 0, .05)
        }

        #marquee {
            padding: 10px 0;
            width: 100%;
            overflow: hidden;
            color: white;
            font-size: 15px;
            font-weight: 400;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /*]]>*/
    </style> -->







</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- hold-transition sidebar-mini layout-fixed text-sm -->
    <!-- hold-transition sidebar-mini layout-navbar-fixed -->
    <div class="wrapper">

        <!--------------------SIDEBAR NAVBAR-START------------------------------->


        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-navy navbar-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href=#><i class="fas fa-bars"></i></a>
                </li>

                <li class="nav-item mt-1">
                    <span class="font-weight-normal text-light text-sm"> Sistem Informasi</span>
                    <span class="font-weight-normal text-warning text-sm"> Keuangan Kelembagaan</span>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">

                <!-- <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="">
            <span class="badge badge-danger navbar-badge" id="pesanmasuk"></span>
            <i class="nav-icon fa fa-envelope"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <div class="bg-light-gray" id="listpesan"></div>
            <hr>
          </div>
        </li> -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href=#>
                        <i class="fa fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <p class="font-weight-normal text-center mt-2"><span class="text-gray">Hai, </span><span class="text-gray-dark"><b><?= $this->fungsi->user_login()->nama ?></b></span></p>
                        <p class="font-weight-normal text-center"><span class="text-gray">Anda masuk sebagai </span>
                            <span class="text-warning">
                                <b> <?php $level = $this->fungsi->user_login()->level;
                                    if ($level == 1) {
                                        echo "Super-Admin";
                                    } elseif ($level == 2) {
                                        echo "Admin";
                                    } elseif ($level == 3) {
                                        echo "Operator SPM";
                                    } elseif ($level == 4) {
                                        echo "Operator SPP";
                                    } elseif ($level == 5) {
                                        echo "PUMK";
                                    } elseif ($level == 6) {
                                        echo "BPP";
                                    } else {
                                        echo "Admin Substansi";
                                    }
                                    ?> </b>
                            </span>
                        </p>
                        <hr>
                        <p class="text-left ml-4"><a href="<?= site_url('auth/gantipassword/' . $this->fungsi->user_login()->user_id) ?>" class="text-muted"><i class="fas fa-cog"></i> Ubah Kata Sandi</a></p>
                        <hr>
                        <p class="text-left ml-4"><a href="<?= site_url('auth/logout') ?>" class="text-muted"> <i class="fas fa-sign-out-alt"></i> Keluar</a></p>
                        <hr>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-orange elevation-4">
            <!-- Brand Logo -->
            <a href="<?= site_url('dashboard') ?>" class="brand-link elevation-4">
                <img src="<?= base_url('assets') ?>/dist/img/dikbud.png" alt="SI-Kalem" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-dark">SI-<strong>Kalem</strong>
                </span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="true">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="<?php echo site_url('dashboard') ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == 'auth' || $this->uri->segment(1) == "" ? 'active"' : "" ?>">
                                <i class="nav-icon fas fa-home"></i>
                                <p>
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'proses_tu' || $this->uri->segment(1) == 'proses_pumk' || $this->uri->segment(1) == 'proses_verif' || $this->uri->segment(1) == 'proses_spp' && $this->uri->segment(2) == '' || $this->uri->segment(1) == 'proses_spm' || $this->uri->segment(1) == 'rekap' || $this->uri->segment(2) == 'data_gup' || $this->uri->segment(1) == "" ? 'menu-open' : "" ?>">
                            <a href=# class="nav-link <?= $this->uri->segment(1) == 'proses_tu' || $this->uri->segment(1) == 'proses_pumk' || $this->uri->segment(1) == 'proses_verif' || $this->uri->segment(1) == 'proses_spp' && $this->uri->segment(2) == '' || $this->uri->segment(1) == 'proses_spm' || $this->uri->segment(1) == 'rekap' || $this->uri->segment(2) == 'data_gup' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                <i class="nav-icon fas fa-fw fa-tasks"></i>
                                <p>
                                    Pengajuan
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <?php if (
                                    $this->session->userdata('level') == 7 or $this->session->userdata('level') == 1 or $this->session->userdata('level') == 2
                                ) {  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('proses_tu') ?>" class="nav-link <?= $this->uri->segment(1) == 'proses_tu' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Menu Substansi</p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (
                                    $this->session->userdata('level') == 6 or $this->session->userdata('level') == 1 or $this->session->userdata('level') == 2
                                ) {  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('proses_verif') ?>" class="nav-link <?= $this->uri->segment(1) == 'proses_verif' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <?php if ($this->session->userdata('level') == 6) {
                                                $bpp = $this->fungsi->user_login()->bpp; ?>

                                                <?php
                                                $hit = hitung_baru($bpp);
                                                if ($hit == 0) { ?>
                                                    <p>Menu BPP</p>
                                                <?php } else { ?>
                                                    <p>Menu BPP <span class="badge badge-danger"> <?= hitung_baru($bpp) ?></span></p>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <p>Menu BPP</p>
                                            <?php } ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (
                                    $this->session->userdata('level') == 5 or $this->session->userdata('level') == 1 or $this->session->userdata('level') == 2
                                ) {  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('proses_pumk') ?>" class="nav-link <?= $this->uri->segment(1) == 'proses_pumk' && $this->uri->segment(2) == ''  || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class=" far fa-circle nav-icon"></i>
                                            <?php if ($this->session->userdata('level') == 5) {
                                                $pumk = $this->fungsi->user_login()->nama; ?>
                                                <?php $cekk = hitung_belumproses($pumk);
                                                $cekkakom = hitung_belumprosesakom($pumk);
                                                if ($cekk == 0 && $cekkakom == 0) { ?>
                                                    <p>Menu PUMK</p>
                                                <?php } else { ?>
                                                    <?php if ($this->fungsi->user_login()->nama != "Putri Nailatul Himma") { ?>
                                                        <p>Menu PUMK <span class="badge badge-danger"> <?= hitung_belumproses($pumk) ?></span></p>
                                                    <?php } else { ?>
                                                        <p>Menu PUMK <span class="badge badge-danger"> <?= hitung_belumprosesakom($pumk) ?></span></p>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } else { ?>
                                                <p>Menu PUMK</p>
                                            <?php } ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (
                                    $this->session->userdata('level') == 1 or $this->session->userdata('level') == 2
                                ) {  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('proses_pumk/menu_akom') ?>" class="nav-link <?= $this->uri->segment(1) == 'proses_pumk' && $this->uri->segment(2) == 'menu_akom' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Menu Akomodasi</p>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (
                                    $this->session->userdata('level') == 6 or $this->session->userdata('level') == 1 or $this->session->userdata('level') == 2
                                ) {  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('rekap') ?>" class="nav-link <?= $this->uri->segment(1) == 'rekap' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Rekap Pengajuan</p>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'info' || $this->uri->segment(1) == 'calendar' || $this->uri->segment(1) == 'db_rek' || $this->uri->segment(1) == 'cek_anggar' || $this->uri->segment(1) == "" ? 'menu-open' : "" ?>">
                            <a href=# class="nav-link <?= $this->uri->segment(1) == 'info' || $this->uri->segment(1) == 'calendar' || $this->uri->segment(1) == 'db_rek' || $this->uri->segment(1) == 'cek_anggar' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                <i class="nav-icon fas fa-fw fa-info-circle"></i>
                                <p>
                                    Informasi
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= site_url('info') ?>" class="nav-link <?= $this->uri->segment(1) == 'info' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Informasi Keuangan</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=<?= site_url('cek_anggar') ?> class="nav-link <?= $this->uri->segment(1) == 'cek_anggar' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Informasi Anggaran</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href=<?= site_url('db_rek') ?> class="nav-link <?= $this->uri->segment(1) == 'db_rek' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Informasi Rekening</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= site_url('calendar') ?>" class="nav-link <?= $this->uri->segment(1) == 'calendar' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Kalender Keuangan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'dok' || $this->uri->segment(1) == "" ? 'menu-open' : "" ?>">
              <a href=# class="nav-link <?= $this->uri->segment(1) == 'dok' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                  Arsip
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('dok') ?>" class="nav-link <?= $this->uri->segment(1) == 'dok' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Undangan/Surtug/SK</p>
                  </a>
                </li>
              </ul>
            </li> -->
                        <!-- <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'pesan_out' || $this->uri->segment(1) == 'pesan' || $this->uri->segment(1) == "" ? 'menu-open' : "" ?>">
              <a href=# class="nav-link <?= $this->uri->segment(1) == 'pesan_out' || $this->uri->segment(1) == 'pesan' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                <i class="nav-icon fas fa-fw fa-envelope"></i>
                <p>
                  Kotak Pesan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('pesan') ?>" class="nav-link <?= $this->uri->segment(1) == 'pesan' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <span class="badge badge-danger navbar-badge" id="pesanbaru"></span>
                    <p>Pesan Masuk</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('pesan_out') ?>" class="nav-link <?= $this->uri->segment(1) == 'pesan_out' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Pesan Keluar</p>
                  </a>
                </li>
              </ul>
            </li> -->
            <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 6 || $this->fungsi->user_login()->level == 5) :  ?>
                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'agenda_tu' ||  $this->uri->segment(1) == 'manifest_tiket' || $this->uri->segment(1) == "tools" ? 'menu-open' : "" ?>">
                                <a href="#" class="nav-link <?= $this->uri->segment(1) == 'agenda_tu' ||  $this->uri->segment(1) == 'manifest_tiket' || $this->uri->segment(1) == "tools" ? 'active' : "" ?>">
                                    <i class="nav-icon fas fa-fw fa-toolbox"></i>
                                    <p>
                                        Modul Pendukung
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2 || $this->fungsi->user_login()->level == 6) :  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('agenda_tu') ?>" class="nav-link <?= $this->uri->segment(1) == 'agenda_tu' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Agenda</p>
                                        </a>
                                    </li>
                                <?php endif ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('manifest_tiket') ?>" class="nav-link <?= $this->uri->segment(1) == 'manifest_tiket' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Manifest Tiket</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('tools') ?>" class="nav-link <?= $this->uri->segment(1) == 'tools' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Aplikasi Pendukung</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                    <?php if ($this->fungsi->user_login()->level == 1 || $this->fungsi->user_login()->level == 2) :  ?>
                            <li class="nav-item has-treeview <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'ksubs' || $this->uri->segment(1) == 'pumk' || $this->uri->segment(1) == 'bpp' || $this->uri->segment(1) == 'spp' || $this->uri->segment(1) == 'spm' || $this->uri->segment(1) == 'sisbayar' || $this->uri->segment(1) == 'jeniskeg' || $this->uri->segment(1) == 'alert' || $this->uri->segment(1) == 'dipa' || $this->uri->segment(1) == 'akun' || $this->uri->segment(1) == "" ? 'menu-open' : "" ?>">
                                <a href="#" class="nav-link <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == 'ksubs' || $this->uri->segment(1) == 'pumk' || $this->uri->segment(1) == 'bpp' || $this->uri->segment(1) == 'spp' || $this->uri->segment(1) == 'spm' || $this->uri->segment(1) == 'sisbayar' || $this->uri->segment(1) == 'jeniskeg' || $this->uri->segment(1) == 'alert' || $this->uri->segment(1) == 'dipa' || $this->uri->segment(1) == 'akun' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                    <i class="nav-icon fas fa-fw fa-cogs"></i>
                                    <p>
                                        Pengaturan
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                <?php if ($this->fungsi->user_login()->level == 1) :  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('user') ?>" class="nav-link <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Pengguna</p>
                                        </a>
                                    </li>
                                <?php endif ?>
                                <?php if ($this->fungsi->user_login()->level == 1) :  ?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('ksubs') ?>" class="nav-link <?= $this->uri->segment(1) == 'ksubs' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kelompok Substansi</p>
                                        </a>
                                    </li>
                                <?php endif?>
                                    <li class="nav-item">
                                        <a href="<?= site_url('pumk') ?>" class="nav-link <?= $this->uri->segment(1) == 'pumk' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Petugas PUMK</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('dipa') ?>" class="nav-link <?= $this->uri->segment(1) == 'dipa' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kode Anggaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('akun') ?>" class="nav-link <?= $this->uri->segment(1) == 'akun' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Kode Akun</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('sisbayar') ?>" class="nav-link <?= $this->uri->segment(1) == 'sisbayar' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Mekanisme Pembayaran</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('bpp') ?>" class="nav-link <?= $this->uri->segment(1) == 'bpp' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Data BPP</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?= site_url('alert') ?>" class="nav-link <?= $this->uri->segment(1) == 'alert' || $this->uri->segment(1) == "" ? 'active' : "" ?>">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Info Alert</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li class="nav-item">
                            <a href="<?= site_url('auth/logout') ?>" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    Keluar
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <script src="<?php echo base_url() ?>assets/plugins/timetable.js-master/timetable.js-master/dist/scripts/timetable.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
        <script src="<?= base_url('assets') ?>/plugins/sweetalert2-9/package/dist/sweetalert2.all.js"></script>
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
        <script src="https://js.pusher.com/5.1/pusher.min.js"></script>
        <script src="<?php echo base_url() ?>assets/plugins/bootstable/bootstable.js"></script>





        <!--------------------MAIN CONTENT------------------------------->
        <div class="content-wrapper">
            <?php echo $contents ?>
            <!-- <div class="row">
        <div class="col-auto">
          <div class="btn btn-warning position-fixes btn-flat float-right align-bottom mt-40 text-center"><i class="fa fa-paper-plane"></i></div>
        </div>
      </div> -->

        </div>

        <!--------------------------FOOTER------------------------------>

        <!-- <footer class="main-footer text-xs"> -->
        <!--style="font-size:80-->
        <!-- <p> Sistem Informasi Keuangan Kelembagaan <br>Copyright &copy; Keuangan <strong style="color:navy">Kelembagaan</strong> 2020</p>
    </footer> -->

    </div>
    <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/moment/moment-with-locales.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js"></script>
    <script src="<?php echo base_url() ?>assets/dist/js/moment-timezone-with-data.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/moment/main.min.js"></script> -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/moment/main.js"></script> -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/moment-timezone/main.js"></script> -->
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar2/fullcalendar.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar2/gcal.js"></script>
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar-daygrid/main.js"></script> -->
  <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar-interaction/main.js"></script> -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/core/main.js"></script> -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/daygrid/main.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/timegrid/main.js"></script> -->
  <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/list/main.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/interaction/main.js"></script> -->
  <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/bootstrap/main.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/core/locales-all.js"></script> -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/fullcalendar/packages/google-calendar/main.js"></script> -->
    <!-- Tempusdominus Bootstrap 4 -->

    <!-- <script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script> -->


    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.js"></script>
    <!-- Bootstrap 4 -->

    <!-- <script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script> -->
    <!-- ChartJS -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script> -->
    <!-- Sparkline -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/sparklines/sparkline.js"></script> -->
    <!-- jQuery Knob Chart -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script> -->
    <!-- <script src="<?php echo base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script> -->
    <!-- daterangepicker -->

    <script src="<?php echo base_url() ?>assets/plugins/jquery-mask-plugin-1.14.16/package/dist/jquery.mask.min.js"></script>



    <!-- AdminLTE App -->

    <script src="<?php echo base_url() ?>assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="<?php echo base_url() ?>assets/plugins/jquery-maskmoney/dist/jquery.maskMoney.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/datatables.min.js"></script>
    <script>
        $('#datepicker5').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'id',
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-alt",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            ignoreReadonly: true,
        });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
    <script>
        $('#datepicker4').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'id',
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-alt",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            ignoreReadonly: true,
        });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
    <script>
        $('#datepicker2').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'id',
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-alt",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            ignoreReadonly: true,
        });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
    <script>
        $('#datepicker3').datetimepicker({
            format: 'YYYY-MM-DD HH:mm',
            locale: 'id',
            icons: {
                time: "fa fa-clock",
                date: "fa fa-calendar-alt",
                up: "fa fa-arrow-up",
                down: "fa fa-arrow-down"
            },
            ignoreReadonly: true,
        });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
    <script>
        $('.tanggal').datepicker({
            dateFormat: "dd-mm-yy",
            changeMonth: true,
        });
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                stateSave: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }

            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#table2').DataTable({
                stateSave: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }

            })
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#table4').dataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": [0, 2, 3]
                }],
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                stateSave: true,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                }

            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip({
                boundary: 'window',
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.uang').mask('000.000.000.000', {
                reverse: true
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init()
        })
    </script>
    <!-- <script type='text/javascript'>
        //<![CDATA[
        ! function(e) {
            e.fn.marquee = function(t) {
                return this.each(function() {
                    var i, a, n, r, s, o = e.extend({}, e.fn.marquee.defaults, t),
                        u = e(this),
                        d = 3,
                        p = "animation-play-state",
                        f = !1,
                        l = function(e, t, i) {
                            for (var a = ["webkit", "moz", "MS", "o", ""], n = 0; n < a.length; n++) a[n] || (t = t.toLowerCase()), e.addEventListener(a[n] + t, i, !1)
                        },
                        c = function(e) {
                            var t, i = [];
                            for (t in e) e.hasOwnProperty(t) && i.push(t + ":" + e[t]);
                            return i.push(), "{" + i.join(",") + "}"
                        },
                        m = {
                            pause: function() {
                                f && o.allowCss3Support ? i.css(p, "paused") : e.fn.pause && i.pause(), u.data("runningStatus", "paused"), u.trigger("paused")
                            },
                            resume: function() {
                                f && o.allowCss3Support ? i.css(p, "running") : e.fn.resume && i.resume(), u.data("runningStatus", "resumed"), u.trigger("resumed")
                            },
                            toggle: function() {
                                m["resumed" == u.data("runningStatus") ? "pause" : "resume"]()
                            },
                            destroy: function() {
                                clearTimeout(u.timer), u.css("visibility", "hidden").html(u.find(".js-marquee:first")), setTimeout(function() {
                                    u.css("visibility", "visible")
                                }, 0)
                            }
                        };
                    if ("string" == typeof t) e.isFunction(m[t]) && (i || (i = u.find(".js-marquee-wrapper")), !0 === u.data("css3AnimationIsSupported") && (f = !0), m[t]());
                    else {
                        var g;
                        e.each(o, function(e) {
                            if (g = u.attr("data-" + e), "undefined" != typeof g) {
                                switch (g) {
                                    case "true":
                                        g = !0;
                                        break;
                                    case "false":
                                        g = !1
                                }
                                o[e] = g
                            }
                        }), o.duration = o.speed || o.duration, r = "up" == o.direction || "down" == o.direction, o.gap = o.duplicated ? o.gap : 0, u.wrapInner('<div class="js-marquee"></div>');
                        var h = u.find(".js-marquee").css({
                            "margin-right": o.gap,
                            "float": "left"
                        });
                        if (o.duplicated && h.clone(!0).appendTo(u), u.wrapInner('<div style="width:100000px" class="js-marquee-wrapper"></div>'), i = u.find(".js-marquee-wrapper"), r) {
                            var v = u.height();
                            i.removeAttr("style"), u.height(v), u.find(".js-marquee").css({
                                "float": "none",
                                "margin-bottom": o.gap,
                                "margin-right": 0
                            }), o.duplicated && u.find(".js-marquee:last").css({
                                "margin-bottom": 0
                            });
                            var y = u.find(".js-marquee:first").height() + o.gap;
                            o.duration *= (parseInt(y, 10) + parseInt(v, 10)) / parseInt(v, 10)
                        } else s = u.find(".js-marquee:first").width() + o.gap, a = u.width(), o.duration *= (parseInt(s, 10) + parseInt(a, 10)) / parseInt(a, 10);
                        if (o.duplicated && (o.duration /= 2), o.allowCss3Support) {
                            var h = document.body || document.createElement("div"),
                                w = "marqueeAnimation-" + Math.floor(1e7 * Math.random()),
                                S = ["Webkit", "Moz", "O", "ms", "Khtml"],
                                x = "animation",
                                b = "",
                                q = "";
                            if (h.style.animation && (q = "@keyframes " + w + " ", f = !0), !1 === f)
                                for (var j = 0; j < S.length; j++)
                                    if (void 0 !== h.style[S[j] + "AnimationName"]) {
                                        h = "-" + S[j].toLowerCase() + "-", x = h + x, p = h + p, q = "@" + h + "keyframes " + w + " ", f = !0;
                                        break
                                    } f && (b = w + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s infinite " + o.css3easing, u.data("css3AnimationIsSupported", !0))
                        }
                        var I = function() {
                                i.css("margin-top", "up" == o.direction ? v + "px" : "-" + y + "px")
                            },
                            C = function() {
                                i.css("margin-left", "left" == o.direction ? a + "px" : "-" + s + "px")
                            };
                        o.duplicated ? (r ? i.css("margin-top", "up" == o.direction ? v : "-" + (2 * y - o.gap) + "px") : i.css("margin-left", "left" == o.direction ? a + "px" : "-" + (2 * s - o.gap) + "px"), d = 1) : r ? I() : C();
                        var A = function() {
                            if (o.duplicated && (1 === d ? (o._originalDuration = o.duration, o.duration = r ? "up" == o.direction ? o.duration + v / (y / o.duration) : 2 * o.duration : "left" == o.direction ? o.duration + a / (s / o.duration) : 2 * o.duration, b && (b = w + " " + o.duration / 1e3 + "s " + o.delayBeforeStart / 1e3 + "s " + o.css3easing), d++) : 2 === d && (o.duration = o._originalDuration, b && (w += "0", q = e.trim(q) + "0 ", b = w + " " + o.duration / 1e3 + "s 0s infinite " + o.css3easing), d++)), r ? o.duplicated ? (d > 2 && i.css("margin-top", "up" == o.direction ? 0 : "-" + y + "px"), n = {
                                    "margin-top": "up" == o.direction ? "-" + y + "px" : 0
                                }) : (I(), n = {
                                    "margin-top": "up" == o.direction ? "-" + i.height() + "px" : v + "px"
                                }) : o.duplicated ? (d > 2 && i.css("margin-left", "left" == o.direction ? 0 : "-" + s + "px"), n = {
                                    "margin-left": "left" == o.direction ? "-" + s + "px" : 0
                                }) : (C(), n = {
                                    "margin-left": "left" == o.direction ? "-" + s + "px" : a + "px"
                                }), u.trigger("beforeStarting"), f) {
                                i.css(x, b);
                                var t = q + " { 100%  " + c(n) + "}",
                                    p = e("style");
                                0 !== p.length ? p.filter(":last").append(t) : e("head").append("<style>" + t + "</style>"), l(i[0], "AnimationIteration", function() {
                                    u.trigger("finished")
                                }), l(i[0], "AnimationEnd", function() {
                                    A(), u.trigger("finished")
                                })
                            } else i.animate(n, o.duration, o.easing, function() {
                                u.trigger("finished"), o.pauseOnCycle ? u.timer = setTimeout(A, o.delayBeforeStart) : A()
                            });
                            u.data("runningStatus", "resumed")
                        };
                        u.bind("pause", m.pause), u.bind("resume", m.resume), o.pauseOnHover && u.bind("mouseenter mouseleave", m.toggle), f && o.allowCss3Support ? A() : u.timer = setTimeout(A, o.delayBeforeStart)
                    }
                })
            }, e.fn.marquee.defaults = {
                allowCss3Support: !0,
                css3easing: "linear",
                easing: "linear",
                delayBeforeStart: 1e3,
                direction: "left",
                duplicated: !1,
                duration: 5e3,
                gap: 20,
                pauseOnCycle: !1,
                pauseOnHover: !1
            }
        }(jQuery);
        $("#marquee").marquee({
            duration: 1e4,
            gap: 50,
            delayBeforeStart: 0,
            direction: "left",
            duplicated: !0,
            pauseOnHover: !0
        });
        //]]>
    </script> -->

</body>

</html>