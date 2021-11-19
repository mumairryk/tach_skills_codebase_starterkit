@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('assets/js/plugins/datatables/dataTables.bootstrap4.css')}}">
@stop
@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading">{{$type==1?'Auftrag':'Erledigt'}} List</h2>
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">{{$type==1?'Auftrag':'Erledigt'}} </h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                    <tr>
                        <th>SrNo</th>
                        <th>Priority</th>
                        <th>Assignment</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($list as $key=>$item)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$item->priority}}</td>
                            <td>{{$item->assignment}}</td>
                            <td>{{$item->comment}}</td>
                            <td>{{$item->date}}</td>
                            <td>
                                <a href="{{route("transport.edit",['id'=>$item->id])}}" class="btn btn-primary">Edit</a>
                                <a href="{{route("transport.edit",['id'=>$item->id])}}" class="btn btn-danger">Delete</a>
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
