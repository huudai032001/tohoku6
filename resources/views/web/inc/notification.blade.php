<div id="user-notification-modal" class="modal user-notification-modal">
    <div class="modal_backdrop"></div>
    <div class="modal_dialog">
        <div class="modal_close">×</div>
        <div class="modal_title">通知</div>
        <ul class="user-notification_list custom-scrollbar">
            @if(Auth::check())
                @if($notifi = Auth::user()->notifications())
                    @foreach($notifi as $noti)
                    <li class="d-flex align-items-center">
                        <div class="date">{{$noti->created_at}}</div>
                        <div class="flex-fill content">{{$noti->feedback}}</div>
                    </li>
                    @endforeach
                @endif
            @endif
        </ul>
    </div>
</div>