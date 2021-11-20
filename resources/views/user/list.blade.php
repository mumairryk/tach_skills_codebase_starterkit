@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">Users</h2>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">List </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th>SrNo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($list as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->gender}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>
                                <a href="{{route("users.edit",['user'=>$item->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route("users.destroy",['user'=>$item->id])}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @empty
                        <p>No Record Found</p>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@stop
@section('js_after')
    <script src="{{asset('assets/js/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('assets/js/pages/be_tables_datatables.min.js')}}"></script>

@stop
