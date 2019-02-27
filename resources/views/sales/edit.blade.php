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
                <h3 class="box-title">Update Product</h3>
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
                <form action="/products/{{ $product->id }}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    {{ csrf_field() }}
                        <div class="form-group col-md-6">
                            <label for="name">Product Name:</label>
                            <input type="text" name="product_name" id="name" class="form-control" value="{{ $product->product_name }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password">Product Images:</label>
                            <input type="file" name="product_images[]" multiple id="product_image" class="form-control" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Category:</label>
                            <input type="number" name="category_id" value="{{ $product->category_id }}" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Brand:</label>
                            <input type="number" name="brand_id" class="form-control" value="{{ $product->brand_id }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Cost:</label>
                            <input type="number" name="purchase_cost" class="form-control" value="{{ $product->purchase_cost }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Selling Price:</label>
                            <input type="number" name="selling_price" class="form-control" value="{{ $product->selling_price }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Supplier:</label>
                            <input type="number" name="supplier_id" class="form-control" value="{{ $product->supplier_id }}">
                        </div>
                    
                        <div class="form-group col-md-6">
                            <label for="confirm">Stock Quantity: <span style="text-align:right;color:red">{{ $product->stock_quantity }} in stock</span></label>
                            <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity') }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Measuring units:</label>
                            <input type="text" name="physical_quantity_units" class="form-control" value="{{ $product->physical_quantity_units }}">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="confirm">Physical Quantities:</label>
                            <input type="text" name="physical_quantity" class="form-control" value="{{ $product->physical_quantity }}">
                        </div>
            
                        <div class="clearfix"></div>
                        <div class="form-group text-center">
                            <a href="products" class="btn btn-default">Cancel</a>
                            <input type="submit" value="Add User" name="add_product" class="btn btn-info">
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
                    <p class="text-center text-danger">Are you sure you want to permanently delete "{{ $product->product_name }}" ?</p>
                    <form action="/products/{{ $product->id }}" method="post">
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