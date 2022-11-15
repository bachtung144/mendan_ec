<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrdersComponent extends Component
{
    public function render()
    {
        $orders = Order::where('user_id', Auth::user()->id)->paginate(config('constant.default_pagesize'));

        return view('livewire.user.order.user-orders-component', compact('orders'))->layout('layouts.base');
    }
}
