<div class="intro-y box lg:mt-5">
    <div class="flex items-center p-5 border-b border-gray-200 dark:border-dark-5" id="{{$id}}">
        <h2 class="font-medium text-base mr-auto">{{$title}}</h2>
    </div>
    <div {{$attributes->merge(['class' => 'p-5'])}}>
        {{$slot}}
    </div>
</div>
