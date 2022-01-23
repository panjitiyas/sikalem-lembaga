<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Agenda</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="">Modul Pendukung</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="<?= site_url('kalender') ?>">Agenda</a>
                    </li>
                </ol>
            </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-navy card-outline card-outline-tabs">
                <div class="card-header p-0 border-bottom-0">
                    <?php $this->load->view('pesan'); ?>
                    <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="false">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Income</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-three-tabContent">
                        <div class="tab-pane fade" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                            <div class="alert notification" style="display: none;">
                                <button class="close" data-close="alert"></button>
                                <p></p>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="portlet light bordered">
                                        <div class="portlet-body">
                                            <!-- place -->

                                            <div class="alert"></div>
                                            <div id="agenda"></div>
                                            <!-- end place -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                            <span class="text-xs float-right"><i>* dalam ribuan</i></span>
                            <div class="table-responsive">
                                <table id="tableincome" class="table table-sm text-sm table-striped" style="width: 100%">
                                    <thead class="bg-navy">
                                        <tr class="text-center">
                                            <th style="width:5px">#</th>
                                            <th style="width:100px">Nama</th>
                                            <th style="width:100px">Jan</th>
                                            <th style="width:100px">Feb</th>
                                            <th style="width:100px">Mar</th>
                                            <th style="width:100px">Apr</th>
                                            <th style="width:100px">Mei</th>
                                            <th style="width:100px">Jun</th>
                                            <th style="width:100px">Jul</th>
                                            <th style="width:100px">Agu</th>
                                            <th style="width:100px">Sep</th>
                                            <th style="width:100px">Okt</th>
                                            <th style="width:100px">Nov</th>
                                            <th style="width:100px">Des</th>
                                            <th style="width:100px">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($total->result() as $key => $data) : $no++; ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td data-priority="1"><a href="#" id="lihatdetil" class="text-primary" data-target="#cekgiat" data-toggle="modal" data-id="<?= $data->title?>" data-totalnilai="<?=number_format($data->Total, 0, ",", ".")?>"><?= $data->title ?></a></td>
                                                <td data-priority="10001"><?= number_format($data->Januari / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Januari / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10002"><?= number_format($data->Februari / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Februari / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10003"> <?= number_format($data->Maret / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Maret / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10004"><?= number_format($data->April / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->April / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10005"><?= number_format($data->Mei / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Mei / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10006"><?= number_format($data->Juni / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Juni / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10007"><?= number_format($data->Juli / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Juli / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10008"><?= number_format($data->Agustus / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Agustus / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10009"><?= number_format($data->September / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->September / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10010"><?= number_format($data->Oktober / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Oktober / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10011"><?= number_format($data->November / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->November / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="10012"><?= number_format($data->Desember / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Desember / 1000, 0, ",", ".") ?></td>
                                                <td data-priority="2"><?= number_format($data->Total / 1000, 0, ",", ".") == 0 ? '-' : number_format($data->Total / 1000, 0, ",", ".") ?></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- <div class="card card-shadow">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="alert notification" style="display: none;">
                        <button class="close" data-close="alert"></button>
                        <p></p>
                    </div>
                    <div class="card-header">
                        <h4> Agenda TU <h4>
                                <div class="float-right">
                                </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-body">
                                        <?php $this->load->view('pesan'); ?>
                                        <div class="alert"></div>
                                        <div id="agenda"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->
    </div>

    <!--  DETIL -->
    <div class="modal fade" id="cekgiat" tabindex="-1" role="dialog" aria-labelledby="cekgiatLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="float-right text-sm text-primary font-weight-bold" id="namanya"></h5>
                    <!-- <h5 class="modal-title" id="cekgiatLabel">Daftar Kegiatan</h5><br> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive-sm">
                        <table id="tbdetil" class="table table-sm text-sm" width="100%">
                            <thead class="bg-primary">
                                <tr class="text-center">
                                    <th width="5px">#</th>
                                    <th width="100px">Kegiatan</th>
                                    <th width="100px">Substansi</th>
                                    <th width="100px">Tgl. Awal</th>
                                    <th width="100px">Tgl. Akhir</th>
                                    <th width="100px">Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <div id="datagiat"></div> -->
                            </tbody>
                            <tfooter>
                                <tr class="bg-primary">
                                    <th></th>
                                    <th colspan="4" class="font-weight-bold">TOTAL</th>
                                    <th width="100px" class="text-center font-weight-bold"><span id="nilaitotal"></span></th>
                                </tr>
                            </tfooter>
                        </table>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <!--  ADD -->
    <div class="modal fade" id="catet" tabindex="-1" role="dialog" aria-labelledby="catetLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="<?= site_url('agenda_tu/add_event') ?>" id="form_tambah">
                    <div class="modal-header">
                        <h5 class="modal-title" id="catetLabel">Tambah Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="table-responsive">
                                <span class="float-right"><a href="#" id="list" data-target=".listkeg_modal" data-toggle="modal" class="text-primary text-sm font-weight-bold">Daftar Kegiatan</a></span><br>
                                <table class="table table-sm text-sm">
                                    <tr>
                                        <td width="20%"><b>Kegiatan</b></td>
                                        <td width="2%">:</td>
                                        <td width="68%"><span id="kegiatan"></span>
                                            <textarea name="description" id="desc" style="display:none;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><b>Substansi</b></td>
                                        <td width="2%">:</td>
                                        <td width="68%"><span id="subs"></span>
                                            <input type="hidden" id="subsval" name="substansi">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl. Mulai</b></td>
                                        <td>:</td>
                                        <td><span id="tglmulai"></span>
                                            <input type="hidden" name="start" id="start">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b> Tgl. Selesai</b></td>
                                        <td>:</td>
                                        <td><span id="tglselesai"></span>
                                            <input type="hidden" name="end" id="end">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-sm text-sm" id="tbname">
                                    <thead class="bg-navy">
                                        <tr>
                                            <th width="50%">Nama</th>
                                            <th width="40%">Nilai</th>
                                            <th width="5%" class="text-center"><a id="addR" href="#" class="text-xs text-light"><i class="fas fa-plus"></i></a></th>
                                            <th width="5%" class="text-center"><a id="delR" href="#" class="text-xs text-light"><i class="fas fa-minus"></i></a></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody1">
                                        <tr>
                                            <td>
                                                <select name="title[]" class="form-control form-control-sm">
                                                    <option value="">- Pilih -</option>
                                                    <?php foreach ($pegawai->result() as $key => $data) { ?>
                                                        <option value="<?= $data->nm_pegawai ?>"><?= $data->nm_pegawai ?></option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                            <td colspan="3"><input type="text" name="nilai[]" class="form-control form-control-sm uang"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-2">Nama</label>
                            <div class="col-sm-12">
                                <select name="title" class="form-control form-control-sm">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($pegawai->result() as $key => $data) { ?>
                                        <option value="<?= $data->nm_pegawai ?>"><?= $data->nm_pegawai ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <label class="control-label col-sm-2">Nilai</label>
                            <div class="col-sm-12">
                                <input type="text" name="nilai" class="form-control form-control-sm uang">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="hidden" name="color" class="form-control form-control-sm" id="colors">
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-success btn-sm" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!---EDIT-->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="<?= site_url('agenda_tu/edit_event') ?>" id="form_create">
                    <div class="modal-header">
                        <h6 class="modal-title" id="myModalLabel">Ubah Data</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="table-responsive">
                                <span class="float-right"><a href="#" id="list" data-target=".listkeg_modal" data-toggle="modal" class="text-primary text-sm font-weight-bold">Daftar Kegiatan</a></span><br>
                                <table class="table table-sm text-sm">
                                    <tr>
                                        <td width="20%"><b>Kegiatan</b></td>
                                        <td width="2%">:</td>
                                        <td width="68%"><span id="nmgiat"></span>
                                            <textarea name="description" class="form-control form-control-sm" id="description" style="display:none;"></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20%"><b>Substansi</b></td>
                                        <td width="2%">:</td>
                                        <td width="68%"><span id="esubs"></span>
                                            <input type="hidden" id="esubsval" name="substansi">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Tgl. Mulai</b></td>
                                        <td>:</td>
                                        <td><span id="tglstart"></span>
                                            <input type="hidden" name="start" class="form-control form-control-sm datetimepicker-input" data-target="#datepicker2" placeholder="tanggal awal" id="start_edit" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b> Tgl. Selesai</b></td>
                                        <td>:</td>
                                        <td><span id="tglend"></span>
                                            <input type="hidden" name="end" class="form-control form-control-sm" id="end_edit" readonly>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nama</label>
                                <input type="hidden" name="id" id="id_agenda" />
                                <div class="col-sm-12">
                                    <select name="title" class="form-control form-control-sm" id="title">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($pegawai->result() as $key => $data) { ?>
                                            <option value="<?= $data->nm_pegawai ?>"><?= $data->nm_pegawai ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Nilai</label>
                                <div class="col-sm-12">
                                    <input type="text" name="nilai" class="form-control form-control-sm uang" id="nilai">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="hidden" name="color" class="form-control form-control-sm" id="color">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="delete" value="1">
                                        <label class="custom-control-label" for="customCheck1">Hapus data ini?</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Yakin mau diproses?')" value="Proses">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--MODAL KEG-->
    <div class="modal fade listkeg_modal" tabindex="-1" role="dialog" aria-labelledby="listkeg_modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="listkeg_modalLabel">Daftar Kegiatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h6 class="text-center font-weight-bold text-navy">Daftar Kegiatan Direktorat Kelembagaan</h6>
                    <div class="table-responsive">
                        <table id="tablelistkeg" class="table table-sm text-sm table-striped" style="width: 100%">
                            <thead class="bg-navy">
                                <tr class="text-center">
                                    <th style="width:5px">#</th>
                                    <th style="width:90px">Substansi</th>
                                    <th style="width:200px">Kegiatan</th>
                                    <th style="width:180px" class="fit">Tgl. Kegiatan</th>
                                    <th style="width:40px">Pilih</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <!-- <div class="card card-shadow">
                        <div class="card-title">
                        </div>
                        <civ class="card-body">
                            
                        </civ>
                    </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tableincome').dataTable({
            "bAutoWidth": true,
            "responsive": true,
            "ordering": false,
            "lengthMenu": [
                [10, 15, 30, 50, -1],
                [10, 15, 30, 50, "All"]
            ],
            stateSave: false,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
        });
    })
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#tablelistkeg').dataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": '<?= site_url('agenda_tu/get_ajax') ?>',
                "type": 'POST'
            },
            "bAutoWidth": true,
            "responsive": true,
            "ordering": false,
            "lengthMenu": [
                [5, 15, 30, 50, -1],
                [5, 15, 30, 50, "All"]
            ],
            stateSave: true,
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
            },
        });
    })
