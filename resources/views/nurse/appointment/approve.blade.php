@extends('adminlte::page')

@section('title', 'Homepage')

@section('content_header')
    <h1>Daily Visit List</h1>
@stop

@section('content')
    <div class="mx-auto mb-2" style="width: 1260px;height: 560px;overflow: auto;">
        <div class="row">
            <div class="col" style="width: 200px; border: 1px;">
                <div id='calendar'></div>
            </div>
            <div class="col-4" style="width: 200px; border: 1px;">
                <div>Approved</div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <p class="mb-0 h6">Asia Pacific College Data Privacy Act</p>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>

    <!-- script for calendar -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });
    </script>
@stop