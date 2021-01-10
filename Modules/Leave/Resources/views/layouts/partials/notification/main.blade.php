<div class="dropdown d-flex">
{{--    <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-1" data-toggle="dropdown">--}}
{{--        <i class="fa fa-bell"></i>--}}
{{--        @if (count(auth()->user()->unreadNotifications) > 0)--}}
{{--            <span class="badge badge-primary nav-unread"></span>--}}
{{--        @endif--}}
{{--    </a>--}}
{{--    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">--}}
{{--        <ul class="list-unstyled feeds_widget">--}}
{{--            @foreach(auth()->user()->unreadNotifications as $notification)--}}
{{--                @if($notification->type ==  'App\Notifications\Approval\ModificationNotification')--}}
{{--                    @include('layouts.partials.notification.modification')--}}
{{--                @endif--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--        <div class="dropdown-divider"></div>--}}
{{--        @if (auth()->user()->unreadNotifications->count() > 0)--}}
{{--            <a href="{{route('notification.readAll', auth()->id())}}"--}}
{{--               class="dropdown-item text-center text-muted-dark readall">--}}
{{--                Mark all as read--}}
{{--            </a>--}}
{{--        @else--}}
{{--            <p class="dropdown-item text-center text-muted-dark ">You have no new notifications</p>--}}
{{--        @endif--}}
{{--    </div>--}}

</div>



