<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoCreate extends Component
{
    public $newTodo;
    public $userId;


    public function mount()
    {
        $this->userId = Auth::id();
    }

    public function addTodo()
    {


        $todo = new Todo();
        $todo->task_name = $this->newTodo;
        // $todo->task_description = $this->newTodo;
        $todo->user_id = $this->userId;
        $this->validate([
            'newTodo' => 'required|min:3',
        ]);
        $todo->save();
        $this->dispatch('task-created');

        $this->reset('newTodo');
    }

    public function render()
    {
        return view('livewire.todo-create');
    }
}