</script>
<script type="text/javascript">
    var initialLocaleCode = 'id';
    var currentEvent;
    $(document).ready(function() {
        $('#agenda').fullCalendar({
            plugins: ['bootstrap', 'dayGrid', 'interaction', 'list', ' timeGrid', 'googleCalendar'],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,listMonth'
            },
            allDayDefault: true,
            defaultDate: moment().format('YYYY-MM-DD HH:mm'),
            googleCalendarApiKey: 'AIzaSyD2i--nmFcfyY2MiiVpsSlj6u2McbRuTn8',
            firstDay: 0,
            locale: initialLocaleCode,
            eventSources: [{
                    url: '<?= base_url() ?>agenda_tu/get_events',
                    dataType: 'json',
                    textColor: '#f7f4ef',
                },
                {
                    googleCalendarId: 'id.indonesian#holiday@group.v.calendar.google.com',
                    dataType: 'json',
                    color: "#ff6666",
                }
            ],
            weekNumbers: true,
            weekNumbersWithinDays: true,
            navLinks: true, // can click day/week names to navigate views
            displayEventTime: false,
            fixedWeekCount: true,
            showNonCurrentDates: true,
            minTime: '01:00:00',
            maxTime: '23:59:00',
            eventLimit: true, // allow "more" link when too many events
            selectLongPressDelay: 500,
            selectHelper: true,
            selectable: true,
            select: function(start, end) {

                $('#catet').modal('show');
                $('#catet').find('#start').val(moment(start).format('YYYY-MM-DD HH:mm'));
                $('#catet').find('#end').val(moment(end).format('YYYY-MM-DD HH:mm'));
                $('#catet').find('#subsval').val('');
                $('#catet').find('#subs').text('');
                $('#catet').find('#desc').val('');
                $('#catet').find('#kegiatan').text('');
                $('#catet').find('#tglmulai').text('');
                $('#catet').find('#tglselesai').text('');
                $('#catet').find('#color').val('');
                $('#calendarIO').fullCalendar('unselect');

            },
            editable: true,
            // resizable: true,
            eventClick: function(calEvent, jsEvent, view) {

                $('#id_agenda').val(calEvent.id_agenda);
                $('#title').val(calEvent.title);
                $('#description').val(calEvent.description);
                $('#nmgiat').text(calEvent.description);
                $('#esubs').text(calEvent.extendedProps.substansi);
                $('#esubsval').val(calEvent.extendedProps.substansi);
                var nilai = calEvent.extendedProps.nilai;
                $('#nilai').val(formatRupiah(nilai, 'Rp.'));
                $('#tglstart').text(calEvent.extendedProps.mulai);
                $('#tglend').text(calEvent.extendedProps.selesai);
                $('#color').val(calEvent.color);
                $('#start_edit').val(calEvent.start.format('YYYY-MM-DD HH:mm'));
                if (calEvent.end) {
                    $('#end_edit').val(calEvent.end.format('YYYY-MM-DD HH:mm'));
                } else {
                    $('#end_edit').val(calEvent.start.format('YYYY-MM-DD HH:mm'));
                }
                $('#edit_modal').modal();

            },
            eventDrop: function(event, delta, revertFunc, start, end) {
                var start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if (event.end) {
                    var end = event.end.format('YYYY-MM-DD HH:mm:ss');
                } else {
                    var end = start;
                }

                var id = event.id_agenda;
                $.post("<?php echo site_url(); ?>agenda_tu/edit_dropevent", {
                        start: start,
                        end: end,
                        id: id,
                    },
                    function(result) {
                        $('.alert').addClass('alert-success').text('data berhasil diperbaharui');
                        hide_notify();
                    });
            },
            eventResize: function(event, dayDelta, minuteDelta, revertFunc) {
                var start = event.start.format('YYYY-MM-DD HH:mm:ss');
                if (event.end) {
                    var end = event.end.format('YYYY-MM-DD HH:mm:ss');
                } else {
                    var end = start;
                }
                var id = event.id_agenda;

                $.post("<?php echo site_url(); ?>agenda_tu/edit_dropevent", {
                        start: start,
                        end: end,
                        id: id,
                    },
                    function(result) {
                        $('.alert').addClass('alert-success').text('data berhasil diperbaharui');
                        hide_notify();
                    });
            },
        });
        $('#agenda').fullCalendar('render');

        function hide_notify() {
            setTimeout(function() {
                $('.alert').removeClass('alert-success').text('');
            }, 1600);
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#pilihgiat', function() {
            var substansi = $(this).data('k_subs');
            var kegiatan = $(this).data('nm_keg');
            var tgl_mulai = $(this).data('mulai');
            var tgl_selesai = $(this).data('selesai');
            var mulai = $(this).data('tgl_mulai');
            var selesai = $(this).data('tgl_selesai');
            if (mulai != selesai) {
                var end_date = new Date(new Date(selesai).getTime() + 60 * 60 * 24 * 1000);
            } else {
                var end_date = new Date(new Date(selesai).getTime());
            }
            var color = "";
            if (substansi == 'Pengembangan') {
                color = "#ee3dd5";
            } else if (substansi == 'Penataan') {
                color = "#ff0000";
            } else if (substansi == 'Penguatan') {
                color = "##0075f9";
            } else if (substansi == 'Pengendalian') {
                color = "#f4d415";
            } else if (substansi == 'Penilaian Kinerja') {
                color = "#006400";
            } else if (substansi == 'Tata Usaha') {
                color = "#7001ff";
            };
            if ($('#catet').is(':visible')) {
                $('#catet #subs').text(substansi);
                $('#catet #subsval').val(substansi);
                $('#catet #desc').val(kegiatan);
                $('#catet #kegiatan').text(kegiatan);
                $('#catet #colors').val(color);
                $('#catet #tglmulai').text(tgl_mulai);
                $('#catet #tglselesai').text(tgl_selesai);
                $('#catet #start').val(moment(mulai).format('YYYY-MM-DD HH:mm'));
                $('#catet #end').val(moment(end_date).format('YYYY-MM-DD HH:mm'));
                $('.listkeg_modal').modal('hide');
            } else if ($('#edit_modal').is(':visible')) {
                $('#edit_modal #esubs').text(substansi);
                $('#edit_modal #esubsval').val(substansi);
                $('#edit_modal #description').val(kegiatan);
                $('#edit_modal #nmgiat').text(kegiatan);
                $('#edit_modal #color').val(color);
                $('#edit_modal #tglstart').text(tgl_mulai);
                $('#edit_modal #tglend').text(tgl_selesai);
                $('#edit_modal #start_edit').val(moment(mulai).format('YYYY-MM-DD HH:mm'));
                $('#edit_modal #end_edit').val(moment(end_date).format('YYYY-MM-DD HH:mm'));
                $('.listkeg_modal').modal('hide');
            }
        })
    })
