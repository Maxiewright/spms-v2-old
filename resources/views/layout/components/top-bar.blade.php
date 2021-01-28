<!-- BEGIN: Top Bar -->
<div class="top-bar z-40">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
{{--        <a href="" class="">Application</a>--}}
{{--        <i data-feather="chevron-right" class="breadcrumb__icon"></i>--}}
{{--        <a href="" class="breadcrumb--active">Dashboard</a>--}}
    </div>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown mr-auto sm:mr-6">
        <div class="dropdown-toggle notification notification--bullet cursor-pointer">
            <i data-feather="bell" class="notification__icon dark:text-gray-300"></i>
        </div>
{{--        <div class="notification-content pt-2 dropdown-box">--}}
{{--            <div class="notification-content__box dropdown-box__content box dark:bg-dark-6">--}}
{{--                <div class="notification-content__title">Notifications</div>--}}
{{--                @foreach (array_slice($fakers, 0, 5) as $key => $faker)--}}
{{--                    <div class="cursor-pointer relative flex items-center {{ $key ? 'mt-5' : '' }}">--}}
{{--                        <div class="w-12 h-12 flex-none image-fit mr-1">--}}
{{--                            <img alt="" class="rounded-full" src="{{ asset('dist/images/' . $faker['photos'][0]) }}">--}}
{{--                            <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>--}}
{{--                        </div>--}}
{{--                        <div class="ml-2 overflow-hidden">--}}
{{--                            <div class="flex items-center">--}}
{{--                                <a href="javascript:;" class="font-medium truncate mr-5">{{ $faker['users'][0]['name'] }}</a>--}}
{{--                                <div class="text-xs text-gray-500 ml-auto whitespace-no-wrap">{{ $faker['times'][0] }}</div>--}}
{{--                            </div>--}}
{{--                            <div class="w-full truncate text-gray-600">{{ $faker['news'][0]['short_content'] }}</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in">
            <img alt="{{ Auth::user()->serviceperson->name }}" src="{{ Auth::user()->profile_photo_url }}">
        </div>
        <div class="dropdown-box w-56">
            <div class="dropdown-box__content box bg-theme-38 dark:bg-dark-6 text-white">
                <div class="p-4 border-b border-theme-40 dark:border-dark-3">
                    <div class="font-medium">{{ Auth::user()->serviceperson->name }}</div>
                    <div class="text-xs text-theme-41 dark:text-gray-600">{{ Auth::user()->serviceperson->currentJobSlug }}</div>
                </div>
                <div class="p-2">
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Record Card
                    </a>
                    <a href="{{ route('profile.show') }}" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="user" class="w-4 h-4 mr-2"></i> Profile
                    </a>
                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md">
                        <i data-feather="help-circle" class="w-4 h-4 mr-2"></i> Help
                    </a>
                </div>
                <div class="p-2 border-t border-theme-40 dark:border-dark-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a href="{{ route('logout') }}"
                           class="flex items-center block p-2 transition duration-300 ease-in-out hover:bg-theme-1 dark:hover:bg-dark-3 rounded-md"
                           onclick="event.preventDefault(); this.closest('form').submit();"
                        >
                            <i data-feather="toggle-right" class="w-4 h-4 mr-2"></i> Logout
                        </a>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
