<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class UserInfo extends Component
{   
    public $user, $user_id;

    public function mount($user_id)
    {
        $this->user_id = $user_id;
    }
    public function render()
    {   
        $user = User::where('id', $this->user_id)->with('address')->first();
        // dd( $user);
        return view('livewire.user.user-info', ['usr' => $user])->layout('layouts.info');
    }
}