<?php

namespace App\Http\Livewire\Admin\Order;

use App\Models\Order;
use Livewire\Component;

class AdminOrderDetailsComponent extends Component
{
    public $orderId;

    public function mount($orderId)
    {
        $this->orderId = $orderId;
    }

    public function render()
    {
        $order = Order::find($this->orderId);

        return view('livewire.admin.order.admin-order-details-component', compact('order'))->layout('layouts.base');
    }
}
