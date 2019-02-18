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
<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Stock</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            
        </div>
    </div>
</div>

<div class="col-md-6">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Stock</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
        <table id="example2" class="table table-bordered table-hover">
            <thead><tr><th>Products</th><th>Quantity</th><th>Stock</th><th>Last Supply</th></tr></thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->physical_quantity.' '.$product->physical_quantity_units}}</td>
                        <td>{{ $product->stock_quantity.' units' }}</td>
                        <td>{{ date('d M Y H:i A',strtotime($product->updated_at)) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
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