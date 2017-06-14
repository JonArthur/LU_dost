@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

            <div class="panel panel-default">
                <div class="panel-heading">Guard
                </div>
                
                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <th>Id</th>
                      <th>First Name</th>
                      <th>Last name</th>
                      <th>Contact #</th>
                      <th>Email</th>
                      <th>Company</th>
                      <th>Purpose</th>
                      <th>Entry Time</th>
                      <th>Exit Time</th>
                      <th>Status</th>
                    </tr>



                      @foreach ($visitors as $visitor)
                        <tr>
                        <td>{{$visitor->id}}</td>
                        <td>{{$visitor->first_name}}</td>
                        <td>{{$visitor->last_name}}</td>
                        <td>{{$visitor->contact_num}}</td>
                        <td>{{$visitor->email}}</td>
                        <td>{{$visitor->company}}</td>
                        <td>{{$visitor->purpose}}</td>
                        <td>{{$visitor->entry_time}}</td>
                        @if ($visitor->status == 1)
                          <td>N/A</td>
                          <td><a class="btn btn-warning" href="{{route('visitor.edit',$visitor->id)}}">Log out</a></td>
                       @else
                         <td>{{$visitor->exit_time}}</td>
                         <td><a class="btn btn-primary">Cleared</a></td>
                        @endif

                        </tr>
                      @endforeach

                  </table>
                    {!! $visitors->links(); !!}
                </div>

        </div>
    </div>
</div>
@endsection
