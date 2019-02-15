@extends('master')

@section('title-and-meta')
    <title>Store | Admins</title>
@endsection

@section('css')
      <!-- DataTables -->
  <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
                    @foreach($admins as $admin)
                    <tr>
                        <td>
                            <a href="/admin/{{ $admin->id }}" class="btn btn-sm btn-info"><i class="fa fa-user"></i>&nbsp;View</a>
                            <a href="/admin/{{ $admin->id }}/edit" class="btn btn-sm btn-danger pull-right"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
                        </td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>{{ $admin->last_login }}</td>
                        <td>{{ $admin->permissions }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-3">
<a href="admin/create" class="btn btn-primary pull-right" id="add-product-btn">Add New User</a>

</div>




@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        })
    </script>
@endsection