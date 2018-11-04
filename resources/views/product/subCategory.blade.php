@extends('layouts.app')

@section('content')
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{__('Product Sub-Category')}}</h1>
                        </div>

                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="post" action="{{url(Auth::user()->role.'/product/sub-category')}}">
                                @csrf
								<div class="form-group">
									<label for="baseCategory">Base Category</label>
									<select name="base" class="form-control {{ $errors->has('base') ? ' is-invalid' : '' }}" id="baseCategory">
									  <option value="">Please Select Base Category</option>
									  @foreach($base as $data)
										<option value="{{$data->id}}" {{ (old('base') == $data->id) ? 'selected' : ''}}>{{ title_case($data->name)}}</option>
									  @endforeach
									</select>
									@if ($errors->has('base'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('base') }}</strong>
										</span>
									@endif
								</div>
                                <div class="form-group">
                                    <label for="sub_category">{{ __('Product Sub-Category') }}</label>
									<input id="sub_category" type="text" class="form-control{{ $errors->has('sub_category') ? ' is-invalid' : '' }}" name="sub_category" value="{{ old('sub_category') }}" required autofocus>

									@if ($errors->has('sub_category'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('sub_category') }}</strong>
										</span>
									@endif
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
				{{-- Sub Category View Table --}}
				<div class="col-sm-11">
					<div class="card text-white bg-dark mb-3">
					  <div class="card-header h3">Main & Sub Category</div>
					  <div class="card-body">
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th scope="col">Sl</th>
							  <th scope="col">Category Name</th>
							  <th scope="col">Sub Category</th>
							</tr>
						  </thead>
						  <tbody>
						  @if(count($base) >0)
							@foreach($base as $data)
							<tr>
							  <th class="align-middle" scope="row">{{$loop->iteration}}</th>
							  <td class="align-middle h1">{{$data->name}}</td>
							  <td>
								<table class="table table-dark mb-0">
									@foreach($data->subCateg as $subcateg)
									<tr class="bg-dark">
										<td>{{ $subcateg->name}}</td>
									</tr>
									@endforeach
								</table>
							  </td>
							</tr>
							@endforeach
						  @else
							<tr class="text-center">
							  <td colspan="3" scope="row">
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
