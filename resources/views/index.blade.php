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
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-aqua text-center">
            <span class="info-box-icon bg-aqua-active"><i class="ion ion-ios-gear-outline"></i></span>
    
            <div class="info-box-content">
                <span class="info-box-text">Products</span>
                <span class="info-box-number">{{ $products->count() }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-red text-center">
            <span class="info-box-icon bg-red-active"><i class="fa fa-shopping-cart"></i></span>
    
            <div class="info-box-content">
                <span class="info-box-text">Sales</span>
                <span class="info-box-number">{{ $purchases->count() }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
    
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box text-center bg-lime-active">
                <span class="info-box-icon bg-lime"><i class="fa fa-money"></i></span>
    
                <div class="info-box-content">
                    <span class="info-box-text">Outlook</span>
                    <span class="info-box-number"></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box bg-yellow text-center">
            <span class="info-box-icon bg-yellow-active"><i class="ion ion-ios-pricetag-outline"></i></span>
    
            <div class="info-box-content">
                <span class="info-box-text">Inventory</span>
                <span class="info-box-number">{{ $products->sum('stock_quantity') }}</span>
            </div>
            <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Register purchase</h3>
                    <div class="box-tools pull-right">
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon bg-navy">Search</span>
                            <input type="search" name="search" id="input-search" autofocus class="form-control" value="" required="required" placeholder="Search by Product name">
                        </div>
                    </div>
    
                    <div id="result"></div>
                </div>
            </div>
    
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
    
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Today Sales</h3>

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
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(count($purchases))
                                @foreach($purchaseToday as $purchase)
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
                    <a href="/sales" class="btn btn-sm btn-default btn-flat pull-right">Mail to admin</a>
                </div>
            <!-- /.box-footer -->
            </div>

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
                                    <th>Date</th>
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
                    <a href="javascript:void(0)" class="uppercase">View All Products</a>
                </div>
                <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        
        <div class="modal fade" id="modal-info">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"><i class="fa fa-shopping-cart"></i> Make purchase</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <input type="hidden" name="id" id="product_id" value="">
                            <div class="form-group col-md-6"><label for="name">Name:</label>
                                <input type="text" id="product_name" disabled value="" class="form-control">
                            </div>
                            <div class="form-group col-md-6"><label for="size">Size:</label>
                                <input type="text"  name="size" id="size" disabled value="" class="form-control">
                            </div>
                            <div class="form-group col-md-6"><label for="rate">Rate/Price:</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue">&#8358;</span>
                                    <input type="text" id="rate" class="form-control" disabled value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6"><label for="rate">Stock:</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-truck"></i></span>
                                    <input type="text" id="stock" class="form-control" disabled value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6"><label for="customer_name">Customer Name:</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-user"></i></span>
                                    <input type="text" name="customer_name" id="customer_name" class="form-control"  value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6"><label for="phone">Customer Phone:</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-phone"></i></span>
                                    <input type="text" name="customer_phone" id="customer_phone" class="form-control"  value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6"><label for="mail">Customer Mail:</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-envelope"></i></span>
                                    <input type="text" name="customer_mail" id="customer_mail" class="form-control"  value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6"><label for="address">Customer Address:</label>
                                <div class="input-group">
                                    <span class="input-group-addon bg-blue"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="customer_address" id="customer_address" class="form-control"  value="">
                                </div>
                            </div>
                            <div class="form-group col-md-6"><label for="quantity">Quantity:</label>
                                <input type="number" name="purchase_quantity" id="purchase_quantity" class="form-control" value="1" max="">
                            </div>
                            <div class="form-group col-md-6"><label for="total">Total:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">&#8358;</span>
                                    <input type="number" id="total" class="form-control" value="">
                                </div>
                            </div>
    
                            <center>
                                <button type="cancel" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close</button>
                                <button onclick="register_purchase()" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>&nbsp; Purchase</button>
                            </center>  
                        <div>
                    </div>
                </div>
            <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- /.modal -->
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

            $('#example3').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        })

        $(document).ready(function(){
            $('#input-search').change(function(){
                $('#result').html('');
                var text = $(this).val();
                if (text != '') {
                    $('#result').html('');
                    $.ajax({
                        url: '/search',
                        method: 'post',
                        data: { 
                            _token: '{{csrf_token()}}',
                            search: text},
                        success: function(data){
                            table = '<table id="example3" class="table table-bordered table-hover">';
                            table += '<thead><tr><th>Action</th><th>Products</th><th>Quantity</th><th>Stock</th><th>Price</th></tr></thead>';
                            table += '<tbody>';
                            for (let i = 0; i < data.success.length; i++) {
                                let id = data.success[i].id;
                                table += '<tr><td>'
                                +'<button onclick="purchase('+id+')" class="btn btn-xs btn-success" title="purchase"><i class="fa fa-shopping-cart"></i></button>'
                                +'<a href="products/'+data.success[i].id+'" class="btn btn-xs btn-danger pull-right" title="view"><i class="fa fa-edit"></i></a>'
                                +'</td>';
                                table += '<td>'+data.success[i].product_name+'</td>';
                                table += '<td>'+data.success[i].physical_quantity+' '+data.success[i].physical_quantity_units+'</td>';
                                table += '<td>'+data.success[i].stock_quantity+' units</td>';
                                table += '<td>'+data.success[i].selling_price+' </td>';
                                table += '</tr>';
                            }
                            table += '</tbody></table>'
                            $('#result').html(table);
                        }
                    });
                }
            });
        });

        function purchase(id){
            var purchaseId = id;
            var content;
            $.ajax({
                url: '/itempurchase/'+purchaseId,
                method: 'post',
                data: { 
                    _token: '{{csrf_token()}}',
                },
                success: function(data){
                    $('#product_id').val(data.purchase.id);
                    $('#product_name').val(data.purchase.product_name);
                    $('#size').val(data.purchase.physical_quantity+' '+data.purchase.physical_quantity_units);
                    $('#quantity').val(1);
                    $('#rate').val(data.purchase.selling_price);
                    var stock = data.purchase.stock_quantity;
                    $('#stock').val(stock+' units');
                    $("#quantity").attr({
                        "max" : stock
                    });
                    // $('#image').html(data.images[0]);
                    $('#total').val(data.purchase.selling_price *1);
                    $('#modal-info').modal('show');
                }
            });
        }

        function register_purchase(){
            var product_id = $('#product_id').val();
            var product_name = $('#product_name').val();
            var size = $('#size').val();
            // alert(size);
            var rate = $('#rate').val();
            var customer_name = $('#customer_name').val();
            var customer_phone = $('#customer_phone').val();
            var customer_mail = $('#customer_mail').val();
            var customer_address = $('#customer_address').val();
            var purchase_quantity = $('#purchase_quantity').val();
            var total = $('#total').val();
            var data =    
            $.ajax({
                url: '/sales',
                method: 'post',
                data: {
                    _token: '{{csrf_token()}}',
                    'product_id':product_id,
                    'product_name':product_name,
                    'size':size,
                    'rate':rate,
                    'customer_name':customer_name,
                    'customer_phone':customer_phone,
                    'customer_mail':customer_mail,
                    'customer_address':customer_address,
                    'purchase_quantity':purchase_quantity,
                    'total':total,_token: '{{csrf_token()}}',
                },              
                success: function(data){
                    var content = $('.modal-body').html();
                    $('.modal-body').html(data.status);
                    setTimeout(() => {
                        $('#modal-info').modal('hide');
                        location.reload();
                    }, 2000);
                }
            });
        }
        $('#purchase_quantity').change(function(){
            var rate = $('#rate').val();
            var total =  $('#purchase_quantity').val() * rate;
            $('#total').val(total);
        });

    </script>
    
@endsection