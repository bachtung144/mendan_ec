<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ChangePasswordComponent extends Component
{
    public $password;
    public $newPassword;
    public $confirmPassword;

    protected $rules = [
        'password' => ['required', 'string'],
        'newPassword' => ['required', 'string'],
        'confirmPassword' => ['required', 'string', 'same:newPassword'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function changePass()
    {
        $user_id = Auth::user()->id;
        $data = $this->validate();
        $user = User::find($user_id);
        if (Hash::check($this->password, $user->password)) {
            $user->password = Hash::make($this->newPassword);
            $user->save();
            session()->flash('message', __('update-password.mess_update_success'));
        } else {
            session()->flash('message', __('update-password.current_pass_incorrect'));
        }
        
    }

    public function render()
    {
        return view('livewire.user.change-password-component')->layout('layouts.base');
    }
}
