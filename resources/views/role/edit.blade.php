@extends('layouts.app')

@section('title','Edit Role')

@section('content')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    {{--<form role="form">--}}
                    @open(['model' => $role,'method' => 'PATCH','enctype'=>"multipart/form-data", 'route' => ['roles.update',["id"=>$role->id]],'novalidate' => true])
                    @include('role.form')
                    {{--</form>--}}
                    @close
                </div>

@stop
