@extends('master')

@section('title-and-meta')
    <title>Store | Sales</title>
@endsection

@section('css')
    <!-- Morris charts -->
    <link rel="stylesheet" href="/bower_components/morris.js/morris.css">
@endsection

@section('heading')

@endsection

@section('content')
<div class="col-md-7">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Products</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table class="table table-bordered table-hover">
                <thead class="bg-fuchsia-active">
                    <tr>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Customer</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchases as $purchase)

                    <tr>
                        <td>{{ $purchase->product_name }}</td>
                        <td>{{ $purchase->size }}</td>
                        <td>{{ $purchase->purchase_quantity }}</td>
                        <td>{!! money($purchase->total) !!}</td>
                        <td>{{ $purchase->customer_name }}</td>
                        <td>{{ $purchase->customer_phone }}</td>
                        <td>{{ date('d M Y H:i A',strtotime($purchase->updated_at)) }}</td>
                        <td><a href="/sales/{{ $purchase->id }}" class="btn btn-info">View</a></td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr><td colspan="8">{{ $purchases->links() }}</td></tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<div class="col-sm-5">
    <div class="box box-info">
        <div class="box-header with-border">
            <h3 class="box-title">Line Chart</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
            </button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body chart-responsive">
            <div class="chart" id="line-chart" style="height: 300px;"></div>
        </div>
        <!-- /.box-body -->
    </div>
</div>
<!-- /.box -->

<div class="col-md-3">
    <a href="/" class="btn btn-primary pull-right" id="add-product-btn">Register new purchase</a>
</div>


@endsection

@section('scripts')
    <script src="../../bower_components/raphael/raphael.min.js"></script>
    <script src="/bower_components/morris.js/morris.min.js"></script>
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
    <script>
        $.ajax({
            url: '/sales/chart',
            method: 'post',
            data: { 
                _token: '{{csrf_token()}}',
            },
            success: function(data){
                // alert(data);
                var line = new Morris.Line({
                    element: 'line-chart',
                    resize: true,
                    data: 
                    [
                        {y: '2011 Q1', item1: 2666},
                        {y: '2011 Q2', item1: 2778},
                        {y: '2011 Q3', item1: 4912},
                        {y: '2011 Q4', item1: 3767},
                        {y: '2012 Q1', item1: 6810},
                        {y: '2012 Q2', item1: 5670},
                        {y: '2012 Q3', item1: 4820},
                        {y: '2012 Q4', item1: 15073},
                        {y: '2013 Q1', item1: 10687},
                        {y: '2013 Q2', item1: 8432}
                    ],
                    xkey: 'y',
                    ykeys: ['item1'],
                    labels: ['Item 1'],
                    lineColors: ['#3c8dbc'],
                    hideHover: 'auto'
                });
            }
        });

  $(function () {
    "use strict";

    // LINE CHART
    

  });
</script>
@endsection