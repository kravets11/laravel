@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div id="calendar"></div>
        </div>
    </div>
</div>
@endsection
@section('style')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
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
                allDaySlot: true,
                select: function(start, type) {
                    // $.ajax({

                    // });
                    // var end = start + type;

                    // alert('popup');
                    var title = prompt('Event Title:');

                    var eventData;
                    if (title) {
                        eventData = {
                            title: title,
                            start: start,
                            end: type
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