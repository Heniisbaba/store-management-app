@extends('/master')

@section('title-and-meta')
    <title>Store | Supplier</title>
@endsection

@section('css')
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="/plugins/iCheck/all.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/bower_components/select2/dist/css/select2.min.css">
@endsection

@section('heading')

@endsection

@section('content')
    <div class="col-md-6">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Update Supplier</h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                <div class="col-xs-9 col-xs-offset-1">
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </div>
                @endif
                    <form action="/supplies/{{ $supplier->id }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" name="supplier" id="supplier" class="form-control" required value="{{ $supplier->supplier }}">
                        </div>
                        <div class="form-group text-center">
                            <a href="/supplies" class="btn btn-default">Cancel</a>
                            <input type="submit" value="Update" class="btn btn-primary">
                            <a class="btn btn-danger" data-toggle="modal" href="#modal-info">
                                Delete
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

    <div class="col-md-6">
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

    
    
    <div class="modal modal-default fade" id="modal-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <i class="fa fa-trash"></i>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger">Are you sure you want to permanently delete "{{ $supplier->supplier }}" ?</p>
                    <form action="/supplies/{{ $supplier->id }}" method="post">
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
    <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script src="/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {

            $('.select2').select2()

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass   : 'iradio_flat-green'
            })

        })
    </script>
@endsection