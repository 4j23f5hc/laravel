@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
      <div class="col-sm-11">
          <div class="card">
              <div class="card-header">{{title_case(Auth::user()->role)}} Dashboard</div>

              <div class="card-body">
          <dl class="row">
            <dt class="col-sm-3">Name</dt>
            <dd class="col-sm-9">{{ title_case(Auth::user()->name)}}</dd>
            <dt class="col-sm-3">Phone</dt>
            <dd class="col-sm-9">{{ title_case(Auth::user()->phone)}}</dd>
            <dt class="col-sm-3">Email</dt>
            <dd class="col-sm-9">{{ title_case(Auth::user()->email)}}</dd>
          </dl>
              </div>
          </div>
      </div>
  </div>
</div>


@endsection
