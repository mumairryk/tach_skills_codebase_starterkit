@extends('layouts.backend')
@section('content')
    <div class="content">
        <h2 class="content-heading">Roles List</h2>
        <div class="block">
            <div class="block-header block-header-default" style="display: block;height: 60px;">
                <a class="btn btn-primary float-right" href="{{route('roles.create')}}" role="button"><i class="fa fa-plus-circle"></i> Add New Role</a>
            </div>
            <div class="block-content block-content-full">



                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Permission(s)</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @foreach($role->permissions as $permission)
                                            <label class="badge badge-info">{{ $permission->name }}</label>
                                        @endforeach
                                    </td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <a href="{{route('roles.edit',['id'=>$role->id])}}" class="btn btn-info" ><i class="fa fa-edit"></i></a>
                                        <a href="{{route('roles.destroy',['id'=>$role->id])}}" class="btn btn-danger" ><i class="fa fa-remove"></i></a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Permission(s)</th>
                                <th>Description</th>
                                <th>Created at</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
            </div>
        </div>
    </div>

@stop

@section('js_after')
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want ot delete this role?');
            return !!x;
        }
    </script>
@stop
