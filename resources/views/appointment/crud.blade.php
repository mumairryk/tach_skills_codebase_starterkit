@extends('layouts.backend')
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
                @select('priority', null,  [1=>'1',2=>'2',3=>'3',4=>'4'])
                @text('assignment')
                @textarea('comment')
                @date('date')
                @submit('Save')
                @close
        </div>
    </div>
</div>

@stop
