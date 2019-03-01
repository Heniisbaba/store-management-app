@extends('master')

@section('title-and-meta')
    <title>Store | Products</title>
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
            <h3 class="box-title">Products</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Physical Quantity</th>
                        <th>Date created</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <?php 
                        $i = 1;
                        $images = json_decode($product->product_images,true); 
                        $image = $images[0];
                        $i++;
                    ?>
                        <tr onmouseover="display_image('/images/{{ $image }}')">
                            <td>
                                <div class="btn-group btn-group-xs">
                                    <a href="/products/{{ $product->id }}/edit" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="/products/{{ $product->id }}" class="btn btn-danger">View</a>
                                </div>
                            </td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->category_id }}</td>
                            <td>{{ $product->brand_id }}</td>
                            <td>{!! money($product->selling_price) !!}</td>
                            <td>{{ $product->stock_quantity }}</td>
                            <td>{{ $product->physical_quantity.' '.$product->physical_quantity_units}}</td>
                            <td>{{ date('d M Y H:i A',strtotime($product->updated_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        {{ $products->links() }}
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="col-md-3">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Products</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <center>
                <img src="" id="img_div" class="img img-responsive" alt="Image">
            </center>
        </div>
    </div>
</div>


<div class="col-md-7">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Latest Sales</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table class="table no-margin">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Item</th>
                            <th>Quantity</th>
                            <th>Popularity</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(count($purchases))
                        @foreach($purchases as $purchase)
                        <tr>
                            <td>{{ $purchase->id }}</td>
                            <td>{{ $purchase->product_name }}</td>
                            <td>{{ $purchase->purchase_quantity }}</td>
                            <td>{{ date('d M Y H:i A',strtotime($purchase->updated_at)) }}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer clearfix">
            <a href="/sales" class="btn btn-sm btn-default btn-flat pull-right">View All Sales</a>
        </div>
        <!-- /.box-footer -->
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

        function display_image(url) {
            document.getElementById('img_div').src = url;
            img.src = url;
        }
    </script>
@endsection