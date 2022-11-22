<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                @if (Session::has('order_message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Details</div>
                            <div class="col-md-6">
                                <a href="{{ route('user.orders') }}" class="btn btn-success pull-right">All Orders</a>
                                @if ($order->status == config('constant.ordered_status'))
                                    <a href="#" class="btn btn-danger pull-right" style="margin-right: 10px !important;" wire:click.prevent="cancelOrder()">Cancel Order</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <td>{{ $order->id }}</td>
                                <th>Order date</th>
                                <td>{{ $order->created_at }}</td>
                                <th>Status</th>
                                @if ($order->status == config('constant.order_delivered'))
                                    <td>Delivered</td>
                                @elseif ($order->status == config('constant.order_canceled'))
                                    <td>Canceled</td>
                                @elseif ($order->status == config('constant.ordered_status'))
                                    <td>Ordered</td>
                                @endif
                                @if ($order->status == config('constant.order_delivered'))
                                    <th>Delivered Date</th>
                                    <td>{{ $order->delivered_date }}</td>
                                @elseif ($order->status == config('constant.order_canceled'))
                                    <th>Canceled Date</th>
                                    <td>{{ $order->canceled_date }}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">Ordered Items</div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="wrap-iten-in-cart">
                            <h3 class="box-title">Products Name</h3>
                            <ul class="products-cart">
                                @foreach ($order->products as $product)
                                    <li class="pr-cart-item">
                                        <div class="product-image">
                                            <figure><img src="{{ asset('bower_components/bower_ec/assets/images/products/' . $product->images->get(0)->name) }}" alt="{{ $product->name }}"></figure>
                                        </div>
                                        <div class="product-name">
                                            <a class="link-to-product" href="{{ route('product.details', $product->slug) }}">{{ $product->name }}</a>
                                        </div>
                                        <div class="price-field produtc-price">
                                            <p class="price" style="margin-top: 10px !important;">
                                                ${{ $product->price }}
                                            </p>
                                        </div>
                                        <div class="quantity">
                                            <h5>{{ $product->pivot->quantity }}</h5>
                                        </div>
                                        <div class="price-field sub-total">
                                            <p class="price" style="margin-top: 10px !important;">
                                                ${{ $product->price * $product->pivot->quantity }}
                                            </p>
                                        </div>
                                        @if ($order->status == config('constant.order_delivered'))
                                            <div class="price-field sub-total">
                                                <p class="price" style="margin-top: 10px !important;">
                                                    <a href="{{ route('user.review', $product->id) }}">
                                                        Write Review
                                                    </a>
                                                </p>
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="summary">
                            <div class="order-summary">
                                <h4 class="title-box">Summary</h4>
                                <p class="summary-info"><span class="title">Subtotal</span><b class="index">${{ $order->subtotal }}</b></p>
                                <p class="summary-info"><span class="title">Tax</span><b class="index">${{ $order->tax }}</b></p>
                                <p class="summary-info"><span class="title">Total</span><b class="index">${{ $order->total }}</b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Shipping Details
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>First Name</th>
                                <td>{{ $order->firstname }}</td>
                                <th>Last Name</th>
                                <td>{{ $order->lastname }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $order->mobile }}</td>
                                <th>Email</th>
                                <td>{{ $order->email }}</td>
                            </tr>
                            <tr>
                                <th>Line 1</th>
                                <td>{{ $order->line1 }}</td>
                                <th>Line 2</th>
                                <td>{{ $order->line2 }}</td>
                            </tr>
                            <tr>
                                <th>City</th>
                                <td>{{ $order->city }}</td>
                                <th>Province</th>
                                <td>{{ $order->province }}</td>
                            </tr>
                            <tr>
                                <th>Country</th>
                                <td>{{ $order->country }}</td>
                                <th>Zipcode</th>
                                <td>{{ $order->zipcode }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Transaction
                    </div>
                    <div class="panel-body">
                        <table class="table">
                            <tr>
                                <th>Transaction mode</th>
                                @if ($order->transaction->mode == config('constant.cod_payment_method'))
                                    <td>COD</td>
                                @endif
                            </tr>
                            <tr>
                                <th>Transaction date</th>
                                <td>{{ $order->transaction->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
