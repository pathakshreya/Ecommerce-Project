<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">


    <a class="navbar-brand" href="{{url('/')}}">E-shop</a>
<form action="/search">
    <div class="search-bar">
      <div class="input-group">
        <span class="input-group-text" id="basic-addon1"><i class="fa fa-search"></i></span>
        <input type="search" class="form-control search-box" name="search_product" id="search_text" placeholder="Search your product" aria-label="Username" aria-describedby="basic-addon1">
          <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </div>
</form>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      
      <div class="navbar-nav ms-auto">
        <a class="nav-link active" aria-current="page" href="{{url('/')}}">Home</a>

        <a class="nav-link" href="{{url('/category')}}">Category</a>
        
        <a href="{{url('/cart')}}" class="nav-link">Cart<i class="fa fa-shopping-cart"></i>
            <span class="badge badge-pill bg-primary cart-count">0</span>
        </a>
     
        <a href="{{url('/wishlist')}}" class="nav-link">Wishlist<i class="fa fa-heart"></i>
            <span class="badge badge-pill bg-success wishlist-count">0</span>
        </a>
         <a class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">

         @if (Illuminate\Support\Facades\Auth::check())
         <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="no-icon"> {{Illuminate\Support\Facades\Auth::user()->name}}</span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('logout') }}">Log Out</a>
          </li>

         @else
              <a href="{{ route('login') }}" class="nav-link">Log in</a>
                  <a href="{{ route('register') }}" class="nav-link">Register</a>  
            @endif
          </a>
      </div>
    </div>
  </div>
</nav>