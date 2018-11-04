@auth
<nav class="col-md-2 d-none d-md-block bg-light sidebar">
      <div class="sidebar-sticky">
    {{-- Auth Role Shortener --}}
    @php
      $role= Auth::user()->role;
    @endphp
        <ul class="nav flex-column accordion" id="dashboard">
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="home"></span>
                  Dashboard <span class="sr-only">(current)</span>
                </a>
              </li>
        {{-- Authorized User Role Access --}}
        @if($role === 'admin')
              <li class="nav-item" data-toggle="collapse" data-target="#product">
                <a class="nav-link" href="#" role="button">
                  <span data-feather="shopping-cart"></span>
                  Products
                </a>
                <div id="product" class="list-group collapse show" data-parent="#dashboard">
                  <a class="list-group-item list-group-item-action" href="{{url($role.'/product/category')}}">Category</a>
                  <a class="list-group-item list-group-item-action" href="{{url($role.'/product/sub-category')}}">Sub Category</a>
                  <a class="list-group-item list-group-item-action" href="{{url($role.'/product/product-add')}}">Add Product</a>
                  <a class="list-group-item list-group-item-action" href="{{url($role.'/product/product-edit')}}">Edit/Delete</a>
                </div>
              </li>
        @endif
        {{-- For All User Action --}}
              <li class="nav-item" data-toggle="collapse" data-target="#settings">
                <a class="nav-link" href="#" role="button">
                  <span data-feather="file"></span>
                  Settings
                </a>
                <div id="settings" class="list-group collapse" data-parent="#dashboard">
                  <a class="list-group-item list-group-item-action" href="{{url($role.'/settings/profile')}}">Profile</a>
                  <a class="list-group-item list-group-item-action" href="{{url($role.'/settings/reset-password')}}">Reset Password</a>
                </div>
              </li>
      </ul>

           </div>
        </nav>
@endauth