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

            <a href="/search">go</a>
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
                <!-- <form action="/purchase" method="post"> -->
                    {{ csrf_field() }}
                        <div class="form-group col-md-6"><label for="name">Name:</label>
                            <input type="text" id="product_name" disabled value="" class="form-control">
                        </div>
                        <div class="form-group col-md-6"><label for="size">Size:</label>
                            <input type="text" id="size" disabled value="" class="form-control">
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
                        <div class="form-group col-md-6"><label for="customer">Customer Name:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-blue"><i class="fa fa-user"></i></span>
                                <input type="text" name="customer" id="customer" class="form-control"  value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6"><label for="phone">Customer Phone:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-blue"><i class="fa fa-phone"></i></span>
                                <input type="text" name="phone" id="phone" class="form-control"  value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6"><label for="mail">Customer Mail:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-blue"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="mail" id="mail" class="form-control"  value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6"><label for="address">Customer Address:</label>
                            <div class="input-group">
                                <span class="input-group-addon bg-blue"><i class="fa fa-map-marker"></i></span>
                                <input type="text" name="address" id="address" class="form-control"  value="">
                            </div>
                        </div>
                        <div class="form-group col-md-6"><label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" class="form-control" value="1" max="">
                        </div>
                        <div class="form-group col-md-6"><label for="quantity">Total:</label>
                            <div class="input-group">
                                <span class="input-group-addon">&#8358;</span>
                                <input type="number" id="total" class="form-control" value="">
                                </div>
                        </div>

                        <center>
                            <button type="cancel" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>&nbsp; Purchase</button>
                        </center>  
                    </div>          
                <!-- </form> -->
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
                    $('#product_name').val(data.purchase.product_name);
                    $('#size').val(data.purchase.physical_quantity+' '+data.purchase.physical_quantity_units);
                    $('#quantity').val(1);
                    $('#rate').val(data.purchase.selling_price);
                    var stock = data.purchase.stock_quantity;
                    $('#stock').val(stock+' units');
                    $("#quantity").attr({
                        "max" : stock
                    });
                    $('#modal-info').modal('show');
                }
            });
        }
        $('#quantity').change(function(){
            var rate = $('#rate').val();
            var total =  $('#quantity').val() * rate;
            $('#total').val(total);
        });
    </script>
    
@endsection