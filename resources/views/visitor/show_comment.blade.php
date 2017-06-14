@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          <div class="col-md-8 col-md-offset-2">
              <div class="panel panel-default">
              <h3>Feedbacks</h3>
              </div>
            <div class="panel panel-default">
              @foreach ($comments as $comment)

                <div class="panel-heading"><b>{{ $comment->first_name}}</b>:
                </div>

                <div class="panel-body"><b>{{ $comment->comment}}</b>

                </div>

              @endforeach
              </div>
          </div>
    </div>
</div>
@endsection
