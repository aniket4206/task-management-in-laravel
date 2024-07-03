<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;
use App\Models\User;
use App\Notifications\TaskReminder;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\WithPagination;


class TodoList extends Component
{
    // public $newTodo;

    public $eid;
    public $editstatus;
    public $edittask;
    public $setpriority;
    public $setduedate;
    public $setsubtask;
    public $set_reminder_at;
    public $set_recurring;
    public $edittaskdescription;




    public $todo = '';
    public $query = '';
    public $priority = '';


    use WithPagination;

    public function mount()
    {

    }

    // public function addTodo()
    // {


    //     $todo = new Todo();
    //     $todo->task_name = $this->newTodo;
    //     // $todo->task_description = $this->newTodo;
    //     $todo->user_id = $this->userId;
    //     $this->validate([
    //         'newTodo' => 'required|min:3',
    //     ]);
    //     $todo->save();

    //     $this->reset('newTodo');
    // }
    public function notify()
    {
        if (auth()->user()) {
            $todo = Todo::latest()->first();

            auth()->user()->notify(new TaskReminder($todo));
        }

        return redirect('dashboard');
    }

    public function delete(Todo $todos)
    {
        $todos->delete();
    }

    public function edit($id)
    {

        $edittodo = Todo::find($id);

        $this->eid = $edittodo->id;
        $this->edittask = $edittodo->task_name;
        $this->editstatus = $edittodo->task_status;

        $this->setpriority = $edittodo->task_priority;
        $this->setduedate = $edittodo->task_due_date;
        $this->setsubtask = $edittodo->subtask;
        $this->set_reminder_at = $edittodo->reminder_at;
        $this->set_recurring = $edittodo->recurring;
        $this->edittaskdescription = $edittodo->task_description;
    }

    public function cancelEdit()
    {
        $this->reset('eid', 'editstatus', 'edittask', 'setpriority', 'setduedate', 'setsubtask', 'set_reminder_at', 'set_recurring', 'edittaskdescription');
    }

    public function search()
    {
        $this->resetPage();
    }

    public function update()
    {
        $updateData = [
            'task_status' => $this->editstatus,
            'task_name' => $this->edittask,
            'task_priority' => $this->setpriority,
            'task_due_date' => $this->setduedate,
            'subtask' => $this->setsubtask,
            'reminder_at' => $this->set_reminder_at,
            'recurring' => $this->set_recurring,
            'task_description' => $this->edittaskdescription
        ];

        Todo::find($this->eid)->update($updateData);

        $this->cancelEdit();
    }

    #[On('task-created')]
    public function render()
    {

        $todos = Todo::latest()->whereAny(['task_name', 'task_status'], 'like', '%' . $this->query . '%')
            ->when($this->priority, function ($query) {
                $query->where('task_priority', 'like', '%' . $this->priority);
            })
            ->where('user_id', Auth::id())
            ->paginate(5);

        // for notification

        return view('livewire.todo-list', [
            'todos' => $todos,
        ]);
    }
}
