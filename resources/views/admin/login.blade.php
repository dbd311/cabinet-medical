@extends('admin.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">Login to Admin Panel</div>
                <div class="panel-body">
                    @if ($errors != 'None')
                    <div class="alert alert-danger">
                        <strong>Invalid Username or Password</strong>
                    </div>
                    @endif

                    {!! Form::open(array('url' => 'admin/login', 'class' => 'form-horizontal')) !!}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email" class="col-2 control-label">Email</label>
                        <div class="col-3">
                            <input type="text" class="form-control" id="email" name="email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-3">
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-primary">Log in</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection