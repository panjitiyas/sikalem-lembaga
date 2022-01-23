<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Informasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="<?= site_url('dashboard') ?>"><i class="fas fa-home"></i></a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="">Informasi</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="<?= site_url('kalender') ?>">Kalender Keuangan</a>
                    </li>
                </ol>
            </div>
</section>
<section class="content">
    <div class="container-fluid">
        <div class="card card-outline card-navy">
            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="alert notification" style="display: none;">
                        <button class="close" data-close="alert"></button>
                        <p></p>
                    </div>
                    <div class="card-header">
                        <h4> Kalender Keuangan <h4>
                                <div class="float-right">
                                    <!-- <a href="#" class="btn btn-warning  btn-sm add_calendar"><i class="fa fa-plus"></i></a> -->
                                </div>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="portlet light bordered">
                                    <div class="portlet-body">

                                        <!-- place -->
                                        <?php $this->load->view('pesan'); ?>
                                        <div class="alert"></div>
                                        <div id="calendar"></div>

                                        <!-- end place -->
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- MODAL ADD -->
    <div class="modal fade" id="create_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="<?= site_url('calendar/add_event') ?>" id="form_edit">
                    <!-- <input type="hidden" name="id_calendar" value="0"> -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Tambah Jadwal/Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Judul <span class="required"> * </span></label>
                                <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control form-control-sm" placeholder="Masukan Judul">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Deskripsi</label>
                                <div class="col-sm-12">
                                    <textarea name="description" rows="3" class="form-control form-control-sm" placeholder="Masukan Deskripsi"></textarea>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-sm-4 control-label">All Day</label>
                                <div class="col-sm 12">
                                    <select name="allday" class="form-control form-control-sm">
                                        <option value="">-Pilih-</option>
                                        <option value=true>Iya</option>
                                        <option value=false>Tidak</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="color" class="col-sm-4 control-label">Kategori Label</label>
                                <div class="col-sm-12">
                                    <select name="color" class="form-control form-control-sm">
                                        <option value="">-Pilih-</option>
                                        <option style="color:#008000;" value="#008000">&#65517; Biasa</option>
                                        <option style="color:#ffa500;" value="#ffa500">&#65517; Penting</option>
                                        <option style="color:#800000;" value="#800000">&#65517; Sangat Penting</option>
                                        <option style="color:#ee3dd5;" value="#ee3dd5">&#65517; Subs Pengembangan</option>
                                        <option style="color:#ff0000;" value="#ff0000">&#65517; Subs Penataan</option>
                                        <option style="color:#0075f9;" value="##0075f9">&#65517; Subs Penguatan</option>
                                        <option style="color:#f4d415;" value="#f4d415">&#65517; Subs Pengendalian</option>
                                        <option style="color:#006400;" value="#006400">&#65517; Subs Penilaian Kinerja</option>
                                        <option style="color:#7001ff;" value="#7001ff">&#65517; Tata Usaha</option>
                                        <!-- <option style="color:#000;" value="#000">&#65517; Black</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tgl. Awal</label>
                                        <div class="input-group date" id="datepicker2" data-target-input="nearest">
                                            <input type="text" name="start" class="form-control form-control-sm datetimepicker-input" data-target="#datepicker2" placeholder="tanggal awal" id="start" readonly>
                                            <div class="input-group-append" data-target="#datepicker2" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tgl. Akhir</label>
                                        <div class="input-group date" id="datepicker3" data-target-input="nearest">
                                            <input type="text" name="end" class="form-control form-control-sm datetimepicker-input" data-target="#datepicker3" placeholder="tanggal akhir" id="end" readonly>
                                            <div class="input-group-append" data-target="#datepicker3" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <!-- MODAL EDIT -->
    <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="form-horizontal" method="POST" action="<?= site_url('calendar/edit_event') ?>" id="form_create">
                    <!-- <input type="hidden" name="id_calendar" value="0"> -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Ubah Jadwal/Agenda</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="form-group">
                                <label class="control-label col-sm-2">Judul <span class="required"> * </span></label>
                                <div class="col-sm-12">
                                    <input type="text" name="title" class="form-control form-control-sm" placeholder="Masukan Judul" id="title">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-2">Deskripsi</label>
                                <div class="col-sm-12">
                                    <textarea name="description" rows="3" class="form-control form-control-sm" placeholder="Masukan Deskripsi" id="description"></textarea>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-sm-4 control-label">All Day</label>
                                <div class="col-sm 12">
                                    <select name="allday" id="allday_edit" class="form-control form-control-sm">
                                        <option value="">-Pilih-</option>
                                        <option value=true>Iya</option>
                                        <option value=false>Tidak</option>
                                    </select>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label for="color" class="col-sm-4 control-label">Kategori Label</label>
                                <div class="col-sm-12">
                                    <select name="color" class="form-control form-control-sm" id="color">
                                        <option value="">-Pilih-</option>
                                        <option style="color:#008000;" value="#008000">&#65517; Biasa</option>
                                        <option style="color:#ffa500;" value="#ffa500">&#65517; Penting</option>
                                        <option style="color:#800000;" value="#800000">&#65517; Sangat Penting</option>
                                        <option style="color:#ee3dd5;" value="#ee3dd5">&#65517; Subs Pengembangan</option>
                                        <option style="color:#ff0000;" value="#ff0000">&#65517; Subs Penataan</option>
                                        <option style="color:#0075f9;" value="##0075f9">&#65517; Subs Penguatan</option>
                                        <option style="color:#f4d415;" value="#f4d415">&#65517; Subs Pengendalian</option>
                                        <option style="color:#006400;" value="#006400">&#65517; Subs Penilaian Kinerja</option>
                                        <option style="color:#7001ff;" value="#7001ff">&#65517; Tata Usaha</option>
                                        <!-- <option style="color:#000;" value="#000">&#65517; Black</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tgl. Awal</label>
                                        <div class="input-group date" id="datepicker4" data-target-input="nearest">
                                            <input type="text" name="start" class="form-control form-control-sm  datetimepicker-input" data-target="#datepicker4" placeholder="tanggal awal" id="start_edit" >
                                            <div class="input-group-append" data-target="#datepicker4" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label">Tgl. Akhir</label>
                                        <div class="input-group date" id="datepicker5" data-target-input="nearest">
                                            <input type="text" name="end" class="form-control form-control-sm datetimepicker-input" data-target="#datepicker5" placeholder="tanggal akhir" id="end_edit">
                                            <div class="input-group-append" data-target="#datepicker5" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar-alt"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <div class="form-group ml-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="delete" value="1">
                                <label class="custom-control-label" for="customCheck1">Hapus data ini?</label>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="id_calendar" id="id_calendar" value="0" />

                    <div class=" modal-footer">
                        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Tutup</button>
                        <input type="submit" class="btn btn-primary btn-sm" onclick="return confirm('Yakin mau diproses?')" value="Proses">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var initialLocaleCode = 'id';
        var currentEvent;
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                // plugins: ['bootstrap', 'dayGrid', 'interaction', 'list', 'googleCalendar'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,listMonth'
                },
                allDayDefault :true,
                
                defaultDate: moment().format('YYYY-MM-DD HH:mm:ss'),
                googleCalendarApiKey: 'AIzaSyD2i--nmFcfyY2MiiVpsSlj6u2McbRuTn8',
                firstDay: 0,
                locale: initialLocaleCode,
                eventSources: [{
                        url: '<?= base_url() ?>calendar/get_events',
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
                minTime: '00:00:00',
                maxTime: '23:59:00',
                eventLimit: true, // allow "more" link when too many events
                selectLongPressDelay: 500,
                selectHelper: true,
                selectable: true,
                select: function(start, end) {

                    $('#create_modal').modal('show');
                    $('#create_modal').find('#start').val(moment(start).format('YYYY-MM-DD HH:mm'));
                    $('#create_modal').find('#end').val(moment(end).format('YYYY-MM-DD HH:mm'));
                    $('#calendarIO').fullCalendar('unselect');

                },
                editable: true,
                eventClick: function(calEvent, jsEvent, view) {

                    $('#id_calendar').val(calEvent.id_calendar);
                    $('#title').val(calEvent.title);
                    $('#description').val(calEvent.description);
                    $('#color').val(calEvent.color);
                    $('#start_edit').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm'));
                    if (calEvent.end) {
                        $('#end_edit').val(moment(calEvent.end).format('YYYY-MM-DD HH:mm'));
                    } else {
                        $('#end_edit').val(moment(calEvent.start).format('YYYY-MM-DD HH:mm'));
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
                    var id = event.id_calendar;
                    

                    $.post("<?php echo site_url(); ?>calendar/edit_dropevent", {
                            start: start,
                            end: end,
                            id: id,
                            
                        },
                        function(result) {
                            $('.alert').addClass('alert-success').text('data berhasil diperbaharui');
                            hide_notify();
                        });
                },
                eventResize: function(event, dayDelta, minuteDelata, revertFunc) {
                    var start = event.start.format('YYYY-MM-DD HH:mm:ss');

                    if (event.end) {
                        var end = event.end.format('YYYY-MM-DD HH:mm:ss');
                    } else {
                        var end = start;
                    }
                    var id = event.id_calendar;
                    

                    $.post("<?php echo site_url(); ?>calendar/edit_dropevent", {
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
            $('#calendar').fullCalendar('render');

            function hide_notify() {
                setTimeout(function() {
                    $('.alert').removeClass('alert-success').text('');
                }, 1600);
            }
            // $(document).on('click', '.add_calendar', function() {
            //     // $('#create_modal input[name=id_calendar]').val(0);
            //     $('#create_modal').find('#start').val(null);
            //     $('#create_modal').find('#end').val(null);
            //     $('#create_modal').modal('show');
            // })

        });
    </script>
</section>