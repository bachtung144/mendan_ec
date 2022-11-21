<div>
    <div class="container admin-table">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body">
                        @if (Session::has('order_message'))
                            <div class="alert alert-success" role="alert">{{ Session::get('order_message') }}</div>
                        @endif
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Subtotal</th>
                                <th>Tax</th>
                                <th>Total</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Order date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->subtotal }}</td>
                                    <td>{{ $order->tax }}</td>
                                    <td>{{ $order->total }}</td>
                                    <td>{{ $order->firstname }}</td>
                                    <td>{{ $order->lastname }}</td>
                                    <td>{{ $order->mobile }}</td>
                                    <td>{{ $order->email }}</td>
                                    @if ($order->status == config('constant.order_delivered'))
                                        <td>Delivered</td>
                                    @elseif ($order->status == config('constant.order_canceled'))
                                        <td>Canceled</td>
                                    @else
                                        <td>Ordered</td>
                                    @endif
                                    <td>{{ $order->created_at }}</td>
                                    <td><a href="{{ route('user.orderdetails', $order->id) }}" class="btn btn-info btn-sm">Details</a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
