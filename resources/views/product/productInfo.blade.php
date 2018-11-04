<!-- Product Info Modal -->
<div class="modal fade actionModal" id="productInfo_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="productEditForm" method="post" action="{{url(Auth::user()->role.'/product/product-edit')}}" enctype="multipart/form-data">
			@csrf
			<input type="hidden" name="id" value="{{$data->id}}">
			{{-- Product Name --}}
			<div class="form-group">
				<label for="name">{{ __('Product Name') }}</label>
				<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name')? old('name') : $data->name}}" required autofocus>

				@if ($errors->has('name'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('name') }}</strong>
					</span>
				@endif
			</div>
			{{-- Product Price --}}
			<div class="form-group">
				<label for="price">{{ __('Product Price') }}</label>
				<input id="price" type="text" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price')?old('price'): $data->price }}" required>

				@if ($errors->has('price'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('price') }}</strong>
					</span>
				@endif
			</div>
			{{-- Product Description --}}
			<div class="form-group">
				<label for="description">{{ __('Product Description') }}</label>
				<textarea id="description" type="text" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description')? old('description') : $data->description }}</textarea>

				@if ($errors->has('description'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>
			{{-- Product Image --}}
			<div class="form-group">
				<img src="{{asset('public/'.$data->image)}}" alt="{{$data->name}}" height="200"><br>
				<label for="image">{{__('Product Image')}}</label>
				<input type="file" name="image" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image" value="{{old('image')}}">
				@if ($errors->has('image'))
					<span class="invalid-feedback" role="alert">
						<strong>{{ $errors->first('image') }}</strong>
					</span>
				@endif
			</div>
			<button id="productEditButton" type="submit" class="btn btn-primary">Submit</button>
		</form>
                        
      </div>
    </div>
  </div>
</div>