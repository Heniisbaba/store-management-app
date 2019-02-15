@extends('/master')

@section('title-and-meta')
    <title>Store | Admins</title>
@endsection

@section('css')

@endsection

@section('heading')

@endsection

@section('content')
    <div class="col-md-4">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Update Category</h3>
                <div class="box-tools pull-right">
                </div>
            </div>
            <div class="box-body">
                <div class="col-xs-9 col-xs-offset-1">
                    <form action="/categories/{{ $category->id }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" name="category" id="name" class="form-control" required value="{{ $category->category }}">
                        </div>
                        <div class="form-group text-center">
                            <a href="/categories" class="btn btn-default">Cancel</a>
                            <input type="submit" value="Update" class="btn btn-primary">
                            <a class="btn btn-danger" data-toggle="modal" href="#modal-info">
                                Delete
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal modal-default fade" id="modal-info">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <i class="fa fa-trash"></i>
                </div>
                <div class="modal-body">
                    <p class="text-center text-danger">Are you sure you want to permanently delete "{{ $category->category }}" ?</p>
                    <form action="/categories/{{ $category->id }}" method="post">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <center>
                            <button type="cancel" class="btn btn-info" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>&nbsp; Delete</button>
                        </center>            
                    </form>
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

@endsection