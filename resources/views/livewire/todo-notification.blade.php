<div>
    <div class="dropdown">
        <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="width: 50px;height: 50px;">
            <svg fill="#000000" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"  style="width: 25px;height: 25px;">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M20,18H4l2-2V10a6,6,0,0,1,5-5.91V3a1,1,0,0,1,2,0V4.09a5.9,5.9,0,0,1,1.3.4A3.992,3.992,0,0,0,18,10v6Zm-8,4a2,2,0,0,0,2-2H10A2,2,0,0,0,12,22ZM18,4a2,2,0,1,0,2,2A2,2,0,0,0,18,4Z">
                    </path>
                </g>
            </svg>
        </button>
        <ul class="dropdown-menu">

            <li style="color: green;"><a class="dropdown-item" href="{{ route('markAsRead') }}">Mark All As Read</a>
            </li>

            @foreach ($user->unreadNotifications as $notification)
                <li><a class="dropdown-item" href="#"> Your task is created
                        at {{ $notification->created_at }} and Task is
                        {{ $notification->data['name'] ?? '' }}..</a></li>
            @endforeach

        </ul>

    </div>

</div>
