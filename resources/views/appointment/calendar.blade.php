@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('js/plugins/fullcalendar/main.min.css')}}">
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Appointment Calendar</h2>
        <div class="block">
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-xl-9">
                        <!-- Calendar Container -->
                        <div id="js-calendar"></div>
                    </div>
                    <div class="col-xl-3 d-none d-xl-block">
                        <!-- Event List -->
                        <ul id="js-events" class="list list-events"></ul>

                        <h4>Priority Colors</h4>
                        <ul class="list-unstyled">
                            <li class="mt-3">
                                <i class="fa fa-circle text-dark"></i> Planned
                            </li >
                            <li class="mt-3">
                                <i class="fa fa-circle text-danger"></i> Exceeded
                            </li>
                            <li class="mt-3">
                                <i class="fa fa-circle text-success"></i> Done
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Calendar -->
    </div>

@stop


@section('js_after')
    <script src="{{asset('js/plugins/fullcalendar/main.min.js')}}"></script>
    <script src="{{asset('js/pages/be_comp_calendar.min.js')}}"></script>
@endsection
