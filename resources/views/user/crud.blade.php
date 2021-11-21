@extends('layouts.backend')
@section('css_after')
    <link rel="stylesheet" href="{{asset('js/plugins/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css')}}">
@endsection
@section('content')
<div class="content">
    <h2 class="content-heading">User Details</h2>
    <div class="block">
        <div class="block-header block-header-default">
        </div>
        <div class="block-content block-content-full">
            @if(!isset($row))
                @open(['method' => 'POST', 'route' => 'users.store','enctype'=>"multipart/form-data",'novalidate' => true])
            @else
                @open(['model' => $row,'method' => 'PUT','enctype'=>"multipart/form-data", 'route' => ['users.update',['user'=>$row->id]],'novalidate' => true])
            @endif
                <div class="row">
                    <div class="col-md-6">
                        @text('name')
                    </div>
                    <div class="col-md-6">
                        @email('email')
                    </div>
                    <div class="col-md-6">
                        @email('phone')
                    </div>
                    <div class="col-md-6">
                        @radios('gender','Gender',['Male'=>'Male','Female'=>'Female','Other'=>'Other'],null,['custom' => true, 'inline' => true])
                    </div>
                    <div class="col-md-12">
                        @if (isset($row))
                            @php $user_roles = \Illuminate\Support\Facades\DB::table('role_user')->select('role_id')->where('user_id','=',$row->id)->pluck('role_id','role_id')->toArray()   @endphp

                            @select('role_id[]','Select Role',$repository->roles(),$user_roles,['required'=>'required','multiple'=>'multiple','class'=>'form-control js-select2'])

                        @else
                            @select('role_id[]','Select Role',$repository->roles(),null,['required'=>'required','multiple'=>'multiple','class'=>'form-control js-select2'])
                        @endif
                    </div>
                @if(!isset($row))
                        <div class="col-md-6">
                            @password('password')
                        </div>
                        <div class="col-md-6">
                            @password('confirm_password')
                        </div>
                @endif
                </div>
                @submit('Save')
                @close
        </div>
    </div>
</div>

@stop
@section('js_after')
    <script src="{{asset('js/plugins/flatpickr/flatpickr.min.js')}}"></script>
    <script src="{{asset('js/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.js')}}"></script>
    <script>
        $(document).ready(function () {
        jQuery(function(){
            Codebase.helpers(
                ['flatpickr', 'datepicker', 'notify', 'maxlength', 'select2', 'rangeslider', 'tags-inputs']);
        });
    });
    </script>
@stop
