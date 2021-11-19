@extends('layouts.backend')
@section('content')
<div class="content">
    <h2 class="content-heading">{{$type==1?'Auftrag':'Erledigt'}}</h2>
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">{{$type==1?'Auftrag':'Erledigt'}} </h3>
        </div>
        <div class="block-content block-content-full">
            @if(!isset($row))
                @open(['method' => 'POST', 'route' => ['invoice.store',['type'=>$type]],'enctype'=>"multipart/form-data",'novalidate' => true])
            @else
                @open(['model' => $row,'method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['invoice.update',['id'=>$row->id]],'novalidate' => true])
            @endif
                @hidden('type',$type)
                @select('priority', null, [1,2,3,4])
                @text('assignment')
                @textarea('comment')
                @date('date')
                @submit('Save')
                @close
        </div>
    </div>
</div>

@stop
