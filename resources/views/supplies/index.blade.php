@extends('master')

@section('title-and-meta')
    <title>Store | Supplies</title>
@endsection

@section('css')
      <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../plugins/iCheck/all.css">
      <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
@endsection

@section('heading')

@endsection

@section('content')
<div class="col-md-5">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Suppliers</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead><tr><th>Action</th><th>Supplier</th><th>Last supply</th></tr></thead>
                <tbody>
                    @foreach($suppliers as $supplier)
                    <tr>
                        <td>
                            <center>
                                <a href="/supplies/{{ $supplier->id }}/edit" class="btn btn-sm bg-maroon"><i class="fa fa-pencil"></i>&nbsp; Edit</a>
                            </center>
                        </td>
                        <td>{{ $supplier->supplier }}</td>
                        <td>{{ date('d M Y H:i A',strtotime($supplier->supplies->pluck('created_at'))) }}</td>
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
            <h3 class="box-title">Add Product Supplier</h3>
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

            <form action="/supplies" method="post">
            {{ csrf_field()}}
                <div class="form-group">
                    <label for="name">Supplier Name:</label>
                    <input type="text" name="supplier" id="supplier" class="form-control" value="{{ old('supplier') }}">
                </div>
                <div class="clearfix"></div>
                <div class="form-group text-center">
                    <a href="/supplies" class="btn btn-default">Cancel</a>
                    <input type="submit" value="Add Supplier" name="add_sup" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="col-md-5">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Register Supplies</h3>
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

            <form action="/supply" method="post">
            {{ csrf_field()}}
                <div class="form-group col-sm-9 col-sm-offset-1">
                <label for="name">Supplier:</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->supplier }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-9 col-sm-offset-1">
                <label for="name">Product Supplied:</label>
                    <select name="goods_supplied[]" class="form-control select2" multiple="multiple" data-placeholder="Select Products" style="width: 100%;">
                        <option value=""></option>
                        @foreach($products as $product)

                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-sm-9 col-sm-offset-1">
                    <label>
                    <input type="checkbox" name="complete" class="flat-red">&nbsp; Supply Complete
                    </label>
                </div>
                <div class="form-group col-sm-9 col-sm-offset-1">
                    <label for="name">Supply Note:</label>
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                </div>
                <div class="clearfix"></div>
                <div class="form-group text-center">
                    <a href="/supplies" class="btn btn-default">Cancel</a>
                    <input type="submit" value="Add Goods" name="add_supply" class="btn btn-info">
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Recent Supplies</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
        <table id="example3" class="table table-bordered table-hover">
            <thead><tr><th>Status</th><th>Supplier</th><th>Goods supplied</th><th>Description</th><th>Last supply</th></tr></thead>
                <tbody>
                    @foreach($supplies as $supply)
                    <?php $goods = $supply->goods_supplied; ?>
                    <tr>
                        <td>
                            @if($supply->complete)
                            <span class="text-success"><i class="fa fa-check"></i>&nbsp; Completed</span>
                            @else
                            <span class="text-danger">Pending</span>
                            @endif  
                        </td>
                        <td>{{ $supply->supplier->supplier }}</td>
                        <td>{{ $products->whereIn('id',$goods)->pluck('product_name') }}</td>
                        <td>{{ $supply->description }}</td>
                        <td>{{ date('d M Y H:i A',strtotime($supply->created_at)) }}</td>
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
    <script src="/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            });

            $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            });

            $('.select2').select2()

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
            })

        })
    </script>
@endsection