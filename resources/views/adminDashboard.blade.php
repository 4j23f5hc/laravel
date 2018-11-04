@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-sm-11">
          <div class="card">
              <div class="card-header">{{title_case(Auth::user()->role)}} Dashboard</div>

              <div class="card-body">
                  @if (session('status'))
                      <div class="alert alert-success" role="alert">
                          {{ session('status') }}
                      </div>
                  @endif

                  You are logged in!
                  {{ Auth::user() }}
              </div>
          </div>
      </div>
  </div>
</div>


@endsection
