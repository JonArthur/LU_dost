@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Visitor</div>

                <div class="panel-body">
                  <form class="" method="POST" action="{{ route('visitor.store') }}">
                    <div class="form-group">
                      <label name="first_name">First Name:</label>
                      <input id="name" name="first_name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="last_name">Last Name:</label>
                      <input id="name" name="last_name" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="contact_num">Contact #:</label>
                      <input id="name" name="contact_num" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="email">E-mail:</label>
                      <input id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="company">Company:</label>
                      <input id="email" name="company" class="form-control">
                    </div>
                    <div class="form-group">
                      <label name="purpose">Purpose:</label>
                      <input id="email" name="purpose" class="form-control">
                    </div>
                    <input type="submit" value="Save" class="btn btn-success btn-lg btn-block">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
