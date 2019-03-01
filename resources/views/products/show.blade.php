@extends('master')

@section('title-and-meta')
    <title>Store | Product</title>
    <link rel="stylesheet" href="/fotorama/fotorama.css">
@endsection

@section('css')

@endsection

@section('heading')

@endsection

@section('content')
<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Product</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead class="">
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Physical Quantity</th>
                        <th>Date created</th>
                        <th>Date Updated</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->category_id }}</td>
                        <td>{{ $product->brand_id }}</td>
                        <td>{{ $product->selling_price }}</td>
                        <td>{{ $product->stock_quantity }}</td>
                        <td>{{ $product->physical_quantity.' '.$product->physical_quantity_units}}</td>
                        <td>{{ date('d M Y H:i A',strtotime($product->created_at)) }}</td>
                        <td>{{ date('d M Y H:i A',strtotime($product->updated_at)) }}</td>
                        <td>
                            <a data-toggle="modal" data-target="#modal-info" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            <a href="/products/{{ $product->id }}/edit" class="btn btn-xs btn-info pull-right"><i class="fa fa-pencil"></i></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Product</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <div class="fotorama center-block">
                <center>
                    <?php 
                    $images = json_decode($product->product_images,true); ?>
                    @foreach($images as $image)
                    <img src="/images/{{ $image }}" width="200px" height="150px" >
                    @endforeach
                </center>
            </div>
        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Recently Added Products</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">
            @foreach($products as $product)
            <?php 
                $images = json_decode($product->product_images,true); 
                $image = $images[0];
            ?>
                <li class="item">
                    <div class="product-img">
                    <img src="/images/{{$image}}" alt="Product Image">
                    </div>
                    <div class="product-info">
                    <a href="/products/{{ $product->id }}" class="product-title">{{ $product->product_name }}
                        <span class="label bg-navy pull-right">{!! money($product->selling_price) !!}</span></a>
                    <span class="product-description">
                            {{ $product->physical_quantity.' '.$product->physical_quantity_units }}
                        </span>
                    </div>
                </li>
            @endforeach
            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="/products" class="uppercase">View All Products</a>
        </div>
        <!-- /.box-footer -->
    </div>
    <!-- /.box -->
</div>

<div class="col-md-3">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Links</h3>

            <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="/products"><i class="fa fa-inbox"></i> Products
                        <span class="label label-primary pull-right">{{ $count['products'] }}</span></a>
                </li>
                <li class="active"><a href="/sales"><i class="fa fa-inbox"></i> Sales
                        <span class="label label-primary pull-right">{{ $count['purchases'] }}</span></a>
                </li>
                <li class="active">
                    <a href="/products/create"><i class="fa fa-inbox"></i> Add new Product</a>
                </li>
                
            </ul>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /. box -->
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
   <script src="/fotorama/fotorama.js"></script>
@endsection