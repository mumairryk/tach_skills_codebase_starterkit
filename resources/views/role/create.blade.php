@extends('layouts.app')

@section('title','Add Role')

@section('content')

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <div class="card-body">
                        <!-- form start -->
                        {{--<form role="form">--}}
                        @open(['model' => $row,'method' => 'POST','enctype'=>"multipart/form-data", 'route' => 'roles.store','novalidate' => true])


                        @include('role.form',['selected'=>[]])
                        {{--</form>--}}
                        @close
                    </div>

                </div>

@stop
