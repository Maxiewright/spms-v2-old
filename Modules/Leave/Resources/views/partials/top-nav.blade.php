<ul class="nav nav-tabs page-header-tab">
    <li class="nav-item">
        <a class="nav-link {{request()->is('leave') ? 'active' : ''}}" href="{{route('leave.dashboard')}}">
            Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('leave/all') ? 'active' : ''}}" href="{{route('leave.all')}}">
            All leave
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request()->is('leave/adjustments') ? 'active' : ''}}" href="{{route('leave.adjustments')}}">
            Leave Adjustments
        </a>
    </li>
</ul>

