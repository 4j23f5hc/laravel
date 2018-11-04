@extends('layouts.app')

@section('content')
          <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="card">
                        <div class="card-header">
                            <h1>{{__('Product Create')}}</h1>
                        </div>
                        <div class="card-body">
                            @if(Session::has('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form method="post" action="{{url(Auth::user()->role.'/product/product-add')}}" enctype="multipart/form-data">
                                @csrf
								{{-- Product Category --}}
								<div class="form-group">
									<label for="productCategory">Product Category</label>
									<select name="productCategory" class="form-control {{ $errors->has('productCategory') ? ' is-invalid' : '' }}" id="productCategory">
									  <option value="">Please Select Product Category</option>
									@foreach($base as $data)
									{{-- Main Category Loop --}}
										{{--<option class="bg-light" disabled>{{$data->name}}</option>--}}
									  @foreach($data->subCateg as $subCateg)
									  {{-- Sub Category Loop --}}
										<option value="{{$subCateg->id}}" {{ (old('productCategory') == $subCateg->id) ? 'selected' : ''}} >{{$data->name}} >> {{$subCateg->name}}</option>
									  @endforeach
									@endforeach
									</select>
									@if ($errors->has('productCategory'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('productCategory') }}</strong>
										</span>
									@endif
								</div>
								{{-- Product Name --}}
                                <div class="form-group">
                                    <label for="name">{{ __('Product Name') }}</label>
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

									@if ($errors->has('name'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('name') }}</strong>
										</span>
									@endif
                                </div>
								{{-- Product Price --}}
                                <div class="form-group">
                                    <label for="price">{{ __('Product Price') }}</label>
									<input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>

									@if ($errors->has('price'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('price') }}</strong>
										</span>
									@endif
                                </div>
								{{-- Product Description --}}
                                <div class="form-group">
                                    <label for="description">{{ __('Product Description') }}</label>
									<textarea id="description" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description') }}</textarea>

									@if ($errors->has('description'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('description') }}</strong>
										</span>
									@endif
                                </div>
								{{-- Product Image --}}
								<div class="form-group">
									<label for="image">{{__('Product Image')}}</label>
									<input type="file" name="image" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" value="{{old('image')}}">
									@if ($errors->has('image'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ $errors->first('image') }}</strong>
										</span>
									@endif
								</div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>


@endsection
