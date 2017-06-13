@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Guard</div>

                <div class="panel-body">
                  <form class="" method="POST" action="{{ route('guard.store') }}">
                    <div class="form-group">
                      <label name="name">Name:</label>
                      <input id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="email">E-mail:</label>
                      <input id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="password">Password:</label>
                      <input id="password" name="password" type="password"class="form-control">
                    </div>
                    <input type="submit" value="Add Guard" class="btn btn-success btn-lg btn-block">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
