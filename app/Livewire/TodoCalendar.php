<?php

namespace App\Livewire;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TodoCalendar extends Component
{
    public $todo = '';

    public function mount(){

        $this->todo = Todo::all();
    }

    public function render()
    {
        $events = [];
        $todos = Todo::where('user_id', Auth::id())->get();

        foreach($todos as $todo){
            $events[] = [
                'title' => $todo->task_name,
                'start' => $todo->created_at,
                'end' => $todo->task_due_date,
            ];

            $this->generateRecurringEvents($todo, $events);

        }

        return view('livewire.todo-calendar', [
            'event' => $events
        ]);
    }

    private function generateRecurringEvents($todo, &$events)
    {
        $startDate = Carbon::parse($todo->created_at);
        $endDate = Carbon::parse($todo->task_due_date);

        if ($todo->recurring == 'daily') {
            for ($i = 1; $i <= 30; $i++) {
                $events[] = [
                    'title' => $todo->task_name,
                    'start' => $startDate->copy()->addDays($i)->toDateTimeString(),
                    'end' => $endDate->copy()->addDays($i)->toDateTimeString(),
                ];
            }
        } elseif ($todo->recurring == 'weekly') {
            for ($i = 1; $i <= 12; $i++) {
                $events[] = [
                    'title' => $todo->task_name,
                    'start' => $startDate->copy()->addWeeks($i)->toDateTimeString(),
                    'end' => $endDate->copy()->addWeeks($i)->toDateTimeString(),
                ];
            }
        } elseif ($todo->recurring == 'monthly') {
            for ($i = 1; $i <= 6; $i++) {
                $events[] = [
                    'title' => $todo->task_name,
                    'start' => $startDate->copy()->addMonths($i)->toDateTimeString(),
                    'end' => $endDate->copy()->addMonths($i)->toDateTimeString(),
                ];
            }
        }
    }

}
