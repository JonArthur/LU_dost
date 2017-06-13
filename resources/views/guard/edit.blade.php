@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Guard</div>

                <div class="panel-body">
                  <form class="" method="POST" action="{{ route('guard.update',$guard->id) }}">
                    <div class="form-group">
                      <label name="name">Name:</label>
                      <input id="name" name="name" class="form-control" value={{ $guard->name}}>
                    </div>
                    <div class="form-group">
                      <label name="email">E-mail:</label>
                      <input id="email" name="email" class="form-control" value={{ $guard->email}}>
                    </div>
                    <div class="form-group">
                      <label name="password">Password:</label>
                      <input id="password" name="password" type="password"class="form-control" value={{ $guard->password}}>
                    </div>
                    <input type="submit" value="Update Guard" class="btn btn-success btn-lg btn-block">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    {{ method_field('PUT') }}
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
