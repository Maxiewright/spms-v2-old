<li>
    <div class="feeds-left"><i class="fa fa-inbox"></i></div>
    <div class="feeds-body">
        <a href="{{route('modifications')}}">
            <h4 class="title text-danger">
                Approval Required
                <small class="float-right text-muted">
                    {{$notification->created_at->toFormattedDateString()}}
                </small>
            </h4>
        </a>
        <small>{{$notification->data['creator']. ' added ' . $notification->data['model'] . ' data.' }}</small>
    </div>
</li>

