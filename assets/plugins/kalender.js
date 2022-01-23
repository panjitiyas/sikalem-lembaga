$(function(){
            
                $('#calendar').fullCalendar({
                // plugins: ['bootstrap', 'dayGrid', 'interaction', 'list', 'googleCalendar'],
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek,basicDay'
                },
                defaultDate: moment().format('YYYY-MM-DD'),
                googleCalendarApiKey: 'AIzaSyD2i--nmFcfyY2MiiVpsSlj6u2McbRuTn8',

                firstDay: 0,
                locale: initialLocaleCode,
                // events: {
                //         url: base_url + 'calendar/get_events', textColor: '#f7f4ef'},
                eventSources: [
                {
                    url: base_url + 'calendar/get_events',
                    dataType: 'json',
                    textColor: '#f7f4ef',
                },
                {
                    googleCalendarId: 'id.indonesian#holiday@group.v.calendar.google.com',
                    dataType: 'json',
                    color: "#b03060",
                }
                ],
                weekNumbers: true,
                weekNumbersWithinDays: true,
                // weekNumberCalculation: 'ISO',
                // navLinks: true, // can click day/week names to navigate views
                editable: true,
                selectable: true,
                selectHelper: true,
                displayEventTime: false,
                // fixedWeekCount: true,
                // showNonCurrentDates: true,
               
                

                eventLimit: true, // allow "more" link when too many events

                select: function(start, end) {
                

                    // var end_date = calendar.getDate (end);
                    $('#create_modal').modal('show');
                    $('#create_modal').find('#start').val(moment(start).format('YYYY-MM-DD'));
                    $('#create_modal').find('#end').val(moment(end).format('YYYY-MM-DD'));
                    
                    // calendar.unselect()
                    // alert(());
                    
                    

                },
                // dateClick: function(info) {
                //     alert('clicked on ' + info.dateStr);
                // },
                
                // dateClick: function(date, jsEvent, view) {
                //     // date_last_clicked = $(this);
                //     // $(this).css('background-color', '#f3f3be');
                //     // $('#create_modal input[name=start]').val(moment(start).format('YYYY-MM-DD'));
                //     // $('#create_modal input[name=end]').val(moment(end).format('YYYY-MM-DD'));
                //     $('#create_modal').modal('show');

                // }

            });
            // calendar.render();

            $(document).on('click', '.add_calendar', function() {
                // $('#create_modal input[name=id_calendar]').val(0);
                $('#create_modal').modal('show');
            })
        });
        
  
