<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderComponent extends Component
{
    public function updateOrderStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        $order->status = $status;

        if ($status == config('constant.order_delivered')) {
            $order->delivered_date = DB::raw('CURRENT_TIMESTAMP');
        } elseif ($status == config('constant.order_canceled')) {
            $order->canceled_date = DB::raw('CURRENT_TIMESTAMP');
        }

        $order->save();
        session()->flash('order_message', 'Status has been updated successfully');
    }

    public function render()
    {
        $orders = Order::orderBy('created_at', 'DESC')->paginate(config('constant.default_pagesize'));

        return view('livewire.admin.order.admin-order-component', compact('orders'))->layout('layouts.base');
    }
}
