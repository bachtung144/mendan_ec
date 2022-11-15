<?php

namespace App\Http\Livewire\User\Order;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class UserOderDetailsComponent extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function cancelOrder()
    {
        $order = Order::find($this->orderId);
        $order->status = config('constant.order_canceled');
        $order->canceled_date = DB::raw('CURRENT_DATE');
        $order->save();
        session()->flash('order_message', 'This order has been canceled successfully');
    }

    public function render()
    {
        $order = Order::where('user_id', Auth::user()->id)->where('id', $this->orderId)->first();

        return view('livewire.user.order.user-oder-details-component', compact('order'))->layout('layouts.base');
    }
}
