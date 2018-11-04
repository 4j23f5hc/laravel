@extends('layouts.app')

@section('content')
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{__('Product Category')}}</h1>
                        </div>

                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            <form method="post" action="{{url(Auth::user()->role.'/product/category')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="category">{{ __('Product Category') }}</label>
									<input id="category" type="text" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" value="{{ old('category') }}" required autofocus>

									@if ($errors->has('category'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('category') }}</strong>
										</span>
									@endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
				{{-- Category View Table --}}
				<div class="col-sm-11">
					<div class="card text-white bg-primary mb-3">
					  <div class="card-header">Main Category</div>
					  <div class="card-body">
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th scope="col">Sl</th>
							  <th scope="col">Category Name</th>
							</tr>
						  </thead>
						  <tbody>
						  @if(count($base) >0)
							@foreach($base as $data)
							<tr>
							  <th scope="row">{{$loop->iteration}}</th>
							  <td>{{$data->name}}</td>
							</tr>
							@endforeach
						  @else
							<tr class="text-center">
							  <td colspan="2" scope="row">
								Their Have No Main Category at Yet..
							  </td>
							</tr>
						  @endif
						  </tbody>
						</table>
					  </div>
					</div>
				</div>
			</div>
          </div>


@endsection
