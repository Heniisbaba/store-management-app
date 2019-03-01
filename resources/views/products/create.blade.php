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
<div class="col-md-6 col-md-offset-3">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Add a new product</h3>
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

            <form action="/products" method="post" enctype="multipart/form-data">
            {{ csrf_field()}}
                <div class="form-group col-md-6">
                    <label for="name">Product Name:</label>
                    <input type="text" name="product_name" id="name" class="form-control" value="{{ old('product_name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="password">Product Images:</label>
                    <input type="file" name="product_images[]" multiple id="product_image" class="form-control" >
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Category:</label>
                    <input type="number" name="category_id" value="{{ old('category_id') }}" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Brand:</label>
                    <input type="number" name="brand_id" class="form-control" value="{{ old('brand_id') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Cost:</label>
                    <input type="number" name="purchase_cost" class="form-control" value="{{ old('purchase_cost') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Selling Price:</label>
                    <input type="number" name="selling_price" class="form-control" value="{{ old('selling_price') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Supplier:</label>
                    <select name="supplier_id" id="supplier_id" class="form-control">
                        <option value="0">Anonymous</option>
                        @foreach($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->supplier }}</option>
                        @endforeach
                    </select>
                </div>
               
                <div class="form-group col-md-6">
                    <label for="confirm">Stock Quantity:</label>
                    <input type="number" name="stock_quantity" class="form-control" value="{{ old('stock_quantity') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Measuring units:</label>
                    <input type="text" name="physical_quantity_units" class="form-control" value="{{ old('physical_quantity_units') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="confirm">Physical Quantities:</label>
                    <input type="text" name="physical_quantity" class="form-control" value="{{ old('physical_quantity') }}">
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
@endsection

@section('scripts')

@endsection