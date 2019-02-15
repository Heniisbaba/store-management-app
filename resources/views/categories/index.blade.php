@extends('master')

@section('title-and-meta')
    <title>Store | Categories</title>
@endsection

@section('css')
      <!-- DataTables -->
  <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('heading')

@endsection

@section('content')
<div class="col-md-5">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Users</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead><tr><th>Action</th><th>Category</th><th>Last Updated</th></tr></thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>
                            <center>
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-sm bg-maroon"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
                            </center>
                        </td>
                        <td>{{ $category->category }}</td>
                        <td>{{ date('d M Y H:i A',strtotime($category->updated_at)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="col-md-3">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Add Product Category</h3>
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

            <form action="/categories" method="post">
            {{ csrf_field()}}
                <div class="form-group">
                    <label for="name">Category Name:</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="clearfix"></div>
                <div class="form-group text-center">
                    <a href="users" class="btn btn-default">Cancel</a>
                    <input type="submit" value="Add User" name="add_cat" class="btn btn-info">
                </div>
            </form>
            
        </div>
    </div>
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