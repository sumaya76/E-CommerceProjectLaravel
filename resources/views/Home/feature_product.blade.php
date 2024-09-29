<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Featured Products</span>
                <h2 class="mb-4">Our Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
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
</section>
