@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update Guard</div>

                <div class="panel-body">
                  <form class="" method="POST" action="{{ route('visitor.update',$visitor->id) }}">
                    <div class="form-group">
                      <label for="comment">Feedback:</label>
                      <textarea type="text" class="form-control input-lg" id="comment" name="comment" rows="10"></textarea>
                    </div>
                    <input type="submit" value="Send Feedback" class="btn btn-success btn-lg btn-block">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    {{ method_field('PUT') }}
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
