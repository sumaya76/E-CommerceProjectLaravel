<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">Vegefoods</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="{{ url('/') }}" class="nav-link">Home</a></li>
              <li class="nav-item active"><a href="{{ url('/all_products') }}" class="nav-link">Shop</a></li>
            
              <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
          
              <li class="nav-item"><a href="{{ url('/contact') }}" class="nav-link">Contact</a></li>

              <!-- Show Login/Register if the user is a guest (not logged in) -->
              @guest
                  <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link"><i class="fas fa-sign-in-alt"></i> Login</a></li>
                  <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link"><i class="fas fa-user-plus"></i> Register</a></li>
                  @else
                  <!-- Show user's name and Logout if the user is authenticated (logged in) -->
                  <li class="nav-item"><span class="nav-link">Logged by, {{ Auth::user()->name }}</span></li>
                
                  <!-- My Cart link -->
                  <li class="nav-item cta cta-colored">
                    <a href="{{ url('myCart') }}" class="nav-link">
                      <span class="icon-shopping_cart"></span>[{{ $count }}]
                    </a>
                  </li>
                
                  <!-- Wishlist link -->
                  <li class="nav-item cta cta-colored">
                    <a href="wishlist.html" class="nav-link">
                      <i class="fas fa-heart"></i>[0]
                    </a>
                  </li>
                
                  <!-- Orders link -->
                  <li class="nav-item cta cta-colored">
                    <a href="{{ url('my_order') }}" class="nav-link">
                      </i> My Orders
                    </a>
                  </li>
        
                

                  <!-- Fixed Logout Button -->
                  <div style="position: fixed; right: 20px; z-index: 999;">
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf
                          <button type="submit" class="btn btn-danger mt-2 mb-2">
                              Logout
                          </button>
                      </form>
                  </div>
              @endguest
          </ul>
      </div>
  </div>
</nav>
