@extends('layouts.backend')
@section('content')
<div class="content">
    <h2 class="content-heading">Transportverwaltung</h2>
    <div class="block">
        <div class="block-header block-header-default">
        </div>
        <div class="block-content block-content-full">
            @if(!isset($row))
                @open(['method' => 'POST', 'route' => 'transports.store','enctype'=>"multipart/form-data",'novalidate' => true])
            @else
                @open(['model' => $row,'method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['transports.update',['transport'=>$row->id]],'novalidate' => true])
            @endif
                @select('priority', 'Select Priority *', [1=>'1',2=>'2',3=>'3',4=>'4'])
                @text('assignment','Assigment *')
                @textarea('comment')
                @date('date','Select Date *')
                @submit('Save')
                @close
        </div>
    </div>
</div>

@stop
