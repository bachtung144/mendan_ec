<?php

namespace App\Http\Livewire\User\Review;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserReviewComponent extends Component
{
    public $orderProductId;
    public $rating;
    public $comment;
    protected $rules = [
        'rating' => 'required',
        'comment' => 'required',
    ];

    public function mount($orderProductId)
    {
        $this->orderProductId = $orderProductId;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addReview()
    {
        $data = $this->validate();
        $data['product_id'] = $this->orderProductId;
        $data['user_id'] = Auth::user()->id;
        Review::create($data);

        session()->flash('message', 'Your review has been added successfully!');
    }

    public function render()
    {
        $orderProduct = Product::findOrFail($this->orderProductId);

        return view('livewire.user.review.user-review-component', compact('orderProduct'))->layout('layouts.base');
    }
}
