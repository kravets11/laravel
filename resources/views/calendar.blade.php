@extends('layouts.event')

{{--@extends('layout')--}}
@section('style')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection
@section('content')
    <div id="calendar"></div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    {!! $calendar->script() !!}
    <script>

        $(document).ready(function() {
            $('#calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2019-03-12',
                navLinks: true, // can click day/week names to navigate views
                minTime: '08:00:00',
                maxTime: '18:00:00',
                slotDuration: '00:30:00',
                timeFormat: 'h:mm',
                firstDay: 1,//monday
                weekends: false,
                selectable: true,
                eventLimit: true,
                selectHelper: true,
                allDaySlot: false,
                select: function(start, end) {
                    var title = prompt('Event Title:');

                    var eventData;
                    if (title) {
                        eventData = {
                            title: title,
                            start: start,
                            end: end
                        };
                        console.log(eventData);
                        $('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                    }
                    $('#calendar').fullCalendar('unselect');
                },
                editable: true,
                resources: [
                    { id: 'a', title: 'Room A' },
                    { id: 'b', title: 'Room B' },
                    { id: 'c', title: 'Room C' }
                ],
                events: [
                    {
                        title: 'Dinner',
                        start: '2019-03-07T20:00:00',
                        end: '2019-03-10',
                        url: 'http://google.com/'
                    },
                    {
                        title: 'Шаг учеба',
                        start: '2019-03-12T20:00:00',
                        end: '2019-03-12T21:00:00'
                    }
                ]
            });
        });
    </script>
@endsection