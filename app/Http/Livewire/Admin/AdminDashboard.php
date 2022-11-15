<?php

namespace App\Http\Livewire\Admin;
use App\Models\Order;
use Carbon\Carbon;

use Livewire\Component;

class AdminDashboard extends Component
{
    public function render()
    {
        $data = Order::where('status', config('constant.order_delivered'));
        $todayData = $data->whereDate('created_at', Carbon::today());
        $totalRe = $data->sum('total');
        $totalSale = $data->count();
        $todaySale = $todayData->count();
        $todayRe = $todayData->sum('total');

        return view('livewire.admin.admin-dashboard', compact('totalRe', 'totalSale', 'todaySale', 'todayRe'))
            ->layout('layouts.base');
    }
}
