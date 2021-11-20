@extends('layouts.backend')

@section('title','Add Role')

@section('content')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        {{--<form role="form">--}}
                        @open(['method' => 'POST', 'route' => 'roles.store','enctype'=>"multipart/form-data",'novalidate' => true])

                        @include('role.form',['selected'=>[]])
                        {{--</form>--}}
                        @close
                    </div>

                </div>

@stop
