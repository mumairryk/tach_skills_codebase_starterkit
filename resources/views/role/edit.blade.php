@extends('layouts.backend')
@section('content')

    <div class="content">
        <h2 class="content-heading">Edit Role</h2>
        <div class="block">
            <div class="block-header block-header-default">
            </div>

                    <!-- form start -->
                    {{--<form role="form">--}}
                    @open(['model' => $role,'method' => 'PATCH','enctype'=>"multipart/form-data", 'route' => ['roles.update',["id"=>$role->id]],'novalidate' => true])
                    @include('role.form')
                    {{--</form>--}}
                    @close
        </div>
    </div>

@stop
