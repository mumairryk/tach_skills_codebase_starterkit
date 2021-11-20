@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.css">
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
@endsection
@section('content')
    <div class="content">
        <h2 class="content-heading">Transport Calendar</h2>
        <div class="block">
            <div class="block-content">
                <div class="row items-push">
                    <div class="col-xl-9">
                        <!-- Calendar Container -->
                        <div id="jss-calendar"></div>
                    </div>
                    <div class="col-xl-3 d-none d-xl-block">
                        <!-- Event List -->
                        <ul id="js-events" class="list list-events"></ul>

                        <h4>Priority Colors</h4>
                        <ul class="list-unstyled">
                            <li class="mt-3">
                                <i class="fa fa-circle text-success"></i> Priority 1
                            </li >
                            <li class="mt-3">
                                <i class="fa fa-circle text-warning"></i> Priority 2
                            </li>
                            <li class="mt-3">
                                <i class="fa fa-circle text-primary"></i> Priority 3
                            </li>
                            <li class="mt-3">
                                <i class="fa fa-circle text-danger"></i> Priority 4
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
        <!-- END Calendar -->
    </div>


    <div class="modal" id="crud_Modal"  role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            @open(['method' => 'POST', 'route' => 'transports.ajaxSubmit','enctype'=>"multipart/form-data",'novalidate' => true])
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title" id="model_title">Add New Record</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            @hidden('id')
                            @select('priority', 'Select Priority *',  [1=>'1',2=>'2',3=>'3',4=>'4'],null,['required','required'])
                            @text('assignment','Assigment *',null,['required','required'])
                            @textarea('comment',null,null,['required','required'])
                            @date('date','Select Date *', null, ['class' => 'js-flatpickr form-control bg-white','required','required'])
                            @close

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-alt-success" >
                            <i class="fa fa-save"></i> Save
                        </button>
                    </div>
                </div>
            @close
        </div>
    </div>
@stop


@section('js_after')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>
    <script>
        $(document).ready(function () {

            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();
            var myEvents = {!! json_encode($data) !!};
            var calendar = $('#jss-calendar').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,basicWeek ,basicDay'
                },
                buttonText: {
                    prev: 'Prev',
                    next: 'Next',
                    month:'Month',
                    week:'Week',
                    day:'Day',
                    today:'Today',
                },
                timeFormat: 'h(:mm)t',
                dateFormat:'DD/MM/YYYY',
                initialDate: '2018-06-01',
                selectable: true,
                dayClick: function (date, allDay, jsEvent, view) {
                    //alert(date);
                },
                eventClick: function (calEvent, jsEvent, view) {
                    document.getElementById('priority').value=calEvent.priority;
                    document.getElementById('assignment').value=calEvent.title;
                    document.getElementById('comment').value=calEvent.comment;
                    document.getElementById('id').value=calEvent.id;
                    document.getElementById('date').value=moment(calEvent.start).format('YYYY-MM-DD');;
                    document.getElementById('model_title').innerHTML="Edit Record";
                    $('#crud_Modal').modal('show');

                    // change the border color just for fun
                    $(this).css('border-color', 'red');

                },
                select: function (start, end, allDay) {
                    document.getElementById('priority').value="";
                    document.getElementById('assignment').value="";
                    document.getElementById('comment').value="";
                    document.getElementById('id').value="";
                    document.getElementById('date').value=moment(start).format('YYYY-MM-DD');
                    document.getElementById('model_title').innerHTML="Add New Record";
                    $('#crud_Modal').modal('show');
                },

                events: myEvents
            });

            $('.fc-button-prev').click(function () {


            });

        });
    </script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script>jQuery(function(){Codebase.helpers(['flatpickr', 'datepicker', 'notify', 'maxlength', 'select2', 'rangeslider', 'tags-inputs']);});</script>

@endsection
