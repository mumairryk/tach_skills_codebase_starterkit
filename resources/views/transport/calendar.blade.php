@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('js/plugins/fullcalendar/main.min.css')}}">
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

@stop


@section('js_after')

    <script src="{{asset('js/plugins/fullcalendar/main.min.js')}}"></script>
    <script src="{{asset('js/pages/be_comp_calendar.min.js')}}"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script>jQuery(function(){Codebase.helpers(['flatpickr', 'datepicker', 'notify', 'maxlength', 'select2', 'rangeslider', 'tags-inputs']);});</script>
    <script>
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
                                        editable: !0,
                                        droppable: !0,
                                        headerToolbar: { left: "title", right: "prev,next today dayGridMonth,timeGridWeek,timeGridDay,listWeek" },
                                        drop: function (e) {
                                            e.draggedEl.parentNode.remove();
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
@endsection
