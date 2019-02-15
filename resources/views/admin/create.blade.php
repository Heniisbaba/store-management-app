@extends('/master')

@section('title-and-meta')
    <title>Store | Admins</title>
@endsection

@section('css')

@endsection

@section('heading')

@endsection

@section('content')
<?php $name = $password = $email = $permissions = $confirm = '';?>
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Add A New User</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

            <form action="/admin" method="post">
            {{ csrf_field()}}
                <div class="form-group col-md-6">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email:</label>
                    <input type="textl" name="email" id="email" class="form-control"  value="{{ old('email') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Confirm Password:</label>
                    <input type="password" name="password_confirmation" id="confirm" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="permissions">Permissions</label>
                    <select name="permissions" id="permissions" class="form-control" >
                        <option value="" {{ old('permissions') === ''?' selected':'' }}></option>
                        <option value="editor" {{ old('permissions') === 'editor'?' selected':'' }}>Editor</option>
                        <option value="admin,editor" {{ old('permissions') === 'admin,editor'?' selected':'' }}>Admin</option>
                    </select>
                </div>
                <div class="clearfix"></div>
                <div class="form-group text-center">
                    <a href="users" class="btn btn-default">Cancel</a>
                    <input type="submit" value="Add User" name="add_user" class="btn btn-info">
                </div>
            </form>
            
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection