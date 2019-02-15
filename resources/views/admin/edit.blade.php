@extends('/master')

@section('title-and-meta')
    <title>Store | Admins</title>
@endsection

@section('css')

@endsection

@section('heading')

@endsection

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Update User Data</h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                <div class="col-sm-8 col-md-8 col-sm-offset-2 col-md-offset-2">
                    <form action="/admin/{{ $admin->id }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" name="email" id="email" class="form-control" required value="{{ $admin->email }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Password:</label>
                            <input type="password" name="password" id="password" class="form-control" required value="{{ $admin->password }}">
                        </div>
                        <div class="form-group text-center">
                            <a href="/admin" class="btn btn-default">Cancel</a>
                            <input type="submit" value="Update User" name="update_user" class="btn btn-primary">
                            <a class="btn btn-danger" data-toggle="modal" href="#modal-info">
                                Delete
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal modal-default fade" id="modal-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <i class="fa fa-trash"></i>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger">Are you sure you want to permanently delete "{{ $admin->name }}" ?</p>
                    <form action="/admin/{{ $admin->id }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <center>
                            <button type="cancel" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Delete</button>
                        </center>            
                    </form>
                </div>
                <div class="modal-footer">
                
                </div>
            </div>
        <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
@endsection

@section('scripts')

@endsection