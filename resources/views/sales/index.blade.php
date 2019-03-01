@extends('master')

@section('title-and-meta')
    <title>Store | Sales</title>
@endsection

@section('css')
@endsection

@section('heading')

@endsection

@section('content')

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
</div>

<div class="col-md-6">
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
</div>

<div class="col-md-12">
    <div class="box box-danger">
        <div class="box-header with-border">
            <h3 class="box-title">Sales</h3>
            <div class="box-tools pull-right">
            </div>
        </div>
        <div class="box-body">
            <table class="table no-margin">
                <thead>
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
                        <td><a href="/sales/{{ $purchase->id }}" class="btn btn-info btn-sm">View</a></td>
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


<div class="col-md-3">
    <a href="/" class="btn btn-primary pull-right" id="add-product-btn">Register new purchase</a>
</div>


@endsection

@section('scripts')
    <!-- FastClick -->
    <script src="/bower_components/fastclick/lib/fastclick.js"></script>
@endsection