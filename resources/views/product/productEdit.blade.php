@extends('layouts.app')

@section('content')
          <div class="container">
            <div class="row justify-content-center">
                {{-- Product View Table --}}
				<div class="col-sm-11">
					<div class="card bg-gray mb-3">
					  <div class="card-header h4">All Products</div>
					  @if(Session::has('success') || Session::has('p_error') )
						<div class="alert {{Session::has('p_error')?'alert-danger' : 'alert-success'}}" role="alert">
							{{ session('success') }}{{ session('p_error') }}
						</div>
					  @endif
					  <div class="card-body">
						<table class="table table-striped">
						  <thead>
							<tr>
							  <th scope="col">Sl</th>
							  <th scope="col">Name</th>
							  <th scope="col">Image</th>
							  <th scope="col">Price</th>
							  <th scope="col">Action</th>
							</tr>
						  </thead>
						  <tbody>
						  @if(count($product) >0)
							@foreach($product as $data)
							<tr>
							  <th scope="row">{{$loop->iteration}}</th>
							  <td>{{$data->name}}</td>
							  <td><img src="{{asset('public/'.$data->image)}}" alt="{{$data->name}}" height="70"></td>
							  <td>{{$data->price}}</td>
							  <td>
							  {{-- Product View --}}
								<a id="view" role="button" class="btn btn-primary btn-sm" title="Product View"  data-toggle="popover" data-title="Product View" data-placement="left" data-html="true"  data-trigger="hover" data-content="
								<b>Name:</b> {{$data->name}}<br>
								<b>Price:</b> {{$data->price}}<br>
								<b>Description:</b> {{$data->description}}<br>
								<b>Image:</b> <br> <img src='{{asset('public/'.$data->image)}}' alt='{{$data->name}}' height='200'> <br>
								
								">
								  <span data-feather="eye"></span>
								</a>
							  {{-- Product Edit --}}
								<a Id="edit" role="button" class="btn btn-warning btn-sm" title="Product Edit" data-toggle="modal" data-target="#productInfo_{{$data->id}}">
								  <span data-feather="edit"></span>
								</a>
							  {{-- Product Delete --}}
								<a role="button" class="btn btn-danger btn-sm" title="Product Delete"
                                       onclick="if(!confirm('do you want to delete this {{$data->name}} Product ?')){event.preventDefault(); location.reload();}else{document.getElementById('product-delete-form_{{$data->id}}').submit();} ">
								  <span data-feather="trash-2"></span>
								</a>
								<form id="product-delete-form_{{$data->id}}" action="{{ url(Auth::user()->role.'/product/delete') }}" method="POST" style="display: none;">
                                        @csrf
										<input type="hidden" name="id" value="{{$data->id}}">
                                 </form>
								
								{{-- Product Info Modal--}}
								@include('product.productInfo')
							  </td>
							</tr>
							@endforeach
						  @else
							<tr class="text-center">
							  <td colspan="5" scope="row">
								Their Have No Product at Yet..
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script>
$(document).ready(function () {
  $('[data-toggle="popover"]').popover();
})
</script>
@endsection






