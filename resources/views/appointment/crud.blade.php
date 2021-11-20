@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">
@stop
@section('content')
<div class="content">
    <h2 class="content-heading">Auftrag</h2>
    <div class="block">
        <div class="block-header block-header-default">
        </div>
        <div class="block-content block-content-full">
            @if(!isset($row))
                @open(['method' => 'POST', 'route' => 'appointments.store','enctype'=>"multipart/form-data",'novalidate' => true])
            @else
                @open(['model' => $row,'method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['appointments.update',['appointment'=>$row->id]],'novalidate' => true])
            @endif
                @select('priority', 'Select Priority *',  [1=>'1',2=>'2',3=>'3',4=>'4'])
                @text('assignment','Assigment *')
                @textarea('comment')
                @date('date','Select Date *')
                @submit('Save')
                @close
        </div>
    </div>
</div>

@stop
@section('js_after')
    <script src="{{asset('assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script>jQuery(function () {
            Codebase.helpers(['flatpickr', 'datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider', 'tags-inputs']);
        });</script>
@stop
