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
<div class="col-md-8">
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

<div class="col-md-4">
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

<div class="col-md-3">
<a href="products/create" class="btn btn-primary pull-right" id="add-product-btn">Add New Ptoducts</a>

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