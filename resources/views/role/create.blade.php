@extends('layouts.backend')
@section('content')

    <div class="content">
        <h2 class="content-heading">Create New Role</h2>
        <div class="block">
            <div class="block-header block-header-default">
            </div>
                        {{--<form role="form">--}}
                        @open(['method' => 'POST', 'route' => 'roles.store','enctype'=>"multipart/form-data",'novalidate' => true])

                        @include('role.form',['selected'=>[]])
                        {{--</form>--}}
                        @close
        </div>
    </div>

@stop
