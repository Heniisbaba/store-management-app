@extends('master')

@section('title-and-meta')
    <title>Store | Admins</title>
@endsection

@section('css')

@endsection

@section('heading')

@endsection

@section('content')
<div class="col-md-9">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Users</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead><tr><th>Action</th><th>Name</th><th>Email</th><th>Date Joined</th><th>Last Login</th><th>Permissions</th></tr></thead>
                <tbody>
                    <tr>
                        <td>
                            <a data-toggle="modal" href="#modal-info" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="/admin/{{ $admin->id }}/edit" class="btn btn-xs btn-info pull-right"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>{{ $admin->last_login }}</td>
                        <td>{{ $admin->permissions }}</td>
                    </tr>
                </tbody>
            </table>
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