<main id="main">
    <div class="container">

        <!--MAIN SLIDE-->
        <div class="wrap-main-slide">
            <div class="slide-carousel owl-carousel style-nav-1" data-items="1" data-loop="1" data-nav="true" data-dots="false">
                <div class="item-slide">
                    <img src="bower_components/bower_ec/assets/images/slider1.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-1">
                        <span class="subtitle">With a smartwatch running, you never run short of time</span>
                        <p class="sale-info">Only Price<span class="price">$59.99</span></p>
                        <a href="{{route('shop')}}" class="btn-link">Shop Now</a>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="bower_components/bower_ec/assets/images/main-slider-1-2.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-2">
                        <h2 class="f-title">Extra 25% Off</h2>
                        <span class="f-subtitle">On online payments</span>
                        <p class="discount-code">Use Code: #FA6868</p>
                        <h4 class="s-title">Get Free</h4>
                        <p class="s-subtitle">TRansparent Bra Straps</p>
                    </div>
                </div>
                <div class="item-slide">
                    <img src="bower_components/bower_ec/assets/images/main-slider-1-3.jpg" alt="" class="img-slide">
                    <div class="slide-info slide-3">
                        <h2 class="f-title">Great Range of <b>Exclusive Furniture Packages</b></h2>
                        <span class="f-subtitle">Exclusive Furniture Packages to Suit every need</span>
                        <p class="sale-info">Stating at: <b class="price">$225.00</b></p>
                        <a href="{{route('shop')}}" class="btn-link">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>

        <!--BANNER-->
        <div class="wrap-banner style-twin-default">
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="bower_components/bower_ec/assets/images/home-1-banner-1.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
            <div class="banner-item">
                <a href="#" class="link-banner banner-effect-1">
                    <figure><img src="bower_components/bower_ec/assets/images/home-1-banner-2.jpg" alt="" width="580" height="190"></figure>
                </a>
            </div>
        </div>

        <!--Product Categories-->
        <div class="wrap-show-advance-info-box style-1">
            <h3 class="title-box">Categories</h3>
            <div class="wrap-top-banner">
                <a href="#" class="link-banner banner-effect-2">
                    <figure><img src="bower_components/bower_ec/assets/images/fashion-accesories-banner.jpg" width="1170" height="240" alt=""></figure>
                </a>
            </div>
            <div class="wrap-products">
                <div class="wrap-product-tab tab-style-1">
                    <div class="tab-control">
                        @foreach ($categories as $key => $category)
                            <a href="#category_{{ $category->id }}" class="tab-control-item {{ $key == 0 ? 'active' : '' }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                    <div class="tab-contents">
                        @foreach ($categories as $key => $category)
                            <div class="tab-content-item {{ $key == 0 ? 'active' : '' }}" id="category_{{ $category->id }}">
                                <div class="wrap-products slide-carousel owl-carousel style-nav-1 equal-container" data-items="5" data-loop="false" data-nav="true" data-dots="false" data-responsive='{"0":{"items":"1"},"480":{"items":"2"},"768":{"items":"3"},"992":{"items":"4"},"1200":{"items":"5"}}' >
                                    @php
                                        $products = App\Models\Product::where('category_id', $category->id)->get()->take($noOfProducts);
                                    @endphp
                                    @foreach ($products as $product)
                                        <div class="product product-style-2 equal-elem ">
                                            <div class="product-thumnail">
                                                <a href="{{ route('product.details', $product->slug) }}" title="{{ $product->name }}">
                                                    <figure>
                                                        <img src="{{ asset('bower_components/bower_ec/assets/images/products/' . $product->images->get(0)->name) }}" style="height: 245px" alt="{{ $product->name }}">
                                                    </figure>
                                                </a>
                                            </div>
                                            <div class="product-info">
                                                <a href="#" class="product-name"><span>{{ $product->name }}</span></a>
                                                <div class="wrap-price"><ins>
                                                        <p class="product-price">${{ $product->price }}</p>
                                                    </ins></div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
