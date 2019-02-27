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
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
        <div class="inner">
            <h3>150</h3>

            <p>Sales</p>
        </div>
        <div class="icon">
            <i class="ion ion-bag"></i>
        </div>
        <a href="/sales" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
        <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
        </div>
        <div class="icon">
            <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
        <div class="inner">
            <h3>44</h3>

            <p>User Registrations</p>
        </div>
        <div class="icon">
            <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
        <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
        </div>
        <div class="icon">
            <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
<!-- ./col -->
</div>

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
                    <input type="search" name="search" id="input-search" class="form-control" value="" required="required" placeholder="Search by Product name">
                </div>
            </div>

            <div id="result"></div>
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
                                table += '<tr><td><button onclick="purchase('+data.success[i].id+')" class="btn btn-xs btn-success"><i class="fa fa-shopping-cart"></i></button></td>';
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
                        $('.modal-body').html(content);
                    }, 4000);
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