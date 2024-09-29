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
    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
              <h1 class="mb-0 bread">Products</h1>
            </div>
          </div>
        </div>
      </div>
  
      <section class="ftco-section">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-10 mb-5 text-center">
                      <ul class="product-category">
                          <li><a href="#" class="active">All</a></li>
                          <li><a href="#">Vegetables</a></li>
                          <li><a href="#">Fruits</a></li>
                          <li><a href="#">Juice</a></li>
                          <li><a href="#">Dried</a></li>
                      </ul>
                  </div>
              </div>
              <div class="container">
                <div class="row">
                    @foreach($product as $products) 
                    <div class="col-md-6 col-lg-3 ftco-animate">
                        <div class="product">
                            <!-- Make the image link to the product details page using the product's ID or slug -->
                            <a href="{{ route('product_details', ['id' => $products->id]) }}" class="img-prod">
                                <img class="img-fluid" src="product/{{ $products->image }}" alt="{{ $products->title }}">
                             
                                <div class="overlay"></div>
                            </a>
                            <div class="text py-3 pb-4 px-3 text-center">
                                <h3><a href="{{ route('product_details', ['id' => $products->id]) }}">{{ $products->title }}</a></h3>
                                <div class="d-flex">
                                    <div class="pricing">
                                        <p><span class="mr-2 price-dc"></span><span class="price-sale">{{ $products->price }}$</span></p>
                                    </div>
                                </div>
                                <div class="bottom-area d-flex px-3">
                                    <div class="m-auto d-flex">
                                        <a href="{{ route('add_cart', ['id' => $products->id]) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                            <span><i class="ion-ios-cart"></i></span>
                                        </a>
                                        <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                            <span><i class="ion-ios-heart"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
              <div class="row mt-5">
            <div class="col text-center">
              <div class="block-27">
                <ul>
                  <li><a href="#">&lt;</a></li>
                  <li class="active"><span>1</span></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&gt;</a></li>
                </ul>
              </div>
             


     
  
       <!-- categories -->
   

		

		
		<!-- Testimon -->

    

    <hr>
   


	<!--  Footer -->
  @include('home.footer')	
   
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/google-map.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
    
  </body>
</html>
          