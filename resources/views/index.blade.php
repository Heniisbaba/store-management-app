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
                                table += '<tr><td><input type="hidden" id="purchase_id" value="'+data.success[i].id+'">'+
                                '<button onclick="purchase()" class="btn btn-xs btn-success"><i class="fa fa-shopping-cart"></i></button></td>';
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

        $('#purchase').click(function(){
            alert('Success')
            var purchaseId = $('#purchase_id').val();
            $.ajax({
                url: '/itempurchase/'+purchaceId,
                method: 'post',
                data: { 
                    _token: '{{csrf_token()}}',
                    // product: purchaceId
                },
                success: function(data){
                    alert(data.success)
                }
            });
        });
    </script>
    
@endsection