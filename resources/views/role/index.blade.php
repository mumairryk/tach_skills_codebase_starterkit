@extends('layouts.app')
@section('title','Roles')
@section('top_buttons')
    <a class="btn btn-link btn-float text-default" href="{{route('roles.create')}}" role="button"><i class="fa fa-list"></i> Add New </a>
@stop
@section('content')

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
                                        {!!  Form::open()->delete()->route('roles.destroy',['id'=>$role->id])->attrs(['onsubmit'=>"return confirm('Do you want to remove this record?')"]) !!}
                                        <a href="{{route('roles.edit',['id'=>$role->id])}}" class="btn btn-info" ><i class="fa fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger" ><i class="fa fa-remove"></i> Delete</button>
                                        {!! Form::close() !!}
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

@section('custom_js')

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
