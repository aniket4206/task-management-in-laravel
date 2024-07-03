@assets
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@endassets

<div>

    <livewire:todo-create />
    &nbsp;
    <form wire:submit.prevent="search">
        <div class="row d-flex align-items-end justify-content-end ">
            <div class="col col-sm-12 col-md-5 col-lg-3">
                <input type="text" class="form-control" id="exampleInputSearch1" aria-describedby="searchHelp"
                    placeholder="Search" wire:model.live="query">
            </div>
        </div>
    </form>
    <form wire:submit.prevent="assignPriority">
        <div class="row d-flex align-items-end justify-content-end mt-2">
            <div class="col col-sm-4 col-md-2 col-lg-1">
                {{-- <div class="col-sm-12 col-lg-3 mt-2" style="margin-left: 70%;padding-left:17%"> --}}

                <select wire:model.live="priority" class="form-control">
                    <option value="none">
                        None
                    </option>
                    <option value="high">
                        High
                    </option>
                    <option value="medium">
                        Medium
                    </option>
                    <option value="low">
                        Low
                    </option>
                </select>
            </div>
        </div>
    </form>

    <div class="container mt-5 overflow-auto"> {{-- //style="margin-left: 10%;padding-right:30%;padding-left:15%" --}}
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col col-sm-auto col-md-8 col-lg-8">
                <table class="table text-center table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Tasks</th>
                            <th scope="col">Status</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Recurring</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Action</th>
                        </tr>

                    </thead>
                    <tbody>

                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $todo->task_name }}
                                </td>

                                <td>{{ $todo->task_status }}</td>

                                <td>
                                    {{ $todo->task_priority ?? 'Not Assign' }}
                                </td>
                                <td>
                                    {{ $todo->recurring ?? 'No Recurring' }}
                                </td>
                                <td>
                                    {{ $todo->task_due_date ?? 'No deadline' }}
                                </td>
                                <td>
                                    <button type="button" wire:click="edit({{ $todo->id }})"
                                        class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal1"
                                        class="btn btn-info" style="width: 50px;height: 50px;">
                                        <svg viewBox="0 -4 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000"
                                            style=" width: 25px;height: 25px;">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <title>view_simple [#815]</title>
                                                <desc>Created with Sketch.</desc>
                                                <defs> </defs>
                                                <g id="Page-1" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Dribbble-Light-Preview"
                                                        transform="translate(-260.000000, -4563.000000)" fill="#000000">
                                                        <g id="icons" transform="translate(56.000000, 160.000000)">
                                                            <path
                                                                d="M216,4409.00052 C216,4410.14768 215.105,4411.07682 214,4411.07682 C212.895,4411.07682 212,4410.14768 212,4409.00052 C212,4407.85336 212.895,4406.92421 214,4406.92421 C215.105,4406.92421 216,4407.85336 216,4409.00052 M214,4412.9237 C211.011,4412.9237 208.195,4411.44744 206.399,4409.00052 C208.195,4406.55359 211.011,4405.0763 214,4405.0763 C216.989,4405.0763 219.805,4406.55359 221.601,4409.00052 C219.805,4411.44744 216.989,4412.9237 214,4412.9237 M214,4403 C209.724,4403 205.999,4405.41682 204,4409.00052 C205.999,4412.58422 209.724,4415 214,4415 C218.276,4415 222.001,4412.58422 224,4409.00052 C222.001,4405.41682 218.276,4403 214,4403"
                                                                id="view_simple-[#815]"> </path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </svg></button>
                                    &nbsp;&nbsp;
                                    <button type="button" wire:click="edit({{ $todo->id }})"
                                        class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                        style="width: 50px;height: 50px;">
                                        <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill="#000000"
                                            style=" width: 25px;height: 25px;">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill="#000000" fill-rule="evenodd"
                                                    d="M4,4 L9,4 C9.55228,4 10,3.55228 10,3 C10,2.44772 9.55228,2 9,2 L4,2 C2.89543,2 2,2.89543 2,4 L2,12 C2,13.1046 2.89543,14 4,14 L12,14 C13.1046,14 14,13.1046 14,12 L14,10 C14,9.44771 13.5523,9 13,9 C12.4477,9 12,9.44771 12,10 L12,12 L4,12 L4,4 Z M15.2071,2.29289 C14.8166,1.90237 14.1834,1.90237 13.7929,2.29289 L8.5,7.58579 L7.70711,6.79289 C7.31658,6.40237 6.68342,6.40237 6.29289,6.79289 C5.90237,7.18342 5.90237,7.81658 6.29289,8.20711 L7.79289,9.70711 C7.98043,9.89464 8.23478,10 8.5,10 C8.76522,10 9.01957,9.89464 9.20711,9.70711 L15.2071,3.70711 C15.5976,3.31658 15.5976,2.68342 15.2071,2.29289 Z">
                                                </path>
                                            </g>
                                        </svg>
                                    </button>
                                    &nbsp;&nbsp;
                                    <button type="button" wire:click="delete({{ $todo->id }})"
                                        wire:confirm="Are you sure you want to delete {{ $todo->task_name }} .."
                                        class="btn btn-danger" style="width: 50px;height: 50px;">
                                        <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            style=" width: 25px;height: 25px;">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path d="M10 12V17" stroke="#000000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M14 12V17" stroke="#000000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M4 7H20" stroke="#000000" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path
                                                    d="M6 10V18C6 19.6569 7.34315 21 9 21H15C16.6569 21 18 19.6569 18 18V10"
                                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                                <path
                                                    d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z"
                                                    stroke="#000000" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </g>
                                        </svg></button>
                                    &nbsp;


                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>

        <div class="row mx-5">
            {{ $todos->links() }}

        </div>





        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Status {{ $eid }} </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Change Status</span>
                                <select wire:model="editstatus" class="form-control">
                                    <option value="">
                                        None
                                    </option>
                                    <option value="pending" {{ $editstatus == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="completed" {{ $editstatus == 'completed' ? 'selected' : '' }}>
                                        Completed
                                    </option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Set Task Priority</span>
                                <select wire:model="setpriority" class="form-control">
                                    <option value="">
                                        None
                                    </option>
                                    <option value="high" {{ $setpriority == 'high' ? 'selected' : '' }}>High
                                    </option>
                                    <option value="medium" {{ $setpriority == 'medium' ? 'selected' : '' }}>Medium
                                    </option>
                                    <option value="low" {{ $setpriority == 'low' ? 'selected' : '' }}>Low
                                    </option>
                                </select>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Sub Task</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" wire:model="setsubtask"
                                    value="{{ $setsubtask }}">
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Task Desc.</span>
                                <textarea type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" wire:model="edittaskdescription"
                                    value="{{ $edittaskdescription }}"></textarea>

                                {{-- <textarea class="form-control" aria-label="With textarea"> --}}
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Set Task
                                    Recurring</span>
                                <select wire:model="set_recurring" class="form-control">
                                    <option value="">
                                        None
                                    </option>
                                    <option value="daily" {{ $set_recurring == 'daily' ? 'selected' : '' }}>Daily
                                    </option>
                                    <option value="weekly" {{ $set_recurring == 'weekly' ? 'selected' : '' }}>Weekly
                                    </option>
                                    <option value="monthly" {{ $set_recurring == 'monthly' ? 'selected' : '' }}>
                                        Monthly
                                    </option>
                                </select>
                            </div>

                            {{-- <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Reminder</span>
                                <input type="date" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" wire:model="setduedate"
                                    value="{{ $set_reminder_at }}">
                            </div> --}}

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Add Due Date</span>
                                <input type="date" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" wire:model="setduedate"
                                    value="{{ $setduedate }}">
                            </div>

                        </form>

                    </div>

                    <div class="modal-footer">
                        <button wire:click="cancelEdit" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button wire:click="update" type="button" class="btn btn-primary"
                            data-bs-dismiss="modal">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">View task {{ $eid }} </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">ID</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" value="{{ $eid }}"
                                    disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Task Name</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" value="{{ $edittask }}"
                                    disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Task Description</span>
                                <textarea id="taskDescriptionTextarea" class="form-control" aria-label="Sizing example textarea"
                                    aria-describedby="textareaGroup-sizing-default" disabled>{{ $edittaskdescription }}</textarea>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Task Status</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" value="{{ $editstatus }}"
                                    disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Task Priority</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" value="{{ $setpriority }}"
                                    disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default"> Sub Task</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" value="{{ $setsubtask }}"
                                    disabled>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Task Due Date</span>
                                <input type="text" class="form-control" aria-label="Sizing example input"
                                    aria-describedby="inputGroup-sizing-default" value="{{ $setduedate }}"
                                    disabled>
                            </div>

                            {{-- id : {{ $eid }}
                            &nbsp; &nbsp;

                            Task : {{ $edittask }}
                            &nbsp; &nbsp;

                            Status : {{ $editstatus }} --}}

                        </h4>
                    </div>
                    <div class="modal-footer">
                        <button wire:click="cancelEdit" type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
