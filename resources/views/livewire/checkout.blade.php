<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>login</span></li>
            </ul>
        </div>
        <div class=" main-content-area">
            <form wire:submit.prevent="placeOrder()">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-address-billing">
                            <h3 class="box-title">Billing Address</h3>
                            <div class="billing-address">
                                <p class="row-in-form">
                                    <label for="fname">First name<span>*</span></label>
                                    <input type="text" name="fname" value="" placeholder="First name" wire:model="firstname">
                                    @error('firstname') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="lname">Last name<span>*</span></label>
                                    <input type="text" name="lname" value="" placeholder="Last name" wire:model="lastname">
                                    @error('lastname') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="email">Email Address</label>
                                    <input type="email" name="email" value="" placeholder="Email Address" wire:model="email">
                                    @error('email') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="phone">Phone number<span>*</span></label>
                                    <input type="number" name="phone" value="" placeholder="Phone number" wire:model="mobile">
                                    @error('mobile') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line1<span>*</span></label>
                                    <input type="text" name="add" value="" placeholder="Line1" wire:model="line1">
                                    @error('line1') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="add">Line2</label>
                                    <input type="text" name="add" value="" placeholder="Line2" wire:model="line2">
                                    @error('line2') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="country">Country<span>*</span></label>
                                    <input type="text" name="country" value="" placeholder="Country" wire:model="country">
                                    @error('country') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Province<span>*</span></label>
                                    <input type="text" name="province" value="" placeholder="Province" wire:model="province">
                                    @error('province') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="city">Town / City<span>*</span></label>
                                    <input type="text" name="city" value="" placeholder="Town / City" wire:model="city">
                                    @error('city') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                                <p class="row-in-form">
                                    <label for="zip-code">Postcode / ZIP</label>
                                    <input type="number" name="zip-code" value="" placeholder="Postcode / ZIP" wire:model="zipcode">
                                    @error('zipcode') <span class="text-danger">{{ $message }}}</span> @enderror
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="summary summary-checkout">
                    <div class="summary-item payment-method">
                        <h4 class="title-box">Payment Method</h4>
                        <p class="summary-info"><span class="title">Check / Money order</span></p>
                        <div class="choose-payment-methods">
                            <label class="payment-method">
                                <input name="payment-method" id="payment-method-bank" value="{{ config('constant.cod_payment_method') }}" type="radio" wire:model="paymentmode">
                                <span>Cash On Delivery</span>
                            </label>
                            @error('paymentmode') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        @if(Session::has('checkout'))
                            <p class="summary-info grand-total">
                                <span>Grand Total</span>
                                <span class="grand-total-price">{{ Session::get('checkout')['total'] }}</span>
                            </p>
                        @endif
                        <button type="submit" class="btn btn-medium">Place order now</button>
                    </div>
                </div>
            </form>

        </div><!--end main content area-->
    </div><!--end container-->

</main>
