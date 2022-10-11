<?php

namespace App\Http\Livewire\Admin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class AdminManageUserComponent extends Component
{
    use WithPagination;

    public function toggleActive($id)
    {
        $user = User::where('id', $id)->first();
        $user->is_active = !$user->is_active;
        $user->save();
    }

    public function render()
    {
        $users = User::where('role', config('constant.role_user'))->paginate(config('constant.default_pagesize'));

        return view('livewire.admin.user.admin-manage-user-component', compact('users'))->layout('layouts.base');
    }
}
