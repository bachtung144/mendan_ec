<div class="wrap-icon-section minicart">
    <a href="{{ route('cart') }}" class="link-direction">
        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
        <div class="left-info">
            <span class="index">{{ Cart::count() }} items</span>
            <span class="title">Cart</span>
        </div>
    </a>
</div>
