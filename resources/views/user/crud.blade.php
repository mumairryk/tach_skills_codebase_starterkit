@extends('layouts.backend')
@section('content')
<div class="content">
    <h2 class="content-heading">User Details</h2>
    <div class="block">
        <div class="block-header block-header-default">
        </div>
        <div class="block-content block-content-full">
            @if(!isset($row))
                @open(['method' => 'POST', 'route' => 'users.store','enctype'=>"multipart/form-data",'novalidate' => true])
            @else
                @open(['model' => $row,'method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['users.update',['user'=>$row->id]],'novalidate' => true])
            @endif
                @text('name')
                @email('email')
                @if(!isset($row))
                    @password('password')
                @endif
                @submit('Save')
                @close
        </div>
    </div>
</div>

@stop
