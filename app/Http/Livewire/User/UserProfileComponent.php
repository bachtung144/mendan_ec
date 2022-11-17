<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfileComponent extends Component
{
    public $email;
    public $name;
    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $user_id = Auth::user()->id;
        $user = User::where('id', $user_id)->first();
        $this->email = $user->email;
        $this->name = $user->name;
    }

    public function editProfile()
    {
        $user_id = Auth::user()->id;
        $data = $this->validate();
        $user = User::find($user_id);
        $user->update($data);
        session()->flash('message', __('user-profile.mess_edit'));
    }
    public function render()
    {
        return view('livewire.user.user-profile-component')->layout('layouts.base');
    }
}