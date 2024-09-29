<!DOCTYPE html>
<html lang="en">
  <head>
     <!-- css -->
     @include('home.css')
  </head>
  <body class="goto-here">
		
    <header>
        <!-- header -->
        @include('home.header')
    </header>

    <section class="ftco-section ftco-cart">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ftco-animate">
                    <div class="cart-list">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>Product Image</th>
                                    <th>Product Title</th>
                                    <th>Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $value = 0; ?>
                                @foreach ($cart as $item)
                                <tr class="text-center">
                                    <!-- Product Image -->
                                    <td class="image-prod">
                                        <div class="img" style="width: 100px; height: 100px; overflow: hidden;">
                                            <img src="{{ asset('product/' . $item->product->image) }}" alt="{{ $item->product->title }}" class="img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                                        </div>
                                    </td>
                                    
                                    <!-- Product Name and Description -->
                                    <td class="product-name">
                                        <h3>{{ $item->product->title }}</h3>
                                        <p>{{ $item->product->description }}</p>
                                    </td>
                                    
                                    <!-- Product Price -->
                                    <td class="price">{{ $item->product->price }}$</td>
                                    
                                    <!-- Remove button -->
                                    <td class="product-remove">
                                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $value += $item->product->price; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Centered Total Value -->
    <div style="text-align: center; margin-top: 20px;">
       <h2>Total value of cart is: ${{ $value }}</h2>
    </div>
    <div class="row justify-content-end">
        <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
            <div class="cart-total mb-3">
                <h3>Shipping Address</h3>
                <p>Enter your destination to get a shipping estimate</p>
                <form action="{{ route('confirm_order') }}" method="POST" class="info">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control text-left px-3"  value="{{ Auth::user()->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <input type="text" id="address" name="address" class="form-control text-left px-3"  value="{{ Auth::user()->address }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" id="phone" name="phone" class="form-control text-left px-3"  value="{{ Auth::user()->phone }}">
                    </div>
                    <button type="submit" class="btn btn-primary py-3 px-4">Cash On Delivery</button>
                  
                    <a href="{{ url('stripe',$value ) }}" class="btn btn-success py-3 px-4">Place on Card</a>
                   
                </form>
            </div>
        </div>
    </div>
    
    

    
<hr>
    <!-- Footer -->
    @include('home.footer')

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen">
        <svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/>
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/>
        </svg>
    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js')}}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    
  </body>
</html>
