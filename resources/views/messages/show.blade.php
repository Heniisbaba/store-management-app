@extends('master')

@section('title-and-meta')
<title>Store | Supplies</title>
@endsection

@section('css')

@endsection

@section('heading')

@endsection

@section('content')
<div class="row">
    <div class="col-md-4">
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
                    <li class="active"><a href="/messages"><i class="fa fa-inbox"></i> Inbox
                            <span class="label label-primary pull-right">{{ $count }}</span></a></li>
                    
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /. box -->
        <div class="box box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Labels</h3>

                <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body no-padding">
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                </ul>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
    <div class="col-md-8">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Read Mail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <div class="mailbox-read-info">
                    <h3>{{ $notification->data['subject']}}</h3>
                    <h5>From: StoreBot
                        <span class="mailbox-read-time pull-right">15 Feb. 2016 11:03 PM</span></h5>
                </div>
                <!-- /.mailbox-read-info -->
                <div class="mailbox-read-message">
                    <p>Hello,</p>
                    @foreach($notification->data['line'] as $line)
                        <p>{{ $line }}</p>
                    @endforeach
                    <a href="{{ $notification->data['url'] }}" class="btn btn-info">{{ $notification->data['action'] }}</a>
                    <p class="">{{ $notification->data['thanks'] }}</p>
                </div>
                <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /. box -->
    </div>
    <!-- /.col -->
</div>
@endsection

@section('scripts')
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<script src="/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="/plugins/iCheck/icheck.min.js"></script>
@endsection 