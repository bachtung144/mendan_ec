<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Cart;

class Checkout extends Component
{
    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $zipcode;
    public $paymentmode;
    public $thankyou;
    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'mobile' => 'required|numeric',
        'line1' => 'required',
        'line2' => 'required',
        'city' => 'required',
        'province' => 'required',
        'country' => 'required',
        'zipcode' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function placeOrder()
    {
        $data = $this->validate();
        $data['user_id'] = Auth::user()->id;
        $data['subtotal'] = session()->get('checkout')['subtotal'];
        $data['tax'] = session()->get('checkout')['tax'];
        $data['total'] = session()->get('checkout')['total'];
        $data['status'] = config('constant.ordered_status');
        $order = Order::create($data);

        $productIds = [];
        foreach (Cart::content() as $item) {
            $productIds[$item->id] = [
                'price' => $item->price,
                'quantity' => $item->qty
            ];
        }
        $order->products()->attach($productIds);

        if ($this->paymentmode == config('constant.cod_payment_method')) {
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->order_id = $order->id;
            $transaction->mode = config('constant.cod_payment_method');
            $transaction->status = config('constant.pending_status');
            $transaction->save();
        }

        $this->thankyou = 1;
        Cart::destroy();
        session()->forget('checkout');
    }

    public function verifyForCheckout()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        } elseif ($this->thankyou) {
            return redirect()->route('thankyou');
        } elseif (!session()->get('checkout')) {
            return redirect()->route('cart');
        }
    }

    public function render()
    {
        $this->verifyForCheckout();

        return view('livewire.checkout')->layout('layouts.base');
    }
}
