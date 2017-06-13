@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Guard</div>

                <div class="panel-body">
                  <table class="table">
                    <tr>
                      <th>Id</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Actions</th>
                      <th></th>
                    </tr>

                  @foreach ($guards as $guard)
                    <tr>
                      <td> {{ $guard->id  }} </td>
                      <td> {{ $guard->name  }} </td>
                      <td> {{ $guard->email  }} </td>
                      <td> <a href={{route('guard.edit',$guard->id)}} class="btn btn-primary btn-bl"> Edit Guard </a> </td>
                       <td>
                         <form method="POST" action="{{ route('guard.destroy', $guard->id) }}">
                           <input type="submit" value="Delete" class="btn btn-danger btn-block">
                           <input type="hidden" name="_token" value="{{ Session::token() }}">
                           {{ method_field('DELETE') }}
                         </form>﻿
                        </td>
                    </tr>
                  @endforeach
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
