@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('js/plugins/fullcalendar/main.min.css')}}">
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
                        <div id="js-calendar"></div>
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

    <script src="{{asset('js/plugins/fullcalendar/main.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var DAY_NAMES = ['ON CALL','MON','TUE','WED','THU','FRI','WEEK'];
        !(function () {
            function e(e, t) {
                for (var n = 0; n < t.length; n++) {
                    var a = t[n];
                    (a.enumerable = a.enumerable || !1), (a.configurable = !0), "value" in a && (a.writable = !0), Object.defineProperty(e, a.key, a);
                }
            }
            var t = (function () {
                function t() {
                    !(function (e, t) {
                        if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function");
                    })(this, t);
                }
                var n, a;
                return (
                    (n = t),
                        (a = [
                            {
                                key: "addEvent",
                                value: function () {
                                    var e = jQuery(".js-add-event"),
                                        t = "";
                                    jQuery(".js-form-add-event").on("submit", function (n) {
                                        return (
                                            (t = e.prop("value")) && (jQuery("#js-events").prepend('<li><div class="js-event p-10 text-white font-size-sm font-w600 bg-info">' + jQuery("<div />").text(t).html() + "</div></li>"), e.prop("value", "")), !1
                                        );
                                    });
                                },
                            },
                            {
                                key: "initEvents",
                                value: function () {
                                    new FullCalendar.Draggable(document.getElementById("js-events"), {
                                        itemSelector: ".js-event",
                                        eventData: function (e) {
                                            return { title: e.innerText, backgroundColor: getComputedStyle(e).backgroundColor, borderColor: getComputedStyle(e).backgroundColor };
                                        },
                                    });
                                },
                            },
                            {
                                key: "initCalendar",
                                value: function () {
                                    var e = new Date(),
                                        t = e.getDate(),
                                        n = e.getMonth(),
                                        a = e.getFullYear();
                                    new FullCalendar.Calendar(document.getElementById("js-calendar"), {
                                        themeSystem: "bootstrap",
                                        firstDay: 1,
                                        editable: true,
                                        droppable: !0,
                                        selectable: true,
                                        dayHeaderContent: function(arg) {
                                            return DAY_NAMES[arg.date.getDay()]
                                        },
                                        headerToolbar: { left: "title", right: "prev,next today dayGridMonth,timeGridWeek,timeGridDay,listWeek" },
                                        drop: function (e) {
                                            e.draggedEl.parentNode.remove();
                                        },
                                        eventClick: function (calEvent, jsEvent, view) {
                                            console.log(calEvent);



                                            document.getElementById('priority').value=calEvent.event._def.extendedProps.priority;
                                            document.getElementById('assignment').value=calEvent.event._def.title;
                                            document.getElementById('comment').value=calEvent.event._def.extendedProps.comment;
                                            document.getElementById('id').value=calEvent.event._def.publicId;;
                                            document.getElementById('date').value=moment(calEvent.event._instance.range.start).format('YYYY-MM-DD');
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
                                            document.getElementById('date').value=start.startStr;
                                            document.getElementById('model_title').innerHTML="Add New Record";
                                            $('#crud_Modal').modal('show');
                                        },
                                        eventDrop:function (info)
                                        {
                                            var new_date = info.event._instance.range.start;
                                            var id = info.event._def.publicId;
                                            $.ajax({url: "{{route('transports.ajaxSubmit')}}",data:{id:id,date:moment(new_date).format('YYYY-MM-DD')}, success: function(result){
                                                    Codebase.helpers('notify', {
                                                        align: 'right',             // 'right', 'left', 'center'
                                                        from: 'top',                // 'top', 'bottom'
                                                        type: 'success',               // 'info', 'success', 'warning', 'danger'
                                                        icon: 'fa fa-check mr-5',    // Icon class
                                                        message: "Data Updated"
                                                    });
                                                }});
                                        },
                                        events: {!! json_encode($data) !!},
                                    }).render();
                                },
                            },
                            {
                                key: "init",
                                value: function () {
                                    this.addEvent(), this.initEvents(), this.initCalendar();
                                },
                            },
                        ]),
                    null && e(n.prototype, null),
                    a && e(n, a),
                        t
                );
            })();
            jQuery(function () {
                t.init();
            });
        })();

    </script>
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script>jQuery(function(){Codebase.helpers(['flatpickr', 'datepicker', 'notify', 'maxlength', 'select2', 'rangeslider', 'tags-inputs']);});</script>
@endsection
