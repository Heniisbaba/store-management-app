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
                <li class="">
                  <a href="/"><i class="fa fa-dashboard"></i> Dassboard</a>
                </li>
                <li class="active"><a href="/messages"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right"></span></a></li>
                <li class="">
                  <a href="/products"><i class="fa fa-shopping-cart"></i> Products</a>
                </li>
                <li class="">
                  <a href="/supplies"><i class="fa fa-truck"></i> Supplies</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Notifications</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach($notifications as $notification)
                    <?php 
                        $data = $notification->data;
                    ?>
                  <tr>
                    <!-- <td><input type="checkbox"></td> -->
                    <td class="mailbox-star"><a href="messages/{{ $notification->id }}"><i class="fa fa-envelope-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="messages/{{ $notification->id }}">{{ $data['name'] }}</a></td>
                    <td class="mailbox-subject"><b>{{ $data['subject'] }}</b> - {{ substr($data['line']['0'],0,30) }}...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
            </div>
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