</script>
<script script type="text/javascript">
    $(document).ready(function() {
        $('#addR').on('click', function() {
            var lastRow = $('#tbname tbody tr:last').html();
            //alert(lastRow);
            $('#tbname tbody').append('<tr>' + lastRow + '</tr>');
            $('#tbaname tbody tr:last input').val('');
            initUang();
        });

        $('#delR').on('click', function() {
            var lenRow = $('#tbname tbody tr').length;
            //alert(lenRow);
            if (lenRow == 1 || lenRow <= 1) {
                alert("baris tidak dapat dihapus");
            } else {
                $('#tbname tbody tr:last').remove();
            }
        });

        function initUang() {
            $('.uang').mask('000.000.000.000', {
                reverse: true
            });
        }
    })
</script>
<script script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '#lihatdetil', function() {
            var id = $(this).data('id');
            var nilaitotal=$(this).data('totalnilai');
            $('#nilaitotal').text(nilaitotal);
            $('#namanya').text(id);

            $('#tbdetil').dataTable({
                destroy: true,
                // retrieve:true,
                "processing": true,
                "serverSide": true,
                "ajax": {
                    "url": '<?= site_url('agenda_tu/get_ajax_giat') ?>',
                    "type": 'POST',
                    "data": {
                        "id": id,
                    },
                },
                "columnDefs": [

                    {
                        'targets': [0, 2, 3, 4, 5],
                        'className': "text-center",
                    },
                    {
                        'targets': [0],
                        'orderable': false,
                    },
                ],
                "responsive": true,
                "bAutoWidth": true,
                stateSave: false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Indonesian.json"
                },
            })

            $('#cekgiat').modal('show');

        });
    })
</script>