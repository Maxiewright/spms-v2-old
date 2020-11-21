@foreach ($notifications as $notification)
    <div>
        @if ($notification->type ==  'App\Notifications\Approval\ModificationNotification')
            <li>
                <div class="feeds-left"><i class="fa fa-check"></i></div>
                <div class="feeds-body">
                    <a href="{{route('creations')}}">
                        <small> <p class="title text-danger">Approval Required</p></small>
                    </a>
                    <small>{{'New '. $notification->data['model'].' created by '.$notification->data['creator'].' on '.$notification->created_at->format('d M Y')}}</small>
                </div>
            </li>
        @endif
    </div>
@endforeach

