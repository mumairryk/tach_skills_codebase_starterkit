@extends('layouts.backend')
@section('title','Roles')
@section('top_buttons')

@stop
@section('content')
    <a class="btn btn-link btn-float text-default" href="{{route('roles.create')}}" role="button"><i class="fa fa-list"></i> Add New </a>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Roles</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="card-body table-responsive no-padding">
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
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
@stop

@section('js_after')

    <script>
        $(function () {
            $('#example1').DataTable();

        });
    </script>
    <script>
        function confirmDelete(){
            var x = confirm('Are you sure you want ot delete this role?');
            return !!x;
        }
    </script>
@stop
