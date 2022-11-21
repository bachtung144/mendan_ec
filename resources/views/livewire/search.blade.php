<main id="main" class="main-site left-sidebar">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="/" class="link">home</a></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="banner-shop">
                    <a href="#" class="banner-link">
                        <figure><img src="bower_components/bower_ec/assets/images/shop-banner.jpg" alt=""></figure>
                    </a>
                </div>

                <div class="wrap-shop-control">

                    <h1 class="shop-title">Digital & Electronics</h1>

                    <div class="wrap-right">

                        <div class="sort-item orderby">
                            <select name="orderby" class="use-chosen" wire:model="sorting">
                                <option value="menu_order" selected="selected">Default sorting</option>
                                <option value="date">Sort by newest</option>
                                <option value="price">Sort by price: low to high</option>
                                <option value="price-desc">Sort by price: high to low</option>
                            </select>
                        </div>

                        <div class="sort-item product-per-page">
                            <select name="post-per-page" class="use-chosen" wire:model="pagesize">
                                <option value="6" selected="selected">6 per page</option>
                                <option value="9">9 per page</option>
                                <option value="12">12 per page</option>
                            </select>
                        </div>

                        <div class="change-display-mode">
                            <a href="#" class="grid-mode display-mode active"><i class="fa fa-th"></i>Grid</a>
                            <a href="list.html" class="list-mode display-mode"><i class="fa fa-th-list"></i>List</a>
                        </div>

                    </div>

                </div><!--end wrap shop control-->

                <div class="row">

                    <ul class="product-list grid-products equal-container">
                        @foreach($products as $product)
                            <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                                <div class="product product-style-3 equal-elem ">
                                    <div class="product-thumnail">
                                        <a href="{{ route('product.details', ['slug' => $product->slug]) }}" title="{{ $product->name }}">
                                            <figure><img src="bower_components/bower_ec/assets/images/products/{{ $product->images->get(0)->name }}" alt="{{ $product->name }}"></figure>
                                        </a>
                                    </div>
                                    <div class="product-info">
                                        <a href="#" class="product-name"><span>{{$product->name}}</span></a>
                                        <div class="wrap-price"><span class="product-price">${{ $product->price }}</span></div>
                                        <a href="#" class="btn add-to-cart" wire:click.prevent="store({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">Add To Cart</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                </div>

                <div class="wrap-pagination-info">
                    {{ $products->links() }}
                </div>
            </div><!--end main products area-->

            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget mercado-widget categories-widget">
                    <h2 class="widget-title">All Categories</h2>
                    <div class="widget-content">
                        <ul class="list-category">
                            @foreach ($categories as $category)
                                <li class="category-item">
                                    <a href="{{ route('product.category', $category->slug) }}" class="cate-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- Categories widget-->

                <div class="widget mercado-widget filter-widget price-filter">
                    <h2 class="widget-title">Price</h2>
                    <div class="widget-content">
                        <div id="slider-range"></div>
                        <p>
                            <label for="amount">Price:</label>
                            <input type="text" id="amount" readonly>
                            <button class="filter-submit">Filter</button>
                        </p>
                    </div>
                </div><!-- Price-->

                <div class="widget mercado-widget filter-widget">
                    <div class="widget-content">
                        <div class="widget-banner">
                            <figure><img src="bower_components/bower_ec/assets/images/size-banner-widget.jpg" width="270" height="331" alt=""></figure>
                        </div>
                    </div>
                </div><!-- Size -->

            </div><!--end sitebar-->

        </div><!--end row-->

    </div><!--end container-->

</main>
