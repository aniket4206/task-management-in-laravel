<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoNotification extends Component
{
    public $userId;

    public function mount()
    {
        $this->userId = Auth::id();
    }


    public function render()
    {
        $user = User::find($this->userId);

        return view('livewire.todo-notification', [
            'user' => $user,
        ]);
    }
}
