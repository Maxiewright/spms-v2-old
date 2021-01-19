<a href="{{route($route)}}" class="intro-y col-span-6 sm:col-span-3 cursor-pointer">
    <div {{$attributes->merge(['class' => 'zoom-in flex flex-col items-center p-5 rounded-md bg-theme-1'])}}>
        <i data-feather="{{$icon}}" class="text-white mr-3"></i>
        <div class="font-medium text-white mt-3">{{$title}}</div>
    </div>
</a>

